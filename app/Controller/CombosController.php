<?php

App::uses('AppController', 'Controller');

class CombosController extends AppController {

  public $layout = 'scim';
  public $uses = array('Combo', 'MaterialesCombo', 'Comboingreso', 'Combototale', 'Totale', 'Cliente', 'Ruta', 'Combosalida', 'User');

  public function combo_ciclo($idCiclo = NULL) {
    $this->layout = 'ajax';
    $materiales = $this->Totale->find('list', array(
      'recursive' => 0,
      'conditions' => array('Totale.ciclo_id' => $idCiclo),
      'fields' => array('Materiale.id', 'Materiale.nombre')
    ));
    $this->set(compact('materiales', 'idCiclo'));
  }

  public function registra_combo_c() {
    /* debug($this->request->data);
      exit; */
    $idCiclo = $this->request->data['Comboingreso']['ciclo_id'];
    $cantidad = $this->request->data['Comboingreso']['cantidad'];
    if (!empty($this->request->data['Materiales'])) {
      foreach ($this->request->data['Materiales'] as $mat) {
        $material_t = $this->get_total($mat['materiale_id'], $idCiclo);
        if ($material_t < ($cantidad * $mat['cantidad'])) {
          $this->Session->setFlash("No se pudo registrar! No hay suficiente en inventario", 'msgerror');
          $this->redirect($this->referer());
        }
      }
      $this->Combo->create();
      $this->Combo->save($this->request->data['Combo']);
      $idCombo = $this->Combo->getLastInsertID();
      foreach ($this->request->data['Materiales'] as $mat) {
        $material_t = $this->get_total($mat['materiale_id'], $idCiclo);
        $this->MaterialesCombo->create();
        $d_mat['combo_id'] = $idCombo;
        $d_mat['materiale_id'] = $mat['materiale_id'];
        $d_mat['cantidad'] = $mat['cantidad'];
        $this->MaterialesCombo->save($d_mat);
        $this->request->data['Comboingreso']['combo_id'] = $idCombo;
        $this->set_total($mat['materiale_id'], $idCiclo, ($material_t - ($cantidad * $mat['cantidad'])));
      }
      $this->Comboingreso->create();
      $this->Comboingreso->save($this->request->data['Comboingreso']);
      $this->set_total_com($idCombo, $idCiclo, $cantidad);
      $this->Session->setFlash("Se ha registrado correctamente el combo!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se pudo registrar debido a que no selecciono materiales!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function get_total($idMaterial = null, $idCiclo = null) {
    $total = $this->Totale->find('first', array(
      'recursive' => -1,
      'conditions' => array('ciclo_id' => $idCiclo, 'materiale_id' => $idMaterial),
      'fields' => array('cantidad')
    ));
    if (!empty($total)) {
      return $total['Totale']['cantidad'];
    } else {
      return 0.00;
    }
  }

  public function get_total_com($idCombo = null, $idCiclo = null) {
    $total = $this->Combototale->find('first', array(
      'recursive' => -1,
      'conditions' => array('ciclo_id' => $idCiclo, 'combo_id' => $idCombo),
      'fields' => array('cantidad')
    ));
    if (!empty($total)) {
      return $total['Combototale']['cantidad'];
    } else {
      return 0.00;
    }
  }

  public function set_total($idMaterial = null, $idCiclo = null, $total_c = null) {
    $total = $this->Totale->find('first', array(
      'recursive' => -1,
      'conditions' => array('ciclo_id' => $idCiclo, 'materiale_id' => $idMaterial),
      'fields' => array('id')
    ));
    if (!empty($total)) {
      $this->Totale->id = $total['Totale']['id'];
      $d_total['cantidad'] = $total_c;
      $this->Totale->save($d_total);
    } else {
      $this->Totale->create();
      $d_total['ciclo_id'] = $idCiclo;
      $d_total['materiale_id'] = $idMaterial;
      $d_total['cantidad'] = $total_c;
      $this->Totale->save($d_total);
    }
  }

  public function set_total_com($idCombo = null, $idCiclo = null, $total_c = null) {
    $total = $this->Combototale->find('first', array(
      'recursive' => -1,
      'conditions' => array('ciclo_id' => $idCiclo, 'combo_id' => $idCombo),
      'fields' => array('id')
    ));
    if (!empty($total)) {
      $this->Combototale->id = $total['Combototale']['id'];
      $d_total['cantidad'] = $total_c;
      $this->Combototale->save($d_total);
    } else {
      $this->Combototale->create();
      $d_total['ciclo_id'] = $idCiclo;
      $d_total['combo_id'] = $idCombo;
      $d_total['cantidad'] = $total_c;
      $this->Combototale->save($d_total);
    }
  }

  public function ingresar($idCiclo = null, $idCombo = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Comboingreso'])) {
      $cantidad = $this->request->data['Comboingreso']['cantidad'];
      $materiales = $this->MaterialesCombo->find('all', array(
        'recursive' => -1,
        'conditions' => array('combo_id' => $idCombo),
        'fields' => array('cantidad', 'materiale_id')
      ));
      foreach ($materiales as $ma) {
        $material_t = $this->get_total($ma['MaterialesCombo']['materiale_id'], $idCiclo);
        if ($material_t < ($cantidad * $ma['MaterialesCombo']['cantidad'])) {
          $this->Session->setFlash("No se pudo registrar! No hay suficiente en inventario", 'msgerror');
          $this->redirect($this->referer());
        }
      }
      foreach ($materiales as $mat) {
        $material_t = $this->get_total($mat['MaterialesCombo']['materiale_id'], $idCiclo);
        $this->request->data['Comboingreso']['combo_id'] = $idCombo;
        $this->set_total($mat['MaterialesCombo']['materiale_id'], $idCiclo, ($material_t - ($cantidad * $mat['MaterialesCombo']['cantidad'])));
      }
      $this->Comboingreso->create();
      $this->Comboingreso->save($this->request->data['Comboingreso']);
      $datos_i = $this->request->data['Comboingreso'];
      $total = $this->get_total_com($datos_i['combo_id'], $datos_i['ciclo_id']);
      $this->set_total_com($datos_i['combo_id'], $datos_i['ciclo_id'], ($total + $datos_i['cantidad']));
      $this->Session->setFlash("Se registro correctamente el Ingreso!!", 'msgbueno');
      $this->redirect($this->referer());
    }
    //debug($idCombo);
    $combo = $this->Combo->findByid($idCombo, NULL, NULL, -1);
    //debug($combo);exit;
    $this->set(compact('idCombo', 'idCiclo', 'combo'));
  }

  public function ingresos($idCiclo = null, $idCombo = null) {
    $this->layout = 'ajax';
    $ingresos = $this->Comboingreso->find('all', array(
      'recursive' => 0,
      'conditions' => array('Comboingreso.ciclo_id' => $idCiclo, 'Comboingreso.combo_id' => $idCombo),
      'fields' => array('Combo.nombre', 'Comboingreso.*'),
      'order' => array('Comboingreso.created DESC', 'Comboingreso.id DESC')
    ));
    $combo = $this->Combo->findByid($idCombo, null, null, -1);
    $materiales = $this->MaterialesCombo->find('all', array(
      'recursive' => 0,
      'conditions' => array('MaterialesCombo.combo_id' => $idCombo),
      'fields' => array('MaterialesCombo.cantidad', 'Materiale.nombre')
    ));
    $this->set(compact('ingresos', 'combo', 'materiales'));
  }

  public function eliminar_ingreso($idComIngreso = null) {
    $comIngreso = $this->Comboingreso->findByid($idComIngreso, null, null, -1);
    $total_c = $this->get_total_com($comIngreso['Comboingreso']['combo_id'], $comIngreso['Comboingreso']['ciclo_id']);
    if ($comIngreso['Comboingreso']['cantidad'] <= $total_c) {
      $materiales = $this->MaterialesCombo->findAllBycombo_id($comIngreso['Comboingreso']['combo_id'], null, null, null, null, -1);
      foreach ($materiales as $ma) {
        $total_m = $this->get_total($ma['MaterialesCombo']['materiale_id'], $comIngreso['Comboingreso']['ciclo_id']);
        $this->set_total($ma['MaterialesCombo']['materiale_id'], $comIngreso['Comboingreso']['ciclo_id'], ($total_m + ($comIngreso['Comboingreso']['cantidad'] * $ma['MaterialesCombo']['cantidad'])));
      }
      $this->set_total_com($comIngreso['Comboingreso']['combo_id'], $comIngreso['Comboingreso']['ciclo_id'], ($total_c - $comIngreso['Comboingreso']['cantidad']));
      $this->Comboingreso->delete($idComIngreso);
      $this->Session->setFlash('Se ha eliminado correctamente el ingreso!!', 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido eliminar debido a que no hay suficiente en inventarios de combo!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }
  
  public function eliminar_salida($idComSalida = null){
    $comSalida = $this->Combosalida->findByid($idComSalida,null,null,-1);
    $total_c = $this->get_total_com($comSalida['Combosalida']['combo_id'], $comSalida['Combosalida']['ciclo_id']);
    $this->set_total_com($comSalida['Combosalida']['combo_id'], $comSalida['Combosalida']['ciclo_id'], ($total_c+$comSalida['Combosalida']['cantidad']));
    $this->Session->setFlash("Se ha eliminado correctamente la salida!!",'msgbueno');
    $this->redirect($this->referer());
  }

  public function salidas($idCiclo = NULL, $idCombo = NULL) {
    $this->layout = 'ajax';
    $combo = $this->Combo->findByid($idCombo, null, null, -1);
    $salidas = $this->Combosalida->find('all', array(
      'recursive' => 0,
      'conditions' => array('Combosalida.ciclo_id' => $idCiclo, 'Combosalida.combo_id' => $idCombo),
      'order' => array('Combosalida.created DESC')
    ));
    $this->set(compact('salidas','combo'));
  }

  public function sacar($idCiclo = NULL, $idCombo = NULL) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Combosalida'])) {

      $cantidad = $this->request->data['Combosalida']['cantidad'];
      $total_m = $this->get_total_com($idCombo, $idCiclo);
      if ($total_m >= $cantidad) {
        $this->Combosalida->create();
        $this->Combosalida->save($this->request->data['Combosalida']);
        $this->set_total_com($idCombo, $idCiclo, ($total_m - $cantidad));
        $this->Session->setFlash("Se ha registrado correctamente la salida!!", 'msgbueno');
      } else {
        $this->Session->setFlash("No se ha podido registrar. No hay suficiente en inventario!!", 'msgerror');
      }
      $this->redirect($this->referer());
    }
    $this->User->virtualFields = array(
      'nombre_completo' => "CONCAT(User.codigo,' - ',User.nombre,' (',User.role,')')"
    );
    $users = $this->User->find('list', array(
      'recursive' => -1,
      'conditions' => array('role <>' => 'Administrador'),
      'fields' => array('User.id', 'User.nombre_completo')
    ));
    $rutas = $this->Ruta->find('list', array(
      'recursive' => -1,
      'fields' => array('id', 'nombre')
    ));
    $this->Cliente->virtualFields = array(
      'nombre_completo' => "CONCAT(Cliente.codigo,' - ',Cliente.nombre)"
    );
    $clientes = $this->Cliente->find('list', array(
      'recursive' => -1,
      'fields' => array('id', 'nombre_completo')
    ));
    $combo = $this->Combo->findByid($idCombo, null, null, -1);
    //$departamentos = $this->departamentos;
    $this->set(compact('users', 'rutas', 'clientes', 'idCombo', 'idCiclo', 'combo'));
  }
  
  

}

<?php

App::uses('AppController', 'Controller');

class CiclosController extends AppController {

  public $layout = 'scim';
  public $uses = array(
    'Ciclo', 'CiclosMarca', 'Marca', 'Ingreso', 'Totale', 'Materiale',
    'Combo', 'Comboingreso', 'Combototale', 'MaterialesCombo', 'User', 'Role', 'Cliente', 'Ruta', 'Salida'
  );
  public $departamentos = array(
    'La Paz' => 'La Paz',
    'Oruro' => 'Oruro',
    'Potosi' => 'Potosi',
    'Sucre' => 'Sucre',
    'Tarija' => 'Tarija',
    'Pando' => 'Pando',
    'Beni' => 'Beni',
    'Cochabamba' => 'Cochabamba',
    'Santa Cruz' => 'Santa Cruz'
  );

  public function index() {
    $ciclos = $this->Ciclo->find('all', array('order' => array('Ciclo.modified DESC', 'Ciclo.estado ASC')));
    $this->set(compact('ciclos'));
  }

  public function ciclo($idCiclo = null) {
    $this->layout = 'ajax';
    $this->Ciclo->id = $idCiclo;
    $this->request->data = $this->Ciclo->read();
    $marcas_r = array();
    if (!empty($idCiclo)) {
      $marcas_r = $this->CiclosMarca->find('all', array(
        'recursive' => -1,
        'conditions' => array('ciclo_id' => $idCiclo)
      ));
    }
    //debug($marcas_r);exit;
    $marcas = $this->Marca->find('list', array('recursive' => -1, 'fields' => array('id', 'nombre')));
    $this->set(compact('marcas', 'marcas_r'));
  }

  public function registra() {
    //debug($this->request->data);exit;
    $this->Ciclo->create();
    if ($this->Ciclo->save($this->request->data['Ciclo'])) {
      if (!empty($this->request->data['Ciclo']['id'])) {
        $idCiclo = $this->request->data['Ciclo']['id'];
      } else {
        $idCiclo = $this->Ciclo->getLastInsertID();
      }
      $this->CiclosMarca->deleteAll(array('CiclosMarca.ciclo_id' => $idCiclo));
      foreach ($this->request->data['Marcas'] as $ma) {
        $this->CiclosMarca->create();
        $ma['ciclo_id'] = $idCiclo;
        $this->CiclosMarca->save($ma);
      }
      $this->Session->setFlash("Se ha registrado correctamente el ciclo!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function eliminar($idCiclo = null) {
    if ($this->Ciclo->delete($idCiclo)) {
      $this->Session->setFlash("Se ha eliminado correctamente el ciclo!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido eliminar el ciclo, intente nuevamente!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function materiales($idCiclo = null) {
    /* $materiales = $this->Ingreso->find('all',array(
      'recursive' => 0,
      'conditions' => array(
      'Ingreso.ciclo_id' => $idCiclo
      ),
      'fields' => array('Materiale.*')
      )); */
    $this->Totale->virtualFields = array(
      'marca' => "(SELECT marcas.nombre FROM marcas WHERE marcas.id = Materiale.marca_id)"
    );
    $materiales = $this->Totale->find('all', array(
      'recursive' => 0,
      'conditions' => array('Totale.ciclo_id' => $idCiclo),
      'fields' => array('Materiale.*', 'Totale.cantidad', 'Totale.marca')
    ));
    $combos = $this->Combototale->find('all', array(
      'recursive' => 0,
      'conditions' => array('Combototale.ciclo_id' => $idCiclo),
      'fields' => array('Combo.*', 'Combototale.cantidad')
    ));
    //debug($combos);exit;
    foreach ($combos as $key => $co) {
      $combos[$key]['Combo']['materiales'] = $this->MaterialesCombo->find('all', array(
        'recursive' => 0,
        'conditions' => array('MaterialesCombo.combo_id' => $co['Combo']['id']),
        'fields' => array('MaterialesCombo.cantidad', 'Materiale.nombre')
      ));
    }

    $lista_m = $this->Totale->find('list', array(
      'recursive' => -1,
      'conditions' => array('Totale.ciclo_id' => $idCiclo),
      'fields' => array('id', 'materiale_id')
    ));
    $lista_c = $this->Combototale->find('list', array(
      'recursive' => -1,
      'conditions' => array('Combototale.ciclo_id' => $idCiclo),
      'fields' => array('id', 'combo_id')
    ));
    /* debug($lista_c);
      exit; */
    //debug($lista_m);
    //debug($lista_m);exit;
    if(count($lista_m) > 1){
      $materiales_no = $this->Materiale->find('all', array(
        'recursive' => 0,
        'conditions' => array('Materiale.id not in' => $lista_m)
      ));
    }elseif(count($lista_m) == 1){
      
      $materiales_no = $this->Materiale->find('all', array(
        'recursive' => 0,
        'conditions' => array('Materiale.id !=' => $lista_m)
      ));
    }else{
      $materiales_no = array();
    }
    //debug($lista_c);exit;
    if (count($lista_c) > 1) {
      $combos_no = $this->Combo->find('all', array(
        'recursive' => 0,
        'conditions' => array('Combo.id not in' => $lista_c)
      ));
    } elseif (count($lista_c) == 1) {
      $combos_no = $this->Combo->find('all', array(
        'recursive' => 0,
        'conditions' => array('Combo.id !=' => $lista_c)
      ));
    } else {
      $combos_no = array();
    }

    //debug($materiales_no);exit;
    $ciclo = $this->Ciclo->findByid($idCiclo, null, null, -1);
    $departamentos = $this->departamentos;
    $this->set(compact('materiales', 'ciclo', 'idCiclo', 'materiales_no', 'combos', 'combos_no', 'departamentos'));
  }

  public function add_material() {
    //debug($this->request->data);exit;
    $this->Ingreso->create();
    $this->Ingreso->save($this->request->data['Ingreso']);
    $this->set_total($this->request->data['Ingreso']['materiale_id'], $this->request->data['Ingreso']['ciclo_id'], $this->request->data['Ingreso']['cantidad']);
    $this->Session->setFlash("Se ha registrado correctamente el ingreso!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function get_total($idMaterial = null, $idCiclo = null) {
    $total = $this->Totale->find('first', array(
      'recursive' => -1,
      'conditions' => array('ciclo_id' => $idCiclo, 'materiale_id' => $idMaterial),
      'fields' => array('cantidad')
    ));
    if (!empty($total['Totale']['cantidad'])) {
      return $total['Totale']['cantidad'];
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

  public function ingresar($idCiclo = null, $idMaterial = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Ingreso'])) {
      $this->Ingreso->create();
      $this->Ingreso->save($this->request->data['Ingreso']);
      $datos_i = $this->request->data['Ingreso'];
      $total = $this->get_total($datos_i['materiale_id'], $datos_i['ciclo_id']);
      $this->set_total($datos_i['materiale_id'], $datos_i['ciclo_id'], ($total + $datos_i['cantidad']));
      $this->Session->setFlash("Se registro correctamente el Ingreso!!", 'msgbueno');
      $this->redirect($this->referer());
    }
    $departamentos = $this->departamentos;
    $this->set(compact('idMaterial', 'idCiclo', 'departamentos'));
  }

  public function ingresos($idCiclo = null, $idMaterial = null) {
    $this->layout = 'ajax';
    $material = $this->Materiale->findByid($idMaterial, null, null, -1);
    $ingresos = $this->Ingreso->find('all', array(
      'recursive' => -1,
      'conditions' => array('Ingreso.ciclo_id' => $idCiclo, 'Ingreso.materiale_id' => $idMaterial),
      'order' => array('Ingreso.created DESC')
    ));
    $this->set(compact('ingresos', 'material'));
  }

  public function sacar($idCiclo = null, $idMaterial = null) {
    $this->layout = 'ajax';
    //$roles = $this->Role->find('list', array('fields' => array('id', 'nombre')));
    if (!empty($this->request->data['Salida'])) {
      $cantidad = $this->request->data['Salida']['cantidad'];
      $total_m = $this->get_total($idMaterial, $idCiclo);
      if ($total_m >= $cantidad) {
        $this->Salida->create();
        $this->Salida->save($this->request->data['Salida']);
        $this->set_total($idMaterial, $idCiclo, ($total_m - $cantidad));
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
    $material = $this->Materiale->findByid($idMaterial, null, null, -1);
    $departamentos = $this->departamentos;
    $this->set(compact('users', 'rutas', 'clientes', 'departamentos', 'idMaterial', 'idCiclo', 'material'));
  }

  public function salidas($idCiclo = null, $idMaterial = null) {
    $this->layout = 'ajax';
    $material = $this->Materiale->findByid($idMaterial, null, null, -1);
    $salidas = $this->Salida->find('all', array(
      'recursive' => 0,
      'conditions' => array('Salida.ciclo_id' => $idCiclo, 'Salida.materiale_id' => $idMaterial),
      'order' => array('Salida.created DESC')
    ));
    $this->set(compact('salidas', 'material'));
  }
  public function eliminar_ingreso($idIngreso = null){
    $ingreso = $this->Ingreso->findByid($idIngreso,null,null,-1);
    $total_m = $this->get_total($ingreso['Ingreso']['materiale_id'], $ingreso['Ingreso']['ciclo_id']);
    if($total_m >= $ingreso['Ingreso']['cantidad']){
      $this->set_total($ingreso['Ingreso']['materiale_id'], $ingreso['Ingreso']['ciclo_id'], ($total_m-$ingreso['Ingreso']['cantidad']));
      $this->Ingreso->delete($idIngreso);
      $this->Session->setFlash("Se ha eliminado correctamente el ingreso!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido eliminar. No hay suficiente en almacen!!",'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function eliminar_salida($idSalida = null){
    $salida = $this->Salida->findByid($idSalida,null,null,-1);
    $total_m = $this->get_total($salida['Salida']['materiale_id'], $salida['Salida']['ciclo_id']);
    $this->set_total($salida['Salida']['materiale_id'], $salida['Salida']['ciclo_id'], ($total_m+$salida['Salida']['cantidad']));
    $this->Salida->delete($idSalida);
    $this->Session->setFlash("Se ha eliminado correctamente la salida!!",'msgbueno');
    $this->redirect($this->referer());
  }

}

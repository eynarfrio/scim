<?php

App::uses('AppController', 'Controller');

class MaterialesController extends AppController {

  public $layout = 'scim';
  public $uses = array('Materiale', 'Categoria', 'Marca', 'Ciclo', 'Ingreso', 'Totale');
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
    $materiales = $this->Materiale->find('all', array('recursive' => 0));
    //debug($materiales);exit;
    $this->set(compact('materiales'));
  }

  public function material($idMaterial = null) {
    $this->layout = 'ajax';
    $this->Materiale->id = $idMaterial;
    $this->request->data = $this->Materiale->read();
    $categorias = $this->Categoria->find('list', array('fields' => array('id', 'nombre')));
    $marcas = $this->Marca->find('list', array('fields' => array('id', 'nombre')));
    $this->set(compact('categorias', 'marcas'));
  }

  public function registra() {
    $this->Materiale->create();
    if ($this->Materiale->save($this->request->data['Materiale'])) {
      $this->Session->setFlash("Se ha registrado correctamente el material!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function material_ciclo($idCiclo = null) {
    $this->layout = 'ajax';
    $categorias = $this->Categoria->find('list', array('fields' => array('id', 'nombre')));
    $marcas = $this->Marca->find('list', array('fields' => array('id', 'nombre')));
    $departamentos = $this->departamentos;
    $this->set(compact('categorias', 'marcas', 'idCiclo','departamentos'));
  }

  public function registra_can() {
    /* debug($this->request->data);
      exit; */
    $this->Materiale->create();
    if ($this->Materiale->save($this->request->data['Materiale'])) {
      $idMaterial = $this->Materiale->getLastInsertID();
      $this->request->data['Ingreso']['materiale_id'] = $idMaterial;
      $this->Ingreso->create();
      $this->Ingreso->save($this->request->data['Ingreso']);

      $total_a = $this->get_total($idMaterial, $this->request->data['Ingreso']['ciclo_id']);
      //debug($total_a);exit;
      $this->set_total($idMaterial, $this->request->data['Ingreso']['ciclo_id'], ($total_a + $this->request->data['Ingreso']['cantidad']));
      $this->Session->setFlash("Se ha registrado correctamente el material!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!", 'msgerror');
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

}

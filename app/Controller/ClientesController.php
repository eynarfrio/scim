<?php

App::uses('AppController', 'Controller');

class ClientesController extends AppController {

  public $layout = 'scim';
  public $uses = array('Cliente','Ruta');
  
  public function index(){
    $clientes = $this->Cliente->find('all');
    $this->set(compact('clientes'));
  }
  public function cliente($idCliente = null){
    $this->layout = 'ajax';
    $this->Cliente->id = $idCliente;
    $this->request->data = $this->Cliente->read();
    $rutas = $this->Ruta->find('list',array(
      'recursive' => -1,
      'fields' => array('id','nombre')
    ));
    $this->set(compact('rutas'));
  }
  public function registra(){
    $this->Cliente->create();
    if($this->Cliente->save($this->request->data['Cliente'])){
      $this->Session->setFlash("Se ha registrado correctamente el cliente!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
  public function eliminar($idCliente = null){
    if($this->Cliente->delete($idCliente)){
      $this->Session->setFlash("Se ha eliminado correctamente el cliente!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido eliminar el cliente, intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
}


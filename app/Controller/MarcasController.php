<?php

App::uses('AppController', 'Controller');

class MarcasController extends AppController {

  public $layout = 'scim';
  public $uses = array('Marca');
  
  public function index(){
    $marcas = $this->Marca->find('all');
    $this->set(compact('marcas'));
  }
  public function marca($idMarca = null){
    $this->layout = 'ajax';
    $this->Marca->id = $idMarca;
    $this->request->data = $this->Marca->read();
  }
  public function registra(){
    $this->Marca->create();
    if($this->Marca->save($this->request->data['Marca'])){
      $this->Session->setFlash("Se ha registrado correctamente la marca!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
  public function eliminar($idMarca = null){
    if($this->Marca->delete($idMarca)){
      $this->Session->setFlash("Se ha eliminado correctamente la marca!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido eliminar la marca, intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
}

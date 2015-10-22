<?php

App::uses('AppController', 'Controller');

class RutasController extends AppController {

  public $layout = 'scim';
  public $uses = array('Ruta');
  
  public function index(){
    $rutas = $this->Ruta->find('all');
    $this->set(compact('rutas'));
  }
  public function ruta($idRuta = null){
    $this->layout = 'ajax';
    $this->Ruta->id = $idRuta;
    $this->request->data = $this->Ruta->read();
  }
  public function registra(){
    $this->Ruta->create();
    if($this->Ruta->save($this->request->data['Ruta'])){
      $this->Session->setFlash("Se ha registrado correctamente la ruta!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
  public function eliminar($idRuta = null){
    if($this->Ruta->delete($idRuta)){
      $this->Session->setFlash("Se ha eliminado correctamente la ruta!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido eliminar la ruta, intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
}

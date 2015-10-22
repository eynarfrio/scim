<?php

App::uses('AppController', 'Controller');

class RolesController extends AppController {

  public $layout = 'scim';
  public $uses = array('Role');
  
  public function index(){
    $roles = $this->Role->find('all');
    $this->set(compact('roles'));
  }
  public function role($idRole = null){
    $this->layout = 'ajax';
    $this->Role->id = $idRole;
    $this->request->data = $this->Role->read();
  }
  public function registra(){
    $this->Role->create();
    if($this->Role->save($this->request->data['Role'])){
      $this->Session->setFlash("Se ha registrado correctamente el role!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
  public function eliminar($idRole = null){
    if($this->Role->delete($idRole)){
      $this->Session->setFlash("Se ha eliminado correctamente el role!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido eliminar el role, intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
}


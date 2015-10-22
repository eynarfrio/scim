<?php

App::uses('AppController', 'Controller');

class CategoriasController extends AppController {

  public $layout = 'scim';
  public $uses = array('Categoria');
  
  public function index(){
    $categorias = $this->Categoria->find('all');
    $this->set(compact('categorias'));
  }
  public function categoria($idCategoria = null){
    $this->layout = 'ajax';
    $this->Categoria->id = $idCategoria;
    $this->request->data = $this->Categoria->read();
  }
  public function registra(){
    $this->Categoria->create();
    if($this->Categoria->save($this->request->data['Categoria'])){
      $this->Session->setFlash("Se ha registrado correctamente la categoria!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido registrar intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
  public function eliminar($idCategoria = null){
    if($this->Categoria->delete($idCategoria)){
      $this->Session->setFlash("Se ha eliminado correctamente la categoria!!",'msgbueno');
    }else{
      $this->Session->setFlash("No se ha podido eliminar la categoria, intente nuevamente!!",'msgerror');
    }
    $this->redirect($this->referer());
  }
}

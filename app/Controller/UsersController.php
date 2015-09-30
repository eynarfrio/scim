<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public $layout = 'scim';
    public $uses = array('User');

    public function beforeFilter(){
        parent::beforeFilter();
        //$this->Auth->allow();
    }

    public function index() {
        $usuarios = $this->User->find('all');
        $this->set(compact('usuarios'));
    }

    public function usuario($idusuario = null) {
        $this->layout = 'ajax';
        $this->User->id = $idusuario;
        $this->request->data = $this->User->read();
    }

    public function guardarusuario() {
        //debug($this->request->data); exit;
        $valida = $this->validar('User');
        if (empty($valida)) {
            $this->User->create();
            $this->User->save($this->request->data['User']);
            if(!empty($this->request->data['User']['password2'])){
              $this->request->data['User']['password'] = $this->request->data['User']['password2'];
            }
            $this->Session->setFlash('Se registro correctamente','msgbueno');
        } else {
            $this->Session->setFlash($valida);
        }
        $this->redirect(array('action' => 'index'));
    }

    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            //throw new NotFoundException(__('Invalid user'));
            $this->Session->setFlash('No existe el usuario.');
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash('se elimino correctamente el usuario.','msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar el usuario.','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

    public function login() {
        $this->layout='login';
        if($this->request->is('post')){
            //debug($this->request->is);exit;
            if($this->Auth->login()){
                $role=$this->Session->read('Auth.User.role');
                switch($role){
                    case 'Administrador':
                        $this->redirect(array('controller'=>'Users','action'=>'index'));
                    default:
                        break;
                }
            }
            else{
                $this->Session->setFlash('Usuario o password incorrectos intente de nuevo.','msgerror');
            }
        }
    }
    public function salir(){
        $this->redirect($this->Auth->logout());
        $this->redirect(array('action'=>'login'));
    }
    
    
}

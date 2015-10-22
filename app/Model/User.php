<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Sucursale $Sucursale
 */
class User extends AppModel {

  //The Associations below have been created with all possible keys, those that are not needed can be removed
  public function beforeSave($options = array()) {
    if (!empty($this->data['User']['password'])) {
      $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    }
    return true;
  }


}

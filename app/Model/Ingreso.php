<?php
App::uses('AppModel', 'Model');
/**
 * Ingreso Model
 *
 * @property Ciclo $Ciclo
 * @property Materiale $Materiale
 * @property User $User
 */
class Ingreso extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ciclo' => array(
			'className' => 'Ciclo',
			'foreignKey' => 'ciclo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Materiale' => array(
			'className' => 'Materiale',
			'foreignKey' => 'materiale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

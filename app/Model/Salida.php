<?php
App::uses('AppModel', 'Model');
/**
 * Salida Model
 *
 * @property User $User
 * @property Ciclo $Ciclo
 * @property Materiale $Materiale
 * @property Ruta $Ruta
 * @property Cliente $Cliente
 */
class Salida extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
    'Encargado' => array(
			'className' => 'User',
			'foreignKey' => 'encargado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Ruta' => array(
			'className' => 'Ruta',
			'foreignKey' => 'ruta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

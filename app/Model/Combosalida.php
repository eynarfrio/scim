<?php
App::uses('AppModel', 'Model');
/**
 * Combosalida Model
 *
 * @property Ciclo $Ciclo
 * @property Combo $Combo
 * @property Cliente $Cliente
 * @property Ruta $Ruta
 * @property User $User
 */
class Combosalida extends AppModel {


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
		'Combo' => array(
			'className' => 'Combo',
			'foreignKey' => 'combo_id',
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
		),
		'Ruta' => array(
			'className' => 'Ruta',
			'foreignKey' => 'ruta_id',
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
		),
		'Encargado' => array(
			'className' => 'User',
			'foreignKey' => 'encargado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

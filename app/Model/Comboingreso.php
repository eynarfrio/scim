<?php
App::uses('AppModel', 'Model');
/**
 * Comboingreso Model
 *
 * @property Combo $Combo
 * @property Ciclo $Ciclo
 * @property User $User
 */
class Comboingreso extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Combo' => array(
			'className' => 'Combo',
			'foreignKey' => 'combo_id',
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

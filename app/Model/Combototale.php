<?php
App::uses('AppModel', 'Model');
/**
 * Combototale Model
 *
 * @property Combo $Combo
 * @property Ciclo $Ciclo
 */
class Combototale extends AppModel {


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
		)
	);
}

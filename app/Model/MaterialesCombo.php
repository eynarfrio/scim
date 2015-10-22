<?php
App::uses('AppModel', 'Model');
/**
 * MaterialesCombo Model
 *
 * @property Combo $Combo
 * @property Materiale $Materiale
 */
class MaterialesCombo extends AppModel {


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
		'Materiale' => array(
			'className' => 'Materiale',
			'foreignKey' => 'materiale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

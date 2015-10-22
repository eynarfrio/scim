<?php
App::uses('AppModel', 'Model');
/**
 * Combo Model
 *
 * @property Comboingreso $Comboingreso
 * @property Combototale $Combototale
 * @property Materiale $Materiale
 */
class Combo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comboingreso' => array(
			'className' => 'Comboingreso',
			'foreignKey' => 'combo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Combototale' => array(
			'className' => 'Combototale',
			'foreignKey' => 'combo_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Materiale' => array(
			'className' => 'Materiale',
			'joinTable' => 'materiales_combos',
			'foreignKey' => 'combo_id',
			'associationForeignKey' => 'materiale_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}

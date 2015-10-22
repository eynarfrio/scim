<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property Ruta $Ruta
 */
class Cliente extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ruta' => array(
			'className' => 'Ruta',
			'foreignKey' => 'ruta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

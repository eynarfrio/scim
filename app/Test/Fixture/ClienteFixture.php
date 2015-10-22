<?php
/**
 * ClienteFixture
 *
 */
class ClienteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'nombre_negocio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 180),
		'direccion_domicilio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250),
		'telefono_domicilio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100),
		'celular' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20),
		'tipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'ruta_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nombre_negocio' => 'Lorem ipsum dolor sit amet',
			'direccion_domicilio' => 'Lorem ipsum dolor sit amet',
			'telefono_domicilio' => 'Lorem ipsum dolor sit amet',
			'celular' => 'Lorem ipsum dolor sit amet',
			'nombre' => 'Lorem ipsum dolor sit amet',
			'codigo' => 'Lorem ipsum dolor ',
			'tipo' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-10-17',
			'modified' => '2015-10-17',
			'ruta_id' => 1
		),
	);

}

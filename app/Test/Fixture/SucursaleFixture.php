<?php
/**
 * SucursaleFixture
 *
 */
class SucursaleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 70),
		'direccion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150),
		'departamento' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modififed' => array('type' => 'date', 'null' => true, 'default' => null),
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
			'nombre' => 'Lorem ipsum dolor sit amet',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'departamento' => 'Lorem ipsum dolor ',
			'created' => '2015-10-03',
			'modififed' => '2015-10-03'
		),
	);

}

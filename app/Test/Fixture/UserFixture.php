<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 120),
		'role' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
		'ci' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20),
		'telefono' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50),
		'sucursale_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'role' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-10-03',
			'modified' => '2015-10-03',
			'ci' => 'Lorem ipsum dolor ',
			'telefono' => 'Lorem ipsum dolor sit amet',
			'sucursale_id' => 1
		),
	);

}

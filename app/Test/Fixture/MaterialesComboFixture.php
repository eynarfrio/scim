<?php
/**
 * MaterialesComboFixture
 *
 */
class MaterialesComboFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'combo_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'materiale_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'date', 'null' => true, 'default' => null),
		'modified' => array('type' => 'date', 'null' => true, 'default' => null),
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
			'combo_id' => 1,
			'materiale_id' => 1,
			'cantidad' => 1,
			'created' => '2015-10-16',
			'modified' => '2015-10-16'
		),
	);

}

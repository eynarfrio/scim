<?php
/**
 * CicloFixture
 *
 */
class CicloFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250),
		'observacion' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'estado' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10),
		'fecha_ini' => array('type' => 'date', 'null' => true, 'default' => null),
		'fecha_fin' => array('type' => 'date', 'null' => true, 'default' => null),
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
			'nombre' => 'Lorem ipsum dolor sit amet',
			'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'estado' => 'Lorem ip',
			'fecha_ini' => '2015-10-11',
			'fecha_fin' => '2015-10-11',
			'created' => '2015-10-11',
			'modified' => '2015-10-11'
		),
	);

}

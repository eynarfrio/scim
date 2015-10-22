<?php
/**
 * MaterialeFixture
 *
 */
class MaterialeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 150),
		'marca_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20),
		'observacion' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'tipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 70),
		'categoria_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'marca_id' => 1,
			'codigo' => 'Lorem ipsum dolor ',
			'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'tipo' => 'Lorem ipsum dolor sit amet',
			'categoria_id' => 1,
			'created' => '2015-10-07',
			'modified' => '2015-10-07'
		),
	);

}

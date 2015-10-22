<?php
/**
 * SalidaFixture
 *
 */
class SalidaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'encargado_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'ciclo_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'materiale_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'cantidad' => array('type' => 'integer', 'null' => false, 'default' => null),
		'ruta_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'cliente_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'observacion' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1073741824),
		'departamento' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 60),
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
			'user_id' => 1,
			'encargado_id' => 1,
			'ciclo_id' => 1,
			'materiale_id' => 1,
			'cantidad' => 1,
			'ruta_id' => 1,
			'cliente_id' => 1,
			'observacion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'departamento' => 'Lorem ipsum dolor sit amet'
		),
	);

}

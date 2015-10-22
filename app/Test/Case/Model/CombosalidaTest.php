<?php
App::uses('Combosalida', 'Model');

/**
 * Combosalida Test Case
 *
 */
class CombosalidaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.combosalida',
		'app.ciclo',
		'app.combo',
		'app.comboingreso',
		'app.user',
		'app.combototale',
		'app.materiale',
		'app.marca',
		'app.categoria',
		'app.materiales_combo',
		'app.ruta',
		'app.cliente',
		'app.rutas_cliente',
		'app.encargado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Combosalida = ClassRegistry::init('Combosalida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Combosalida);

		parent::tearDown();
	}

}

<?php
App::uses('Salida', 'Model');

/**
 * Salida Test Case
 *
 */
class SalidaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.salida',
		'app.user',
		'app.ciclo',
		'app.materiale',
		'app.marca',
		'app.categoria',
		'app.ruta',
		'app.cliente',
		'app.rutas_cliente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Salida = ClassRegistry::init('Salida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Salida);

		parent::tearDown();
	}

}

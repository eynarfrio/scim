<?php
App::uses('Ruta', 'Model');

/**
 * Ruta Test Case
 *
 */
class RutaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Ruta = ClassRegistry::init('Ruta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ruta);

		parent::tearDown();
	}

}

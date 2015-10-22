<?php
App::uses('Ingreso', 'Model');

/**
 * Ingreso Test Case
 *
 */
class IngresoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ingreso',
		'app.ciclo',
		'app.materiale',
		'app.marca',
		'app.categoria',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ingreso = ClassRegistry::init('Ingreso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ingreso);

		parent::tearDown();
	}

}

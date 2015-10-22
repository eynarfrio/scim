<?php
App::uses('Comboingreso', 'Model');

/**
 * Comboingreso Test Case
 *
 */
class ComboingresoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comboingreso',
		'app.combo',
		'app.combototale',
		'app.ciclo',
		'app.materiale',
		'app.marca',
		'app.categoria',
		'app.materiales_combo',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comboingreso = ClassRegistry::init('Comboingreso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comboingreso);

		parent::tearDown();
	}

}

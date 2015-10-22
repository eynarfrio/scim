<?php
App::uses('Materiale', 'Model');

/**
 * Materiale Test Case
 *
 */
class MaterialeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.materiale',
		'app.marca',
		'app.categoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Materiale = ClassRegistry::init('Materiale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Materiale);

		parent::tearDown();
	}

}

<?php
App::uses('CiclosMarca', 'Model');

/**
 * CiclosMarca Test Case
 *
 */
class CiclosMarcaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ciclos_marca',
		'app.ciclo',
		'app.marca'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CiclosMarca = ClassRegistry::init('CiclosMarca');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CiclosMarca);

		parent::tearDown();
	}

}

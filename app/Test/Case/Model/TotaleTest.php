<?php
App::uses('Totale', 'Model');

/**
 * Totale Test Case
 *
 */
class TotaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.totale',
		'app.materiale',
		'app.marca',
		'app.categoria',
		'app.ciclo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Totale = ClassRegistry::init('Totale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Totale);

		parent::tearDown();
	}

}

<?php
App::uses('Combototale', 'Model');

/**
 * Combototale Test Case
 *
 */
class CombototaleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.combototale',
		'app.combo',
		'app.ciclo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Combototale = ClassRegistry::init('Combototale');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Combototale);

		parent::tearDown();
	}

}

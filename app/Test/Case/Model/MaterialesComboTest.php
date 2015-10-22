<?php
App::uses('MaterialesCombo', 'Model');

/**
 * MaterialesCombo Test Case
 *
 */
class MaterialesComboTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.materiales_combo',
		'app.combo',
		'app.comboingreso',
		'app.ciclo',
		'app.user',
		'app.combototale',
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
		$this->MaterialesCombo = ClassRegistry::init('MaterialesCombo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MaterialesCombo);

		parent::tearDown();
	}

}

<?php
App::uses('Medio', 'Model');

/**
 * Medio Test Case
 *
 */
class MedioTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medio', 'app.seguimiento', 'app.medios_seguimiento');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medio = ClassRegistry::init('Medio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medio);

		parent::tearDown();
	}

}

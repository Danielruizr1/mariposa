<?php
App::uses('MediosSeguimiento', 'Model');

/**
 * MediosSeguimiento Test Case
 *
 */
class MediosSeguimientoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.medios_seguimiento', 'app.medio', 'app.seguimiento');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MediosSeguimiento = ClassRegistry::init('MediosSeguimiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MediosSeguimiento);

		parent::tearDown();
	}

}

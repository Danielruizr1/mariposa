<?php
App::uses('Ciudade', 'Model');

/**
 * Ciudade Test Case
 *
 */
class CiudadeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.ciudade', 'app.departamentos');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ciudade = ClassRegistry::init('Ciudade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ciudade);

		parent::tearDown();
	}

}

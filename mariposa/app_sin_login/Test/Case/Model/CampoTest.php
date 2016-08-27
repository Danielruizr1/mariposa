<?php
App::uses('Campo', 'Model');

/**
 * Campo Test Case
 *
 */
class CampoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.campo', 'app.tablas');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Campo = ClassRegistry::init('Campo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Campo);

		parent::tearDown();
	}

}

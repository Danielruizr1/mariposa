<?php
App::uses('Tracker', 'Model');

/**
 * Tracker Test Case
 *
 */
class TrackerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tracker', 'app.destinos_seguimientos');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tracker = ClassRegistry::init('Tracker');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tracker);

		parent::tearDown();
	}

}

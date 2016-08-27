<?php
App::uses('Agencium', 'Model');

/**
 * Agencium Test Case
 *
 */
class AgenciumTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Agencium = ClassRegistry::init('Agencium');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Agencium);

		parent::tearDown();
	}

}

<?php
App::uses('Permiso', 'Model');

/**
 * Permiso Test Case
 *
 */
class PermisoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.permiso', 'app.campos', 'app.users');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Permiso = ClassRegistry::init('Permiso');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Permiso);

		parent::tearDown();
	}

}

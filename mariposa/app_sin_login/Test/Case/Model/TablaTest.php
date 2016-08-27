<?php
App::uses('Tabla', 'Model');

/**
 * Tabla Test Case
 *
 */
class TablaTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.tabla');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tabla = ClassRegistry::init('Tabla');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tabla);

		parent::tearDown();
	}

}

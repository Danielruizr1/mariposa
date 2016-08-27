<?php
App::uses('DestinosSeguimiento', 'Model');

/**
 * DestinosSeguimiento Test Case
 *
 */
class DestinosSeguimientoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.destinos_seguimiento', 'app.destino', 'app.seguimiento');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DestinosSeguimiento = ClassRegistry::init('DestinosSeguimiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DestinosSeguimiento);

		parent::tearDown();
	}

}

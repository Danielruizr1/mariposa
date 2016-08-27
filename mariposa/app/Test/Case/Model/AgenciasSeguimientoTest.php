<?php
App::uses('AgenciasSeguimiento', 'Model');

/**
 * AgenciasSeguimiento Test Case
 *
 */
class AgenciasSeguimientoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.agencias_seguimiento', 'app.agencia', 'app.departamentos', 'app.ciudades', 'app.seguimiento');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AgenciasSeguimiento = ClassRegistry::init('AgenciasSeguimiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AgenciasSeguimiento);

		parent::tearDown();
	}

}

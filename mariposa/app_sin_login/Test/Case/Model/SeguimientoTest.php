<?php
App::uses('Seguimiento', 'Model');

/**
 * Seguimiento Test Case
 *
 */
class SeguimientoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.seguimiento', 'app.usuarios', 'app.departamentos', 'app.ciudades', 'app.agencia', 'app.agencias_seguimiento', 'app.destino', 'app.destinos_seguimiento', 'app.medio', 'app.medios_seguimiento');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Seguimiento = ClassRegistry::init('Seguimiento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Seguimiento);

		parent::tearDown();
	}

}

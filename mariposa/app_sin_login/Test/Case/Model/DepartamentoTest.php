<?php
App::uses('Departamento', 'Model');

/**
 * Departamento Test Case
 *
 */
class DepartamentoTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.departamento');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Departamento = ClassRegistry::init('Departamento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Departamento);

		parent::tearDown();
	}

}

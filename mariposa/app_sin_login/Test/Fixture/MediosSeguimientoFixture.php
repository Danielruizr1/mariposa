<?php
/**
 * MediosSeguimientoFixture
 *
 */
class MediosSeguimientoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
		'medio_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'seguimiento_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'medio_id' => 1,
			'seguimiento_id' => 1
		),
	);
}

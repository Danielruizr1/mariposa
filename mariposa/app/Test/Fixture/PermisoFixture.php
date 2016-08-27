<?php
/**
 * PermisoFixture
 *
 */
class PermisoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
		'campos_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5, 'key' => 'index'),
		'users_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5, 'key' => 'index'),
		'crear' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'actualizar' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'eliminar' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'seleccionar' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'ninguno' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'todos' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'fecha_ingreso' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'fecha_modificacion' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'campos_id' => array('column' => 'campos_id', 'unique' => 0), 'users_id' => array('column' => 'users_id', 'unique' => 0)),
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
			'campos_id' => 1,
			'users_id' => 1,
			'crear' => 1,
			'actualizar' => 1,
			'eliminar' => 1,
			'seleccionar' => 1,
			'ninguno' => 1,
			'todos' => 1,
			'fecha_ingreso' => '2012-05-24',
			'fecha_modificacion' => '2012-05-24'
		),
	);
}

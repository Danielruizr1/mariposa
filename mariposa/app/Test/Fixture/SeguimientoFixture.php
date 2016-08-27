<?php
/**
 * SeguimientoFixture
 *
 */
class SeguimientoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5, 'key' => 'primary'),
		'users_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5, 'key' => 'index'),
		'departamentos_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5, 'key' => 'index'),
		'ciudades_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 5, 'key' => 'index'),
		'nombre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'parentesco' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => NULL),
		'hora' => array('type' => 'time', 'null' => true, 'default' => NULL),
		'telefono1' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'telefono2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'telefono3' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'celular' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'ciudad' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'direccion' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'fax' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'nombre_padre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'nombre_madre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'telefonooficina_padre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'telefonooficina_madre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'celular_padre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'celular_madre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'mail_padre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'mail_madre' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'nombre_quinceanera' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'telefono_quinceanera' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'mail_quinceanera' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'celular_quinceanera' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'anoviaje_quinceanera' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'mesviaje_quinceanera' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'estado' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'users_id' => array('column' => 'users_id', 'unique' => 0), 'departamentos_id' => array('column' => 'departamentos_id', 'unique' => 0), 'ciudades_id' => array('column' => 'ciudades_id', 'unique' => 0)),
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
			'users_id' => 1,
			'departamentos_id' => 1,
			'ciudades_id' => 1,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'parentesco' => 'Lorem ipsum dolor sit amet',
			'fecha' => '2012-05-24',
			'hora' => '16:55:06',
			'telefono1' => 'Lorem ipsum dolor sit amet',
			'telefono2' => 'Lorem ipsum dolor sit amet',
			'telefono3' => 'Lorem ipsum dolor sit amet',
			'celular' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet',
			'ciudad' => 'Lorem ipsum dolor sit amet',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'fax' => 'Lorem ipsum dolor sit amet',
			'nombre_padre' => 'Lorem ipsum dolor sit amet',
			'nombre_madre' => 'Lorem ipsum dolor sit amet',
			'telefonooficina_padre' => 'Lorem ipsum dolor sit amet',
			'telefonooficina_madre' => 'Lorem ipsum dolor sit amet',
			'celular_padre' => 'Lorem ipsum dolor sit amet',
			'celular_madre' => 'Lorem ipsum dolor sit amet',
			'mail_padre' => 'Lorem ipsum dolor sit amet',
			'mail_madre' => 'Lorem ipsum dolor sit amet',
			'nombre_quinceanera' => 'Lorem ipsum dolor sit amet',
			'telefono_quinceanera' => 'Lorem ipsum dolor sit amet',
			'mail_quinceanera' => 'Lorem ipsum dolor sit amet',
			'celular_quinceanera' => 'Lorem ipsum dolor sit amet',
			'anoviaje_quinceanera' => 'Lorem ipsum dolor sit amet',
			'mesviaje_quinceanera' => 'Lorem ipsum dolor sit amet',
			'estado' => 1
		),
	);
}

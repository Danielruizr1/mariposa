<?php
App::uses('AppModel', 'Model');
/**
 * Permiso Model
 *
 * @property Campos $Campos
 * @property Usuarios $Usuarios
 */
class Permiso extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Campos' => array(
			'className' => 'Campos',
			'foreignKey' => 'campos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuarios' => array(
			'className' => 'Usuarios',
			'foreignKey' => 'usuarios_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

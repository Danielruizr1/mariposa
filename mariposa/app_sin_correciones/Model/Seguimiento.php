<?php
App::uses('AppModel', 'Model');
/**
 * Seguimiento Model
 *
 * @property Usuarios $Usuarios
 * @property Departamentos $Departamentos
 * @property Ciudades $Ciudades
 * @property Agencia $Agencia
 * @property Destino $Destino
 */
class Seguimiento extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Usuarios' => array(
			'className' => 'Usuarios',
			'foreignKey' => 'usuarios_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Departamentos' => array(
			'className' => 'Departamentos',
			'foreignKey' => 'departamentos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ciudades' => array(
			'className' => 'Ciudades',
			'foreignKey' => 'ciudades_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Agencia' => array(
			'className' => 'Agencia',
			'joinTable' => 'agencias_seguimientos',
			'foreignKey' => 'seguimiento_id',
			'associationForeignKey' => 'agencia_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Destino' => array(
			'className' => 'Destino',
			'joinTable' => 'destinos_seguimientos',
			'foreignKey' => 'seguimiento_id',
			'associationForeignKey' => 'destino_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}

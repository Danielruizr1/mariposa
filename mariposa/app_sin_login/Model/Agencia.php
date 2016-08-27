<?php
App::uses('AppModel', 'Model');
/**
 * Agencia Model
 *
 * @property Departamentos $Departamentos
 * @property Ciudades $Ciudades
 * @property Seguimiento $Seguimiento
 */
class Agencia extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
		'Seguimiento' => array(
			'className' => 'Seguimiento',
			'joinTable' => 'agencias_seguimientos',
			'foreignKey' => 'agencia_id',
			'associationForeignKey' => 'seguimiento_id',
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

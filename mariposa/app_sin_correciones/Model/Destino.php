<?php
App::uses('AppModel', 'Model');
/**
 * Destino Model
 *
 * @property Seguimiento $Seguimiento
 */
class Destino extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Seguimiento' => array(
			'className' => 'Seguimiento',
			'joinTable' => 'destinos_seguimientos',
			'foreignKey' => 'destino_id',
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

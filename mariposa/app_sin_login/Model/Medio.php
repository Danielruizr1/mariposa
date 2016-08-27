<?php
App::uses('AppModel', 'Model');
/**
 * Medio Model
 *
 * @property Seguimiento $Seguimiento
 */
class Medio extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Seguimiento' => array(
			'className' => 'Seguimiento',
			'joinTable' => 'medios_seguimientos',
			'foreignKey' => 'medio_id',
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

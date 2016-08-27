<?php
App::uses('AppModel', 'Model');
/**
 * MediosSeguimiento Model
 *
 * @property Medio $Medio
 * @property Seguimiento $Seguimiento
 */
class MediosSeguimiento extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Medio' => array(
			'className' => 'Medio',
			'foreignKey' => 'medio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Seguimiento' => array(
			'className' => 'Seguimiento',
			'foreignKey' => 'seguimiento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

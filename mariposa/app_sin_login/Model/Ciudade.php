<?php
App::uses('AppModel', 'Model');
/**
 * Ciudade Model
 *
 * @property Departamentos $Departamentos
 */
class Ciudade extends AppModel {

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
		)
	);
}

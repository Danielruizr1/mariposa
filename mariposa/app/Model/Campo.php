<?php
App::uses('AppModel', 'Model');
/**
 * Campo Model
 *
 * @property Tablas $Tablas
 */
class Campo extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tablas' => array(
			'className' => 'Tablas',
			'foreignKey' => 'tablas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

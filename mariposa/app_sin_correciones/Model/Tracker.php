<?php
App::uses('AppModel', 'Model');
/**
 * Tracker Model
 *
 * @property DestinosSeguimientos $DestinosSeguimientos
 */
class Tracker extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DestinosSeguimientos' => array(
			'className' => 'DestinosSeguimientos',
			'foreignKey' => 'destinos_seguimientos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

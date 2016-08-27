<?php
App::uses('AppModel', 'Model');
/**
 * DestinosSeguimiento Model
 *
 * @property Destino $Destino
 * @property Seguimiento $Seguimiento
 */
class DestinosSeguimiento extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'destino_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'seguimiento_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Destino' => array(
			'className' => 'Destino',
			'foreignKey' => 'destino_id',
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

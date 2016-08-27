<?php
App::uses('AppModel', 'Model');
/**
 * Departamento Model
 *
 */
class Pagosdestino extends AppModel {
	public $belongsTo = array(
		'Destino' => array(
			'className' => 'Destino',
			'foreignKey' => 'destino_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

}
<?php
App::uses('AppModel', 'Model');
/**
 * Departamento Model
 *
 */
class Destinocumento extends AppModel {

		public $belongsTo = array(
		'Destino' => array(
			'className' => 'Destino',
			'foreignKey' => 'destID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Documento' => array(
			'className' => 'Documento',
			'foreignKey' => 'doc_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
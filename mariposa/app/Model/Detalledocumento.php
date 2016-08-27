<?php
App::uses('AppModel', 'Model');
/**
 * Departamento Model
 *
 */
class Detalledocumento extends AppModel {
	public $belongsTo = array(
		'Documento' => array(
			'className' => 'Documento',
			'foreignKey' => 'docID',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
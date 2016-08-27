<?php
App::uses('AppModel', 'Model');
/**
 * Permiso Model
 *
 * @property Tablas $Tablas
 * @property Campos $Campos
 * @property Users $Users
 */
class Permiso extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'tablas_id' => array(
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
		'Tablas' => array(
			'className' => 'Tablas',
			'foreignKey' => 'tablas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Campos' => array(
			'className' => 'Campos',
			'foreignKey' => 'campos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function guardarquery($datos){
	    $crear=$datos['Permiso']['crear'];
		$actualizar=$datos['Permiso']['actualizar'];
		$eliminar=$datos['Permiso']['eliminar'];
		$seleccionar=$datos['Permiso']['seleccionar'];
		$idcampo=$datos['Permiso']['campos_id'];
		$idtabla=$datos['Permiso']['tablas_id'];
		$iduser=$datos['Permiso']['users_id'];
		$fechaingreso=$datos['Permiso']['fecha_ingreso']['year'].'-'.$datos['Permiso']['fecha_ingreso']['month'].'-'.$datos['Permiso']['fecha_ingreso']['day'];
		$fechaactualizacion=$datos['Permiso']['fecha_modificacion']['year'].'-'.$datos['Permiso']['fecha_modificacion']['month'].'-'.$datos['Permiso']['fecha_modificacion']['day'];
		$id=$datos['Permiso']['id'][0];
		$this->query("update permisos set crear='$crear',actualizar='$actualizar',eliminar='$eliminar',seleccionar='$seleccionar',fecha_ingreso='$fechaingreso',fecha_modificacion='$fechaactualizacion' where id=$id");
		
	}
}

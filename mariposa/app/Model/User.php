<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
	/**
	 Metodo para que encripte el password con el hash de cake y no lo deje como texto plano.
	*/
	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    }
    return true;
    }
	function crearpermiso($iduser,$campos){
		foreach($campos as $permiso){
			$idcampo=$permiso['Campo']['id'];
			$idtabla=$permiso['Campo']['tablas_id'];
			$fecha=date('Y-m-d');
			$this->query("insert into permisos values(NULL,$idtabla,$idcampo,$iduser,1,1,1,1,'$fecha','$fecha')");
		}
	}
}

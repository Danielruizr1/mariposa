<?php
App::uses('AppModel', 'Model');
/**
 * Seguimiento Model
 *
 * @property Users $Users
 * @property Departamentos $Departamentos
 * @property Ciudades $Ciudades
 * @property Agencia $Agencia
 * @property Destino $Destino
 * @property Medio $Medio
 */
class Seguimiento extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Users' => array(
			'className' => 'Users',
			'foreignKey' => 'agente',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Departamentos' => array(
			'className' => 'Departamentos',
			'foreignKey' => 'departamentos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ciudades' => array(
			'className' => 'Ciudades',
			'foreignKey' => 'ciudad',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Padres' => array(
			'className' => 'Seguimientos',
			'foreignKey' => 'idpadre',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Agencia' => array(
			'className' => 'Agencia',
			'joinTable' => 'agencias_seguimientos',
			'foreignKey' => 'seguimiento_id',
			'associationForeignKey' => 'agencia_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Destino' => array(
			'className' => 'Destino',
			'joinTable' => 'destinos_seguimientos',
			'foreignKey' => 'seguimiento_id',
			'associationForeignKey' => 'destino_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Medio' => array(
			'className' => 'Medio',
			'joinTable' => 'medios_seguimientos',
			'foreignKey' => 'seguimiento_id',
			'associationForeignKey' => 'medio_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
   public function salvabitacora($iduser,$idseguimiento,$texto,$llamadaEfectiva,$fecha, $hora){
	   $this->query("insert into bitacora values (NULL, '$idseguimiento', '$iduser', '$texto', '$llamadaEfectiva', '$fecha', '$hora')");
	   $id=$this->query("SELECT MAX(id) as id FROM bitacora");
	   return ($id[0][0]['id']);
   }
   

   public function agregatracker($email, $idfolleto, $fecha, $iddestinoseumiento){
	   $this->query("insert into trackers values('', ".$iddestinoseumiento.", '".$email."', '".$idfolleto."', '".$fecha."', 0)");
   }
   public function transferir($idusuario, $idseguimiento, $idantiguo, $nombreusuarionuevo, $idusuarioantiguo){
	   $fecha=date("Y-m-d");
	   $hora=date("H:m:s");
	   $this->query("update seguimientos set agente=$idusuario, transferencia=1 where id=$idseguimiento");
	   $this->query("insert into bitacora (seguimientos_id, users_id, ingreso, fecha, hora) values ($idseguimiento, $idusuarioantiguo, '$idantiguo ha transferido el seguimiento actual a $nombreusuarionuevo', '$fecha', '$hora')");
	   $id=$this->query("SELECT MAX(id) as id FROM bitacora");
	   return ($id[0][0]['id']);
   }
   public function borrarNotificacion($idseguimiento,$emailuser){
	   $resultado=$this->query("update trackers set revisado=1 where correo_usuario='$emailuser'");
	   $resultado=$this->query("update seguimientos set transferencia=0,vinculacion=0,bitacora=0 where id='$idseguimiento'");
   }
   public function agregarAgencia($medio){
	   $this->query("insert into agencias (nombre, activo) values ('$medio', 1)");
	   $id=$this->query("SELECT MAX(id) as id FROM agencias");
	   return ($id[0][0]['id']);
   }
}

<?php
ini_set('max_execution_time',600);
App::uses('AppController', 'Controller');
/**
 * Seguimientos Controller
 *
 * @property Seguimiento $Seguimiento
 * @property AclComponent $Acl
 * @property SecurityComponent $Security
 * @property RequestHandlerComponent $RequestHandler
 */
class SeguimientosController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Ajax', 'Javascript', 'Time');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Acl', 'RequestHandler');
/**
* Befor filter para json
*/
public function beforeFilter() {
    if ($this->RequestHandler->ext === 'json') {
      $this->RequestHandler->setContent('json');
      Configure::write('debug', 0);
    }
    parent::beforeFilter();
  }

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->Seguimiento->recursive = -1;
		$this->set('seguimientos', $this->paginate());
		$this->layout = '';
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		$this->set('seguimiento', $this->Seguimiento->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
			$this->Seguimiento->create();
		    $this->Seguimiento->save($this->request->data);
			$this->enviacorreo($this->Seguimiento->id);
			echo $this->Seguimiento->id;

		$users = $this->Seguimiento->Users->find('list',array('fields'=>array('username')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('users', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Seguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('El seguimiento se ha editado ingresado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El seguimiento no se ha podido editar, por favor intentelo más tarde.'));
			}
		} 
		//@eduardo:Se cuadra el ingreos por ajax con CakePhp
		else if($this->request->is('ajax')){
			if ($this->Seguimiento->save($this->request->data)) {
				echo -1;
			}
		}
		else {
			$this->request->data = $this->Seguimiento->read(null, $id);
		}
		$users = $this->Seguimiento->Users->find('list',array('fields'=>array('username')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('users', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->Seguimiento->delete()) {
			$this->Session->setFlash(__('El seguimiento de ha eliminado con exito'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El seguimiento no se ha eliminado'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Seguimiento->recursive = 2;
		$seguimientos=$this->Seguimiento->find("all");
		$this->set('seguimientos', $seguimientos);
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		$this->set('seguimiento', $this->Seguimiento->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Seguimiento->create();
			if ($this->Seguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('El seguimiento ha ingresado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El seguimiento no se ha podido guardar, por favor intentelo más tarde.'));
			}
		}
		$users = $this->Seguimiento->Users->find('list',array('fields'=>array('username')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('users', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Seguimiento->save($this->request->data)) {
				$this->Session->setFlash(__('El seguimiento se ha editado ingresado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El seguimiento no se ha podido editar, por favor intentelo más tarde.'));
			}
		} else {
			$this->request->data = $this->Seguimiento->read(null, $id);
		}
		$users = $this->Seguimiento->Users->find('list',array('fields'=>array('username')));
		$departamentos = $this->Seguimiento->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Seguimiento->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Seguimiento->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Seguimiento->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Seguimiento->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('users', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Seguimiento->id = $id;
		if (!$this->Seguimiento->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->Seguimiento->delete()) {
			$this->Session->setFlash(__('El seguimiento de ha eliminado con exito'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('El seguimiento no se ha eliminado'));
		$this->redirect(array('action' => 'index'));
	}
	
/**
*Funcion para recibir por ajax los datos en post, al hacer esto se selecciona si se va a editar o si va a guardar
*
*created by: Eduardo Giraldo
*Entrada:Ninguna
*Salida: Retorna id o -1 de acuerdo al caso
*/
/*public function recibeajax() {
	/*$estado =  $_POST['estados'];
if($estado == "2"){
		$id = $_POST['id'];
		$subeno=$this->Seguimiento->query("update seguimientos set fase=10 where id={$id}");
		$subeno=$this->Seguimiento->query("update seguimientos set interes=1 where id={$id}");    
		  
	  } if($estado == "3"){
		$id = $_POST['id'];
		$subeno=$this->Seguimiento->query("update seguimientos set interes=3 where id={$id}");
		$subeno=$this->Seguimiento->query("update seguimientos set fase=10 where id={$id}");  
	  }else {
	   $ultContacto = $_POST['ultimoContacto'];
	   $id = $_POST['id'];
	   $subeno=$this->Seguimiento->query("update seguimientos set ultimo_contacto='$ultContacto' where id={$id}");
	  }
	  $id = $_POST['id'];
	  $destinoId = $_POST['destinoId'];
	  $sigla = $_POST['sigla'];
	  $subeno = $this->Seguimiento->query("update seguimientos set {$sigla}={$destinoId} where id={$id}");
   }*/
   
 
public function actulaizarUltimoContacto()
   {
   
   $seguimientoACtual=0;
   $Seguimientos = $this->Seguimiento->query("SELECT * FROM destinos_seguimientos ORDER BY seguimiento_id");
   $algo="";
   $UpdateAgencias="";
   $myfile = fopen("UpdateSeguimientos.txt", "w") or die("Unable to open file!");

   foreach($Seguimientos as $seguimiento){
	   
	  // $idseguimiento = $seguimiento['seguimientos']['id'];
	   //$mxfecha= $this->Seguimiento->query("SELECT fecha FROM bitacora WHERE seguimientos_id={$idseguimiento} order by fecha desc limit 1");
	  // $agencias= $this->Seguimiento->query("SELECT agencia.agencia_id FROM agencias_seguimientos agencia JOIN seguimientos b ON agencia.seguimiento_id = b.id WHERE agencia.seguimiento_id = {$idseguimiento}");
	   //$destinos = $this->Seguimiento->query("SELECT * FROM destinos_seguimientos ORDER BY seguimiento_id"); 
	  // print_r($destinos);
	  // if(!$destinos){


	  // for ($i=0; $i<count($destinos); $i++){
           $idseguimiento = $seguimiento['destinos_seguimientos']['seguimiento_id'];
		   $destino = $seguimiento['destinos_seguimientos']['destino_id'];
			   
			   switch($destino){
						  case 1:
						   $algo= "update seguimientos set CUR_AUA={$destino} where id={$idseguimiento};";
						  break;
						  case 2:
						   $algo= "update seguimientos set FLA={$destino} where id={$idseguimiento};";
						  break;
						  case 3:
						   $algo="update seguimientos set EUR={$destino} where id={$idseguimiento};";
						  break;
						  case 4:
						   $algo="update seguimientos set MEX={$destino} where id={$idseguimiento};";
						  break;
						  case 5:
						  $algo="update seguimientos set FLA_CUN={$destino} where id={$idseguimiento};";
						  break;
						  case 6:
						   $algo="update seguimientos set FLA_MQT={$destino} where id={$idseguimiento};";
						  break;
						  case 7:
						   $algo="update seguimientos set SURA_VER={$destino} where id={$idseguimiento};";
						  break;
						  case 8:
						   $algo="update seguimientos set CXC={$destino} where id={$idseguimiento};";
						  break;
						  case 9:
						   $algo="update seguimientos set PTY={$destino} where id={$idseguimiento};";
						  break;
						  case 10:
						   $algo="update seguimientos set FLA_NY={$destino} where id={$idseguimiento};";
						  break;
						  case 11:
						   $algo="update seguimientos set NY_CUN={$destino} where id={$idseguimiento};";
						  break;
						  case 12:
						   $algo="update seguimientos set SURA_COMB_PER={$destino} where id={$idseguimiento};";
						  break;
						  case 13:
						  $algo="update seguimientos set HW={$destino} where id={$idseguimiento};";
						  break;
                          case 14:
						  $algo="update seguimientos set EUR2={$destino} where id={$idseguimiento};";
						  break;
				}
				$this->Seguimiento->query($algo);
				echo "Actualizando id: ".$idseguimiento . "\n";
				

				
	   }
	   $txt = $algo;
      fwrite($myfile, $txt);
       /*}    

	   if ($mxfecha){$fecha = $mxfecha[0]['bitacora']['fecha']; 
	   $algo = $this->Seguimiento->query("update seguimientos set ultimo_contacto='$fecha' where id={$idseguimiento}"); 
	  $seguimientoACtual = $seguimientoACtual + 1;
	   }*/
	  /* if($agencias){
	   	$agencia = $agencias[0]['agencia']['agencia_id'];
	   	$UpdateAgencias.="update seguimientos set agencia={$agencia} where id={$idseguimiento};";
	   	$txt = 	$UpdateAgencias;
        

	   	
	   }*/
	   $seguimientoACtual++;

  // }
   //print $seguimientoACtual;
  fclose($myfile);
   //print $this->Seguimiento->query($algo);
   //$this->Seguimiento->query($UpdateAgencias);
   }

public function recibeajax(){
	   $seguimiento = $_POST['data'];
	   $special = array("id", "numeroDestino");
	   foreach ($seguimiento as $key => $value) {
	   	 if (! in_array($key, $special)) {
	   	 	$this->request->data['Seguimiento'][$key]= $value;
	   	 }
	   	
	   }
	   $this->request->data['Seguimiento']['CUR_AUA']=0;
		   $this->request->data['Seguimiento']['FLA']=0;
		   $this->request->data['Seguimiento']['EUR']=0;
		   $this->request->data['Seguimiento']['MEX']=0;
		   $this->request->data['Seguimiento']['FLA_CUN']=0;
		   $this->request->data['Seguimiento']['FLA_MQT']=0;
		   $this->request->data['Seguimiento']['SURA_VER']=0;
		    $this->request->data['Seguimiento']['CXC']=0;
		    $this->request->data['Seguimiento']['PTY']=0;
		    $this->request->data['Seguimiento']['FLA_NY']=0;
		    $this->request->data['Seguimiento']['NY_CUN']=0;
		    $this->request->data['Seguimiento']['SURA_COMB_PER']=0;
		    $this->request->data['Seguimiento']['HW']=0;
		    $this->request->data['Seguimiento']['EUR2']=0;
			$this->request->data['Seguimiento']['ORM']=0;
	   $destino=$seguimiento['destino'];
		   foreach($destino as $dest){
			   switch($dest){
						  case "1":
						   $this->request->data['Seguimiento']['CUR_AUA']=$dest;
						  break;
						  case "2":
						   $this->request->data['Seguimiento']['FLA']=$dest;
						  break;
						  case "3":
						   $this->request->data['Seguimiento']['EUR']=$dest;
						  break;
						  case "4":
						   $this->request->data['Seguimiento']['MEX']=$dest;
						  break;
						  case "5":
						   $this->request->data['Seguimiento']['FLA_CUN']=$dest;
						  break;
						  case "6":
						   $this->request->data['Seguimiento']['FLA_MQT']=$dest;
						  break;
						  case "7":
						   $this->request->data['Seguimiento']['SURA_VER']=$dest;
						  break;
						  case "8":
						   $this->request->data['Seguimiento']['CXC']=$dest;
						  break;
						  case "9":
						   $this->request->data['Seguimiento']['PTY']=$dest;
						  break;
						  case "10":
						   $this->request->data['Seguimiento']['FLA_NY']=$dest;
						  break;
						  case "11":
						   $this->request->data['Seguimiento']['NY_CUN']=$dest;
						  break;
						  case "12":
						   $this->request->data['Seguimiento']['SURA_COMB_PER']=$dest;
						  break;
						  case "13":
						   $this->request->data['Seguimiento']['HW']=$dest;
						  break;
                          case "14":
						   $this->request->data['Seguimiento']['EUR2']=$dest;
						  break;
						  case "15":
						   $this->request->data['Seguimiento']['ORM']=$dest;
						  break;
				   }
		   }
	   $id = $seguimiento['id'];
	   if ( $id != 0) {
	       $this->Seguimiento->id = $id;
	   	   $this->Seguimiento->save($this->request->data);
	   	   echo -1;
	   }else {
	   	$this->add();
	   }

	   
   }
   
    public function cargarBita() {
	   
	   $id =$_POST['id'];
	   $bitacora=$this->Seguimiento->query("SELECT * FROM bitacora WHERE seguimientos_id = {$id}");
	   //$part = $_POST['part'];
	   //$part = $part * 1;
	   $bita1= $bitacora;  //array_slice($bitacora,$part, 2);
       $count = 0;
	   $almacenbitacoras=array();
		foreach($bita1 as $bit){
			$idusuariobitacora=$bit['bitacora']['users_id'];
			$condiciones = array('Users.id'=>$idusuariobitacora);
	        $usuariobitacora = $this->Seguimiento->Users->find('first',array('conditions'=>$condiciones));
			$nombreusuario=$usuariobitacora['Users']['nombre'];
			$count++;
			//$ingresosbitacora=preg_replace("'"," ",$bit['bitacora']['ingreso']);
			$bitacoras=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9$#()\']/', ' ',$bit['bitacora']['ingreso']);
		   $almacenbitacoras[$count]["id"]=$bit['bitacora']['id'];
		   $almacenbitacoras[$count]["idseguimiento"]=$bit['bitacora']['seguimientos_id'];
		   $almacenbitacoras[$count]["usuario"]=$bit['bitacora']['users_id'];
		   $almacenbitacoras[$count]["nombreUsuario"]=$nombreusuario;
		   $almacenbitacoras[$count]["ingreso"]=$bitacoras;
		   $almacenbitacoras[$count]["llamadaEfectiva"]=$bit['bitacora']['llamadaEfectiva'];
		   $almacenbitacoras[$count]["fecha"]=$bit['bitacora']['fecha'];
		   $almacenbitacoras[$count]["hora"]=$bit['bitacora']['hora'];   
		}

		header('Content-type: application/json; charset=utf-8');
		echo json_encode($almacenbitacoras, JSON_FORCE_OBJECT);

	   
	   
   }

   
   //@eduardo:Función para recibir desde ajax la bitacora e ingresarla a la base de datos
   //Entrada: NInguna
   //Salida: Bitacora en la bd
    public function recibeBitacora(){
		$iduser=$_POST['usuario'];
		$idseguimiento=$_POST['idseguimiento'];
		$texto=$_POST['ingreso'];
		$llamadaEfectiva=$_POST['llamadaEfectiva'];
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		$condiciones = array('Users.id'=>$iduser);
		$users = $this->Seguimiento->Users->find('first',array('conditions'=>$condiciones));
		$nombreusuario=$users['Users']['nombre'];
		$respuesta=$this->Seguimiento->salvabitacora($iduser,$idseguimiento,$texto,$llamadaEfectiva, $fecha, $hora);
		$bitacoraaenviar=$respuesta;
		$subeno=$this->Seguimiento->query("update seguimientos set bitacora=1 where id='$idseguimiento'");
		$subeno=$this->Seguimiento->query("update seguimientos set ultimo_contacto='$fecha' where id='$idseguimiento'");
		print_r($bitacoraaenviar);
	}
	//@eduardo:Función para enviar correos, si es desde el dev se hace por funcion mail, si es por produccion lo hace desde pear
   //Entrada: Id del seguimiento
   //Salida: Envio de correo con la información
	public function enviacorreo($seguimientoid){
	   require_once "Mail.php";
		require_once 'Mail/mime.php';
		$nombre="";
		$email=$this->request->data['Seguimiento']['email'];
		$fecha=date("Y-m-d");
		$primero='';
		$ultimo='';
		$mailenvio=base64_encode($email);
		$arraydestino = array();
	    array_push($arraydestino,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
		$contador=" ";
		$esta=0;
		$arrayinfo=array();
		$arrayinfo['CURAZAO & ARUBA']=array('dias'=>'7','texto'=>'Junio & Diciembre','desc'=>'Playa, brisa y mar - Hoteles todo incluido - encuentro con delfines - chiva rumbera','color'=>'#511644','viaje'=>'1','descripcion'=>'2');
	
		$arrayinfo['FLORIDA']=array('dias'=>'15','texto'=>'Junio & Diciembre','desc'=>'Orlando-Crucero a Bahamas & Miami','color'=>'#5C4490','viaje'=>'3','descripcion'=>'4');
		$arrayinfo['EUROPA']=array('dias'=>'26','texto'=>'Junio','desc'=>'10 países & Crucero por el Mediterráneo','color'=>'#A66C58','viaje'=>'5','descripcion'=>'6');
		$arrayinfo['CANCUN - RIVIERA MAYA & DF']=array('dias'=>'10','texto'=>'Junio & Diciembre','desc'=>'Cancún - Rivera Maya & D.F.','color'=>'#93594E','viaje'=>'7','descripcion'=>'8');
		$arrayinfo['FLORIDA & CANCUN']=array('dias'=>'20','texto'=>'Junio & Diciembre','desc'=>'Orlando - Crucero a Bahamas - Miami - Rivera Maya & Cancún','color'=>'#E34CE9','viaje'=>'9','descripcion'=>'10');
		$arrayinfo['FLORIDA - CHICAGO & MARQUETTE']=array('dias'=>'20','texto'=>'Diciembre','desc'=>'Orlando - Crucero a Bahamas - Miami - Chicago & Marquette','color'=>'#196F9E','viaje'=>'1','descripcion'=>'2','viaje'=>'11','descripcion'=>'12');
		$arrayinfo['SURAMERICA VERANO']=array('dias'=>'17','texto'=>'Diciembre','desc'=>'Buenos Aires - Iguazú - Rio de Janeiro - El Calafate - Ushuaia & Crucero a Montevideo y Punta del Este','color'=>'#4DA769','viaje'=>'13','descripcion'=>'14');
		//$arrayinfo['CRUCERO POR EL CARIBE']=array('dias'=>'6','texto'=>'Junio & Diciembre de 2013','desc'=>'','color'=>'#932797','viaje'=>'15','descripcion'=>'16');
		$arrayinfo['ORLANDO & MIAMI']=array('dias'=>'6','texto'=>'Junio & Diciembre','desc'=>'Playa y Ciudad','color'=>'#009900','viaje'=>'17','descripcion'=>'18');
		$arrayinfo['PANAMA']=array('dias'=>'6','texto'=>'Junio & Diciembre','desc'=>'Playa y Ciudad','color'=>'#009900','viaje'=>'17','descripcion'=>'18');
		$arrayinfo['FLORIDA & NEW YORK']=array('dias'=>'20','texto'=>'Junio','desc'=>'Orlando - Crucero a Bahamas - Miami - Washington - Cataratas del Niagara & New York','color'=>'#C4813A','viaje'=>'19','descripcion'=>'20');
		$arrayinfo['NEW YORK & CANCUN']=array('dias'=>'20','texto'=>'Junio','desc'=>'Washington - Cataratas del Niagara - New york - Crucero a Bahamas - Miami - Rivera Maya & Cancún','color'=>'#27186B','viaje'=>'21','descripcion'=>'22');
		$arrayinfo['SURAMERICA COMBINACION PERFECTA']=array('dias'=>'17','texto'=>'Junio','desc'=>'Buenos Aires - Iguazú - Rio de Janeiro - Ushuaia & El Calafate','color'=>'#4F5E4B','viaje'=>'23','descripcion'=>'24');
		$arrayinfo['HAWAII']=array('dias'=>'14','texto'=>'Junio','desc'=>'Honolulu, Los Angeles, Las Vegas & Grand Canyon','color'=>'#F93344','viaje'=>'25','descripcion'=>'26');
		$arrayinfo['EUROPA & CRUCERO ISLAS GRIEGAS']=array('dias'=>'31','texto'=>'Junio','desc'=>'13 países: Inglaterra, Francia, Alemania, Republica Checa, Eslovaquia, Suiza, Liechtenstein, Austria, Italia, España, Croacia, Islas Griegas y Turquía','color'=>'#FF9900','viaje'=>'27','descripcion'=>'28');
			
		$codigohtml = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
 <div style="width: 720px; margin:auto" align="center">
   <div style="width:100%; float:left; text-align:left;">
    <a href="http://www.viajesde15.com/"><img src="http://www.viajesde15.com/imgs/logo_rociodecastiblanco.png" border="0" width="261"/></a>
   </div>
   <div style="width:100%;text-align: center;font-family:Verdana, Geneva, sans-serif; font-size:14px;" align="center">
     <div style="width: 100%;text-align: justify; color:#6d00d9">
     Cordial saludo <strong>Señor(a)'.strtoupper($this->request->data['Seguimiento']['nombrequienllama']).':</strong><br /><br />
     Somos Rocio de Castiblanco Viajesde15.com, más que un viaje una Experiencia de Vida Inn...Olvidable.<br /><br />
     Todos nuestros programas han sido diseñados con los mejores destinos, actividades innovadoras y teniendo en cuenta cada detalle para que nuestras Quinceañeras aprovechen y disfruten al máximo de esta experiencia y tengan la Mejor Celebración.<br /><br />
     Atendiendo su solicitud enviamos a continuación la información detallada de Nuestros Viajes de 15:<br /><br />
     </div>
     <div style="width: 90%; border-left: solid 1px #CFBFFF; border-right: solid 1px #CFBFFF; color:#CFBFFF;-moz-border-top-left-radius: 10px 5px;border-top-left-radius: 10px 5px;-moz-border-top-right-radius: 10px 5px;border-top-right-radius: 10px 5px; text-align:center; margin-left:2.5em;" align="center">
       <div style="width:100%; background-color:#99b3ff;text-align:center; color:#fff; font-family:Verdana, Geneva, sans-serif; font-size:12px;-moz-border-top-left-radius: 10px 5px;border-top-left-radius: 10px 5px;-moz-border-top-right-radius: 10px 5px;border-top-right-radius: 10px 5px;">
         TODOS NUESTROS DESTINOS CON SALIDAS GARANTIZADAS <strong></strong><br/> INSCRIPCIONES ABIERTAS PARA 2015 y 2016
      </div>
	  <table style="width:100%" cellspacing="0">
	  <tr style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#000">
	   <td style="border-bottom:solid 1px #CFBFFF">VIAJES DE 15</td>
	   <td style="border-bottom:solid 1px #CFBFFF">FECHAS DE SALIDA</td>
	   <td style="border-bottom:solid 1px #CFBFFF">DESCARGA</td>
	  </tr>';
      $destinos=$this->Seguimiento->query(" SELECT * FROM `destinos` where (id <> 7) AND  (id <> 8) AND (id <> 12) AND (id <> 15) ORDER BY FIELD(id,'3','14','11','5','10','2','4','1','9','6','13') ");
		foreach($destinos as $destino){
			$iddes=$destino['destinos']['id'];
			foreach($arraydestino as $destinosesc){
			  if($contador!=strtoupper($destino['destinos']['nombre'])){	
				$nombre=strtoupper($destino['destinos']['nombre']);
					  $ultimo.='<tr style="border-bottom:solid 1px #CFBFFF"><td width="65%" style="border-bottom:solid 1px #CFBFFF"><div style="float:left;font-family:Verdana, Geneva, sans-serif; font-size:13px; color:'.$arrayinfo[$nombre]["color"].'; text-align:left; vertical-align:baseline; padding-left:0.2em">
       <strong> '.$nombre.'('.$arrayinfo[$nombre]["dias"].' días)</strong><br/>
		<div style="font-size:12px">'.$arrayinfo[$nombre]["desc"].'</div>
       </div></td>
       <td width="20%" style="border-bottom:solid 1px #CFBFFF"><div style="float:left;font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#4c0066; text-align: justify; vertical-align:baseline">
        '.$arrayinfo[$nombre]["texto"].'
       </div></td>
       <td width="15%" style="border-bottom:solid 1px #CFBFFF;padding-left:0.5em"><div style="float:left;font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#4c0066; text-align: center; vertical-align:baseline;padding-left:0.5em">
        <strong><a href="http://www.viajesde15.com/eMarketing/formulariosmariposa/verPrograma.php?p='.$arrayinfo[$nombre]["viaje"].'&mail='.$mailenvio.'" style=" text-decoration:none">·Folleto<a>&nbsp;&nbsp;&nbsp;</strong>
       </div></td>
       </tr>';
	           $contador=strtoupper($destino['destinos']['nombre']);
			   $iddestinoseumiento=$this->Seguimiento->query("select * from destinos_seguimientos where seguimiento_id=$seguimientoid and destino_id=$iddes");
			   $esta=count($iddestinoseumiento);
			   if($esta!=0){
			   $iddestinoseumiento= $iddestinoseumiento[0]["destinos_seguimientos"]["id"];
			   $idfolleto=$destino['destinos']['idfolleto'];
			   //$this->Seguimiento->agregatracker($email, $idfolleto, $fecha, $iddestinoseumiento); 
			   $contador=strtoupper($destino['destinos']['nombre']);
			   }
			  }
			}
		}
		$idusuario=$this->request->data['Seguimiento']['agente'];
        $usuario=$this->Seguimiento->query("select * from users where id=$idusuario"); 
	    $nombreusuario=$usuario[0]['users']['nombre'];
		$emailusuario=$usuario[0]['users']['email'];
		$clavemail=$usuario[0]['users']['clavemail']; 
     $codigohtml.=$ultimo.'</table>
	 </div><br />
	 <div style="text-align:center; color:#D24DFF">
      <strong> SEPARA TU CUPO AHORA!!!</strong>
      </div>
	  <br/>
     <div style="width: 100%;text-align: justify; color:#6d00d9">
     Asesoría Personalizada para cualquier trámite de la visa si lo requiere, les damos la carpeta con un listado muy completo de los documentos, las cartas listas para autenticar, diligenciamiento de formulario, etc.<br /><br />
     Agradecemos confirmar el recibimiento de esta información y quedamos atentos para resolver cualquier duda,  los invitamos a ver fotos, videos y comentarios de nuestros viajes en www.viajesde15.com<br /><br /><br /><br />
     Cordialmente,<br /><br />
     <font style=" font-size:20px; color:#DE70FF">'.strtoupper($nombreusuario).'</font><br />';
     $cargo="Asesor(a) Excursiones Quinceañeras<br />";
     if (strpos(strtoupper($nombreusuario),"ROCIO")>-1)
     {
       $cargo="Gerente General<br />";
     }
     
     $codigohtml.=$cargo.'PBX: 6183048 - 7432175 FAX: 7550302<br /><br />
	 <a href="http://www.youtube.com/watch?feature=player_embedded&v=hy8tQbUrZi4" style="font-family:Verdana, Geneva, sans-serif;">Conócenos haciendo click aquí</a><br/>
     <font style=" font-size:16px; color:#DE70FF">Línea Gratuita Nacional:</font> 018000-181516<br /> 
     Cel: 310 - 2197011<br />
     Bogotá, carrera 13 A # 89 - 38 Ofc 411<br />
     <font style=" font-size:16px; color:#DE70FF"><a href="http:/www.viajesde15.com" style="font-size:16px; color:#DE70FF">www.viajesde15.com</a></font><br />
     <br />
	      <br>
     <div style="text-align:center">
       <h3 style="color: #3CF">Conoce más de nosotros y nuestros eventos </h3>
       <a href="https://www.youtube.com/watch?v=sKgUjuYb4nU" target="_blank">Comercial para Televisión (Ver Video)</a> | <a href="https://www.youtube.com/watch?v=zPLeSuj5gUA" target="_blank">Piso 21: Artista Exclusivo de  Glam Party (Ver Video) <br /> <a href="https://www.youtube.com/watch?v=uN2ltHcEb60" target="_blank">Otros artistas invitados (Ver Video)</a><br><br>
     </div>
     <p>&nbsp;</p>
     <br /><br />
     <div style="text-align:center"><h3>Testimonios de familias que han vivido esta experiencia</h3>
       <a href="https://www.youtube.com/watch?v=29aTvIOytXA">Testimonio 1</a> | <a  href="https://www.youtube.com/watch?v=jP5AvdSjuAY">Testimonio 2</a> | <a href="https://www.youtube.com/watch?v=xeRvJLw5Wzs">Testimonio 3</a> | <a href="https://www.youtube.com/watch?v=CxMchc7LZio">Testimonio 4</a> | <a href="https://www.youtube.com/watch?v=UNc_jg48Uuc"> Testimonio 5</a></p>
   </div>
     <p><br>
       <br>
     </p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <div style="text-align:center;color: #DBDBDB;font-size:12px">  
      AGENCIA DE VIAJES<br />
      ESPECIALIZADOS EN VIAJES DE 15<br />
      Liderazgo, Experiencia, Compromiso, Seguridad,<br />
      Calidad en el Servicio, Destinos Diferentes,<br /> 
      Salidas Garantizadas, Asesoría en Trámite de Visas<br />
      y mucho más.
     </div>
     <br /><br /><br /><br /><br />
     <div style="text-align:center; color:#A0A0A8; font-size:12px">  
CLAUSULA DE RESPONSABILIDAD: ROCIO DE CASTIBLANCO VIAJESDE15.COM AGENCIA DE VIAJES Y TURISMO, ESTA SUJETA AL REGIMEN DE RESPONSABILIDAD QUE ESTABLECE LA LEY 300/96, Decreto 1075/97, Decreto 2438/10 y las normas que los modifiquen, adicionen o reformen.
<br /><br />
Estamos comprometidos con la causa en contra de la explotación, violencia y abuso sexual de menores de edad conforme la ley 679 de 2001

<br /><br />
Respondiendo a su solicitud enviamos esta información al correo proporcionado. De acuerdo a nuestra política de manejo de información de datos personales (Ley Estatutaria 1581 de 2012 y en el Decreto 1377 de 2013), que podrá ser consultada en nuestra página web www.viajesde15.com.
     </div>
    </div>
   </div> 
   </div>
 </div>
</body>
</html>';
        $asunto = utf8_decode('Rocio de Castiblanco Viajesde15.com Información de Nuestros Destinos');
        $from = $emailusuario;
        $to = $email;
        $subject = $asunto;
        $html = $codigohtml;  // HTML version of the email
		$crlf = "\n";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = $emailusuario;
        $password = $clavemail;
        $headers = array ('From' => $from,
          'To' => $to,
		  'Return-Path'   => $from,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));
        $mime = new Mail_mime($crlf);
		$mime->setHTMLBody($html);
		$mimeparams['html_charset']="UTF-8"; 
		$body = $mime->get($mimeparams);
        $headers = $mime->headers($headers);
        $mail = $smtp->send($to, $headers, $body);
		//@eduardo:Envia el código a traves de la función mail de php
		//$cabeceras = "Content-type: text/html\r\n";
        //mail($email,$asunto,$codigohtml,$cabeceras);
    }
//@eduardo:Función para transferir seguimeintos de un usuario a otro
   //Entrada: Ninguno
   //Salida: Segumiento tansferido y actulizados los campos en la bd
 public function transferencia(){
	 $idusuario=$_POST['iduser'];
	 $usuariotransferencia = $this->Seguimiento->query("select id from users where nombre='$idusuario'");
	 $idusuario=$usuariotransferencia[0]['users']['id'];
	 $nombreusuarionuevo=$_POST['iduser'];
	 $idseguimiento=$_POST['idseguimiento'];
	 $idantiguo=$_POST['idantiguo'];
	 $idusuarioantiguo=$_POST['iduserantiguo'];
	 $ID=$this->Seguimiento->transferir($idusuario, $idseguimiento, $idantiguo, $nombreusuarionuevo, $idusuarioantiguo);
	 echo $ID;
 }
 //@eduardo:Función para borrar notificaciones
   //Entrada: Ninguno
   //Salida: Se borra notificación de la base de datos.
 public function borrarNotificacion(){
	 $cont=0;
	 $id=0;
	 $idseguimientoactual=$this->request->query['idseguimiento'];
	 $datosseguimiento=$this->Seguimiento->query("select email from seguimientos where id='$idseguimientoactual'");
	 $emailuser=$datosseguimiento[0]['seguimientos']['email'];
	 $resultado=$this->Seguimiento->borrarNotificacion($idseguimientoactual,$emailuser);
     /*$destinosseguimientos = $this->Seguimiento->query("select * from destinos_seguimientos where seguimiento_id='$idseguimientoactual'");
	 foreach($destinosseguimientos as $info){
		 $datoaactualziar=$info['destinos_seguimientos']['id'];
		 $this->Seguimiento->query("update trackers set revisado=1 where destinos_seguimientos_id=$datoaactualziar");
		 $id.=$datoaactualziar;
	 }
	 $this->Seguimiento->query("update seguimientos set transferencia=0,vinculacion=0 where id='$idseguimientoactual'");
	 echo $id;*/
 }
  //@eduardo:Función para agregar medio a la base de datos
   //Entrada: Ninguno
   //Salida: Se ingresa el medio en la base de datos.
 public function agregamedio(){
	 $idmedio=-1;
	 $medio= $_POST['medio'];
	 $esta=$this->Seguimiento->query("select * from agencias where nombre='$medio'");
	 if(empty($esta)){
		  $idmedio=$this->Seguimiento->agregarAgencia($medio);
	 }
	 echo $idmedio;
 }
  //@eduardo:Función para reenviar correos
   //Entrada: Ninguno
   //Salida: Se reenvia el correo al destino seleccionado.
 public function reenviarcorreo(){
	 $this->request->data['Seguimiento']['agente']=$_POST['user'];
	 $destino=$_POST['destinoquin'];
	 $this->request->data['Destino']['Destino']=$destino;
	 $this->request->data['Seguimiento']['email']=$_POST['email'];
	 $id=$_POST['id'];
	 $this->request->data['Seguimiento']['nombrequienllama']=$_POST['nombre'];
	 $this->enviacorreo($id);
	 echo "Se ha reenviado el correo con exito";
 }
 
 public function borrarcache() 
{
	clearCache(); 
}

 public function mantenerConexion() 
{
	$this->autoRender=false;
	$esta=$this->Seguimiento->query("select id from users ");
	if ($esta)
	 echo "conectado";
}
  
 
 
}
 ?>
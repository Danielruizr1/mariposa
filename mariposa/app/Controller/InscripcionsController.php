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
class InscripcionsController extends AppController {

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
		if ($this->request->is('post')) {
			$this->Inscripcion->create();
			print_r($this->request->data);
			if ($this->Inscripcion->save($this->request->data)) {
				$this->Session->setFlash(__('El Inscripcion ha ingresado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El Inscripcion no se ha podido guardar, por favor intentelo más tarde.'));
			}
		}
		//@eduardo:Se cuadra el ingreos por ajax con CakePhp
		else if($this->request->is('ajax')){
			$this->Inscripcion->create();
			if ($this->Inscripcion->save($this->request->data)) {
				//$this->Session->setFlash(__('El Inscripcion ha ingresado correctamente'));
				//$this->redirect(array('action' => 'index'));}
				echo $this->Inscripcion->id;
				
			} else {
				$this->Session->setFlash(__('El Inscripcion no se ha podido guardar, por favor intentelo más tarde.'));
			}
		}
		$users = $this->Inscripcion->Users->find('list',array('fields'=>array('username')));
		$departamentos = $this->Inscripcion->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Inscripcion->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Inscripcion->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Inscripcion->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Inscripcion->Medio->find('list',array('fields'=>array('nombre')));
		$this->set(compact('users', 'departamentos', 'ciudades', 'agencias', 'destinos', 'medios'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Inscripcion->id = $id;
		if (!$this->Inscripcion->exists()) {
			throw new NotFoundException(__('Invalid seguimiento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Inscripcion->save($this->request->data)) {
				$this->Session->setFlash(__('La inscripcion se ha editado ingresado correctamente'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El seguimiento no se ha podido editar, por favor intentelo más tarde.'));
			}
		} 
		//@eduardo:Se cuadra el ingreos por ajax con CakePhp
		else if($this->request->is('ajax')){
			if ($this->Inscripcion->save($this->request->data)) {
				echo -1;
			}
		}
		else {
			$this->request->data = $this->Inscripcion->read(null, $id);
		}
		$users = $this->Inscripcion->Users->find('list',array('fields'=>array('username')));
		$departamentos = $this->Inscripcion->Departamentos->find('list',array('fields'=>array('nombre')));
		$ciudades = $this->Inscripcion->Ciudades->find('list',array('fields'=>array('nombre')));
		$agencias = $this->Inscripcion->Agencia->find('list',array('fields'=>array('nombre')));
		$destinos = $this->Inscripcion->Destino->find('list',array('fields'=>array('nombre')));
		$medios = $this->Inscripcion->Medio->find('list',array('fields'=>array('nombre')));
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
	/*$estado =  $this->request->query['estados'];
if($estado == "2"){
		$id = $this->request->query['id'];
		$subeno=$this->Seguimiento->query("update seguimientos set fase=10 where id={$id}");
		$subeno=$this->Seguimiento->query("update seguimientos set interes=1 where id={$id}");    
		  
	  } if($estado == "3"){
		$id = $this->request->query['id'];
		$subeno=$this->Seguimiento->query("update seguimientos set interes=3 where id={$id}");
		$subeno=$this->Seguimiento->query("update seguimientos set fase=10 where id={$id}");  
	  }else {
	   $ultContacto = $this->request->query['ultimoContacto'];
	   $id = $this->request->query['id'];
	   $subeno=$this->Seguimiento->query("update seguimientos set ultimo_contacto='$ultContacto' where id={$id}");
	  }
	  $id = $this->request->query['id'];
	  $destinoId = $this->request->query['destinoId'];
	  $sigla = $this->request->query['sigla'];
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

public function updateClavemail(){
	 $query = $this->Inscripcion->query("SELECT * FROM users");
	 foreach ($query as $key => $value) {
	 	
	 	foreach ($value as $k => $v) {
	 		foreach ($v as $x => $y) {
	 			if($x == "clavemail"){
	 				$hash = hash('sha256', $y);
	 				//$id = $v['id'];
	 				//$queryy = $this->Inscripcion->query("update users set clavemail = '$hash' WHERE id ='$id'");


	 			}
	 		}
	 	}
	 }

}

public function updateEstado(){
	$query = $this->Inscripcion->query("SELECT * FROM inscripcions WHERE estado is NULL");
	 foreach ($query as $key => $value) {
	 	foreach ($value as $k => $v) {
	 		
	 		foreach ($v as $x => $y) {
	 			if($x == "estado"){
	 				print_r($x);
	 				$id = $v['id'];
	 				$queryy = $this->Inscripcion->query("UPDATE inscripcions set estado = 1 WHERE id ='$id'");


	 			}
	 		}
	 	}
	 }

}

public function recibeajax(){
	   $inscripcion = $_POST['data'];
	   foreach ($inscripcion as $key => $value) {
	   	 	$this->request->data['Inscripcion'][$key]= $value;
	   	
	   }
	   $this->Inscripcion->save($this->request->data);
	   echo json_encode(-2);
   }
   
      public function guardaDocumento(){
      	$id = $_POST['inscripcionID'];
        $nombre = $_POST['documento'];
        $query = $this->Inscripcion->query("insert into inscripdocumentos (inscripcion_id, doc_id) values ('$id', '$nombre')");
        $id=$this->Inscripcion->query("SELECT MAX(id) as id FROM inscripdocumentos");
        echo json_encode($id[0][0]['id']);
      }

       public function updateDocumento(){
      	$id = $_POST['inscripcionID'];
        $nombre = $_POST['documento'];
        $state= $_POST['state'];
        $user= $_POST['user'];
        $fecha = date("Y-m-d");
        if($state == "1"){
        $query = $this->Inscripcion->query("update inscripdocumentos set recibido = 1, fechaRecibido = '$fecha' WHERE 
        (doc_id = '$nombre' AND inscripcion_id = '$id')");
        $query = $this->Inscripcion->query("update inscripcions set docRecibido = 1 WHERE id = '$id'");
        $id=$this->Inscripcion->query("SELECT id as id FROM inscripdocumentos WHERE (doc_id = '$nombre' AND inscripcion_id = '$id') ");
        echo json_encode($id[0]["inscripdocumentos"]["id"]);
        }
        if($state == "2"){
        $query = $this->Inscripcion->query("update inscripdocumentos set aprovado = 1, fechaAprovado = '$fecha', aprovadoPor = '$user' WHERE 
        (doc_id = '$nombre' AND inscripcion_id = '$id')");
        $query = $this->Inscripcion->query("update inscripcions set docAprovado = 1 WHERE id = '$id'");
        $id=$this->Inscripcion->query("SELECT id as id FROM inscripdocumentos WHERE (doc_id = '$nombre' AND inscripcion_id = '$id') ");	
        echo json_encode($id[0]["inscripdocumentos"]["id"]);
        }
      }

      public function guardaHermana(){
      	$id = $_POST['idInsc'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $query = $this->Inscripcion->query("insert into hermanas (inscripcion_id, nombre, edad) values ('$id', '$nombre', '$edad')");
        $id1=$this->Inscripcion->query("SELECT id as id FROM hermanas WHERE (nombre = '$nombre' AND inscripcion_id = '$id') ");
        echo json_encode($id1[0]["hermanas"]["id"]);
      }
      public function guardaPago(){
      	$id = $_POST['idInsc'];
        $concepto = $_POST['concepto'];
		$realizadoPor = $_POST['realizadoPor'];
        $valor = $_POST['valorPago'];
        $currency = $_POST['currency'];
        $pendiente = $_POST['pendiente'];
        if($pendiente == 1){
        	$query = $this->Inscripcion->query("update inscripcions set pendiente = 0 where id = '$id'");
        }
        $fecha = date("Y-m-d");
        $query = $this->Inscripcion->query("insert into pagos (inscripcion_id, concepto, valor, currency, fecha, realizadoPor) values ('$id', '$concepto', '$valor', '$currency', '$fecha', '$realizadoPor')");
        $id1=$this->Inscripcion->query("SELECT id as id FROM pagos WHERE (concepto = '$concepto' AND fecha = '$fecha' AND inscripcion_id = '$id' AND valor = '$valor') ");
        echo json_encode($id1[0]["pagos"]["id"]);
      }
      public function guardaAmiga(){
      	$id = $_POST['idInsc'];
        $nombre = $_POST['nombre'];
		$destino = $_POST['destino'];
        $query = $this->Inscripcion->query("insert into amigas (inscripcion_id, nombre, destino) values ('$id', '$nombre', '$destino')");
        $id1=$this->Inscripcion->query("SELECT id as id FROM amigas WHERE (nombre = '$nombre' AND inscripcion_id = '$id') ");
        echo json_encode($id1[0]["amigas"]["id"]);
      }
	  
	        public function deletePago(){
      	$id = $this->request->query['inscripcion_id'];
        $query = $this->Inscripcion->query("DELETE FROM pagos
WHERE inscripcion_id = '$id'");
      }
	  public function deleteDoc(){
      	$id = $this->request->query['inscripcion_id'];
        $query = $this->Inscripcion->query("DELETE FROM inscripdocumentos
WHERE inscripcion_id = '$id'");
      }
	  public function updatePendiente(){
      	$id = $this->request->query['id'];
        $query = $this->Inscripcion->query("update inscripcions set pendiente = 0 where id = '$id'");
      }
	  
	  	  public function addMoneda(){
      	$dolar = $this->request->query['dolar'];
		$euro = $this->request->query['euro'];
		$fecha = date("Y-m-d");
        $query = $this->Inscripcion->query("insert into monedas (moneda, valor, fecha) values ('Dolar', $dolar, '$fecha' )");
		$query2 = $this->Inscripcion->query("insert into monedas (moneda, valor, fecha) values ('Euro', $euro, '$fecha' )");
      }
	  
	  
	   public function guardaNota(){
      	$id = $_POST['id'];
		$bitacora = $_POST['bitacora'];
        $query = $this->Inscripcion->query("update inscripdocumentos set nota = '$bitacora' WHERE id = '$id' ");
      }
	  
	  	  public function llamadas(){
      	$startDate = $this->request->query['startDate'];
		$endDate = $this->request->query['endDate'];
		
        $query = $this->Inscripcion->query("SELECT users.nombre,COUNT(bitacora.id) AS llamadasEfectivas
FROM `bitacora`
LEFT JOIN users
ON bitacora.users_id=users.id
WHERE (bitacora.fecha BETWEEN '$startDate' AND '$endDate') AND bitacora.llamadaEfectiva = 1 
 GROUP BY nombre");
       echo json_encode($query);
      }
	  
	  public function getVentas(){
      	$startDate = $this->request->query['startDate'];
		$endDate = $this->request->query['endDate'];
		
        $query = $this->Inscripcion->query("SELECT users.nombre,SUM(ventas.cantidad) AS Ventas
FROM `ventas`
LEFT JOIN users
ON ventas.user_id=users.id
WHERE (ventas.fecha BETWEEN '$startDate' AND '$endDate') 
 GROUP BY nombre");
       echo json_encode($query);
      }
	  
	  	public function sendDoc(){
		require_once "Mail.php";
		require_once 'Mail/mime.php';
      	$id = $this->request->query['inscID'];
		$email = $this->request->query['email'];
        $query = $this->Inscripcion->query("SELECT * FROM inscripdocumentos WHERE inscripcion_id = '$id' ");
		$nombre="";
        $asunto = utf8_decode('Viajesde15.com Información de Documentos');
        $to = $email;
        $subject = $asunto;
		foreach ($query as $doc){
		$apro = '<p style="font-size:22px;color:red">✖</p> ';
		$reci = '<p style="font-size:22px;color:red">✖</p>';
		if($doc['inscripdocumentos']['aprovado']){
		$apro = '<p style="font-size:22px;color:green">✓</p>';	
		}
		if($doc['inscripdocumentos']['recibido']){
		$reci = '<p style="font-size:22px;color:green">✓</p>';	
		}
        $docName = $this->Inscripcion->query("SELECT nombre FROM documentos WHERE id =".$doc['inscripdocumentos']['doc_id']);        if($doc['inscripdocumentos']['aprovadoPor']){
		$userName = $this->Inscripcion->query("SELECT nombre FROM users WHERE id =".$doc['inscripdocumentos']['aprovadoPor']);        }else{$userName[0]['users']['nombre']= " " ;}

		 $added.="<tr style='background-color: #eee;' ><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$docName[0]['documentos']['nombre']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$reci."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$apro."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripdocumentos']['fechaRecibido']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripdocumentos']['fechaAprovado']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$userName[0]['users']['nombre']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'><a target='_blank' href='http://localhost/v15/mariposa/".$doc['inscripdocumentos']['documento']."'>Ver Docuento</a></td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripdocumentos']['nota']."</td></tr>";
		}
        $html = "<html><head>	
		</head><body>
		<table style='width:100%;'>
		<tbody style=''>
		<tr style=''>
		<th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;border-left: 1px solid #777;box-shadow: inset 1px 1px 0 #999;'>Docmento</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Recibido</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Aprobado</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Fecha Recibido</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Fecha Aprobado</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Aprobado Por</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Documento</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;box-shadow: inset -1px 1px 0 #999;'>Descripción</th>
		</tr>".$added."</tbody></table></body></html>" ; // HTML version of the email
		$crlf = "\n";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "jannethcastiblanco@viajesde15.com";
        $password = "majanda&emanuel68##";
        $headers = array ('From' => $username,
          'To' => $to,
		  'Return-Path'   => $username,
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
      }
	  
	  public function sendPago(){
		require_once "Mail.php";
		require_once 'Mail/mime.php';
      	$id = $this->request->query['inscID'];
		$email = $this->request->query['email'];
        $query = $this->Inscripcion->query("SELECT * FROM pagos WHERE inscripcion_id = '$id' ");
		$nombre="";
        $asunto = utf8_decode('Viajesde15.com Información de Pagos');
        $to = $email;
        $subject = $asunto;
		foreach ($query as $doc){ 
		switch($doc['pagos']['currency']){
			case "1":
			$moneda = "Pesos";
			break;
			case "2":
			$moneda = "Dolares";
			break;
			case "3":
			$moneda = "Euros";
			break;		
			}      
		 $added.="<tr style='background-color: #eee;' ><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['concepto']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['valor']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$moneda."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['fecha']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['realizadoPor']."</td></tr>";
		}
        $html = "<html><head>	
		</head><body>
		<table style='width:100%;'>
		<tbody style=''>
		<tr style=''>
		<th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;border-left: 1px solid #777;box-shadow: inset 1px 1px 0 #999;'>Concepto</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Valor</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Moneda</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Fecha</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;box-shadow: inset -1px 1px 0 #999;'>Relizado Por</th>
		</tr>".$added."</tbody></table></body></html>" ; // HTML version of the email
		$crlf = "\n";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "jannethcastiblanco@viajesde15.com";
        $password = "majanda&emanuel68##";
        $headers = array ('From' => $username,
          'To' => $to,
		  'Return-Path'   => $username,
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
      }
	  
	  public function sendAdminDocs(){
		require_once "Mail.php";
		require_once 'Mail/mime.php';
      	$ids = $this->request->query['ids'];
        $query = $this->Inscripcion->query("SELECT * FROM inscripcions WHERE id IN ($ids) ");
		$nombre="";
		
        $asunto = utf8_decode('Viajesde15.com Información de Documentos');
        $to = "Danielruizr1@gmail.com";
        $subject = $asunto;
		foreach ($query as $doc){
         $destino = $this->Inscripcion->query("SELECT nombre FROM destinos WHERE id =".$doc['inscripcions']['destino']);
		 $added.="<tr style='background-color: #eee;' ><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripcions']['id']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripcions']['inscrita']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripcions']['nombre_quinceanera']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$destino[0]['destinos']['nombre']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripcions']['email']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripcions']['nombre']."</td></tr>";
		}
        $html = "<html><head>	
		</head><body>
		<table style='width:100%;'>
		<tbody style=''>
		<tr style=''>
		<th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;border-left: 1px solid #777;box-shadow: inset 1px 1px 0 #999;'>Seg</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'># Inscrita</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Nombre</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Destino</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Correo</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;box-shadow: inset -1px 1px 0 #999;'>Contacto</th>
		</tr>".$added."</tbody></table></body></html>" ; // HTML version of the email
		$crlf = "\n";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "jannethcastiblanco@viajesde15.com";
        $password = "majanda&emanuel68##";
        $headers = array ('From' => $username,
          'To' => $to,
		  'Return-Path'   => $username,
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
      }
	  
	  
	   public function sendUserDocs(){
		require_once "Mail.php";
		require_once 'Mail/mime.php';
      	$ids = $this->request->query['ids'];
        $query = $this->Inscripcion->query("SELECT * FROM inscripcions WHERE id IN ($ids) ");
		foreach ($query as $docs){
		
        $asunto = utf8_decode('Viajesde15.com Información de Documentos');
        $to = "Danielruizr1@gmail.com";
        $subject = $asunto;
         $inscripdocs =  $this->Inscripcion->query("SELECT * FROM inscripdocumentos WHERE inscripcion_id =".$docs['inscripcions']['id']);
foreach ($inscripdocs as $doc){
		$apro = '<p style="font-size:22px;color:red">✖</p> ';
		$reci = '<p style="font-size:22px;color:red">✖</p>';
		if($doc['inscripdocumentos']['aprovado']){
		$apro = '<p style="font-size:22px;color:green">✓</p>';	
		}
		if($doc['inscripdocumentos']['recibido']){
		$reci = '<p style="font-size:22px;color:green">✓</p>';	
		}
        $docName = $this->Inscripcion->query("SELECT nombre FROM documentos WHERE id =".$doc['inscripdocumentos']['doc_id']);        if($doc['inscripdocumentos']['aprovadoPor']){
		$userName = $this->Inscripcion->query("SELECT nombre FROM users WHERE id =".$doc['inscripdocumentos']['aprovadoPor']);        }else{$userName[0]['users']['nombre']= " " ;}

		 $added.="<tr style='background-color: #eee;' ><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$docName[0]['documentos']['nombre']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$reci."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$apro."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripdocumentos']['fechaRecibido']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripdocumentos']['fechaAprovado']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$userName[0]['users']['nombre']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'><a target='_blank' href='http://localhost/v15/mariposa/".$doc['inscripdocumentos']['documento']."'>Ver Docuento</a></td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['inscripdocumentos']['nota']."</td></tr>";
		}
        $html = "<html><head>	
		</head><body>
		<table style='width:100%;'>
		<tbody style=''>
		<tr style=''>
		<th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;border-left: 1px solid #777;box-shadow: inset 1px 1px 0 #999;'>Docmento</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Recibido</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Aprobado</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Fecha Recibido</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Fecha Aprobado</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Aprobado Por</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Documento</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;box-shadow: inset -1px 1px 0 #999;'>Descripción</th>
		</tr>".$added."</tbody></table></body></html>" ; // HTML version of the email
		$crlf = "\n";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "jannethcastiblanco@viajesde15.com";
        $password = "majanda&emanuel68##";
        $headers = array ('From' => $username,
          'To' => $to,
		  'Return-Path'   => $username,
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
		}
      }
	  
	  
	  
	  	   public function sendUserPagos(){
		require_once "Mail.php";
		require_once 'Mail/mime.php';
      	$ids = $this->request->query['ids'];
        $query = $this->Inscripcion->query("SELECT * FROM inscripcions WHERE id IN ($ids) ");
		foreach ($query as $docs){
		
        $asunto = utf8_decode('Viajesde15.com Información de Pagos');
        $to = "Danielruizr1@gmail.com";
        $subject = $asunto;
         $pagos =  $this->Inscripcion->query("SELECT * FROM pagos WHERE inscripcion_id =".$docs['inscripcions']['id']);
foreach ($pagos as $doc){
switch($doc['pagos']['currency']){
			case "1":
			$moneda = "Pesos";
			break;
			case "2":
			$moneda = "Dolares";
			break;
			case "3":
			$moneda = "Euros";
			break;		
			}      
		 $added.="<tr style='background-color: #eee;' ><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['concepto']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['valor']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$moneda."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['fecha']."</td><td style='border: 1px solid black;border-collapse: collapse;padding: 5px;text-align: left;border-right: 1px solid #fff;border-left: 1px solid #e8e8e8;border-top: 1px solid #fff;border-bottom: 1px solid #e8e8e8;padding: 10px 15px;position: relative;transition: all 300ms;'>".$doc['pagos']['realizadoPor']."</td></tr>";
		}
        $html = "<html><head>	
		</head><body>
		<table style='width:100%;'>
		<tbody style=''>
		<tr style=''>
		<th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;border-left: 1px solid #777;box-shadow: inset 1px 1px 0 #999;'>Concepto</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Valor</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Moneda</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;'>Fecha</th><th style='background-color: #96689F;border-left: 1px solid #555;border-right: 1px solid #777;border-top: 1px solid #555;  border-bottom: 1px solid #333;box-shadow: inset 0 1px 0 #999;color: #fff;font-weight: bold;padding: 10px 15px;position: relative;text-shadow: 0 1px 0 #000;box-shadow: inset -1px 1px 0 #999;'>Relizado Por</th>
		</tr>".$added."</tbody></table></body></html>" ; // HTML version of the email
		$crlf = "\n";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "jannethcastiblanco@viajesde15.com";
        $password = "majanda&emanuel68##";
        $headers = array ('From' => $username,
          'To' => $to,
		  'Return-Path'   => $username,
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
		}
      }
	  
	  
	  
        public function guardaFoto(){
         $destino1 = $_POST["destino"];
         $destino = str_replace(' ', '_', $destino1);	
         $nombre1= $_POST["nombre"];
		 $extension= $_POST["extension"];
         $nombre = str_replace(' ', '_', $nombre1); 
         $mes = $_POST["mes"];
         $year = $_POST["year"];
         $id = $_POST["id"];
         $target_dir = "img/".$year."/".$mes."/".$destino."/";
         $target_dir = utf8_decode($target_dir);
         $target_file = $target_dir . $nombre. "." . $extension;
         $target_file = utf8_decode($target_file);
         if(file_exists($target_dir)){
      	 move_uploaded_file( $_FILES['image']['tmp_name'], $target_file);
      	 $query = $this->Inscripcion->query("update inscripcions set foto ='$target_file' WHERE id = '$id'");
      	 echo json_encode(basename($_FILES["image"]["name"]));
      	}else {
         mkdir($target_dir,0777,true);
      	 move_uploaded_file( $_FILES['image']['tmp_name'], $target_file);
      	 $query = $this->Inscripcion->query("update inscripcions set foto ='$target_file' WHERE id = '$id'");
      	 echo json_encode(basename($_FILES["image"]["name"]));		
      	}
      }

      public function guardaDoc(){
         $destino1 = $_POST["destino"];
         $destino = str_replace(' ', '_', $destino1);	
         $nombre1= $_POST["nombre"];
         $nombre = str_replace(' ', '_', $nombre1);
         $mes = $_POST["mes"];
         $year = $_POST["year"];
         $id = $_POST["id"];
         $target_dir = "docs/".$year."/".$mes."/".$destino."/".$nombre."/";
         $target_dir = str_replace(' ', '_', $target_dir);
         $target_dir = utf8_decode($target_dir);
         $target_file = $target_dir . utf8_decode(basename($_FILES["doc"]["name"]));
         $target_file = str_replace(' ', '_', $target_file);
         if(file_exists($target_dir)){
      	 move_uploaded_file( $_FILES['doc']['tmp_name'], $target_file);
      	 $query = $this->Inscripcion->query("update inscripdocumentos set documento ='$target_file' WHERE id = '$id'");
      	}else {
         mkdir($target_dir,0777,true);
      	 move_uploaded_file( $_FILES['doc']['tmp_name'], $target_file);
      	 $query = $this->Inscripcion->query("update inscripdocumentos set documento ='$target_file' WHERE id = '$id'");		
      	}
      }


       public function cargarBita() {
	   
	   $id = $this->request->query['id'];
	   $bitacora=$this->Seguimiento->query("SELECT * FROM bitacora WHERE seguimientos_id = {$id}");
	   $almacenbitacoras="[";
		foreach($bitacora as $bit){
			$idusuariobitacora=$bit['bitacora']['users_id'];
			$condiciones = array('Users.id'=>$idusuariobitacora);
	        $usuariobitacora = $this->Seguimiento->Users->find('first',array('conditions'=>$condiciones));
			$nombreusuario=$usuariobitacora['Users']['nombre'];
			//$ingresosbitacora=preg_replace("'"," ",$bit['bitacora']['ingreso']);
			$bitacoras=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9$#()\']/', ' ',$bit['bitacora']['ingreso']);
		   $almacenbitacoras.="{ id:"."'".$bit['bitacora']['id']."'".", idseguimiento:"."'".$bit['bitacora']['seguimientos_id']."'".", usuario:"."'".$nombreusuario."'".", ingreso:"."'".$bitacoras."'".", fecha:"."'".$bit['bitacora']['fecha']."'".", hora:"."'".$bit['bitacora']['hora']."'"."},";
		}
		$almacenbitacoras.="]";
		echo json_encode($almacenbitacoras);
	   
	   
   }

   
   //@eduardo:Función para recibir desde ajax la bitacora e ingresarla a la base de datos
   //Entrada: NInguna
   //Salida: Bitacora en la bd
    public function recibeBitacora(){
		$iduser=$_POST['usuario'];
		$idseguimiento=$_POST['idseguimiento'];
		$texto=$_POST['ingreso'];
		$fecha=date("Y-m-d");
		$hora=date("H:i:s");
		$condiciones = array('Users.id'=>$iduser);
		$users = $this->Inscripcion->Users->find('first',array('conditions'=>$condiciones));
		$nombreusuario=$users['Users']['nombre'];
		$respuesta=$this->Inscripcion->salvabitacora($iduser,$idseguimiento,$texto, $fecha, $hora);
		$bitacoraaenviar=$respuesta;
		$subeno=$this->Inscripcion->query("update inscripcions set bitacora=1 where id='$idseguimiento'");
		print_r($bitacoraaenviar);
	}
	//@eduardo:Función para enviar correos, si es desde el dev se hace por funcion mail, si es por produccion lo hace desde pear
   //Entrada: Id del seguimiento
   //Salida: Envio de correo con la información
	public function enviacorreo(){
	   require_once "Mail.php";
		require_once 'Mail/mime.php';
		$nombre="";
        $asunto = utf8_decode('Viajesde15.com Información de Nuestros Destinos');
        $to = "danielruizr1@gmail.com";
        $subject = $asunto;
        $html = "<h1>Hello</h1>";  // HTML version of the email
		$crlf = "\n";
        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "jannethcastiblanco@viajesde15.com";
        $password = "majanda&emanuel68##";
        $headers = array ('From' => $username,
          'To' => $to,
		  'Return-Path'   => $username,
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
    }
//@eduardo:Función para transferir seguimeintos de un usuario a otro
   //Entrada: Ninguno
   //Salida: Segumiento tansferido y actulizados los campos en la bd
 public function transferencia(){
	 $idusuario=$this->request->query['iduser'];
	 $usuariotransferencia = $this->Seguimiento->query("select id from users where nombre='$idusuario'");
	 $idusuario=$usuariotransferencia[0]['users']['id'];
	 $nombreusuarionuevo=$this->request->query['iduser'];
	 $idseguimiento=$this->request->query['idseguimiento'];
	 $idantiguo=$this->request->query['idantiguo'];
	 $idusuarioantiguo=$this->request->query['iduserantiguo'];
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
	 $medio=$_GET['medio'];
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
	 $this->request->data['Seguimiento']['users_id']=$this->request->query['user'];
	 $destino=$this->request->query['destinoquin'];
     $destino=explode(",",$destino);
	 $this->request->data['Destino']['Destino']=$destino;
	 $this->request->data['Seguimiento']['email']=$this->request->query['email'];
	 $id=$this->request->query['id'];
	 $this->request->data['Seguimiento']['nombre']=$this->request->query['nombre'];
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
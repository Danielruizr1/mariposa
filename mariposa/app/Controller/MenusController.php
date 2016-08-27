<?php
set_time_limit(0);
require'Classes/Rjson.php';
#require('/opt/lampp/htdocs/v15/vendor/autoload.php');

use WebSocket\Client;

App::uses('AppController', 'Controller');
class MenusController extends AppController {
var $uses = null;
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
	public $components = array('Acl', 'Security', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$iduser=$_SESSION['iduser'];
		if (empty($iduser)) {
			throw new NotFoundException(__('Invalid user'));
		}
		//@eduardo: Se toma el id del usuarioq ue ha iniciado sesión
		$iduser=$_SESSION['iduser'];
		//@eduardo: Se llaman a los modelos de los distintos componentes de la mariposa
		App::import('Model', 'User');
		App::import('Model', 'Permiso');
		App::import('Model', 'Agencia');
		App::import('Model', 'Campo');
		App::import('Model', 'Ciudade');
		App::import('Model', 'Departamento');
		App::import('Model', 'Documento');
		App::import('Model', 'Destino');
		App::import('Model', 'Hermana');
		App::import('Model', 'Moneda');
		App::import('Model', 'Amiga');
		App::import('Model', 'Destinocumento');
		App::import('Model', 'Inscripdocumento');
		App::import('Model', 'Detalledocumento');
		App::import('Model', 'Medio');
		App::import('Model', 'Tabla');
		App::import('Model', 'Pagosdestino');
		App::import('Model', 'Pago');
		App::import('Model', 'Seguimiento');
		App::import('Model', 'Inscripcion');
		App::import('Model', 'Tracker');
		//Se cuadran las variables para ser utilizadas
		$user= new User;
		$permiso= new Permiso;
		$Agencia= new Agencia;
		$Campo= new Campo;
		$Pagosdestino= new Pagosdestino;
		$Pago= new Pago;
		$Ciudad= new Ciudade;
		$Departamento= new Departamento;
		$Documento = new Documento;
		$Hermana = new Hermana;
		$Moneda = new Moneda;
		$Amiga = new Amiga;
		$Destino= new Destino;
		$Inscripdocumento= new Inscripdocumento;
		$Detalledocumento= new Detalledocumento;
		$Medio= new Medio;
		$Destinocumento = new Destinocumento;
		$Tabla= new Tabla;
		$Seguimiento= new Seguimiento;
		$Inscripcion= new Inscripcion;
		$Tracker=new Tracker;
		//Se traen todos los datos de la base de dtaos para setear las variables del padre
		$usuarios=$user->find('all',array('order' => array('User.nombre' => 'ASC')));
		$agencia= $Agencia->find('all',array('recursive'=>-1,'order' => array('Agencia.nombre' => 'ASC')));
		$campo= $Campo->find('all');
		$pagosdestino= $Pagosdestino->find('all');
		$pago= $Pago->find('all');
		$detalledocumento= $Detalledocumento->find('all');
		$inscripdocumento = $Inscripdocumento->find('all');
		$hermana = $Hermana->find('all');
		$moneda = $Moneda->find('all');
		$amigas = $Amiga->find('all');
		$ciudad= $Ciudad->find('all',array('order' => array('Ciudade.nombre' => 'ASC')));
		$departamento= $Departamento->find('all',array('order' => array('Departamento.nombre' => 'ASC')));
		$documento = $Documento->find('all');
		$destinocumento = $Destinocumento->find('all');
		$destino=$Destino->find('all',array('recursive'=>-1,'order' => array('Destino.nombre' => 'ASC')));
		$medio= $Medio->find('all');
		$tabla= $Tabla->find('all');
		$conditions = array("Seguimiento.id >" => "0");
		//$seguimiento= $Seguimiento->find('all',array('order' => array('Seguimiento.idpadre' => 'ASC'))); 
		$conditions = array("Seguimiento.id <" => "2");//@kike: Abril-3-2013 solución temporal se desactiva la carga de las no inscritas  para alivianar el proceso de carga
		
		$seguimiento = Cache::read('smm_seguimiento','longterm');
		
		  if ($seguimiento == false)
		     {
		        $seguimiento= $Seguimiento->find('all',array('order' => array('Seguimiento.id' => 'DESC'),'conditions' =>$conditions));
		     
		        Cache::write('smm_seguimiento', $seguimiento,'longterm');
		      
		     }
		
		//$seguimiento= $Seguimiento->find('all');
		$conditions = array("Tracker.id <" => "0");//@kike filtro aplicado para evitr la recarga de las notificaciones
		////$tracker=$Tracker->find('all',array('conditions' =>$conditions));
		




         $bitacora = Cache::read('smm_bitacora','longterm');
 
		     
		     
		     if ($bitacora == false)
		     {
		        $bitacora=$Seguimiento->query("SELECT bitacora.* FROM bitacora JOIN seguimientos b ON bitacora.seguimientos_id = b.id WHERE b.bitacora = 1 order by fecha desc");
				
                //print_r($bitacora);		     
		        Cache::write('smm_bitacora', $bitacora,'longterm');
		      
		     }

            $bitacora2 = Cache::read('smm_bitacora2','longterm');
 
		     
		     
		     if ($bitacora2 == false)
		     {
		        $bitacora2=$Seguimiento->query("SELECT * FROM bitacora2  order by fecha desc");
				
                //print_r($bitacora);		     
		        Cache::write('smm_bitacora2', $bitacora2,'longterm');
		      
		     }




		     $bitacoraHoy = Cache::read('smm_bitacoraHoy','longterm');		 
		     
		     
		     if ($bitacoraHoy == false)
		     {
		     	$dia = date("Y-m-d");
		        $bitacoraHoy=$Seguimiento->query("SELECT * from bitacora WHERE fecha = '$dia'");		     
		        Cache::write('smm_bitacoraHoy', $bitacoraHoy,'longterm');
		      
		     }
		      
		      $inscripciones = Cache::read('smm_inscripciones','longterm');
		 //$segIds =array();
		 //$segIds = $Seguimiento->query("select  from seguimientos WHERE bitacora = 1");
		 //$segId = RJson::pack($segId);
		 
		     
		     
		     if ($inscripciones == false)
		     {
		        $inscripciones=$Seguimiento->query("SELECT * FROM inscripcions");
				
                //print_r($bitacora);		     
		        Cache::write('smm_inscripciones', $inscripciones,'longterm');
		      
		     }
		      
		      $ventas = Cache::read('smm_ventas','longterm');
		 //$segIds =array();
		 //$segIds = $Seguimiento->query("select  from seguimientos WHERE bitacora = 1");
		 //$segId = RJson::pack($segId);
		 
		     
		     
		     if ($ventas == false)
		     {
		        $ventas=$Seguimiento->query("SELECT * FROM ventas");
				
                //print_r($bitacora);		     
		        Cache::write('smm_ventas', $ventas,'longterm');
		      
		     }
		     
		  
		
		
		//@kike:Carga de tablas intermedias para la nueva forma de carga de datos
		
		
		
		
		  $losSeguimientos = Cache::read('smm_losSeguimientos','longterm');
		
		     
		     
		     if ($losSeguimientos == false)
		     {
	         	$losSeguimientos=$Seguimiento->query("SELECT * FROM seguimientos ");
		     
		        Cache::write('smm_losSeguimientos', $losSeguimientos,'longterm');
		      
		     }
		    
		     
		
		
		
		//$agenciasSguimientos=$Seguimiento->query("select * from agencias_seguimientos");//Tabla intermedia de las agencias relacionadas con los seguimientos
		
		/*$destinoSeguimientos = Cache::read('smm_destinoSeguimientos','longterm');
	     
		     if ($destinoSeguimientos == false)
		     {
		        $destinoSeguimientos=$Seguimiento->query("select * from destinos_seguimientos ");//Tabla intermedia de las destinos relacionadas con los seguimientos 
		     
		        Cache::write('smm_destinoSeguimientos', $destinoSeguimientos,'longterm');
		      
		     }*/
		    
		     
				
		
		$mediosSeguimientos=$Seguimiento->query("select * from medios_seguimientos");//Tabla intermedia de los medios por el seguimiento
		
		//////////////////////////////////////////////////////////////////////////////
		
		//Se toman la cantidad de destinos y la suma de los observados para activar el tracker
		$cantidaddestino=0;
		$sumaobservados=0;
		//Se toma estos datos para organizar lso seguimientos 
		$arrayOrden=array(); 
		$arrayOrden2=array();
		$contador=0;
		//@eduardo: Se carga el almacen de agencias con los datos
		
		
		/*$agenciasSguimientosAlm="[";
		foreach($agenciasSguimientos as $age){ 
	     $agenciasSguimientosAlm.="{id:"."'".$age['agencias_seguimientos']['id']."'".',agencia:\''.$age['agencias_seguimientos']['agencia_id'].'\',seguimiento:\''.$age['agencias_seguimientos']['seguimiento_id'].'\'},';
		}
		$agenciasSguimientosAlm.="]";*/
		
		
		/*$destinosSguimientosAlm="[";
		foreach($destinoSeguimientos as $destinos){ 
	     $destinosSguimientosAlm.="{id:"."'".$destinos['destinos_seguimientos']['id']."'".',seguimiento:\''.$destinos['destinos_seguimientos']['seguimiento_id'].'\',destino:\''.$destinos['destinos_seguimientos']['destino_id'].'\'},';
		}
		$destinosSguimientosAlm.="]";*/
		
		
		
		
		//Almacen Agencias
		$almacenagencias="[";
		foreach($agencia as $age){ 
	     $almacenagencias.="{id:"."'".$age['Agencia']['id']."'".', name:'."'".utf8_encode(strtoupper ($age['Agencia']['nombre']))."'".'},';
		}
		$almacenagencias.="]";
		//@eduardo: Se carga el almacen de campos con los datos
		//Almacen Campos
		$almacencampos="[";
		foreach($campo as $cam){
			$almacencampos.="{id:"."'".$cam['Campo']['id']."'".', tabla:'."'".$cam['Tablas']['nombre']."'".', nombre:'."'".$cam['Campo']['nombre']."'".', tipo:'."'".$cam['Campo']['tipo']."'".'},';
		}
		 $almacencampos.="]";

		 $almacendocumentos="[";
		foreach($documento as $doc){
			$almacendocumentos.="{id:"."'".$doc['Documento']['id']."'".', nombre:'."'".$doc['Documento']['nombre']."'".'},';
		}
		 $almacendocumentos.="]";

         $almacenhermanas="[";
		foreach($hermana as $doc){
			$almacenhermanas.="{id:"."'".$doc['Hermana']['id']."'".', nombre:'."'".$doc['Hermana']['nombre']."'".', edad:'."'".$doc['Hermana']['edad']."'".', inscripcion_id:'."'".$doc['Hermana']['inscripcion_id']."'".'},';
		}
		 $almacenhermanas.="]";

         $almacenmoneda="[";
		foreach($moneda as $doc){
			$almacenmoneda.="{id:"."'".$doc['Moneda']['id']."'".', moneda:'."'".$doc['Moneda']['moneda']."'".', valor:'."'".$doc['Moneda']['valor']."'".', fecha:'."'".$doc['Moneda']['fecha']."'".'},';
		}
		 $almacenmoneda.="]";


		 $almacendetalledocumentos="[";
		foreach($detalledocumento as $doc){
			$almacendetalledocumentos.="{id:"."'".$doc['Detalledocumento']['id']."'".', docID:'."'".$doc['Detalledocumento']['docID']."'".', pregunta:'."'".$doc['Detalledocumento']['pregunta']."'".', ejemplo:'."'".$doc['Detalledocumento']['ejemplo']."'".'},';
		}
		 $almacendetalledocumentos.="]";

		 $almacenamigas="[";
		foreach($amigas as $doc){
			$almacenamigas.="{id:"."'".$doc['Amiga']['id']."'".',destino:'."'".$doc['Amiga']['destino']."'".', nombre:'."'".$doc['Amiga']['nombre']."'".', inscripcion_id:'."'".$doc['Amiga']['inscripcion_id']."'".'},';
		}
		 $almacenamigas.="]";
       
		 $almacendestinocumentos="[";
		foreach($destinocumento as $doc){
			$almacendestinocumentos.="{id:"."'".$doc['Destinocumento']['id']."'".', doc_id:'."'".$doc['Destinocumento']['doc_id']."'".', destino_id:'."'".$doc['Destinocumento']['destID']."'".'},';
		}
		 $almacendestinocumentos.="]";

		  $almaceninscripdocumentos="[";
		foreach($inscripdocumento as $doc){
			$almaceninscripdocumentos.="{id:"."'".$doc['Inscripdocumento']['id']."'".', doc_id:'."'".$doc['Inscripdocumento']['doc_id']."'".', inscripcion_id:'."'".$doc['Inscripdocumento']['inscripcion_id']."'".', aprovado:'."'".$doc['Inscripdocumento']['aprovado']."'".', recibido:'."'".$doc['Inscripdocumento']['recibido']."'".', fechaRecibido:'."'".$doc['Inscripdocumento']['fechaRecibido']."'".', fechaAprovado:'."'".$doc['Inscripdocumento']['fechaAprovado']."'".', aprovadoPor:'."'".$doc['Inscripdocumento']['aprovadoPor']."'".', nota:'."'".$doc['Inscripdocumento']['nota']."'".', documento:'."'".$doc['Inscripdocumento']['documento']."'".'},';
		}
		 $almaceninscripdocumentos.="]";
		 //@eduardo: Se carga el almacen de ciudades con los datos
		 //Almacen Ciudades
		 $almacenciudades="[";
		 foreach($ciudad as $rta){
			 $almacenciudades.="{id:"."'".$rta['Ciudade']['id']."'".', name:'."'".strtoupper ($rta['Ciudade']['nombre'])."'".', departamento:'."'".$rta['Departamentos']['id']."'".'},';
		 }
		 $almacenciudades.="]";
		 //@eduardo: Se carga el almacen de departamentos con los datos
		 //Almacen Departamento
		 $almacendepartamentos="[";
		 foreach($departamento as $dep){
			 $almacendepartamentos.="{id:"."'".$dep['Departamento']['id']."'".', name:'."'".$dep['Departamento']['nombre']."'".'},';
		 }
		 $almacendepartamentos.="]";
		 //@eduardo: Se carga el almacen de destinos con los datos
		 //Alamcen destinos
		 $almacenventas="[";
		 foreach($ventas as $des){
			 $almacenventas.="{id:"."'".$des['ventas']['id']."'".',user_id:'."'".$des['ventas']['user_id']."'".',destino:'."'".$des['ventas']['destino']."'".' ,cantidad:'."'".$des['ventas']['cantidad']."'".',fecha:'."'".$des['ventas']['fecha']."'".'},';
		 }
		 $almacenventas.="]";
		 $almacenpagosdestino="[";
		 foreach($pagosdestino as $des){
			 $almacenpagosdestino.="{id:"."'".$des['Pagosdestino']['id']."'".',destino_id:'."'".$des['Pagosdestino']['destino_id']."'".',pago:'."'".$des['Pagosdestino']['pago']."'".' ,valor:'."'".$des['Pagosdestino']['valor']."'".',moneda:'."'".$des['Pagosdestino']['moneda']."'".'},';
		 }
		 $almacenpagosdestino.="]";
		 $almacenpagos="[";
		 foreach($pago as $des){
			 $almacenpagos.="{id:"."'".$des['Pago']['id']."'".',inscripcion_id:'."'".$des['Pago']['inscripcion_id']."'".',concepto:'."'".$des['Pago']['concepto']."'".' ,valor:'."'".$des['Pago']['valor']."'".',currency:'."'".$des['Pago']['currency']."'".', fecha:'."'".$des['Pago']['fecha']."'".', realizadoPor:'."'".$des['Pago']['realizadoPor']."'".'},';
		 }
		 $almacenpagos.="]";
		 $almacendestino="[";
		 foreach($destino as $des){
			 $almacendestino.="{id:"."'".$des['Destino']['id']."'".',sigla:'."'".$des['Destino']['sigla']."'".' ,name:'."'".utf8_encode($des['Destino']['nombre'])."'".',topeSemanal:'."'".$des['Destino']['topeSemanal']."'".',topeMensual:'."'".$des['Destino']['topeMensual']."'".' ,topeSemestral:'."'".$des['Destino']['topeSemestral']."'".'},';
		 }
		 $almacendestino.="]";
		 //@eduardo: Se carga el almacen de medios con los datos
		 //Almacen Medios
		 $almacenmedios="[";
		 foreach($medio as $med){
			 $almacenmedios.="{id:"."'".$med['Medio']['id']."'".', name:'."'".$med['Medio']['nombre']."'".'},';
		 }
		 $almacenmedios.="]";
		 //@eduardo: Se carga el almacen de tablas con los datos
		 //Almacen Tabla
		 $almacentablas="[";
		 foreach($tabla as $tab){
			 $almacentablas.="{id:"."'".$tab['Tabla']['id']."'".', nombre:'."'".$tab['Tabla']['nombre']."'".', descripcion:'."'".$tab['Tabla']['descripcion']."'".'},';
		 }
		 $almacentablas.="]";
		 //@eduardo: Se carga el almacen de seguimientos con los datos
		 //Almacen Seguimientos
		 
		   $almacenseguimientos = Cache::read('smm_almacenseguimientos','longterm');
		
	  		     
		     if ($losSeguimientos == false)
		     {
	 
		 $almacenseguimientos="[";
		foreach($seguimiento as $res){ 
		 $cantidaddestino=0;
		 $sumaobservados=0;
		 $destinoslistados="";
		 $track=0;
		  /*foreach($res['Destino'] as $destino){
			  $idbusqueda=((!empty($destino['DestinosSeguimiento']))?$destino['DestinosSeguimiento']["id"]:"");
			  $destinoslistados.=$destino['id'];
			  foreach($tracker as $track){
				  $comparador=$track['Tracker']['destinos_seguimientos_id'];
				  if(!empty($idbusqueda) && $idbusqueda==$comparador){
					  $sumaobservados+=$track['Tracker']['revisado'];
				  }
			  }
			  $cantidaddestino++;
			  if($cantidaddestino!=count($res['Destino'])){
				  $destinoslistados.=",";
			  }
		  }
		  /*if($res['Seguimiento']['id']==378){
			   //print_r($destino['id']);
			   echo $destinoslistados;
		      }*/
		  $track=$sumaobservados-$cantidaddestino;
		  $observaciones=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9$#@.\']/', ' ',$res['Seguimiento']['observacion']);
		  //$dir=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9#-\']/', ' ',$res['Seguimiento']['direccion']);
	      $seguimientosactual="{id:"."'".$res['Seguimiento']['id']."'".', agente:'."'".strtoupper ($res['Users']['nombre'])."'".', departamento:'."'".$res['Departamentos']['id']."'".', ciudad:'."'".'100'."'".', nombrequienllama:'."'".strtoupper ($res['Seguimiento']['nombre'])."'".', parentesco:'."'".$res['Seguimiento']['parentesco']."'".', fechaingreso:'."'".$res['Seguimiento']['fecha']."'".', horaingreso:'."'".$res['Seguimiento']['hora']."'".', telefono1:'."'".$res['Seguimiento']['telefono1']."'".', telefono2:'."'".$res['Seguimiento']['telefono2']."'".', telefono3:'."'".$res['Seguimiento']['telefono3']."'".', celular:'."'".$res['Seguimiento']['celular']."'".', email:'."'".strtoupper($res['Seguimiento']['email'])."'".', ciudadquin:'."'".$res['Seguimiento']['ciudad']."'".', direccion:'."'".strtoupper ($res['Seguimiento']['direccion'])."'".', fax:'."'".$res['Seguimiento']['fax']."'".', telefonooficina_padre:'."'".$res['Seguimiento']['telefonooficina_padre']."'".', telefonooficina_madre:'."'".$res['Seguimiento']['telefonooficina_madre']."'".', celular_padre:'."'".$res['Seguimiento']['celular_padre']."'".', celular_madre:'."'".$res['Seguimiento']['celular_madre']."'".', mail_padre:'."'".strtoupper ($res['Seguimiento']['mail_padre'])."'".', mail_madre:'."'".strtoupper ($res['Seguimiento']['mail_madre'])."'".', telefono_quinceanera:'."'".$res['Seguimiento']['telefono_quinceanera']."'".', mail_quinceanera:'."'".strtoupper ($res['Seguimiento']['mail_quinceanera'])."'".', celular_quinceanera:'."'".$res['Seguimiento']['celular_quinceanera']."'".', anoviaje_quinceanera:'."'".$res['Seguimiento']['anoviaje_quinceanera']."'".', mesviaje_quinceanera:'."'".$res['Seguimiento']['mesviaje_quinceanera']."'".', estado:'."'".strtoupper ($res['Seguimiento']['estado'])."'".', nombrepadre:'."'".strtoupper ($res['Seguimiento']['nombre_padre'])."'".', nombremadre:'."'".strtoupper ($res['Seguimiento']['nombre_madre'])."'".', nombrequinceanera:'."'".strtoupper ($res['Seguimiento']['nombre_quinceanera'])."'".', agencia:'."'".((!empty($res['Agencia']))?$res['Agencia'][0]['id']:"")."'".', medio:'."'".((!empty($res['Medio']))?$res['Medio'][0]['id']:"")."'".', destino:'."'".$destinoslistados."'".', observacion:'."'".strtoupper ($observaciones)."'".', tracker:'."'".$track."'".', idusuario:'."'".$res['Seguimiento']['agente']."'".', idpadre:'."'".$res['Seguimiento']['idpadre']."'".', transferencia:'."'".$res['Seguimiento']['transferencia']."'".', vinculacion:'."'".$res['Seguimiento']['vinculacion']."'".', colegio:'."'".$res['Seguimiento']['colegio']."'".', bitacora:'."'".$res['Seguimiento']['bitacora']."'"."},";
		  $idpadreactual=$res['Seguimiento']['idpadre'];
		  if($idpadreactual==0){
			 $arrayOrden['Padre'.$res['Seguimiento']['id']]=array("cuerpo"=>$seguimientosactual,"hijos"=>array()); 
		  }
		  else{
			  $temp=$arrayOrden['Padre'.$res['Seguimiento']['idpadre']]["hijos"];
			  $tamaño=count($temp)-1;
			  $temp[$tamaño]=$seguimientosactual;
			  $arrayOrden['Padre'.$res['Seguimiento']['idpadre']]["hijos"]=$temp;
		  }
		  /**/
		  $contador++;
		}//Final Foreach
		foreach($arrayOrden as $todo){
			//print_r($todo);
			$almacenseguimientos.=$todo['cuerpo'];
			if(!empty($todo['hijos'])){
				foreach($todo['hijos'] as $hijos){
					$almacenseguimientos.=$hijos;
				}
			}
		}
		$almacenseguimientos.="]";
				     
		        Cache::write('smm_almacenseguimientos', $almacenseguimientos,'longterm');
		      
		     }
		    

		    
	
		//@eduardo: Se carga el almacen de bitacoras con los datos
		//Almacen Bitacoras
		/*$bit =  RJson::pack($bitacora);
		$bita = json_encode($bit);
		$almacenbitacoras = RJson::pack($bita, $json = true);
		print_r($bita);*/
		
	    $almacenbitacoras = Cache::read('smm_almacenbitacoras','longterm'); 
		     if ($almacenbitacoras == false)
		     {
		     
		      
		
		$almacenbitacoras="[";
		foreach($bitacora as $bit){
			$idusuariobitacora=$bit['bitacora']['users_id'];
			$condiciones = array('User.id'=>$idusuariobitacora);
	        $usuariobitacora = $user->find('first',array('conditions'=>$condiciones));
			$nombreusuario=$usuariobitacora['User']['nombre'];
			//$ingresosbitacora=preg_replace("'"," ",$bit['bitacora']['ingreso']);
			$bitacoras=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9$#()\']/', ' ',$bit['bitacora']['ingreso']);
		   $almacenbitacoras.="{ id:"."'".$bit['bitacora']['id']."'".", idseguimiento:"."'".$bit['bitacora']['seguimientos_id']."'".", usuario:"."'".$bit['bitacora']['users_id']."'".", nombreUsuario:"."'".$nombreusuario."'".", ingreso:"."'".$bitacoras."'".", llamadaEfectiva:"."'".$bit['bitacora']['llamadaEfectiva']."'".", fecha:"."'".$bit['bitacora']['fecha']."'".", hora:"."'".$bit['bitacora']['hora']."'"."},";
		}
		$almacenbitacoras.="]";
		$almacenbitacoras = RJson::pack($almacenbitacoras);//"[]";//
		//$unpacked = RJson::unpack($packed);
		//print_r($almacenbitacoras);
		
		  Cache::write('smm_almacenbitacoras',$almacenbitacoras,'longterm');
		      
		     }

        $almacenbitacoras2 = Cache::read('smm_almacenbitacoras2','longterm'); 
		     if ($almacenbitacoras2 == false)
		     {
		     
		$almacenbitacoras2="[";
		foreach($bitacora2 as $bit){
			$idusuariobitacora=$bit['bitacora2']['users_id'];
			$condiciones = array('User.id'=>$idusuariobitacora);
	        $usuariobitacora = $user->find('first',array('conditions'=>$condiciones));
			$nombreusuario=$usuariobitacora['User']['nombre'];
			//$ingresosbitacora=preg_replace("'"," ",$bit['bitacora2']['ingreso']);
			$bitacoras=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9$#()\']/', ' ',$bit['bitacora2']['ingreso']);
		   $almacenbitacoras2.="{ id:"."'".$bit['bitacora2']['id']."'".", idseguimiento:"."'".$bit['bitacora2']['seguimientos_id']."'".", usuario:"."'".$bit['bitacora2']['users_id']."'".", nombreUsuario:"."'".$nombreusuario."'".", ingreso:"."'".$bitacoras."'".", fecha:"."'".$bit['bitacora2']['fecha']."'".", hora:"."'".$bit['bitacora2']['hora']."'"."},";
		}
		$almacenbitacoras2.="]";
		$almacenbitacoras2 = RJson::pack($almacenbitacoras2);
		
		  Cache::write('smm_almacenbitacoras2',$almacenbitacoras2,'longterm');
		      
		     }

		 
		 $almacenbitacorasHoy = Cache::read('smm_almacenbitacorasHoy','longterm'); 
		     if ($almacenbitacorasHoy == false)
		     {
		     
		      
		
		$almacenbitacorasHoy="[";
		foreach($bitacoraHoy as $bit){
			$idusuariobitacora=$bit['bitacora']['users_id'];
			$condiciones = array('User.id'=>$idusuariobitacora);
	        $usuariobitacora = $user->find('first',array('conditions'=>$condiciones));
			$nombreusuario=$usuariobitacora['User']['nombre'];
			//$ingresosbitacora=preg_replace("'"," ",$bit['bitacora']['ingreso']);
			$bitacoras=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9$#()\']/', ' ',$bit['bitacora']['ingreso']);
		   $almacenbitacorasHoy.="{ id:"."'".$bit['bitacora']['id']."'".", idseguimiento:"."'".$bit['bitacora']['seguimientos_id']."'".", usuario:"."'".$bit['bitacora']['users_id']."'".", ingreso:"."'".$bitacoras."'".", llamadaEfectiva:"."'".$bit['bitacora']['llamadaEfectiva']."'".", fecha:"."'".$bit['bitacora']['fecha']."'".", hora:"."'".$bit['bitacora']['hora']."'"."},";
		}
		$almacenbitacorasHoy.="]";
		$almacenbitacorasHoy = RJson::pack($almacenbitacorasHoy);//"[]";//
		//$unpacked = RJson::unpack($packed);
		//print_r($almacenbitacorasHoy);
		
		  Cache::write('smm_almacenbitacorasHoy',$almacenbitacorasHoy,'longterm');
		      
		     }
		
		
		$idusuarioactivo=$_SESSION['Auth']['User']['id'];
		$nombreusuarioactivo=$_SESSION['Auth']['User']['nombre'];
		$rolusuarioactivo=$_SESSION['Auth']['User']['rol'];
		$data=$Seguimiento->query("select * from permisos where users_id=$idusuarioactivo");
		//@eduardo: Se carga el almacen de permisos con los datos
		//Añmacen Permiso
		$almacenpermiso="[";
		foreach($data as $permiso){
			$idcampo=$permiso['permisos']['campos_id'];
			$campo=$Seguimiento->query("select * from campos where id=$idcampo");
			$nombrecampo=$campo[0]["campos"]["nombre"];
			$tipo=$campo[0]["campos"]["tipo"];
			$almacenpermiso.="{id:"."'".$permiso['permisos']['id']."'".",nombrecampo:"."'".$nombrecampo."'".",actualizar:"."'".$permiso['permisos']['actualizar']."'".",tipo:"."'".$tipo."'"."},";
		}
		$almacenpermiso.="]";
		//@eduardo: Se carga el almacen de usuarios con los datos
		//Almacen Usuarios
		$almacenusuarios="[";
		foreach($usuarios as $usuario){
			$almacenusuarios.="{id:"."'".$usuario["User"]["id"]."'".", nombre:"."'".$usuario["User"]["nombre"]."'".",correo:"."'".$usuario["User"]["email"]."'"."},";
		}
		$almacenusuarios.="]";
		$jsonseguimientos=$almacenseguimientos;
		//@eduardo: Se setea el id y el nombre del usuario
		$idusuarioactivo=$_SESSION['Auth']['User']['id'];
		$nombreusuarioactivo=$_SESSION['Auth']['User']['nombre'];
		//@eduardo: Pasa todo al padre para su procesamiento en Dojo
		$this->set('agencia',$almacenagencias);
		$this->set('campo',$almacencampos);
		$this->set('pagosdestino',$almacenpagosdestino);
		$this->set('ciudad',$almacenciudades);
		$this->set('departamento',$almacendepartamentos);
		$this->set('documento',$almacendocumentos);
		$this->set('destino',$almacendestino);
		$this->set('destinocumento',$almacendestinocumentos);
		$this->set('inscripdocumento',$almaceninscripdocumentos);
		$this->set('detalledocumento',$almacendetalledocumentos);
		$this->set('ventas',$almacenventas);
		$this->set('hermana',$almacenhermanas);
		$this->set('moneda',$almacenmoneda);
		$this->set('amiga',$almacenamigas);
		$this->set('pago',$almacenpagos);
		$this->set('medio',$almacenmedios);
		$this->set('tabla',$almacentablas);
		//$this->set('seguimiento',$jsonseguimientos);
		$this->set('bitacora',$almacenbitacoras);
		$this->set('bitacora2',$almacenbitacoras2);
		$this->set('bitacoraHoy',$almacenbitacorasHoy);
		$this->set('idusuarioactivo',$idusuarioactivo);
		$this->set('nombreusuarioactivo',$nombreusuarioactivo);
		$this->set('rolusuarioactivo',$rolusuarioactivo);
		$this->set('permisos',$almacenpermiso);
		$this->set('todos',$almacenusuarios);
		
		
		$almacenseguimientos="";
		
		//$this->set('agenciasSguimientos',$agenciasSguimientosAlm);
		//$this->set('destinoSeguimientos',$destinosSguimientosAlm);
		$this->set('mediosSeguimientos',$mediosSeguimientos);
	
		
	$almacenseguimientos = array();

     foreach($losSeguimientos as $seguimientoCursor){ 

		   $holder = array();
		   foreach($seguimientoCursor['seguimientos'] as $key => $value ){
		   	$holder[$key] = $value;
		}
		array_push($almacenseguimientos, $holder);
      }
		
		/*foreach($losSeguimientos as $seguimientoCursor){ 
		
		
		
		    $observaciones=preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚÑñ0-9$#@.\']/', ' ',$seguimientoCursor['seguimientos']['observacion']);
		
		    $seguimientosactual="{id:".$seguimientoCursor['seguimientos']['id'].', agente:'."'".$seguimientoCursor['seguimientos']['users_id']."'".', departamento:'."'0'".', ciudad:'."'".$seguimientoCursor['seguimientos']['ciudades_id']."'".', nombrequienllama:'."'".strtoupper ($seguimientoCursor['seguimientos']['nombre'])."'".', parentesco:'."'".$seguimientoCursor['seguimientos']['parentesco']."'".', fechaingreso:'."'".$seguimientoCursor['seguimientos']['fecha']."'".', horaingreso:'."'".$seguimientoCursor['seguimientos']['hora']."'".', telefono1:'."'".$seguimientoCursor['seguimientos']['telefono1']."'".', telefono2:'."'".$seguimientoCursor['seguimientos']['telefono2']."'".', telefono3:'."'".$seguimientoCursor['seguimientos']['telefono3']."'".', celular:'."'".$seguimientoCursor['seguimientos']['celular']."'".', email:'."'".strtoupper($seguimientoCursor['seguimientos']['email'])."'".', ciudadquin:'."'".$seguimientoCursor['seguimientos']['ciudad']."'".', direccion:'."'".strtoupper ($seguimientoCursor['seguimientos']['direccion'])."'".', fax:'."'".$seguimientoCursor['seguimientos']['fax']."'".', telefonooficina_padre:'."'".$seguimientoCursor['seguimientos']['telefonooficina_padre']."'".', telefonooficina_madre:'."'".$seguimientoCursor['seguimientos']['telefonooficina_madre']."'".', celular_padre:'."'".$seguimientoCursor['seguimientos']['celular_padre']."'".', celular_madre:'."'".$seguimientoCursor['seguimientos']['celular_madre']."'".', mail_padre:'."'".strtoupper ($seguimientoCursor['seguimientos']['mail_padre'])."'".', mail_madre:'."'".strtoupper ($seguimientoCursor['seguimientos']['mail_madre'])."'".', telefono_quinceanera:'."'".$seguimientoCursor['seguimientos']['telefono_quinceanera']."'".', mail_quinceanera:'."'".strtoupper ($seguimientoCursor['seguimientos']['mail_quinceanera'])."'".', celular_quinceanera:'."'".$seguimientoCursor['seguimientos']['celular_quinceanera']."'".', anoviaje_quinceanera:'.$seguimientoCursor['seguimientos']['anoviaje_quinceanera'].', mesviaje_quinceanera:'."'".$seguimientoCursor['seguimientos']['mesviaje_quinceanera']."'".', estado:'."'".strtoupper ($seguimientoCursor['seguimientos']['estado'])."'".', nombrepadre:'."'".strtoupper ($seguimientoCursor['seguimientos']['nombre_padre'])."'".', nombremadre:'."'".strtoupper ($seguimientoCursor['seguimientos']['nombre_madre'])."'".', nombrequinceanera:'."'".strtoupper ($seguimientoCursor['seguimientos']['nombre_quinceanera'])."'".',agenciaid:\'0\' ,agencia:\'-1\', medio:'."''".', destino:'."'0'".', observacion:'."'".strtoupper ($observaciones)."'".', tracker:'."'-4'".', idusuario:'."'".$seguimientoCursor['seguimientos']['users_id']."'".', idpadre:'."'".$seguimientoCursor['seguimientos']['idpadre']."'".', transferencia:'."'".$seguimientoCursor['seguimientos']['transferencia']."'".', vinculacion:'."'".$seguimientoCursor['seguimientos']['vinculacion']."'".', colegio:'."'".$seguimientoCursor['seguimientos']['colegio']."'".', bitacora:'."'".$seguimientoCursor['seguimientos']['bitacora']."'".', fase:'."'".$seguimientoCursor['seguimientos']['fase']."'".',motivo:'."'".$seguimientoCursor['seguimientos']['motivo']."'".', interes:'."'".$seguimientoCursor['seguimientos']['interes']."'".', ultimo_contacto:'."'".$seguimientoCursor['seguimientos']['ultimo_contacto']."'".', agencia:'."'".$seguimientoCursor['seguimientos']['agencia']."'".', CURAUA:'."'".$seguimientoCursor['seguimientos']['CUR_AUA']."'".', FLA:'."'".$seguimientoCursor['seguimientos']['FLA']."'".', EUR:'."'".$seguimientoCursor['seguimientos']['EUR']."'".', MEX:'."'".$seguimientoCursor['seguimientos']['MEX']."'".', FLACUN:'."'".$seguimientoCursor['seguimientos']['FLA_CUN']."'".', FLAMQT:'."'".$seguimientoCursor['seguimientos']['FLA_MQT']."'".', SURAVER:'."'".$seguimientoCursor['seguimientos']['SURA_VER']."'".', CXC:'."'".$seguimientoCursor['seguimientos']['CXC']."'".', PTY:'."'".$seguimientoCursor['seguimientos']['PTY']."'".', FLANY:'."'".$seguimientoCursor['seguimientos']['FLA_NY']."'".', NYCUN:'."'".$seguimientoCursor['seguimientos']['NY_CUN']."'".', SURACOMBPER:'."'".$seguimientoCursor['seguimientos']['SURA_COMB_PER']."'".', ORM:'."'".$seguimientoCursor['seguimientos']['ORM']."'".', HW:'."'".$seguimientoCursor['seguimientos']['HW']."'".', EUR2:'."'".$seguimientoCursor['seguimientos']['EUR2']."'"."},";
			
		$arrayOrden['Padre'.$seguimientoCursor['seguimientos']['id']]=array("cuerpo"=>$seguimientosactual,"hijos"=>array()); 
		
		}
		$almacenseguimientos="[";
	foreach($arrayOrden as $todo){
			//print_r($todo);
			$almacenseguimientos.=$todo['cuerpo'];
			if(!empty($todo['hijos'])){
				foreach($todo['hijos'] as $hijos){
					$almacenseguimientos.=$hijos;
				}
			}
		}
		$almacenseguimientos.="]";*/
		$this->set('seguimiento',json_encode($almacenseguimientos));
		//$this->set('seguimientosNormalizados',$almacenseguimientos);
	//print_r($almacenseguimientos);
		
	$almaceninscripciones = array();

	foreach($inscripciones as $inscripcionCursor){ 
		$holder = array();
		   foreach($inscripcionCursor['inscripcions'] as $key => $value ){
		   	$holder[$key] = $value;
		}
		array_push($almaceninscripciones, $holder);
		
    }
		$this->set('inscripcion',json_encode($almaceninscripciones));
		
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */ 
	public function view($id = null) {
		
	}
	
	public function borrarcache(){
	    clearCache();
	}
    public function cargadatos(){
    }

}
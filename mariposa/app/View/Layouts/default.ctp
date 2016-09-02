<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
//@kike:marzo 11 de 2014 se establecen estos Headers para limbiar cache cada vez q se inicie y tome los cambio de JavaScript
//require'../../controller/Classes/Rjson.php';
 header ("Expires: ".gmdate("D, d M Y H:i:s", time())." GMT");  
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");  
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Viajes de 15 - Rocio de Castiblanco: Mariposa V. 1.0'); ?>
		<?php //echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
    <?php 
	//@eduardo:Restriccion de codigo para que unicamente se muestre cuando el usuario se ha autenticado en la aplicación
	if(isset($_SESSION['Auth'])){
		?>
    <!-- Carga Dojo y Css para utilizar la libreria Claro -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css" media="screen">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="../renders/css/fixes.css">
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js" data-dojo-config="async:true, parseOnLoad:true"></script>
    <?php } else { ?>
     <style type="text/css">
      #rememberModal {
      	display: none;
      }
     </style>
    <?php } ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script type="text/javascript">
      
      

	<?php 
	//@eduardo:Restriccion de codigo para que unicamente se muestre cuando el usuario se ha autenticado en la aplicación
	if(isset($_SESSION['Auth'])){?>
		var whatIsNow="Seg";
	  var idSeguimienteActualEnUso=-1,agencia, campo, ciudad, departamento, destino, medio, tabla, seguimiento, idusuarioactivo, nombreuseract, seguimientoAlmacen, bitacoraAlmacen, bitacoraNueva, dataStore, grid, DestinosAlmacen, VentasAlmacen, todos, PermisosAlmacen, tama, grabar, ventas, estado, mediosSeguimientosAlm, hermana;
	  
          require([
				"dojo/store/JsonRest",
				"dojo/store/Memory",
				"dojo/store/Cache",
				"dojox/grid/DataGrid",
				"dojo/data/ObjectStore",
				"dojo/query",
				"dojo/domReady!",
				"dojo/date/stamp",
				"dojo/date/locale",
			], function(JsonRest, Memory, Cache, DataGrid, ObjectStore, query){
				//Se cargan los objetos bases con los array json que se han creado desde el controlador
				agencia=<?php echo $agencia;?>;
		        campo=<?php echo $campo;?>;
		        ciudad=<?php echo $ciudad;?>;
		        departamento=<?php echo $departamento;?>;
		        destino=<?php echo $destino;?>;
		        destinocumento=<?php echo $destinocumento;?>;
		        inscripdocumento=<?php echo $inscripdocumento;?>;
		        detalledocumento=<?php echo $detalledocumento;?>;
		        ventas=<?php echo $ventas;?>;
		        medio=<?php echo $medio;?>;
		        tabla=<?php echo $tabla;?>;
		        amiga=<?php echo $amiga;?>;
		        hermana=<?php echo $hermana;?>;
				moneda=<?php echo $moneda;?>;
		        pago=<?php echo $pago;?>;
		        pagosdestino=<?php echo $pagosdestino;?>;
		        seguimiento=<?php echo $seguimiento;?>;
		        inscripcion=<?php echo $inscripcion;?>;
		        documento=<?php echo $documento;?>;
				bitacora=<?php echo $bitacora;?>;
				bitacora2=<?php echo $bitacora2;?>;
				bitacoraHoy=<?php echo $bitacoraHoy;?>;
				permiso=<?php echo $permisos;?>;
				todos=<?php echo $todos;?>;
				//agenciasSguimientos=<?php //echo $agenciasSguimientos;?>;
				//destinoSeguimientos=<?php //echo $destinoSeguimientos;?>;
				mediosSeguimientos=<?php echo $mediosSeguimientos;?>;
				//Encaje para el cuadre con la pantalla
				tama=window.innerHeight-55;
				//Esta variable es para controlar los hilos con la parte de la carga 
				grabar=0;
				//Se ajusta el iframe al tamaño
	            document.getElementById('cargacontenido').style.height=tama+"px";
				//Se cuadran los dataobject con la informacion ya recopilada
				  bitacoraAlmacen = new dojo.store.Memory({
					data: bitacora
				});	
				   bitacora2Almacen = new dojo.store.Memory({
					data: bitacora2
				});

				  bitacoraHoyAlmacen = new dojo.store.Memory({
					data: bitacoraHoy
				});	
				
				/*agenciasSguimientosAlm = new dojo.store.Memory({
					data: agenciasSguimientos, idProperty:"id"
				});*/


               /*destinoSeguimientosAlm = new dojo.store.Memory({
					data: destinoSeguimientos, idProperty:"id"
				});*/
								
				seguimientoAlmacen = new dojo.store.Memory({
					data: seguimiento, idProperty:"id"
				});
                
                inscripcionAlmacen = new dojo.store.Memory({
					data: inscripcion, idProperty:"id"
				});

				DestinosAlmacen = new dojo.store.Memory({
                 data: destino, idProperty:"id"
                });

                HermanasAlmacen = new dojo.store.Memory({
                 data: hermana, idProperty:"id"
                });

                 MonedasAlmacen = new dojo.store.Memory({
                 data: moneda, idProperty:"id"
                });
          
                AmigasAlmacen = new dojo.store.Memory({
                 data: amiga, idProperty:"id"
                });

                DestinocumentosAlmacen = new dojo.store.Memory({
                 data: destinocumento, idProperty:"id"
                });

                PagosDestinoAlmacen = new dojo.store.Memory({
                 data:pagosdestino, idProperty:"id"
                });

                PagosAlmacen = new dojo.store.Memory({
                 data: pago, idProperty:"id"
                });

                DetalleDocumentosAlmacen = new dojo.store.Memory({
                 data: detalledocumento, idProperty:"id"
                });

                InscripdocumentosAlmacen = new dojo.store.Memory({
                 data: inscripdocumento, idProperty:"id"
                });

                DocumentosAlmacen = new dojo.store.Memory({
                 data: documento, idProperty:"id"
                });

                VentasAlmacen = new dojo.store.Memory({
                 data: ventas, idProperty:"id"
                });
				PermisosAlmacen = new dojo.store.Memory({
                 data: permiso, idProperty:"id"
                });
				DepartamentosAlmacen = new dojo.store.Memory({
                 data: departamento, idProperty:"id"
                });
				CuidadesAlmacen = new dojo.store.Memory({
                 data: ciudad, idProperty:"id"
                });
				AgenciasAlmacen = new dojo.store.Memory({
                 data: agencia, idProperty:"id"
                });
				UsuariosAlmacen = new dojo.store.Memory({
                 data: todos, idProperty:"id"
                });
				seguimientoStore=dojo.data.ObjectStore({objectStore: seguimientoAlmacen});
				inscripcionStore=dojo.data.ObjectStore({objectStore: inscripcionAlmacen});
				//Se setean el id y el nombre de usuario
				idusuarioactivo=<?php echo $idusuarioactivo;?>;
				nombreuseract="<?php echo $nombreusuarioactivo;?>";
				rolusuarioactivo="<?php echo $rolusuarioactivo;?>";			
				
				//código para recorrer los seguimientos 
			
	
			   seguimientoAlmacen.query({}).forEach(function(seg){
                     
					   var  nombreAgencia="";
					   var  nombreVendedor="";
                       var  nombreCiudad= "";
                       var  NombreDestino= "";
					   var  NumeroDestino= "";
                       var  mesViaje= "";
                       var  numId;
					   var  color= "";
					   var  ultimocontacto = "";
					   var  entry1= "";
                       var  nombreparentesco= ""
	                   var  idSeguimiento=seg.id ;
	                   var  storeSeguimiento ="";
					   var  agenciaId=0;
		                    AgenciasAlmacen.query({id:seg.agencia}).forEach(function(des){
		                         nombreAgencia=des.name;
								 agenciaId=des.id;
                            });	
			                
					 UsuariosAlmacen.query({id:seg.agente}).forEach(function(des){

		                        nombreVendedor=des.nombre;
                       });
                       
                       CuidadesAlmacen.query({id:seg.ciudad}).forEach(function(des){
                                 nombreCiudad=des.name;
                        });
						
						 CuidadesAlmacen.query({id:seg.ciudadquin}).forEach(function(des){
                                 nombreCiudadQuin=des.name;
                        });
						
						numId = parseInt(seg.id);
						
                        var mm = seg.mesviaje_quinceanera
                            switch(mm){
						  case "06":
						   mesViaje = "JUNIO";
						  break;
						  case "12":
						   mesViaje = "DICIEMBRE";
						  break;
                        } 
                        switch(seg.parentesco){
						  case "0":
						   nombreparentesco= "Seleccione el parentesco";
						  break;
						  case "1":
						   nombreparentesco= "PAPÁ";
						  break;
						  case "2":
						   nombreparentesco= "MAMÁ";
						  break;
						  case "3":
						   nombreparentesco= "HERMANO";
						  break;
						  case "4":
						   nombreparentesco= "HERMANA";
						  break;
						  case "5":
						   nombreparentesco= "TIO";
						  break;
						  case "6":
						   nombreparentesco= "TIA";
						  break;
						  case "7":
						   nombreparentesco= "PRIMO";
						  break;
						  case "8":
						   nombreparentesco= "PRIMA";
						  break;
						  case "9":
						   nombreparentesco= "ABUELO";
						  break;
						  case "10":
						   nombreparentesco= "ABUELA";
						  break;
						  case "11":
						   nombreparentesco= "PADRASTRO";
						  break;
						  case "12":
						   nombreparentesco= "MADRASTRA";
						  break;
						  case "13":
						   nombreparentesco= "OTROS";
						  break;
                          case "14":
						   nombreparentesco= "QUINCEAÑERA";
						  break;
						 } 
						 
						 switch(seg.fase){
						  case "1":
						   entry1= "1.INICIO";
						  break;
						  case "2":
						   entry1= "2.DEJÉ MENSAJE TELEFONICO";
						  break;
						  case "3":
						   entry1= "3.VOLVER A LLAMAR";
						  break;
						  case "4":
						   entry1= "4.POSPONEN EN VIAJE";
						  break;
						  case "5":
						   entry1= "5.ENVIÉ DATOS Y DOCUMENTOS DE INSCRIPCIÓN";
						  break;
						  case "6":
						  entry1= "6.VISITÉ A CLIENTE";
						  break;
						  case "7":
						   entry1= "7.CONCRETÉ CITA EN LA OFICINA";
						  break;
						  case "8":
						   entry1= "8.LES ATENDÍ EN LA OFICINA";
						  break;
						  case "9":
						   entry1= "9.ENVIÉ REVISTA";
						  break;
						 case "10":
						   entry1= "10.FIN";
						  break;
						 }	 
						 switch(seg.interes){
						  case "1":
						   color = "MUY INTERESADO";
						  break;
						  case "2":
						   color = "MEDIANAMENTE INTERESADO";
						  break;
						  case "3":
						   color = "POCO INTERES O ABANDONADO";
						  break;
                        } 
                       if(seg.estado == "1"){
						if(seg.ultimo_contacto){
							var d = new Date();
                            var n = d.getFullYear();
							if(seg.anoviaje_quinceanera <= n){
							var isoFormatDateString = seg.ultimo_contacto;
                             var dateParts = isoFormatDateString.split("-");
                             var date = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
                             var dateNow = new Date();
                             var timeDiff = Math.abs(date.getTime() - dateNow.getTime());
                             var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
	                         if(diffDays > 30){
								 color = "POCO INTERES O ABANDONADO";
							 }
						} else {

							color ="blue"
						}
					}
					} else {
						 color = "";
					}
						

					   
					   
					   
					   NombreDestino = "";
					   NumeroDestino = [];
					   if(seg.CUR_AUA == "1"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"CUR-AUA";
									 NumeroDestino.push(1); 
									 
								  }else{
		                            NombreDestino="CUR-AUA"; 
									NumeroDestino.push(1); 	
                                   }
						   }
						   if(seg.FLA == "2"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA"; 
									 NumeroDestino.push(2); 
								  }else{
		                            NombreDestino="FLA";
									NumeroDestino.push(2); 	
                                   }
						   }
						   if(seg.EUR == "3"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"EUR"; 
									 NumeroDestino.push(3); 
								  }else{
		                            NombreDestino="EUR";
									NumeroDestino.push(3);  	
                                   }
						   }
						   if(seg.MEX == "4"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"MEX";
									NumeroDestino.push(4); 
								  }else{
		                            NombreDestino="MEX";
									NumeroDestino.push(4);  	
                                   }
						   }
						   if(seg.FLA_CUN =="5"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA-CUN";
									 NumeroDestino.push(5);  
								  }else{
		                            NombreDestino="FLA-CUN"; 
									NumeroDestino.push(5);  	
                                   }
						   }
						   if(seg.FLA_MQT == "6"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA-MQT";
									 NumeroDestino.push(6);   
								  }else{
		                            NombreDestino="FLA-MQT";
									NumeroDestino.push(6);   	
                                   }
						   }
						   if(seg.SURA_VER == "7"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"SURA-VER";
									 NumeroDestino.push(7);  
								  }else{
		                            NombreDestino="SURA-VER"; 
									NumeroDestino.push(7);  	
                                   }
						   }
						   if(seg.CXC == "8"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"CXC"; 
									 NumeroDestino.push(8);  
								  }else{
		                            NombreDestino="CXC";
									NumeroDestino.push(8);   	
                                   }
						   }
						   if(seg.PTY == "9"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"PTY"; 
									 NumeroDestino.push(9); 
								  }else{
		                            NombreDestino="PTY"; 	
									NumeroDestino.push(9);  
                                   }
						   }
						   if(seg.FLA_NY == "10"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA-NY"; 
									NumeroDestino.push(10);  
								  }else{
		                            NombreDestino="FLA-NY"; 
									NumeroDestino.push(10); 	
                                   }
						   }
						   if(seg.NY_CUN == "11"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"NY-CUN"; 
									 NumeroDestino.push(11);  
								  }else{
		                            NombreDestino="NY-CUN"; 
									NumeroDestino.push(11); 	
                                   }
						   }
						   if(seg.SURA_COMB_PER == "12"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"SURA-COMB-PER";
									 NumeroDestino.push(12);  
								  }else{
		                            NombreDestino="SURA-COMB-PER";
									NumeroDestino.push(12); 
                                   }
						   }
						   if(seg.HW == "13"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"HW"; 
									NumeroDestino.push(13);  
								  }else{
		                            NombreDestino="HW"; 
									NumeroDestino.push(13);  	
                                   }
						   }
						   if(seg.EUR2 =="14"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"EUR2"; 
									 NumeroDestino.push(14);  
								  }else{
		                            NombreDestino="EUR2"; 
									NumeroDestino.push(14);  	
                                   }
						   }
						   if(seg.ORM =="15"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"ORM"; 
									 NumeroDestino.push(15);  
								  }else{
		                            NombreDestino="ORM"; 
									NumeroDestino.push(15);  	
                                   }
						   }
						   if(seg.MIA_MCO =="16"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"MIA_MCO"; 
									 NumeroDestino.push(16);  
								  }else{
		                            NombreDestino="MIA_MCO"; 
									NumeroDestino.push(16);  	
                                   }
						   }
						   if(seg.NY9 =="17"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"NY9"; 
									 NumeroDestino.push(17);  
								  }else{
		                            NombreDestino="NY9"; 
									NumeroDestino.push(17);  	
                                   }
						   }
						   if(seg.NYC_MIA =="18"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"NYC_MIA"; 
									 NumeroDestino.push(18);  
								  }else{
		                            NombreDestino="NYC_MIA"; 
									NumeroDestino.push(18);  	
                                   }
						   }
						   if(seg.DUBAI =="19"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"DUBAI"; 
									 NumeroDestino.push(19);  
								  }else{
		                            NombreDestino="DUBAI"; 
									NumeroDestino.push(19);  	
                                   }
						   }
						   if(seg.CUN6 =="20"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"CUN6"; 
									 NumeroDestino.push(20);  
								  }else{
		                            NombreDestino="CUN6"; 
									NumeroDestino.push(20);  	
                                   }
						   }
						   //console.log(NumeroDestino);
					   
					   /*destinoSeguimientosAlm.query({seguimiento:idSeguimiento}).forEach(function(des){
                             DestinosAlmacen.query({id:des.destino}).forEach(function(des){
                                 nombre=des.sigla;
								 destinoId= des.id;
								 if(destinoId == "11" || destinoId == "12" || destinoId == "13" || destinoId == "14"){
						require(["dojo/_base/xhr"],
                          function(xhr) {
                            xhr.get({
                             url: "/v15/mariposa/seguimientos/recibeajax?destinoId="+destinoId+"&id="+seg.id+"&sigla="+nombre,
							 
						});
					  });
						}
								 
								  /*if (NombreDestino){
		                             NombreDestino+='|'+nombre; 
								  }else{
		                            NombreDestino=nombre; 	
                                   }
                            }); 
					        
					    }); */ 
					   
					   storeSeguimiento = seguimientoAlmacen.get(idSeguimiento);
                       storeSeguimiento.nombreParentesco = nombreparentesco;
		               storeSeguimiento.agenciaNombre = nombreAgencia;
					   storeSeguimiento.nombreAgente = nombreVendedor;
					   storeSeguimiento.destino = NumeroDestino;
					   storeSeguimiento.nombreDestino = NombreDestino;
                       storeSeguimiento.mesViajeQuin = mesViaje;
					   storeSeguimiento.Color = color;
					   storeSeguimiento.numId = numId;
					   storeSeguimiento.nombreFase = entry1;
					   storeSeguimiento.agenciaid = agenciaId;
                       storeSeguimiento.nombreciudad = nombreCiudad;
					   storeSeguimiento.nombreciudadquin = nombreCiudadQuin;
					   storeSeguimiento.ultimo_contacto = seg.ultimo_contacto;
                       seguimientoAlmacen.put(storeSeguimiento);
                       			
				});//cierra foreach
		     
				segumiento=seguimientoAlmacen.data;
				
		

inscripcionAlmacen.query({}).forEach(function(seg){
                     
					   var  nombreAgencia="";
					   var  nombreVendedor="";
					   var  nombreAsesor="";
                       var  nombreCiudad= "";
                       var  NombreDestino= "";
					   var  NumeroDestino= "";
                       var  mesViaje= "";
					   var  color= "";
					   var nombreCiudad2;
					   var  ultimocontacto = "";
					   var  entry1= "";
                       var  nombreparentesco= ""
	                   var  idSeguimiento=seg.id ;
	                   var  storeInscripcion ="";
					   var  agenciaId=0;
		                    AgenciasAlmacen.query({id:seg.agencia}).forEach(function(des){
		                         nombreAgencia=des.name;
								 agenciaId=des.id;
                            });	
			                
					   
					 UsuariosAlmacen.query({id:seg.agente}).forEach(function(des){
		                        nombreVendedor=des.nombre;
                       });
					 UsuariosAlmacen.query({id:seg.asesor}).forEach(function(des){
		                        nombreAsesor=des.nombre;
                       });
                       
                       CuidadesAlmacen.query({id:seg.ciudad}).forEach(function(des){
                                 nombreCiudad=des.name;
                        });
                       CuidadesAlmacen.query({id:seg.lugarNacimiento}).forEach(function(des){
                                 nombreCiudad2=des.name;
                        });
						
                        var mm = seg.mesviaje_quinceanera
                            switch(mm){
						  case "06":
						   mesViaje = "JUNIO";
						  break;
						  case "12":
						   mesViaje = "DICIEMBRE";
						  break;
                        } 
                        switch(seg.parentesco){
						  case "0":
						   nombreparentesco= "Seleccione el parentesco";
						  break;
						  case "1":
						   nombreparentesco= "PAPÁ";
						  break;
						  case "2":
						   nombreparentesco= "MAMÁ";
						  break;
						  case "3":
						   nombreparentesco= "HERMANO";
						  break;
						  case "4":
						   nombreparentesco= "HERMANA";
						  break;
						  case "5":
						   nombreparentesco= "TIO";
						  break;
						  case "6":
						   nombreparentesco= "TIA";
						  break;
						  case "7":
						   nombreparentesco= "PRIMO";
						  break;
						  case "8":
						   nombreparentesco= "PRIMA";
						  break;
						  case "9":
						   nombreparentesco= "ABUELO";
						  break;
						  case "10":
						   nombreparentesco= "ABUELA";
						  break;
						  case "11":
						   nombreparentesco= "PADRASTRO";
						  break;
						  case "12":
						   nombreparentesco= "MADRASTRA";
						  break;
						  case "13":
						   nombreparentesco= "OTROS";
						  break;
                          case "14":
						   nombreparentesco= "QUINCEAÑERA";
						  break;
						 } 
						 
						 switch(seg.fase){
						  case "1":
						   entry1= "1.INICIO";
						  break;
						  case "2":
						   entry1= "2.DEJÉ MENSAJE TELEFONICO";
						  break;
						  case "3":
						   entry1= "3.VOLVER A LLAMAR";
						  break;
						  case "4":
						   entry1= "4.POSPONEN EN VIAJE";
						  break;
						  case "5":
						   entry1= "5.ENVIÉ DATOS Y DOCUMENTOS DE INSCRIPCIÓN";
						  break;
						  case "6":
						  entry1= "6.VISITÉ A CLIENTE";
						  break;
						  case "7":
						   entry1= "7.CONCRETÉ CITA EN LA OFICINA";
						  break;
						  case "8":
						   entry1= "8.LES ATENDÍ EN LA OFICINA";
						  break;
						  case "9":
						   entry1= "9.ENVIÉ REVISTA";
						  break;
						 case "10":
						   entry1= "10.FIN";
						  break;
						 }	 
						 switch(seg.interes){
						  case "1":
						   color = "MUY INTERESADO";
						  break;
						  case "2":
						   color = "MEDIANAMENTE INTERESADO";
						  break;
						  case "3":
						   color = "POCO INTERES O ABANDONADO";
						  break;
                        } 
                       if(seg.estado == "1"){
						if(seg.ultimo_contacto){
							var isoFormatDateString = seg.ultimo_contacto;
                             var dateParts = isoFormatDateString.split("-");
                             var date = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
                             var dateNow = new Date();
                             var timeDiff = Math.abs(date.getTime() - dateNow.getTime());
                             var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
	                         if(diffDays > 30){
								 color = "POCO INTERES O ABANDONADO";
							 }
						}
					} else {
						 color = "";
					}
						

					   
					   
					   
					   NombreDestino = "";
					   NumeroDestino = "";
					   if(seg.iddestino == "1"){
						   if (NombreDestino){
		                             NombreDestino="CUR-AUA";
									 NumeroDestino=1; 
									 
								  }else{
		                            NombreDestino="CUR-AUA"; 
									NumeroDestino=1;	
                                   }
						   }
						   if(seg.iddestino == "2"){
						   if (NombreDestino){
		                             NombreDestino="FLA"; 
									 NumeroDestino=2;
								  }else{
		                            NombreDestino="FLA";
									NumeroDestino=2; 	
                                   }
						   }
						   if(seg.iddestino== "3"){
						   if (NombreDestino){
		                             NombreDestino="EUR"; 
									 NumeroDestino=3;
								  }else{
		                            NombreDestino="EUR";
									NumeroDestino=3; 	
                                   }
						   }
						   if(seg.iddestino == "4"){
						   if (NombreDestino){
		                             NombreDestino="MEX";
									 NumeroDestino=4; 
								  }else{
		                            NombreDestino="MEX";
									NumeroDestino=4; 	
                                   }
						   }
						   if(seg.iddestino=="5"){
						   if (NombreDestino){
		                             NombreDestino="FLA-CUN";
									 NumeroDestino=5; 
								  }else{
		                            NombreDestino="FLA-CUN"; 
									NumeroDestino=5; 	
                                   }
						   }
						   if(seg.iddestino == "6"){
						   if (NombreDestino){
		                             NombreDestino="FLA-MQT";
									 NumeroDestino=6;  
								  }else{
		                            NombreDestino="FLA-MQT";
									NumeroDestino=6;  	
                                   }
						   }
						   if(seg.iddestino == "7"){
						   if (NombreDestino){
		                             NombreDestino="SURA-VER";
									 NumeroDestino=7; 
								  }else{
		                            NombreDestino="SURA-VER"; 
									NumeroDestino=7; 	
                                   }
						   }
						   if(seg.iddestino == "8"){
						   if (NombreDestino){
		                             NombreDestino="CXC"; 
									 NumeroDestino=8; 
								  }else{
		                            NombreDestino="CXC";
									NumeroDestino=8;  	
                                   }
						   }
						   if(seg.iddestino == "9"){
						   if (NombreDestino){
		                             NombreDestino="PTY"; 
									 NumeroDestino=9; 
								  }else{
		                            NombreDestino="PTY"; 	
									NumeroDestino=9; 
                                   }
						   }
						   if(seg.iddestino == "10"){
						   if (NombreDestino){
		                             NombreDestino="FLA-NY"; 
									 NumeroDestino=10; 
								  }else{
		                            NombreDestino="FLA-NY"; 
									NumeroDestino=10; 	
                                   }
						   }
						   if(seg.iddestino == "11"){
						   if (NombreDestino){
		                             NombreDestino="NY-CUN"; 
									 NumeroDestino=11; 
								  }else{
		                            NombreDestino="NY-CUN"; 
									NumeroDestino=11; 	
                                   }
						   }
						   if(seg.iddestino == "12"){
						   if (NombreDestino){
		                             NombreDestino="SURA-COMB-PER";
									 NumeroDestino=12;  
								  }else{
		                            NombreDestino="SURA-COMB-PER";
									NumeroDestino=12; 
                                   }
						   }
						   if(seg.iddestino == "13"){
						   if (NombreDestino){
		                             NombreDestino="HW"; 
									 NumeroDestino=13; 
								  }else{
		                            NombreDestino="HW"; 
									NumeroDestino=13; 	
                                   }
						   }
						   if(seg.iddestino =="14"){
						   if (NombreDestino){
		                             NombreDestino="GRIEGAS"; 
									 NumeroDestino=14; 
								  }else{
		                            NombreDestino="GRIEGAS"; 
									NumeroDestino=14; 	
                                   }
						   }
						   if(seg.iddestino =="15"){
						   if (NombreDestino){
		                             NombreDestino='|'+"ORM"; 
									 NumeroDestino=15; 
								  }else{
		                            NombreDestino="ORM"; 
									NumeroDestino=15; 	
                                   }
						   }
						   if(seg.iddestino =="16"){
						   if (NombreDestino){
		                             NombreDestino="MIA_MCO"; 
									 NumeroDestino=16;  
								  }else{
		                            NombreDestino="MIA_MCO"; 
									NumeroDestino=16;  	
                                   }
						   }
						   if(seg.iddestino =="17"){
						   if (NombreDestino){
		                             NombreDestino="NY9"; 
									 NumeroDestino=17;  
								  }else{
		                            NombreDestino="NY9"; 
									NumeroDestino=17;  	
                                   }
						   }
						   if(seg.iddestino =="18"){
						   if (NombreDestino){
		                             NombreDestino="NYC_MIA"; 
									 NumeroDestino=18;  
								  }else{
		                            NombreDestino="NYC_MIA"; 
									NumeroDestino=18;  	
                                   }
						   }
						   if(seg.iddestino =="19"){
						   if (NombreDestino){
		                             NombreDestino="DUBAI"; 
									 NumeroDestino=19;  
								  }else{
		                            NombreDestino="DUBAI"; 
									NumeroDestino=19;  	
                                   }
						   }
						   if(seg.iddestino =="20"){
						   if (NombreDestino){
		                             NombreDestino="CUN6"; 
									 NumeroDestino=20;  
								  }else{
		                            NombreDestino="CUN6"; 
									NumeroDestino=20;  	
                                   }
						   }
						   
						   //console.log(NumeroDestino);
					   
					   /*destinoSeguimientosAlm.query({seguimiento:idSeguimiento}).forEach(function(des){
                             DestinosAlmacen.query({id:des.destino}).forEach(function(des){
                                 nombre=des.sigla;
								 destinoId= des.id;
								 if(destinoId == "11" || destinoId == "12" || destinoId == "13" || destinoId == "14"){
						require(["dojo/_base/xhr"],
                          function(xhr) {
                            xhr.get({
                             url: "/v15/mariposa/seguimientos/recibeajax?destinoId="+destinoId+"&id="+seg.id+"&sigla="+nombre,
							 
						});
					  });
						}
								 
								  /*if (NombreDestino){
		                             NombreDestino=nombre; 
								  }else{
		                            NombreDestino=nombre; 	
                                   }
                            }); 
					        
					    }); */ 
					   
					   storeInscripcion = inscripcionAlmacen.get(idSeguimiento);
                       storeInscripcion.nombreParentesco = nombreparentesco;
		               storeInscripcion.agenciaNombre = nombreAgencia;
					   storeInscripcion.nombreAgente = nombreVendedor;
					   storeInscripcion.asesorNombre = nombreAsesor;
					   storeInscripcion.destino = NombreDestino;
					   storeInscripcion.numeroDestino = NumeroDestino;
                       storeInscripcion.mesViajeQuin = mesViaje;
					   storeInscripcion.Color = color;
					   storeInscripcion.nombreFase = entry1;
					   storeInscripcion.agenciaid = agenciaId;
                       storeInscripcion.nombreciudad = nombreCiudad;
                       storeInscripcion.nombreciudad2 = nombreCiudad2;
					   storeInscripcion.ultimo_contacto = seg.ultimo_contacto;
                       inscripcionAlmacen.put(storeInscripcion);
                       			
				});//cierra foreach
		     
				inscripcion=inscripcionAlmacen.data;
				
			});

	  //Funcion para cambiar entre le div de carga de cake y el de la aplicación
	  //Entrada: La ruta a donde se quiere ir
	  //Salida: Carga el iframe o el div de cake
	  function llamamodulo(ruta){
		  document.getElementById('cargacontenido').style.display='';
		  document.getElementById('cargador').src=ruta;
		  document.getElementById('content').style.display='none';
		  document.getElementById('cabecera').style.display='';
	  }
	    //Funcion mostrar la plantilla de creación de seguimiento en un nuevo frame sin dañar el de navegación
	  //Entrada: la ruta  o si escriben  ocultarCrear esto oculta el frame y despliega el principal como el botón de volver
	  //Salida: la plantilla de nuevo seguimiento
	   
	   function crearseguimiento(ruta){
		   
		  
		  if (!isNaN(ruta))
		   {
		      
		      
		      
		        idSeguimienteActualEnUso=ruta;
         
            if (document.getElementById('cargadorSeguimientos').src!="/v15/renders/agregar_Seguimiento.php")
              {
                 document.getElementById('cargadorSeguimientos').src="/v15/renders/agregar_Seguimiento.php";
               
              }	
          //document.getElementById('cargadorSeguimientos').contentWindow.cargaSeguimiento();             	      
		      document.getElementById('cargador').style.display='none'; 
		      document.getElementById('content').style.display='none';
		      document.getElementById('cargacontenido').style.display='';
		      document.getElementById('cargadorSeguimientos').style.display='';

          		  
		      document.getElementById('cabecera').style.display='';   
  		 
		  }
		  
		  
		  else if (ruta=="ocultarCrear")
		  {
			  document.getElementById('cargadorSeguimientos').style.display='none';
			  document.getElementById('cargador').style.display='';
			  //cargador.crearNotificaciones();
			  //alert("Cerrando la prueba");
		      
		  }
		  
		  else  if (ruta=="Crear")//@kike: Marzo 5 se crea esta opción para no crear la misma ventana siempre que se va a usar
		  {

		         idSeguimienteActualEnUso=0;
             document.getElementById('cargadorSeguimientos').src="/v15/renders/agregar_Seguimiento.php";
             document.getElementById('cargador').style.display='none';
		         document.getElementById('content').style.display='none';			       
			       document.getElementById('cargacontenido').style.display='';
		   
		          document.getElementById('cargadorSeguimientos').style.display='';
		          document.getElementById('cabecera').style.display='';
			
		      
		  }
		  
		
	  }
       
      function crearinscripcion(ruta,whatIs){
		   
		  
		  if (!isNaN(ruta))
		   {
		      
		      
		      
		        idSeguimienteActualEnUso=ruta;
		        whatIsNow=whatIs;
         
            if (document.getElementById('cargadorSeguimientos').src!="/v15/renders/agregar_inscripcion.php")
              {
                 document.getElementById('cargadorSeguimientos').src="/v15/renders/agregar_inscripcion.php";
               
              }	
          //document.getElementById('cargadorSeguimientos').contentWindow.cargaSeguimiento();             	      
		      document.getElementById('cargador').style.display='none'; 
		      document.getElementById('content').style.display='none';
		      document.getElementById('cargacontenido').style.display='';
		      document.getElementById('cargadorSeguimientos').style.display='';

          		  
		      document.getElementById('cabecera').style.display='';   
  		 
		  }
		  
		  
		  else if (ruta=="ocultarCrear")
		  {
			  document.getElementById('cargadorSeguimientos').style.display='none';
			  document.getElementById('cargador').style.display='';
			  //cargador.crearNotificaciones();
			  //alert("Cerrando la prueba");
		      
		  }
		  
		  else  if (ruta=="Crear")//@kike: Marzo 5 se crea esta opción para no crear la misma ventana siempre que se va a usar
		  {

		         idSeguimienteActualEnUso=0;
             document.getElementById('cargadorSeguimientos').src="/v15/renders/agregar_inscripcion.php";
             document.getElementById('cargador').style.display='none';
		         document.getElementById('content').style.display='none';			       
			       document.getElementById('cargacontenido').style.display='';
		   
		          document.getElementById('cargadorSeguimientos').style.display='';
		          document.getElementById('cabecera').style.display='';
			
		      
		  }
		  
		
	  } 
     
	 function cargarBita (id){
		 var theId = id;
		  var bitas = "";
		   bitas = window.self.bitacoraAlmacen.query({idseguimiento:id});
		  if(bitas.length == 0){
			  $.ajax({
                 url: "/v15/mariposa/seguimientos/cargarBita",
                 type: "POST",
                 data : {id : id},
                 dataType: "json"
			 
})
.done(function( data ) {
				var obj = dojo.fromJson(data);
			if(obj) {
						for (var i=0; i<obj.length; i++){
    						for (var name in obj[i]) {
       							var resultado ={id:obj[i].id, idseguimiento:obj[i].idseguimiento, usuario:obj[i].usuario, ingreso:obj[i].ingreso, fecha:obj[i].fecha, hora:obj[i].hora}; 
        													
       								window.self.bitacoraAlmacen.put(resultado);
							}
						}
						
						}
						
						})
						.fail(function(  ) {
							cargarBita (theId);
						});
						
			 
			 

	  } else {}
	  
		  }
		  
	  
	  
	function popup(){
     var seg = prompt("Por Favor Ingresar el Número Del Seguimiento:");
     var whatIs = "Seg"
	 if(seg){
     crearinscripcion(seg,whatIs);
	 }
    }

	  //Funcion para esconder la cabecera
	  //Entrada: Ninguna
	  //Salida: Se esconde el div de la cabecera
	  function escondeheader(){
		  document.getElementById('cabecera').style.display='none';
	  }
	  /******Funcion para cargar los datos del seguimeinto*************/

	  //Entrada: Ninguno
	  //Salida: Crea notificaciones
	  function carganoti(){
		try
        {
          //Run some code here
		   window.frames[0].crearNotificaciones();
        }
        catch(err)
        {
          //Handle errors here
        }
	  }
	  <?php }?> 
	  
	  $( "#quien" ).change(function() {
          alert( "Handler for  called." );
           });

	  function change(x)
	  { 
	    var mod = "text-decoration:none; font-weight:bold; margin-bottom:17px; border-right:1px solid grey; padding:2px 6px 1px 2px";
	  	var m = document.getElementsByClassName('mainLinks');
	  	for (var i = 0; i < m.length; i++) {
         m[i].setAttribute('style', mod);
     }
	  	x.style.color = '#FFFFFF';
	  	x.style.fontSize = '15px';
	  	$("div#controls").css("background-color", "#8E8E8E");
	  	$("div#cabecera").css("background-image", "none");
	  	$("div#cabecera").css("background-color", "#46BDE9");
	  }
	  function change2(x)
	  {  
	  	var mod = "text-decoration:none; font-weight:bold; margin-bottom:17px; border-right:1px solid grey; padding:2px 6px 1px 2px";
	  	var m = document.getElementsByClassName('mainLinks');
	   for (var i = 0; i < m.length; i++) {
         m[i].setAttribute('style', mod);
         }
	  	 x.style.color = '#FFFFFF';
	  	 x.style.fontSize = '15px';
	  	 $("div#controls").css("background-color", "#956996");
	  	$("div#cabecera").css("background-image", "url('/v15/mariposa/img/fondo_header.jpg')");
	  	$("div#cabecera").css("background-color", "none");
	  }
	  function change3(x)
	  {  
	  	var mod = "text-decoration:none; font-weight:bold; margin-bottom:17px; border-right:1px solid grey; padding:2px 6px 1px 2px";
	  	var m = document.getElementsByClassName('mainLinks');
	   for (var i = 0; i < m.length; i++) {
         m[i].setAttribute('style', mod);
         }
	  	 x.style.color = '#FFFFFF';
	  	 x.style.fontSize = '15px';
	  	$("div#controls").css("background-color", "#956996");
	  	$("div#cabecera").css("background-image", "none");
	  	$("div#cabecera").css("background-color", "#F476CF");
	  }
	</script>
</head>
<body >
<div id="rememberModal" class="modal fade bs-example-modal-sm" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
       <div class="modal-header">
          <h4 class="modal-title"><img src="/v15/mariposa/img/cake.icon.png"> Recuerda!</h4>
       </div>
       <div class="modal-body">
         <h5>Te recordamos que no haz realizado las 25 llamadas del día, te recomendamos sacar un momento para completarlas!</h5>
       </div>
      
    </div>
  </div>
</div>
 <center>
	<div id="container">
		<?php 
			   //Si la sesion esta arriba carga el saludo y el logout
			   if(isset($_SESSION['Auth']['User'])){?>
        <div style="width:100%; text-align:center; height:55px;background-color:#F476CF" id="cabecera">
        	<?php } else {?>
                 <div style="width:100%; text-align:center; height:55px;background-image:url('/v15/mariposa/img/fondo_header.jpg')" id="cabecera">
         <?php }?>
        <center>
		 <div id="header">	
           <div style="float:left; width:49%;height:70px; margin-top:-10px;margin-left:-125px;">
            <div style=" text-align:left; float:left;">
             <a href="javascript:llamamodulo('/v15/renders/usuarios.php');"><img src="/v15/mariposa/img/logo.png" width="200"/></a>
            </div> 
           </div>
           <div style="float:right; width:49%;height:70px; margin-top:-15px; margin-right:-200px;">
             <div style="width:100%; text-align:right; padding-top:2em; margin-left:-4.5em;"><h3 style="font-family:Verdana, Geneva, sans-serif; color:#fff; font-size:19px;"><?php echo __('Mariposa 3.0'); ?></h3>
             </div>

           </di0.5
         </div>
        </center> 
        </div>
<?php 
			   //Si la sesion esta arriba carga el saludo y el logout
			   if(isset($_SESSION['Auth']['User'])){?>
              <div id="controls" style="float:right; text-align: center; width:100%; height:20px; margin-top:-0.5em; height:20px; color:#FFF; font-family:Verdana, Geneva, sans-serif; font-size:14px;  font-weight: lighter; clear:both; background-color:#956996; padding-right:5px; border-radius:5px; padding-bottom:8px;">
              <div style="float:left"><a class="mainLinks" href="javascript:llamamodulo('/v15/renders/usuarios.php');"onclick="change3(this)"style="text-decoration:none; font-weight:bold; margin-bottom:17px;color:#FFFFFF; border-right:1px solid grey; padding:2px 6px 1px 2px"><img src="/v15/mariposa/img/arrowup.png" border="0" width="20px" style="margin-top:-4px;"/>&nbsp;&nbsp;Ventas</a>&nbsp;&nbsp;<a class="mainLinks" href="javascript:llamamodulo('/v15/renders/seguimientos.php');"onclick="change2(this)"style="text-decoration:none; font-weight:bold; margin-bottom:17px; border-right:1px solid grey; padding:2px 6px 1px 2px;"><img src="/v15/mariposa/img/seguimientos.png" border="0" width="18px" style="margin-top:-4px;"/>&nbsp;&nbsp;Seguimientos</a>&nbsp;&nbsp;<a class="mainLinks" href="javascript:llamamodulo('/v15/renders/inscripcion.php');" onclick="change(this)"style="text-decoration:none; font-weight:bold; margin-bottom:17px; border-right:1px solid grey; padding:2px 6px 1px 2px;"><img src="/v15/mariposa/img/inscripciones.png" border="0" width="20px" style="margin-top:-4px;"/>&nbsp;&nbsp;Inscripciones</a>
             </div><div style="float:right">
                   <img src="/v15/mariposa/img/user.png" border="0" style="margin-top:-2px;"/><?php echo $_SESSION['Auth']['User']['nombre'];?> | <a onclick="javascript:window.location = '/v15/renders/Salir.php'" href="#" target="_self" style="color:#FFF; text-decoration:none; font-weight:lighter">Cerrar Sesión</a>
               
 			</div></div> 

    <?php }?>

        <div id="cargacontenido" style="display:none; width:100%;">
       <?php if(isset($_SESSION['Auth'])){
		?>
        <!--Iframe oara carga las aplicaicones por dojo---->
        <iframe style="width:100%;height:100%; margin-top:1px"  frameborder="0" scrolling="no" src="" id="cargador">
        </iframe>
        <!--Iframe hermano para recargar datos
        
         <!--Iframe para cargar el seguimiento sin afectar al principal---->
        <iframe style="width:100%;height:100%; display:none" frameborder="0" scrolling="no" src="" id="cargadorSeguimientos">
        </iframe>
     
        
        <iframe style="width:1px;height:1px; margin-top:-5px; border:solid 1px #fff; background-color:#FFF" frameborder="0" scrolling="no" src="/v15/mariposa/seguimientos/mantenerConexion/" id="refrescar">
        </iframe>
        <?php }?>
        </div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
   <center> 
   <?php if(isset($_SESSION['Auth'])){?>
   <script type="text/javascript">
   
   setInterval(function(){recargaDatos();}, 300000);
	 //document.getElementById('header').style.width='100%';
	 //Funciones para activar o desactivar la carga de informacion
	 function cargaDatos(){ 
		//estado=setInterval(function(){recargaDatos();}, 30000);
	  }
	  function limpiarDatos(){
		  clearInterval(estado);
	  } 
	  
	  
	  	  //Entrada: Ninguno
	  //Salida: Carga los datos desde el iframe hermano

	function formatDate(theDate){
	   var yyyy = theDate.getFullYear().toString();
	   var mm = (theDate.getMonth()+1).toString(); // getMonth() is zero-based
	   var dd  = theDate.getDate().toString();
	   return yyyy +"-"+ (mm[1]?mm:"0"+mm[0]) +"-"+ (dd[1]?dd:"0"+dd[0]); // padding
	  
	}


	  function recargaDatos(){
	  	 var date = new Date();
	  	 var hours = date.getHours();
	  	 var min = date.getMinutes();
	  	 if(hours == 15 && min >= 0 && min < 5){
             
	         var count = 0;
	         bitacoraHoyAlmacen.query({usuario:idusuarioactivo}).forEach(function(bita){
	          if(bita.llamadaEfectiva){
	           count = count + parseInt(bita.llamadaEfectiva);
	          }
	         });

	         if(count < 25){
		     $("#rememberModal").modal("show");
		     setTimeout(function(){$("#rememberModal").modal("hide");}, 15000);
		     }
	    }

	    var day = date.getDay();
	    /*if(day == 3 && hours == 11 && min >= 0 && min < 59 ){
			var dateTwo = new Date();
		    dateTwo.setDate(date.getDate()-6);
		    date.setDate(date.getDate()+1);
		    var llamadas;
		    var ventas;
		    dateTwo = formatDate(dateTwo);
		    date = formatDate(date);
	    	require(["dojo/_base/xhr"],
                     function(xhr) {
                     xhr.get({

	                     url: "/v15/mariposa/inscripcions/llamadas?startDate="+dateTwo+"&endDate="+date,

	                     load: function(result) {
	                         llamadas = JSON.parse(result);
	                         require(["dojo/_base/xhr"],
		                     function(xhr) {
			                     xhr.get({

				                     url: "/v15/mariposa/inscripcions/getVentas?startDate="+dateTwo+"&endDate="+date,

				                     load: function(result) {
				                         ventas = JSON.parse(result);


				                     }
				                });        
					         }); 	



	                     }
                    });        
	         }); 	
	    }*/





		 document.getElementById('refrescar').contentDocument.location.reload(true);
		 
		 
		  
		  require(["dojo/_base/xhr"],
          function(xhr) {
             // Execute a HTTP GET request
             xhr.get({
                    // The URL to request
                    url: "/v15/mariposa/seguimientos/mantenerConexion/",
                    // The method that handles the request's successful result
                    // Handle the response any way you'd like!
                   load: function(result) {
			                  if (result.indexOf("conectado")<0)
			                     alert("Se ha perdido la conexión con la mariposa, todas las modificaciones a los seguimientos no serán guardadas, debes reiniciar! ");
                   }
             });        
         }); 	
		 
		 
		 
		 
	  }
	  /******************Funcion que llama al recargar en tiempos de 15 minutos**************************/

	    $('form#cantidad').on('submit', function(e) {
        e.preventDefault();
        //var formData = {
            sigla =  $('select[name=tipo]').val();
			tope = $('input[name=tope]').val();
			periodo = $('select[name=periodo]').val();

        //}

        require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/users/adminLog?sigla="+sigla+"&tope="+tope+"&periodo="+periodo,

           load: function(result) {

           alert("Los topes se han actualizado con exito");

           }

        });
      });
    });
	    $('form#cantidadUsuario').on('submit', function(e) {
        e.preventDefault();
        //var formData = {
            sigla =  $('select[name=tipo2]').val();
			cantidad = $('input[name=cantidad]').val();
			id = $('select[name=quien]').val();
			fecha = $('input[name=fecha]').val();

        //}

        require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/users/userLog?sigla="+sigla+"&cantidad="+cantidad+"&id="+id+"&fecha="+fecha,

           load: function(result) {
           alert("Los datos del usuario se han ingresado con exito");

           }

        });
      });
    });

	</script>
   <?php }?> 
</body>
</html>

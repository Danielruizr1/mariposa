<!-- Agregar Seguimiento -->
<html ng-app="seguimientos" lang="en" class="dj_webkit dj_chrome dj_contentbox"><head>
    <meta charset="utf-8">
    <title>Agregar Seguimiento</title>
    <!-- Carga Dojo y Css para utilizar la libreria Claro -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- build:css css/agregar_seguimiento.css -->
    <link rel="stylesheet" href="css/agregar_seguimiento.css">
    <!-- endbuild -->
    
    <!-- Llamada al archivo js externo que controla las funciones de guardar y editar información -->
    
    <!-- Override de estilos del grid para vinculaciones, este override se hace de la clase Claro de Dojo -->
    
   </head>
     <body ng-controller="AlertController as alert">
     <div class="warning">
       <p>Bitacora se ha guardado con exito </p>
     </div>




     <div id="confirmModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
      <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><img src="/v15/mariposa/img/cake.icon.png"> Felicitaciones!</h4>
            </div>
            <div class="modal-body">
        
            </div>
          </div>
        </div>
    </div>

     <div class="loader"></div>
     <div  class="container-fluid form-container">
     <div class="close closeTable" ng-click="close()" ng-show="visible"><span aria-hidden='true'>&times;</span></div>
     <div class="row " >
     <div class="segTable" ng-show="visible && filteredItems.length">
          <table class="table table-hover table-condensed"  >
          <tr><th>ID</th><th>Quinceañera</th> <th>Contacto</th><th>Vendedor</th><th>Agencia</th><th>direccion</th><th>Telefono</th><th>Telefono2</th><th>Celular</th><th>Email</th><th>Email Quinceañera</th><th>Colegio</th><th>Padre</th><th>Madre</th><th>Cel Padre</th><th>Cel Madre</th></tr>
          <tr ng-repeat="seguimiento in filteredItems = ( seguimientos | filter:search ) |  limitTo:toDisplay"  data-id="{{seguimiento.id}}" class="segRow">
            <td>{{seguimiento.id}}</td>
            <td>{{seguimiento.nombrequinceanera}}</td>
            <td>{{seguimiento.nombrequienllama}}</td>
            <td>{{seguimiento.nombreAgente}}</td>
            <td>{{seguimiento.agenciaNombre}}</td>
            <td>{{seguimiento.direccion}}</td>
            <td>{{seguimiento.telefono1}}</td>
            <td>{{seguimiento.telefono2}}</td>
            <td>{{seguimiento.celular}}</td>
            <td>{{seguimiento.email}}</td>
            <td>{{seguimiento.mail_quinceanera}}</td>
            <td>{{seguimiento.colegio}}</td>
            <td>{{seguimiento.nombre_padre}}</td>
            <td>{{seguimiento.nombre_madre}}</td>
            <td>{{seguimiento.celular_padre}}</td>
            <td>{{seguimiento.celular_madre}}</td>
            

          </tr>
          </table>
      </div>
          
     </div>

     <div class="side-div moveBitacora"></div>
       <div class="row">
          <div class="col-sm-9 form-div">
          <div class="row insc-row">
            <div class="alert alert-danger" role="alert"><p class="alert-text">Esta niña ya está inscrita, para realizar cualquier modificación ir a la inscripción correspondiente.</p></div>
          </div>
          <div class="row seg-header">

          </div>
          <div class="row header-row">
             <div class="col-sm-6">
                  <div class="page-header">
                     <h2>Datos de Contacto</h2>
                  </div>
             </div>
             <div class="col-sm-6">
                  <div class="row">
                       <div class="col-sm-3">
                            <button class="btn btn-info" name="submitButton" value="Enviar" id="Enviar">Guardar</button>
                       </div>
                       <div class="col-sm-3">
                            <button class="btn btn-info" type="cancel" name="cancelButton" value="Cancelar" onClick="window.parent.crearseguimiento('ocultarCrear')">Volver</button>
                       </div>
                       <div class="col-sm-3">
                             <div class="dropdown">
                                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                     Más
                                    <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li class="dropdown-header">Transferir</li>
                                    <li><div class="input-group"><input class="form-control noSet" id="transferir" list="agente-list" placeholder="Usuario..">
                                        <span class="input-group-btn">
                                          <button class="btn btn-info" type="button" id="transferirBtn"><i class="glyphicon glyphicon-share-alt"></i></button>
                                        </span></div></li>
                                    <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Agregar Seguimiento</li>
                                    <li><div class="input-group"><input class="form-control noSet" id="agregarSegg" placeholder="Seguimiento..">
                                        <span class="input-group-btn">
                                          <a  role="button" href="#" class="btn btn-info" id="agregarBtn"><i class="glyphicon glyphicon-plus"></i></a>
                                        </span></div></li>
                                         <li role="separator" class="divider"></li>
                                    <li class="dropdown-header">Agregar Medio</li>
                                    <li><div class="input-group"><input class="form-control noSet" id="agregarMedio" placeholder="Medio..">
                                        <span class="input-group-btn">
                                          <a  role="button" href="#" class="btn btn-info" id="agregarMedioBtn"><i class="glyphicon glyphicon-plus"></i></a>
                                        </span></div></li>
                                  </ul>
                                </div>
                       </div>
                       <div class="col-sm-3">
                       </div>
                  </div>
             </div>
          </div>
             <div class="row">
             <div class="col-sm-2">
                   <div class="form-group">
                       <label for="date" id="titulo">Seguimiento:</label><br/>
                       <font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;"><span id="est"></span></font>
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                       <label for="date" id="titulo">Fecha:</label><br/>
                       <input type="date" class="form-control" id="fechaingreso" name="fechaingreso" disabled />
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                     <label for="agente" id="titulo">Vendedor:</label><br/>
                     <input   name="agente" class="form-control" data-list="agente" id="nombreAgente" data-real="agente" list="agente-list" trim="true" disabled>
                        <datalist id="agente-list">
                        </datalist>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                      <label for="agency" id="titulo">Medio: (<font color="#FF0000">*</font>)</label><br/>
                      <input class="form-control requiredd" id="agenciaNombre" data-list="agencia" data-real="agencia" list="agencia-list" name="agenciaid">
                      <datalist id="agencia-list">
                      </datalist>
                   </div>
                </div>               
             </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                       <label for="nombrequienllama" id="titulo">Contacto: (Nombre y Apellido<font color="#FF0000">*</font>)</label><br/>
                       <input  ng-change="changeSearch(find.nombrequienllama)" ng-model="find.nombrequienllama" class="form-control check check2 nombre requiredd" data-nombre="Contacto:"  name="data[Seguimiento][nombre]" id="nombrequienllama" trim="true">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Ciudad: (<font color="#FF0000">*</font>)</label><br/>
                        <input class="form-control requiredd ciudades" id="ciudad" data-list="ciudad" list="ciudades-list">
                        <datalist id="ciudades-list">
            
                        </datalist>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="telefono1" id="titulo">Teléfono Fijo 1: (<font color="#FF0000">*</font>)</label>
                        <input  ng-change="changeSearch(ind.telefono1)" ng-model="find.telefono1" class="form-control check requiredd" data-nombre="Telefono Fijo 1:" name="data[Seguimiento][telefono1]"  id="telefono1">
                   </div>
                </div>               
             </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                       <label for="telefono2" id="titulo">Teléfono Fijo 2:</label><br/>
                       <input  ng-change="changeSearch(find.telefono2)" ng-model="find.telefono2" class="form-control check" data-nombre="Telefono Fijo 2:" name="data[Seguimiento][telefono2]" id="telefono2">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                       <label for="telefono3" id="titulo">Teléfono Fijo 3:</label><br/>
                       <input  ng-change="changeSearch(find.telefono3)" ng-model="find.telefono3" class="form-control check" data-nombre="Telefono Fijo 3:" name="data[Seguimiento][telefono3]" id="telefono3">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="celular" id="titulo">Celular:   (<font color="#FF0000">*</font>)</label></br>
                        <input  ng-change="changeSearch(find.celular)" ng-model="find.celular" class="form-control check check2 celular requiredd" data-nombre="Celular:" name="data[Seguimiento][celular]" id="celular">
                   </div>
                </div>               
             </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="fax" id="titulo">Fax:</label><br/>
                        <input class="form-control check" data-nombre="Fax:" name="data[Seguimiento][fax]" id="fax">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="email" id="titulo">E-mail: (<font color="#FF0000">*</font>)</label><img src="imgs/mail.gif" border="0" class="mailClick" data-id="email" onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
                        <input  ng-change="changeSearch(find.email)" ng-model="find.email" type="email" class="form-control check check2 email requiredd" data-nombre="Email:" id="email">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="direccion" id="titulo">Dirección:</label><br/>
                        <input class="form-control check" data-nombre="Dirección:" name="data[Seguimiento][direccion]" id="direccion">
                   </div>
                </div>               
             </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                      <label for="time" id="titulo">Parentesco: (<font color="#FF0000">*</font>)</label><br/>
                      <select class="form-control check2 requiredd" id="parentesco">
                       <option value="null">Seleccione el parentesco</option>
                       <option value="1">Papá</option>
                       <option value="2">Mamá</option>
                       <option value="3">Hermano</option>
                       <option value="4">Hermana</option>
                       <option value="14">Quinceañera</option>
                       <option value="5">Tio</option>
                       <option value="6">Tia</option>
                       <option value="7">Primo</option>
                       <option value="8">Prima</option>
                       <option value="9">Abuelo</option>
                       <option value="10">Abuela</option>
                       <option value="11">Padrastro</option>
                       <option value="12">Madrastra</option>
                       <option value="13">Otros</option>
                     </select>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        
                   </div>
                </div>               
             </div>
             <div class="row">
               <div class="page-header">
                    <h2>Datos de Quinceañera</h2>
                </div>
          </div>
          <div class="row">
               <div class="col-sm-4">
                   <div class="form-group">
                        <label for="nombrequinceanera" id="titulo">Nombre: (Apellido y Nombre<font color="#FF0000">*</font>)</label><br/>
                        <input  ng-change="changeSearch(find.nombrequinceanera)" ng-model="find.nombrequinceanera" class="form-control check nombre14 requiredd" data-nombre="Nombre Quinceañera:" id="nombrequinceanera">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Ciudad Residencia:</label><br/>
                        <input class="form-control check ciudades" data-list="ciudadquin" id="ciudadquin" list="ciudades-list">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Colegio:  (<font color="#FF0000">*</font>)</label><br/>
                        <input class="form-control check requiredd" name="data[Seguimiento][colegio]" id="colegio">
                   </div>
                </div>
          </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="telefono_quinceanera" id="titulo">Télefono Fijo:</label><br/>
                        <input class="form-control check" data-nombre="Telefono Quinceañera:" name="data[Seguimiento][telefono_quinceanera]" id="telefono_quinceanera">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="celular_quinceanera" id="titulo">Celular:</label><br/>
                        <input class="form-control check celular14" data-nombre="Celular Quinceañera:" name="data[Seguimiento][celular_quinceanera]" id="celular_quinceanera">
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="mail_quinceanera" id="titulo">E-mail Quinceañera: (<font color="#FF0000">*</font>)</label><img src="imgs/mail.gif" border="0" data-id="mail_quinceanera" class="mailClick" onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
                        <input class="form-control check email14 requiredd" type="email" data-nombre="Email quinceañera:" name="mail_quinceanera" id="mail_quinceanera">
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Destino: (<font color="#FF0000">*</font>)</label><br/>
                        <select class="form-control requiredd" multiple id="destino">
                        </select>
                        
                        
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Mes: (<font color="#FF0000">*</font>)</label><br/>
                        <select class="form-control requiredd"  name="data[Seguimiento][mesviaje_quinceanera]" id="mesviaje_quinceanera">
                       <option value="0">Seleccione el mes de salida</option>
                       <option value="06">Junio</option>
                       <option value="12">Diciembre</option>
                      </select>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Año: (<font color="#FF0000">*</font>)</label><br/>
                        <select class="form-control requiredd" name="data[Seguimiento][anoviaje_quinceanera]" id="anoviaje_quinceanera">
                       <option value="0">Seleccione el año de salida</option>
                       <option value="2012">2012</option>
                       <option value="2013">2013</option>
                       <option value="2014">2014</option>
                       <option value="2015">2015</option>
                       <option value="2016">2016</option>
                       <option value="2017">2017</option>
                       <option value="2018">2018</option>
                       <option value="2019">2019</option>
                       <option value="2020">2020</option>
                       </select>
                   </div>
                </div>
             </div>
             <div class="row">
               <div class="page-header">
                    <h2>Datos de Parientes</h2>
                </div>
              </div>
             <div class="row">
             <div class="col-sm-3">
                   <div class="form-group">
                        <label for="nombrepadre" id="titulo">Nombre del Padre:</label><br/>
                        <input class="form-control check nombre1" data-nombre="Nombre del padre:" name="data[Seguimiento][nombre_padre]" id="nombre_padre">
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                        <label for="mail_padre" id="titulo">E-mail del Padre:</label><img src="imgs/mail.gif" class="mailClick" border="0" data-id="mail_padre"  onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
                        <input class="form-control check email1" type="email" data-nombre="Email del Padre:" type="text" name="data[Seguimiento][mail_padre]" id="mail_padre">
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                        <label for="telefonooficina_padre" id="titulo">Tel. Oficina Padre:</label><br/>
                        <input class="form-control check" data-nombre="Tel del padre:" name="data[Seguimiento][telefonooficina_padre]" id="telefonooficina_padre">
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                        <label for="celular_padre" id="titulo">Celular Padre:</label><br/>
                        <input class="form-control check celular1" data-nombre="Celular del padre:" name="data[Seguimiento][celular_padre]" id="celular_padre">
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-3">
                   <div class="form-group">
                        <label for="nombremadre" id="titulo">Nombre de la Madre:</label><br/>
                        <input class="form-control check nombre2" data-nombre="Nombre de la madre:" name="data[Seguimiento][nombre_madre]" id="nombre_madre">
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                        <label for="mail_madre" id="titulo">E-mail de la Madre:</label><img src="imgs/mail.gif" class="mailClick" border="0" data-id="mail_padre" onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
                        <input class="form-control check email2" type="email" data-nombre="Email de la madre:" type="text" name="data[Seguimiento][mail_madre]" id="mail_madre">
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                        <label for="telefonooficina_madre" id="titulo">Tel. Oficina Madre:</label><br/>
                        <input class="form-control check" data-nombre="Tel de la madre:" name="data[Seguimiento][telefonooficina_madre]" id="telefonooficina_madre">
                   </div>
                </div>
                <div class="col-sm-3">
                   <div class="form-group">
                        <label for="celular_madre" id="titulo"> Celular Madre:</label><br/>
                        <input class="form-control check celular2" data-nombre="Celular de la madre:" name="data[Seguimiento][celular_madre]" id="celular_madre">
                   </div>
                </div>
             </div>
             <div class="row">
               <div class="page-header">
                    <h2>Otra Información</h2>
                </div>
              </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Estado:</label><br/>
                        <select class="form-control" name="estado" id="estado" onChange="" >
                        <option value="0" ></option>
                       <option value="1" selected="selected">Pendiente</option>
                       <option value="2">Inscrita</option>
                       <option value="3">No Inscrita</option>
                       </select>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Fase:</label><br/>
                        <select class="form-control" name="data[Seguimiento][fase]" id="fase" onChange="">
                        <option value="0" ></option>
                         <option value="1" selected="selected">1.Inicio</option>
                         <option value="2">2.Volver a llamar</option>
                         <option value="3">3.Posponen viaje</option>
                         <option value="4">4.Envié datos para cosignar y documentos de inscripción</option>
                         <option value="5">5.Visité a cliente </option>
                         <option value="6">6.Concreté cita en la oficina</option>
                         <option value="7">7.Les atendí en la oficina</option>
                         <option value="8">8.Dejé mensaje telefónico</option>
                         <option value="9">9.Envié revista</option>
                         <option value="10">10.Fin</option>

                         
                       </select>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Interés:</label><br/>
                         <select class="form-control" name="data[Seguimiento][interes]" id="interes" onChange="">
                         <option value="0" selected="selected"></option>
                         <option value="1">Muy Interesado</option>
                         <option value="2">Medianamente Interesado</option>
                         <option value="3">Poco Interesado</option>

                         </select>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="date" id="titulo">Ultimo Contacto:</label><br/>
                        <input class="form-control"  id="ultimo_contacto" name="data[Seguimiento][ultimo_contacto]" disabled>
                   </div>
                </div>
                <div class="col-sm-4">
                   <div class="form-group">
                        <label for="time" id="titulo">Motivo De No Viaje:</label><br/>
                        <select class="form-control" name="data[Seguimiento][fase]" id="motivo" onChange="">
                        <option value="NA" selected="selected">NA</option>
                         <option value="1.FIESTA">1.Fiesta</option>
                         <option value="2.OTRO REGALO (CARRO, MOTO, INTERCAMBIO, CIRUGíA, DINERO)">2.Otro regalo (carro, moto, intercambio, cirugía, dinero)</option>
                         <option value="3.PRESUPUESTO">3.Presupuesto</option>
                         <option value="4.ESCOGEN OTRA AGENCIA">4.Escogen otra agencia</option>
                         <option value="5.COMPRA VIAJE LOCAL">5.Compra viaje local</option>
                         <option value="6.VIAJE FAMILIAR">6.Viaje familiar</option>
                         <option value="7.MAL COMPORTAMIENTO">7.Mal comportamiento</option>
                         <option value="8.ESCOGE DESTINO QUE NO TENEMOS">8.Escoge destino que no tenemos</option>
                         <option value="9.DESCONFIAN">9.Desconfian</option>
                         <option value="10.NO DAN RAZÓN">10.No dan razón</option>

                         </select>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-12">
                   <div class="form-group">
                        <label for="time" id="titulo">Observaciones:</label><br/>
                        <textarea class="form-control"   id="observacion">
                        </textarea>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-3 bitacora-div">
               <div class="row bitacora-name">
                   <div class="page-header moveBitacora">
                       <h2>Bitacora</h2>
                   </div>
               </div>
               <div class="row bitacora-write">
                    <textarea class="form-control textarea noSet" id="bitacora" placeholder="Escribir.."></textarea>
                    <div class="col-sm-6">
                         <button class="btn  btn-default" id="llamadaEfectiva"><i id="callIcon" class="glyphicon glyphicon-earphone"></i> Llamada</button>
                    </div>
                    <div class="col-sm-6">
                         <button class="btn  btn-default" id="guardarBita"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                    </div>
               </div>
               <div class="row bitacora-list" id="list">
               
               </div>
          </div>
       </div>
     </div>
  

           <input type="hidden" name="agente" id="agente" value="0">
           <input type="hidden" name="id" id="id" value="0">
           <input type="hidden" name="ciudad" id="ciudad">
           <input type="hidden" name="agenciaid" id="agenciaid">
           <input type="hidden" name="ciudadquin" id="ciudadquin">
           <input type="hidden" data-send="no" name="SeguimientoNombreQuinceanera2" id="SeguimientoNombreQuinceanera2">
           <input type="hidden" data-send="no" name="idseguimientopadre" id="idseguimientopadre" value="0">
           <input type="hidden" name="vincula" id="vincula" value="0">
           <input type="hidden" data-send="no" name="transferencia" id="transferencia" value="0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
    <!-- build:js js/agregar_Seguimientos.js -->
    <script src="js/Seguimiento.js" charset="utf-8"></script>
    <script src="js/agregar_Seguimientos.js" charset="utf-8"></script>  
    <!-- endbuild -->         
	</body>	 
</html>

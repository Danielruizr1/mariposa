
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template for Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    
    <!-- build:css css/main.css -->
      <link rel="stylesheet" href="../css/agregar_seguimiento.css">
      <link rel="stylesheet" href="../css/agregar_inscripcion.css">
    <!-- endbuild -->
  </head>

  <body>

  <div class="loader"></div>

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
  <div class="modal fade bs-example-modal-sm" tabindex="-1" id="hermanaModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-sm">
       <div class="modal-content" style="min-width:360px; min-height:230px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <form id="hermanasForm" style="text-align:center; padding-top:20px;">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Completo(Nombre Y Apellidos):</label>
    <input type="text" class="form-control" name="nombreHermana" id="nombreHermana" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Fecha de Nacimiento:</label>
    <input type="date" class="form-control" name="edadHermana" id="edadHermana" placeholder="Edad" style="width:150px; margin-left:110px;">
  </div>
  <button type="submit" class="btn btn-default" style="background-color:#96689F;">Agregar</button>
</form>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-sm" id="amigaModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-sm">
       <div class="modal-content" style="min-width:360px; min-height:230px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <form id="amigasForm" style="text-align:center; padding-top:20px;">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre Completo(Nombre Y Apellidos):</label>
    <input type="text" class="form-control" name="nombreAmiga" id="nombreAmiga" placeholder="Nombre">
    <label for="exampleInputEmail1">Destino):</label>
    <Select type="text" class="form-control" name="destinoAmiga" id="destinoAmiga">
    <option></option>
    </Select>
  </div>
  <button type="submit" class="btn btn-default" style="background-color:#96689F;">Agregar</button>
</form>
    </div>
  </div>
</div>

  <div class="modal fade" id="seguroModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog">
       <div class="modal-content" style="min-width:360px; min-height:230px; text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <input type="hidden" id="index">
        <table class="table table-hover" id="checkTable" style="padding:2px 4px 2px 4px; margin-top:20px;">

        </table> 
        <button type="submit" id="aprovadoButton" class="btn btn-default" style="background-color:#96689F;" disabled>Aprobar</button> 
    </div>
  </div>
</div>
  <div class="modal fade bs-example-modal-sm" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-sm">
       <div class="modal-content" style="min-width:360px; min-height:230px; text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <h2 style="padding-top:8px;"> Elige El Contacto</h2>
         <select id="sendSelect" style="margin-top:30px;">
         <option></option>
         </select>
 
        <button type="submit"  class="btn btn-default" onclick="sendTable(this)" style="background-color:#96689F;">Enviar</button> 
    </div>
  </div>
</div>
  <div class="modal fade bs-example-modal-sm" id="notaModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-sm">
       <div class="modal-content" style="min-width:360px; min-height:230px; text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <textarea id="notaArea" style="margin-top:30px;width:90%;height:20%;">
         </textarea>
 
        <button type="submit"  id="addNotaButton" class="btn btn-default saveNota" style="background-color:#96689F;">Agregar</button> 
    </div>
  </div>
</div>


    <div class="container-fluid form-container">
    <div class="side-div moveBitacora"></div>
      <div class="row">
         <div class="col-sm-9 form-div" id="form-div">

                <div class="row header-row">
                   <div class="col-sm-6">
                       <ul class="nav nav-tabs main-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#inscripcion" aria-controls="inscripcion" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/contract11.png" width="24px"/> Inscripción</a></li>
              <li role="presentation"><a href="#documentos" aria-controls="documentos" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/folder265.png" width="24px"/> Documentos</a></li>
              <li role="presentation"><a href="#pagos" aria-controls="pagos" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/money201.png" width="24px"/> Pagos</a></li>
            </ul>
            <div class="row">
                          <div class="col-sm-3">

                          <img id="theImg" class="img-responsive img-thumbnail" src="#">
                            
                    </div>
                        </div>
                   </div>
                    <div class="col-sm-1">

                            
                    </div>
                   <div class="col-sm-5">

                        <div class="row">

                             <div class="col-sm-4">
                                  <button class="btn btn-info" name="submitButton" value="Enviar" id="Enviar">Guardar</button>
                             </div>
                             
                             <div class="col-sm-4">
                                   <div class="dropdown">
                   <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                  Más
             <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#sendModal" data-whatever="@1">Enviar Documentos</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#sendModal" data-whatever="@2">Enviar Pagos</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" id="foto">Foto</a></li>
  </ul>
</div>
                             </div>
                             <div class="col-sm-4">
                                  <button class="btn btn-info" type="cancel" name="cancelButton" value="Cancelar" onClick="window.parent.crearseguimiento('ocultarCrear')">Volver</button>
                             </div>
                             
                             
                        </div>
                        
                   </div>
                </div>

            

             <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="inscripcion">
                 <div class="row">
                 <div class="row">
                          <div class="col-sm-5">
                               <input type="file" id="theFile" />
                            </div>
                        </div>
                   <div class="col-sm-2">
                         <div class="form-group">
                             <label for="date" id="titulo">Seguimiento:</label><br/>
                             <font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;"><span id="est"></span></font>
                         </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                             <label for="date" id="titulo">Inscrita el:</label><br/>
                             <input type="date" class="form-control" id="fechaingreso" name="dates"/>
                         </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                              <label for="nombrequinceanera" id="titulo">Quinceañera:(<font color="#FF0000">*</font>)</label><br/>
                              <input ng-model="search.nombrequinceanera" class="form-control check nombre14 requiredd" data-nombre="Nombre Quinceañera:" id="nombrequinceanera">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                            <label for="agency" id="titulo">TI: (<font color="#FF0000">*</font>)</label><br/>
                            <input class="form-control" id="TI" name="TI">
                         </div>
                      </div> 
                      

                   </div>
                   <div class="row">
                      <div class="col-sm-2">
                         <div class="form-group">
                             <label for="nombrequienllama" id="titulo"># Inscrita:</label><br/>
                             <input class="form-control" id="inscrita" name="inscrita">
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                             <label for="nombrequienllama" id="titulo">Estado:</label><br/>
                             <select class="form-control" id="estado" name="estado">
                             <option value="1">Viaje confirmado</option>
                             <option value="2">Cambio de destino</option>
                             <option value="3">Cambio de fecha de viaje</option>
                             <option value="4">Cambio de fecha de viaje con cambio de destino</option>
                             <option value="5">Cancelación de viaje</option>
                             </select>
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Destino: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control requiredd" id="iddestino">
                              <option></option>
                              </select>
                              
                              
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                              <label for="time" id="titulo">Mes: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control requiredd"  name="data[Seguimiento][mesviaje_quinceanera]" id="mesviaje_quinceanera">
                             <option value="0">Seleccione el mes de salida</option>
                             <option value="06">Junio</option>
                             <option value="12">Diciembre</option>
                            </select>
                         </div>
                      </div>
                      <div class="col-sm-2">
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
                             <option value="2021">2021</option>
                             <option value="2022">2022</option>
                             <option value="2023">2023</option>
                             <option value="2024">2024</option>
                             <option value="2025">2025</option>
                             <option value="2026">2026</option>
                             <option value="2027">2027</option>
                             <option value="2028">2028</option>
                             <option value="2029">2029</option>
                             <option value="2030">2030</option>
                             </select>
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
                           <label for="agente" id="titulo">Vendedor:</label><br/>
                           <input   name="agente" class="form-control" data-list="agente" data-real="agente" list="agente-list" id="nombreAgente" disabled>
                              <datalist id="agente-list">
                              </datalist>
                         </div>
                      </div>
                      <div class="col-sm-4">
                      <div class="form-group">
                           <label for="asesor" id="titulo">Asesor:</label><br/>
                           <input name="asesor" class="form-control" data-list="agente" data-real="asesor" list="agente-list" id="asesorNombre">
                         </div>
                      </div>

                      <div class="col-sm-4">
                         <div class="form-group">
                            <label for="agency" id="titulo">Medio: (<font color="#FF0000">*</font>)</label><br/>
                            <input class="form-control" id="agenciaNombre" data-list="agencia" data-real="agencia" list="agencia-list" name="agenciaid">
                            <datalist id="agencia-list">
                            </datalist>
                         </div>
                      </div> 
                  </div>
                  <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Ciudad Residencia:</label><br/>
                              <input class="form-control check ciudades" data-list="ciudad" id="ciudadResidencia" list="ciudades-list">
                               <datalist id="ciudades-list">
                            </datalist>
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="mail_quinceanera" id="titulo">E-mail Quinceañera: (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control check email14" type="email" data-nombre="Email quinceañera:" name="mail_quinceanera" id="mail_quinceanera">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="telefono_quinceanera" id="titulo">Teléfono Fijo:</label><br/>
                              <input class="form-control check" data-nombre="Telefono Quinceañera:" id="telefono_quinceanera">
                         </div>
                      </div>
                      
                  </div>
                  <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="celular_quinceanera" id="titulo">Celular:</label><br/>
                              <input class="form-control check celular14" data-nombre="Celular Quinceañera:"  id="celular_quinceanera">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="direccion" id="titulo">Dirección:</label><br/>
                              <input class="form-control check" data-nombre="Dirección:" name="data[Seguimiento][direccion]" id="direccionQuinceanera">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Colegio:  (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control check" name="data[Seguimiento][colegio]" id="colegio">
                         </div>
                      </div>
                </div>
                <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Curso: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control" id="curso">
                              <option>SEXTO</option>
                              <option>SEPTIMO</option>
                              <option>OCTAVO</option>
                              <option>NOVENO</option>
                              <option>DECIMO</option>
                              <option>ONCE</option>
                              <option>UNIVERSIDAD</option>
                              </select>                           
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Lugar de nacimiento: (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control ciudades" id="lugarNacimiento" data-list="lugarNacimiento" list="ciudades-list">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="date" id="titulo">Fecha Nacimiento:</label><br/>
                             <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento"/>
                         </div>
                      </div>    
                </div>
                <div class="row">
                      <div class="col-sm-3">
                         <div class="form-group">
                              <label for="date" id="titulo">Registro Civil:</label><br/>
                              <input type="number" class="form-control" id="RC" name="RC" style="width:160px;" required>
                         </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                              <label for="time" id="titulo"># Pasaporte:  (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control check" id="pasaporte">
                         </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                              <label for="time" id="titulo">Serial Pasaporte:  (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control check"  id="serialPasaporte">
                         </div>
                      </div>
                      <div class="col-sm-3">
                         <div class="form-group">
                             <label for="date" id="titulo">Pasaporte Expedición:</label><br/>
                             <input type="date" class="form-control" id="pasEmision" name="fechaingreso"/>
                         </div>
                      </div>


                </div>
                <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="date" id="titulo">Pasaporte Vencimiento:</label><br/>
                             <input type="date" class="form-control" id="pasVencimiento" name="fechaingreso"/>
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                              <label for="time" id="titulo">Tiene Visa: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control displayers" data-display="visa" id="tieneVisa">
                              <option></option>
                              <option value="si">SI</option>
                              <option value="no">NO</option>
                              </select>                           
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                              <label for="time" id="titulo">Documentos: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control" id="documentosPermiso">
                              <option></option>
                              <option>SI</option>
                              <option>NO</option>
                              </select>                           
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                              <label for="time" id="titulo">Pagos: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control" id="pagosPermiso">
                              <option></option>
                              <option>SI</option>
                              <option>NO</option>
                              </select>                           
                         </div>
                      </div>

                </div>
                <div class="row">
                <div class="col-sm-4">
                         <div class="form-group">
                             <label for="date" id="titulo">Fecha Emisión:</label>
             <input type="date" class="form-control" id="visaEmision" name="visaEmision"/>
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="date" id="titulo">Fecha Vencimiento:</label>
             <input type="date" class="form-control" id="visaVencimiento" name="visaVencimeinto"/>
                         </div>
                      </div>

                </div>
                <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Facebook:  (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control check"  id="facebook">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Instagram:  (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control check"  id="instagram">
                         </div>
                      </div>

                      

                </div>
                <div class="row">
                         <div class="page-header">
                              <h2>Quien Hace Inscripción</h2>
                          </div>
                    </div>
                <div class="row">

                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="nombrequienllama" id="titulo">Contacto: (Nombre y Apellido<font color="#FF0000">*</font>)</label><br/>
                             <input ng-model="search.nombrequienllama" class="form-control check check2 nombre" data-nombre="Contacto:"   id="nombrequienllama">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Cédula:  (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control check"  id="cedulaCon">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                            <label for="time" id="titulo">Parentesco: (<font color="#FF0000">*</font>)</label><br/>
                            <select class="form-control check2" id="parentesco">
                             <option value="0">Seleccione el parentesco</option>
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
                </div>
                <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Ciudad: (<font color="#FF0000">*</font>)</label><br/>
                              <input class="form-control ciudades" id="ciudad" data-list="ciudad" list="ciudades-list">
                              <datalist id="ciudades-list">
                  
                              </datalist>
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="telefono1" id="titulo">Teléfono Fijo 1: (<font color="#FF0000">*</font>)</label>
                              <input ng-model="search.telefono1" class="form-control check" data-nombre="Telefono Fijo 1:"  id="telefono1">
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="telefono2" id="titulo">Teléfono Fijo 2:</label><br/>
                             <input ng-model="search.telefono2" class="form-control check" data-nombre="Telefono Fijo 2:" id="telefono2">
                         </div>
                      </div>              
                   </div>
                   <div class="row">   
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="telefono3" id="titulo">Teléfono Fijo 3:</label><br/>
                             <input ng-model="search.telefono3" class="form-control check" data-nombre="Telefono Fijo 3:"  id="telefono3">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="celular" id="titulo">Celular:   (<font color="#FF0000">*</font>)</label></br>
                              <input ng-model="search.celular" class="form-control check check2 celular" data-nombre="Celular:" id="celular">
                         </div>
                      </div>  
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="email" id="titulo">E-mail: (<font color="#FF0000">*</font>)</label><br/>
                              <input ng-model="search.email" type="email" class="form-control check check2 email" data-nombre="Email:" id="email">
                         </div>
                      </div>             
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="direccion" id="titulo">Dirección:</label><br/>
                              <input class="form-control check" data-nombre="SeguimientoDireccion:" id="direccion">
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                              <label for="time" id="titulo">Es Agencia: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control displayers" data-display="agencia" id="esAgencia">
                              <option ></option>
                              <option value="si">SI</option>
                              <option value="no">NO</option>
                              </select>                           
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                              <label for="time" id="titulo">Documentos: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control" id="documentosPermisoCon">
                              <option></option>
                              <option>SI</option>
                              <option>NO</option>
                              </select>                           
                         </div>
                      </div>
                      <div class="col-sm-2">
                         <div class="form-group">
                              <label for="time" id="titulo">Pagos: (<font color="#FF0000">*</font>)</label><br/>
                              <select class="form-control" id="pagosPermisoCon">
                              <option></option>
                              <option>SI</option>
                              <option>NO</option>
                              </select>                           
                         </div>
                      </div>                                                     
                   </div><!--Row -->
                   <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#parientes" aria-controls="parientes" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/avatar4.png" width="24px"/>&nbsp;Contactos</a></li>
                    <li role="presentation" id="agenciaTab"><a href="#theAgencia" aria-controls="agencia" role="tab" data-toggle="tab">Agencia</a></li>
                    <li role="presentation"><a href="#hermanas" aria-controls="hermanas" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/women9.png" width="24px" style="margin-top:2px;"/>&nbsp;Hermanas</a></li>
                    <li role="presentation"><a href="#amigas" aria-controls="amigas" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/women9.png" width="24px" style="margin-top:2px;"/>&nbsp;Amigas Inscritas</a></li>
                    <li role="presentation" id="visaTab"><a href="#sinVisa" aria-controls="sinVisa" role="tab" data-toggle="tab">Sin Visa</a></li>
                  </ul>
                    


                     

  <div class="tab-content b">
    <div role="tabpanel" class="tab-pane active" id="parientes">
      <br/>
                    <div class="row">
                         <div class="page-header">
                              <h4>Padre</h4>
                          </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Nombre del Padre:</label><br/>
                              <input class="form-control"  id="nombre_padre">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Cédula:</label><br/>
             <input class="form-control" id="cedulaPa" name="cedulaPa" required>
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="time" id="titulo">E-mail del Padre:</label><br/>
            <input class="form-control" type="text"  id="mail_padre">
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Dirección</label><br/>
             <input class="form-control" id="direccionPa">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Tel. Oficina Padre:</label><br/>
           <input  class="form-control"  id="telefonooficina_padre">
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="time" id="titulo">Celular Padre:</label><br/>
            <input  class="form-control" id="celular_padre">
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Documentos:</label><br/>
               <select class="form-control" id="documentosPermisoPa" name="documentosPermisoPa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                               <label for="date" id="titulo">Pagos:</label><br/>
               <select class="form-control" id="pagosPermisoPa" name="pagosPermisoPa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                         <div class="page-header">
                              <h4>Madre</h4>
                          </div>
                    </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Nombre de la Madre:</label><br/>
           <input class="form-control" id="nombre_madre">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Cédula</label><br/>
             <input class="form-control" id="cedulaMa" name="cedulaMa">
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">E-mail de la Madre:</label><br/>
           <input class="form-control" type="text"  id="mail_madre">
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Dirección</label><br/>
             <input class="form-control" id="direccionMa">

                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Tel. Oficina Madre:</label><br/>
           <input class="form-control" id="telefonooficina_madre">
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="time" id="titulo"> Celular Madre:</label><br/>
            <input  class="form-control" id="celular_madre">
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Documentos:</label><br/>
               <select class="form-control" id="documentosPermisoMa" name="documentosPermisoMa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Pagos:</label><br/>
              <select class="form-control" id="pagosPermisoMa" name="pagosPermisoMa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                         <div class="page-header">
                              <h4>Otro</h4>
                          </div>
                    </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label id="titulo">Otro Contacto: (Nombre y Apellido)</label><br/>
             <input type="text"  class="form-control" id="SeguimientoNombre2" name="SeguimientoNombre2">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">Cédula</label><br/>
             <input type="number" class="form-control" id="SeguimientoCedula2" name="SeguimientoCedula2">
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="time" id="titulo">Parentesco: (<font color="#FF0000">*</font>)</label><br/>
            <select class="form-control" name="data[Seguimiento][parentesco]" id="SeguimientoParentesco2"  required>
           <option value="0">Seleccione el parentesco</option>
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
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Ciudad: (<font color="#FF0000">*</font>)</label><br/>
            <input class="form-control ciudades" id="SeguimientoCiudad2" data-list="ciudad" list="ciudades-list"/>

                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Teléfono Fijo 1: (<font color="#FF0000">*</font>)</label><br/>
            <input type="number" class="form-control"
            name="data[Seguimiento][telefono1]"  id="SeguimientoTelefono12">
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="time" id="titulo">Teléfono Fijo 2:</label><br/>
            <input type="number" class="form-control" name="data[Seguimiento][telefono2]" id="SeguimientoTelefono22">
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Celular:   (<font color="#FF0000">*</font>)</label></br>
          <input type="number" class="form-control"
            name="data[Seguimiento][celular]" id="SeguimientoCelular2">
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="time" id="titulo">Email: (<font color="#FF0000">*</font>)</label><br/>
          <input type="text" class="form-control" name="data[Seguimiento][email]" id="SeguimientoEmail2" 
          >
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             <label for="time" id="titulo">Dirección:</label><br/>
            <input class="form-control"
            name="data[Seguimiento][direccion]" id="SeguimientoDireccion2"
           >
                         </div>
                      </div>              
                   </div>
                   <div class="row">
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">&nbsp;Documentos:</label><br/>
             <select class="form-control" id="documentosPermisoCon2" name="documentosPermisoCon2">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
                         </div>
                      </div>
                      <div class="col-sm-4">
                         <div class="form-group">
                              <label for="date" id="titulo">&nbsp;Pagos:</label><br/>
              <select class="form-control" id="pagosPermisoCon2" name="pagosPermisoCon2">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
                         </div>
                      </div> 
                      <div class="col-sm-4">
                         <div class="form-group">
                             
                         </div>
                      </div>              
                   </div>
  </div>
  <div role="tabpanel" class="tab-pane" id="theAgencia">
    <div id="fila7" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
               <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Nombre Agencia:</label><br/>
             <input type="text" class="form-control" id="nombreAgencia" name="nombreAgencia"/>
            </div>
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Vendedor:</label><br/>
             <input type="text" class="form-control" id="vendedorAgencia" name="vendedorAgencia"/>
            </div>
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Teléfono:</label><br/>
             <input type="text" class="form-control" id="telefonoAgencia" name="telefonoAgencia"/>
            </div>
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular:</label><br/>
             <input type="text" class="form-control" id="celularAgencia" name="celularAgencia"/>
            </div>
            
             </div>
    <div id="fila8" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
           <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Dirección:</label><br/>
             <input type="text" class="form-control" id="direccionAgencia" name="direccionAgencia"/>
            </div> 
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Ciudad:</label><br/>
             <select type="text" class="form-control ciudades" id="ciudadAgencia" name="ciudadAgencia" list="ciudades-list"/>
             <option></option>
             </select>
            </div> 
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Email:</label><br/>
             <input type="text" class="form-control" id="emailAgencia" name="emailAgencia"/>
            </div> 
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">NIT:</label><br/>
             <input type="text" class="form-control" id="NIT" name="NIT"/>
            </div>  
    </div>
  </div>
   <div role="tabpanel" class="tab-pane" id="amigas" style="text-align:center;">
   </br>
     <div id="fila7" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; "> 
   <div style="width:300px; text-align:center; margin-left:0.5em; margin-bottom:0.5em;margin-top:-25px;">
             <br /> &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#amigaModal" style="margin-top:25px;background-color:#96689F; "><img src="/v15/mariposa/img/add199.png" width="19px" style="margin-top:-8px;"/>&nbsp;Agregar Amiga</button></div>
    </div>
    <br />
    <table id="amigaTable" style="width:250px;text-align:center; padding-bottom:15px;">
             <tr id="headerRowAmiga"><th>Nombre</th><th>Destino</th></tr>
             </table>
   </div>
    <div role="tabpanel" class="tab-pane" id="hermanas" style="text-align:center;">
     
        <div id="fila7" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; ">             
              <br />
             <div style="width:300px; text-align:center; float:left; margin-left:0.5em; margin-bottom:0.5em;margin-top:-25px;">
             <br />&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hermanaModal" style="margin-top:25px;background-color:#96689F; "><img src="/v15/mariposa/img/add199.png" width="19px" style="margin-top:-8px;"/>&nbsp;Agregar Hermana</button></div>
             </div>
            <br />
             <table id="hermanaTable" style="width:400px; text-align:center; float:left; margin-top:10px;">
             <tr id="headerRowHermana"><th>Nombre</th><th>Fecha Nacimiento</th></tr>
             </table>

            
           </div>
    <div role="tabpanel" class="tab-pane" id="sinVisa">    <br/>
      <div style="width:300px; border-bottom:solid 1px #D6ADff; float:left; text-align:left; margin-left:0.5em; margin-bottom:0.5em;"><font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Información Visa</font></div>
      <br/>
      <br/> 
       <div class="row" id="fila10.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
         <div class="form-group" style="float:left; padding-left:0.5em">
                <label for="date" id="titulo">visa Aprobada:</label><br/>
                 <select class="form-control" id="visaAprobada" name="visaAprobada">
                <option></option>
                <option value="si">SI</option>
                <option value="no">NO</option>
               </select>
               </div>
      </div>
      <div class="row" id="fila10.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Revisión:</label><br/>
             <input type="date" class="form-control" id="visaRevision" name="T.I"/>
             </div> 
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Hora Revisión:</label><br/>
             <input type="text" class="form-control" id="horaRevision" name="T.I"/>
             </div> 
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Asesoria:</label><br/>
             <input type="date" class="form-control" id="visaAsesoria" name="lugarNaci">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Hora Asesoria:</label><br/>
             <input type="text" class="form-control" id="horaAsesoria" name="lugarNaci">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Fotos & Huellas:</label><br/>
             <input type="date" class="form-control" id="visaFotos" name="pasaporte" style="width:170px">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Hora Fotos & Huellas:</label><br/>
             <input type="text" class="form-control" id="horaFH" name="pasaporte" style="width:170px">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Cita:</label><br/>
             <input type="date" class="form-control" id="visaCita" name="pasExpedi" style="width:160px;">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Hora Cita:</label><br/>
             <input type="text" class="form-control" id="horaCita" name="pasExpedi" style="width:160px;">
             </div>
           </div>
           <div class="row" id="fila10.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">INF Complementaria:</label><br/>
              <select class="form-control" id="visaInfo" name="visaInfo">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">CD Foto Visa USA:</label><br/>
               <select class="form-control" id="visaCD" name="visaCD">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Formato T.C. pago visa:</label><br/>
              <select class="form-control" id="visaFormato" name="visaFormato">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
              <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Copia de la T.C. pago visa:</label><br/>
              <select class="form-control" id="visaCopia" name="visaCopia">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
              <label for="date" id="titulo">Copia C.C. dueño TC:</label><br/>
               <select class="form-control" id="CopiaCCduenoTC" name="CopiaCCduenoTC">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
            


           </div>
          <div class="row" id="fila10.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
           <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Pregunta De Seguridad:</label><br/>
             <input type="text" class="form-control" id="preguntaSeguridad" name="preguntaSeguridad" style="width:160px;">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Pagina Confirmación #:</label><br/>
             <input type="text" class="form-control" id="paginaConfirmacion" name="paginaConfirmacion" style="width:160px;">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Clave:</label><br/>
             <input type="text" class="form-control" id="clave" name="clave" style="width:160px;">
             </div>
          
          </div>
           <div class="row" id="fila10.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
              <div class="form-group" style="float:left; padding-left:0.5em">
              <label for="date" id="titulo">Formulario:</label><br/>
               <select class="form-control" id="formulario2" name="formulario2">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
               <div class="form-group" style="float:left; padding-left:0.5em">
              <label for="date" id="titulo">Pag.Confirmación:</label><br/>
               <select class="form-control" id="pagConfirmacion" name="pagConfirmacion">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
               <div class="form-group" style="float:left; padding-left:0.5em">
              <label for="date" id="titulo">Rbo Pago:</label><br/>
              <select class="form-control" id="RCB" name="RCB">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
               <div class="form-group" style="float:left; padding-left:0.5em">
              <label for="date" id="titulo">Pag.Fech.Citas:</label><br/>
               <select class="form-control" id="PFC" name="PFC">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
              
           </div>
         </div>
  </div>



              </div><!-- Tab -->
              <div role="tabpanel" class="tab-pane" id="documentos">
                
                <div id="docDiv">
        <div><br /></div>
        <table id="docTable">
          <tr id="headerRow"><th>Documento</th><th>Recibido</th><th>Aprobado</th><th>Fecha Recibido</th><th>Fecha Aprobado</th><th>Aprobado Por</th><th>Documento</th><th>Comentarios</th><th>Abreviatura</th><th>Proceso</th></tr>
        </table>  
      </diV>
              </div><!-- Tab -->
              <div role="tabpanel" class="tab-pane" id="pagos"><div class="container-fluid" style="text-align:center">
      <div class="row">
     </div>
     
     <div><br /></div>
     <div class="row">
      <form id="pagosForm" class="form-inline" style="border-bottom:1px solid #E6E6E6; padding-bottom:14px;">
      <div class="form-group">
     <label for="exampleInputName2">Concepto:</label>
      <select type="text" class="form-control" id="concepto" name="concepto">
       <option></option>
       <option>Abono Porción Terrestre</option>
       <option>Abono TK Aerreo</option>
       <option>Visa</option> 
       <option>Adicional Glam Party</option> 
       <option value="0">OTRO</option>  
      </select>
      <input class="form-control" id="concepto2" name="concepto2">
      </div>
      <div class="form-group">
     <label for="exampleInputName2">Realizado Por:</label>
      <input type="text" class="form-control" id="realizadoPor" name="realizadoPor"> 
      </div>
     <div class="form-group">
      <label for="exampleInputEmail2">&nbsp;&nbsp;Valor:</label>
      <div class="input-group">
      <input type="number" class="form-control" id="valorPago" name="valorPago" placeholder="Ej:2000">
      <div class="input-group-addon"><select id="currency" name="currency"><option value="1">Pesos</option><option value="2">Dolares</option><option value="3">Euros</option>
      </select></div>
    </div>
     </div>
     <button id="pagosSubmitButton" type="submit" class="btn btn-primary" style="background-color:#96689F">Agregar</button>
    </form>
  </div>
  <div class="row">
     <table id="pagosTable" style="float:left; width:60%;">
      <div id="pagosDiv">
      <tr id="mainHeaderPagos">
      <th>Concepto</th><th>Pesos</th><th>Dolares</th><th>Euros</th><th>Fecha</th><th>RealizadoPor</th>
      </tr>
    </div>
    <div id="pagosDiv2">
      <tr id="pagosPendientes">
      <th >Pendientes</th><th>0</th><th>0</th><th colspan="2">0</th>
      </tr>
    </div> 
     </table> 
     <table id="ayudaTable" style="float:right; width:38%;">
      <tr>
        <th>Concepto</th><th>valor</th><th>moneda</th>
      </tr>
     </table>
     </div> 
     </div>
     </div><!-- Tab  -->
            </div><!-- Tab content -->
         </div><!-- Form Div -->
         <div class="col-sm-3 bitacora-div">
               <div class="row bitacora-name">
                   <div class="page-header moveBitacora">
                       <h2>Bitácora</h2>
                   </div>
               </div>
               <div class="row bitacora-write">
                    <textarea class="form-control textarea noSet" id="bitacora" placeholder="Escribir.."></textarea>
                    <div class="col-sm-6">
                         
                    </div>
                    <div class="col-sm-6">
                         <button class="btn  btn-default" id="guardarBita"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
                    </div>
               </div>
               <div class="row bitacora-list" id="list">
               
               </div>
          </div><!-- Bita Div -->
      </div><!-- Main Row -->

    </div><!-- /.container -->

     <input type="hidden" name="data[Seguimiento][users_id]" id="SeguimientoUsersId" value="0">
           <input type="hidden" name="idseguimiento" id="idseguimiento" value="0">
           <input type="hidden" name="id" id="id" value="0">
           <input type="hidden" name="estadoInscripcion" id="estadoInscripcion" value="0">
           <input type="hidden" name="idseguimientopadre" id="idseguimientopadre" value="0">
           <input type="hidden" name="vincula" id="vincula" value="0">
           <input type="hidden" name="transferencia" id="transferencia" value="0">
           <input type="hidden"  id="time" name="data[Seguimiento][hora]" >
           <input type="hidden" id="pendientePesos">
           <input type="hidden" id="pendienteDolares">
           <input type="hidden" id="pendienteEuros">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    

    <!-- build:js js/final/vendor.js -->
      <script src="../js/Seguimiento.js" charset="utf-8"></script>
      <script src="../js/Inscripcion.js" charset="utf-8"></script>
      <script src="../js/agregar_Inscripcion.js" charset="utf-8"></script>
    <!-- endbuild -->
    
    <script src="https://apis.google.com/js/client.js?onload=loadedSeg"></script>

       
</html>

<!-- Agregar Seguimiento -->
<html lang="en" class="dj_webkit dj_chrome dj_contentbox"><head>
    <meta charset="utf-8">
    <title>Agregar Inscripcion</title>
    <!-- Carga Dojo y Css para utilizar la libreria Claro -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/grid/resources/claroGrid.css">
    <link rel="stylesheet" href="css/boots.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js" data-dojo-config="isDebug: true, parseOnLoad: true"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <!-- Llamada al archivo js externo que controla las funciones de guardar y editar información -->
    <script src="js/agregar_Inscripcion.js" charset="utf-8"></script>
    <!-- Override de estilos del grid para vinculaciones, este override se hace de la clase Claro de Dojo -->
    <style>
  


	</style>
   </head>
<!-- set the claro class on our body element -->

     <body class="claro" onLoad="cargaSeguimiento()">

      <!-- Div superpuesto de color blanco que maneja la carga con la libreria de Dojo -->
      <div style="width:100%;height:100%; background-color:#FFF; opacity:1; position:absolute" id="basic2">
      </div>
      <div style="width:100%;height:100%; background-color:#FFF; display:none;" id="pagina">
       <!-- Div izquierdo Bitacora: Aca se carga todo el formulario y los botones -->
       <div style="float:left; width:100%; height:100%;overflow:auto; border:solid 1px #EAEAEA;-moz-border-radius: 15px;border-radius: 15px;" id="areaform">
        <div class="bubble">
         <div data-dojo-type="dijit.form.Form" class="form-inline" id="myForm" data-dojo-id="myForm" encType="multipart/form-data" action="" method=""  name="myForm" novalidate>
         <script type="dojo/method" data-dojo-event="onSubmit">
		 //Este método permite validar si el formulario esta con los campos establecidos, a parte se validan otro campos manejados solo en html para estructurar los campos obligatorios
        if(this.validate()){
			ano=document.getElementById('SeguimientoParentesco').value;
			mes=document.getElementById('SeguimientoAnoviajeQuinceanera').value;
			parentesco=document.getElementById('SeguimientoMesviajeQuinceanera').value;
			if((ano!=0)&&(mes!=0)&&(parentesco!=0)){
			 //Llamada al método de guardado	
             empujaalobjeto();
			}
			else{
				alert('El formulario no esta completo, por favor revise el campo de parentesco, mes o año de viaje para continuar');
			}
			return false;
        }else{
            alert('El formulario no esta completo, por favor reviselo');
            return false;
        }
      </script>
          <!-- Div de 100% del ancho de la parte izquierda, en el flotan los botones de guardar, volver, transferir y agregar medio -->

          <div  style="width:100%; height:22px;">
             <div style="float:left; width:100%;text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:22px; margin-left:0.3em; margin-bottom:1em">
               <div class="heylo" style="float:right; width:48%; text-align: right">
              <div style="float:right; height:45px; margin-right:1em; font-size:14px;">
                
              <div style="float:left; padding-left:10px;" id="guardar">
               <!-- Los botones son controlados por la libreria Claro de Dojo -->
               <button data-dojo-type="dijit.form.Button" type="submit" name="submitButton" value="Enviar" id="Enviar" >Guardar</button>
              </div>
              <div style="float:left; padding-left:10px;">
                     <div class="dropdown">
                   <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" style="background-color: #e5f2fe;border-radius:6px;box-shadow: inset 0px 5px 10px 1px rgba(23,145,189,0.23);">
                  Enviar
             <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#sendModal" data-whatever="@1">Documentos</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#sendModal" data-whatever="@2">Pagos</a></li>
  </ul>
</div>
              </div>
              <div style="float:left; padding-left:10px;">
              <!-- Los botones son controlados por la libreria Claro de Dojo -->
                <button data-dojo-type="dijit.form.Button" type="cancel" name="cancelButton" value="Cancelar" onClick="window.parent.crearseguimiento('ocultarCrear')">Volver</button>
              </div>
               <div style="float:left; padding-left:10px; display:none;" id="transfer">
               <!-- Los botones son controlados por la libreria Claro de Dojo -->
                
              </div>
               <div style="float:left; padding-left:10px;" id="ingresamedio">
               <!-- Los botones son controlados por la libreria Claro de Dojo -->
                
              </div>
             </div>
             </div>
             <br /><br />
             <div role="tabpanel">
             <ul class="nav nav-tabs theTabs" role="tablist">
    <li role="presentation" class="active"><a href="#inscripcion" aria-controls="inscripcion" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/contract11.png" width="24px"/>Inscripción</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/folder265.png" width="24px"/>&nbsp;Documentos</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/money201.png" width="24px"/>Pagos</a></li>
  </ul> 
  </div>     
            
           </div>
           </div>
           <!----Empieza el formulario por filas-------->

           <div class="container-fluid" style="background-color:#D8E8ED;">
            <div class="row" id="fila1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div class="form-group" style="float:left; padding-left:0.5em">
            <a role="button" onclick="loadSeg()">
            <label for="date" id="titulo">Seguimiento:</label><br/>
             <font style="float:left; padding-left:0.5em; text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;"><span id="est"></span></font>
             </a>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Inscrita el:</label><br/>
             <input type="date" class="form-control" id="date"  />
             </div>
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Quinceañera: (Apellido y Nombre<font color="#FF0000">*</font>)</label><br/>
            <input class="form-control" dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][nombre_quinceanera]" id="SeguimientoNombreQuinceanera"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" required>
            </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">T.I:</label><br/>
             <input class="form-control" id="TI" name="TI" required/>
             </div> 
             <div class="form-group" id="fotoDiv" style="float:left;padding-left:0.5em">
             <label for="agency" id="titulo">Foto: (<font color="#FF0000">*</font>)</label><br/>
             <input  type="file" class="form-control" name="foto" id="foto" style="height:27px; padding-top:2px; padding-bottom:3px; width:215px;"/>
             </div>
             </div>
             <div class="row" id="fila1.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo"># Inscrita:</label><br/>
             <input type="number" class="form-control" id="inscrita" name="inscrita" style="width:160px;" required>
             </div>
              <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Destino: (<font color="#FF0000">*</font>)</label><br/>
            <select class="form-control" id="iddestino" style="float:right" required>
         <option value=""></option>        
         </select>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Año: (<font color="#FF0000">*</font>)</label><br/>
            <select class="form-control" name="data[Seguimiento][anoviaje_quinceanera]" id="SeguimientoAnoviajeQuinceanera" style="width:220px" required>
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
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Mes: (<font color="#FF0000">*</font>)</label><br/>
            <select class="form-control" name="data[Seguimiento][mesviaje_quinceanera]" id="SeguimientoMesviajeQuinceanera" style="width:220px" required>
           <option value="0">Seleccione el mes de salida</option>
           <option value="06">Junio</option>
           <option value="12">Diciembre</option>
          </select>
            </div>             
           </div>
         </div>

  <!-- Nav tabs -->


  <!-- Tab panes -->

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="inscripcion" style="margin-top:2px;">
      <div id="fila7" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
              <br />
             <div style="width:300px; border-bottom:solid 1px #D6ADff; float:left; text-align:left; margin-left:0.5em; margin-bottom:0.5em;">
             <br /><font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Datos Quinceañera</font></div>
             </div>
      <div id="fila2" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
                <div class="form-group" style="float:left;padding-left:0.5em">
             <label for="Vendedor" id="titulo">Vendedor:</label><br/>
             <input class="form-control" dojoType="dijit.form.ValidationTextBox" name="data[Seguimiento][agente]" id="SeguimientoVendedor" trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px" required>
             </div>
             <div class="form-group" style="float:left;padding-left:0.5em">
             <label for="Vendedor" id="titulo">Asesor:</label><br/>
             <select class="form-control" id="asesor" trim="true" style="width:200px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px" required>
              <option></option>
             </select>
             </div>
             <div class="form-group" style="float:left;padding-left:0.5em">
             <label for="agency" id="titulo">Medio: (<font color="#FF0000">*</font>)</label><br/>
             <input class="form-control" name="data[Agencia][Agencia]" id="AgenciaAgencia" required />
             </div>
             <div style="float:left; display:none">
             <label for="time" id="titulo">Hora:</label><br/>
             <input  id="time" name="data[Seguimiento][hora]" />
             </div>
              </div>
          <div id="fila31" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
           <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Ciudad Residencia:</label><br/>
            <input  name="data[Seguimiento][ciudad]" id="SeguimientoCiudad" required>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Email:</label><br/>
            <input class="form-control" type="text" name="data[Seguimiento][mail_quinceanera]" id="SeguimientoMailQuinceanera" 
         data-dojo-type="dijit.form.ValidationTextBox"
          data-dojo-props=" required:false"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px"  required>
            </div> 
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Télefono Fijo:</label><br/>
            <input class="form-control"
           name="data[Seguimiento][telefono_quinceanera]" id="SeguimientoTelefonoQuinceanera"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px"  required>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular:</label><br/>
            <input class="form-control"
          name="data[Seguimiento][celular_quinceanera]" id="SeguimientoCelularQuinceanera"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px"  required>
            </div>
            </div>
            <div id="fila31" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Dirección</label><br/>
             <input class="form-control" id="direccionQuinceanera"  style="width:170px">
             </div>  
            </div>  
            <div id="fila4.2" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Colegio:  (<font color="#FF0000">*</font>)</label><br/>
            <input class="form-control" dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][colegio]" id="colegio"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" required>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Curso:</label><br/>
            <select class="form-control" id="curso" name="curso">
            <option>Sexto</option>
            <option>Septimo</option>
            <option>Octavo</option>
            <option>Noveno</option>
            <option>Decimo</option>
            <option>Once</option>
            <option>Universidad</option>
            </select>
            </div>
          </div>
            <div id="fila5.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Lugar Nacimiento:</label><br/>
             <select class="form-control" id="lugarNacimiento" name="lugarNacimiento" required>
              <option></option>
             </Select>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
              <label for="date" id="titulo">Fecha De Nacimiento:</label><br/>
             <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
             </div> 

             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Registro Civil:</label><br/>
             <input type="number" class="form-control" id="RC" name="RC" style="width:160px;" required>
             </div>
           </div>
             <div id="fila5.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo"># Pasaporte:</label><br/>
             <input class="form-control" id="pasaporte" name="pasaporte" style="width:170px" required>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Serial Pasaporte:</label><br/>
             <input class="form-control" id="serialPasaporte" name="serialPasaporte" style="width:160px;" required>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Prte Expedición:</label><br/>
             <input type="date" class="form-control" id="pasEmision" name="pasExpedi" style="width:160px;" required>
             </div>
             </div>
             
             <div id="fila6.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Prte Vencimiento:</label><br/>
             <input type="date" class="form-control" id="pasVencimiento" name="pasVencimiento" style="width:160px;" required>
             </div>

            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Tiene Visa:</label><br/>
             &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="visaSi" name="visa" value="si" required>Si&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="radio" name="visa" id="visaNo" value="no">No
             </div>


             <div class="form-group" id="divVisa1" style="float:left; padding-left:0.5em;">
             <label for="date" id="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Fecha Emision:</label><br/>
             &nbsp;&nbsp;&nbsp;&nbsp;
             <input type="date" class="form-control" id="visaEmision" name="visaEmision"/>
             </div>
             <div class="form-group" id="divVisa2" style="float:left; padding-left:0.5em;">
             <label for="date" id="titulo">Fecha Vencimiento:</label><br/>
             <input type="date" class="form-control" id="visaVencimiento" name="visaVencimeinto"/>
             </div>
             </div>
             <div id="fila31" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
           <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Facebook:</label><br/>
             <input type="text" class="form-control" id="facebook" name="facebook"/>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Instagram:</label><br/>
             <input type="text" class="form-control" id="instagram" name="instagram"/>
            </div> 
            
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;Documentos:</label><br/>
               <select class="form-control" id="documentosPermiso" name="documentosPermiso">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div> 
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;Pagos:</label><br/>
               <select class="form-control" id="pagosPermiso" name="pagosPermiso">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
             </div>
            
             <div id="fila7" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
              <br />
             <div style="width:300px; border-bottom:solid 1px #D6ADff; float:left; text-align:left; margin-left:0.5em; margin-bottom:0.5em;">
             <br /><font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Quien Hace Inscripción</font></div>
             </div>
             <div id="fila7.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div class="form-group" style="float:left;padding-left:0.5em">
             <label for="whocall" id="titulo">Contacto: (Nombre y Apellido<font color="#FF0000">*</font>)</label><br/>
             <input class="form-control" dojoType="dijit.form.ValidationTextBox" name="data[Seguimiento][nombre]" id="SeguimientoNombre" trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px" data-dojo-props=" required:true, invalidMessage:'Ingresar nombre del contacto.'" promptMessage="Ingrese el nombre de contacto." invalidMessage="El nombre de contacto no puede contener números o caracteres especiales." missingMessage="El nombre de contacto es requerido.">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Cédula:</label><br/>
             <input class="form-control" id="cedulaCon" name="cedulaCon" style="width:170px">
             </div>
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Parentesco: (<font color="#FF0000">*</font>)</label><br/>
            <select class="form-control" name="data[Seguimiento][parentesco]" id="SeguimientoParentesco" onChange="cargadatoslaterales();" style="width:100px" required>
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
            <!----Fila 1---->
            <!----Fila 2---->
            <div id="fila8.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; "> 
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Ciudad: (<font color="#FF0000">*</font>)</label><br/>
            <input class="form-control" id="SeguimientoCiudadesId" style="width:220px" required/>
            </div>
            <div style="float:left;padding-left:1em">
            <label for="time" id="titulo">Teléfono Fijo 1: (<font color="#FF0000">*</font>)</label><br/>
            <input class="form-control"
            name="data[Seguimiento][telefono1]"  id="SeguimientoTelefono1"
            data-dojo-type="dijit.form.ValidationTextBox"data-dojo-props=" required:true, invalidMessage:'Número Telefónico Inválido.'" required trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" required>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Teléfono Fijo 2:</label><br/>
            <input class="form-control" name="data[Seguimiento][telefono2]" id="SeguimientoTelefono2"
            data-dojo-type="dijit.form.ValidationTextBox" data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"  trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" required>
            </div>
            </div>
            <!----Fila 2---->
            <!----Fila 3---->
             <div id="fila9.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Teléfono Fijo 3:</label><br/>
            <input class="form-control"
            name="data[Seguimiento][telefono3]" id="SeguimientoTelefono3"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" >
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular:   (<font color="#FF0000">*</font>)</label></br>
          <input class="form-control"
            name="data[Seguimiento][celular]" id="SeguimientoCelular"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:true, invalidMessage:'Número Telefónico Inválido.'"
           trim="true"  style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" >
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Email: (<font color="#FF0000">*</font>)</label><br/>
          <input class="form-control" name="data[Seguimiento][email]" id="SeguimientoEmail" 
          data-dojo-type="dijit.form.ValidationTextBox"
          data-dojo-props="validator:dojox.validate.isEmailAddress,required:false,invalidMessage:'Correo Electrónico Invalido!'" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" required/>
            </div>
             </div>
            <!----Fila 3---->
            <!----Fila 4---->
             <div id="fila10.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Dirección:</label><br/>
            <input class="form-control" dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][direccion]" id="SeguimientoDireccion"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" required>
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;Documentos:</label><br/>
               <select class="form-control" id="documentosPermisoCon" name="documentosPermisoCon">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div> 
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;Pagos:</label><br/>
               <select class="form-control" id="pagosPermisoCon" name="pagosPermisoCon">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Es Agencia:</label><br/>
             &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="agenciaSi" name="esAgencia" value="si" required>Si&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="radio" name="esAgencia" id="agenciaNo" value="no">No
             </div>
             </div>
             <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#parientes" aria-controls="parientes" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/avatar4.png" width="24px"/>&nbsp;Contactos</a></li>
    <li role="presentation" id="agenciaTab"><a href="#theAgencia" aria-controls="agencia" role="tab" data-toggle="tab">Agencia</a></li>
    <li role="presentation"><a href="#hermanas" aria-controls="hermanas" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/women9.png" width="24px" style="margin-top:2px;"/>&nbsp;Hermanas</a></li>
    <li role="presentation"><a href="#amigas" aria-controls="amigas" role="tab" data-toggle="tab"><img src="/v15/mariposa/img/women9.png" width="24px" style="margin-top:2px;"/>&nbsp;Amigas Inscritas</a></li>
    <li role="presentation" id="visaTab"><a href="#sinVisa" aria-controls="sinVisa" role="tab" data-toggle="tab">Sin Visa</a></li>
  </ul>
    </div>

  <!-- Tab panes -->
  <div class="tab-content b">
    <div role="tabpanel" class="tab-pane active" id="parientes">
      <br/>
      <div id="fila7" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
               <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Nombre del Padre:</label><br/>
            <input class="form-control" dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][nombre_padre]" id="SeguimientoNombrePadre"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Cédula:</label><br/>
             <input class="form-control" id="cedulaPa" name="cedulaPa" style="width:170px" required>
             </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">E-mail del Padre:</label><br/>
            <input class="form-control" type="text" name="data[Seguimiento][mail_padre]" id="SeguimientoMailPadre"  data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:true"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Dirección</label><br/>
             <input class="form-control" id="direccionPa"  style="width:170px">
             </div>
            <div style="float:left;padding-left:0.5em">
           <label for="time" id="titulo">Tel. Oficina Padre:</label><br/>
           <input  class="form-control" 
           name="data[Seguimiento][telefonooficina_padre]" id="SeguimientoTelefonooficinaPadre"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px"onKeyUp="cargadatossimilares('telpa');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular Padre:</label><br/>
            <input  class="form-control"
            name="data[Seguimiento][celular_padre]" id="SeguimientoCelularPadre"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Documentos:</label><br/>
               <select class="form-control" id="documentosPermisoPa" name="documentosPermisoPa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div> 
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Pagos:</label><br/>
               <select class="form-control" id="pagosPermisoPa" name="pagosPermisoPa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
            
             </div>
                    <div id="fila8" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
               <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Nombre de la Madre:</label><br/>
           <input class="form-control" dojoType="dijit.form.ValidationTextBox" 
           name="data[Seguimiento][nombre_madre]" id="SeguimientoNombreMadre"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px"
           >
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Cédula</label><br/>
             <input class="form-control" id="cedulaMa" name="cedulaMa" style="width:170px">
             </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">E-mail de la Madre:</label><br/>
           <input class="form-control" type="text" name="data[Seguimiento][mail_madre]" id="SeguimientoMailMadre"   data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Dirección</label><br/>
             <input class="form-control" id="direccionMa"  style="width:170px">
             </div>
            <div style="float:left;padding-left:0.5em">
           <label for="time" id="titulo">Tel. Oficina Madre:</label><br/>
           <input class="form-control"  
           name="data[Seguimiento][telefonooficina_madre]" id="SeguimientoTelefonooficinaMadre"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" >
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo"> Celular Madre:</label><br/>
            <input  class="form-control"
            name="data[Seguimiento][celular_madre]" id="SeguimientoCelularMadre"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
    required="true"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Documentos:</label><br/>
               <select class="form-control" id="documentosPermisoMa" name="documentosPermisoMa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div> 
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Pagos:</label><br/>
              <select class="form-control" id="pagosPermisoMa" name="pagosPermisoMa">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div>
              

    </div>
    <div id="fila7.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div class="form-group" style="float:left;padding-left:0.5em">
             <label id="titulo">Otro Contacto: (Nombre y Apellido)</label><br/>
             <input type="text"  class="form-control" id="nombreSegundoContacto" name="nombreSegundoContacto">
             </div>
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Cédula</label><br/>
             <input type="number" class="form-control" id="SeguimientoCedula2" name="SeguimientoCedula2" style="width:170px">
             </div>
             <div style="float:left;padding-left:0.5em">
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
            <!----Fila 1---->
            <!----Fila 2---->
            <div id="fila8.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; "> 
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Ciudad: (<font color="#FF0000">*</font>)</label><br/>
            <select class="form-control" id="SeguimientoCiudad2" style="width:220px" required/>
            <option></option>
            </select>
            </div>
            <div style="float:left;padding-left:1em">
            <label for="time" id="titulo">Teléfono Fijo 1: (<font color="#FF0000">*</font>)</label><br/>
            <input type="number" class="form-control"
            name="data[Seguimiento][telefono1]"  id="SeguimientoTelefono122">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Teléfono Fijo 2:</label><br/>
            <input type="number" class="form-control" name="data[Seguimiento][telefono2]" id="SeguimientoTelefono22">
            </div>
            </div>
            <!----Fila 2---->
            <!----Fila 3---->
             <div id="fila9.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular:   (<font color="#FF0000">*</font>)</label></br>
          <input type="number" class="form-control"
            name="data[Seguimiento][celular]" id="SeguimientoCelular2">
            </div>
            
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Email: (<font color="#FF0000">*</font>)</label><br/>
          <input type="text" class="form-control" name="data[Seguimiento][email]" id="SeguimientoEmail2" 
          >
            </div>
             </div>
            <!----Fila 3---->
            <!----Fila 4---->
             <div id="fila10.1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Dirección:</label><br/>
            <input class="form-control"
            name="data[Seguimiento][direccion]" id="SeguimientoDireccion2"
           >
            </div>
            <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;Documentos:</label><br/>
             <select class="form-control" id="documentosPermisoCon2" name="documentosPermisoCon2">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
             </div> 
             <div class="form-group" style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">&nbsp;Pagos:</label><br/>
              <select class="form-control" id="pagosPermisoCon2" name="pagosPermisoCon2">
              <option></option>
              <option value="si">SI</option>
              <option value="no">NO</option>
             </select>
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
             <select type="text" class="form-control" id="ciudadAgencia" name="ciudadAgencia"/>
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
    <table id="amigaTable" style="width:250px;text-align:center; float:left; margin-top:10px;">
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
</div>

    <div role="tabpanel" class="tab-pane" id="profile">
      <br/>
      <br/>
      <div id="docDiv">
        <div><br /></div>
        <table id="docTable">
          <tr id="headerRow"><th>Documento</th><th>Recibido</th><th>Aprobado</th></tr>
        </table>  
      </diV>
      <div><br /></div>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings" style="min-width:900px;">
     <div class="container-fluid" style="text-align:center">
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
     <button id="pagosSubmitButton" type="submit" class="btn btn-primary" style="background-color:#96689F"><span class="flaticon-add196"></span></button>
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
    </div>
  </div><!--tabcontent-->

</div><!--myForm-->
  
            <div style="float:left;padding-left:0.5em" id="transferir">
           </div> 

            </div><!--bubble-->
            <!----Fila 9---->
           <input type="hidden" name="data[Seguimiento][users_id]" id="SeguimientoUsersId" value="0">
           <input type="hidden" name="idseguimiento" id="idseguimiento" value="0">
           <input type="hidden" name="estadoInscripcion" id="estadoInscripcion" value="0">
           <input type="hidden" name="idseguimientopadre" id="idseguimientopadre" value="0">
           <input type="hidden" name="vincula" id="vincula" value="0">
           <input type="hidden" name="transferencia" id="transferencia" value="0">
           <input type="hidden" id="pendientePesos">
           <input type="hidden" id="pendienteDolares">
           <input type="hidden" id="pendienteEuros">
         </div><!--AreaForm-->
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


                <!----Termina el formulario por filas---->

       <!----Div Izquierdo Bitacora--------------------------------------->
       <!-- Div Derecho Bitacora: en caso de estar activo se encarga de manejar las notificaciones -->
       <div style="float:right; width:0%; height:100%;overflow:auto;" id="bit">
        <div style="width:100%; height:45px; position:relative; text-align:left; font-family:Verdana, Geneva, sans-serif; color:#5f5bc2; font-size:16px;">
         <div style="float:left;width:100%; margin-bottom:0.5em;">
             <div id="Esconder"> 
             <!-- Llama al método para esconder la bitacora, el formulario toma el 95% del  ancho de la pantalla -->
              <a href="javascript:escondebitacora();" style="text-decoration:none"><font style="color:#9360f8">>></font><font style="color:#5f5bc2">Bitacora de la Inscripción</font></a>
             </div>
             <div id="Mostrar" style="display:none;width:100%;"> 
             <!-- Llama al método para mostrar la bitacora, al llamarlo se dividen los tamaños a 79% del lado izquiero el resto del lado derecho -->
              <a href="javascript:muestrabitacora();" style="text-decoration:none"><font style="color:#9360f8"><<</font><font style="color:#5f5bc2">Bitacora</font></a>
             </div> 
         </div>
         <div style="width:99%; height:130px;overflow:auto; border:solid 1px #B6B7CF;-moz-border-radius: 15px;border-radius: 15px; text-align:center; padding-top:0.3em; background-color:#EBE6FC; margin-bottom:0.5em;" id="ingresobitacora">
            <textarea style="width:95%; height:100px; border:solid 1px #ADC5FD" id="bitacora">
            </textarea>
            <div style=" float:right; height:10px; color:#8a56ff; font-weight:400; font-family:Verdana, Geneva, sans-serif; font-size:18px; margin-right:0.5em;" onClick="subirbitacora();" onMouseOver="document.body.style.cursor = 'pointer';" onMouseOut="document.body.style.cursor = 'default';">Guardar</div>
         </div>
         <div data-dojo-type="dojo.data.ItemFileReadStore" data-dojo-props="data:storeData" data-dojo-id="foodStore"></div>
         <div id="list" style="width:100%;">
         </div>
        </div>
       </div>
       <!----Div Derecho Bitacora-------->
      </div><!--pagina-->
      
	</body>	
  <div class="modal fade" id="seguroModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog">
       <div class="modal-content" style="min-width:360px; min-height:230px; text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <input type="hidden" id="index">
        <table class="table table-hover" id="checkTable" style="padding:2px 4px 2px 4px; margin-top:20px;">

        </table> 
        <button type="submit" id="aprovadoButton" class="btn btn-default" onclick="recibido2()" style="background-color:#96689F;" disabled>Aprobar</button> 
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
         <option value="Danielruizr1@gmail.com">Daniela La Bella</option>
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
 
        <button type="submit"  id="addNotaButton" class="btn btn-default" onclick="addNota(this)" style="background-color:#96689F;">Agregar</button> 
    </div>
  </div>
</div>
     <script type="text/javascript">
var myTxtArea = document.getElementById('bitacora');
myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,'');

//dijit.byId("iddestino").set("value","13");



</script>

<?php 
     //Con esta validación se revisa si viene un identificador de seguimiento, en caso de venir estos métodos se encargan de carga la información en el formulario, ejecutar los permisos sobre los campos y buscar las bitacoras correspondientes
     
     echo ' <script type="text/javascript">
     
     function setDatosSeguimiento()
     {
      if( window.parent.whatIsNow == "Seg" ){
           setTimeout(\'cargadatos(window.parent.idSeguimienteActualEnUso);\',500);
	        setTimeout(\'buscabitacora(window.parent.idSeguimienteActualEnUso);\',3000); 
        } else {
          setTimeout(\'cargadatos2(window.parent.idSeguimienteActualEnUso);\',500);
          //setTimeout(\'bloqueaCampos();\',500);
          setTimeout(\'buscabitacora(window.parent.idSeguimienteActualEnUso);\',2000);
        }
     }
     
     
     function cargaSeguimiento() 
     {
      dijit.byId("Enviar").setAttribute("disabled", false);	   

      if (window.parent.idSeguimienteActualEnUso==0)
        { 
            
           ingresaidusuario(); 
           setTimeout(\'stoploader();\',500);
           window.parent.idSeguimienteActualEnUso==-1;
        }
       else { 

           setDatosSeguimiento();ingresaidusuario(); startLoader();setTimeout(\'stoploader();\',1000); 
       }  
      }
	  </script>';
     
	 /*@kike: Septiembre 19 de 2014: se desactiva por que arriba se repite
	 
     if(isset($_GET['ids'])){
	 $idseguimiento=$_GET['id'];
	  echo '
	  <script type="text/javascript">
	   setTimeout(\'cargadatos("'.$idseguimiento.'");\',500);
	   setTimeout(\'bloqueaCampos();\',500);
	   setTimeout(\'buscabitacora("'.$idseguimiento.'");\',1500);
	  </script>
	  ';
	}*/
?>   
</html>
<html lang="en" class="dj_webkit dj_chrome dj_contentbox"><head>
    <meta charset="utf-8">
    <title>Agregar Seguimiento</title>
    <!-- Carga Dojo y Css para utilizar la libreria Claro -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/grid/resources/claroGrid.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js" data-dojo-config="isDebug: true, parseOnLoad: true"></script>
    <!-- Llamada al archivo js externo que controla las funciones de guardar y editar información -->
   
    <!-- Override de estilos del grid para vinculaciones, este override se hace de la clase Claro de Dojo -->

    <!-- build:css css/main.css -->
    <!-- endbuild -->

    <!-- build:js js/final/vendor.js -->
       <script src="../js/agregar_Seguimientos.js" charset="utf-8"></script>
    <!-- endbuild -->



    <style>
	//Estilo principal del grid
	 #grid {
      width:100%;
      height:400px;
	  overflow:auto;  
	  background-color:#FFF;
	  float:left;
	  font-size:0.8em;
	  cursor:hand;
	  cursor:pointer;
     }
	 //Estilos de los encabezados y de las celdas
	 .claro .dojoxGridHeader .dojoxGridCell{
	 background:#888888;
	 color:#FFF;
	 font-family:Verdana, Geneva, sans-serif;
	 font-weight:lighter;
	 cursor:hand;
	 cursor:pointer;
     }
	 //Estilos para los títulos
	 #titulo{
			float:left;
			color: #A0A0A0;
			font-family:Verdana, Geneva, sans-serif;
			font-size:14px;
			font-weight: 300;
	}
	
	</style>
   </head>
<!-- set the claro class on our body element -->

     <body class="claro">

      <!-- Div superpuesto de color blanco que maneja la carga con la libreria de Dojo -->
      <div style="width:100%;height:100%; background-color:#FFF; opacity:1; position:absolute" id="basic2">
      </div>
      <div style="width:100%;height:100%; background-color:#FFF; display:none;" id="pagina">
       <!-- Div izquierdo Bitacora: Aca se carga todo el formulario y los botones -->
       <div style="float:left; width:100%; height:100%;overflow:auto; border:solid 1px #EAEAEA;-moz-border-radius: 15px;border-radius: 15px;" id="areaform">
         <div data-dojo-type="dijit.form.Form" id="myForm" data-dojo-id="myForm" encType="multipart/form-data" action="" method=""  name="myForm">
         <script type="dojo/method" data-dojo-event="onSubmit">
		 //Este método permite validar si el formulario esta con los campos establecidos, a parte se validan otro campos manejados solo en html para estructurar los campos obligatorios
        if(this.validate()){
			ano=document.getElementById('SeguimientoParentesco').value;
			mes=document.getElementById('anoviaje_quinceanera').value;
			parentesco=document.getElementById('mesviaje_quinceanera').value;
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
          <div style="width:100%; height:22px;">
             <div style="float:left; width:100%;text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:22px; margin-left:0.3em; margin-bottom:1em">
               <div style="float:right; width:49%; height:22px; text-align: right">
              <div style="float:right; height:45px; margin-right:1em; font-size:14px;">
              <div style="float:left; padding-left:10px;" id="guardar">
               <!-- Los botones son controlados por la libreria Claro de Dojo -->
               <button data-dojo-type="dijit.form.Button" type="submit" name="submitButton" value="Enviar" id="Enviar">Guardar</button>
              </div>
              <div style="float:left; padding-left:10px;">
              <!-- Los botones son controlados por la libreria Claro de Dojo -->
                <button data-dojo-type="dijit.form.Button" type="cancel" name="cancelButton" value="Cancelar" onClick="window.parent.crearseguimiento('ocultarCrear')">Volver</button>
              </div>
               <div style="float:left; padding-left:10px;" id="transfer">
               <!-- Los botones son controlados por la libreria Claro de Dojo -->
                 <button data-dojo-type="dijit.form.DropDownButton">
                     <span>Transferir</span><!-- Text for the button -->
    					<!-- The dialog portion -->
    					<div data-dojo-type="dijit.TooltipDialog" id="ttDialog" style="width:265px;">
        					<input name="transfiere" id="transfiere">
           					<input type="button" value="Enviar transferencia" onClick="cargaTransferencia();" style="width:220px"/>
    				   </div>
                 </button>
              </div>
               <div style="float:left; padding-left:10px;" id="ingresamedio">
               <!-- Los botones son controlados por la libreria Claro de Dojo -->
                 <button data-dojo-type="dijit.form.DropDownButton">
                     <span>Agregar Medio</span><!-- Text for the button -->
    					<!-- The dialog portion -->
    					<div data-dojo-type="dijit.TooltipDialog" id="ttDialog1" style="width:265px;">
        					<input type="text" name="medio" id="medio">
           					<input type="button" value="Agregar Medio" onClick="agregaMedio();" style="width:220px"/>
    				   </div>
                 </button>
              </div>
             </div>
             </div><br /><br />
             <div style="float:left; width:49%; height:22px;text-align:left">
              <div style="width:300px; border-bottom:solid 1px #D6ADff; float:left; text-align:left; margin-left:0.5em; margin-bottom:0.5em;"><font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Datos de Contacto</font></div>
             </div>
            
             </div>
           </div>
           <br/>
           <!----Empieza el formulario por filas-------->
            <div id="fila1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Seguimiento:</label><br/>
             <font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;"><span id="est"></span></font>
             </div>
             <div style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Fecha:</label><br/>
             <input id="date" name="data[Seguimiento][fecha]" />
             </div>
                <div style="float:left;padding-left:0.5em">
             <label for="Vendedor" id="titulo">Vendedor:</label><br/>
             <input  dojoType="dijit.form.ValidationTextBox" name="data[Seguimiento][agente]" id="agente" trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px" >
             </div>
             <div style="float:left; display:none">
             <label for="time" id="titulo">Hora:</label><br/>
             <input id="time" name="data[Seguimiento][hora]" />
             </div>
             <div style="float:left;padding-left:0.5em">
             <label for="agency" id="titulo">Medio: (<font color="#FF0000">*</font>)</label><br/>
             <input name="data[Agencia][Agencia]" id="AgenciaAgencia" />
             </div>
             <div style="float:left;padding-left:0.5em">
             <label for="whocall" id="titulo">Contacto: (Nombre y Apellido<font color="#FF0000">*</font>)</label><br/>
             <input  dojoType="dijit.form.ValidationTextBox" name="data[Seguimiento][nombre]" id="nombrequienllama" trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px" data-dojo-props=" required:true, invalidMessage:'Ingresar nombre del contacto.'" promptMessage="Ingrese el nombre de contacto." invalidMessage="El nombre de contacto no puede contener números o caracteres especiales." missingMessage="El nombre de contacto es requerido." onKeyUp="cargadatossimilares('contacto');">
             </div>
            </div> 
            <!----Fila 1---->
            <!----Fila 2---->
             <div id="fila2" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Ciudad: (<font color="#FF0000">*</font>)</label><br/>
            <input  id="SeguimientoCiudadesId" style="width:220px"/>
            </div>
            <div style="float:left;padding-left:1em">
            <label for="time" id="titulo">Teléfono Fijo 1: (<font color="#FF0000">*</font>)</label><br/>
            <input 
            name="data[Seguimiento][telefono1]" onKeyUp="cargadatossimilares('telefono1');"  id="telefono1"
            data-dojo-type="dijit.form.ValidationTextBox"data-dojo-props=" required:true, invalidMessage:'Número Telefónico Inválido.'" required trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Teléfono Fijo 2:</label><br/>
            <input name="data[Seguimiento][telefono2]" id="telefono2"
            data-dojo-type="dijit.form.ValidationTextBox" data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"  trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
             </div>
            <!----Fila 2----->
            <!----Fila 3---->
             <div id="fila3" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Teléfono Fijo 3:</label><br/>
            <input
            name="data[Seguimiento][telefono3]" id="telefono3"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular:   (<font color="#FF0000">*</font>)</label></br>
          <input 
            name="data[Seguimiento][celular]" id="celular"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:true, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" onKeyUp="cargadatossimilares('celular');"  style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div style="float:left;padding-left:1em">
            <label for="time" id="titulo">Fax:</label><br/>
            <input 
           name="data[Seguimiento][fax]" id="fax"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
    required="true"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Email: (<font color="#FF0000">*</font>)</label><img src="imgs/mail.gif" border="0" onClick="reenviarCorreo(1);" onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
          <input name="data[Seguimiento][email]" id="email" 
          data-dojo-type="dijit.form.ValidationTextBox"
          data-dojo-props="validator:dojox.validate.isEmailAddress,required:false,invalidMessage:'Correo Electrónico Invalido!'" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('maillama');" required/>
            </div>
             </div>
            <!----Fila 3----->
            <!----Fila 4----->
             <div id="fila4" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Dirección:</label><br/>
            <input dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][direccion]" id="direccion"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('direccion');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Parentesco: (<font color="#FF0000">*</font>)</label><br/>
            <select name="data[Seguimiento][parentesco]" id="parentesco" onChange="cargadatoslaterales();" style="width:100px">
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
            <!----Fila 4----->
            <!----Titulo------>
            <div style="width:300px; border-bottom:solid 1px #D6ADff; float:left; text-align:left; margin-left:0.5em; margin-bottom:0.5em;"><font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Datos de Quinceañera</font></div>
            <!----Titulo------->
            <!----Fila 5----->
             <div id="fila5" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
              <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Nombre: (Apellido y Nombre<font color="#FF0000">*</font>)</label><br/>
            <input dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][nombre_quinceanera]" id="nombrequinceanera"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('nombre');" required>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Email:</label><img src="imgs/mail.gif" border="0" onClick="reenviarCorreo(2);" onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
            <input type="text" name="data[Seguimiento][mail_quinceanera]" id="mail_quinceanera" 
         data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('mail');">
            </div>     
           <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Ciudad Residencia:</label><br/>
            <input   data-dojo-type="dijit.form.ValidationTextBox" name="data[Seguimiento][ciudad]" id="SeguimientoCiudad">
            </div>
             </div>
            <!----Fila 5----->
            <!-----Div del grid de busqueda------------>
            <div id="gridbusqueda" style="width:90%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1.5em; float:left;-moz-border-radius: 5px;border-radius: 5px; border:solid 1px #A0B7FF; height:16em;">
            <div style="float:left; width:100%; background-color:#A0B7FF" id="boton">
              <div style="float:left; text-align:left; width:97%; color:#fff;">
               <div style="float:left">
                <img src="imgs/notificacion.png" border="0"/>
               </div>
               <div style="float:left; font-family:Verdana, Geneva, sans-serif; font-size:16px; padding-top:0.3em">
                 YA HAY UN SEGUIMIENTO CON ESTA INFORMACION!
               </div>
              </div>
              <div style=" float:right; text-align:right; width:2%;">
               <img src="imgs/cerrarvin.png" border="0" onClick="cierragrid();" style="cursor:hand;cursor:pointer;"/> 
              </div>
             </div>
             <div style="width:100%; margin-top:3.5em">
             <div id="gridDiv" style="float:left; padding-left:20em;overflow:hidden; height:13em"> 
             </div>
             </div>
            </div>
            <!------------------------------------------>
            <!----Fila 6----->
             <div id="fila6" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Colegio:  (<font color="#FF0000">*</font>)</label><br/>
            <input dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][colegio]" id="colegio"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" required onKeyUp="cargadatossimilares('colegio');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Télefono Fijo:</label><br/>
            <input 
           name="data[Seguimiento][telefono_quinceanera]" id="telefono_quinceanera"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('telefonoquin');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular:</label><br/>
            <input 
          name="data[Seguimiento][celular_quinceanera]" id="celular_quinceanera"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('celularquin');">
            </div>
             </div>
            <!----Fila 6----->
            <!----Fila 10---->
            <div id="fila10" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Destino: (<font color="#FF0000">*</font>)</label><br/>
            <select id="iddestino"></select>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Año: (<font color="#FF0000">*</font>)</label><br/>
            <select name="data[Seguimiento][anoviaje_quinceanera]" id="anoviaje_quinceanera" style="width:220px" required>
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
            <select  name="data[Seguimiento][mesviaje_quinceanera]" id="mesviaje_quinceanera" style="width:220px" required>
           <option value="0">Seleccione el mes de salida</option>
           <option value="06">Junio</option>
           <option value="12">Diciembre</option>
          </select>
            </div>
            </div>
            <!----Fila 10---->
            <!-----Titulo---->
            <div style="width:300px; border-bottom:solid 1px #D6ADff; float:left; text-align:left; margin-left:0.5em; margin-bottom:0.5em;"><font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Datos de Parientes</font></div>
            <!-----Titulo---->
            <!----Fila 7----->
             <div id="fila7" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
               <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Nombre del Padre:</label><br/>
            <input dojoType="dijit.form.ValidationTextBox" 
            name="data[Seguimiento][nombre_padre]" id="nombrepadre"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('nombrepa');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">E-mail del Padre:</label><img src="imgs/mail.gif" border="0" onClick="reenviarCorreo(3);" onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
            <input type="text" name="data[Seguimiento][mail_padre]" id="mail_padre"  data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('emailpa');">
            </div>
            <div style="float:left;padding-left:0.5em">
           <label for="time" id="titulo">Tel. Oficina Padre:</label><br/>
           <input  
           name="data[Seguimiento][telefonooficina_padre]" id="telefonooficina_padre"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px"onKeyUp="cargadatossimilares('telpa');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Celular Padre:</label><br/>
            <input  
            name="data[Seguimiento][celular_padre]" id="celular_padre"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('celpa');">
            </div>
             </div>
            <!----Fila 7----->
            <!----Fila 8----->
             <div id="fila8" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
               <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Nombre de la Madre:</label><br/>
           <input dojoType="dijit.form.ValidationTextBox" 
           name="data[Seguimiento][nombre_madre]" id="nombremadre"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px"
           onKeyUp="cargadatossimilares('nombrema');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">E-mail de la Madre:</label><img src="imgs/mail.gif" border="0" onClick="reenviarCorreo(4);" onMouseOver="document.body.style.cursor='pointer';" onMouseOut="document.body.style.cursor='pointer';"/><br/>
           <input type="text" name="data[Seguimiento][mail_madre]" id="mail_madre"   data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('emailma');">
            </div>
            <div style="float:left;padding-left:0.5em">
           <label for="time" id="titulo">Tel. Oficina Madre:</label><br/>
           <input   
           name="data[Seguimiento][telefonooficina_madre]" id="telefonooficina_madre"
           data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('telma');">
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo"> Celular Madre:</label><br/>
            <input  
            name="data[Seguimiento][celular_madre]" id="celular_madre"
            data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props=" required:false, invalidMessage:'Número Telefónico Inválido.'"
    required="true"
           trim="true" style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border:#D7D7D7 solid 1px" onKeyUp="cargadatossimilares('celma');">
            </div>
             </div>
            <!----Fila 8----->
            <div style="width:300px; border-bottom:solid 1px #D6ADff; float:left; text-align:left; margin-left:0.5em; margin-bottom:0.5em;"><font style="text-align:left;color: #9148EA; font-family:Verdana, Geneva, sans-serif; font-size:18px;">Otra Información</font></div>
            <!----Fila 9----->
             <div id="fila9" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left; ">
             <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Estado:</label><br/>
            <select name="estado" id="estado" onChange="" style="width:220px">
         <option value="1" selected="selected">Pendiente</option>
         <option value="2">Inscrita</option>
         <option value="3">No Inscrita</option>
       </select>
            </div>
            <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Fase:</label><br/>
            <select name="data[Seguimiento][fase]" id="fase" onChange="" style="width:220px">
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
          <div style="float:left;padding-left:0.5em">  
         <label for="time" id="titulo">Interés:</label><br/>
         <select name="data[Seguimiento][interes]" id="interes" onChange="" style="width:220px">
         <option value="1">Muy Interesado</option>
         <option value="2">Medianamente Interesado</option>
         <option value="3">Poco Interesado</option>

         </select>
         </div>
         <div style="float:left; padding-left:0.5em">
             <label for="date" id="titulo">Ultimo Contacto:</label><br/>
             <input dojoType="dijit.form.ValidationTextBox" id="ultimo_contacto" name="data[Seguimiento][ultimo_contacto]"  style="width:100px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px" />
             </div>
         <div style="float:left;padding-left:0.5em">
            <label for="time" id="titulo">Motivo De No Viaje:</label><br/>
            <select name="data[Seguimiento][fase]" id="motivo" onChange="" style="width:220px">
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
             
             
            <br/>
            <br/>
            <br/>
             <div id="fila10" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:0.5em; float:left; ">
            <div style="float:left;" id="obser">
            <label for="time" id="titulo">Observaciones:</label><br/>
            <textarea   id="observacion" style="width:750px;height:50px;border: 1px solid #D7D7D7;-moz-border-radius: 5px;border-radius: 5px;">
            </textarea>
            </div>
            </div>
            <div style="float:left;padding-left:0.5em" id="transferir">
           
            </div> 
            </div>
            <!----Fila 9----->
           <!----Termina el formulario por filas-------->
           <input type="hidden" name="data[Seguimiento][users_id]" id="idusuario" value="0">
           <input type="hidden" name="idseguimiento" id="idseguimiento" value="0">
           <input type="hidden" name="SeguimientoNombreQuinceanera2" id="SeguimientoNombreQuinceanera2">
           <input type="hidden" name="idseguimientopadre" id="idseguimientopadre" value="0">
           <input type="hidden" name="vincula" id="vincula" value="0">
           <input type="hidden" name="transferencia" id="transferencia" value="0">
         </div>
       </div>
       <!----Div Izquierdo Bitacora--------------------------------------->
       <!-- Div Derecho Bitacora: en caso de estar activo se encarga de manejar las notificaciones -->
       <div style="float:right; width:0%; height:100%;overflow:auto;" id="bit">
        <div style="width:100%; height:45px; position:relative; text-align:left; font-family:Verdana, Geneva, sans-serif; color:#5f5bc2; font-size:16px;">
         <div style="float:left;width:100%; margin-bottom:0.5em;">
             <div id="Esconder"> 
             <!-- Llama al método para esconder la bitacora, el formulario toma el 95% del  ancho de la pantalla -->
              <a href="javascript:escondebitacora();" style="text-decoration:none"><font style="color:#9360f8">>></font><font style="color:#5f5bc2">Bitacora del Seguimiento</font></a>
             </div>
             <div id="Mostrar" style="display:none;width:100%;"> 
             <!-- Llama al método para mostrar la bitacora, al llamarlo se dividen los tamaños a 79% del lado izquiero el resto del lado derecho -->
              <a href="javascript:muestrabitacora();" style="text-decoration:none"><font style="color:#9360f8"></font><font style="color:#5f5bc2">Bitacora</font></a>
             </div> 
         </div>
         <div style="width:99%; height:130px;overflow:auto; border:solid 1px #B6B7CF;-moz-border-radius: 15px;border-radius: 15px; text-align:center; padding-top:0.3em; background-color:#EBE6FC; margin-bottom:0.5em;" id="ingresobitacora">
            <textarea style="width:95%; height:100px; border:solid 1px #ADC5FD" id="bitacora">
            </textarea>
            <input type="checkbox" name="llamadaEfectiva" id="llamadaEfectiva" value="1">Llamada Efectiva
            <div style=" float:right; height:10px; color:#8a56ff; font-weight:400; font-family:Verdana, Geneva, sans-serif; font-size:18px; margin-right:0.5em;" onClick="subirbitacora();" onMouseOver="document.body.style.cursor = 'pointer';" onMouseOut="document.body.style.cursor = 'default';">Guardar</div>

         </div>
         <div data-dojo-type="dojo.data.ItemFileReadStore" data-dojo-props="data:storeData" data-dojo-id="foodStore"></div>
         <div id="list" style="width:100%;">
         </div>
        </div>
       </div>
       <!--Div Derecho Bitacora-->
      </div>
	</body>	
     <script type="text/javascript">
   
var myTxtArea = document.getElementById('observacion');
myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,'');
var myTxtArea = document.getElementById('bitacora');
myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,'');

//dijit.byId("iddestino").set("value","13");



</script>
</html>



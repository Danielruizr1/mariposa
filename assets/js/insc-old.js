 
 //Se precargan las librerias con las cuales se van a trabajar los datos, estas se manejan con Dojo 1.7
 //Libreria que maneja la validación de campos
 dojo.require("dijit.form.ValidationTextBox");
 //Libreria que maneja validacion de formularios con Dojo          
 dojo.require("dojox.validate.web");
 //Libreria que maneja las funciones de Formulario con Dojo
 dojo.require("dijit.form.Form");
 //Libreria que maneja las funciones de los botones
 dojo.require("dijit.form.Button");
 //Libreria que maneja el objeto ItemFileReadStore, como una forma de manejar los Data Objects
 dojo.require("dojo.data.ItemFileReadStore");
 dojo.require("dojo.data.ItemFileWriteStore");
 //Libreria que maneja las funciones de memoria y cache de browser
 dojo.require("dojo.store.Memory");
 //Libreria que maneja los obtejos de datos por Dojo
 dojo.require("dojo.data.ObjectStore");
 //Libreria que maneja las funciones del Datagrid
 dojo.require("dojox.grid.DataGrid");
 //Libreria que maneja las funciones del selector multiple para destinos
 dojo.require("dijit.form.MultiSelect");
 //Libreria que maneja la precarga
 dojo.require("dojox.widget.Standby");
 //Libreria que maneja las listas con menu deslpegable 
 dojo.require("dijit.form.DropDownButton");
 //Libreria que maneja los mensajes laterlas que aparecen al validar
 dojo.require("dijit.TooltipDialog");
 //Libreria que maneja los campos de datos del formulario Dojo
 dojo.require("dijit.form.TextBox");
 dojo.require("dojo.date.stamp");
 dojo.require("dojo.date.locale");
 //Variable que recibe del padre todas las agencias
  var agencias = window.parent.agencia;
  //Variable que recibe del padre todos los medios
  var medios=  window.parent.medio;
  //Variable que recibe del padre todos los destinos
  var destinos=  window.parent.destino;
  //var departamentos=window.parent.departamento;
  //Variable que recibe todas las ciudades
  var ciudades=window.parent.ciudad;
  //Variable que recibe todas las bitacoras de acuerdo al seguimiento
  //var datosbitacora=window.parent.bitacora;
  //Variable que levanta a los usuarios del sistema
  var usuarios=window.parent.todos;
  //Con este objeto se levantan los datos de la bitacora para consumo
  var storeData ={identifier: "id",items:window.parent.bitacora};
  // Con este array se pasan busquedas al objeto para query
  var queryObj = {};
  var id;
  var sel;
  //Estas v ariables sirven para colocar los tamaños del formulario y saber el tamaño del div total para ajustar la pantalla a la resolución
  var ancho, tamanodeldiv;
  //Esta variable maneja la precarga de los datos
  var standby;
  var filagencia;
  
    var list ;
		 var contenido='';
		 var fecha;
		 var fechatotal;
		 var mes;
		  var item;
		  var items = new Array();
 /*-----Estilos de los botones de fecha y hora----*/     
	    require(["dijit/form/NumberTextBox", "dijit/form/CurrencyTextBox", "dijit/form/TimeTextBox", "dijit/form/DateTextBox", "dojo/domReady!"], function(NumberTextBox, CurrencyTextBox, TimeTextBox, DateTextBox) {
			//Método de Dojo para manejar la hora del sistema
            var time = new TimeTextBox({
				id:"SeguimientoFecha",
				name:"data[Seguimiento][hora]",
				value:new Date(),
                constraints: {
                    timePattern: "HH:mm:ss",
                    clickableIncrement: "T00:15:00",
                    visibleIncrement: "T00:15:00",
                    visibleRange: "T01:00:00"
                },
                invalidMessage:"Invalid time."
            },"time");
            time.startup();
             //Método par manejar fechas y colocar un selector con Dojo y la clase Claro
             /*var date = new DateTextBox({
				id:"SeguimientoHora",
				name:"data[Seguimiento][fecha]",
				style: "width:10px; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
                value: new Date()
            }, "date");
            date.startup();*/
        });
  /*-------------Métodos de carga de los campos co los dataObject, ajuste de tamaños y creacion del grid de busqueda para vinculaciones----*/
require([
    "dojo/ready", "dojo/store/Memory",
    "dijit/form/ComboBox",  "dijit/form/ValidationTextBox",  "dijit/form/FilteringSelect","dojox/widget/Standby"
], function(ready, Memory, ComboBox, ValidationTextBox, FilteringSelect){
    ready(function(){

		
		//Método que carga el menu de agencias
		var agenciastorelocal=new Memory({data:agencias});
        filagencia=new dijit.form.FilteringSelect({
            id: "idagencia",
			required:true,
			name: 'data[Agencia][Agencia]',
			query: {name: /.*/},
			placeHolder: "Seleccione el Medio",
			invalidMessage:'Medio Invalido!',
            store:agenciastorelocal,
            autoComplete: true,
            style: "width: 100%; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onKeyUp: function(evt){ 
			 input=document.getElementById('idagencia').value;
			 dijit.byId('idagencia').query.name = input || /.*/;
			},
			searchAttr: "name"
        }, "AgenciaAgencia");
		//Método que carga el menu de medios
		new dijit.form.FilteringSelect({
            id: "idmedio",
			required:false,
			name: 'data[Medio][Medio]',
			placeHolder: "Seleccione El medio por el cual se entero",
			invalidMessage:'Medio Invalido!',
            store: new Memory({data:medios}),
            autoComplete: true,
            style: "width: 100%; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			searchAttr: "name"
        }, "MedioMedio");
		//Método que carga el menu de ciudades 
		new dijit.form.FilteringSelect({
            id: "idciudad",
			required:true,
			name: 'data[Seguimiento][ciudades_id]',
			placeHolder: "Seleccione la ciudad",
			invalidMessage:'Ciudad Invalida!',
            store: new Memory({data:ciudades}),
            autoComplete: true,
            style: "width: 100%; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			searchAttr: "name"
        }, "SeguimientoCiudadesId");
		//Método que carga el menu de ciudades para quinceañeras
		new dijit.form.FilteringSelect({
            id: "idciudadquin",
			required:false,
			name: 'data[Seguimiento][ciudad]',
			placeHolder: "Seleccione la ciudad",
			invalidMessage:'Ciudad Invalida!',
            store: new Memory({data:ciudades}),
            autoComplete: true,
            style: "width: 100%; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			searchAttr: "name"
        }, "SeguimientoCiudad");
		new dijit.form.FilteringSelect({
            id: "lugarNacimiento",
			required:false,
			name: 'lugarNacimiento',
			placeHolder: "Seleccione la ciudad",
			invalidMessage:'Ciudad Invalida!',
            store: new Memory({data:ciudades}),
            autoComplete: true,
            style: "width: 100%; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			searchAttr: "name"
        }, "lugarNacimiento");
		
		new dijit.form.FilteringSelect({
            id: "SeguimientoCiudad2",
			required:false,
			name: 'SeguimientoCiudad2',
			placeHolder: "Seleccione la ciudad",
			invalidMessage:'Ciudad Invalida!',
            store: new Memory({data:ciudades}),
            autoComplete: true,
            style: "width: 100%; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			searchAttr: "name"
        }, "SeguimientoCiudad2");
		//Método que carga el menu de usuarios para transferencia
		new dijit.form.ComboBox({
            id: "transfiere",
			name: 'transfiere',
			required:false,
			placeHolder: "Seleccione el usuario para realizar el translado",
			invalidMessage:'Usuario Invalido!',
            store: new Memory({data:usuarios}),
            autoComplete: true,
            style: "width: 100% ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			searchAttr: "nombre"
        }, "transfiere");
		//Destino seleccionado
		//Carga en el multilist los datos del destino
		 //Función para colocarle estilos a los datos del grid y busca el nombre de acuerdo al id
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteado on los estilos y el nombre de acuerdo al id. 
		function poneCiudad(ciudad, rowIndex){
	      window.parent.CuidadesAlmacen.query({id:ciudad}).forEach(function(des){
           nombre=des.name;
        });
	     return '<font style="color:#656565; font-size:0.8em">'+nombre+'</font>';
        }
		 //Función para colocarle estilos a los datos del grid
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteadoc on los estilos. 
	     function cuadraId(id, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+id+'</font>';
         }
		function cuadraNombre(nombrequinceanera, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+nombrequinceanera+'</font>';
         }
		 //Función para colocarle estilos a los datos del grid
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteadoc on los estilos. 
		 function cuadraVendedor(agente, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+agente+'</font>';
         }
		 //Función para colocarle estilos a los datos del grid
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteadoc on los estilos. 
		 function cuadraColegio(colegio, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+colegio+'</font>';
         }
		  //Función para colocarle estilos a los datos del grid
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteadoc on los estilos. 
		 function cuadraCorreo(mail_quinceanera, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+mail_quinceanera+'</font>';
         }
		  //Función para colocarle estilos a los datos del grid
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteadoc on los estilos.  
		 function cuadraTelefono(telefono_quinceanera, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+telefono_quinceanera+'</font>';
         }
		  //Función para colocarle estilos a los datos del grid
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteadoc on los estilos. 
		 function cuadraPadre(nombrepadre, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+nombrepadre+'</font>';
         }
		 //Función para colocarle estilos a los datos del grid
		//Entrada: El dato a setear y el index de la fila
		//Salida: El dato de ingreso seteadoc on los estilos. 
		 function cuadraMadre(nombremadre, rowIndex){
		   return '<font style="color:#656565; font-size:0.8em">'+nombremadre+'</font>';
         }
		 function poneFont(entry, rowIndex){
			 return '<font style="color:#656565; font-size:0.8em">'+entry+'</font>';
		 }
		 //Funcion para inicializar el grid con la estructura y las funciones anteriores
		grid = new dojox.grid.DataGrid({
        id: 'grid',
        store: window.parent.inscripcionStore,
        structure:[
						{name:"id", field:"id", width:"12em",formatter: cuadraId},
						{name:"Vendedor", field:"agente", width:"12em",formatter: cuadraVendedor},
						{name:"Quincea&ntilde;era", field:"nombrequinceanera", width:"12em",formatter: cuadraNombre},
						{name:"Ciudad", field:"ciudad",formatter: poneCiudad, width:"7em"},
						{name:"Colegio", field:"colegio", width:"6.5em",formatter: cuadraColegio},
						{name:"Correo Quincea&ntilde;era", field:"mail_quinceanera", width:"7.5em",formatter: cuadraCorreo},
						{name:"Telefono Fijo", field:"telefono_quinceanera", width:"5.5em",formatter: cuadraTelefono},
						{name:"Nombre Padre", field:"nombrepadre", width:"10em",formatter: cuadraPadre},
						{name:"Nombre Madre", field:"nombremadre", width:"10em",formatter: cuadraMadre},
						{name:"Correo Padre", field:"mail_padre", width: "300px", formatter: poneFont},
						{name:"Tel Padre", field:"telefonooficina_padre", width: "300px", formatter: poneFont},
						{name:"Cel Padre", field:"celular_padre", width: "300px", formatter: poneFont},
						{name:"Correo Madre", field:"mail_madre", width: "300px", formatter: poneFont},
						{name:"Tel Madre", field:"telefonooficina_madre", width: "300px", formatter: poneFont},
						{name:"Cel Madre", field:"celular_madre", width: "300px", formatter: poneFont},
						{name:"Direccion", field:"direccion", width: "300px", formatter: poneFont},
						{name:"cel Quiencea&Ntilde;era", field:"celular_quinceanera", width: "300px", formatter: poneFont},
       ]},"gridDiv");

       //Llama a hacer el render del grid
       grid.startup();
	   dojo.connect(grid, "onRowClick", function(e) {
		   if (confirm('Esta seguro que desea ir al seguimiento?')) {
                      id=grid._getItemAttr(e.rowIndex, 'id');
					  window.parent.crearseguimiento(id);
					  grid.selection.deselectAll(); 
					  grid.selection.setSelected(e.rowIndex, true);
             } else {

             }
            });
	   //Filtra el grid solo por los elemntos padre
	   grid.filter({idpadre:"0"},true);
	   //Si al buscar en el grid no encuentra datos cierra automaticamente cierra el div
	   dojo.connect (grid, "_onFetchComplete", function(items) {
        cuantos=grid.rowCount;
		if(cuantos==0){
			 document.getElementById('boton').style.display='none';
	 	  	 dijit.byId('grid').style.display='none';
	   		 document.getElementById('grid').style.display='none';
	   		 document.getElementById('gridbusqueda').style.display='none';
		}
       });
	   //Deshabilita la primera vista del grid hasta que se genere un cam bio en los campos establecidos
	   //document.getElementById('boton').style.display='none';
	   dijit.byId('grid').style.display='none';
	   //document.getElementById('grid').style.display='none';
	   //dijit.byId("SeguimientoHora").set('disabled', "true");
	   //Setea el ingreso en primera instancia como nuevo
	   document.getElementById('est').innerHTML=' Nuevo';
	   //Recalcula el tamaño del formulario

});	   
    });
//Función para detenr el div y el gif de la carga de datos
//Entrada: Ninguno
//Salida: Para el gif de la carga de datos y deshabilita el div. 
function stoploader(){
	standby.hide();
	document.getElementById('basic2').style.display='none';
	document.getElementById('pagina').style.display='';
	
}

function startLoader()
{
  document.getElementById('basic2').style.display='';
  document.getElementById('pagina').style.display='none';

  standby.show();
}
/*******Funcion para cargar datos si elpariente escogido es el papá o la mamá**********************************/  
//Entrada: Ninguno
//Salida: Se cragan los datos del padre o de la madre si es la opción escogida en el parentesco.
function cargadatoslaterales(){
    viene=document.getElementById('SeguimientoParentesco').value;
    
	if(viene==1){
		document.getElementById('SeguimientoNombrePadre').value=document.getElementById('SeguimientoNombre').value;
	    document.getElementById('SeguimientoMailPadre').value=document.getElementById('SeguimientoEmail').value;
	    document.getElementById('SeguimientoCelularPadre').value=document.getElementById('SeguimientoCelular').value;
	}
	else if(viene==2){
		document.getElementById('SeguimientoNombreMadre').value=document.getElementById('SeguimientoNombre').value;
	    document.getElementById('SeguimientoMailMadre').value=document.getElementById('SeguimientoEmail').value;
	    document.getElementById('SeguimientoCelularMadre').value=document.getElementById('SeguimientoCelular').value;
	}
	else if(viene==14){
		document.getElementById('SeguimientoNombreQuinceanera').value=document.getElementById('SeguimientoNombre').value;
	    document.getElementById('SeguimientoMailQuinceanera').value=document.getElementById('SeguimientoEmail').value;
	    document.getElementById('SeguimientoCelularQuinceanera').value=document.getElementById('SeguimientoCelular').value;
	}
}
/**********************Activa o desactiva el funcionamiento de la observación*********************************/
//Entrada: Ninguno
//Salida: Se desactiva o se activa el campo de observación.
function activaObservacion(){
  cambio=document.getElementById('estado').value
  if(cambio==2 || cambio==3 || cambio==1){
	  document.getElementById('obser').style.display='';
  }else{
	  document.getElementById('obser').style.display='none';
  }
}
/*---------------Asignación del id del usuario activo para ingreso (Viene desde el padre por cake)----*/ 
//Entrada: Ninguno
//Salida: Se ingresa el id del usuario. 
function ingresaidusuario(){
	document.getElementById('SeguimientoUsersId').value=window.parent.idusuarioactivo;
		document.getElementById('SeguimientoVendedor').value=decodeURIComponent(window.parent.nombreuseract.toUpperCase());
}
/****************************Funcion para guardar los datos editados o nuevos***************************/
//Entrada: Ninguno
//Salida: Se guardan los datos en la base de datos y se actualiza el grid principal y el DataObject.
function empujaalobjeto(){
	//Se apaga el boton mientras se genera el guardado de los datos
	//dijit.byId("Enviar").set('disabled', "true");
	//Si el valor del id del usuario es cero se ingresa el id del agente actual, de lo contrario queda el mismo
	if(document.getElementById('SeguimientoUsersId').value==0){	
	 user=window.parent.idusuarioactivo;
	}
	else{
		user=document.getElementById('SeguimientoUsersId').value;
	}
	//Datos del formulario para ingreso
	id=document.getElementById('idseguimiento').value;
	var dates = [];
	window.parent.bitacora2Almacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: false}]}).forEach(function(bita){
	         dates.push(bita.fecha);
	
	});
	var ultimocontacto = dates.pop();
	nombreuser=window.parent.nombreuseract;
	nombreuser=nombreuser.toUpperCase();
	hora=document.getElementById('SeguimientoFecha').value;
	fecha=document.getElementById('date').value;
	console.log(fecha);
	   arreglofecha=fecha.split('-');
	  dia=arreglofecha[1];
	  mes=arreglofecha[0];
	  if(mes<10){
		  mes=mes;
	  }
	  if(dia<10){
		  dia=dia;
	  }
	  //Fecha arreglada para mostrar el ingreso en el grid principal
	  fechatotal=fecha;
	  fechaingreso=fecha;
	  
	agencia=dijit.byId('idagencia').get('value');
	
	
	medio=dijit.byId('idmedio').get('value');
	quienllama=encodeURIComponent(document.getElementById('SeguimientoNombre').value);
	departamento=1;
	ciudad=dijit.byId('idciudad').get('value');
	fijo1=encodeURIComponent(document.getElementById('SeguimientoTelefono1').value);
	fijo2=encodeURIComponent(document.getElementById('SeguimientoTelefono2').value);
	fijo3=encodeURIComponent(document.getElementById('SeguimientoTelefono3').value);
	celular=encodeURIComponent(document.getElementById('SeguimientoCelular').value);
	email=encodeURIComponent(document.getElementById('SeguimientoEmail').value);
	direccion=encodeURIComponent(document.getElementById('SeguimientoDireccion').value);
	parentesco=document.getElementById('SeguimientoParentesco').value;
	nombrequin=encodeURIComponent(document.getElementById('SeguimientoNombreQuinceanera').value);
	nombrequin2=document.getElementById('SeguimientoNombreQuinceanera').value;
	residenciaquin=dijit.byId('idciudadquin').get('value');
	fijoquin=encodeURIComponent(document.getElementById('SeguimientoTelefonoQuinceanera').value);
	celularquin=encodeURIComponent(document.getElementById('SeguimientoCelularQuinceanera').value); 
	destinoquin=document.getElementById('iddestino').value;
	destinoNombre =$("#iddestino option:selected").text();
	anoquin=document.getElementById('SeguimientoAnoviajeQuinceanera').value;
	mesquin=document.getElementById('SeguimientoMesviajeQuinceanera').value;
	mailquin=encodeURIComponent(document.getElementById('SeguimientoMailQuinceanera').value);
	nombrepadre=encodeURIComponent(document.getElementById('SeguimientoNombrePadre').value);
	mailpadre=encodeURIComponent(document.getElementById('SeguimientoMailPadre').value);
	oficinapadre=encodeURIComponent(document.getElementById('SeguimientoTelefonooficinaPadre').value);
	celularpadre=encodeURIComponent(document.getElementById('SeguimientoCelularPadre').value);
	nombremadre=encodeURIComponent(document.getElementById('SeguimientoNombreMadre').value);
	asesor=encodeURIComponent(document.getElementById('asesor').value);
	tieneVisa=$("input[name=visa]:checked").val();
	esAgencia=$("input[name=esAgencia]:checked").val();
	visaEmision=encodeURIComponent(document.getElementById('visaEmision').value);
	visaVencimiento=encodeURIComponent(document.getElementById('visaVencimiento').value);
	TI=encodeURIComponent(document.getElementById('TI').value);
	lugarNacimiento=encodeURIComponent(dijit.byId('lugarNacimiento').get('value').value);
	//foto=encodeURIComponent(document.getElementById('foto').value);
	cedulaPa=encodeURIComponent(document.getElementById('cedulaPa').value);
     SeguimientoNombre2=encodeURIComponent(document.getElementById('nombreSegundoContacto').value);
	SeguimientoTelefono12=encodeURIComponent(document.getElementById('SeguimientoTelefono122').value);
	SeguimientoTelefono22=encodeURIComponent(document.getElementById('SeguimientoTelefono22').value);
	SeguimientoCelular2=encodeURIComponent(document.getElementById('SeguimientoCelular2').value);
	SeguimientoParentesco2=encodeURIComponent(document.getElementById('SeguimientoParentesco2').value);
	SeguimientoEmail2=encodeURIComponent(document.getElementById('SeguimientoEmail2').value);
	SeguimientoDireccion2=encodeURIComponent(document.getElementById('SeguimientoDireccion2').value);
	SeguimientoCedula2=encodeURIComponent(document.getElementById('SeguimientoCedula2').value);
	SeguimientoCiudad2=encodeURIComponent(dijit.byId('SeguimientoCiudad2').get('value').value);
	fechaNacimiento=encodeURIComponent(document.getElementById('fechaNacimiento').value);
	serialPasaporte=encodeURIComponent(document.getElementById('serialPasaporte').value);
	nombreAgencia=encodeURIComponent(document.getElementById('nombreAgencia').value);
	vendedorAgencia=encodeURIComponent(document.getElementById('vendedorAgencia').value);
	celularAgencia=encodeURIComponent(document.getElementById('celularAgencia').value);
	telefonoAgencia=encodeURIComponent(document.getElementById('telefonoAgencia').value);
	ciudadAgencia=encodeURIComponent(document.getElementById('ciudadAgencia').value);
	direccionAgencia=encodeURIComponent(document.getElementById('direccionAgencia').value);
	emailAgencia=encodeURIComponent(document.getElementById('emailAgencia').value);
	NIT=encodeURIComponent(document.getElementById('NIT').value);
	horaRevision=encodeURIComponent(document.getElementById('horaRevision').value);
	horaAsesoria=encodeURIComponent(document.getElementById('horaAsesoria').value);
	horaCita=encodeURIComponent(document.getElementById('horaCita').value);
	horaFH=encodeURIComponent(document.getElementById('horaFH').value);
	preguntaSeguridad=encodeURIComponent(document.getElementById('preguntaSeguridad').value);
	paginaConfirmacion=encodeURIComponent(document.getElementById('paginaConfirmacion').value);
	clave=encodeURIComponent(document.getElementById('clave').value);
	direccionQuinceanera=encodeURIComponent(document.getElementById('direccionQuinceanera').value);
	cedulaMa=encodeURIComponent(document.getElementById('cedulaMa').value);
	facebook=encodeURIComponent(document.getElementById('facebook').value);
	instagram=encodeURIComponent(document.getElementById('instagram').value);
	curso=encodeURIComponent(document.getElementById('curso').value);
	documentosPermiso=encodeURIComponent(document.getElementById('documentosPermiso').value);
	documentosPermisoPa=encodeURIComponent(document.getElementById('documentosPermisoPa').value);
	documentosPermisoCon=encodeURIComponent(document.getElementById('documentosPermisoCon').value);
	documentosPermisoCon2=encodeURIComponent(document.getElementById('documentosPermisoCon2').value);
	documentosPermisoMa=encodeURIComponent(document.getElementById('documentosPermisoMa').value);
	pagosPermiso=encodeURIComponent(document.getElementById('pagosPermiso').value);
	pagosPermisoPa=encodeURIComponent(document.getElementById('pagosPermisoPa').value);
	pagosPermisoCon=encodeURIComponent(document.getElementById('pagosPermisoCon').value);
	pagosPermisoCon2=encodeURIComponent(document.getElementById('pagosPermisoCon2').value);
	pagosPermisoMa=encodeURIComponent(document.getElementById('pagosPermisoMa').value);
	cedulaCon=encodeURIComponent(document.getElementById('cedulaCon').value);
	direccionPa=encodeURIComponent(document.getElementById('direccionPa').value);
	direccionMa=encodeURIComponent(document.getElementById('direccionMa').value);
	pasaporte=encodeURIComponent(document.getElementById('pasaporte').value);
	pasEmision=encodeURIComponent(document.getElementById('pasEmision').value);
	pasVencimiento=encodeURIComponent(document.getElementById('pasVencimiento').value);
	RC=encodeURIComponent(document.getElementById('RC').value);
	inscrita=encodeURIComponent(document.getElementById('inscrita').value);
	visaRevision=encodeURIComponent(document.getElementById('visaRevision').value);
	visaAsesoria=encodeURIComponent(document.getElementById('visaAsesoria').value);
	visaFotos=encodeURIComponent(document.getElementById('visaFotos').value);
	visaCita=encodeURIComponent(document.getElementById('visaCita').value);
	visaInfo=encodeURIComponent(document.getElementById('visaInfo').value);
	visaCD=encodeURIComponent(document.getElementById('visaCD').value);
	console.log(visaCD);
	console.log(visaInfo);
	visaFormato=encodeURIComponent(document.getElementById('visaFormato').value);
	visaCopia=encodeURIComponent(document.getElementById('visaCopia').value);
	formulario2=encodeURIComponent(document.getElementById('formulario2').value);
	RCB=encodeURIComponent(document.getElementById('RCB').value);
	PFC=encodeURIComponent(document.getElementById('PFC').value);
	pagConfirmacion=encodeURIComponent(document.getElementById('pagConfirmacion').value);
	CopiaCCduenoTC=encodeURIComponent(document.getElementById('CopiaCCduenoTC').value);
	mailmadre=encodeURIComponent(document.getElementById('SeguimientoMailMadre').value);
	oficinamadre=encodeURIComponent(document.getElementById('SeguimientoTelefonooficinaMadre').value);
	celularmadre=encodeURIComponent(document.getElementById('SeguimientoCelularMadre').value);
	estadoInscripcion=encodeURIComponent(document.getElementById('estadoInscripcion').value);
	id=document.getElementById('idseguimiento').value;
	idpadre=document.getElementById('idseguimientopadre').value;
	vincula=document.getElementById('vincula').value;
	colegio=encodeURIComponent(document.getElementById('colegio').value);
	//Ejecuta el ajax con Dojo para ingresar los datos a la base de datos
	require(["dojo/_base/xhr"],
    function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/recibeajax?id="+id+"&user="+user+"&fecha="+fecha+"&hora="+hora+"&agencia="+agencia+"&CopiaCCduenoTC="+CopiaCCduenoTC+"&direccionQuinceanera="+direccionQuinceanera+"&RCB="+RCB+"&PFC="+PFC+"&pagConfirmacion="+pagConfirmacion+"&formulario2="+formulario2+"&medio="+medio+"&esAgencia="+esAgencia+"&quienllama="+quienllama+"&departamento="+departamento+"&ciudad="+ciudad+"&fijo1="+fijo1+"&fijo2="+fijo2+"&fijo3="+fijo3+"&celular="+celular+"&email="+email+"&direccion="+direccion+"&parentesco="+parentesco+"&nombrequin="+nombrequin+"&residenciaquin="+residenciaquin+"&fijoquin="+fijoquin+"&celularquin="+celularquin+"&destinoquin="+destinoquin+"&anoquin="+anoquin+"&mesquin="+mesquin+
           "&mailquin="+mailquin+"&nombrepadre="+nombrepadre+"&mailpadre="+mailpadre+"&oficinapadre="+oficinapadre+"&celularpadre="+celularpadre+
           "&nombremadre="+nombremadre+"&mailmadre="+mailmadre+"&oficinamadre="+oficinamadre+"&celularmadre="+celularmadre+"&idpadre="+idpadre+
           "&vincula="+vincula+"&SeguimientoCedula2="+SeguimientoCedula2+"&SeguimientoDireccion2="+SeguimientoDireccion2+"&SeguimientoCelular2="+SeguimientoCelular2+"&SeguimientoEmail2="+SeguimientoEmail2+"&SeguimientoTelefono22="+SeguimientoTelefono22+"&SeguimientoCiudad2="+SeguimientoCiudad2+"&SeguimientoTelefono12="+SeguimientoTelefono12+"&SeguimientoParentesco2="+SeguimientoParentesco2+"&SeguimientoNombre2="+SeguimientoNombre2+"&clave="+clave+"&paginaConfirmacion="+paginaConfirmacion+"&preguntaSeguridad="+preguntaSeguridad+"&horaFH="+horaFH+"&horaCita="+horaCita+"&horaAsesoria="+horaAsesoria+"&horaRevision="+horaRevision+"&emailAgencia="+emailAgencia+"&direccionAgencia="+direccionAgencia+"&ciudadAgencia="+ciudadAgencia+"&telefonoAgencia="+telefonoAgencia+"&celularAgencia="+celularAgencia+"&vendedorAgencia="+vendedorAgencia+"&nombreAgencia="+nombreAgencia+"&serialPasaporte="+serialPasaporte+"&fechaNacimiento="+fechaNacimiento+"&colegio="+colegio+"&asesor="+asesor+"&tieneVisa="+tieneVisa+"&visaEmision="+visaEmision+"&visaVencimiento="+visaVencimiento+
           "&NIT="+NIT+"&TI="+TI+"&lugarNacimiento="+lugarNacimiento+"&cedulaPa="+cedulaPa+"&cedulaMa="+cedulaMa+"&pasaporte="+pasaporte+"&pasEmision="+pasEmision+
           "&pasVencimiento="+pasVencimiento+"&RC="+RC+"&inscrita="+inscrita+"&visaRevision="+visaRevision+"&visaAsesoria="+visaAsesoria+"&visaFotos="+visaFotos+
           "&visaCita="+visaCita+"&visaInfo="+visaInfo+"&visaCD="+visaCD+"&visaFormato="+visaFormato+"&visaCopia="+visaCopia+"&estadoInscripcion="+estadoInscripcion+"&facebook="+facebook
           +"&instagram="+instagram+"&curso="+curso+"&documentosPermiso="+documentosPermiso+"&pagosPermiso="+pagosPermiso+"&documentosPermisoMa="+documentosPermisoMa
           +"&documentosPermisoPa="+documentosPermisoPa+"&pagosPermisoMa="+pagosPermisoMa+"&pagosPermisoPa="+pagosPermisoPa+"&cedulaCon="+cedulaCon
           +"&direccionMa="+direccionMa+"&direccionPa="+direccionPa+"&documentosPermisoCon="+documentosPermisoCon+"&documentosPermisoCon2="+documentosPermisoCon2+"&pagosPermisoCon="+pagosPermisoCon+"&pagosPermisoCon2="+pagosPermisoCon2,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
				
			   if(result==-1){
				   var inscripcionactualizar=window.parent.inscripcionAlmacen.get(id);
				    inscripcionactualizar.fechaingreso=fechaingreso;
	                inscripcionactualizar.horaingreso=hora;
	                inscripcionactualizar.nombrequienllama=decodeURIComponent(quienllama);
	                inscripcionactualizar.telefono1=fijo1;
	                inscripcionactualizar.telefono2=fijo2;
	                inscripcionactualizar.telefono3=fijo3;
	                inscripcionactualizar.celular=celular;
					inscripcionactualizar.esAgencia=esAgencia;
	                inscripcionactualizar.documentosPermiso=documentosPermiso;
					inscripcionactualizar.documentosPermisoCon=documentosPermisoCon;
					inscripcionactualizar.documentosPermisoCon2=documentosPermisoCon2;
	                inscripcionactualizar.documentosPermisoMa=documentosPermisoMa;
	                inscripcionactualizar.documentosPermisoPa=documentosPermisoPa;
	                inscripcionactualizar.pagosPermiso=pagosPermiso;
					inscripcionactualizar.pagosPermisoCon=pagosPermisoCon;
					inscripcionactualizar.pagosPermisoCon2=pagosPermisoCon2;
	                inscripcionactualizar.pagosPermisoPa=pagosPermisoPa;
	                inscripcionactualizar.pagosPermisoMa=pagosPermisoMa;
	                inscripcionactualizar.facebook=facebook;
	                inscripcionactualizar.instagram=instagram;
	                inscripcionactualizar.curso=curso;
					inscripcionactualizar.direccionQuinceanera=direccionQuinceanera;
	                inscripcionactualizar.SeguimientoNombre2=SeguimientoNombre2;
	                inscripcionactualizar.SeguimientoCelular2=SeguimientoCelular2;
	                inscripcionactualizar.SeguimientoTelefono12=SeguimientoTelefono12;
	                inscripcionactualizar.SeguimientoTelefono22=SeguimientoTelefono22;
	                inscripcionactualizar.SeguimientoDireccion2=SeguimientoDireccion2;
	                inscripcionactualizar.SeguimientoParentesco2=SeguimientoParentesco2;
	                inscripcionactualizar.SeguimientoCedula2=SeguimientoCedula2;
	                inscripcionactualizar.SeguimientoEmail2=SeguimientoEmail2;
	                inscripcionactualizar.SeguimientoCiudad2=SeguimientoCiudad2;
	                inscripcionactualizar.documentosPermisoCon=documentosPermisoCon;
	                inscripcionactualizar.pagosPermisoCon=pagosPermisoCon;
	                inscripcionactualizar.cedulaCon=cedulaCon;
	                inscripcionactualizar.direccionPa=direccionPa;
	                inscripcionactualizar.direccionMa=direccionMa;
	                inscripcionactualizar.email=email;
	                inscripcionactualizar.direccion=decodeURIComponent(direccion);
	                inscripcionactualizar.parentesco=parentesco;
	                inscripcionactualizar.nombrequinceanera=decodeURIComponent(nombrequin).toUpperCase();
	                inscripcionactualizar.ciudadquin=residenciaquin;
					inscripcionactualizar.nombreciudad=residenciaquin;
	                inscripcionactualizar.telefono_quinceanera=fijoquin;
	                inscripcionactualizar.celular_quinceanera=celularquin;
	                inscripcionactualizar.anoviaje_quinceanera=anoquin;
	                inscripcionactualizar.mesviaje_quinceanera=mesquin;
	                inscripcionactualizar.mail_quinceanera=mailquin;
	                inscripcionactualizar.nombrepadre=nombrepadre;
	                inscripcionactualizar.mail_padre=mailpadre;
	                inscripcionactualizar.telefonooficina_padre=oficinapadre;
	                inscripcionactualizar.celular_padre=celularpadre;
	                inscripcionactualizar.nombremadre=nombremadre;
	                inscripcionactualizar.mail_madre=mailmadre;
	                inscripcionactualizar.telefonooficina_madre=oficinamadre;
	                inscripcionactualizar.celular_madre=celularmadre;
	                inscripcionactualizar.agencia=dijit.byId('idagencia').attr('displayedValue');
					inscripcionactualizar.agenciaid=agencia;
	                inscripcionactualizar.medio=medio;
	                inscripcionactualizar.departamento=departamento;
	                inscripcionactualizar.ciudad=ciudad;
	                inscripcionactualizar.numeroDestino=destinoquin;
					inscripcionactualizar.destino=destinoquin;
					inscripcionactualizar.colegio=colegio;
					inscripcionactualizar.asesor=asesor;
					inscripcionactualizar.tieneVisa=tieneVisa;
					inscripcionactualizar.visaEmision=visaEmision;
					inscripcionactualizar.visaVencimiento=visaVencimiento;
					inscripcionactualizar.TI=TI;
					inscripcionactualizar.lugarNacimiento=lugarNacimiento;
					inscripcionactualizar.cedulaPa=cedulaPa;
					inscripcionactualizar.fechaNacimiento=fechaNacimiento;
					inscripcionactualizar.serialPasaporte=serialPasaporte;
					inscripcionactualizar.nombreAgencia=nombreAgencia;
					inscripcionactualizar.vendedorAgencia=vendedorAgencia;
					inscripcionactualizar.celularAgencia=celularAgencia;
					inscripcionactualizar.telefonoAgencia=telefonoAgencia;
					inscripcionactualizar.ciudadAgencia=ciudadAgencia;
					inscripcionactualizar.emailAgencia=emailAgencia;
					inscripcionactualizar.direccionAgencia=direccionAgencia;
					inscripcionactualizar.NIT=NIT;
					inscripcionactualizar.horaRevision=horaRevision;
					inscripcionactualizar.horaAsesoria=horaAsesoria;
					inscripcionactualizar.horaCita=horaCita;
					inscripcionactualizar.horaFH=horaFH;
					inscripcionactualizar.preguntaSeguridad=preguntaSeguridad;
					inscripcionactualizar.paginaConfirmacion=paginaConfirmacion;
					inscripcionactualizar.clave=clave;
					inscripcionactualizar.cedulaMa=cedulaMa;
					inscripcionactualizar.pasaporte=pasaporte;
					inscripcionactualizar.pasEmision=pasEmision;
					inscripcionactualizar.pasVencimiento=pasVencimiento;
					inscripcionactualizar.RC=RC;
					inscripcionactualizar.inscrita=inscrita;
					inscripcionactualizar.RCB=RCB;
					inscripcionactualizar.PFC=PFC;
					inscripcionactualizar.pagConfirmacion=pagConfirmacion;
					inscripcionactualizar.formulario2=formulario2;
					inscripcionactualizar.CopiaCCduenoTC=CopiaCCduenoTC;
					inscripcionactualizar.visaInfo=visaInfo;
					inscripcionactualizar.visaCD=visaCD;
					inscripcionactualizar.visaFotos=visaFotos;
					inscripcionactualizar.visaCita=visaCita;
					inscripcionactualizar.visaRevision=visaRevision;
					inscripcionactualizar.visaAsesoria=visaAsesoria;
					inscripcionactualizar.visaFormato=visaFormato;
					inscripcionactualizar.visaCopia=visaCopia;
					window.parent.inscripcionAlmacen.put(inscripcionactualizar);
	                window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
					alert("Se ha ingresado con éxito la inscripción");
			   }
			   else{
				   //Ingresa al DataObject la información y actualiza el grid principal 
				  fechaingreso= arreglofecha[2]+"-"+dia+"-"+mes;//arreglofecha[2]+"-"+dia+"-"+mes//Se reorganiza la fecha del seguiimiento para ser usado enel home para la notificación de correo;
				var entrada={id:result,inscrita:inscrita,destino:destinoquin,nombreciudad:residenciaquin, agente:nombreuser,direccionQuinceanera:direccionQuinceanera, departamento:departamento,CopiaCCduenoTC:CopiaCCduenoTC,pagConfirmacion:pagConfirmacion,RCB:RCB,PFC:PFC,formulario2:formulario2,esAgencia:esAgencia,clave:clave,paginaConfirmacion:paginaConfirmacion,preguntaSeguridad:preguntaSeguridad,horaFH:horaFH,horaCita:horaCita,horaAsesoria:horaAsesoria,horaRevision:horaRevision,NIT:NIT,emailAgencia:emailAgencia,ciudadAgencia:ciudadAgencia,direccionAgencia:direccionAgencia,telefonoAgencia:telefonoAgencia,celularAgencia:celularAgencia,vendedorAgencia:vendedorAgencia,nombreAgencia:nombreAgencia,serialPasaporte:serialPasaporte, fechaNacimiento:fechaNacimiento, ciudad:ciudad,
				 nombrequienllama:decodeURIComponent(quienllama).toUpperCase(), parentesco:parentesco, fechaingreso:fechaingreso, 
				 horaingreso:hora, telefono1:fijo1, telefono2:fijo2, telefono3:fijo3, celular:celular, email:email, ciudadquin:residenciaquin, 
				 direccion:direccion, SeguimientoEmail2:SeguimientoEmail2, SeguimientoCiudad2:SeguimientoCiudad2, SeguimientoDireccion2:SeguimientoDireccion2,  SeguimientoParentesco2:SeguimientoParentesco2, SeguimientoTelefono22:SeguimientoTelefono22, SeguimientoTelefono12:SeguimientoTelefono12, SeguimientoCelular2:SeguimientoCelular2, SeguimientoCedula2:SeguimientoCedula2, SeguimientoNombre2:SeguimientoNombre2,documentosPermiso:documentosPermiso, documentosPermisoCon:documentosPermisoCon,documentosPermisoCon2:documentosPermisoCon2,documentosPermisoPa:documentosPermisoPa,documentosPermisoMa:documentosPermisoMa,
				  pagosPermiso:pagosPermiso,pagosPermisoCon:pagosPermisoCon,pagosPermisoCon2:pagosPermisoCon2,pagosPermisoPa:pagosPermisoPa,pagosPermisoMa:pagosPermisoMa,facebook:facebook,instagram:instagram,
				  curso:curso,cedulaCon:cedulaCon,direccionMa:direccionMa,direccionPa:direccionPa,telefonooficina_padre:oficinapadre, telefonooficina_madre:oficinamadre, visaEmision:visaEmision,
				 celular_padre:celularpadre, celular_madre:celularmadre, mail_padre:mailpadre, mail_madre:mailmadre,tieneVisa:tieneVisa, 
				 telefono_quinceanera:fijoquin, mail_quinceanera:mailquin, celular_quinceanera:celularquin, anoviaje_quinceanera:anoquin, 
				 mesviaje_quinceanera:mesquin, nombrepadre:nombrepadre, nombremadre:nombremadre, nombrequinceanera:decodeURIComponent(nombrequin).toUpperCase(), 
				 agencia:dijit.byId('idagencia').attr('displayedValue'),agenciaid:agencia, medio:medio, numeroDestino:destinoquin, asesor:asesor, 
				 idusuario:user, idpadre:idpadre, transferencia:'0', vinculacion:vincula, colegio:colegio, bitacora:'0',visaVencimiento:visaVencimiento,
				 TI:TI,lugarNacimiento:lugarNacimiento, cedulaPa:cedulaPa, cedulaMa:cedulaMa,pasaporte:pasaporte,pasEmision:pasEmision,
				 pasVencimiento:pasVencimiento,RC:RC,visaInfo:visaInfo,visaCD:visaCD,visaFotos:visaFotos,visaCita:visaCita,visaRevision:visaRevision,
				 visaAsesoria:visaAsesoria,visaFormato:visaFormato,visaCopia:visaCopia,documentosPermisoCon:documentosPermisoCon,pagosPermisoCon:pagosPermisoCon};
				
				
	window.parent.inscripcionAlmacen.add(entrada);			
	window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
	document.getElementById('idseguimiento').value=result;
	alert("Se ha ingresado exitosamente la inscripcion");
	ancho=window.innerWidth;
	anchoform=ancho*78/100;
	anchobit=ancho*20/100;
	document.getElementById('areaform').style.width=anchoform+'px';
	document.getElementById('bit').style.width=anchobit+'px';
	document.getElementById('est').innerHTML=' No.'+document.getElementById('idseguimiento').value;
           }
		   return false;
		  }
        });        
    });
     var theFile = document.getElementById('foto');
     var file = theFile.files[0];
     if(file){
	 var extension = file.name.split(".");
     var data = new FormData();
     data.append('image', file);
     data.append('destino', destinoNombre);
	 data.append('extension', extension[1]);
     data.append('mes', mesquin);
     data.append('year', anoquin);
     data.append('nombre', nombrequin2);
     data.append('id', id);
     nombrequin2 = nombrequin2.replace(/\s/g, "_");
	 nombrequin2 = nombrequin2.replace(/ñ/g, "n");
	 nombre = removeDiacritics(nombrequin2);
	 console.log(nombre);
     eldestino = destinoNombre.replace(/\s/g, "_");
           $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaFoto",
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $("#foto").hide();
                $("<img id='fotoQuin' src'#' style='width:120px; height:120px; margin-top:-60px;'>").appendTo("#fotoDiv");
                $("#fotoQuin").attr("src", " /v15/mariposa/img/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"."+extension[1]);
                var inscripcionactualizar=window.parent.inscripcionAlmacen.get(id);
                inscripcionactualizar.foto = "img/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"."+extension[1];
                window.parent.inscripcionAlmacen.put(inscripcionactualizar);
	            window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
            }
        });
       }
}
function removeDiacritics (str) {

  var defaultDiacriticsRemovalMap = [
    {'base':'A', 'letters':/[\u0041\u24B6\uFF21\u00C0\u00C1\u00C2\u1EA6\u1EA4\u1EAA\u1EA8\u00C3\u0100\u0102\u1EB0\u1EAE\u1EB4\u1EB2\u0226\u01E0\u00C4\u01DE\u1EA2\u00C5\u01FA\u01CD\u0200\u0202\u1EA0\u1EAC\u1EB6\u1E00\u0104\u023A\u2C6F]/g},
    {'base':'AA','letters':/[\uA732]/g},
    {'base':'AE','letters':/[\u00C6\u01FC\u01E2]/g},
    {'base':'AO','letters':/[\uA734]/g},
    {'base':'AU','letters':/[\uA736]/g},
    {'base':'AV','letters':/[\uA738\uA73A]/g},
    {'base':'AY','letters':/[\uA73C]/g},
    {'base':'B', 'letters':/[\u0042\u24B7\uFF22\u1E02\u1E04\u1E06\u0243\u0182\u0181]/g},
    {'base':'C', 'letters':/[\u0043\u24B8\uFF23\u0106\u0108\u010A\u010C\u00C7\u1E08\u0187\u023B\uA73E]/g},
    {'base':'D', 'letters':/[\u0044\u24B9\uFF24\u1E0A\u010E\u1E0C\u1E10\u1E12\u1E0E\u0110\u018B\u018A\u0189\uA779]/g},
    {'base':'DZ','letters':/[\u01F1\u01C4]/g},
    {'base':'Dz','letters':/[\u01F2\u01C5]/g},
    {'base':'E', 'letters':/[\u0045\u24BA\uFF25\u00C8\u00C9\u00CA\u1EC0\u1EBE\u1EC4\u1EC2\u1EBC\u0112\u1E14\u1E16\u0114\u0116\u00CB\u1EBA\u011A\u0204\u0206\u1EB8\u1EC6\u0228\u1E1C\u0118\u1E18\u1E1A\u0190\u018E]/g},
    {'base':'F', 'letters':/[\u0046\u24BB\uFF26\u1E1E\u0191\uA77B]/g},
    {'base':'G', 'letters':/[\u0047\u24BC\uFF27\u01F4\u011C\u1E20\u011E\u0120\u01E6\u0122\u01E4\u0193\uA7A0\uA77D\uA77E]/g},
    {'base':'H', 'letters':/[\u0048\u24BD\uFF28\u0124\u1E22\u1E26\u021E\u1E24\u1E28\u1E2A\u0126\u2C67\u2C75\uA78D]/g},
    {'base':'I', 'letters':/[\u0049\u24BE\uFF29\u00CC\u00CD\u00CE\u0128\u012A\u012C\u0130\u00CF\u1E2E\u1EC8\u01CF\u0208\u020A\u1ECA\u012E\u1E2C\u0197]/g},
    {'base':'J', 'letters':/[\u004A\u24BF\uFF2A\u0134\u0248]/g},
    {'base':'K', 'letters':/[\u004B\u24C0\uFF2B\u1E30\u01E8\u1E32\u0136\u1E34\u0198\u2C69\uA740\uA742\uA744\uA7A2]/g},
    {'base':'L', 'letters':/[\u004C\u24C1\uFF2C\u013F\u0139\u013D\u1E36\u1E38\u013B\u1E3C\u1E3A\u0141\u023D\u2C62\u2C60\uA748\uA746\uA780]/g},
    {'base':'LJ','letters':/[\u01C7]/g},
    {'base':'Lj','letters':/[\u01C8]/g},
    {'base':'M', 'letters':/[\u004D\u24C2\uFF2D\u1E3E\u1E40\u1E42\u2C6E\u019C]/g},
    {'base':'N', 'letters':/[\u004E\u24C3\uFF2E\u01F8\u0143\u00D1\u1E44\u0147\u1E46\u0145\u1E4A\u1E48\u0220\u019D\uA790\uA7A4]/g},
    {'base':'NJ','letters':/[\u01CA]/g},
    {'base':'Nj','letters':/[\u01CB]/g},
    {'base':'O', 'letters':/[\u004F\u24C4\uFF2F\u00D2\u00D3\u00D4\u1ED2\u1ED0\u1ED6\u1ED4\u00D5\u1E4C\u022C\u1E4E\u014C\u1E50\u1E52\u014E\u022E\u0230\u00D6\u022A\u1ECE\u0150\u01D1\u020C\u020E\u01A0\u1EDC\u1EDA\u1EE0\u1EDE\u1EE2\u1ECC\u1ED8\u01EA\u01EC\u00D8\u01FE\u0186\u019F\uA74A\uA74C]/g},
    {'base':'OI','letters':/[\u01A2]/g},
    {'base':'OO','letters':/[\uA74E]/g},
    {'base':'OU','letters':/[\u0222]/g},
    {'base':'P', 'letters':/[\u0050\u24C5\uFF30\u1E54\u1E56\u01A4\u2C63\uA750\uA752\uA754]/g},
    {'base':'Q', 'letters':/[\u0051\u24C6\uFF31\uA756\uA758\u024A]/g},
    {'base':'R', 'letters':/[\u0052\u24C7\uFF32\u0154\u1E58\u0158\u0210\u0212\u1E5A\u1E5C\u0156\u1E5E\u024C\u2C64\uA75A\uA7A6\uA782]/g},
    {'base':'S', 'letters':/[\u0053\u24C8\uFF33\u1E9E\u015A\u1E64\u015C\u1E60\u0160\u1E66\u1E62\u1E68\u0218\u015E\u2C7E\uA7A8\uA784]/g},
    {'base':'T', 'letters':/[\u0054\u24C9\uFF34\u1E6A\u0164\u1E6C\u021A\u0162\u1E70\u1E6E\u0166\u01AC\u01AE\u023E\uA786]/g},
    {'base':'TZ','letters':/[\uA728]/g},
    {'base':'U', 'letters':/[\u0055\u24CA\uFF35\u00D9\u00DA\u00DB\u0168\u1E78\u016A\u1E7A\u016C\u00DC\u01DB\u01D7\u01D5\u01D9\u1EE6\u016E\u0170\u01D3\u0214\u0216\u01AF\u1EEA\u1EE8\u1EEE\u1EEC\u1EF0\u1EE4\u1E72\u0172\u1E76\u1E74\u0244]/g},
    {'base':'V', 'letters':/[\u0056\u24CB\uFF36\u1E7C\u1E7E\u01B2\uA75E\u0245]/g},
    {'base':'VY','letters':/[\uA760]/g},
    {'base':'W', 'letters':/[\u0057\u24CC\uFF37\u1E80\u1E82\u0174\u1E86\u1E84\u1E88\u2C72]/g},
    {'base':'X', 'letters':/[\u0058\u24CD\uFF38\u1E8A\u1E8C]/g},
    {'base':'Y', 'letters':/[\u0059\u24CE\uFF39\u1EF2\u00DD\u0176\u1EF8\u0232\u1E8E\u0178\u1EF6\u1EF4\u01B3\u024E\u1EFE]/g},
    {'base':'Z', 'letters':/[\u005A\u24CF\uFF3A\u0179\u1E90\u017B\u017D\u1E92\u1E94\u01B5\u0224\u2C7F\u2C6B\uA762]/g},
    {'base':'a', 'letters':/[\u0061\u24D0\uFF41\u1E9A\u00E0\u00E1\u00E2\u1EA7\u1EA5\u1EAB\u1EA9\u00E3\u0101\u0103\u1EB1\u1EAF\u1EB5\u1EB3\u0227\u01E1\u00E4\u01DF\u1EA3\u00E5\u01FB\u01CE\u0201\u0203\u1EA1\u1EAD\u1EB7\u1E01\u0105\u2C65\u0250]/g},
    {'base':'aa','letters':/[\uA733]/g},
    {'base':'ae','letters':/[\u00E6\u01FD\u01E3]/g},
    {'base':'ao','letters':/[\uA735]/g},
    {'base':'au','letters':/[\uA737]/g},
    {'base':'av','letters':/[\uA739\uA73B]/g},
    {'base':'ay','letters':/[\uA73D]/g},
    {'base':'b', 'letters':/[\u0062\u24D1\uFF42\u1E03\u1E05\u1E07\u0180\u0183\u0253]/g},
    {'base':'c', 'letters':/[\u0063\u24D2\uFF43\u0107\u0109\u010B\u010D\u00E7\u1E09\u0188\u023C\uA73F\u2184]/g},
    {'base':'d', 'letters':/[\u0064\u24D3\uFF44\u1E0B\u010F\u1E0D\u1E11\u1E13\u1E0F\u0111\u018C\u0256\u0257\uA77A]/g},
    {'base':'dz','letters':/[\u01F3\u01C6]/g},
    {'base':'e', 'letters':/[\u0065\u24D4\uFF45\u00E8\u00E9\u00EA\u1EC1\u1EBF\u1EC5\u1EC3\u1EBD\u0113\u1E15\u1E17\u0115\u0117\u00EB\u1EBB\u011B\u0205\u0207\u1EB9\u1EC7\u0229\u1E1D\u0119\u1E19\u1E1B\u0247\u025B\u01DD]/g},
    {'base':'f', 'letters':/[\u0066\u24D5\uFF46\u1E1F\u0192\uA77C]/g},
    {'base':'g', 'letters':/[\u0067\u24D6\uFF47\u01F5\u011D\u1E21\u011F\u0121\u01E7\u0123\u01E5\u0260\uA7A1\u1D79\uA77F]/g},
    {'base':'h', 'letters':/[\u0068\u24D7\uFF48\u0125\u1E23\u1E27\u021F\u1E25\u1E29\u1E2B\u1E96\u0127\u2C68\u2C76\u0265]/g},
    {'base':'hv','letters':/[\u0195]/g},
    {'base':'i', 'letters':/[\u0069\u24D8\uFF49\u00EC\u00ED\u00EE\u0129\u012B\u012D\u00EF\u1E2F\u1EC9\u01D0\u0209\u020B\u1ECB\u012F\u1E2D\u0268\u0131]/g},
    {'base':'j', 'letters':/[\u006A\u24D9\uFF4A\u0135\u01F0\u0249]/g},
    {'base':'k', 'letters':/[\u006B\u24DA\uFF4B\u1E31\u01E9\u1E33\u0137\u1E35\u0199\u2C6A\uA741\uA743\uA745\uA7A3]/g},
    {'base':'l', 'letters':/[\u006C\u24DB\uFF4C\u0140\u013A\u013E\u1E37\u1E39\u013C\u1E3D\u1E3B\u017F\u0142\u019A\u026B\u2C61\uA749\uA781\uA747]/g},
    {'base':'lj','letters':/[\u01C9]/g},
    {'base':'m', 'letters':/[\u006D\u24DC\uFF4D\u1E3F\u1E41\u1E43\u0271\u026F]/g},
    {'base':'n', 'letters':/[\u006E\u24DD\uFF4E\u01F9\u0144\u00F1\u1E45\u0148\u1E47\u0146\u1E4B\u1E49\u019E\u0272\u0149\uA791\uA7A5]/g},
    {'base':'nj','letters':/[\u01CC]/g},
    {'base':'o', 'letters':/[\u006F\u24DE\uFF4F\u00F2\u00F3\u00F4\u1ED3\u1ED1\u1ED7\u1ED5\u00F5\u1E4D\u022D\u1E4F\u014D\u1E51\u1E53\u014F\u022F\u0231\u00F6\u022B\u1ECF\u0151\u01D2\u020D\u020F\u01A1\u1EDD\u1EDB\u1EE1\u1EDF\u1EE3\u1ECD\u1ED9\u01EB\u01ED\u00F8\u01FF\u0254\uA74B\uA74D\u0275]/g},
    {'base':'oi','letters':/[\u01A3]/g},
    {'base':'ou','letters':/[\u0223]/g},
    {'base':'oo','letters':/[\uA74F]/g},
    {'base':'p','letters':/[\u0070\u24DF\uFF50\u1E55\u1E57\u01A5\u1D7D\uA751\uA753\uA755]/g},
    {'base':'q','letters':/[\u0071\u24E0\uFF51\u024B\uA757\uA759]/g},
    {'base':'r','letters':/[\u0072\u24E1\uFF52\u0155\u1E59\u0159\u0211\u0213\u1E5B\u1E5D\u0157\u1E5F\u024D\u027D\uA75B\uA7A7\uA783]/g},
    {'base':'s','letters':/[\u0073\u24E2\uFF53\u00DF\u015B\u1E65\u015D\u1E61\u0161\u1E67\u1E63\u1E69\u0219\u015F\u023F\uA7A9\uA785\u1E9B]/g},
    {'base':'t','letters':/[\u0074\u24E3\uFF54\u1E6B\u1E97\u0165\u1E6D\u021B\u0163\u1E71\u1E6F\u0167\u01AD\u0288\u2C66\uA787]/g},
    {'base':'tz','letters':/[\uA729]/g},
    {'base':'u','letters':/[\u0075\u24E4\uFF55\u00F9\u00FA\u00FB\u0169\u1E79\u016B\u1E7B\u016D\u00FC\u01DC\u01D8\u01D6\u01DA\u1EE7\u016F\u0171\u01D4\u0215\u0217\u01B0\u1EEB\u1EE9\u1EEF\u1EED\u1EF1\u1EE5\u1E73\u0173\u1E77\u1E75\u0289]/g},
    {'base':'v','letters':/[\u0076\u24E5\uFF56\u1E7D\u1E7F\u028B\uA75F\u028C]/g},
    {'base':'vy','letters':/[\uA761]/g},
    {'base':'w','letters':/[\u0077\u24E6\uFF57\u1E81\u1E83\u0175\u1E87\u1E85\u1E98\u1E89\u2C73]/g},
    {'base':'x','letters':/[\u0078\u24E7\uFF58\u1E8B\u1E8D]/g},
    {'base':'y','letters':/[\u0079\u24E8\uFF59\u1EF3\u00FD\u0177\u1EF9\u0233\u1E8F\u00FF\u1EF7\u1E99\u1EF5\u01B4\u024F\u1EFF]/g},
    {'base':'z','letters':/[\u007A\u24E9\uFF5A\u017A\u1E91\u017C\u017E\u1E93\u1E95\u01B6\u0225\u0240\u2C6C\uA763]/g}
  ];

  for(var i=0; i<defaultDiacriticsRemovalMap.length; i++) {
    str = str.replace(defaultDiacriticsRemovalMap[i].letters, defaultDiacriticsRemovalMap[i].base);
  }

  return str;

}
/**********************************************Funcion para cargar los datos del seguimiento en edición************************************/
//Entrada: Id del seguimiento
//Salida: Formulario con los datos cargados.
function cargadatos(idseguimiento){
	$("#divVisa1").hide();
	$("#divVisa2").hide();
	$("#visaTab").hide();
	$("#agenciaTab").hide();
	$("#concepto2").hide();
    var inscripcionactiva=window.parent.seguimientoAlmacen.get(idseguimiento);
	var mes='';
	fecha=inscripcionactiva.fechaingreso;
	
	fecha=fecha.split("-");
	
	
	
	
	fecha=fecha[2]+"/"+fecha[1]+"/"+fecha[0];
	
	setTimeout('dijit.byId("idagencia").set("value","'+inscripcionactiva.agenciaid+'");','1000');
	setTimeout('dijit.byId("idmedio").set("value","'+inscripcionactiva.medio+'");','1000');
	//setTimeout('dijit.byId("iddepartamento").set("value","'+inscripcionactiva.departamento+'");','1000');
	setTimeout('dijit.byId("idciudad").set("value","'+inscripcionactiva.ciudad+'");','1000');
	document.getElementById('est').innerHTML=' No.'+idseguimiento;
	setTimeout('document.getElementById("iddestino").set("value",['+inscripcionactiva.numeroDestino+']);','1000');
	setTimeout('dijit.byId("idciudadquin").set("value","'+inscripcionactiva.ciudadquin+'");','1000');
	document.getElementById('estadoInscripcion').value=0;
	document.getElementById('date').value=fecha;
	document.getElementById('SeguimientoVendedor').value=decodeURIComponent(inscripcionactiva.agente);
	document.getElementById('SeguimientoNombre').value=decodeURIComponent(inscripcionactiva.nombrequienllama);
	document.getElementById('SeguimientoTelefono1').value=decodeURIComponent(inscripcionactiva.telefono1);
	document.getElementById('SeguimientoTelefono2').value=decodeURIComponent(inscripcionactiva.telefono2);
	document.getElementById('SeguimientoTelefono3').value=decodeURIComponent(inscripcionactiva.telefono3);
	document.getElementById('SeguimientoCelular').value=decodeURIComponent(inscripcionactiva.celular);
	document.getElementById('SeguimientoEmail').value=decodeURIComponent(inscripcionactiva.email);
	document.getElementById('SeguimientoDireccion').value=decodeURIComponent(inscripcionactiva.direccion);
	document.getElementById('SeguimientoParentesco').value=inscripcionactiva.parentesco;
	document.getElementById('SeguimientoNombreQuinceanera').value=decodeURIComponent(inscripcionactiva.nombrequinceanera);
	//document.getElementById('SeguimientoCiudad').value=inscripcionactiva.ciudadquin;
	document.getElementById('SeguimientoTelefonoQuinceanera').value=decodeURIComponent(inscripcionactiva.telefono_quinceanera);
	document.getElementById('SeguimientoCelularQuinceanera').value=decodeURIComponent(inscripcionactiva.celular_quinceanera);
	document.getElementById('SeguimientoAnoviajeQuinceanera').value=inscripcionactiva.anoviaje_quinceanera;
	document.getElementById('SeguimientoMesviajeQuinceanera').value=inscripcionactiva.mesviaje_quinceanera;
	document.getElementById('SeguimientoMailQuinceanera').value=decodeURIComponent(inscripcionactiva.mail_quinceanera);
	document.getElementById('SeguimientoNombrePadre').value=decodeURIComponent(inscripcionactiva.nombrepadre);
	document.getElementById('SeguimientoMailPadre').value=decodeURIComponent(inscripcionactiva.mail_padre);
	document.getElementById('SeguimientoTelefonooficinaPadre').value=decodeURIComponent(inscripcionactiva.telefonooficina_padre);
	document.getElementById('SeguimientoCelularPadre').value=decodeURIComponent(inscripcionactiva.celular_padre);
	document.getElementById('SeguimientoNombreMadre').value=decodeURIComponent(inscripcionactiva.nombremadre);
	document.getElementById('SeguimientoMailMadre').value=decodeURIComponent(inscripcionactiva.mail_madre);
	document.getElementById('SeguimientoTelefonooficinaMadre').value=decodeURIComponent(inscripcionactiva.telefonooficina_madre);
	document.getElementById('SeguimientoCelularMadre').value=decodeURIComponent(inscripcionactiva.celular_madre);
	document.getElementById('idseguimiento').value=idseguimiento;
	document.getElementById('colegio').value=decodeURIComponent(inscripcionactiva.colegio);
	document.getElementById('SeguimientoUsersId').value=inscripcionactiva.idusuario;
	$("<th>Fecha Recibido</th><th>Fecha Aprobado</th><th>Aprobado Por</th><th>Documento</th>").appendTo("#headerRow");
	id=idseguimiento;
	inscripcionactiva = null;
	delete inscripcionactiva;
}
//Carga la inscripcion una vez esta ya haya sido creada y guardada
function cargadatos2(idseguimiento){
	$("#divVisa1").hide();
	$("#divVisa2").hide();
	$("#visaTab").hide();
	$("#agenciaTab").hide();
	$("#concepto2").hide();
    var inscripcionactiva=window.parent.inscripcionAlmacen.get(idseguimiento);
	var mes='';
	fecha=inscripcionactiva.fechaingreso;
	
	fecha=fecha.split("-");
	
	
	
	
	fecha=fecha[2]+"/"+fecha[1]+"/"+fecha[0];
	
	setTimeout('dijit.byId("idagencia").set("value","'+inscripcionactiva.agenciaid+'");','1000');
	setTimeout('dijit.byId("idmedio").set("value","'+inscripcionactiva.medio+'");','1000');
	//setTimeout('dijit.byId("iddepartamento").set("value","'+inscripcionactiva.departamento+'");','1000');
	setTimeout('dijit.byId("idciudad").set("value","'+inscripcionactiva.ciudad+'");','1000');
	setTimeout('dijit.byId("idciudadquin").set("value","'+inscripcionactiva.ciudadquin+'");','1000');
	document.getElementById('est').innerHTML=' No.'+idseguimiento;
	$("input[name=visa]:checked").val(inscripcionactiva.tieneVisa);
	document.getElementById('iddestino').value=decodeURIComponent(inscripcionactiva.numeroDestino);
	document.getElementById('estadoInscripcion').value=1;
	document.getElementById('date').value=decodeURIComponent(inscripcionactiva.fechaingreso);
	document.getElementById('SeguimientoVendedor').value=decodeURIComponent(inscripcionactiva.agente);
	document.getElementById('SeguimientoNombre').value=decodeURIComponent(inscripcionactiva.nombrequienllama);
	document.getElementById('SeguimientoTelefono1').value=decodeURIComponent(inscripcionactiva.telefono1);
	document.getElementById('SeguimientoTelefono2').value=decodeURIComponent(inscripcionactiva.telefono2);
	document.getElementById('SeguimientoTelefono3').value=decodeURIComponent(inscripcionactiva.telefono3);
	document.getElementById('SeguimientoCelular').value=decodeURIComponent(inscripcionactiva.celular);
	
	document.getElementById('SeguimientoEmail').value=decodeURIComponent(inscripcionactiva.email);
	document.getElementById('SeguimientoDireccion').value=decodeURIComponent(inscripcionactiva.direccion);
	document.getElementById('SeguimientoParentesco').value=inscripcionactiva.parentesco;
	document.getElementById('SeguimientoNombreQuinceanera').value=decodeURIComponent(inscripcionactiva.nombrequinceanera);
	//document.getElementById('SeguimientoCiudad').value=inscripcionactiva.ciudadquin;
	document.getElementById('SeguimientoTelefonoQuinceanera').value=decodeURIComponent(inscripcionactiva.telefono_quinceanera);
	document.getElementById('SeguimientoCelularQuinceanera').value=decodeURIComponent(inscripcionactiva.celular_quinceanera);
	document.getElementById('SeguimientoAnoviajeQuinceanera').value=inscripcionactiva.anoviaje_quinceanera;
	document.getElementById('SeguimientoMesviajeQuinceanera').value=inscripcionactiva.mesviaje_quinceanera;
	document.getElementById('SeguimientoMailQuinceanera').value=decodeURIComponent(inscripcionactiva.mail_quinceanera);
	document.getElementById('SeguimientoNombrePadre').value=decodeURIComponent(inscripcionactiva.nombrepadre);
	document.getElementById('SeguimientoMailPadre').value=decodeURIComponent(inscripcionactiva.mail_padre);
	document.getElementById('SeguimientoTelefonooficinaPadre').value=decodeURIComponent(inscripcionactiva.telefonooficina_padre);
	document.getElementById('SeguimientoCelularPadre').value=decodeURIComponent(inscripcionactiva.celular_padre);
	document.getElementById('SeguimientoNombreMadre').value=decodeURIComponent(inscripcionactiva.nombremadre);
	document.getElementById('SeguimientoMailMadre').value=decodeURIComponent(inscripcionactiva.mail_madre);
	document.getElementById('SeguimientoTelefonooficinaMadre').value=decodeURIComponent(inscripcionactiva.telefonooficina_madre);
	document.getElementById('SeguimientoCelularMadre').value=decodeURIComponent(inscripcionactiva.celular_madre);

    document.getElementById('asesor').value =decodeURIComponent(inscripcionactiva.asesor);
    document.getElementById('nombreSegundoContacto').value =decodeURIComponent(inscripcionactiva.SeguimientoNombre2);
    document.getElementById('SeguimientoCedula2').value =decodeURIComponent(inscripcionactiva.SeguimientoCedula2);
	 document.getElementById('SeguimientoEmail2').value =decodeURIComponent(inscripcionactiva.SeguimientoEmail2);
    document.getElementById('SeguimientoCelular2').value =decodeURIComponent(inscripcionactiva.SeguimientoCelular2);
    document.getElementById('SeguimientoTelefono122').value =decodeURIComponent(inscripcionactiva.SeguimientoTelefono12);
    document.getElementById('SeguimientoTelefono22').value =decodeURIComponent(inscripcionactiva.SeguimientoTelefono22);
    document.getElementById('SeguimientoDireccion2').value =decodeURIComponent(inscripcionactiva.SeguimientoDireccion2);
    document.getElementById('SeguimientoParentesco2').value =decodeURIComponent(inscripcionactiva.SeguimientoParentesco2);
    document.getElementById('SeguimientoDireccion2').value =decodeURIComponent(inscripcionactiva.SeguimientoDireccion2);
    //document.getElementById('SeguimientoCiudad2').value =decodeURIComponent(inscripcionactiva.SeguimientoCiudad2);
    setTimeout('dijit.byId("SeguimientoCiudad2").set("value","'+inscripcionactiva.SeguimientoCiudad2+'");','1000');
	
    document.getElementById('fechaNacimiento').value =decodeURIComponent(inscripcionactiva.fechaNacimiento);
    document.getElementById('serialPasaporte').value =decodeURIComponent(inscripcionactiva.serialPasaporte);
    document.getElementById('nombreAgencia').value =decodeURIComponent(inscripcionactiva.nombreAgencia);
    document.getElementById('vendedorAgencia').value =decodeURIComponent(inscripcionactiva.vendedorAgencia);
    document.getElementById('celularAgencia').value =decodeURIComponent(inscripcionactiva.celularAgencia);
    document.getElementById('telefonoAgencia').value =decodeURIComponent(inscripcionactiva.telefonoAgencia);
    document.getElementById('direccionAgencia').value =decodeURIComponent(inscripcionactiva.direccionAgencia);
    document.getElementById('ciudadAgencia').value =decodeURIComponent(inscripcionactiva.ciudadAgencia);
    document.getElementById('emailAgencia').value =decodeURIComponent(inscripcionactiva.emailAgencia);
    document.getElementById('NIT').value =decodeURIComponent(inscripcionactiva.NIT);
    document.getElementById('horaRevision').value =decodeURIComponent(inscripcionactiva.horaRevision);
    document.getElementById('horaAsesoria').value =decodeURIComponent(inscripcionactiva.horaAsesoria);
    document.getElementById('horaCita').value =decodeURIComponent(inscripcionactiva.horaCita);
    document.getElementById('horaFH').value =decodeURIComponent(inscripcionactiva.horaFH);
    document.getElementById('preguntaSeguridad').value =decodeURIComponent(inscripcionactiva.preguntaSeguridad);
    document.getElementById('paginaConfirmacion').value =decodeURIComponent(inscripcionactiva.paginaConfirmacion);
    document.getElementById('clave').value =decodeURIComponent(inscripcionactiva.clave);
	document.getElementById('direccionQuinceanera').value =decodeURIComponent(inscripcionactiva.direccionQuinceanera);

    document.getElementById('visaEmision').value =decodeURIComponent(inscripcionactiva.visaEmision);
    document.getElementById('visaVencimiento').value=decodeURIComponent(inscripcionactiva.visaVencimiento);
    document.getElementById('TI').value =decodeURIComponent(inscripcionactiva.TI);
    document.getElementById('documentosPermiso').value=decodeURIComponent(inscripcionactiva.documentosPermiso);
     document.getElementById('documentosPermisoCon').value=decodeURIComponent(inscripcionactiva.documentosPermisoCon);
	 document.getElementById('documentosPermisoCon2').value=decodeURIComponent(inscripcionactiva.documentosPermisoCon2);
     document.getElementById('documentosPermisoPa').value=decodeURIComponent(inscripcionactiva.documentosPermisoPa);
    document.getElementById('documentosPermisoMa').value=decodeURIComponent(inscripcionactiva.documentosPermisoMa);
    document.getElementById('pagosPermiso').value=decodeURIComponent(inscripcionactiva.pagosPermiso);
     document.getElementById('pagosPermisoCon').value=decodeURIComponent(inscripcionactiva.pagosPermisoCon);
	 document.getElementById('pagosPermisoCon2').value=decodeURIComponent(inscripcionactiva.pagosPermisoCon2);
     document.getElementById('pagosPermisoPa').value =decodeURIComponent(inscripcionactiva.pagosPermisoPa);
     document.getElementById('pagosPermisoMa').value=decodeURIComponent(inscripcionactiva.pagosPermisoMa);
    document.getElementById('facebook').value =decodeURIComponent(inscripcionactiva.facebook);
    document.getElementById('instagram').value =decodeURIComponent(inscripcionactiva.instagram);
    document.getElementById('curso').value =decodeURIComponent(inscripcionactiva.curso);
    document.getElementById('cedulaCon').value =decodeURIComponent(inscripcionactiva.cedulaCon);
    document.getElementById('direccionMa').value =decodeURIComponent(inscripcionactiva.direccionMa);
    document.getElementById('direccionPa').value =decodeURIComponent(inscripcionactiva.direccionPa);
	setTimeout('dijit.byId("lugarNacimiento").set("value","'+inscripcionactiva.lugarNacimiento+'");','1000');
    //document.getElementById('lugarNacimiento').value =decodeURIComponent(inscripcionactiva.lugarNacimiento);
    //document.getElementById('foto').value =decodeURIComponent(inscripcionactiva.foto);
    document.getElementById('cedulaPa').value =decodeURIComponent(inscripcionactiva.cedulaPa);
    document.getElementById('cedulaMa').value =decodeURIComponent(inscripcionactiva.cedulaMa);
    document.getElementById('pasaporte').value =decodeURIComponent(inscripcionactiva.pasaporte);
    document.getElementById('pasEmision').value = decodeURIComponent(inscripcionactiva.pasEmision);
    document.getElementById('pasVencimiento').value =decodeURIComponent(inscripcionactiva.pasVencimiento);
    document.getElementById('RC').value =decodeURIComponent(inscripcionactiva.RC);
    document.getElementById('inscrita').value =decodeURIComponent(inscripcionactiva.inscrita);
    document.getElementById('visaRevision').value =decodeURIComponent(inscripcionactiva.visaRevision);
    document.getElementById('visaAsesoria').value =decodeURIComponent(inscripcionactiva.visaAsesoria);
    document.getElementById('visaFotos').value =decodeURIComponent(inscripcionactiva.visaFotos);
    document.getElementById('visaCita').value =decodeURIComponent(inscripcionactiva.visaCita);
    var tieneVisa =decodeURIComponent(inscripcionactiva.tieneVisa);
	 var esAgencia =decodeURIComponent(inscripcionactiva.esAgencia);
	if(esAgencia == "si"){
		$("#agenciaTab").show();
	}
	if(tieneVisa == "no"){
		$("#visaTab").show();
	}
	if(tieneVisa == "si"){
		$("#divVisa1").show();
	    $("#divVisa2").show();
	}
	
    document.getElementById('visaInfo').value =decodeURIComponent(inscripcionactiva.visaInfo);
	document.getElementById('RCB').value =decodeURIComponent(inscripcionactiva.RCB);
	document.getElementById('PFC').value =decodeURIComponent(inscripcionactiva.PFC);
    document.getElementById('formulario2').value =decodeURIComponent(inscripcionactiva.formulario2);
	document.getElementById('pagConfirmacion').value =decodeURIComponent(inscripcionactiva.pagConfirmacion);
    document.getElementById('CopiaCCduenoTC').value =decodeURIComponent(inscripcionactiva.CopiaCCduenoTC);
    document.getElementById('visaCD').value =decodeURIComponent(inscripcionactiva.visaCD);
    document.getElementById('visaFormato').value =decodeURIComponent(inscripcionactiva.visaFormato);
    document.getElementById('visaCopia').value =decodeURIComponent(inscripcionactiva.visaCopia);

	document.getElementById('idseguimiento').value=idseguimiento;
	document.getElementById('colegio').value=decodeURIComponent(inscripcionactiva.colegio);
	document.getElementById('SeguimientoUsersId').value=inscripcionactiva.idusuario;
	
	var sendSelect = document.getElementById('sendSelect');
    var opt = document.createElement('option');
    opt.value = inscripcionactiva.email;
    opt.innerHTML = inscripcionactiva.nombrequinceanera;
    sendSelect.appendChild(opt);
	 if (window.parent.rolusuarioactivo != "contador"){
		 $('#pagosSubmitButton').prop('disabled', true);
	 }
	
	
	if(tieneVisa == "si"){
		$("#visaSi").prop("checked", true)
	}
	if(tieneVisa == "no"){
		$("#visaNo").prop("checked", true)
	}
	if(esAgencia == "no"){
		$("#agenciaNo").prop("checked", true)
	}
	if(esAgencia == "si"){
		$("#agenciaSi").prop("checked", true)
	}
	
	$("#headerRowHermana").hide();
	$("#headerRowAmiga").hide();
	if(inscripcionactiva.foto){
		$("#foto").hide();
        $("<img id='fotoQuin' src'#' style='width:100px; height:100px; margin-top:-60px;'>").appendTo("#fotoDiv");
        $("#fotoQuin").attr("src", "/v15/mariposa/"+inscripcionactiva.foto);
	}
	$("<th>Fecha Recibido</th><th>Fecha Aprobado</th><th>Aprobado Por</th><th>Documento</th><th>Comentarios</th>").appendTo("#headerRow");
	var iddestino = document.getElementById('iddestino').value;
	console.log(iddestino);
	 window.parent.PagosDestinoAlmacen.query({destino_id:iddestino}).forEach(function(desti){
   	var concepto = desti.pago;
   	var valor = desti.valor;
    var currency = desti.moneda;
    var moneda = "";
    switch(currency){
        case "1":
        moneda = "Pesos";
        break;
        case "2":
        moneda = "Dolares";
        break;
        case "3":
        moneda = "Euros";
        break;
    }

    $("<tr><td>"+concepto+"</td><td>"+valor*-1+"</td><td>"+moneda+"</td></tr>").appendTo("#ayudaTable");
});
	window.parent.InscripdocumentosAlmacen.query({inscripcion_id:idseguimiento}).forEach(function(insc){
		   if(!insc.nota){
			   insc.nota="<button type='button' class='btn btn-primary' id='notaModalShow"+insc.id+"' style='background-color:#96689F' value='"+insc.id +"' onclick='popout2(this)'>Agregar</button>";
			   }
		   var displayPattern = 'd-MMM-yyyy';
		   var user = new Object();
		   var fechatotalp ="";
		   var fechatotalR ="";
		   if(insc.fechaAprovado){
           var d = dojo.date.stamp.fromISOString(insc.fechaAprovado);
           fechatotalp=dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});
           } else{fechatotalp = "";}
           if(insc.fechaRecibido){
           var p = dojo.date.stamp.fromISOString(insc.fechaRecibido);
           fechatotalR=dojo.date.locale.format(p, {selector: 'date', datePattern: displayPattern});
       }else {fechatotalR = "";}
         documento = window.parent.DocumentosAlmacen.get(insc.doc_id);


         if(insc.aprovadoPor){user = window.parent.UsuariosAlmacen.get(insc.aprovadoPor);}else{user.nombre = "";}
         if(insc.documento){$("<tr class='added'><td>"+documento.nombre+"</td><td><input type='checkbox' id='recibido"+insc.id+"' onclick='recibido(this)' value='1'></td><td><input type='checkbox' id='aprovado"+insc.id+"' onclick='popout(this)' value='2'></td><td>"+fechatotalR+"</td><td>"+fechatotalp+"</td><td>"+user.nombre+"</td><td><a href='/v15/mariposa/"+insc.documento+"' target='_Blank'>ver: "+documento.nombre+"</a></td><td class='onHover'><div class='onclick' data-insc='"+insc.id +"' >"+insc.nota+"</div></td></tr>").appendTo("#docTable");}
         else {$("<tr class='added'><td>"+documento.nombre+"</td><td><input type='checkbox' id='recibido"+insc.id+"' onclick='recibido(this)' value='1'></td><td><input type='checkbox' id='aprovado"+insc.id+"' onclick='popout(this)' value='2'></td><td>"+fechatotalR+"</td><td>"+fechatotalp+"</td><td>"+user.nombre+"</td><td><form id='documentoForm"+insc.id+"' enctype='multipart/form-data'><input type='file' id='doc"+insc.id+"' class='elDocumento'><button type='button' class='btn btn-primary' value='"+insc.id+"' onclick='uploadDoc(this)' style='background-color:#96689F'>Subir</button></form></td><td class='onHover'><div class='onclick' data-insc='"+insc.id +"' >"+insc.nota+"</div></td></tr>").appendTo("#docTable");}
         if(insc.recibido == "1"){$("#recibido"+parseInt(insc.id)).prop('checked', true);}
         if(insc.aprovado == "1"){$("#aprovado"+parseInt(insc.id)).prop('checked', true);}
   });
     window.parent.HermanasAlmacen.query({inscripcion_id:idseguimiento}).forEach(function(hermana){
     	   $("#headerRowHermana").show();
     	   var fecha ="";
     	   if(hermana.edad){var displayPattern = 'd-MMM-yyyy';var d = dojo.date.stamp.fromISOString(hermana.edad); fecha =dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});}
           $("<tr><td>"+hermana.nombre+"</td><td>"+fecha+"</td></tr>").appendTo("#hermanaTable");
     });	
     window.parent.AmigasAlmacen.query({inscripcion_id:idseguimiento}).forEach(function(hermana){
     	   $("#headerRowAmiga").show();
		   window.parent.DestinosAlmacen.query({id:hermana.destino}).forEach(function(desti){
		    destino = desti.name;
			$("<tr><td>"+hermana.nombre+"</td><td>"+destino+"</td></tr>").appendTo("#amigaTable");
	       });
           
     });
     var pendientePesos = 0;
     var pendienteDolares = 0;
     var pendienteEuros = 0;
     var dateObj = new Date();
     var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
     var day = ("0" + (dateObj.getDate())).slice(-2);
     var year = dateObj.getUTCFullYear();
     var fecha2 = year+"-"+month+"-"+day;
     window.parent.PagosAlmacen.query({inscripcion_id:idseguimiento}).forEach(function(pago){
     	var conceptoName = pago.concepto;
                var displayPattern = 'd-MMM-yyyy';
                var d = dojo.date.stamp.fromISOString(pago.fecha);
                var fecha =pago.fecha;
                switch(pago.currency){
               case "1":
               pendientePesos = pendientePesos + JSON.parse(pago.valor);
               $("<tr class='losPagos'><td>"+conceptoName+"</td><td>"+pago.valor+"</td><td>0</td><td>0</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "2":
               pendienteDolares = pendienteDolares + JSON.parse(pago.valor);
               $("<tr class='losPagos'><td>"+conceptoName+"</td><td>0</td><td>"+pago.valor+"</td><td>0</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "3":
               pendienteEuros = pendienteEuros + JSON.parse(pago.valor);
               $("<tr class='losPagos'><td>"+conceptoName+"</td><td>0</td><td>0</td><td>"+pago.valor+"</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
           }   
     });
     $("#pagosPendientes").replaceWith("<tr id='pagosPendientes'><th>Pendientes</th><th>"+pendientePesos+"</th><th>"+pendienteDolares+"</th><th>"+pendienteEuros+"</th><th colspan='2'>"+fecha2+"</th></tr>");
     document.getElementById('pendientePesos').value= pendientePesos;
     document.getElementById('pendienteDolares').value=pendienteDolares;
     document.getElementById('pendienteEuros').value=pendienteEuros;		
	id=idseguimiento;
	inscripcionactiva = null;
	delete inscripcionactiva;
}
/*************************************Funciones para bitacora********************************************/
//Callback para limpiar lista de bitacora
function clearOldList(size, request){
      list = dojo.byId("list");
      if(list){
        while(list.firstChild){
          list.removeChild(list.firstChild);
        }
      }
}
// Callback para procesar los datos encontrados.
//Entrada: Items y requerimiento
//Salida: Div cargado con los datos de la bitacora.




function gotItems(items, request){	
     list = dojo.byId("list");
		 contenido='';
		 fecha;
		 fechatotal;
		 mes;
     if(list){
     alert("hay lista");
           var i;
		   if(items.length==0 || items.length==1 || items.length==undefined){
			   id=document.getElementById('idseguimiento').value;
			    list = dojo.byId("list");
                if(list){
                 while(list.firstChild){
                 list.removeChild(list.firstChild);
                }
               }
			   /*bitacoraAlmacen = new dojo.store.Memory({
					data: window.parent.bitacora, idProperty:"idseguimiento"
				});*/
		        window.parent.bitacora2Almacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]}).forEach(function(shoe){
				   fecha=""+shoe.fecha;
				   arreglofecha=fecha.split('-');
					  fechatotal=arreglofecha[2]+"-";
					  mes=arreglofecha[1];
					  switch(mes){
						  case "01":
						   fechatotal+="ENE-";
						  break;
						  case "02":
						   fechatotal+="FEB-";
						  break;
						  case "03":
						   fechatotal+="MAR-";
						  break;
						  case "04":
						   fechatotal+="ABR-";
						  break;
						  case "05":
						   fechatotal+="MAY-";
						  break;
						  case "06":
						   fechatotal+="JUN-";
						  break;
						  case "07":
						   fechatotal+="JUL-";
						  break;
						  case "08":
						   fechatotal+="AGO-";
						  break;
						  case "09":
						   fechatotal+="SEP-";
						  break;
						  case "1":
						   fechatotal+="ENE-";
						  break;
						  case "2":
						   fechatotal+="FEB-";
						  break;
						  case "3":
						   fechatotal+="MAR-";
						  break;
						  case "4":
						   fechatotal+="ABR-";
						  break;
						  case "5":
						   fechatotal+="MAY-";
						  break;
						  case "6":
						   fechatotal+="JUN-";
						  break;
						  case "7":
						   fechatotal+="JUL-";
						  break;
						  case "8":
						   fechatotal+="AGO-";
						  break;
						  case "9":
						   fechatotal+="SEP-";
						  break;
						  case "10":
						   fechatotal+="OCT-";
						  break;
						  case "11":
						   fechatotal+="NOV-";
						  break;
						  case "12":
						   fechatotal+="DIC-";
						  break;
					  }
					 fechatotal+=arreglofecha[0];
					 hora=""+shoe.hora;
					 arrayhora=hora.split(":");
					 hor=parseInt(arrayhora[0]);
					 minu=arrayhora[1];
					 if(hor>12){
						 hor=hor-12;
						 meri="Pm";
						 horatotal=hor+":"+minu+" "+meri;
					 }
					 else
					 {
						 meri="Am";
						 horatotal=hor+":"+minu+" "+meri;
					 }
			       contenido+='<div style="width:95%; height:auto; border:solid 1px#D1CEE7;background-color:#EBE6FC;-moz-border-radius:15px;border-radius:15px;margin-bottom:0.5em;font-family:Verdana, Geneva, sans-serif; font-size:12px;"><div style="width:100%;color:#838284; text-align:left; float:left; margin-left:0.6em;">'+shoe.usuario+'</div><div style="width:90%; color:#515053; text-align: justify; float:left; margin-left:1em;clear:left">'+decodeURIComponent(shoe.ingreso)+'</div><div style="width:100%; color:#757575; float:right; text-align:right; margin-right:0.3em; clear:right">'+fechatotal+'  '+horatotal+'</div><div style="clear:both;"></div></div>';
               });
			   document.getElementById('list').innerHTML=contenido;
		   }
		   else{
			    list = dojo.byId("list");
                if(list){
                 while(list.firstChild){
                 list.removeChild(list.firstChild);
                }
               }
           for(i = 0; i < items.length; i++){
              item = items[i];
			  arreglofecha=foodStore.getValue(item, "fecha").split('-');
			  fechatotal=arreglofecha[2]+"-";
			  mes=arreglofecha[1];
			  switch(mes){
				  case "01":
				   fechatotal+="ENE-";
				  break;
				  case "02":
				   fechatotal+="FEB-";
				  break;
				  case "03":
				   fechatotal+="MAR-";
				  break;
				  case "04":
				   fechatotal+="ABR-";
				  break;
				  case "05":
				   fechatotal+="MAY-";
				  break;
				  case "06":
				   fechatotal+="JUN-";
				  break;
				  case "07":
				   fechatotal+="JUL-";
				  break;
				  case "08":
				   fechatotal+="AGO-";
				  break;
				  case "09":
				   fechatotal+="SEP-";
				  break;
				  case "1":
				   fechatotal+="ENE-";
				  break;
				  case "2":
				   fechatotal+="FEB-";
				  break;
				  case "3":
				   fechatotal+="MAR-";
				  break;
				  case "4":
				   fechatotal+="ABR-";
				  break;
				  case "5":
				   fechatotal+="MAY-";
				  break;
				  case "6":
				   fechatotal+="JUN-";
				  break;
				  case "7":
				   fechatotal+="JUL-";
				  break;
				  case "8":
				   fechatotal+="AGO-";
				  break;
				  case "9":
				   fechatotal+="SEP-";
				  break;
				  case "10":
				   fechatotal+="OCT-";
				  break;
				  case "11":
				   fechatotal+="NOV-";
				  break;
				  case "12":
				   fechatotal+="DIC-";
				  break;
			  }
			 fechatotal+=arreglofecha[0];
			 hora=foodStore.getValue(item, "hora");
					 arrayhora=hora.split(":");
					 hor=parseInt(arrayhora[0]);
					 minu=arrayhora[1];
					 if(hor>12){
						 hor=hor-12;
						 meri="Pm";
						 horatotal=hor+":"+minu+" "+meri;
					 }
					 else
					 {
						 meri="Am";
						 horatotal=hor+":"+minu+" "+meri;
					 }
			 contenido+='<div style="width:95%; height:auto; border:solid 1px#D1CEE7;background-color:#EBE6FC;-moz-border-radius:15px;border-radius:15px;margin-bottom:0.5em;font-family:Verdana, Geneva, sans-serif; font-size:12px;"><div style="width:100%;color:#838284; text-align:left; float:left; margin-left:0.6em;">'+foodStore.getValue(item, "usuario")+'</div><div style="width:90%; color:#515053; text-align: justify; float:left; margin-left:1em;clear:left">'+decodeURIComponent(foodStore.getValue(item, "ingreso"))+'</div><div style="width:100%; color:#757575; float:right; text-align:right; margin-right:0.3em; clear:right">'+fechatotal+'  '+horatotal+'</div><div style="clear:both;"></div></div>';
           }
		   document.getElementById('list').innerHTML=contenido;
         }
		 }
}

// Callback para fallo en el requerimeinto del ItemFileWriter.
//Entrada: Error y requerimeinto
//Salida: Alert con fallo.
function fetchFailed(error, request){
          alert("lookup failed.");
}
//Funcion para cargar la bitacora al lateral
//Entrada: Id del seguimiento
//Salida: Div cargado con los datos de la bitacora.
function buscabitacora(idseg){
	//var sortAttributes = [{attribute: "id", descending: true}];
	queryObj["idseguimiento"]=idseg;
	//@kike:Desactivado por que en el fetch cargada cada vez el array se estaba creciendo demasiado
	
	/*foodStore.fetch({query: queryObj, onBegin: clearOldList,onComplete: gotItems, onError: fetchFailed, sort:[{attribute: "fecha", descending:true},{attribute: "hora", descending: true}]});*/
	
	  
	   list = document.getElementById('list');
	   
	   while (list.hasChildNodes())
     {
         list.removeChild(list.firstChild);
     }  
     contenido="";
    
       
  id=document.getElementById('idseguimiento').value;
  
  window.parent.bitacora2Almacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]}).forEach(function(shoe){
				   fecha=""+shoe.fecha;
				   arreglofecha=fecha.split('-');
					  fechatotal=arreglofecha[2]+"-";
					  mes=arreglofecha[1];
					  switch(mes){
						  case "01":
						   fechatotal+="ENE-";
						  break;
						  case "02":
						   fechatotal+="FEB-";
						  break;
						  case "03":
						   fechatotal+="MAR-";
						  break;
						  case "04":
						   fechatotal+="ABR-";
						  break;
						  case "05":
						   fechatotal+="MAY-";
						  break;
						  case "06":
						   fechatotal+="JUN-";
						  break;
						  case "07":
						   fechatotal+="JUL-";
						  break;
						  case "08":
						   fechatotal+="AGO-";
						  break;
						  case "09":
						   fechatotal+="SEP-";
						  break;
						  case "1":
						   fechatotal+="ENE-";
						  break;
						  case "2":
						   fechatotal+="FEB-";
						  break;
						  case "3":
						   fechatotal+="MAR-";
						  break;
						  case "4":
						   fechatotal+="ABR-";
						  break;
						  case "5":
						   fechatotal+="MAY-";
						  break;
						  case "6":
						   fechatotal+="JUN-";
						  break;
						  case "7":
						   fechatotal+="JUL-";
						  break;
						  case "8":
						   fechatotal+="AGO-";
						  break;
						  case "9":
						   fechatotal+="SEP-";
						  break;
						  case "10":
						   fechatotal+="OCT-";
						  break;
						  case "11":
						   fechatotal+="NOV-";
						  break;
						  case "12":
						   fechatotal+="DIC-";
						  break;
					  }
					 fechatotal+=arreglofecha[0];
					 hora=""+shoe.hora;
					 arrayhora=hora.split(":");
					 hor=parseInt(arrayhora[0]);
					 minu=arrayhora[1];
					 if(hor>12){
						 hor=hor-12;
						 meri="Pm";
						 horatotal=hor+":"+minu+" "+meri;
					 }
					 else
					 {
						 meri="Am";
						 horatotal=hor+":"+minu+" "+meri;
					 }
			       contenido+='<div style="width:95%; height:auto; border:solid 1px#D1CEE7;background-color:#D8E8ED;-moz-border-radius:15px;border-radius:15px;margin-bottom:0.5em;font-family:Verdana, Geneva, sans-serif; font-size:12px;"><div style="width:100%;color:#838284; text-align:left; float:left; margin-left:0.6em;">'+shoe.usuario+'</div><div style="width:90%; color:#515053; text-align: justify; float:left; margin-left:1em;clear:left">'+decodeURIComponent(shoe.ingreso)+'</div><div style="width:100%; color:#757575; float:right; text-align:right; margin-right:0.3em; clear:right">'+fechatotal+'  '+horatotal+'</div><div style="clear:both;"></div></div>';
               });
 window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]}).forEach(function(shoe){
				   fecha=""+shoe.fecha;
				   arreglofecha=fecha.split('-');
					  fechatotal=arreglofecha[2]+"-";
					  mes=arreglofecha[1];
					  switch(mes){
						  case "01":
						   fechatotal+="ENE-";
						  break;
						  case "02":
						   fechatotal+="FEB-";
						  break;
						  case "03":
						   fechatotal+="MAR-";
						  break;
						  case "04":
						   fechatotal+="ABR-";
						  break;
						  case "05":
						   fechatotal+="MAY-";
						  break;
						  case "06":
						   fechatotal+="JUN-";
						  break;
						  case "07":
						   fechatotal+="JUL-";
						  break;
						  case "08":
						   fechatotal+="AGO-";
						  break;
						  case "09":
						   fechatotal+="SEP-";
						  break;
						  case "1":
						   fechatotal+="ENE-";
						  break;
						  case "2":
						   fechatotal+="FEB-";
						  break;
						  case "3":
						   fechatotal+="MAR-";
						  break;
						  case "4":
						   fechatotal+="ABR-";
						  break;
						  case "5":
						   fechatotal+="MAY-";
						  break;
						  case "6":
						   fechatotal+="JUN-";
						  break;
						  case "7":
						   fechatotal+="JUL-";
						  break;
						  case "8":
						   fechatotal+="AGO-";
						  break;
						  case "9":
						   fechatotal+="SEP-";
						  break;
						  case "10":
						   fechatotal+="OCT-";
						  break;
						  case "11":
						   fechatotal+="NOV-";
						  break;
						  case "12":
						   fechatotal+="DIC-";
						  break;
					  }
					 fechatotal+=arreglofecha[0];
					 hora=""+shoe.hora;
					 arrayhora=hora.split(":");
					 hor=parseInt(arrayhora[0]);
					 minu=arrayhora[1];
					 if(hor>12){
						 hor=hor-12;
						 meri="Pm";
						 horatotal=hor+":"+minu+" "+meri;
					 }
					 else
					 {
						 meri="Am";
						 horatotal=hor+":"+minu+" "+meri;
					 }
			       contenido+='<div style="width:95%; height:auto; border:solid 1px#D1CEE7;background-color:#EBE6FC;-moz-border-radius:15px;border-radius:15px;margin-bottom:0.5em;font-family:Verdana, Geneva, sans-serif; font-size:12px;"><div style="width:100%;color:#838284; text-align:left; float:left; margin-left:0.6em;">'+shoe.usuario+'</div><div style="width:90%; color:#515053; text-align: justify; float:left; margin-left:1em;clear:left">'+decodeURIComponent(shoe.ingreso)+'</div><div style="width:100%; color:#757575; float:right; text-align:right; margin-right:0.3em; clear:right">'+fechatotal+'  '+horatotal+'</div><div style="clear:both;"></div></div>';
               });
  
    
			 
  document.getElementById('list').innerHTML=contenido;
	
	
}
//Guarda bitacora
//Funcion trim para revision de campos en blanco
//Entrada: Cadena a revisar
//Salida: retorna la cadena analizada.
function fTrim(Str)
{
	cadena = "" + Str + "";
	
	for(i=0; i=0; i=cadena.length-1)
	{
		if(cadena.charAt(i)==" ")
			cadena=cadena.substring(0,i);
		else
			break;
	}
	
	return cadena;
}
//Función para ingresar datos a la bitacora; este se encarga de ingresar tanto en la base de dtaos como en el DataObject los datos de la bitacora.
//Entrada: Ninguno
//Salida: Ingresa los datos en la bitacora, en la base de datos y actualiza para que se vea el mensaje.
function subirbitacora(){
	var bitacora, pass1, pass2, resultado, fecha, hora, Hours, Mins, Time;
    bitacora=document.getElementById('bitacora').value;
	bitacora=bitacora.replace(/\s/g,"");

    pass1=window.parent.idusuarioactivo;
    pass2=document.getElementById('idseguimiento').value;
	Time=new Date();
	fecha=Time.getFullYear() + "-" +(Time.getMonth() +1)+ "-" + Time.getDate() ;
	hora=Time.getHours()+":";
	if(Time.getMinutes()<10){
		hora+="0"+Time.getMinutes();
	}
	else{
		hora+=Time.getMinutes();
	}
	hora+=":"+Time.getSeconds();
   if(bitacora=="" || bitacora.indexOf("'")>-1){
	   alert("Para ingresar datos en la bitácora, el campo de texto no debe estar vacio ni contener caracteres especiales");
  }
  else{
   bitacora=encodeURIComponent(document.getElementById('bitacora').value);
   document.getElementById('bitacora').value=" ";
   require(["dojo/_base/xhr"],
   function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "/v15/mariposa/inscripcions/recibeBitacora?bitacora="+bitacora+"&idseguimiento="+pass2+"&idusuario="+pass1,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
				//Empuje al ojeto 
			   var resultado={id:result, idseguimiento:pass2, usuario:window.parent.nombreuseract, ingreso:decodeURIComponent(bitacora), fecha:fecha, hora:hora};
			  
			   var seguimientoanotificar=window.parent.inscripcionAlmacen.get(pass2);
			   seguimientoanotificar.bitacora="1";
			   window.parent.inscripcionAlmacen.put(seguimientoanotificar);
	           window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
	           window.parent.bitacora2Almacen.add(resultado);
			   //datosbitacora=window.parent.bitacoraAlmacen.data;         
         window.parent.carganoti();
      
			   buscabitacora(pass2);
            }
        });        
    }); 
  }	  
	  
}
//Función para bloquear los campos de los formularios de acuerdo a los permisos establecidos, asi como los botones de guardar, transferir y agregar medio.
//Entrada: Ninguno
//Salida: Bloquea campos del formulario y los botones de acuerdo a los permisos establecidos.
function bloqueaCampos(){ 
    var idseguimiento=document.getElementById('idseguimiento').value;
	var permisogeneral;
	var segumientopermiso=window.parent.inscripcionAlmacen.get(idseguimiento);
	var dueno=segumientopermiso.asesor;
	console.log(dueno);
	var usuarioqueentra=window.parent.idusuarioactivo;
	if(dueno!=usuarioqueentra){
	 document.getElementById('guardar').style.display='none';
	 document.getElementById('transfer').style.display='none';
	 document.getElementById('ingresamedio').style.display='none';
	 window.parent.PermisosAlmacen.query({nombrecampo:"Todo el Módulo"}).forEach(function(permiso){
		  permisogeneral=permiso.actualizar;
	 });
	 if(permisogeneral==2){
		window.parent.PermisosAlmacen.query().forEach(function(permiso){
		   if(permiso.tipo=="Html" && permiso.actualizar==2){
			   document.getElementById(permiso.nombrecampo).disabled="true";   
		   }
		   else if(permiso.tipo=="Dojo" && permiso.actualizar==2){
			   dijit.byId(permiso.nombrecampo).setAttribute("disabled", true);	   
		   }
	    });
	 }
   }
   else{
	   document.getElementById('guardar').style.display='';
	 document.getElementById('transfer').style.display='';
	  document.getElementById('ingresamedio').style.display='';
   }
}
//Función para transferir un seguimiento de un agente a otro, actualiza el DataObject y el grid principal.
//Entrada: Ninguno
//Salida: Actualiza el DataObject, bitacora, el grid principal y la base de datos con la transferencia.
function cargaTransferencia(){
	if (!confirm('¿Desea transferir este seguimiento?'))
    { 
      return false;
    }
    else
    {
	  dijit.byId("Enviar").set('disabled', "true");
	  var idnuevousuario=dijit.byId('transfiere').get('value');
	  var idnuevousuario1=dijit.byId('transfiere').get('value');
	  idnuevousuario1=fTrim(idnuevousuario1);
	  if(idnuevousuario1==""){
		  alert("Para poder hacer la transferencia debe escoger un usuario de la lista de transferencias");
	  }
	  else{
		  idseguimiento=document.getElementById('idseguimiento').value;
		  idremplazo=idnuevousuario;
		  idantiguo=window.parent.nombreuseract;
		  user=window.parent.idusuarioactivo;
		  bitacora=idantiguo+" ha transferido el segumiento actual a "+idremplazo;
		  require(["dojo/_base/xhr"],
          function(xhr) {
             // Execute a HTTP GET request
          xhr.get({
            // The URL to request
            url: "/v15/mariposa/seguimientos/transferencia?iduser="+idremplazo+"&idseguimiento="+idseguimiento+"&idantiguo="+idantiguo+"&iduserantiguo="+user,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
				//Empuje al ojeto
			   var seguimientotransferido=window.parent.seguimientoAlmacen.get(idseguimiento);
			   seguimientotransferido.idusuario=idremplazo;
			   seguimientotransferido.agente=idremplazo.toUpperCase();
			   window.parent.seguimientoAlmacen.put(seguimientotransferido);
			   window.parent.segumiento=window.parent.seguimientoAlmacen.data;
			   Time=new Date();
	            fecha=Time.getFullYear() + "-" +(Time.getMonth() +1)+ "-" + Time.getDate() ;
	            hora=Time.getHours()+":";
	            if(Time.getMinutes()<10){
		          hora+="0"+Time.getMinutes();
	            }
	            else{
		          hora+=Time.getMinutes();
	            }
	            hora+=":"+Time.getSeconds();
			   var resultado={id:result, idseguimiento:idseguimiento, usuario:window.parent.nombreuseract, ingreso:bitacora, fecha:fecha, hora:hora};
			   /*var bitacoraAlmacen = new dojo.store.Memory({
					data: datosbitacora
				});*/	
	            window.parent.bitacora2Almacen.add(resultado);
			   //datosbitacora=bitacoraAlmacen.data;
			   document.getElementById('idseguimiento').value=idseguimiento;
			   foodStore.clearOnClose = true;
			   foodStore.close();
               foodStore.data={items: window.parent.bitacora2Almacen.data};
			   buscabitacora(idseguimiento);
			   bloqueaCampos();
			   alert("Se transfirio el seguimiento exitosamente");
            }
           });        
        }); 	  
	  }
    }
}
//Función para esconder la bitacora cuando esta cerrada.
//Entrada: Ninguno

//Salida: Esconde la bitacora y aparte re calcula el tamaño dle div del formulario.
function escondebitacora(){
	ancho=window.innerWidth;
	anchobit=ancho*6/100;
	anchoform=ancho*90/100;
	document.getElementById('Esconder').style.display='none';
	document.getElementById('Mostrar').style.display='';
	document.getElementById('bit').style.width=anchobit+'px';
	document.getElementById('areaform').style.width=anchoform+'px';
	document.getElementById('ingresobitacora').style.display='none';
	document.getElementById('list').style.display='none';
}
//Función para mostrar la bitacora cuando esta cerrada.
//Entrada: Ninguno
//Salida: Cuadra la bitacora y aparte re calcula el tamaño dle div del formulario.
function muestrabitacora(){
	document.getElementById('Esconder').style.display='';
	document.getElementById('Mostrar').style.display='none';
	document.getElementById('ingresobitacora').style.display='';
	document.getElementById('list').style.display='';
	ancho=window.innerWidth;
	anchobit=ancho*20/100;
	anchoform=ancho*78/100;
	anchobit=Math.round(anchobit);
	anchoform=Math.round(anchoform);
	document.getElementById('areaform').style.width=anchoform+'px';
	document.getElementById('bit').style.width=anchobit+'px';
}
/*****Vinculacion*////////////////////
//Función para fgiltrar datos dle grid de vinculación, de acuerdo a la entrada.
//Entrada: Dato para filtrar
//Salida: Grid con los datos filtrados.
/*function cargadatossimilares(nombre){
	 dijit.byId('grid').style.display='';
	 document.getElementById('grid').style.display='';
	 document.getElementById('boton').style.display='';
	 document.getElementById('gridbusqueda').style.display='';
	 if(nombre=='nombre'){
		 grid.filter({nombrequinceanera:'*'+document.getElementById('SeguimientoNombreQuinceanera').value.toUpperCase()+"*"});
	 }
	 else if(nombre=='mail'){
		 grid.filter({mail_quinceanera:'*'+document.getElementById('SeguimientoMailQuinceanera').value.toUpperCase()+"*"});
	 }
	 else if(nombre=='maillama'){
		 grid.filter({email:'*'+document.getElementById('SeguimientoEmail').value.toUpperCase()+"*"});
	 }
	 else if(nombre=='contacto'){
		 grid.filter({nombrequienllama:'*'+document.getElementById('SeguimientoNombre').value.toUpperCase()+"*"});
	 }
	  
	 else if(nombre=='telefono1'){
		 grid.filter({telefono1:'*'+document.getElementById('SeguimientoTelefono1').value+"*"});
	 }
	  else if(nombre=='celular'){
		 grid.filter({celular:'*'+document.getElementById('SeguimientoCelular').value+"*"});
	 }
	 else if (nombre=='telefonoquin'){
		 grid.filter({telefono_quinceanera:'*'+document.getElementById('SeguimientoTelefonoQuinceanera').value+"*"});
	 }
	  else if (nombre=='celularquin'){
		 grid.filter({celular_quinceanera:'*'+document.getElementById('SeguimientoCelularQuinceanera').value+"*"});
	 }
	  else if (nombre=='direccion'){
		 grid.filter({direccion:'*'+document.getElementById('SeguimientoDireccion').value.toUpperCase()+"*"});
	 }
	  else if (nombre=='nombrepa'){
		 grid.filter({nombrepadre:'*'+document.getElementById('SeguimientoNombrePadre').value.toUpperCase()+"*"});
	 }
	  else if (nombre=='emailpa'){
		 grid.filter({mail_padre:'*'+document.getElementById('SeguimientoMailPadre').value.toUpperCase()+"*"});
	 }
	  else if (nombre=='telpa'){
		 grid.filter({telefonooficina_padre:'*'+document.getElementById('SeguimientoTelefonooficinaPadre').value+"*"});
	 }
	  else if (nombre=='celpa'){
		 grid.filter({celular_padre:'*'+document.getElementById('SeguimientoCelularPadre').value+"*"});
	 }
	  else if (nombre=='nombrema'){
		 grid.filter({nombremadre:'*'+document.getElementById('SeguimientoNombreMadre').value.toUpperCase()+"*"});
	 }
	  else if (nombre=='emailma'){
		 grid.filter({mail_madre:'*'+document.getElementById('SeguimientoMailMadre').value.toUpperCase()+"*"});
	 }
	  else if (nombre=='telma'){
		 grid.filter({telefonooficina_madre:'*'+document.getElementById('SeguimientoTelefonooficinaMadre').value+"*"});
	 }
	  else if (nombre=='celma'){
		 grid.filter({celular_madre:'*'+document.getElementById('SeguimientoCelularMadre').value+"*"});
	 }
	 else if (nombre=='colegio'){
		 grid.filter({colegio:'*'+document.getElementById('colegio').value.toUpperCase()+"*"});
	 }

	 
}*/
//Función para cerrar la ventana del grid desde el icono X.
//Entrada: Ninguno
//Salida: Cierra el div del grid .e
function cierragrid(){
	 dijit.byId('grid').style.display='none';
	 document.getElementById('grid').style.display='none';
	 document.getElementById('boton').style.display='none';
	 document.getElementById('gridbusqueda').style.display='none';
}
//Función para vincular seguimientos al padre, a parte de vincular el id padre, carga los datos de la quinceañera seleccionada.
//Entrada: Id del segumeinto padre
//Salida: Actualiza el DataObject con el id del padre y vincula.
function hilaseguimientos(id){
	/*if (!confirm('¿Desea vincular este seguimiento y migrar permisos?'))
    { 
      return false;
    }
    else
    {
      var seguimientopadre=window.parent.seguimientoAlmacen.get(id);	
	  document.getElementById('SeguimientoNombreQuinceanera').value=seguimientopadre.nombrequinceanera;
	  document.getElementById('SeguimientoTelefonoQuinceanera').value=seguimientopadre.telefono_quinceanera;
	  document.getElementById('SeguimientoNombreQuinceanera').value=seguimientopadre.nombrequinceanera;
	  document.getElementById('SeguimientoTelefonoQuinceanera').value=seguimientopadre.telefono_quinceanera;
	  document.getElementById('colegio').value=seguimientopadre.colegio;
	  document.getElementById('SeguimientoCelularQuinceanera').value=seguimientopadre.celular_quinceanera;
	  document.getElementById('SeguimientoMailQuinceanera').value=seguimientopadre.mail_quinceanera;
	  dijit.byId("idciudadquin").set("value",seguimientopadre.ciudadquin);
	  document.getElementById('vincula').value='1';
	  document.getElementById('idseguimientopadre').value=id;
	}*/
	//@kike:Esta opción se desactiva temporalmente dada su complejidad  y ya que por parte de los usuarios no s comprendió muy bn su propósito.
	
}


/******Funcion para agregar medio y actualizar filtering select****/
//Entrada: Ninguno
//Salida: Se agrega el medio en la base de datos y se actualiza el Filtering Select. En caso de estar se notifica.
function agregaMedio(){
	medio=document.getElementById('medio').value;
	medio=medio.toUpperCase();
	require(["dojo/_base/xhr"],
    function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "/v15/mariposa/seguimientos/agregamedio?medio="+medio,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
				if(result==-1){
					alert("El medio ingresado se encuentra disponible en la lista");	
				} 
				else{
                var entada={id:result,name:medio};
				window.parent.AgenciasAlmacen.put(entada);	
				alert("Se ha ingresado con éxito el nuevo medio");	
				}
            }
        });        
    });
}
/******Funcion para reenviar correo****/
//Entrada: Ninguno
//Salida: Se Reenvia el correo solicitado.
function reenviarCorreo(id){
	//Id usuario, destinos, email, id Seguimiento, nombre
	idseguimiento=document.getElementById('idseguimiento').value;;
	destinos=dijit.byId('iddestino').get('value').toString();
	idusuario=window.parent.idusuarioactivo;
	switch(id){
		case 1:
		 nombre=document.getElementById('SeguimientoNombre').value;
		 mail=document.getElementById('SeguimientoEmail').value;
		break;
		case 2:
		 nombre=document.getElementById('SeguimientoNombreQuinceanera').value;
		 mail=document.getElementById('SeguimientoMailQuinceanera').value;
		break;
		case 3:
		 nombre=document.getElementById('SeguimientoNombrePadre').value;
		 mail=document.getElementById('SeguimientoMailPadre').value;
		break;
		case 4:
		 nombre=document.getElementById('SeguimientoNombreMadre').value;
		 mail=document.getElementById('SeguimientoMailMadre').value;
		break;
	}
	if(nombre=="" || mail==""){
		alert("El nombre o el correo no pueden estar vacios");
    }
	else{
	require(["dojo/_base/xhr"],
    function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "/v15/mariposa/seguimientos/reenviarcorreo?user="+idusuario+"&destinoquin="+destinos+"&email="+mail+"&id="+idseguimiento+"&nombre="+nombre,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
				alert(result);
            }
        });        
    });
	}
}
$(document).ready(function () {
	
$( "div.onclick" ).click(function() {
	alert("hello");
  console.log($(this).data());
});	
	
	
	
	
	
	
	
$("input[name=visa]:radio").change(function () {
	if($("input[name=visa]:checked").val() == "si"){
		$("#divVisa1").show();
		$("#divVisa2").show();
		$("#visaTab").hide();
	}
	if($("input[name=visa]:checked").val() == "no"){
		$("#divVisa1").hide();
		$("#divVisa2").hide();
		$("#visaTab").show();
	}  
	});
$("input[name=esAgencia]:radio").change(function () {
	if($("input[name=esAgencia]:checked").val() == "si"){
		$("#agenciaTab").show();
	}
	if($("input[name=esAgencia]:checked").val() == "no"){
		$("#agenciaTab").hide();
	}  
	});
//Funcion que detecta cambio en destino y crea los respectivos documentos y pagos
 $("#iddestino").change(function () {
   var dest = $("#iddestino").val();
   var inscID = $('input[name=idseguimiento]').val();


   var r = confirm("Está seguro que desea usar este destino?");
   if (r == true) {
	      $( ".losPagos" ).remove();
   $(".added").remove();
   window.parent.InscripdocumentosAlmacen.query({inscripcion_id:inscID}).forEach(function(desti){
	   require(["dojo/_base/xhr"],
        function(xhr) {
        xhr.get({
           url: "/v15/mariposa/inscripcions/deleteDoc?inscripcion_id="+inscID,
           load: function(result) {
		   }
		});
		});
		window.parent.InscripdocumentosAlmacen.remove(desti.id);
   });
window.parent.PagosAlmacen.query({inscripcion_id:inscID}).forEach(function(desti){
	       require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/deletePago?inscripcion_id="+inscID,
           load: function(result) {
		   }
		});
		});
		window.parent.PagosAlmacen.remove(desti.id);
   });
   
   setTimeout(function(){
   window.parent.PagosDestinoAlmacen.query({destino_id:dest}).forEach(function(desti){
   	var concepto = desti.pago;
   	var n = concepto.search("\\*");
   	var valor = desti.valor;
   	var realizadoPor = "";
    var currency = desti.moneda;
    var moneda = "";
    switch(currency){
        case "1":
        moneda = "Pesos";
        break;
        case "2":
        moneda = "Dolares";
        break;
        case "3":
        moneda = "Euros";
        break;
    }

    $("<tr><td>"+concepto+"</td><td>"+valor*-1+"</td><td>"+moneda+"</td></tr>").appendTo("#ayudaTable");
    if(n){
   	require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/guardaPago?concepto="+concepto+"&realizadoPor="+realizadoPor+"&valor="+valor+"&idInsc="+inscID+"&currency="+currency,
           load: function(result) {
       var pendientePesos = document.getElementById('pendientePesos').value;
       if(!pendientePesos){pendientePesos = 0}
       var pendienteDolares =document.getElementById('pendienteDolares').value;
        if(!pendienteDolares){pendienteDolares = 0}
       var pendienteEuros = document.getElementById('pendienteEuros').value; 
       if(!pendienteEuros){pendienteEuros = 0} 
       var realizadoPor = "Admin";  	
   	   var dateObj = new Date();
       var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); 
       var day = ("0" + (dateObj.getDate())).slice(-2);
       var year = dateObj.getUTCFullYear();
       var dateNow = year+"-"+month+"-"+day;
       var displayPattern = 'd-MMM-yyyy';
       var d = dojo.date.stamp.fromISOString(dateNow);
       var fecha =dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});

            switch(currency){
               case "1":
               pendientePesos = JSON.parse(pendientePesos) + JSON.parse(valor);
               $("<tr class='losPagos'><td>"+concepto+"</td><td>"+valor+"</td><td>0</td><td>0</td><td>"+fecha+"</td><td>"+realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "2":
               pendienteDolares = JSON.parse(pendienteDolares) + JSON.parse(valor);
               $("<tr class='losPagos'><td>"+concepto+"</td><td>0</td><td>"+valor+"</td><td>0</td><td>"+fecha+"</td><td>"+realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "3":
               pendienteEuros = JSON.parse(pendienteEuros) + JSON.parse(valor);
               $("<tr class='losPagos'><td>"+concepto+"</td><td>0</td><td>0</td><td>"+valor+"</td><td>"+fecha+"</td><td>"+realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
           } 
       
        var num = JSON.parse(result);
        var resultado={id:num, inscripcion_id:inscID, concepto:concepto, valor:valor, currency:currency, fecha:dateNow, realizadoPor:realizadoPor};  
        window.parent.PagosAlmacen.add(resultado);
        document.getElementById('pendientePesos').value= pendientePesos;
        document.getElementById('pendienteDolares').value=pendienteDolares;
        document.getElementById('pendienteEuros').value=pendienteEuros;
        $("#pagosPendientes").replaceWith("<tr id='pagosPendientes'><th>Pendientes</th><th>"+pendientePesos+"</th><th>"+pendienteDolares+"</th><th>"+pendienteEuros+"</th><th colspan='2'>"+fecha+"</th></tr>");
       }

      });
     });
     }        
   });}, 3000);
   setTimeout(function(){
   window.parent.DestinocumentosAlmacen.query({destino_id:dest}).forEach(function(desti){
      window.parent.DocumentosAlmacen.query({id:desti.doc_id}).forEach(function(doc){
         
          require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/guardaDocumento?documento="+doc.id+"&inscripcionID="+inscID,

           load: function(result) {
           	var num = JSON.parse(result);
             var resultado={id:num, doc_id:doc.id, inscripcion_id:inscID, recibido:0, aprovado:0, fechaRecibido:"", fechaAprovado:"", aprovadoPor:"", documento:""};  
             window.parent.InscripdocumentosAlmacen.add(resultado);
             $("<tr class='added'><td>"+doc.nombre+"</td><td><input type='checkbox' id='recibido"+num+"' onclick='recibido(this)' value='1'></td><td><input type='checkbox' id='aprovado"+num+"' onclick='popout(this)' value='2'></td><td></td><td></td><td></td><td><form id='documentoForm"+num+"' enctype='multipart/form-data'><input type='file' id='doc"+num+"' class='elDocumento'><button type='button' class='btn btn-primary' value='"+num+"' onclick='uploadDoc(this)' style='background-color:#96689F'>Subir</button></form></td></tr>").appendTo("#docTable");
           }

        });
      });
      });
   });}, 6000); 
   }   
 });
  //Funcion para enviar fomulario de hermanas
 $('form#hermanasForm').on('submit', function(e) {
        e.preventDefault();
        //var formData = {
            nombre =  $('input[name=nombreHermana]').val();
			edad = $('input[name=edadHermana]').val();
			idInsc = $('input[name=idseguimiento]').val();

        //}

        require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/guardaHermana?nombre="+nombre+"&edad="+edad+"&idInsc="+idInsc,

           load: function(result) {

           alert("La hermana se ha agregado con exito");
           $("#headerRowHermana").show();
           $("<tr><td>"+nombre+"</td><td>"+edad+"</td></tr>").appendTo("#hermanaTable");
           var num = JSON.parse(result);
            var resultado={id:num, inscripcion_id:idInsc, nombre:nombre, edad:edad};  
             window.parent.HermanasAlmacen.add(resultado);
           }

        });
      });
    });
 //Funcion para enviar fomulario de pagos
  $('form#pagosForm').on('submit', function(e) {
        e.preventDefault();
        //var formData = {
            concepto =  $('select[name=concepto]').val();
            realizadoPor =  $('input[name=realizadoPor]').val();
			valor = $('input[name=valorPago]').val();
			currency = $('select[name=currency]').val();
			idInsc = $('input[name=idseguimiento]').val();
			if($('input[name=concepto2]').val()){
				concepto = $('input[name=concepto2]').val();
				}
          
        //}

        require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/guardaPago?concepto="+concepto+"&valor="+valor+"&realizadoPor="+realizadoPor+"&idInsc="+idInsc+"&currency="+currency,

           load: function(result) {
			   $("#concepto2").val("");
			   $("#concepto2").hide();
			   $("#concepto").show();
               var pendientePesos = document.getElementById('pendientePesos').value;
               var pendienteDolares =document.getElementById('pendienteDolares').value;
               var pendienteEuros = document.getElementById('pendienteEuros').value;
               var dateObj = new Date();
               var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
               var day = ("0" + (dateObj.getDate())).slice(-2);
               var year = dateObj.getUTCFullYear();
               var dateNow = year+"-"+month+"-"+day;
               var displayPattern = 'd-MMM-yyyy';
               var d = dojo.date.stamp.fromISOString(dateNow);
               var fecha =dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});
                switch(currency){
               case "1":
               pendientePesos = JSON.parse(pendientePesos) + JSON.parse(valor);
               $("<tr><td>"+concepto+"</td><td>"+valor+"</td><td>0</td><td>0</td><td>"+fecha+"</td><td>"+realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "2":
               pendienteDolares = JSON.parse(pendienteDolares) + JSON.parse(valor);
               $("<tr><td>"+concepto+"</td><td>0</td><td>"+valor+"</td><td>0</td><td>"+fecha+"</td><td>"+realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "3":
               pendienteEuros = JSON.parse(pendienteEuros) + JSON.parse(valor);
               $("<tr><td>"+concepto+"</td><td>0</td><td>0</td><td>"+valor+"</td><td>"+fecha+"</td><td>"+realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
           }
           $("#pagosPendientes").replaceWith("<tr id='pagosPendientes'><th>Pendientes</th><th>"+pendientePesos+"</th><th>"+pendienteDolares+"</th><th>"+pendienteEuros+"</th><th colspan='2'>"+fecha+"</th></tr>");
             document.getElementById('pendientePesos').value= pendientePesos;
             document.getElementById('pendienteDolares').value=pendienteDolares;
             document.getElementById('pendienteEuros').value=pendienteEuros;
			 if(pendientePesos == 0 && pendienteDolares == 0 && pendienteEuros == 0){
				 require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/updatePendiente?id="+idInsc,
		   });
      });
		   
				 }   
             var num = JSON.parse(result);
             var resultado={id:num, inscripcion_id:idInsc, concepto:concepto, valor:valor, currency:currency, fecha:dateNow, realizadoPor:realizadoPor};  
             window.parent.PagosAlmacen.add(resultado);
           }

        });
      });
    });
 //Enviar Formulario de amigas
 $('form#amigasForm').on('submit', function(e) {
        e.preventDefault();
        //var formData = {
            nombre =  $('input[name=nombreAmiga]').val();
			destino =  $('select[name=destinoAmiga]').val();
			idInsc = $('input[name=idseguimiento]').val();
			destino2="";
	 window.parent.DestinosAlmacen.query({id:destino}).forEach(function(desti){
		 destino2 = desti.name;
	 });
			


        require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/guardaAmiga?nombre="+nombre+"&destino="+destino+"&idInsc="+idInsc,

           load: function(result) {
           alert("La Amiga se ha agregado con exito");
           $("#headerRowAmiga").show();
           $("<tr><td>"+nombre+"</td><td>"+destino2+"</td></tr>").appendTo("#amigaTable");
            var num = JSON.parse(result);
            var resultado={id:num, inscripcion_id:idInsc, nombre:nombre, destino:destino}; 
             window.parent.AmigasAlmacen.add(resultado);
           }

        });
      });
    });
 //Crea la lista de asesores
 var asesorSelect = document.getElementById('asesor');
 window.parent.UsuariosAlmacen.query({}).forEach(function(user){
    var opt = document.createElement('option');
    opt.value = user.id;
    opt.innerHTML = user.nombre;
    asesorSelect.appendChild(opt);

 });
  var destinoSelect = document.getElementById('destinoAmiga');
 window.parent.DestinosAlmacen.query({}).forEach(function(user){
    var opt = document.createElement('option');
    opt.value = user.id;
    opt.innerHTML = user.name;
    destinoSelect.appendChild(opt);

 });
   
  var destinoSelect2 = document.getElementById('iddestino');
 window.parent.DestinosAlmacen.query({}).forEach(function(user){
    var opt = document.createElement('option');
    opt.value = user.id;
    opt.innerHTML = user.name;
	destinoSelect2.appendChild(opt);

 });

 //Crea Lugar de Nacimiento
/*var lugarNacSelect = document.getElementById('lugarNacimiento');
 window.parent.CuidadesAlmacen.query({}).forEach(function(ciudad){
    var opt = document.createElement('option');
    opt.value = ciudad.id;
    opt.innerHTML = ciudad.name;
    lugarNacSelect.appendChild(opt);

 });*/
 var Ciudad3 = document.getElementById('ciudadAgencia');
 window.parent.CuidadesAlmacen.query({}).forEach(function(ciudad){
    var opt = document.createElement('option');
    opt.value = ciudad.id;
    opt.innerHTML = ciudad.name;
    Ciudad3.appendChild(opt);

 });
 $("#concepto").change(function () {
	 if($("#concepto").val() == "0"){
		   $("#concepto").hide();
		   $("#concepto2").show();
		 }
 });
$('#sendModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var recipient = button.data('whatever') ;
  console.log(recipient);
  var modal = $(this);
  modal.find('.modal-content button').val(recipient);
})




});
 
//Funcion para cargar seguridad de aprobado
 function popout(x){
 	var index = $(x).closest("tr").index();
    document.getElementById("index").value = index;
 	var documentoID = 0;
 	var detalleID = 0;
 	var doc = document.getElementById("docTable").rows[index].cells[0].innerHTML;
    window.parent.DocumentosAlmacen.query({nombre:doc}).forEach(function(doc){
    	documentoID=doc.id;
    	});
    window.parent.DetalleDocumentosAlmacen.query({docID:documentoID}).forEach(function(doc){
    	detalleID=doc.id;
    	pregunta=doc.pregunta;
    	ejemplo=doc.ejemplo;
    	});	
    if(detalleID != 0){
    document.getElementById("index").value = index;	
    $(".remove").remove();	
    $('#seguroModal').modal('show');
    window.parent.DetalleDocumentosAlmacen.query({docID:documentoID}).forEach(function(doc){
    	if(doc.ejemplo){
    	 $("<tr class='remove'><td><input type='checkbox' class='checkClass' onclick='check()'></td><td class='remove'>"+doc.pregunta+"</td><td class='remove'><a href='/v15/mariposa/"+doc.ejemplo+"' target='_blank'>Ver Ejemplo</a></td></tr>").appendTo("#checkTable");
    	} else {
    	$("<tr class='remove'><td><input type='checkbox' class='checkClass'></td><td class='remove'>"+doc.pregunta+"</td><td class='remove'>Ejemplo no disponible</td></tr>").appendTo("#checkTable");	
    	}
    	});	
    } else {
    recibido2();
     }
 }
 function addNota(x){
	 bitacora=document.getElementById('notaArea').value;	 
	 
	 	     require(["dojo/_base/xhr"],
   function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "/v15/mariposa/inscripcions/guardaNota?bitacora="+bitacora+"&id="+x.value,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
				var y =  document.getElementById('notaModalShow'+x.value)
				console.log(y);
				if (!y){
				 y = $('.onclick[data-insc="'+x.value+'"]');
				}
				var index = $(y).closest("tr").index();
				document.getElementById("docTable").rows[index].cells[7].innerHTML = "<div class='onclick' data-insc='"+x.value+"'>"+bitacora+"</div>";
				var doc=window.parent.InscripdocumentosAlmacen.get(x.value);
				doc.nota = bitacora;
				window.parent.InscripdocumentosAlmacen.put(doc);
            }
        });        
    }); 
	 }
 
 
 function popout2(x){
 	var index = x.value;
    document.getElementById("addNotaButton").value = index;
    $('#notaModal').modal('show');

 }
  function popout3(x){
    document.getElementById("addNotaButton").value = x;
    $('#notaModal').modal('show');

 }
 
 //Funcion para revisar si todo esta chequeado para aprobar documento
  function check(){
    if ($('.checkClass:checked').length == $('.checkClass').length) {
        $("#aprovadoButton").prop("disabled", false); 
    }
  }

//Funcion para cargar documento
 function uploadDoc(x){
   var inscDocID = x.value;
   var theFile = document.getElementById('doc'+inscDocID);
   var file = theFile.files[0];
   var inscID = $('input[name=idseguimiento]').val();
   var destinoNombre =$("#iddestino option:selected").text();
   var anoquin=document.getElementById('SeguimientoAnoviajeQuinceanera').value;
   var mesquin=document.getElementById('SeguimientoMesviajeQuinceanera').value;
   var index = $(x).closest("tr").index();
   switch(mesquin){
    case "06":
    mesquin="Junio";
    break;
    case "12":
    mesquin="Diciembre";
    break;
   }
   nombrequin2=document.getElementById('SeguimientoNombreQuinceanera').value;
   if(file){
     var data = new FormData();
     data.append('doc', file);
     data.append('destino', destinoNombre);
     data.append('mes', mesquin);
     data.append('year', anoquin);
     data.append('nombre', nombrequin2);
     data.append('id', inscDocID);
     nombreFile = file.name.replace(/\s/g, "_");
     nombre = nombrequin2.replace(/\s/g, "_");
     eldestino = destinoNombre.replace(/\s/g, "_");
           $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaDoc",
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	$("#documentoForm"+inscDocID).hide();
            	var a = document.createElement('a');
                var linkText = document.createTextNode("ver: Documento");
                a.appendChild(linkText);
                a.title = "ver: Documento";
                a.href = "/v15/mariposa/docs/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"/"+nombreFile;
            	document.getElementById("docTable").rows[index].cells[6].appendChild(a);
                var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(inscDocID);
                inscripcionactualizar.documento = "docs/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"/"+nombreFile;
                window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar);
            }
        });
       }


 }
 //funcion para señalar documentos como recibido
    function recibido(x){   
 	    var inscID = $('input[name=idseguimiento]').val();
    	var state = x.value;
    	var index = $(x).closest("tr").index();
    	var documentoID = 0;
    	user=window.parent.idusuarioactivo;
    	var documento = document.getElementById("docTable").rows[index].cells[0].innerHTML;
    	window.parent.DocumentosAlmacen.query({nombre:documento}).forEach(function(doc){
          documentoID=doc.id;
    	});	
    	require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/updateDocumento?documento="+documentoID+"&inscripcionID="+inscID+"&state="+state+"&user="+user,

           load: function(result) {
           	var id = JSON.parse(result);
           	var dateObj = new Date();
           	var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
            var day = ("0" + (dateObj.getDate())).slice(-2);
             var year = dateObj.getUTCFullYear();
               
               if(state=="1"){
               	var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(id);
               	inscripcionactualizar.recibido = 1;
               	inscripcionactualizar.fechaRecibido = year + "-" + month + "-" + day;
               	document.getElementById("docTable").rows[index].cells[3].innerHTML = year + "-" + month + "-" + day;
               window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar);
	           window.parent.inscipdocumento=window.parent.InscripdocumentosAlmacen.data;
	           var inscripcionactualizar=window.parent.inscripcionAlmacen.get(inscID);
	           inscripcionactualizar.docRecibido=1;
	           window.parent.inscripcionAlmacen.put(inscripcionactualizar);
	           window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
	       }
           }

        });
      });
        
};
//Funcion para arprobar documentos
function recibido2(){   
 	    var inscID = $('input[name=idseguimiento]').val();
 	    var state = 2;
    	var index = document.getElementById("index").value;
    	var documentoID = 0;
    	user=window.parent.idusuarioactivo;
    	var documento = document.getElementById("docTable").rows[index].cells[0].innerHTML;
    	window.parent.DocumentosAlmacen.query({nombre:documento}).forEach(function(doc){
          documentoID=doc.id;
    	});	
    	require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/updateDocumento?documento="+documentoID+"&inscripcionID="+inscID+"&state="+state+"&user="+user,

           load: function(result) {
           	var id = JSON.parse(result);
           	var dateObj = new Date();
           	var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
            var day = ("0" + (dateObj.getDate())).slice(-2);
             var year = dateObj.getUTCFullYear();
               var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(id);
               	user2 = window.parent.UsuariosAlmacen.get(user);
				document.getElementById("docTable").rows[index].cells[4].innerHTML = year + "-" + month + "-" + day;
               	document.getElementById("docTable").rows[index].cells[5].innerHTML = user2.nombre;
               	inscripcionactualizar.aprovado=1;
               	inscripcionactualizar.fechaAprovado =  year + "-" + month + "-" + day;
               	inscripcionactualizar.aprovadoPor = user;
               window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar);
	           window.parent.inscipdocumento=window.parent.InscripdocumentosAlmacen.data;
	           var inscripcionactualizar=window.parent.inscripcionAlmacen.get(inscID);
	           inscripcionactualizar.docAprovado=1;
	           window.parent.inscripcionAlmacen.put(inscripcionactualizar);
	           window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
           }

        });
      });
        
};

function sendTable(x) {
	var inscID = $('input[name=idseguimiento]').val();
	console.log(inscID);
	var email = $( "#sendSelect" ).val();
	var tipo = x.value;
	if (tipo == "@1"){
		require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/sendDoc?inscID="+inscID+"&email="+email,

           load: function(result) {
			   console.log(result);
           }

        });
      });
		}
	else if(tipo == "@2"){
		require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/sendPago?inscID="+inscID+"&email="+email,

           load: function(result) {

           }

        });
      });
		}
	
};

function loadSeg() {
	var inscID = $('input[name=idseguimiento]').val();
	window.parent.crearseguimiento(inscID);	
}

$(document).ready(function() {
$(document).on('click', "div.onclick", function() {
         var inscid = $( this ).data("insc");
		 popout3(inscid);
        
});
});

window.onload=function(){$(".loader").hide()};
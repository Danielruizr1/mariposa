//Se precargan las librerias con las cuales se van a trabajar los datos, estas se manejan con Dojo 1.7
//Libreria que maneja las funciones del Datagrid
dojo.require("dojox.grid.DataGrid");
//Libreria que maneja el objeto ItemFileReadStore, como una forma de manejar los Data Objects
dojo.require("dojo.data.ItemFileWriteStore");
//Libreria que maneja los mensajes laterlas que aparecen al validar
dojo.require("dijit.Tooltip");
dojo.require("dojo.date.stamp");
dojo.require("dojo.date.locale");


dojo.require("dojo.data.ItemFileReadStore");


//Variable que contiene las agencias cargadas ene l DataObject
var agencias = window.parent.agencia;
//Variable que contiene al usuario activo
var users = window.parent.todos;
/*window.parent.grabar=0;
window.parent.cargaDatos();*/
//Variables para controlar nombres, contador de noticias y colores usados
var contadornoti=0;
var nombretemp;
var color="vacio";
var nombregrid="vacio";
var contadornoti=0;
var interna;
dojo.ready(function(){
    /*Codigo de prueba de un Datagrid Obviar, no esta en funcionamiento en la página*/
    var data = {
      identifier: 'id',
      items: []
    };
    var data_list = [
      { col1: "normal", col2: true, col3: 'But are not followed by two hexadecimal', col4: 29.91},
      { col1: "important", col2: false, col3: 'Because a % sign always indicates', col4: 9.33},
      { col1: "important", col2: true, col3: 'Signs can be selectively', col4: 19.34}
    ];
    var rows = 60;
    for(var i=0, l=data_list.length; i<rows; i++){
      data.items.push(dojo.mixin({ id: i+1 }, data_list[i%l]));
    }
    var store = new dojo.data.ItemFileWriteStore({data: data});
   /*Codigo de prueba de un Datagrid Obviar, no esta en funcionamiento en la página*/
   //Funcion para poner el botón de alerta cuando existen notificaciones
   //Entrada: La columna y el index de la fila
   //Salida: Las columnas que poseen notificaciones se setean con el icono
   function poneBoton(tracker, rowIndex){
	   //Se revisa el nombre del usuario
	    iduser=window.parent.nombreuseract;
		//Se trae del grid el nombre del usuario
		iduserrow= id=grid._getItemAttr(rowIndex, 'agente');
		//Se trae la variable de transferencia desde el grid
		transferencia=grid._getItemAttr(rowIndex, 'transferencia');
		//Se trae la variable de vinculación desde el grid
		vinculacion=grid._getItemAttr(rowIndex, 'vinculacion');
			//Se trae la variable de bitacora desde el grid
		bitacora=grid._getItemAttr(rowIndex, 'bitacora');
		//alert("Esto es lo que contiene tracker: " + tracker + " , transferencia: " + transferencia + " y vinculacion: "+vinculacion);
		//Se tratan ambos nombres en minuscula para poder hacer la comparación.
		iduser=iduser.toLowerCase();
		iduserrow=iduserrow.toLowerCase();
		//Con estos condicionales se maneja la inclusión de la imagen
		if(iduser==iduserrow){
		//if(tracker!=0 || transferencia>0|| vinculacion>0 || bitacora>0){ Crea notificacion cuando no se ha abierto el correo
		if(transferencia>0|| vinculacion>0 || bitacora>0){ 
		return '<span id="seguimiento"><img src="imgs/mal.png" border="0"/></span>';
		}
		else{
			return '<span id="seguimiento"> </span>';
		} 
		}
		else{
			return '<span id="seguimiento"> </span>';
		}
   }
   //Funcion para colocarle nombre a la agencia
   //Entrada: La agencia y el index de la fila
   //Salida: Las agencia con os estilos establecidos
   function poneAgencia(agencia, rowIndex){
	   nombreAgencia=agencia;
	   if (!isNaN(nombreAgencia))
	   {
	   
	   
				 window.parent.AgenciasAlmacen.query({id:agencia}).forEach(function(des){
		   nombreAgencia=des.name;
       });
	   }
	   /*if (agencia==-1)
	   {
	   
	   nombreAgencia="";
	   var idSeguimiento=grid._getItemAttr(rowIndex, 'id');
	   var storeSeguimiento =""
	        window.parent.agenciasSguimientosAlm.query({seguimiento:idSeguimiento}).forEach(function(des){
              agencia =des.agencia;
		    
			
				 window.parent.AgenciasAlmacen.query({id:agencia}).forEach(function(des){
		   nombreAgencia=des.name;
       });
			
			
			storeSeguimiento = window.parent.seguimientoAlmacen.get(idSeguimiento);
		    storeSeguimiento.agencia = nombreAgencia;
            window.parent.seguimientoAlmacen.put(storeSeguimiento);
			window.parent.segumiento=window.parent.seguimientoAlmacen.data;
            nombreAgencia =nombreAgencia;
		
	    }); 
		
		
	   }*/
	  
	   return '<font style="color:#656565; font-size:0.9em">'+nombreAgencia+'</font>';
   }
   
     //Funcion para setear el estado de  del destino
   //Entrada: El array de destinos y el index de la fila
   //Salida: la lista de destinos reducida a las siglas
   function poneDestino(destino, rowIndex){

	   
	   var NombreDestino="";
	   prueba = parseInt(destino);
	   if(isNaN(prueba)){NombreDestino = destino}
	   else{
	                  
           
		    window.parent.DestinosAlmacen.query({id:destino}).forEach(function(des){
       
		      nombre=des.sigla;
		
       });
		   
		    NombreDestino=nombre; 	
	   }
       
	   return '<font style="color:#656565; font-size:0.7em">'+NombreDestino+'</font>';
		
   }
   
        //Funcion para setear el año de salida
   //Entrada: El año
   //Salida: el número con el año de salida de destino
   function poneSalida(salida, rowIndex){
   	 if(salida){
	   return '<font style="color:#656565; font-size:0.9em">'+salida+'</font>';
	} else {
		 return '<font style="color:#656565; font-size:0.9em"></font>';
	}
		
   }
         //Funcion para setear el año de salida
   //Entrada: El año
   //Salida: el número con el año de salida de destino
   function poneMes(salida, rowIndex){
	   fechatotal="";
	    switch(salida){
		  case "01":
		   fechatotal+="ENE";
		  break;
		  case "02":
		   fechatotal+="FEB";
		  break;
		  case "03":
		   fechatotal+="MAR";
		  break;
		  case "04":
		   fechatotal+="ABR";
		  break;
		  case "05":
		   fechatotal+="MAY";
		  break;
		  case "06":
		   fechatotal+="JUN";
		  break;
		  case "07":
		   fechatotal+="JUL";
		  break;
		  case "08":
		   fechatotal+="AGO";
		  break;
		  case "09":
		   fechatotal+="SEP";
		  break;
		  case "10":
		   fechatotal+="OCT";
		  break;
		  case "11":
		   fechatotal+="NOV";
		  break;
		  case "12":
		   fechatotal+="DIC";
		  break;
	  }
	   return '<font style="color:#656565; font-size:0.9em">'+fechatotal+'</font>';
		
   }
    //Funcion para colocar la ciudad con estilos
   //Entrada: La ciudad y el index de la fila
   //Salida: Las ciudad con los estilos establecidos
   function poneCiudad(ciudad, rowIndex){
	   prueba = parseInt(ciudad);
	   if(isNaN(prueba)){nombreCiudad=ciudad}
	   else {
	   window.parent.CuidadesAlmacen.query({id:ciudad}).forEach(function(des){
                                 nombreCiudad=des.name;
                        });
	   }

	   return '<font style="color:#656565; font-size:0.9em">'+nombreCiudad+'</font>';
   }
   //Funcion para setear el nombre de la quinceañera, si el nombre esta repetido le cambia el color por uno mas tenue
   //Entrada: El nombre de la quinceañera y el index de la fila
   //Salida: El nombre de la quinceañera de acuerdo a los estilos establecidos
   function cuadraNombre(nombrequinceanera, rowIndex){
	   /*if(nombretemp=="vacio" || nombretemp!=nombrequinceanera){
		   nombretemp=nombrequinceanera;
		   return '<font style="color:#656565; font-size:0.9em">'+nombrequinceanera+'</font>';
	   }
	   else{
		 return '<font style="color:#CECECE; font-size:0.9em">'+nombrequinceanera+'</font>';
	   }*kike: Se desactiva dado que el sistema de vincular ya no está en uso por su complejidad para el usuario*/
	    return '<font style="color:#656565; font-size:0.9em">'+nombrequinceanera+'</font>';
   }
   //Funcion para setear el nombre del Agente de acuerdo a los estilos establecidos
   //Entrada: El agente y el index de la fila
   //Salida: El agente con el css establecido
   function setVendedor(agente, rowIndex){
		   prueba = parseInt(agente);
	   if(isNaN(prueba)){nombreCiudad=agente}
	   else {
	   window.parent.UsuariosAlmacen.query({id:agente}).forEach(function(des){
                                 nombreCiudad=des.nombre;
                        });
	   }

	   return '<font style="color:#656565; font-size:0.9em">'+nombreCiudad+'</font>';
   }
    //Funcion para poner la fecha de acuerdo a lo establecido
   //Entrada: La fecha y el index de la fila
   //Salida: Las fecha seteada con el estilo solicitado
   function setFecha(fechaingreso, rowIndex){
   	var fechatotal ="NA"
   	    if(fechaingreso){
		var displayPattern = 'd-MMM-yyyy';
		 var d = dojo.date.stamp.fromISOString(fechaingreso);
		 fechatotal=dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});
	  }
	  return '<font style="color:#656565; font-size:0.9em">'+fechatotal+'</font>';

   }
    //Funcion para setear el nombre de la persona de contacto
   //Entrada: El nombre de la persona de contacto y el index de la fila
   //Salida: El nombre de la persona de contacto con el css establecido
   function setContacto(nombrequienllama, rowIndex){
	  return '<font style="color:#656565; font-size:0.9em">'+nombrequienllama+'</font>';
   }
    //Funcion para setear el id de la persona de contacto
   //Entrada: El id y el index de la fila
   //Salida: El id de la persona de contacto con el css establecido
   function setId(id, rowIndex){
	  return '<font style="color:#656565; font-size:0.9em">'+id+'</font>';
   }
   //Funcion para setear el estado de  del seguimiento
   //Entrada: El estado y el index de la fila
   //Salida: El estado con los correspondientes estilos
   function poneEstado(estado, rowIndex){
	   if(estado==1){
		    return '<font style="color:#656565; font-size:0.9em">PENDIENTE</font>';
		}
		else if(estado==2){
			return '<font style="color:#656565; font-size:0.9em">INSCRITA</font>';
		}
		else{
			return '<font style="color:#656565; font-size:0.9em">NO INSCRITA</font>';
		}
   }
 function poneFont(entry, rowIndex){
	if(entry){
		if(entry == "MUY INTERESADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:green; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
	} else if(entry == "MEDIANAMENTE INTERESADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:yellow; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
	} else if(entry == "POCO INTERES O ABANDONADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:red; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
   } else {
   return '<span id="seguimiento"> </span>'; 
  }
	} else {
  return '<span id="seguimiento"> </span>';
	}
 }
 function poneFase(entry, rowIndex){
	 switch(entry){
						  case "1":
						   entry= "1.INICIO";
						  break;
						  case "2":
						   entry= "2.DEJË MENSAJE TELEFONICO";
						  break;
						  case "3":
						   entry= "3.VOLVER A LLAMAR";
						  break;
						  case "4":
						   entry= "4.POSPONEN EN VIAJE";
						  break;
						  case "5":
						   entry= "5.ENVIË DATOS Y DOCUMENTOS DE INSCRIPCION";
						  break;
						  case "6":
						  entry= "6.VISITË A CLIENTE";
						  break;
						  case "7":
						   entry= "7.CONCRETË CITA EN LA OFICINA";
						  break;
						  case "8":
						   entry= "8.LES ATENDÍ EN LA OFICINA";
						  break;
						  case "9":
						   entry= "9.ENVIÉ REVISTA";
						  break;
						 case "10":
						   entry= "10.FIN";
						  break;
						 } 
	 return '<font style="color:#656565; font-size:0.9em">'+entry+'</font>';
	 
 }
 function poneInteres(entry, rowIndex){
	 switch(entry){
						  case "1":
						   entry= "MUY INTERESADO";
						  break;
						  case "2":
						   entry= " MEDIANAMENTE INTERESADO";
						  break;
						  case "3":
						   entry= "POCO INTERESADO";
						  break;
	 }
	 return '<font style="color:#656565; font-size:0.9em">'+entry+'</font>';
 }
function poneFecha(entry, rowIndex){
	if (entry){
	 var displayPattern = 'd-MMM-yyyy';
						var d = dojo.date.stamp.fromISOString(entry);
		                 entry = dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});
		             }
	 return '<font style="color:#656565; font-size:0.9em">'+entry+'</font>';
 }

    /*function myStyleRow(row){
       /* The row object has 4 parameters, and you can set two others to provide your own styling
          These parameters are :
            -- index : the row index
           -- selected: whether or not the row is selected
           -- over : whether or not the mouse is over this row
          /* -- odd : whether or not this row index is odd. */
         /* if(row.index%2==0){
              row.customStyles+= 'background-color:#F4F7FB;';
          }
    }*/
    /*create a new grid:*/
	//Función para crear el grid y estblecer los parametros manejados por las funciones
    
	grid = new dojox.grid.DataGrid({
        id: 'grid',
		query:{agente:window.parent.nombreuseract.toUpperCase()},
        store: window.parent.inscripcionStore,
		clientSort: true,
		onRowClick: function(e) {	
		             
					  id=grid._getItemAttr(e.rowIndex, 'id');
					  whatIs = "Ins";
					  window.parent.crearinscripcion(id, whatIs);
					  grid.selection.deselectAll(); 
					  grid.selection.setSelected(e.rowIndex, true);
					
					 
        },
		//onStyleRow: myStyleRow,
        structure:[
	                    
						{name:"Seg", field:"id", width:"10%", width:"2.5em", formatter:setId},
						{name:"#", field:"inscrita", formatter: poneSalida, width:"2.5em"},
						{name:"Inscrita El", field:"fechaingreso", width:"6.5em",formatter:setFecha},
						{name:"Quincea&ntilde;era", field:"nombrequinceanera", width:"15em", formatter:cuadraNombre},
						{name:"Destino", field:"iddestino", width:"15em",formatter: poneDestino,  width:"4em"},
						{name:"Año", field:"anoviaje_quinceanera", width:"3em",formatter: poneSalida},
						{name:"Mes", field:"mesviaje_quinceanera", width:"2em",formatter: poneMes},						
						{name:"Quien Inscribió a la niña", field:"nombrequienllama", width:"15em",formatter:setContacto},
						{name:"Vendedor", field:"nombreAgente", width:"15em", formatter:setVendedor, width:"11.5em"},
						{name:"Asesor", field:"asesorNombre", width:"15em",formatter: setVendedor, width:"11.5em"},
						{name:"Ciudad", field:"ciudadResidencia", width:"7.5em", formatter:poneCiudad},
						
					    
						
						

						
       ]},"gridDiv");

    //Se hace render en el div que este establecido el grid
    grid.startup();
	//Con esta función se cuadran la cantidad de registrtimos encontrados en el grid
	dojo.connect (grid, "_onFetchComplete", function(items) {
        dojo.byId('totalseg').innerHTML=grid.rowCount;
    }); 
	/*dojo.connect(grid,"onStyleRow",function(row){
     if (row.over) {
      row.customStyles+='background-color:#95B1D9;';
     }
    });*/
	//Toma el tamaño de la pantalla  menos el ancho del grid para ajuste
	tamano=window.parent.tama-150;
	//Setea el tamaño del grid
	document.getElementById("grid").style.height =tamano+"px";
	//Actualzia el tamaño del grid
    dijit.byId('grid').resize();
	//Actualiza la información del grid
    dijit.byId('grid').update();
	//Retira el display none del link con el que se rompe el query del grid
	document.getElementById('rompeQuery').style.display='';
});
/*********************************Funcion de busqueda por vendedor y medio**************************/
require([
    "dojo/ready", "dojo/store/Memory",
    "dijit/form/ComboBox",  "dijit/form/ValidationTextBox",  "dijit/form/FilteringSelect",
], function(ready, Memory, ComboBox, ValidationTextBox, FilteringSelect){
    ready(function(){
    //Con esta funcion se setea el filtering select de medio
		var yearStore = new Memory({
        data: [
            {name:"2012"},
            {name:"2013"},
			{name:"2014"},
            {name:"2015"},
			{name:"2016"},
            {name:"2017"},
			{name:"2018"},
            {name:"2019"},
			{name:"2020"}
        ]
    });
    medio=new dijit.form.ComboBox({
            id: "idagencia",
			name: 'data[Agencia][Agencia]',
			placeHolder: "Mes",
			require:false,
            store: new Memory({data:[
            {mesviaje_quinceanera:"JUNIO",value:"06"},
            {mesviaje_quinceanera:"DICIEMBRE",value:"12"}
        ]}),
            autoComplete: true,
            style: "width: 120px;color:#F00;backgorund-color:#ECE3F9;font-family:Verdana, Geneva, sans-serif;",
			onChange: function(departamento){
				document.getElementById('rompeQuery').style.display='';
				grid.filter({mesviaje_quinceanera:this.item.value},true); 
            },
			searchAttr: "mesviaje_quinceanera"
        }, "AgenciaAgencia");
		  //Con esta funcion se setea el filtering select de destino
    destino=new dijit.form.FilteringSelect({
            id: "iddestino",
			name: 'data[Destino][Destino]',
			placeHolder: "Destino",
			require:false,
            store: new Memory({data:window.parent.destino}),
            autoComplete: true,
            style: "width: 300px;color:#F00;backgorund-color:#ECE3F9;font-family:Verdana, Geneva, sans-serif;",
			onChange: function(departamento){
				document.getElementById('rompeQuery').style.display='';
				grid.filter({destino: this.item.sigla},true); 
            },
			searchAttr: "name"
        }, "destinoSeguimiento");
		
    //Con esta funcion se setea la funcion de vendedor
    vendedor=new dijit.form.ComboBox({
            id: "idusers",
			name: 'data[Seguimientos][User]',
			require:false,
			placeHolder: "Año",
            store: yearStore,
            autoComplete: true,
            style: "width: 100px;color:#F00;backgorund-color:#ECE3F9;font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agente){
				document.getElementById('rompeQuery').style.display='';
                grid.filter({anoviaje_quinceanera:this.item.name},true); 
            },
			searchAttr: "name"
     }, "VendedorVendedor");
	 //Se setean los filtering para que no sean obligatorios
	 dijit.byId("idagencia").required = false;
	 dijit.byId("idusers").required = false;
	 //Se ejecuta la creacipon de las notificaciones
	 crearNotificaciones();
	 //Se crea la notificacion de la cantidad de registros del grid
	document.getElementById('totalseg').innerHTML=window.parent.seguimiento.length;
})}); 
/*********************************Funcion de busqueda***********************************************/
//Entrada: Ninguno
//Salida: El grid con los filtros aplicados
function filtragrid(){
	    document.getElementById('rompeQuery').style.display='';
	    var nombre=document.getElementById('nombrenina').value;
		if(!isNaN(nombre)){
			if(document.getElementById('nombrenina').value==''){
			grid.filter({id:"*"},true);
			}
			else{
				grid.filter({id:'*'+nombre+"*"},true); 
			}
		} 
		else{
			nombre=nombre.toUpperCase();
			if(document.getElementById('nombrenina').value==''){
			grid.filter({nombrequinceanera:"*"},true);
			}
			
			if (document.getElementById('nombrenina').value.indexOf("correo")>-1)
			{
			   nombre=nombre.substr(document.getElementById('nombrenina').value.indexOf(":")+1,document.getElementById('nombrenina').value.length);
			   
			   grid.filter({email: '*'+nombre+"*"},true);
			}
			else if (document.getElementById('nombrenina').value.indexOf("colegio")>-1)
			{
			   nombre=nombre.substr(document.getElementById('nombrenina').value.indexOf(":")+1,document.getElementById('nombrenina').value.length);
			   
			   grid.filter({colegio: '*'+nombre+"*"},true);
			}
			
			else if (document.getElementById('nombrenina').value!=''){
				nombre=nombre.toUpperCase();
				grid.filter({nombrequinceanera: '*'+nombre+"*"},true); 
			}
		}
}
/**********************************Filtra seguimientos en notificaciones********************************/
//Entrada: El id del seguimiento
//Salida: El grid con el seguimiento filtrado
function filtraSeguimiento(id){
	document.getElementById('rompeQuery').style.display='';
	grid.filter({id:id},true); 
}

//Funcion para mostrar todos los registros del grid
//Entrada: El id del seguimiento
//Salida: El grid con todos los seguimientos
function cargaTodos(){
	document.getElementById('rompeQuery').style.display='none';
	grid.selection.deselectAll(); 
	grid.filter({id:'*'},true);
	document.getElementById("idagencia").value='';
	document.getElementById("idusers").value='';
	document.getElementById("iddestino").value='';
	document.getElementById("nombrenina").value='';
}
//Funcion para borrar una notificación
//Entrada: El id de la notificación
//Salida: Se elimina la notificación del DataObject y de la base de datos
function borraNotificacion(id){
	if (!confirm('¿Desea eliminar esa notificación?'))
    { 
      return false;
    }
    else
    {
	   require(["dojo/_base/xhr"],
       function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "../../../v15/mariposa/seguimientos/borrarNotificacion?idseguimiento="+id,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
            
			   //Recarga las notificaciones del lateral, despues de desvincular el seguimiento
			        seguimientoactualizar=window.parent.inscripcionAlmacen.get(id);
					seguimientoactualizar.transferencia="0";
					seguimientoactualizar.vinculacion="0";
					seguimientoactualizar.tracker="0";
					seguimientoactualizar.bitacora="0";
					window.parent.inscripcionAlmacen.put(seguimientoactualizar);
	                window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
					crearNotificaciones();
					grid.filter({agente:window.parent.nombreuseract.toUpperCase()});
            }
        });        
      }); 
    }
}
/**********Funcion para crea notificaciones laterales**************************/
//Entrada: Ninguno
//Salida: Se crea en el div las notificaciones de acuerdo a que esta activo y la fecha.
function crearNotificaciones(){
    contadornoti=0;
	interna='';
	var fecha=new Date();
	var fechaRegistro=0;
	var fechaRegistro2=0;
	var actualMayorIngreso=false;
	mes=fecha.getMonth() +1;
	dia=fecha.getDate();
	if(mes<10){
		mes="0"+mes;
	}
	if(dia<10){
		dia="0"+dia;
	}
	
	
	
	
	
	fechaactual=parseInt(fecha.getFullYear())+parseInt(mes*100)+parseInt(dia);
	//fechaactual=fechaactual.toString();
	
	
	
	list = document.getElementById('noti');
	   
	   while (list.hasChildNodes())
     {
         list.removeChild(list.firstChild);
     }  
     
  document.getElementById('noti').innerHTML='';
	nombreuser=window.parent.nombreuseract.toUpperCase();
	interna="";
	  
	
	window.parent.inscripcionAlmacen.query({nombreAgente:nombreuser},{sort: [{attribute: "fechaingreso", descending: true}]}).forEach(function(shoe){    
	
	fechaRegistro	=shoe.fechaingreso.replace(/-/gi, ",");
	
	fechaRegistro2=fechaRegistro;
	

	
	var arrayFechaRegistro = fechaRegistro.split(',');
	
	mes=arrayFechaRegistro[1];
	dia=arrayFechaRegistro[2];

	
	//Permite calcular que la fecha actual sea realmente mejo
	fechaRegistro=parseInt(arrayFechaRegistro[0])+parseInt(100*mes)+parseInt(dia);      


    if (fechaactual>fechaRegistro) 
	 actualMayorIngreso=true;     
    

		
		 
	   //if(((shoe.tracker!=0)&actualMayorIngreso)|| (shoe.transferencia!=0) || (shoe.vinculacion!=0) || (shoe.bitacora!=0)){  Crea Notificacion para los correos que no han sido abiertos
	   if((shoe.transferencia!=0) || (shoe.vinculacion!=0) || (shoe.bitacora!=0)){ 
		   var id=shoe.id;
		   interna+='<div style="width:95%; background-color:#C1D3DD; border:solid 1px;#888888;position:relative;-moz-border-radius: 5px;border-radius: 5px; font-family:Verdana, Geneva, sans-serif; font-size:12px; margin-bottom:5px;"><div style="width:100%; height:21px;color:#444444; text-align:left" ><div style="float:left; width:49%">Seguimiento:<strong>'+shoe.id+'</strong></div><div style="float:right;width:49%; text-align:right"><img src="imgs/cerrar.png" border="0" onclick="borraNotificacion('+id+');" onMouseOver="document.body.style.cursor = \'pointer\';" onMouseOut="document.body.style.cursor = \'default\';"/></div></div><div style="width:100%; color:#A66BD6;font-size:12px; text-align:left; padding-left:0.5em; ">'+shoe.nombrequinceanera+'</div><div onClick="filtraSeguimiento('+id+');" onMouseOver="document.body.style.cursor = \'pointer\';" onMouseOut="document.body.style.cursor = \'default\';"><div style="width:100%; color:#A66BD6;font-size:12px; text-align:center"><ul style="margin-left:-10px">';
		    /*if(shoe.tracker!=0){
				if(actualMayorIngreso){
				 interna+='* Cliente no ha revisado correo.<br/>'+shoe.tracker; 
				}
			 }*/
			 var id =shoe.id;
			 var nombre = "";
			 //@Daniel: Se corre riesgo de todas la bitacoras por cada seguimiento
			 window.parent.bitacora2Almacen.query({idseguimiento:id}).forEach(function(bita){
	
					      nombre = bita.nombreUsuario;
						
				     
               });
			  //console.log(thing);
			 if(shoe.transferencia!=0){
				 interna+='<li><div align="left" style="color:#B71BB7; ">Transferido por otro usuario.</div></li>';
			 }
			 if(shoe.vinculacion!=0){
				 interna+='Vinculado a otro seguimiento.<br/>';
			 }
			 if(shoe.bitacora!=0){
				 interna+='<li><div align="left" style="color:#B71BB7; ">Nuevo Mensaje en bitacora de: <br /><strong>'+nombre+'</strong></div></li>';
			 }
			interna+='</ul></div></div></div>';
			contadornoti++;
	   }
    });
	document.getElementById('noti').innerHTML+=interna;
	document.getElementById('totalnoti').innerHTML=contadornoti;
}
/**Funcion no usada en el codigo**/
function cuadraIngresos(){
	alert("entra");
	ancho=screen.width ;
	alert(ancho);
	 areafinal=ancho*79/100;
	 alert(areafinal);
	 /*nombrenina=areafinal*30/100;
	 alert(areafinal);
	 vendedor=areafinal*30/100;
	 alert(areafinal);
	 agencia=areafinal*30/100;
	 alert(areafinal);
	 nombrenina=Math.round(nombrenina);
	 alert(areafinal);
	 vendedor=Math.round(vendedor);
	 alert(areafinal);
	 agencia=Math.round(agencia);
	 alert(areafinal);
	 dijit.byId('nombrenina').set('style', {width:nombrenina+"px"});
	 alert(areafinal);
	 dijit.byId('idagencia').set('style', {width:agencia+"px"});
	 alert(areafinal);
	 dijit.byId('idusers').set('style', {width:vendedor+"px"});*/
}
/**Funcion no usada en el codigo**/
//Función que filtra por el estado
//Entrada:Ninguno
//Salida: Grid filtrado por el estado
//Esta funciones son para el control de los hilos con el div hermano, en este caso esta activo para refrescar información
window.parent.grabar=0;
carga=window.parent.grabar;

if(carga==0){

}
//Esta funciones son para el control de los hilos con el div hermano, en este caso esta activo para refrescar información//Funcion para mostrar todos los registros del grid
//Entrada: ninguna
//Salida: el arranque del grid el inicio filtrar por pendientes del agente actual
function iniciaGrid(){
	cargaTodos();
	var d = new Date();
	var year = d.getFullYear();
	var month = d.getMonth() +1;
	var monthQuery = "06";
	if(month >= 6){
		monthQuery = "12";
	}
	var filterObject = {};
				filterObject.nombreAgente = window.parent.nombreuseract.toUpperCase();
				filterObject.mesviaje_quinceanera =monthQuery;
				filterObject.anoviaje_quinceanera =year;
				filterObject.estado ="1";
				document.getElementById('rompeQuery').style.display='';
				
	grid.filter(filterObject,true);
}

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
	   prueba = parseInt(agencia);
	   if(isNaN(prueba)){nombreAgencia = agencia}
	   else {
	   
	   
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
   function poneDestino(destinos, rowIndex){

	   
	    NombreDestino = "";
					   NumeroDestino = "";   
	   for (var i=0; i < destinos.length;++i){ 
					   if(destinos[i] == "1"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"CUR-AUA";
									 NumeroDestino+=1+","; 
									 
								  }else{
		                            NombreDestino="CUR-AUA"; 
									NumeroDestino=1+",";	
                                   }
						   }
						   if(destinos[i] == "2"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA"; 
									 NumeroDestino+=2+",";
								  }else{
		                            NombreDestino="FLA";
									NumeroDestino=2+","; 	
                                   }
						   }
						   if(destinos[i] == "3"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"EUR"; 
									 NumeroDestino+=3+",";
								  }else{
		                            NombreDestino="EUR";
									NumeroDestino=3+","; 	
                                   }
						   }
						   if(destinos[i] == "4"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"MEX";
									 NumeroDestino+=4+","; 
								  }else{
		                            NombreDestino="MEX";
									NumeroDestino=4+","; 	
                                   }
						   }
						   if(destinos[i] =="5"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA-CUN";
									 NumeroDestino+=5+","; 
								  }else{
		                            NombreDestino="FLA-CUN"; 
									NumeroDestino=5+","; 	
                                   }
						   }
						   if(destinos[i] == "6"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA-MQT";
									 NumeroDestino+=6+",";  
								  }else{
		                            NombreDestino="FLA-MQT";
									NumeroDestino=6+",";  	
                                   }
						   }
						   if(destinos[i] == "7"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"SURA-VER";
									 NumeroDestino+=7+","; 
								  }else{
		                            NombreDestino="SURA-VER"; 
									NumeroDestino=7+","; 	
                                   }
						   }
						   if(destinos[i] == "8"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"CXC"; 
									 NumeroDestino+=8+","; 
								  }else{
		                            NombreDestino="CXC";
									NumeroDestino=8+",";  	
                                   }
						   }
						   if(destinos[i] == "9"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"PTY"; 
									 NumeroDestino+=9+","; 
								  }else{
		                            NombreDestino="PTY"; 	
									NumeroDestino=9+","; 
                                   }
						   }
						   if(destinos[i] == "10"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"FLA-NY"; 
									 NumeroDestino+=10+","; 
								  }else{
		                            NombreDestino="FLA-NY"; 
									NumeroDestino=10+","; 	
                                   }
						   }
						   if(destinos[i] == "11"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"NY-CUN"; 
									 NumeroDestino+=11+","; 
								  }else{
		                            NombreDestino="NY-CUN"; 
									NumeroDestino=11+","; 	
                                   }
						   }
						   if(destinos[i] == "12"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"SURA-COMB-PER";
									 NumeroDestino+=12+",";  
								  }else{
		                            NombreDestino="SURA-COMB-PER";
									NumeroDestino=12+","; 
                                   }
						   }
						   if(destinos[i] == "13"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"HW"; 
									 NumeroDestino+=13+","; 
								  }else{
		                            NombreDestino="HW"; 
									NumeroDestino=13+","; 	
                                   }
						   }
						   if(destinos[i] =="14"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"EUR2"; 
									 NumeroDestino+=14+","; 
								  }else{
		                            NombreDestino="EUR2"; 
									NumeroDestino=14+","; 	
                                   }
						    }
						    if(destinos[i] =="15"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"ORM"; 
									 NumeroDestino+=15+","; 
								  }else{
		                            NombreDestino="ORM"; 
									NumeroDestino=15+","; 	
                                   }
						    }
						    if(destinos[i] =="16"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"MIA_MCO"; 
									 NumeroDestino+=16+","; 
								  }else{
		                            NombreDestino="MIA_MCO"; 
									NumeroDestino=16+","; 	
                                   }
						    }
						    if(destinos[i] =="17"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"NY9"; 
									 NumeroDestino+=17+","; 
								  }else{
		                            NombreDestino="NY9"; 
									NumeroDestino=17+","; 	
                                   }
						    }
						    if(destinos[i] =="18"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"NYC_MIA"; 
									 NumeroDestino+=18+","; 
								  }else{
		                            NombreDestino="NYC_MIA"; 
									NumeroDestino=18+","; 	
                                   }
						    }
						    if(destinos[i] =="19"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"DUBAI"; 
									 NumeroDestino+=19+","; 
								  }else{
		                            NombreDestino="DUBAI"; 
									NumeroDestino=19+","; 	
                                   }
						    }
						    if(destinos[i] =="20"){
						   if (NombreDestino){
		                             NombreDestino+='|'+"CUN6"; 
									 NumeroDestino+=20+","; 
								  }else{
		                            NombreDestino="CUN6"; 
									NumeroDestino=20+","; 	
                                   }
						    }
	   }
	   return '<font style="color:#656565; font-size:0.7em">'+NombreDestino+'</font>';
		
   }
   
        //Funcion para setear el año de salida
   //Entrada: El año
   //Salida: el número con el año de salida de destino
   function poneSalida(salida, rowIndex){
	   return '<font style="color:#656565; font-size:0.9em">'+salida+'</font>';
		
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
           var agenteNombre;
           window.parent.UsuariosAlmacen.query({id:agente}).forEach(function(des){

		                        agenteNombre=des.nombre;
                       })
	   
		   return '<font style="color:#656565; font-size:0.9em">'+agenteNombre+'</font>';
   }
    //Funcion para poner la fecha de acuerdo a lo establecido
   //Entrada: La fecha y el index de la fila
   //Salida: Las fecha seteada con el estilo solicitado
   function setFecha(fechaingreso, rowIndex){
	
		/*var displayPattern = 'd-MMM-yyyy';
		 var d = dojo.date.stamp.fromISOString(fechaingreso);
		 fechatotal=dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});*/
	  
	  return '<font style="color:#656565; font-size:0.9em">'+fechaingreso+'</font>';
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
   } else if(entry == "blue"){

      return '<div align="center" style="width:16px; height:16px; background-color:#7BB0D6; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
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
	 var displayPattern = 'd-MMM-yyyy';
						var d = dojo.date.stamp.fromISOString(entry);
		                 entry = dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});
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
		query:{agente:window.parent.nombreuseract.toUpperCase(), estado:document.getElementById('estado').value},
        store: window.parent.seguimientoStore,
		clientSort: true,
		onRowClick: function(e) {	
		             
					  id=grid._getItemAttr(e.rowIndex, 'id');
					  setTimeout(function(){window.parent.crearseguimiento(id);}, 500);
					  grid.selection.deselectAll(); 
					  grid.selection.setSelected(e.rowIndex, true);
					
					 
        },
		//onStyleRow: myStyleRow,
        structure:[
	                    {name:"  ", field:"Color", formatter: poneFont, width:"2.5em"},
						{name:"#", field:"numId", width:"10%", width:"2.5em", formatter:setId},
						{name:"Ingreso", field:"fechaingreso", width:"6.5em",formatter:setFecha},
						{name:"Medio", field:"agencia",formatter: poneAgencia, width:"15em"},
						{name:"Vendedor", field:"agente", width:"15em", formatter:setVendedor},
						{name:"Quincea&ntilde;era", field:"nombrequinceanera", width:"15em", formatter:cuadraNombre},
	                    {name:"Contacto", field:"nombrequienllama", width:"15em",formatter:setContacto},
						{name:"Ciudad", field:"nombreciudad", width:"7.5em", formatter:poneCiudad},
						{name:"Estado", field:"estado", width:"5.5em",formatter: poneEstado},
						{name:"Destino", field:"destino", width:"15em",formatter: poneDestino},
					    {name:"Mes", field:"mesviaje_quinceanera", width:"2em",formatter: poneMes},
						{name:"Año", field:"anoviaje_quinceanera", width:"3em",formatter: poneSalida},
						{name:"Colegio", field:"colegio", width:"15em",formatter: poneSalida},
						{name:"Fase", field:"fase", width:"5.5em",formatter: poneFase},
						{name:"Interés", field:"interes",width:"5.5em",formatter: poneInteres},
						//{name:"Ultimo Contacto", field:"ultimo_contacto", width:"15em",formatter: poneFecha}
						
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
	tamano=window.parent.tama-180;
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
    medio=new dijit.form.FilteringSelect({
            id: "idagencia",
			name: 'data[Agencia][Agencia]',
			placeHolder: "Medio",
			require:false,
            store: new Memory({data:window.parent.agencia}),
            autoComplete: true,
            style: "width: 220px;color:#F00;backgorund-color:#ECE3F9;font-family:Verdana, Geneva, sans-serif;",
			onChange: function(departamento){
				var filterObject = {};
				filterObject.agenciaNombre  = this.item.name;
				filterObject.estado=document.getElementById('estado').value
				document.getElementById('rompeQuery').style.display='';
				grid.filter({agenciaNombre:this.item.name.toUpperCase(), estado:document.getElementById('estado').value},true); 
            },
			searchAttr: "name"
        }, "AgenciaAgencia");
		  //Con esta funcion se setea el filtering select de destino
    destino=new dijit.form.FilteringSelect({
            id: "iddestino",
			name: 'data[Destino][Destino]',
			placeHolder: "Destino",
			require:false,
            store: new Memory({data:window.parent.destino}),
            autoComplete: true,
            style: "width: 220px;color:#F00;backgorund-color:#ECE3F9;font-family:Verdana, Geneva, sans-serif;",
			onChange: function(departamento){
				var filterObject = {};
				filterObject.destino = "*"+this.item.id+"*";
				filterObject.estado=document.getElementById('estado').value;
				document.getElementById('rompeQuery').style.display='';
				grid.filter({destino:"*"+this.item.id+"*", estado:document.getElementById('estado').value},true);
				 /*switch(this.item.id){
						  case "1":
						   grid.filter({destino:"*CUR_AUA*", estado:document.getElementById('estado').value},true);
						  break;
						  case "2":
						   grid.filter({destino:"*FLA*", estado:document.getElementById('estado').value},true);
						  break;
						  case "3":
						   grid.filter({destino:"*EUR*", estado:document.getElementById('estado').value},true);
						  break;
						  case "4":
						   grid.filter({destino:"*MEX*", estado:document.getElementById('estado').value},true);
						  break;
						  case "5":
						   grid.filter({destino:"*FLA_CUN*", estado:document.getElementById('estado').value},true);
						  break;
						  case "6":
						   grid.filter({destino:"*FLA_MQT*", estado:document.getElementById('estado').value},true);
						  break;
						  case "7":
						   grid.filter({destino:"*SURA_VER*", estado:document.getElementById('estado').value},true);
						  break;
						  case "8":
						   grid.filter({destino:"*CXC*", estado:document.getElementById('estado').value},true);
						  break;
						  case "9":
						   grid.filter({destino:"*PTY*", estado:document.getElementById('estado').value},true);
						  break;
						  case "10":
						   grid.filter({destino:"*FLA_NY*", estado:document.getElementById('estado').value},true);
						  break;
						  case "11":
						   grid.filter({destino:"*NY_CUN*", estado:document.getElementById('estado').value},true);
						  break;
						  case "12":
						   grid.filter({destino:"*SURA_COMB_PER*", estado:document.getElementById('estado').value},true);
						  break;
						  case "13":
						   grid.filter({destino:"*HW*", estado:document.getElementById('estado').value},true);
						  break;
                          case "14":
						   grid.filter({destino:"*EUR2*", estado:document.getElementById('estado').value},true);
						  break;
				   }; */
            },
			searchAttr: "name"
        }, "destinoSeguimiento");
		
    //Con esta funcion se setea la funcion de vendedor
    vendedor=new dijit.form.FilteringSelect({
            id: "idusers",
			name: 'data[Seguimientos][User]',
			require:false,
			placeHolder: "Vendedor",
            store: new Memory({data:window.parent.todos}),
            autoComplete: true,
            style: "width: 220px;color:#F00;backgorund-color:#ECE3F9;font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agente){
				document.getElementById('rompeQuery').style.display='';
                grid.filter({agente:this.item.id, estado:document.getElementById('estado').value},true); 
            },
			searchAttr: "nombre"
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
				grid.filter({id:'*'+nombre.toUpperCase()+"*"},true); 
			}
		} 
		else{
			nombre=nombre.toUpperCase();
			if(document.getElementById('nombrenina').value==''){
			grid.filter({nombrequinceanera:"*", estado:document.getElementById('estado').value},true);
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
				nombre=nombre;
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
	grid.filter({id:'*', estado:document.getElementById('estado').value},true);
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
    	console.log(id);
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
			        seguimientoactualizar=window.parent.seguimientoAlmacen.get(id);
					seguimientoactualizar.transferencia="0";
					seguimientoactualizar.vinculacion="0";
					seguimientoactualizar.tracker="0";
					seguimientoactualizar.bitacora="0";
					window.parent.seguimientoAlmacen.put(seguimientoactualizar);
	                window.parent.segumiento=window.parent.seguimientoAlmacen.data;
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
	  
	
	window.parent.seguimientoAlmacen.query({nombreAgente:nombreuser},{sort: [{attribute: "fechaingreso", descending: true}]}).forEach(function(shoe){    
	
	
	
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
	   if((shoe.transferencia==1) || (shoe.vinculacion==1) || (shoe.bitacora==1)){ 
		   var id=shoe.id;
		   interna+='<div style="width:95%; background-color:#DDDDDD; border:solid 1px;#888888;position:relative;-moz-border-radius: 5px;border-radius: 5px; font-family:Verdana, Geneva, sans-serif; font-size:12px; margin-bottom:5px;"><div style="width:100%; height:21px;color:#444444; text-align:left" ><div style="float:left; width:49%">Seguimiento:<strong>'+shoe.id+'</strong></div><div style="float:right;width:49%; text-align:right"><img src="imgs/cerrar.png" border="0" onclick="borraNotificacion('+id+');" onMouseOver="document.body.style.cursor = \'pointer\';" onMouseOut="document.body.style.cursor = \'default\';"/></div></div><div style="width:100%; color:#A66BD6;font-size:12px; text-align:left; padding-left:0.5em; ">'+shoe.nombrequinceanera+'</div><div onClick="filtraSeguimiento('+id+');" onMouseOver="document.body.style.cursor = \'pointer\';" onMouseOut="document.body.style.cursor = \'default\';"><div style="width:100%; color:#A66BD6;font-size:12px; text-align:center"><ul style="margin-left:-10px">';
		    /*if(shoe.tracker!=0){
				if(actualMayorIngreso){
				 interna+='* Cliente no ha revisado correo.<br/>'+shoe.tracker; 
				}
			 }*/
			 var id =shoe.id;
			 var nombre = "";
			 //@Daniel: Se corre riesgo de todas la bitacoras por cada seguimiento
			 window.parent.bitacoraAlmacen.query({idseguimiento:id}).forEach(function(bita){
	
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
function filtraestado(){
	document.getElementById('rompeQuery').style.display='';
	estado=document.getElementById('estado').value;
	grid.filter({estado:estado},true);
}
//Esta funciones son para el control de los hilos con el div hermano, en este caso esta activo para refrescar información
window.parent.grabar=0;
carga=window.parent.grabar;

if(carga==0){
window.parent.cargaDatos();
}
//Esta funciones son para el control de los hilos con el div hermano, en este caso esta activo para refrescar información//Funcion para mostrar todos los registros del grid
//Entrada: ninguna
//Salida: el arranque del grid el inicio filtrar por pendientes del agente actual
function iniciaGrid(){
	cargaTodos();
	 
	var filterObject = {};
				filterObject.nombreAgente = window.parent.nombreuseract.toUpperCase();
				filterObject.estado=document.getElementById('estado').value;
				document.getElementById('rompeQuery').style.display='';
				
	grid.filter(filterObject,true);
}

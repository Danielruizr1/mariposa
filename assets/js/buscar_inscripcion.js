angular.module('search', [])
	.controller('searchController', function($scope){
		var controller = this;

		this.estado = 1;

		this.inscripciones = window.parent.inscripcion;
		this.bitacoras = window.parent.bitacora2;

		this.filtered;
		controller.filteredBitas = [];

		this.searchBitacora = function(){
			controller.filteredBitas = controller.bitacoras.filter(controller.bitaFilter);

			

		};

		this.new = function(){
			controller.find = '';
			controller.filtered = [];
			removeGrid();


		};

		this.buscar = function(){
			controller.filteredBitas.forEach(function(elem, index, arr){
				arr[index]  = elem.idseguimiento;

			});
			controller.filtered = controller.inscripciones.filter(controller.segFilter);
			cargagrilla({0:controller.filtered});

		};

		this.segFilter = function(value){
			if(controller.filteredBitas.length == 0) return false;

        	return controller.filteredBitas.includes(value.id);
        	

		};
		this.bitaFilter = function(value){
			if(!controller.find) return false;

        	if (typeof value.ingreso === 'string') return value.ingreso.toLowerCase().includes(controller.find.toLowerCase());

        	return value.ingreso == controller.search;

		};


	

});



















/*-------------Inicializa el objeto filereader y el grid-------*/
//Libreria que maneja las funciones del Datagrid
dojo.require("dojox.grid.EnhancedGrid");
//Libreria que maneja el objeto ItemFileReadStore, como una forma de manejar los Data Objects
dojo.require("dojo.data.ItemFileReadStore");
//Libreria que maneja las funciones de memoria y cache de browser
dojo.require("dojo.store.Memory");
//Libreria que maneja los obtejos de datos por Dojo
dojo.require("dojo.data.ObjectStore");
//Libreria que maneja el plugin de exportar a CSV de Dojo
dojo.require("dojox.grid.enhanced.plugins.exporter.CSVWriter");
dojo.require("dojo.data.ItemFileWriteStore");
dojo.require("dojo.io.iframe");
    "dojo/store/Memory", "dijit/form/ComboBox", "dojo/domReady!"
//Variable que contiene los seguimientos
var seg=window.parent.seguimiento;
//Objeto parcial de datos para busqueda
var storeData ={items: seg};
/*-----------Instancia para el query------*/
var queryObj={};
var queryObj2={};
/*-------------Ingreso del textbox con busqueda ------*/
  var agencias = window.parent.agencia;
  var medios=  window.parent.medio;
  var destinos=  window.parent.destino;
  var departamentos=window.parent.departamento;
  var ciudades=window.parent.ciudad;
  var usuarios=window.parent.todos;
  var grid;
  $(".dropdown").hide();
  if (window.parent.rolusuarioactivo == "admin"){
	   $(".dropdown").show();
	  }
require([
    "dojo/ready", "dojo/store/Memory",
    "dijit/form/ComboBox", "dojo/domReady!", "dijit/form/ValidationTextBox",  "dijit/form/FilteringSelect"
], function(ready, Memory, ComboBox, ValidationTextBox, FilteringSelect){

    ready(function(){
		//@Daniel: Comoboboxes que se encargan de las busquedas
var mesStore = new Memory({
        data: [
            {name:"JUNIO"},
            {name:"DICIEMBRE"}
        ]
    });
	
	var interesStore = new Memory({
        data: [
            {name:"MUY INTERESADO"},
            {name:"MEDIANAMENTE INTERESADO"},
			{name:"POCO INTERES O ABANDONADO"}
        ]
    });
	var faseStore = new Memory({
        data: [
            {name:" "},
            {name:"SI"},
		    {name:"NO"},							
        ]
    });
		var pagosStore = new Memory({
        data: [
            {name:" "},
            {name:"PENDIENTE"},
		    {name:"PAGO"},							
        ]
    });
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

		new dijit.form.ComboBox({
            id: "ciudad",
			placeHolder: "SELECCIONE El ASESOR",
            store: new Memory({data:usuarios}),
            autoComplete: true,
            style: "width: 250px;",
			onChange: function(agencia){
                 queryObj.asesor=this.item.id;
            },
			searchAttr: "nombre"
        }, "ciudad");

		new dijit.form.ComboBox({
            id: "transfiere",
			name: 'transfiere',
			placeHolder: "SELECCIONE EL VENDEDOR",
			invalidMessage:'Usuario Invalido!',
            store: new Memory({data:usuarios}),
            autoComplete: true,
            style: "width: 260px ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
                 queryObj.agente=this.item.id;
            },
			searchAttr: "nombre"
        }, "transfiere");
		// @Daniel: El filtro destino se manejara por excel
		new dijit.form.ComboBox({
            id: "destinoInput",
			name: 'destinoInput',
			placeHolder: "SELECCIONE EL DESTINO",
            store: new Memory({data:destinos}),
            autoComplete: true,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
				 switch(dijit.byId("destinoInput").get('value')){
				 case "CURAZAO & ARUBA":
				  queryObj.numeroDestino= "1";
				  break;
				 case "FLORIDA":
				 queryObj.numeroDestino="2";
				 break;
				 case "EUROPA":
				 queryObj.numeroDestino= "3";
				 break;
				 case "CANCUN - RIVIERA MAYA & DF":
				 queryObj.numeroDestino="4";
				 break;
				 case "FLORIDA & CANCUN":
				 queryObj.numeroDestino="5";
				 break;
				 case "FLORIDA - CHICAGO & MARQUETTE":
				 queryObj.nombredestion="6";
				 break;
				 case "SURAMERICA VERANO":
				 queryObj.numeroDestino="7";
				 break;
				 case "CRUCERO POR EL CARIBE":
				 queryObj.numeroDestino="8";
				 break;
				 case "PANAMA":
				 queryObj.numeroDestino="9";
				 break;
				 case "FLORIDA & NEW YORK":
				 queryObj.numeroDestino="10";
				 break;
				 case "NEW YORK & CANCUN":
				 queryObj.numeroDestino="11";
				 break;
				 case "SURAMERICA COMBINACION PERFECTA":
				 queryObj.numeroDestino="12";
				 break;
				 case "HAWAII":
				 queryObj.numeroDestino="13";
				 break;
				 case "CRUCERO ISLAS GRIEGAS & EUROPA":
				 queryObj.numeroDestino="14";
				 break;
				 case "MIAMI & ORLANDO":
				 queryObj.numeroDestino="15";
				 break;
				 case "DUBAI - CRUCERO ISLAS GRIEGAS & EUROPA":
				 queryObj.numeroDestino="19";
				 break;
				 }
				 
            },
			searchAttr: "name"
        }, "destinoInput");
		
			new dijit.form.ComboBox({
            id: "AgenciaAgencia",
			name: 'AgenciaAgencia',
			placeHolder: " ",
			invalidMessage:'Usuario Invalido!',
            store: faseStore,
            autoComplete: true,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
               doc = dijit.byId("AgenciaAgencia").get('value');
			   switch(doc){
               case "SI":
               queryObj2.aprovado=1;	
               break;
               case "NO":
               queryObj2.aprovado=0;	
               break;
                }
            },
			searchAttr: "name"
        }, "AgenciaAgencia");
		
		    new dijit.form.ComboBox({
            id: "mes",
			name: 'mes',
			placeHolder: "MES",
            store: mesStore,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
                 queryObj.mesViajeQuin=dijit.byId("mes").get('value');				 
            },
			searchAttr: "name"
        }, "mes");
		
			new dijit.form.ComboBox({
            id: "year",
			name: 'year',
			placeHolder: "AÑO",
			store: yearStore,
            autoComplete: true,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
                 queryObj.anoviaje_quinceanera=dijit.byId("year").get('value');
            },
			searchAttr: "name"
        }, "year");
		
		new dijit.form.ComboBox({
            id: "fase",
			name: 'fase',
			placeHolder: " ",
            store: faseStore,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
                 queryObj.tieneVisa=dijit.byId("fase").get('value').toLowerCase();				 
            },
			searchAttr: "name"
        }, "fase");
		
		new dijit.form.ComboBox({
            id: "interes",
			name: 'interes',
			placeHolder: " ",
            store: faseStore,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
			   doc = dijit.byId("interes").get('value');
			   switch(doc){
               case "SI":
               queryObj2.recibido=1;	
               break;
               case "NO":
               queryObj2.recibido=0;	
               break;
                }			 
            },
			searchAttr: "name"
        }, "interes");
		
		new dijit.form.ComboBox({
            id: "pagos",
			name: 'pagos',
			placeHolder: " ",
            store: pagosStore,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
			   doc = dijit.byId("pagos").get('value');
			   switch(doc){
               case "PENDIENTE":
               queryObj.pendiente=1;	
               break;
               case "PAGO":
               queryObj.pendiente=0;	
               break;
                }			 
            },
			searchAttr: "name"
        }, "pagos");

    });
});   
$(document).ready(function(a){
	$('#estado').on('change', function(e){
	    queryObj.estado= $(this).val();
	});
});
/*******Termina FilteringSelect*******************/
/*---------------Ejecuta el fetch----------*/
//Entrada:Ninguna
//Salida: BUsqueda a apritr del query y de los campos que se han seteado
//@Daniel: La busqueda borra el grid viejo y crea uno nuevo
function buscar(){
	var widgets = dijit.byId('divGrid');
	if(widgets){
     widgets.destroyRecursive(true);
	}	
	datos = new Array();
	var datos2 = new Array();
	
	if(Object.keys(queryObj2).length > 0){
	window.parent.InscripdocumentosAlmacen.query(queryObj2).forEach(function(des){
		if(queryObj.id != des.inscripcion_id){
		queryObj.id = des.inscripcion_id;
		var data = window.parent.inscripcionAlmacen.query(queryObj);
		if(data[0]){
		datos2.push(data[0]);
	    }
		

		}
	});
	datos.push(datos2);
   } else {
   	datos.push(window.parent.inscripcionAlmacen.query(queryObj));
   }
	cargagrilla(datos);
	
}
//Funcion para cargar datos en el grid despues de la busqueda
//Entrada: Objeto de datos filtrados por la busqueda
//Salida: Grid con datos cargados 
function cargagrilla(entrada){
	var grid;
	dojo.ready(function(){		
	    BusquedaAlmacen = new dojo.store.Memory({data: entrada[0]});
		BusquedaStore=dojo.data.ObjectStore({objectStore: BusquedaAlmacen});
   function poneFont(entry, rowIndex){
      return '<font style="color:#656565; font-size:0.9em">'+entry+'</font>';	
   }
function poneFont2(entry, rowIndex){
	if(entry){
		if(entry == "MUY INTERESADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:green; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
	} else if(entry == "INTERESADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:yellow; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
	} else if(entry == "POCO INTERES O ABANDONADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:red; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
   } 
  }
  return '<span id="seguimiento"> </span>';
 }
	   
   
grid = new dojox.grid.EnhancedGrid({
					store:BusquedaStore,
					style: "height:280px",
					structure: [
					    {name:"#", field:"id", width:"10%", width:"2.5em"},
					     {name:"ESTADO DE VIAJE", field:"estado", width:"15em", formatter: poneFont},
					    {name:"QUINCEA&Ntilde;ERA", field:"nombrequinceanera", width:"15em", formatter: poneFont},
						{name:"VENDEDOR", field:"nombreAgente", width:"15em", formatter: poneFont},
						{name:"CIUDAD", field:"nombreciudad", width:"7.5em", formatter: poneFont},
						{name:"MEDIO", field:"agenciaNombre", width:"15em", formatter: poneFont},
						{name:"NOMBRE DEL PADRE", field:"nombre_padre", width:"15em", formatter: poneFont},
						{name:"CORREO PADRE", field:"mail_padre", width:"15em", formatter: poneFont},
						{name:"OFICINA PADRE", field:"telefonooficina_padre", width:"5.5em", formatter: poneFont},
						{name:"CEL PADRE", field:"celular_padre", width:"5.5em", formatter: poneFont},
						{name:"NOMBRE DE LA MADRE", field:"nombre_madre", width:"15em", formatter: poneFont},
						{name:"CORREO MADRE", field:"mail_madre",width:"15em", formatter: poneFont},
						{name:"OFICINA MADRE", field:"telefonooficina_madre", width:"7.5em", formatter: poneFont},
						{name:"CEL MADRE", field:"celular_madre", width:"7.5em", formatter: poneFont},
						{name:"NOMBRE PERSONA QUIEN LLAMO", field:"nombrequienllama",width:"15em", formatter: poneFont},
						{name:"TELEFONO", field:"telefono1", width:"7.5em", formatter: poneFont},
						{name:"CORREO", field:"email",  width:"15em", formatter: poneFont},
						{name:"CORREO QUINCEA&Ntilde;ERA", field:"mail_quinceanera", width:"15em", formatter: poneFont},
						{name:"AÑO", field:"anoviaje_quinceanera",  width:"2em", formatter: poneFont},
						{name:"MES", field:"mesViajeQuin",  width:"2em", formatter: poneFont},
						{name:"DESTINO", field:"destino", width:"15em", formatter: poneFont},
						{name:"TELEFONO", field:"telefono2",width:"5.5em", formatter: poneFont},
						{name:"TELEFONO", field:"telefono3", width:"5.5em", formatter: poneFont},
						{name:"CELULAR", field:"celular", width:"5.5em", formatter: poneFont},
						{name:"FAX", field:"fax",width:"5.5em", formatter: poneFont},
						{name:"DIRECCION", field:"direccion", width:"15em", formatter: poneFont},
						{name:"PARENTESCO", field:"nombreParentesco", width:"7.5em", formatter: poneFont},
						{name:"TEL QUINCEA&Ntilde;ERA", field:"telefono_quinceanera", width:"7.5em", formatter: poneFont},
						{name:"CEL QUINCEA&Ntilde;ERA", field:"celular_quinceanera", width:"7.5em", formatter: poneFont},
						{name:"COLEGIO", field:"colegio", width:"7.5em", formatter: poneFont},
						{name:"VISA", field:"tieneVisa", width: "300px", formatter: poneFont},
						{name:"VISAAPROBADA", field:"visaAprobada", width: "7.5em", formatter: poneFont},
						{name:"FECHACITA", field:"visaCita", width: "7.5em", formatter: poneFont},
						{name:"NACIMIENTO", field:"fechaNacimiento", width: "7.5em", formatter: poneFont},
						{name:"PASAPORTE", field:"serialPasaporte", width: "7.5em", formatter: poneFont},
						{name:"VENCIMIENTOPASS", field:"pasVencimiento", width: "7.5em", formatter: poneFont},
					],
					plugins: { 
                     exporter: true
                    },
					onRowClick: function(e) {	
					  id=grid._getItemAttr(e.rowIndex, 'id');
					  location.replace('agregar_Seguimiento.php?id='+id);
                    }
				}, "divGrid");
				grid.startup();
				dojo.connect(grid, "onRowClick", function(e) {
                      id=grid._getItemAttr(e.rowIndex, 'id');
					  whatIs = "Ins";
					  window.parent.crearinscripcion(id, whatIs);
					  grid.selection.deselectAll(); 
					  grid.selection.setSelected(e.rowIndex, true);
              });
				var t=setTimeout(function(){
               dojo.query('.displayRowCount')[0].innerHTML = grid.rowCount;
                       }
                         ,500);
       
 			});
}
/*---------------Termina el grid-----------*/
//Funcion para exportar por csv.
//Entrada: Ninguna
//Salida: CSV en el div
function exportExcel(){
		dijit.byId("divGrid").exportGrid("csv", {
				  writerArgs: { 
                  separator: "," 
                              } 
			}, function(str){
				    dojo.io.iframe.send({ 
                                url: "CSVexport.php", 
								method: "POST", 
                                content: {exp: str}, 
                                timeout: 15000 
                        }); 
						                
				})
}
//@Daniel: Se elimina el grid, queryObj y  reset comboboxes 
function removeGrid(){
	var widgets = dijit.byId("divGrid");
	if(widgets){
	
     widgets.destroyRecursive(true);
	}	
    dijit.byId("ciudad").reset();
	dijit.byId("fase").reset();
	dijit.byId("interes").reset();
    dijit.byId("AgenciaAgencia").reset();
    dijit.byId("transfiere").reset();
    dijit.byId("mes").reset();
    dijit.byId("year").reset();
    dijit.byId("interes").reset();
    dijit.byId("pagos").reset();
    dijit.byId("fase").reset();
    dojo.query('.displayRowCount')[0].innerHTML = 0;

    queryObj={};
    queryObj2={};

}

function enviarCorreo(x) {
	datos = new Array();
	window.parent.InscripdocumentosAlmacen.query(queryObj2).forEach(function(des){
		if(queryObj.id != des.inscripcion_id){
		queryObj.id = des.inscripcion_id;
		datos.push(window.parent.inscripcionAlmacen.query(queryObj));
		}
	});
	datosCorreo = new Array();
	BusquedaAlmacen = new dojo.store.Memory({data: datos[0]});
	BusquedaAlmacen.query().forEach(function(des){ 
           datosCorreo.push(des.id);
	});
   require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/"+x+"?ids="+datosCorreo,

           load: function(result) {
           }

        });
      });	
      removeGrid();

}
$(document).ready(function() {
  $("#adminDrop").hide();
  if (window.parent.rolusuarioactivo == "admin"){
	   $(".dropdown").show();
	  }
});
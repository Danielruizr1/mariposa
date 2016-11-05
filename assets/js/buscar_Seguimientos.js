angular.module('search', [])
	.controller('searchController', function($scope){
		var controller = this;

		this.estado = 1;

		this.seguimientos = window.parent.seguimiento;
		this.bitacoras = window.parent.bitacora;

		this.filtered;
		controller.filteredBitas = [];

		this.searchBitacora = function(){
			controller.filteredBitas = controller.bitacoras.filter(controller.bitaFilter);

			console.log(controller.filteredBitas);

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
			controller.filtered = controller.seguimientos.filter(controller.segFilter);
			cargagrilla(controller.filtered);

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
/*-------------Ingreso del textbox con busqueda ------*/
  var agencias = window.parent.agencia;
  var medios=  window.parent.medio;
  var destinos=  window.parent.destino;
  var departamentos=window.parent.departamento;
  var ciudades=window.parent.ciudad;
  var usuarios=window.parent.todos;
  var grid;
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
            {name:"1.INICIO"},
            {name:"2.DEJE MENSAJE TELEFONICO"},
		    {name:"3.VOLVER A LLAMAR"},
            {name:"4.POSPONEN EN VIAJE"},
	        {name:"5.ENVIÉ DATOS Y DOCUMENTOS DE INSCRIPCIÓN"},
            {name:"6.VISITÉ A CLIENTE"},	
            {name:"7.CONCRETÉ CITA EN LA OFICINA"},
            {name:"8.LES ATENDÍ EN LA OFICINA"},
			{name:"9.ENVIÉ REVISTA"},
			{name:"10.FIN"},
							
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
			{name:"2020"},
			{name:"2021"},
			{name:"2022"},
			{name:"2023"},
			{name:"2024"},
			{name:"2025"},
			{name:"2026"},
			{name:"2027"},
			{name:"2028"},
			{name:"2029"},
			{name:"2030"}
        ]
    });

		new dijit.form.ComboBox({
            id: "ciudad",
			placeHolder: "SELECCIONE LA CIUDAD",
            store: new Memory({data:ciudades}),
            autoComplete: true,
            style: "width: 250px;",
			onChange: function(agencia){
				console.log(dijit.byId("ciudad").get('value'));
                 queryObj.nombreciudad=dijit.byId("ciudad").get('value');
            },
			searchAttr: "name"
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
				 console.log(this.item.id);
                 queryObj.nombreAgente=this.item.nombre;
            },
			searchAttr: "nombre"
        }, "transfiere");
		// @Daniel: El filtro destino se manejara por excel
		/*new dijit.form.ComboBox({
            id: "destinoInput",
			name: 'destinoInput',
			placeHolder: "SELECCIONE EL DESTINO",
            store: new Memory({data:destinos}),
            autoComplete: true,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
				 switch(dijit.byId("destinoInput").get('value')){
				 case "CURAZAO & ARUBA":
				  queryObj.nombredestino= "*CUR-AUA*";
				  break;
				 case "FLORIDA":
				 queryObj.nombredestino="FLA";
				 break;
				 case "EUROPA":
				 queryObj.nombredestino= "EUR";
				 console.log(queryObj.nombredestino);
				 break;
				 case "CANCUN - RIVIERA MAYA & DF":
				 queryObj.nombredestino="MEX";
				 break;
				 case "FLORIDA & CANCUN":
				 queryObj.nombredestino="FLA-CUN";
				 break;
				 case "FLORIDA - CHICAGO & MARQUETTE":
				 queryObj.nombredestion="FLA-MQT";
				 break;
				 case "SURAMERICA VERANO":
				 queryObj.nombredestino="SURA-VER";
				 break;
				 case "CRUCERO POR EL CARIBE":
				 queryObj.nombredestino="CXC";
				 break;
				 case "PANAMA":
				 queryObj.nombredestino="PTY";
				 break;
				 case "FLORIDA & NEW YORK":
				 queryObj.nombredestino="FLA-NY";
				 break;
				 case "NEW YORK & CANCUN":
				 queryObj.nombredestino="NY-CUN";
				 break;
				 case "SURAMERICA COMBINACION PERFECTA":
				 queryObj.nombredestino="SURA-COMB-PER";
				 break;
				 case "HAWAII":
				 queryObj.nombredestino="HW";
				 break;
				 }
            },
			searchAttr: "name"
        }, "destinoInput");*/
		
			new dijit.form.ComboBox({
            id: "AgenciaAgencia",
			name: 'AgenciaAgencia',
			placeHolder: "SELECCIONE EL MEDIO",
			invalidMessage:'Usuario Invalido!',
            store:new Memory({data:agencias}),
            autoComplete: true,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
                queryObj.agenciaNombre=dijit.byId("AgenciaAgencia").get('value');
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
			placeHolder: "FASE",
            store: faseStore,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
                 queryObj.nombreFase=dijit.byId("fase").get('value');				 
            },
			searchAttr: "name"
        }, "fase");
		
		new dijit.form.ComboBox({
            id: "interes",
			name: 'interes',
			placeHolder: "INTERES",
            store: interesStore,
            style: "width: 15em ; color:#9148EA;  font-family:Verdana, Geneva, sans-serif;",
			onChange: function(agencia){
                 queryObj.Color=dijit.byId("interes").get('value');				 
            },
			searchAttr: "name"
        }, "interes");

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
	queryObj.estado = document.getElementById('estado').value;
	datos=window.parent.seguimientoAlmacen.query(queryObj);
	cargagrilla(datos);
	
}
//Funcion para cargar datos en el grid despues de la busqueda
//Entrada: Objeto de datos filtrados por la busqueda
//Salida: Grid con datos cargados 
function cargagrilla(entrada){
	var grid;
	dojo.ready(function(){		
	    BusquedaAlmacen = new dojo.store.Memory({data: entrada});
		BusquedaStore=dojo.data.ObjectStore({objectStore: BusquedaAlmacen});
   function poneFont(entry, rowIndex){
      return '<font style="color:#656565; font-size:0.9em">'+entry+'</font>';	
   }
function poneFont2(entry, rowIndex){
	if(entry){
		if(entry == "MUY INTERESADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:green; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
	} else if(entry == "MEDIANAMENTE INTERESADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:yellow; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
	} else if(entry == "POCO INTERES O ABANDONADO"){
	  return '<div align="center" style="width:16px; height:16px; background-color:red; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
   } else if(entry == "blue"){

      return '<div align="center" style="width:16px; height:16px; background-color:#7BB0D6; border: 2px solid; border-radius: 10px; margin-left:7px;"></div>';
   } 
  }
  return '<span id="seguimiento"> </span>';
 }
	   
   
grid = new dojox.grid.EnhancedGrid({
					store:BusquedaStore,
					style: "height:280px",
					structure: [
					    {name:"Interes", field:"Color", formatter: poneFont2, width:"3.5em"},
					    {name:"#", field:"id", width:"10%", width:"2.5em"},
					    {name:"QUINCEA&Ntilde;ERA", field:"nombrequinceanera", width:"15em", formatter: poneFont},
						{name:"VENDEDOR", field:"nombreAgente", width:"15em", formatter:poneFont},
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
						{name:"DESTINO", field:"nombreDestino", width:"15em", formatter: poneFont},
						{name:"TELEFONO", field:"telefono2",width:"5.5em", formatter: poneFont},
						{name:"TELEFONO", field:"telefono3", width:"5.5em", formatter: poneFont},
						{name:"CELULAR", field:"celular", width:"5.5em", formatter: poneFont},
						{name:"FAX", field:"fax",width:"5.5em", formatter: poneFont},
						{name:"DIRECCION", field:"direccion", width:"15em", formatter: poneFont},
						{name:"PARENTESCO", field:"nombreParentesco", width:"7.5em", formatter: poneFont},
						{name:"TEL QUINCEA&Ntilde;ERA", field:"telefono_quinceanera", width:"7.5em", formatter: poneFont},
						{name:"CEL QUINCEA&Ntilde;ERA", field:"celular_quinceanera", width:"7.5em", formatter: poneFont},
						{name:"COLEGIO", field:"colegio", width:"7.5em", formatter: poneFont},
						{name:"FASE", field:"nombreFase", width: "300px", formatter: poneFont},
						{name:"MOTIVO DE NO VIAJE", field:"motivo",width:"15em",formatter: poneFont},
						{name:"ULTIMO CONTACTO", field:"ultimo_contacto", width:"7.5em", formatter: poneFont},
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
					  window.parent.crearseguimiento(id);
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
    dojo.query('.displayRowCount')[0].innerHTML = 0;

    queryObj={};

}
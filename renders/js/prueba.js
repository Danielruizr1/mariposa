dojo.require("dojox.grid.DataGrid");
dojo.require("dojo.data.ItemFileWriteStore");

dojo.ready(function(){
  grid = new dojox.grid.DataGrid({
	    id: 'grid',
        store: window.parent.seguimientoStore,
		onRowClick: function(e) {	
					  id=grid._getItemAttr(e.rowIndex, 'id');
					  location.replace('agregar_Seguimiento.php?id='+id);
        },	
		structure: [
		                {name:"NOMBRE QUINCEA&Ntilde;ERA", field:"nombrequinceanera", width: "300px"},
						{name:"AGENTE QUE RECIBIO LA LLAMADA", field:"agente", width: "300px"},
						{name:"NOMBRE DEL PADRE", field:"nombrepadre", width: "300px"},
						{name:"NOMBRE DE LA MADRE", field:"nombremadre", width: "300px"},
						{name:"NOMBRE PERSONA QUIEN LLAMO", field:"nombrequienllama", width: "300px"},
						{name:"CIUDAD", field:"ciudad", width: "300px"},
						{name:"FECHA INGRESO", field:"fechaingreso", width: "300px"}
	  ]}, "datosquin");
	  grid.startup();
});
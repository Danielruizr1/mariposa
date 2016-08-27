!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style.css" media="screen">
		<link rel="stylesheet" href="demo.css" media="screen">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/resources/dojo.css">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/grid/resources/Grid.css">
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/grid/resources/claroGrid.css">
		<!-- load dojo and provide config via data attribute -->
	   <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js" data-dojo-config="async: true, isDebug: true, parseOnLoad: true">
		</script>
		<script>
			var myStore, dataStore, grid;
			require([
				"dojo/store/JsonRest",
				"dojo/store/Memory",
				"dojo/store/Cache",
				"dojox/grid/DataGrid",
				"dojo/data/ObjectStore",
				"dojo/query",
				"dojo/domReady!"
			], function(JsonRest, Memory, Cache, DataGrid, ObjectStore, query){
				myStore = window.parent.seguimiento;
				grid = new DataGrid({
					store: dataStore = ObjectStore({objectStore: myStore}),
					structure: [
						{name:"Id", field:"Id", width: "200px"},
						{name:"Nombre", field:"Nombre", width: "200px"},
						{name:"Apellido", field:"Apellido", width: "200px"},
						{name:"Correo", field:"Correo", width: "200px"},
						{name:"Telefono", field:"Telefono", width: "200px"},
						{name:"Direccion", field:"Direccion", width: "200px"},
						{name:"Estado", field:"Estado", width: "200px"}
					]
				}, "target-node-id"); // make sure you have a target HTML element with this id
				grid.startup();
				query("#save").onclick(function(){
					dataStore.save();
				});
			});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body style="width:980px; height:100%">
<h1>Seguimientos</h1>
		<div hidefocus="hidefocus" role="grid" dojoattachevent="onmouseout:_mouseOut" tabindex="0" aria-multiselectable="true" class="dojoxGrid" id="target-node-id" align="left" widgetid="target-node-id" style="height: 100%; -webkit-user-select: none; " aria-activedescendant="target-node-idHdr1">
	    </div>  
</body>
</html>
<?php 
/*Headers para exportar a excel si se maneja por post*/
 if(isset($_POST['exportar'])){
   header("Content-Type: application/vnd.ms-excel");
     header("Expires: 0");
     header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
     header("content-disposition: attachment;filename=NOMBRE.xls");
 }
?> <!---Buscar Seguimientos----><html lang="en" class="dj_webkit dj_chrome dj_contentbox"><head><meta charset="utf-8"><title>Agregar Seguimiento</title><!-- Carga Dojo y Css para utilizar la libreria Claro --><link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css"><link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/grid/resources/claroGrid.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script><script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js" data-dojo-config="isDebug: true, parseOnLoad: true"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script><!-- Llamada al archivo js externo que controla las funciones de la página principal --><script src="js/final/vendor-cddb5e4d51.js"></script><script>//Llamada a las librerias de Dojo que se encargan 
      dojo.require("dijit.form.ValidationTextBox");
             //  require our web validator
            dojo.require("dojox.validate.web");
      dojo.require("dijit.form.Form");
      dojo.require("dijit.form.Button");</script><style><!-- Override de estilos del grid para vinculaciones, este override se hace de la clase Claro de Dojo -->
    #grid {
      width:100;
      height:40px;
    border:solid 1px #9148EA; 
    overflow:auto;  
    background-color:#FFF;
    float:left;
    font-size:0.9em;
    margin-left:1em;
     }
   .claro .dijitComboBox .dijitDownArrowButton { background-color: #BE1CE1; font-family:Verdana, Geneva, sans-serif; font-size:14px;color:#F00;}
   .claro .dijitComboBox .dijitDownArrowButton .dijitArrowButtonInner { /* The arrow */
   background: url(imgs/flecha.png) no-repeat scroll 0 center;
} 
/* Hover */
.claro .dijitComboBox .dijitDownArrowButtonHover { color:#F4F7FB; background-color:#F4F7FB;color:#F00;} /* The grey box */
.claro .dijitComboBox .dijitDownArrowButtonHover .dijitArrowButtonInner {} /* The arrow  */
.claro .dijitComboBox .dijitDownArrowButtonActive { background-color: #FAD1D2; font-family:Verdana, Geneva, sans-serif; font-size:14px; color:#F00;} /* The grey box */
.claro .dijitComboBox .dijitDownArrowButtonActive .dijitArrowButtonInner {} /* The arrow */

.claro .dijitComboBoxMenu .dijitMenuItem {
 color:#F00;;
}

.claro .dijitComboBoxMenu .dijitMenuItemHover {
 color:#F00;;
}
   .claro .dojoxGridHeader .dojoxGridCell{
   background:#888888;
   color:#FFF;
   font-family:Verdana, Geneva, sans-serif;
   font-weight:lighter;
   cursor:hand;
   cursor:pointer;
     }</style></head><!-- set the claro class on our body element --><body class="claro" ng-app="search" ng-controller="searchController as controller"><div style="width:100%; height:100%; background:#FFF; overflow:auto"><center><!--Div que encuadra todos los objetos--><div style="width:95%;; border:solid 1px #EAEAEA;-moz-border-radius: 15px;border-radius: 15px; height:100%"><!--Fomr de Dojo para manejo de los botones con el tema claro--><div data-dojo-type="dijit.form.Form" id="myForm" data-dojo-id="myForm" enctype="multipart/form-data" action="" method=""><div style="width:100%; float:left; text-align:left; margin-left:1em"><button data-dojo-type="dijit.form.Button" type="cancel" name="cancelButton" value="Cancelar" onclick="location.replace('inscripcion.php');">Volver</button></div><!--Inicio de campos para busqueda----><div id="fila1" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left"><div style="float:left;padding-left:0.5em; text-align:left"><label for="time" id="titulo" style="text-align:left">Estado:</label><br><select name="estado" id="estado" style="width:120px"><option value="0" selected="selected"></option><option value="1">Viaje confirmado</option><option value="2">Cambio de destino</option><option value="3">3 Cambio de fecha de viaje</option><option value="4">4 Cambio de fecha de viaje con cambio de destino</option><option value="5">5 Cancelación de viaje</option></select></div><div style="float:left;padding-left:0.5em; text-align:left"><label for="time" id="titulo" style="text-align:left">Vendedor:</label><br><input id="transfiere"></div><div style="float:left;padding-left:0.5em;text-align:left"><label for="time" id="titulo">Asesor:</label><br><input id="ciudad" class="claro" style="width:220px"></div><div style="float:left;padding-left:0.5em; text-align:left"><label for="time" id="titulo" style="text-align:left">Mes</label><br><input id="mes" class="claro" style="width:250px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px"></div><div style="float:left;padding-left:0.5em; text-align:left"><label for="time" id="titulo" style="text-align:left">Año</label><br><input id="year" class="claro" style="width:250px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px"></div></div><!---Cierra fila----><div id="fila2" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left"><div style="float:left;padding-left:0.5em; text-align:left"><label for="time" id="titulo" style="text-align:left">Destino:</label><br><input id="destinoInput"></div><div style="float:left;padding-left:0.5em; text-align:left"><label for="time" id="titulo" style="text-align:left">Documento Aprobado:</label><br><input class="claro" id="AgenciaAgencia"></div><div style="float:left;padding-left:0.5em;text-align:left"><label for="time" id="titulo">Documento Recibido:</label><br><input id="interes" class="claro" style="width:220px"></div><div style="float:left;padding-left:0.5em;text-align:left"><label for="time" id="titulo">Visa:</label><br><input id="fase" class="claro" style="width:220px"></div><div style="float:left;padding-left:0.5em;text-align:left"><label for="time" id="titulo">Pagos:</label><br><input id="pagos" class="claro" style="width:220px"></div></div><!---Cierra fila----><div class="row"><div class="col-sm-6"><label>Buscar en la bitacora..</label><textarea ng-model="controller.find" class="form-control" ng-change="controller.searchBitacora()" rows="2"></textarea></div></div><div id="fila4" style="width:95%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1em; float:left"><div style="float:right;padding-right:0.5em; text-align:right"><button type="button" ng-click="controller.new()">Nueva Busqueda</button></div><div style="float:right;padding-right:0.5em; text-align:right"><button id="exportBtn" data-dojo-type="dijit.form.Button" onclick="exportExcel();">Exportar a Excel</button></div><div style="float: right;padding-right:0.5em; text-align:right"><button data-dojo-type="dijit.form.Button" type="button" name="searchButton" value="Buscar" onclick="buscar();">Buscar</button></div><div style="float: right;padding-right:0.5em; text-align:right"><button type="button" name="searchButton" value="Buscar" ng-click="controller.buscar()">Buscar Por Bitacora</button></div><div style="float: right;padding-right:0.5em; text-align:right"><div class="dropdown" id="adminDrop"><button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true" style="background-color: #e5f2fe;border-radius:6px;box-shadow: inset 0px 5px 10px 1px rgba(23,145,189,0.23)">Enviar <span class="caret"></span></button><ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1"><li role="presentation"><a role="menuitem" tabindex="-1" onclick="enviarCorreo('sendUserDocs')">Documentos a usuarios</a></li><li role="presentation"><a role="menuitem" tabindex="-1" onclick="enviarCorreo('sendUserPagos')">Pagos a usuarios</a></li><li role="presentation"><a role="menuitem" tabindex="-1" onclick="enviarCorreo('sendAdminDocs')">A Administrador</a></li></ul></div></div></div></div><div style="border-bottom:1px solid #E4E4E4; clear:both"></div><!---Final de campos y botones de busqueda--><!--Div donde se exportan los datos en CSV--><div id="divGrid" style="max-width:100%; min-width:100%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin- height:100px; height:280px;  display:none; clear:both"><textarea rows="200" cols="8" id="output"></textarea></div><div style="float:right; text-align:right; margin-right:4em; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-top:1em; color:#888888;width:29%">TOTAL: <span class="displayRowCount"></span></div></div></center></div></body></html>
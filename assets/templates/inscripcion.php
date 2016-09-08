<!---Seguimientos---->
<html class="dj_webkit dj_chrome dj_contentbox">
<head>
    <!-- Carga Dojo y Css para utilizar la libreria Claro -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dijit/themes/claro/claro.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojox/grid/resources/claroGrid.css">
    
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js" data-dojo-config="isDebug: true, parseOnLoad: true"></script>
    <!-- Llamada al archivo js externo que controla las funciones de la página principal -->
   

    <!-- build:js js/final/vendor.js -->
       <script charset="utf-8" src="../js/inscripciones.js"></script>
    <!-- endbuild -->
    <style>
    .claro .dojoxGridMasterHeader .dojoxGridCell,
    .claro .dojoxGridHeader .dojoxGridCell{
      background-color:#E08AC5;
      background:#E08AC5;
    }
  </style>
  <!-- build:css css/main.css -->
    <link rel="stylesheet" href="../css/seguimientos.css">
  <!-- endbuild -->
</head>
<body style="text-align:center; overflow:auto;" class="claro" onLoad="iniciaGrid();">
 <div style="width:100%; height:100%;"><!---Div contebnedor al 100%--->
   <div style="float:left; width:20%; height:100%;overflow:auto;"><!---Div lado Izquierdo--->
   <center>
    <div style="width:100%; height:45px; position:relative"><!--Titulo-->
     <div style="float:left;"><!--Titulo Izquierdo-->
       <div style="float:left;">
        <img src="imgs/mal.png" border="0"/>
       </div>
       <div style="float:left;font-family:Verdana, Geneva, sans-serif; font-size:14px; color:#444444; font-weight:bold; margin-top:0.6em;">Notificaciones</div>
     </div><!--Titulo Izquierdo-->
     <div style="float:right;"><!--Titulo Derecho-->
       <div style="float: right;font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#444444;margin-top:0.8em; width:50px; margin-right:1em">Total:<span id="totalnoti"></span></div>
     </div><!--Titulo Derecho-->
     <div style="clear:both">
     </div>
     <center>
     <div id="noti" style="width:100%">
     </div>
     </center>
    </div><!--Titulo-->
    </center>
   </div><!---Div lado Izquierdo--->
   <div style="float:right; width:79%; height:100%;"><!---Div lado Derecho--->
    <div style="width:100%; height:45px;">
     <!----Parte superior de la tabla------------------------------------------------------------------------------>
     <div style="float:left; width:50%;margin-top:-25; text-align:left">
      <h3 style="font-family:Verdana, Geneva, sans-serif; font-size:26px; color:#444444"><img src="/v15/mariposa/img/inscripciones.png" width="24px"/>&nbsp;Gestión de Inscripciones</h3>
     </div>
     <div style="float:right; width:49%;height:45px;text-align:right">
      <div style="width: 190px; height:45px; text-align:right; float:right;">
       <div style="float:left; padding-left:10px;">
         <a href="#" role="button" onclick="javascript:window.parent.popup();" id="segLink" style="font-family:Verdana, Geneva, sans-serif; color:#000; text-decoration:none;font-size:12px"><img src="imgs/nuevo.png" border="0"><span style="margin-top:-1em;">Crear</span></a>
       </div>
       <div style="float:left; padding-left:10px">
         <a href="buscar_inscripcion.php" style="font-family:Verdana, Geneva, sans-serif; color:#000; text-decoration:none; font-size:12px"><img src="imgs/buscar.png" border="0"><span style="margin-top:-1em;">Buscar</span></a>
       </div>
      </div>
     </div>
    </div>
    <div style="width:100%; border:solid 1px #CCCCCC; height:92%;-moz-border-radius: 10px;border-radius: 10px;" id="gridderecho"><!-----Div contenedor de las busquedas y el grid-------->
     <div style="width:100%; height:50px;">
     <table> 
      <tr align="left">
       <td align="left" class="claro"><input id="destinoSeguimiento" /></td>
       <td align="left" class="claro"><input id="VendedorVendedor" /></td>
       <td align="left" class="claro"><input id="AgenciaAgencia" /></td>
         
         <td style="color:#444444; font-family:Verdana, Geneva, sans-serif; font-size:16px;" align="left"><label for="agency">Quinceañera:</label></td>
       <td align="left"><input type="text" name="nombrenina" id="nombrenina" onKeyUp="filtragrid();"  value="" style="width:260px;-moz-border-radius: 5px;border-radius: 5px; border: #D7D7D7 solid 1px; font-size:18px;"/></td>
       <td align="left"><div id="rompeQuery" style="display:none; font-family:Verdana, Geneva, sans-serif; padding-left:1em; font-size:14px">
       <a href="javascript:cargaTodos();">Ver Todos</a>
           </div></td>      
      </tr>
      
     </table>
     </div>
     <div id="gridDiv" style="width:100%;">
     </div>
     <div style="float:left; text-align:left; margin-right:4em; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-top:1em; color:#888888; width:40%">
      
     </div>
     <div style="float:right; text-align:right; margin-right:4em; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-top:1em; color:#888888;width:29%">
      TOTAL:<span id="totalseg" style=" color:#8500B2"></span>
     </div>
    </div><!-----Div contenedor de las busquedas y el grid--------->
   </div><!---Div lado Derecho--->
 </div><!---Div contenedor al 100%--->
</body>
</html>
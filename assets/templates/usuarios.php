<!-- create the chart -->

<html class="dj_webkit dj_chrome dj_contentbox">
<head>
    <!-- Carga Dojo y Css para utilizar la libreria Claro -->
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/dojo/1.9.3/dojo/resources/dojo.css"> 
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.9.3/dijit/themes/claro/claro.css" type="text/css">
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
       <!-- build:jsv js/final/vendor-users.js -->
       <script type="text/javascript" src="../js/moment.js"></script>
       <script type="text/javascript" src="../js/daterangepicker.js"></script>
    <!-- endbuild -->
   
    <script src="http://ajax.googleapis.com/ajax/libs/dojo/1.7.1/dojo/dojo.js" data-dojo-config="isDebug: true, parseOnLoad: true"></script>
    <!-- Llamada al archivo js externo que controla las funciones de la página principal -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    

    <!-- build:js js/final/usuarios.js -->
      <script charset="utf-8" src="../js/usuarios.js"></script>
    <!-- endbuild -->
    
<style>

  table#docTable {
    width:96%;
    margin-left: 20px;
}
table#docTable td, table#hermanaTable td, table#monedaTable2 td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#pagosTable th {
  padding:2px 10px 2px 10px;
}
table#pagosTable tr:nth-child(even),
table#ayudaTable tr:nth-child(even),
table#docTable tr:nth-child(even),
table#hermanaTable tr:nth-child(even),
table#monedaTable2 tr:nth-child(even)
 {
    background-color: #eee;
}
table#PagosTable tr:nth-child(odd),
table#ayudaTable tr:nth-child(odd),
table#docTable tr:nth-child(odd),
table#hermanaTable tr:nth-child(odd), 
table#monedaTable2 tr:nth-child(odd)
{
   background-color:#fff;
}
table#pagosTable th,
table#ayudaTable th,
table#docTable th, 
table#hermanaTable th,
table#monedaTable2 th {
    background-color: #96689F;
    border-left: 1px solid #555;
  border-right: 1px solid #777;
  border-top: 1px solid #555;
  border-bottom: 1px solid #333;
  box-shadow: inset 0 1px 0 #999;
  color: #fff;
  font-weight: bold;
  padding: 10px 15px;
  position: relative;
  text-shadow: 0 1px 0 #000;
    }	

table#pagosTable th:after,
table#ayudaTable th:after,
table#docTable th:after, 
table#hermanaTable th:after,
table#monedaTable2 th:after  {
  background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
  content: '';
  display: block;
  height: 25%;
  left: 0;
  margin: 1px 0 0 0;
  position: absolute;
  top: 25%;
  width: 100%;
}
table#pagosTable th:first-child,
table#ayudaTable th:first-child,
table#docTable th:first-child, 
table#hermanaTable th:first-child,
table#monedaTable2 th:first-child {
  border-left: 1px solid #777;  
  box-shadow: inset 1px 1px 0 #999;
}
table#pagosTable td,
table#ayudaTable td,
table#docTable td, 
table#hermanaTable td,
table#monedaTable2 td {
  border-right: 1px solid #fff;
  border-left: 1px solid #e8e8e8;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #e8e8e8;
  padding: 10px 15px;
  position: relative;
  transition: all 300ms;
}
table#pagosTable th:last-child,
table#ayudaTable th:last-child,
table#docTable th:last-child, 
table#hermanaTable th:last-child,
table#monedaTable2 th:last-child {
  box-shadow: inset -1px 1px 0 #999;
}
tbody:hover td {
  color: transparent;
  text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
  color: #444;
  text-shadow: 0 1px 0 #fff;
}
.modal-dialog{
  z-index:1090;
}

</style>
<!-- build:css css/main.css -->
  <link rel="stylesheet" href="../css/seguimientos.css">
  <link rel="stylesheet" type="text/css" href="../css/daterangepicker-bs3.css" />
<!-- endbuild -->
</head>
<body class="claro">

<div class="modal fade" id="monedaTableModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog">
       <div class="modal-content" style="min-width:360px; min-height:230px; text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <table id="monedaTable2" style="width:98%;">
             <tr id="headerRow"><th>Moneda</th><th>Valor</th><th>Fecha</th></tr>
           </table> 

    </div>
  </div>
</div>





  <div class="modal fade bs-example-modal-sm" id="monedaModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-sm">
       <div class="modal-content" style="min-width:360px; min-height:230px; text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <div class="form-group" style="padding-top:20px;">
         <div class="input-group">
         <input type="text" id="dolar" class="form-control"  placeholder="Precio Dolar" style="margin:10px 10px;">
         <input type="text" id="euro" class="form-control"  placeholder="Precio Euro" style="margin:10px 10px;">
          </div>
          </div>
        <button type="submit"  id="addNotaButton" class="btn btn-default" onclick="addMoneda()" style="background-color:#96689F;">Agregar</button> 
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" id="callsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Reportes</h4>
      </div>
      <div class="modal-body">
          <div id="docDiv">
        <div><br /></div>
           <table id="docTable">
             
           </table>  
        </diV>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid" style="padding-top:8px; margin-top:5px;">
    <div class="row">
       <div class="col-md-5" style="text-align:center; margin-top:-10px;">
        <a href="#" role="button" id="llamadaEfect"><h4 class="mainBanner" style=" margin-left:10px; float:left; border-right:1px solid grey;margin-top:5px;padding-right:7px;"><img src="/v15/mariposa/img/curved.png" width="30px"/>Reporte de llamadas</h4></a>
           <a id="mainLink" href="#" role="button"><h4 id="bannerMain" class="mainBanner" style="display:inline;float:left; color:purple; text-decoration:underline; font-weight:bolder;padding-left:7px;">Reporte de Ventas</h4></a>
       </div>
       <div class="col-md-3" style="padding-top:24px;">
        <form id="ventasForm" class="form-horizontal">
                 <fieldset>
                  <div class="control-group">
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span><input type="text" style="width: 200px" name="ventas" id="ventas" class="form-control" placeholder="Buscar ventas"/> 
                     </div>
                    </div>
                  </div>
                 </fieldset>
               </form>
               
               <form id="callsForm" class="form-horizontal">
                 <fieldset>
                  <div class="control-group">
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span><input type="text" style="width: 200px" name="calls" id="calls" class="form-control" placeholder="Buscar llamadas"/> 
                     </div>
                    </div>
                  </div>
                 </fieldset>
               </form>


            
       </div>
       <div class="col-md-4">
       <div class="form-group" style="float:right;">
       <label for="donde">Destino:</label> <br />  
        <select class="form-control" id="donde" style="max-width:200px; display:inline;">
         <option value="todos">TODOS </option>
        
         </select></div> <div class="form-group" style="float:left;">
         <label for="cuando">Medición:</label>
         <select class="form-control" id="cuando" name="periodo" style="max-width:200px;  display:inline; float:right">
         <option value="semestral">Semestral</option>
         <option value="mensual">Mensual</option>
         <option value="semanal">Semanal</option>
        </select></div>

           <div><br  /></div>
       </div> 
    </div>  
    <div><br  /></div>  
	<div class="row" style="margin-top:50px;">
	   <div class="col-md-3"> <div class="panel panel-default">
  <div class="panel-heading" style="text-align:center">
    <h3 class="panel-title">Leyenda</h3>
  </div>
  <div class="panel-body">
  
    <table class="table table-hover">
      <tr>
        <th>Color</th>
        <th>Significado</th>
     </tr>
    <tr>
       <td><div align="center" style="width:16px; height:16px; background-color:#EB5D82; border: 2px solid; border-radius: 10px; margin-left:7px;"></div></td>
       <td>Tope Semanal</td>
    </tr>
    <tr>
       <td><div align="center" style="width:16px; height:16px; background-color:#F7EA9B; border: 2px solid; border-radius: 10px; margin-left:7px;"></div></td>
       <td>Tope Mensual</td>
    </tr>
    <tr>
       <td><div align="center" style="width:16px; height:16px; background-color:#C8A4DC; border: 2px solid; border-radius: 10px; margin-left:7px;"></div></td>
       <td>Tope Semestral</td>
    </tr>
    <tr>
       <td><div align="center" style="width:16px; height:16px; background-color:#71DCD0; border: 2px solid; border-radius: 10px; margin-left:7px;"></div></td>
       <td>Usuario</td>
    </tr>
    </table>
    <div id="first" class="first"></div>
    <div id="second" class="second"></div>
  </div>
</div></div>
	    <div class="col-md-7">
<div id="chartNode" style="width: 790px; height: 420px;"></div>
<img src="/v15/mariposa/img/Janneth.jpg" border="0" style="position:absolute;top:380px; left:137px; width:32px;"/>
<img src="/v15/mariposa/img/Cesar.jpg" border="0" style="position:absolute;top:380px; left:280px; width:32px;"/>
<img src="/v15/mariposa/img/Yolanda.jpg" border="0" style="position:absolute;top:380px; left:420px; width:32px;"/>
<img src="/v15/mariposa/img/Rosalba.jpg" border="0" style="position:absolute;top:380px; left:560px; width:32px;"/>
<img src="/v15/mariposa/img/DANIELA.JPG" border="0" style="position:absolute;top:380px; left:700px; width:32px;"/>

</div>

 <div class="col-md-2">
 <div class="panel panel-default">
  <div id="monedaHeading" class="panel-heading" style="text-align:center">
    <h3 class="panel-title">Moneda</h3>
  </div>
  <div class="panel-body" style="text-align:center;">
  <table id="monedaTable" class="table table-hover">
        <tr>
        <th>Dolar</th>
        <th>Euro</th>
     </tr>
  </table>
  <button class="btn btn-primary" onclick="showMonedaTable()">Ver Historial</button>
  </div>
  </div>
  
 
 </div>
</div>
<div class="row"> 
<div class="col-md-3"></div>
<div class="col-md-7"></div>
<div class="col-md-2"></div>
</div>
</div>


</body>
</html>

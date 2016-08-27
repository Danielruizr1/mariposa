 <style>
  //Estilo principal del grid
   #grid {
      width:100%;
      height:400px;
    overflow:auto;  
    background-color:#FFF;
    float:left;
    font-size:0.8em;
    cursor:hand;
    cursor:pointer;
     }
   //Estilos de los encabezados y de las celdas
   .claro .dojoxGridHeader .dojoxGridCell{
   background:#888888;
   color:#FFF;
   font-family:Verdana, Geneva, sans-serif;
   font-weight:lighter;
   cursor:hand;
   cursor:pointer;
     }
   //Estilos para los títulos
   #titulo{
      float:left;
      color: #A0A0A0;
      font-family:Verdana, Geneva, sans-serif;
      font-size:14px;
      font-weight: 300;
  }
  
  </style>

 
                <button data-dojo-type="dijit.form.Button" type="cancel" name="cancelButton" value="Cancelar" onClick="window.parent.crearseguimiento('ocultarCrear')">Volver</button>

           <!----Empieza el formulario por filas-------->

             

             
            
                        
             

             
             
            <!----Fila 1---->
            <!----Fila 2---->
            
            
 
            
            
            <!----Fila 2----->
            <!----Fila 3---->
            
            
            
            
            
            
 
            
            
            
            
            
            
            <div id="gridbusqueda" style="width:90%; font-family:Verdana, Geneva, sans-serif; font-size:14px; margin-bottom:5px; margin-left:1.5em; float:left;-moz-border-radius: 5px;border-radius: 5px; border:solid 1px #A0B7FF; height:16em;">
            <div style="float:left; width:100%; background-color:#A0B7FF" id="boton">
              <div style="float:left; text-align:left; width:97%; color:#fff;">
               <div style="float:left">
                <img src="imgs/notificacion.png" border="0"/>
               </div>
               <div style="float:left; font-family:Verdana, Geneva, sans-serif; font-size:16px; padding-top:0.3em">
                 YA HAY UN SEGUIMIENTO CON ESTA INFORMACION!
               </div>
              </div>
              <div style=" float:right; text-align:right; width:2%;">
               <img src="imgs/cerrarvin.png" border="0" onClick="cierragrid();" style="cursor:hand;cursor:pointer;"/> 
              </div>
             </div>
             <div style="width:100%; margin-top:3.5em">
             <div id="gridDiv" style="float:left; padding-left:20em;overflow:hidden; height:13em"> 
             </div>
             </div>
            </div>
     
            
            
            
            
            
            

            
            
            
            
             
            
            
            
            
           
            
            

            
            
           
            
            
           
           
            

             
            
            
            
            
         
         
         
             
             </div>
         
            
       
             
             
            
            
            
            <!----Fila 9----->
           <!----Termina el formulario por filas-------->
           
        

       <div style="float:right; width:0%; height:100%;overflow:auto;" id="bit">
       </div>
       
      </div>

      <script type="text/javascript">
var myTxtArea = document.getElementById('observacion');
myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,'');
var myTxtArea = document.getElementById('bitacora');
myTxtArea.value = myTxtArea.value.replace(/^\s*|\s*$/g,'');
</script>
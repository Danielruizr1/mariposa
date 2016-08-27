// Require the basic 2d chart resource: Chart2D
dojo.require("dojox.charting.Chart2D");
 
// Require the highlighter
dojo.require("dojox.charting.action2d.Highlight");
dojo.require("dojox.charting.action2d.Tooltip");
 
dojo.require("dojox.charting.themes.Claro");
// Require the theme of our choosing
dojo.require("dojox.charting.themes.MiamiNice");
dojo.require("dojo.date.stamp");
dojo.require("dojo.date.locale"); 
// Define the data
   
 
    
   
// When the DOM is ready and resources are loaded...
dojo.ready(function() {
 
    // Create the chart within it's "holding" node
    var chart = new dojox.charting.Chart2D("chartNode");
    topeSemanal=0;
    topeMensual=0;
    topeSemestral=100;
    topeJanneth=0;
    topeLina=0;
    topeCesar=0;
    topeYolanda=0;
    topeDaniela=0;
    topeRosalba=0;
    topeHanna=0;
    topeRocio=0;
    topeNathalia=0;
   var lasFechas = new Array();
          laFecha="";
     total = 0;     
   window.parent.VentasAlmacen.query({}).forEach(function(des){
          if(des.user_id == "11"){
            total = total + parseInt(des.cantidad);
            topeJanneth=parseInt(des.cantidad) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.user_id == "15"){
            total = total + parseInt(des.cantidad);
            topeCesar=parseInt(des.cantidad) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
         
         if(des.user_id == "13"){
            total = total + parseInt(des.cantidad);
            topeYolanda=parseInt(des.cantidad) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.user_id == "31"){
            total = total + parseInt(des.cantidad);
            topeDaniela=parseInt(des.cantidad) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.user_id == "19"){
            total = total + parseInt(des.cantidad);
            topeRosalba=parseInt(des.cantidad) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
         lasFechas.push(des.fecha);
         });
 
         laFecha = lasFechas.pop();
         if(laFecha){
           var displayPattern = 'd-MMM-yyyy';
           var d = dojo.date.stamp.fromISOString(laFecha);
           fechatotal=dojo.date.locale.format(d, {selector: 'date', datePattern: displayPattern});
          $( "#second" ).replaceWith( "<h5> Ultima Actualización:"+fechatotal+"</h5>" );}
         if(total){$( "#first" ).replaceWith( "<h4 class='first'> Ventas Total:"+total+"</h4>" );}
    
    // Set the theme
    chart.setTheme(dojox.charting.themes.MiamiNice);
 
    // Add the only/default plot
    chart.addPlot("default", {
        type: "Columns",
        markers: true,
        gap: 8
    });
 
    // Add axes
   chart.addAxis("x", {
   title: 'Agentes',
   titleOrientation: "away",
   titleFontColor: "purple",
   labels: [{value: 1, text: "Janneth"},
        {value: 2, text: "Cesar"}, {value: 3, text: "Yolanda"}, {value: 4, text: "Adelaida"},
        {value: 5, text: "Daniela"}, ]
});
    chart.addAxis("y", { title: 'Topes', vertical: true, includeZero: true });
    // Add the series of data
    chart.addSeries("user", [topeJanneth, topeCesar, topeYolanda,topeRosalba, topeDaniela], {color: "#71DCD0"});
    chart.addSeries("semanal", [topeSemanal,topeSemanal,topeSemanal,topeSemanal,topeSemanal], {color: "#EB5D82"});
    chart.addSeries("mensual", [topeMensual,topeMensual,topeMensual, topeMensual,topeMensual], {color: "#F7EA9B"});
    chart.addSeries("semestral", [topeSemestral,topeSemestral,topeSemestral, topeSemestral,topeSemestral], {color: "#C8A4DC"});
    
   
 
    // Highlight!
   var tip = new dojox.charting.action2d.Tooltip(chart,"default");
    var high = new dojox.charting.action2d.Highlight(chart,"default");
    
 
    // Render the chart!
    chart.render();


function updateChart(value)
{
    if(value== 1){
         topeMensual=25;
         topeSemanal=25;
         topeSemestral=25;
         topeJanneth=0;
             topeCesar=0;
             topeYolanda=0;
             topeDaniela=0;
             topeRosalba=0;
          window.parent.bitacoraHoyAlmacen.query({llamadaEfectiva:"1"}).forEach(function(des){
             if(des.usuario == "11" || des.usuario == "JANNETH CASTIBLANCO" ){
            topeJanneth=parseInt(des.llamadaEfectiva) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.usuario == "15" || des.usuario == "CESAR ROJAS"){
            topeCesar=parseInt(des.llamadaEfectiva) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
         if(des.usuario == "13" || des.usuario == "YOLANDA ROJAS"){
            topeYolanda=parseInt(des.llamadaEfectiva) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.usuario == "31" || des.usuario == "DANIELA RODRIGUEZ"){
            topeDaniela=parseInt(des.llamadaEfectiva) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.usuario == "19" || des.usuario == "ROSALBA SANTOS"){
            topeRosalba=parseInt(des.llamadaEfectiva) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
          });
         
    } else{
        destino = $('#donde').val();
        periodo = $('#cuando').val();
         topeMensual=0;
         topeSemanal=0;
         topeSemestral=0;

         
         topeJanneth=0;
         topeLina=0;

      topeCesar=0;
    topeYolanda=0;
    topeDaniela=0;
    topeRosalba=0;
    topeHanna=0;
    topeRocio=0;
    topeNathalia=0;
    total=0;
 
         
         if(periodo == "semanal"){
            window.parent.DestinosAlmacen.query({sigla:destino}).forEach(function(des){
           topeSemanal=parseInt(des.topeSemanal);
           if(isNaN(topeSemanal)){topeSemanal=0}
       });
          topeMensual=0; topeSemestral=0;
          window.parent.VentasAlmacen.query({destino:destino}).forEach(function(des){
         week = des.fecha;
         newWeek = week.replace(/-/g, ",");
         weekNum = getWeekNumber(newWeek);
         currentDate = Date();
         currentWeek = getWeekNumber(currentDate);
        if(weekNum == currentWeek){

          if(des.user_id == "11"){
            total = total + parseInt(des.cantidad);
            topeJanneth=parseInt(des.cantidad) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.user_id == "15"){
            total = total + parseInt(des.cantidad);
            topeCesar=parseInt(des.cantidad) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
        
         if(des.user_id == "13"){
            total = total + parseInt(des.cantidad);
            topeYolanda=parseInt(des.cantidad) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.user_id == "31"){
            total = total + parseInt(des.cantidad);
            topeDaniela=parseInt(des.cantidad) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.user_id == "19"){
            total = total + parseInt(des.cantidad);
            topeRosalba=parseInt(des.cantidad) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
         
       }

         });
       if(total){$( "h4.first" ).replaceWith( "<h4 class='first'> Ventas Total:"+total+"</h4>" );}

if(destino == "todos"){window.parent.VentasAlmacen.query({},{sort:[{attribute:"fecha", descending: true}]}).forEach(function(des){
           if(des.user_id == "11"){
            
            topeJanneth=parseInt(des.cantidad) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.user_id == "10"){
            
            topeLina=parseInt(des.cantidad) + topeLina;
           if(isNaN(topeLina)){topeLina=0}
           }
         if(des.user_id == "15"){
            
            topeCesar=parseInt(des.cantidad) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
         
         if(des.user_id == "13"){
            
            topeYolanda=parseInt(des.cantidad) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.user_id == "31"){
            
            topeDaniela=parseInt(des.cantidad) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.user_id == "19"){
            
            topeRosalba=parseInt(des.cantidad) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
         if(des.user_id == "23"){
            
            topeHanna=parseInt(des.cantidad) + topeHanna;
           if(isNaN(topeHanna)){topeHanna=0}
           }
         if(des.user_id == "22"){
            
            topeRocio=parseInt(des.cantidad) + topeRocio;
           if(isNaN(topeRocio)){topeRocio=0}
           }
         if(des.user_id == "18"){
            
            topeNathalia=parseInt(des.cantidad) + topeNathalia;
           if(isNaN(topeNathalia)){topeNathalia=0}
           }

         });
         topeSemanal=8;
            total = topeJanneth+topeCesar+topeRosalba+topeYolanda+topeDaniela;
            if(total){$( "h4.first" ).replaceWith( "<h4 class='first'> Ventas Total:"+total+"</h4>" );}
               }
        }
         if(periodo == "mensual"){
          window.parent.DestinosAlmacen.query({sigla:destino}).forEach(function(des){
           topeMensual=parseInt(des.topeMensual);
           if(isNaN(topeMensual)){topeMensual=0}
       });

          topeSemanal=0; topeSemestral=0;
         window.parent.VentasAlmacen.query({destino:destino}).forEach(function(des){
         mes = des.fecha;
         newMes = new Date(mes.replace(/-/g, ","));
         mesNum = newMes.getMonth();
         currentDate = new Date();
         currentMonth = currentDate.getMonth();
        if(mesNum == currentMonth){

          if(des.user_id == "11"){
            total = total + parseInt(des.cantidad);
            topeJanneth=parseInt(des.cantidad) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.user_id == "15"){
            total = total + parseInt(des.cantidad);
            topeCesar=parseInt(des.cantidad) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
         if(des.user_id == "13"){
            total = total + parseInt(des.cantidad);
            topeYolanda=parseInt(des.cantidad) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.user_id == "31"){
            total = total + parseInt(des.cantidad);
            topeDaniela=parseInt(des.cantidad) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.user_id == "19"){
            total = total + parseInt(des.cantidad);
            topeRosalba=parseInt(des.cantidad) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
         
       }
         });
         if(total){$( "h4.first" ).replaceWith( "<h4 class='first'> Ventas Total:"+total+"</h4>" );}
if(destino == "todos"){window.parent.VentasAlmacen.query({},{sort:[{attribute:"fecha", descending: true}]}).forEach(function(des){
           if(des.user_id == "11"){
            
            topeJanneth=parseInt(des.cantidad) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.user_id == "10"){
            
            topeLina=parseInt(des.cantidad) + topeLina;
           if(isNaN(topeLina)){topeLina=0}
           }
         if(des.user_id == "15"){
            
            topeCesar=parseInt(des.cantidad) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
         if(des.user_id == "13"){
            
            topeYolanda=parseInt(des.cantidad) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.user_id == "31"){
            
            topeDaniela=parseInt(des.cantidad) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.user_id == "19"){
            
            topeRosalba=parseInt(des.cantidad) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
         if(des.user_id == "23"){
            
            topeHanna=parseInt(des.cantidad) + topeHanna;
           if(isNaN(topeHanna)){topeHanna=0}
           }
         if(des.user_id == "22"){
            
            topeRocio=parseInt(des.cantidad) + topeRocio;
           if(isNaN(topeRocio)){topeRocio=0}
           }
         if(des.user_id == "18"){
            
            topeNathalia=parseInt(des.cantidad) + topeNathalia;
           if(isNaN(topeNathalia)){topeNathalia=0}
           }

         });

         topeMensual=35;
         total = topeJanneth+topeCesar+topeRosalba+topeYolanda+topeDaniela;
         if(total){$( "h4.first" ).replaceWith( "<h4 class='first'> Ventas Total:"+total+"</h4>" );}
}
     
        }
         if(periodo == "semestral"){
           window.parent.DestinosAlmacen.query({sigla:destino}).forEach(function(des){
           topeSemestral=parseInt(des.topeSemestral);
           if(isNaN(topeSemestral)){topeSemestral=0}
       });
          topeMensual=0; topeSemanal=0;
          window.parent.VentasAlmacen.query({destino:destino}).forEach(function(des){

          if(des.user_id == "11"){
            total = total + parseInt(des.cantidad);
            topeJanneth=parseInt(des.cantidad) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.user_id == "15"){
            total = total + parseInt(des.cantidad);
            topeCesar=parseInt(des.cantidad) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
  
         if(des.user_id == "13"){
            total = total + parseInt(des.cantidad);
            topeYolanda=parseInt(des.cantidad) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.user_id == "31"){
            total = total + parseInt(des.cantidad);
            topeDaniela=parseInt(des.cantidad) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.user_id == "19"){
            total = total + parseInt(des.cantidad);
            topeRosalba=parseInt(des.cantidad) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
         
       
         });
          if(total){$( "h4.first" ).replaceWith( "<h4 class='first'> Ventas Total:"+total+"</h4>" );}
if(destino == "todos"){window.parent.VentasAlmacen.query({},{sort:[{attribute:"fecha", descending: true}]}).forEach(function(des){
           if(des.user_id == "11"){
            
            topeJanneth=parseInt(des.cantidad) + topeJanneth;
           if(isNaN(topeJanneth)){topeJanneth=0}
           }
         if(des.user_id == "10"){
            
            topeLina=parseInt(des.cantidad) + topeLina;
           if(isNaN(topeLina)){topeLina=0}
           }
         if(des.user_id == "15"){
            
            topeCesar=parseInt(des.cantidad) + topeCesar;
           if(isNaN(topeCesar)){topeCesar=0}
           }
        
         if(des.user_id == "13"){
            
            topeYolanda=parseInt(des.cantidad) + topeYolanda;
           if(isNaN(topeYolanda)){topeYolanda=0}
           }
         if(des.user_id == "31"){
            
            topeDaniela=parseInt(des.cantidad) + topeDaniela;
           if(isNaN(topeDaniela)){topeDaniela=0}
           }
         if(des.user_id == "19"){
            
            topeRosalba=parseInt(des.cantidad) + topeRosalba;
           if(isNaN(topeRosalba)){topeRosalba=0}
           }
         if(des.user_id == "23"){
            
            topeHanna=parseInt(des.cantidad) + topeHanna;
           if(isNaN(topeHanna)){topeHanna=0}
           }
         if(des.user_id == "22"){
            
            topeRocio=parseInt(des.cantidad) + topeRocio;
           if(isNaN(topeRocio)){topeRocio=0}
           }
         if(des.user_id == "18"){
            
            topeNathalia=parseInt(des.cantidad) + topeNathalia;
           if(isNaN(topeNathalia)){topeNathalia=0}
           }

         });
         topeSemestral=100;
         total = topeJanneth+topeCesar+topeRosalba+topeYolanda+topeDaniela;
         if(total){$( "h4.first" ).replaceWith( "<h4 class='first'> Ventas Total:"+total+"</h4>" );}
        }
       }
      }
        chart.updateSeries("user", [topeJanneth, topeCesar, topeYolanda, topeRosalba,  topeDaniela]);
        chart.updateSeries("semanal", [topeSemanal,topeSemanal,topeSemanal, topeSemanal,topeSemanal]);
        chart.updateSeries("mensual", [topeMensual,topeMensual,topeMensual, topeMensual,topeMensual]);
        chart.updateSeries("semestral", [topeSemestral,topeSemestral,topeSemestral, topeSemestral,topeSemestral]);
       
        chart.render();
 
}
$( "#donde" ).change(function() {
         var str = "";
         $( "select option:selected" ).each(function() {
         str += $( this ).text() + " ";
         destino = str;

          });
         value=0;
         updateChart(value);
           });
$( "#cuando" ).change(function() {
         var str = "";
         $( "select option:selected" ).each(function() {
         str += $( this ).text() + " ";
         destino = str;

          });
         value=0;
         updateChart(value);
           });

$("#llamadaEfect").on('click', function(e) {
         e.preventDefault();
         $("#bannerMain").replaceWith("<h4 id='bannerMain' style='display:inline;float:left;padding-left:7px;'>Reporte Ventas</h4>");
         $(".mainBanner").replaceWith("<h4 class='mainBanner' style='display:inline;float:left; color:purple;border-right:1px solid grey;margin-top:5px; text-decoration:underline;font-weight:bolder;padding-right:7px;'><img src='/v15/mariposa/img/curved.png' width='30px'/>Reporte de Llamadas</h4>");
         value=1;
         updateChart(value);
		 $('#callsForm').toggle();
		 $('#ventasForm').toggle();
		 
});
$("#mainLink").on('click', function(e) {
  e.preventDefault();
    $("#bannerMain").replaceWith("<h4 id='bannerMain' style='display:inline;float:left; color:purple;text-decoration:underline;font-weight:bolder;padding-left:7px;'>Reporte Ventas</h4>");
    $(".mainBanner").replaceWith("<h4 class='mainBanner' style='display:inline;float:left;border-right:1px solid grey;margin-top:5px;padding-right:7px;'><img src='/v15/mariposa/img/curved.png' width='30px'/>Reporte de Llamadas</h4>");
         value=0;
         updateChart(value);
		 $('#callsForm').toggle();
		 $('#ventasForm').toggle();
});
 function getWeekNumber(d) {
    // Copy date so don't modify original
    d = new Date(d);
    d.setHours(0,0,0);
    // Set to nearest Thursday: current date + 4 - current day number
    // Make Sunday's day number 7
    d.setDate(d.getDate() + 4 - (d.getDay()||7));
    // Get first day of year
    var yearStart = new Date(d.getFullYear(),0,1);
    // Calculate full weeks to nearest Thursday
    var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7)
    // Return array of year and week number
    return weekNo;
}

});



             $(document).ready(function() {
				 $('#callsForm').toggle();
				 var dateObj = new Date();
           	     var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
                 var day = ("0" + (dateObj.getDate())).slice(-2);
                 var year = dateObj.getUTCFullYear();
				 
                  $('#ventas').daterangepicker({
				  format: 'DD-MM-YYYY',
				  startDate: day+'-'+month+'-'+year,
				  endDate: day+'-'+month+'-'+year
				  }, function(start, end, label) {
					  					  
					  
					  });
					  
					   $('#calls').daterangepicker({
				  format: 'DD-MM-YYYY',
				  startDate: day+'-'+month+'-'+year,
				  endDate: day+'-'+month+'-'+year
				  }, function(start, end, label) {
					  					  
					  
					  });
					  
					$('#ventas').on('apply.daterangepicker', function(ev, picker) {
						$( ".toDelete" ).remove();
		             require(["dojo/_base/xhr"],
                     function(xhr) {
                     xhr.get({

                     url: "/v15/mariposa/inscripcions/getVentas?startDate="+picker.startDate.format('YYYY-MM-DD')+"&endDate="+picker.endDate.format('YYYY-MM-DD'),

                     load: function(result) {
                         var info = JSON.parse(result);
						 console.log(info);
						 $('<tr class="toDelete" id="headerRow"><th>Asesor</th><th>Ventas</th><th>Plazo</th></tr>').appendTo("#docTable");
						 info.forEach(function(des){
							 $("<tr class='toDelete'><td>"+des.users.nombre+"</td><td>"+des[0].Ventas+"</td><td>"+picker.startDate.format('YYYY-MM-DD')+" Hasta "+picker.endDate.format('YYYY-MM-DD')+"</td></tr>").appendTo("#docTable");
						 });
						 $('#callsModal').modal('show')
                      }
       
                     });
                    });
					
					
					
                     }); 
					 
					 $('#calls').on('apply.daterangepicker', function(ev, picker) {
						$( ".toDelete" ).remove();
            console.log(picker.startDate.format('YYYY-MM-DD'));
		             require(["dojo/_base/xhr"],
                     function(xhr) {
                     xhr.get({

                     url: "/v15/mariposa/inscripcions/llamadas?startDate="+picker.startDate.format('YYYY-MM-DD')+"&endDate="+picker.endDate.format('YYYY-MM-DD'),

                     load: function(result) {
                         var info = JSON.parse(result);
						 $('<tr class="toDelete" id="headerRow"><th>Asesor</th><th>Llamadas</th><th>Plazo</th></tr>').appendTo("#docTable");
						 info.forEach(function(des){
							 $("<tr class='toDelete'><td>"+des.users.nombre+"</td><td>"+des[0].llamadasEfectivas+"</td><td>"+picker.startDate.format('YYYY-MM-DD')+" Hasta "+picker.endDate.format('YYYY-MM-DD')+"</td></tr>").appendTo("#docTable");
						 });
						 $('#callsModal').modal('show')
                      }
       
                     });
                    });
					
					
					
                     }); 			  
				  
               });


$(document).ready(function() {
	var dolar = "";
	window.parent.MonedasAlmacen.query({moneda:"Dolar"},{sort: [{attribute: "fecha", descending: false}]}).forEach(function(des){
			  dolar = des.valor;
			  
		
		});
	var euro = "";	
	window.parent.MonedasAlmacen.query({moneda:"Euro"} ,{sort: [{attribute: "fecha", descending: false}]}).forEach(function(des){
			  euro = des.valor;
			  
		
		});
	$("<tr><td class='onclick' >"+dolar+"</td><td class='onclick' >"+euro+"</td></tr>").appendTo("#monedaTable");

$(document).on('click', "td.onclick", function() {
          if (window.parent.rolusuarioactivo == "contador"){
			var inscripcionactiva=window.parent.MonedasAlmacen.get(1);
		   	document.getElementById('dolar').value=decodeURIComponent(inscripcionactiva.valor);
			var inscripcionactiva=window.parent.MonedasAlmacen.get(2);
		    document.getElementById('euro').value=decodeURIComponent(inscripcionactiva.valor);
		  $('#monedaModal').modal('show');
	 }
        
});
});

function addMoneda() {
	    var dolar =  $('#dolar').val();
		var euro =  $('#euro').val();
		require(["dojo/_base/xhr"],
        function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
           url: "/v15/mariposa/inscripcions/addMoneda?dolar="+dolar+"&euro="+euro,

           load: function(result) {
			   var dateObj = new Date();
           	var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
            var day = ("0" + (dateObj.getDate())).slice(-2);
             var year = dateObj.getUTCFullYear();
			   var inscripcionactualizar=window.parent.MonedasAlmacen.get(1);
               	document.getElementById("monedaTable").rows[1].cells[0].innerHTML = dolar;
               	inscripcionactualizar.valor=dolar;
				inscripcionactualizar.fecha= year + "-" + month + "-" + day;
               window.parent.MonedasAlmacen.put(inscripcionactualizar);
	           window.parent.moneda=window.parent.MonedasAlmacen.data;
	            var inscripcionactualizar=window.parent.MonedasAlmacen.get(2);
               	document.getElementById("monedaTable").rows[1].cells[1].innerHTML = euro;
               	inscripcionactualizar.valor=euro;
				inscripcionactualizar.fecha= year + "-" + month + "-" + day;
               window.parent.MonedasAlmacen.put(inscripcionactualizar);
	           window.parent.moneda=window.parent.MonedasAlmacen.data;
			   $("#monedaModal").modal("hide")
           }

        });
      });
	}
	
function showMonedaTable() {
	     $( ".toDelete" ).remove();
      	 window.parent.MonedasAlmacen.query({},{sort: [{attribute: "fecha", descending: false}]}).forEach(function(des){
			  if(des.moneda == "Dolar"){
				  $("<tr class='toDelete'><td>"+des.moneda+"</td><td>"+des.valor+"</td><td>"+des.fecha+"</td></tr>").appendTo("#monedaTable2");
			  }			  
		      if(des.moneda == "Euro"){
				  $("<tr class='toDelete'><td>"+des.moneda+"</td><td>"+des.valor+"</td><td>"+des.fecha+"</td></tr>").appendTo("#monedaTable2");
			  }	
		});
        $("#monedaTableModal").modal("show")
}

$(document).ready(function(e) { 
  window.parent.destino.forEach(function(destino){
    $("#donde").append("<option value='"+destino.sigla+"'>"+destino.name+"</option>");
  })
});
function addMoneda(){var dolar=$("#dolar").val(),euro=$("#euro").val();require(["dojo/_base/xhr"],function(xhr){xhr.get({url:"/v15/mariposa/inscripcions/addMoneda?dolar="+dolar+"&euro="+euro,load:function(result){var dateObj=new Date,month=("0"+(dateObj.getMonth()+1)).slice(-2),day=("0"+dateObj.getDate()).slice(-2),year=dateObj.getUTCFullYear(),inscripcionactualizar=window.parent.MonedasAlmacen.get(1);document.getElementById("monedaTable").rows[1].cells[0].innerHTML=dolar,inscripcionactualizar.valor=dolar,inscripcionactualizar.fecha=year+"-"+month+"-"+day,window.parent.MonedasAlmacen.put(inscripcionactualizar),window.parent.moneda=window.parent.MonedasAlmacen.data;var inscripcionactualizar=window.parent.MonedasAlmacen.get(2);document.getElementById("monedaTable").rows[1].cells[1].innerHTML=euro,inscripcionactualizar.valor=euro,inscripcionactualizar.fecha=year+"-"+month+"-"+day,window.parent.MonedasAlmacen.put(inscripcionactualizar),window.parent.moneda=window.parent.MonedasAlmacen.data,$("#monedaModal").modal("hide")}})})}function showMonedaTable(){$(".toDelete").remove(),window.parent.MonedasAlmacen.query({},{sort:[{attribute:"fecha",descending:!1}]}).forEach(function(des){"Dolar"==des.moneda&&$("<tr class='toDelete'><td>"+des.moneda+"</td><td>"+des.valor+"</td><td>"+des.fecha+"</td></tr>").appendTo("#monedaTable2"),"Euro"==des.moneda&&$("<tr class='toDelete'><td>"+des.moneda+"</td><td>"+des.valor+"</td><td>"+des.fecha+"</td></tr>").appendTo("#monedaTable2")}),$("#monedaTableModal").modal("show")}dojo.require("dojox.charting.Chart2D"),dojo.require("dojox.charting.action2d.Highlight"),dojo.require("dojox.charting.action2d.Tooltip"),dojo.require("dojox.charting.themes.Claro"),dojo.require("dojox.charting.themes.MiamiNice"),dojo.require("dojo.date.stamp"),dojo.require("dojo.date.locale"),dojo.ready(function(){function updateChart(value){1==value?(topeMensual=25,topeSemanal=25,topeSemestral=25,topeJanneth=0,topeCesar=0,topeYolanda=0,topeDaniela=0,topeRosalba=0,window.parent.bitacoraHoyAlmacen.query({llamadaEfectiva:"1"}).forEach(function(des){"11"!=des.usuario&&"JANNETH CASTIBLANCO"!=des.usuario||(topeJanneth=parseInt(des.llamadaEfectiva)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"15"!=des.usuario&&"CESAR ROJAS"!=des.usuario||(topeCesar=parseInt(des.llamadaEfectiva)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"!=des.usuario&&"YOLANDA ROJAS"!=des.usuario||(topeYolanda=parseInt(des.llamadaEfectiva)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"!=des.usuario&&"DANIELA RODRIGUEZ"!=des.usuario||(topeDaniela=parseInt(des.llamadaEfectiva)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"!=des.usuario&&"ROSALBA SANTOS"!=des.usuario||(topeRosalba=parseInt(des.llamadaEfectiva)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0))})):(destino=$("#donde").val(),periodo=$("#cuando").val(),topeMensual=0,topeSemanal=0,topeSemestral=0,topeJanneth=0,topeLina=0,topeCesar=0,topeYolanda=0,topeDaniela=0,topeRosalba=0,topeHanna=0,topeRocio=0,topeNathalia=0,total=0,"semanal"==periodo&&(window.parent.DestinosAlmacen.query({sigla:destino}).forEach(function(des){topeSemanal=parseInt(des.topeSemanal),isNaN(topeSemanal)&&(topeSemanal=0)}),topeMensual=0,topeSemestral=0,window.parent.VentasAlmacen.query({destino:destino}).forEach(function(des){week=des.fecha,newWeek=week.replace(/-/g,","),weekNum=getWeekNumber(newWeek),currentDate=Date(),currentWeek=getWeekNumber(currentDate),weekNum==currentWeek&&("11"==des.user_id&&(total+=parseInt(des.cantidad),topeJanneth=parseInt(des.cantidad)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"15"==des.user_id&&(total+=parseInt(des.cantidad),topeCesar=parseInt(des.cantidad)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"==des.user_id&&(total+=parseInt(des.cantidad),topeYolanda=parseInt(des.cantidad)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"==des.user_id&&(total+=parseInt(des.cantidad),topeDaniela=parseInt(des.cantidad)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"==des.user_id&&(total+=parseInt(des.cantidad),topeRosalba=parseInt(des.cantidad)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0)))}),total&&$("h4.first").replaceWith("<h4 class='first'> Ventas Total:"+total+"</h4>"),"todos"==destino&&(window.parent.VentasAlmacen.query({},{sort:[{attribute:"fecha",descending:!0}]}).forEach(function(des){"11"==des.user_id&&(topeJanneth=parseInt(des.cantidad)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"10"==des.user_id&&(topeLina=parseInt(des.cantidad)+topeLina,isNaN(topeLina)&&(topeLina=0)),"15"==des.user_id&&(topeCesar=parseInt(des.cantidad)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"==des.user_id&&(topeYolanda=parseInt(des.cantidad)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"==des.user_id&&(topeDaniela=parseInt(des.cantidad)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"==des.user_id&&(topeRosalba=parseInt(des.cantidad)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0)),"23"==des.user_id&&(topeHanna=parseInt(des.cantidad)+topeHanna,isNaN(topeHanna)&&(topeHanna=0)),"22"==des.user_id&&(topeRocio=parseInt(des.cantidad)+topeRocio,isNaN(topeRocio)&&(topeRocio=0)),"18"==des.user_id&&(topeNathalia=parseInt(des.cantidad)+topeNathalia,isNaN(topeNathalia)&&(topeNathalia=0))}),topeSemanal=8,total=topeJanneth+topeCesar+topeRosalba+topeYolanda+topeDaniela,total&&$("h4.first").replaceWith("<h4 class='first'> Ventas Total:"+total+"</h4>"))),"mensual"==periodo&&(window.parent.DestinosAlmacen.query({sigla:destino}).forEach(function(des){topeMensual=parseInt(des.topeMensual),isNaN(topeMensual)&&(topeMensual=0)}),topeSemanal=0,topeSemestral=0,window.parent.VentasAlmacen.query({destino:destino}).forEach(function(des){mes=des.fecha,newMes=new Date(mes.replace(/-/g,",")),mesNum=newMes.getMonth(),currentDate=new Date,currentMonth=currentDate.getMonth(),mesNum==currentMonth&&("11"==des.user_id&&(total+=parseInt(des.cantidad),topeJanneth=parseInt(des.cantidad)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"15"==des.user_id&&(total+=parseInt(des.cantidad),topeCesar=parseInt(des.cantidad)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"==des.user_id&&(total+=parseInt(des.cantidad),topeYolanda=parseInt(des.cantidad)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"==des.user_id&&(total+=parseInt(des.cantidad),topeDaniela=parseInt(des.cantidad)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"==des.user_id&&(total+=parseInt(des.cantidad),topeRosalba=parseInt(des.cantidad)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0)))}),total&&$("h4.first").replaceWith("<h4 class='first'> Ventas Total:"+total+"</h4>"),"todos"==destino&&(window.parent.VentasAlmacen.query({},{sort:[{attribute:"fecha",descending:!0}]}).forEach(function(des){"11"==des.user_id&&(topeJanneth=parseInt(des.cantidad)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"10"==des.user_id&&(topeLina=parseInt(des.cantidad)+topeLina,isNaN(topeLina)&&(topeLina=0)),"15"==des.user_id&&(topeCesar=parseInt(des.cantidad)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"==des.user_id&&(topeYolanda=parseInt(des.cantidad)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"==des.user_id&&(topeDaniela=parseInt(des.cantidad)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"==des.user_id&&(topeRosalba=parseInt(des.cantidad)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0)),"23"==des.user_id&&(topeHanna=parseInt(des.cantidad)+topeHanna,isNaN(topeHanna)&&(topeHanna=0)),"22"==des.user_id&&(topeRocio=parseInt(des.cantidad)+topeRocio,isNaN(topeRocio)&&(topeRocio=0)),"18"==des.user_id&&(topeNathalia=parseInt(des.cantidad)+topeNathalia,isNaN(topeNathalia)&&(topeNathalia=0))}),topeMensual=35,total=topeJanneth+topeCesar+topeRosalba+topeYolanda+topeDaniela,total&&$("h4.first").replaceWith("<h4 class='first'> Ventas Total:"+total+"</h4>"))),"semestral"==periodo&&(window.parent.DestinosAlmacen.query({sigla:destino}).forEach(function(des){topeSemestral=parseInt(des.topeSemestral),isNaN(topeSemestral)&&(topeSemestral=0)}),topeMensual=0,topeSemanal=0,window.parent.VentasAlmacen.query({destino:destino}).forEach(function(des){"11"==des.user_id&&(total+=parseInt(des.cantidad),topeJanneth=parseInt(des.cantidad)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"15"==des.user_id&&(total+=parseInt(des.cantidad),topeCesar=parseInt(des.cantidad)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"==des.user_id&&(total+=parseInt(des.cantidad),topeYolanda=parseInt(des.cantidad)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"==des.user_id&&(total+=parseInt(des.cantidad),topeDaniela=parseInt(des.cantidad)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"==des.user_id&&(total+=parseInt(des.cantidad),topeRosalba=parseInt(des.cantidad)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0))}),total&&$("h4.first").replaceWith("<h4 class='first'> Ventas Total:"+total+"</h4>"),"todos"==destino&&(window.parent.VentasAlmacen.query({},{sort:[{attribute:"fecha",descending:!0}]}).forEach(function(des){"11"==des.user_id&&(topeJanneth=parseInt(des.cantidad)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"10"==des.user_id&&(topeLina=parseInt(des.cantidad)+topeLina,isNaN(topeLina)&&(topeLina=0)),"15"==des.user_id&&(topeCesar=parseInt(des.cantidad)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"==des.user_id&&(topeYolanda=parseInt(des.cantidad)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"==des.user_id&&(topeDaniela=parseInt(des.cantidad)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"==des.user_id&&(topeRosalba=parseInt(des.cantidad)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0)),"23"==des.user_id&&(topeHanna=parseInt(des.cantidad)+topeHanna,isNaN(topeHanna)&&(topeHanna=0)),"22"==des.user_id&&(topeRocio=parseInt(des.cantidad)+topeRocio,isNaN(topeRocio)&&(topeRocio=0)),"18"==des.user_id&&(topeNathalia=parseInt(des.cantidad)+topeNathalia,isNaN(topeNathalia)&&(topeNathalia=0))}),topeSemestral=100,total=topeJanneth+topeCesar+topeRosalba+topeYolanda+topeDaniela,total&&$("h4.first").replaceWith("<h4 class='first'> Ventas Total:"+total+"</h4>")))),chart.updateSeries("user",[topeJanneth,topeCesar,topeYolanda,topeRosalba,topeDaniela]),chart.updateSeries("semanal",[topeSemanal,topeSemanal,topeSemanal,topeSemanal,topeSemanal]),chart.updateSeries("mensual",[topeMensual,topeMensual,topeMensual,topeMensual,topeMensual]),chart.updateSeries("semestral",[topeSemestral,topeSemestral,topeSemestral,topeSemestral,topeSemestral]),chart.render()}function getWeekNumber(d){d=new Date(d),d.setHours(0,0,0),d.setDate(d.getDate()+4-(d.getDay()||7));var yearStart=new Date(d.getFullYear(),0,1),weekNo=Math.ceil(((d-yearStart)/864e5+1)/7);return weekNo}var chart=new dojox.charting.Chart2D("chartNode");topeSemanal=0,topeMensual=0,topeSemestral=100,topeJanneth=0,topeLina=0,topeCesar=0,topeYolanda=0,topeDaniela=0,topeRosalba=0,topeHanna=0,topeRocio=0,topeNathalia=0;var lasFechas=new Array;if(laFecha="",total=0,window.parent.VentasAlmacen.query({}).forEach(function(des){"11"==des.user_id&&(total+=parseInt(des.cantidad),topeJanneth=parseInt(des.cantidad)+topeJanneth,isNaN(topeJanneth)&&(topeJanneth=0)),"15"==des.user_id&&(total+=parseInt(des.cantidad),topeCesar=parseInt(des.cantidad)+topeCesar,isNaN(topeCesar)&&(topeCesar=0)),"13"==des.user_id&&(total+=parseInt(des.cantidad),topeYolanda=parseInt(des.cantidad)+topeYolanda,isNaN(topeYolanda)&&(topeYolanda=0)),"31"==des.user_id&&(total+=parseInt(des.cantidad),topeDaniela=parseInt(des.cantidad)+topeDaniela,isNaN(topeDaniela)&&(topeDaniela=0)),"19"==des.user_id&&(total+=parseInt(des.cantidad),topeRosalba=parseInt(des.cantidad)+topeRosalba,isNaN(topeRosalba)&&(topeRosalba=0)),lasFechas.push(des.fecha)}),laFecha=lasFechas.pop(),laFecha){var displayPattern="d-MMM-yyyy",d=dojo.date.stamp.fromISOString(laFecha);fechatotal=dojo.date.locale.format(d,{selector:"date",datePattern:displayPattern}),$("#second").replaceWith("<h5> Ultima Actualización:"+fechatotal+"</h5>")}total&&$("#first").replaceWith("<h4 class='first'> Ventas Total:"+total+"</h4>"),chart.setTheme(dojox.charting.themes.MiamiNice),chart.addPlot("default",{type:"Columns",markers:!0,gap:8}),chart.addAxis("x",{title:"Agentes",titleOrientation:"away",titleFontColor:"purple",labels:[{value:1,text:"Janneth"},{value:2,text:"Cesar"},{value:3,text:"Yolanda"},{value:4,text:"Adelaida"},{value:5,text:"Daniela"}],labelStyle:"inside"}),chart.addAxis("y",{title:"Topes",vertical:!0,includeZero:!0}),chart.addSeries("user",[topeJanneth,topeCesar,topeYolanda,topeRosalba,topeDaniela],{color:"#71DCD0"}),chart.addSeries("semanal",[topeSemanal,topeSemanal,topeSemanal,topeSemanal,topeSemanal],{color:"#EB5D82"}),chart.addSeries("mensual",[topeMensual,topeMensual,topeMensual,topeMensual,topeMensual],{color:"#F7EA9B"}),chart.addSeries("semestral",[topeSemestral,topeSemestral,topeSemestral,topeSemestral,topeSemestral],{color:"#C8A4DC"});new dojox.charting.action2d.Tooltip(chart,"default"),new dojox.charting.action2d.Highlight(chart,"default");chart.render(),$("#donde").change(function(){var str="";$("select option:selected").each(function(){str+=$(this).text()+" ",destino=str}),value=0,updateChart(value)}),$("#cuando").change(function(){var str="";$("select option:selected").each(function(){str+=$(this).text()+" ",destino=str}),value=0,updateChart(value)}),$("#llamadaEfect").on("click",function(e){e.preventDefault(),$("#bannerMain").replaceWith("<h4 id='bannerMain' style='display:inline;float:left;padding-left:7px;'>Reporte Ventas</h4>"),$(".mainBanner").replaceWith("<h4 class='mainBanner' style='display:inline;float:left; color:purple;border-right:1px solid grey;margin-top:5px; text-decoration:underline;font-weight:bolder;padding-right:7px;'><img src='/v15/mariposa/img/curved.png' width='30px'/>Reporte de Llamadas</h4>"),value=1,updateChart(value),$("#callsForm").toggle(),$("#ventasForm").toggle()}),$("#mainLink").on("click",function(e){e.preventDefault(),$("#bannerMain").replaceWith("<h4 id='bannerMain' style='display:inline;float:left; color:purple;text-decoration:underline;font-weight:bolder;padding-left:7px;'>Reporte Ventas</h4>"),$(".mainBanner").replaceWith("<h4 class='mainBanner' style='display:inline;float:left;border-right:1px solid grey;margin-top:5px;padding-right:7px;'><img src='/v15/mariposa/img/curved.png' width='30px'/>Reporte de Llamadas</h4>"),value=0,updateChart(value),$("#callsForm").toggle(),$("#ventasForm").toggle()})}),$(document).ready(function(){$("#callsForm").toggle();var dateObj=new Date,month=("0"+(dateObj.getMonth()+1)).slice(-2),day=("0"+dateObj.getDate()).slice(-2),year=dateObj.getUTCFullYear();$("#ventas").daterangepicker({format:"DD-MM-YYYY",startDate:day+"-"+month+"-"+year,endDate:day+"-"+month+"-"+year},function(start,end,label){}),$("#calls").daterangepicker({format:"DD-MM-YYYY",startDate:day+"-"+month+"-"+year,endDate:day+"-"+month+"-"+year},function(start,end,label){}),$("#ventas").on("apply.daterangepicker",function(ev,picker){$(".toDelete").remove(),require(["dojo/_base/xhr"],function(xhr){xhr.get({url:"/v15/mariposa/inscripcions/getVentas?startDate="+picker.startDate.format("YYYY-MM-DD")+"&endDate="+picker.endDate.format("YYYY-MM-DD"),load:function(result){var info=JSON.parse(result);console.log(info),$('<tr class="toDelete" id="headerRow"><th>Asesor</th><th>Ventas</th><th>Plazo</th></tr>').appendTo("#docTable"),info.forEach(function(des){$("<tr class='toDelete'><td>"+des.users.nombre+"</td><td>"+des[0].Ventas+"</td><td>"+picker.startDate.format("YYYY-MM-DD")+" Hasta "+picker.endDate.format("YYYY-MM-DD")+"</td></tr>").appendTo("#docTable")}),$("#callsModal").modal("show")}})})}),$("#calls").on("apply.daterangepicker",function(ev,picker){$(".toDelete").remove(),console.log(picker.startDate.format("YYYY-MM-DD")),require(["dojo/_base/xhr"],function(xhr){xhr.get({url:"/v15/mariposa/inscripcions/llamadas?startDate="+picker.startDate.format("YYYY-MM-DD")+"&endDate="+picker.endDate.format("YYYY-MM-DD"),load:function(result){var info=JSON.parse(result);$('<tr class="toDelete" id="headerRow"><th>Asesor</th><th>Llamadas</th><th>Plazo</th></tr>').appendTo("#docTable"),info.forEach(function(des){$("<tr class='toDelete'><td>"+des.users.nombre+"</td><td>"+des[0].llamadasEfectivas+"</td><td>"+picker.startDate.format("YYYY-MM-DD")+" Hasta "+picker.endDate.format("YYYY-MM-DD")+"</td></tr>").appendTo("#docTable")}),$("#callsModal").modal("show")}})})})}),$(document).ready(function(){var dolar="";window.parent.MonedasAlmacen.query({moneda:"Dolar"},{sort:[{attribute:"fecha",descending:!1}]}).forEach(function(des){dolar=des.valor});var euro="";window.parent.MonedasAlmacen.query({moneda:"Euro"},{sort:[{attribute:"fecha",descending:!1}]}).forEach(function(des){euro=des.valor}),$("<tr><td class='onclick' >"+dolar+"</td><td class='onclick' >"+euro+"</td></tr>").appendTo("#monedaTable"),$(document).on("click","td.onclick",function(){if("contador"==window.parent.rolusuarioactivo){var inscripcionactiva=window.parent.MonedasAlmacen.get(1);document.getElementById("dolar").value=decodeURIComponent(inscripcionactiva.valor);var inscripcionactiva=window.parent.MonedasAlmacen.get(2);document.getElementById("euro").value=decodeURIComponent(inscripcionactiva.valor),$("#monedaModal").modal("show")}})}),$(document).ready(function(e){window.parent.destino.forEach(function(destino){$("#donde").append("<option value='"+destino.sigla+"'>"+destino.name+"</option>")})});
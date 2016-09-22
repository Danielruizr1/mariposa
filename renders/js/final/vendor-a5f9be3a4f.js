function loadedSeg(){gapi.auth.authorize({client_id:CLIENT_ID,scope:SCOPES.join(" "),immediate:!0},done)}function done(){gapi.client.load("calendar","v3",function(){console.log("loaded calendar")}),gapi.client.load("gmail","v1",function(){console.log("loaded gmail")})}function addMedio(){medio=document.getElementById("agregarMedio").value,medio?(medio=medio.toUpperCase(),$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/agregamedio",data:{medio:medio},context:this}).done(function(result){if(result==-1)alert("El medio ingresado se encuentra disponible en la lista");else{$("#agencia-list").append("<option id='"+result+"' value='"+medio+"'>");var entada={id:result,name:medio};window.parent.AgenciasAlmacen.put(entada),alert("Se ha ingresado con éxito el nuevo medio")}})):alert("Por favor no dejar el campo vacio")}function moveBitacora(){$(".form-container").toggleClass("fullWidth")}function check(){$(".checkClass:checked").length==$(".checkClass").length&&$("#aprovadoButton").prop("disabled",!1)}var CLIENT_ID="976358932263-7jupd6ts34s6c1rovb11n03oq9r919pt.apps.googleusercontent.com",SCOPES=["https://www.googleapis.com/auth/calendar","https://www.googleapis.com/auth/gmail"],Seguimiento=function(id){var seg=Object.create(Seguimiento.prototype);if(seg.llamadaEfectiva="0",seg.url="seg",seg.user=window.parent.idusuarioactivo,seg.number=segNumber,segNumber=++segNumber,seg.insc=window.parent.inscripcionAlmacen.get(id),seg.data2={},0!=id)seg.createHeader(id),seg.type="edit",seg.data=window.parent.seguimientoAlmacen.get(id),seg.blockFields(),seg.bitacora=window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort:[{attribute:"fecha",descending:!0},{attribute:"hora",descending:!0}]}),0==seg.bitacora.total&&seg.downloadBitacora(id),seg.setBitacora();else{var date=seg.getDate(1);seg.type="new",seg.data={},seg.data.id=0,seg.data.nombreAgente=window.parent.nombreuseract,seg.data.agente=seg.user,seg.data.estado=1,seg.data.hora=date.hora,seg.data.fechaingreso=date.fecha,seg.bitacora=[]}return seg.setValues(),seg.setListeners(),seg};Seguimiento.prototype.alertBitacora=function(){$(".warning").addClass("show"),window.setTimeout(function(){$(".warning").removeClass("show")},3e3)},Seguimiento.prototype.required=function(){var required=!0;return $(".requiredd").each(function(){""!=$(this).val()&&"null"!=$(this).val()||(required=!1,$(this).addClass("missing"))}),0==required&&alert("Debes llenar todos los campos obligatorios *"),required},Seguimiento.prototype.saveValues=function(){var required=this.required();if(required){var urls={};urls.seg="/v15/mariposa/seguimientos/recibeajax",urls.insc="/v15/mariposa/inscripcions/recibeajax";var type=this.type;for(key in this.data2)this.data[key]=this.data2[key];"new"==type&&(this.newBita="Nuevo Seguimiento Creado por "+this.data.nombreAgente+", De la quinceañera "+this.data.nombrequinceanera),"change"==type&&this.saveBitacora(),$("#Enviar").attr("disabled","disabled"),$.ajax({method:"POST",url:urls[this.url],data:{data:this.data},context:this},this).done(function(result){$("input, select").removeClass("missing"),result!=-1&&result!=-2&&($(".modal-body").append("<p>El seguimiento se ha ingresado con éxito</p>"),$("#confirmModal").modal("show"),this.data.id=result,this.data.numId=parseInt(result),window.parent.seguimientoAlmacen.put(this.data),window.parent.seguimiento=window.parent.seguimientoAlmacen.data,document.getElementById("est").innerHTML=" No."+result,this.saveBitacora(),$("#Enviar").attr("disabled",!1)),result==-1&&($(".modal-body").append("<p>El seguimiento se ha ingresado con éxito</p>"),$("#confirmModal").modal("show"),window.parent.seguimientoAlmacen.put(this.data),window.parent.seguimiento=window.parent.seguimientoAlmacen.data,$("#Enviar").attr("disabled",!1)),result==-2&&("Seg"==this.type&&(this.createSpecial(),this.setPagosAyuda(),this.type="Ins"),$(".modal-body").append("<p>La inscripción se ha ingresado con éxito</p>"),$("#confirmModal").modal("show"),window.parent.inscripcionAlmacen.put(this.data),window.parent.inscripcion=window.parent.inscripcionAlmacen.data,$("#Enviar").attr("disabled",!1))})}},Seguimiento.prototype.setValues=function(){var data=this.data;$("input, select, textarea").each(function(input){var clase=$(this).hasClass("noSet");this.id&&0==clase&&this.id in data&&($(this).val(data[this.id]),$(this).hasClass("ciudades")&&$(this).val(lists.ciudad[data[this.id]]))}),document.getElementById("est").innerHTML=" No."+data.id,"insc"==this.url&&(this.setDocs(),this.setPagos(),this.setPagosAyuda(),this.setHermanas(),this.setAmigas(),this.setFields())},Seguimiento.prototype.setBitacora=function(){var bitacoras=this.bitacora,length=0;"insc"==this.url&&(bitacoras=this.bitacora2.concat(bitacoras),length=this.bitacora2.length);var meses=[" ","ENE-","FEB-","MAR-","ABR-","MAY-","JUN-","JUL-","AGO-","SEP-","OCT-","NOV-","DIC-"],contenido="",count=0;bitacoras.forEach(function(bitacora){var classs="";count<length&&(classs="color"),count++,fecha=""+bitacora.fecha,arreglofecha=fecha.split("-"),mes=parseInt(arreglofecha[1]),fechatotal=arreglofecha[2]+"-"+meses[mes]+arreglofecha[0],hora=""+bitacora.hora,arrayhora=hora.split(":"),hor=parseInt(arrayhora[0]),minu=arrayhora[1],hor>12?(hor-=12,meri="Pm",horatotal=hor+":"+minu+" "+meri):(meri="Am",horatotal=hor+":"+minu+" "+meri),contenido+='<div class="bitacora-item '+classs+'"><div class="bitacora-name">'+bitacora.nombreUsuario+'</div><div class="bitacora-content">'+decodeURIComponent(bitacora.ingreso)+'</div><div class="bitacora-date">'+fechatotal+"  "+horatotal+'</div><div style="clear:both;"></div></div>'}),$("#list").empty(),document.getElementById("list").innerHTML=contenido},Seguimiento.prototype.saveBitacora=function(){var controller=this,urls={};urls.seg="/v15/mariposa/seguimientos/recibeBitacora",urls.insc="/v15/mariposa/inscripcions/recibeBitacora";var contenido=document.getElementById("bitacora").value,alert="1";if("new"!=this.type&&"change"!=this.type||(contenido=this.newBita,alert="0",this.type="edit"),contenido){var date=this.getDate(1),bitacora={idseguimiento:this.data.id,nombreUsuario:window.parent.nombreuseract,usuario:window.parent.idusuarioactivo,ingreso:decodeURIComponent(contenido),llamadaEfectiva:this.llamadaEfectiva,fecha:date.fecha,hora:date.hora};$.ajax({method:"POST",url:urls[this.url],data:bitacora,context:this}).done(function(idBitacora){controller.alertBitacora(),bitacora.id=idBitacora,this.data.bitacora=alert,"seg"==this.url?(this.bitacora.unshift(bitacora),window.parent.bitacoraAlmacen.add(bitacora),window.parent.bitacoraHoyAlmacen.add(bitacora),this.data.ultimo_contacto=bitacora.fecha,window.parent.seguimientoAlmacen.put(this.data),window.parent.seguimiento=window.parent.seguimientoAlmacen.data):(this.bitacora2.unshift(bitacora),window.parent.bitacora2Almacen.add(bitacora),window.parent.inscripcionAlmacen.put(this.data),window.parent.inscripcion=window.parent.inscripcionAlmacen.data),this.setBitacora(),window.parent.carganoti()}),$("#bitacora").val("")}},Seguimiento.prototype.saveCalendar=function(){var controller=this,contenido=document.getElementById("bitacora").value,eventStart=new Date(document.getElementById("eventStart").value).toISOString(),eventStart=eventStart.replace(".000Z","");console.log(eventStart);var eventEnd=new Date(document.getElementById("eventEnd").value).toISOString(),eventEnd=eventEnd.replace(".000Z","");console.log(eventEnd);var dateNow=new Date,event={summary:"Seguimiento "+controller.data.id+" Fecha: "+dateNow,description:contenido,location:"Bogota, Colombia",start:{dateTime:eventStart,timeZone:"America/Bogota"},end:{dateTime:eventEnd,timeZone:"America/Bogota"},attendees:[],reminders:{useDefault:!1,overrides:[{method:"email",minutes:1440},{method:"popup",minutes:10}]}},request=gapi.client.calendar.events.insert({calendarId:"primary",resource:event});request.execute(function(event){console.log(event.htmlLink),event.htmlLink&&void 0!=event.htmlLink&&($("#calendarioModal").modal("hide"),controller.saveBitacora())})},Seguimiento.prototype.getDate=function(p){p="undefined"!=typeof p?p:0,Time=new Date,1==p?fecha=Time.getFullYear()+"-"+(Time.getMonth()+1)+"-"+Time.getDate():fecha=Time.getFullYear()+"-0"+(Time.getMonth()+1)+"-"+Time.getDate(),hora=Time.getHours()+":",Time.getMinutes()<10?hora+="0"+Time.getMinutes():hora+=Time.getMinutes(),hora+=":"+Time.getSeconds();var date={fecha:fecha,hora:hora};return date},Seguimiento.prototype.setLLamadaEfectiva=function(){"0"==this.llamadaEfectiva?(this.llamadaEfectiva="1",$("#llamadaEfectiva").toggleClass("btn-success")):(this.llamadaEfectiva="0",$("#llamadaEfectiva").toggleClass("btn-success")),$("#callIcon").toggleClass("glyphicon-ok"),$("#callIcon").toggleClass("glyphicon-earphone")},Seguimiento.prototype.transferir=function(){var nombreT=document.getElementById("transferir").value,opcion=$("#agente-list").find('option[value="'+nombreT+'"]'),idT=$(opcion).attr("id"),bitacora=this.data.nombreAgente+" ha transferido el segumiento actual a "+nombreT,date=this.getDate(1),transferencia={iduser:nombreT,idseguimiento:this.data.id,idantiguo:this.data.nombreAgente,iduserantiguo:this.data.agente};$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/transferencia",data:transferencia,context:this}).done(function(idBitacora){var resultado={id:idBitacora,idseguimiento:this.data.id,usuario:window.parent.nombreuseract,ingreso:bitacora,fecha:date.fecha,hora:date.hora};this.bitacora.unshift(resultado),window.parent.bitacoraAlmacen.add(resultado),window.parent.bitacoraHoyAlmacen.add(resultado),this.setBitacora()}),this.data.agente=idT,this.data.nombreAgente=nombreT,this.setValues(),this.blockFields(),window.parent.seguimientoAlmacen.put(this.data),window.parent.segumiento=window.parent.seguimientoAlmacen.data,alert("Se transfirió el seguimiento exitosamente")},Seguimiento.prototype.blockFields=function(){var disabled=!1;this.user!=this.data.agente&&(disabled=!0,$("#Enviar").hide()),this.insc&&(disabled=!0,$("textarea").prop("disabled",disabled),$(".insc-row").show()),$("input, select, .form-div > textarea").each(function(e){"agregarSegg"!=this.id&&"nombreAgente"!=this.id&&"ultimo_contacto"!=this.id&&"fechaingreso"!=this.id&&$(this).prop("disabled",disabled)})},Seguimiento.prototype.setListeners=function(){$("button").off(),$("input, select, textarea").off("change"),$(".mailClick").off();var elSeguimiento=this;$(".mailClick").on("click",function(e){e.preventDefault();var mail=$(this).data("id");elSeguimiento.sendMail(mail)}),$("#Enviar").click(function(e){e.preventDefault(),elSeguimiento.saveValues()}),$("#guardarBita").click(function(e){e.preventDefault(),elSeguimiento.saveBitacora()}),$("#guardaCalendario").click(function(e){e.preventDefault(),elSeguimiento.saveCalendar()}),$("#showCalendario").click(function(e){e.preventDefault(),$("#calendarioModal").modal("show")}),$("#llamadaEfectiva").click(function(e){e.preventDefault(),elSeguimiento.setLLamadaEfectiva()}),$("#transferirBtn").click(function(e){e.preventDefault(),elSeguimiento.transferir()}),$("input, select, textarea").on("change",function(){if("bitacora"!=this.id&&($("#Enviar").show(),elSeguimiento.data2[this.id]=$(this).val(),"email"==this.type&&(elSeguimiento.data2[this.id]=elSeguimiento.data2[this.id].toLowerCase()),"nombrequinceanera"==this.id&&"new"!=elSeguimiento.type&&elSeguimiento.data2[this.id]!=elSeguimiento.data[this.id]&&(elSeguimiento.type="change",elSeguimiento.newBita="El nombre de la quinceañera ha cambiado de "+elSeguimiento.data[this.id]+" a "+elSeguimiento.data2[this.id]),"estado"==this.id&&"Ins"!=elSeguimiento.type&&elSeguimiento.data2[this.id]!=elSeguimiento.data[this.id])){elSeguimiento.type="change";var estado={1:"Pendiente",2:"Inscrita",3:"No Inscrita"};elSeguimiento.newBita="El estado ha cambiado de "+estado[elSeguimiento.data[this.id]]+" a "+estado[elSeguimiento.data2[this.id]]}var list=$(this).data("list");if(list){var realID=$(this).data("real");$(this).hasClass("ciudades")?elSeguimiento.data2[this.id]=lists.ciudad[this.value]:elSeguimiento.data2[realID]=lists[list][this.value]}}),$(".check2").on("change",function(){elSeguimiento.setSameFields()})},Seguimiento.prototype.createHeader=function(id){$(".seg-header").append("<div class='col-sm-2 btnHolder'><span class='segBtn' data-segId='"+id+"'>Seg: "+id+"</span> <button type='button' class='close' data-id='"+id+"' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")},Seguimiento.prototype.downloadBitacora=function(id,callback){$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/cargarBita",data:{id:id},context:this,dataType:"json"}).done(function(data){var obj=data;for(key in obj)this.bitacora.push(obj[key]),window.parent.bitacoraAlmacen.add(obj[key]);this.bitacora=window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort:[{attribute:"fecha",descending:!0},{attribute:"hora",descending:!0}]}),this.setBitacora()})},Seguimiento.prototype.setSameFields=function(){var parentesco=this.data2.parentesco||this.data.parentesco||"",clases=["nombre","celular","email"];clases.forEach(function(clas){var value=$("."+clas).val();$("."+clas+parentesco).val(value);var id=$("."+clas+parentesco).attr("id");this.data2[id]=value},this)},Seguimiento.prototype.sendMail=function(mail){var email=this.data2[mail]||this.data[mail];$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/reenviarcorreo",data:{user:this.data.agente,destinoquin:this.data.destino,email:email,id:this.data.id,nombre:this.data.nombrequienllama},success:function(){$(".modal-body").append("<p>El correo se ha enviado con éxito</p>"),$("#confirmModal").modal("show")}},this)};var Inscripcion=function(id,whatis){var insc=Object.create(Inscripcion.prototype);return insc.type=whatis,insc.url="insc",insc.data2={},insc.pagos={},insc.pagos.pendientePesos=0,insc.pagos.pendienteDolares=0,insc.pagos.pendienteEuros=0,insc.bitacora2=window.parent.bitacora2Almacen.query({idseguimiento:id},{sort:[{attribute:"fecha",descending:!0},{attribute:"hora",descending:!0}]}),insc.bitacora=window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort:[{attribute:"fecha",descending:!0},{attribute:"hora",descending:!0}]}),0==insc.bitacora.total&&insc.downloadBitacora(id),"Seg"==whatis?insc.data=window.parent.seguimientoAlmacen.get(id):insc.data=window.parent.inscripcionAlmacen.get(id),insc.setBitacora(),insc.setValues(),insc.setListeners(),insc.setListeners2(),insc};Inscripcion.prototype=Object.create(Seguimiento.prototype),Inscripcion.prototype.constructor=Inscripcion,Inscripcion.prototype.setListeners2=function(){var inscripcion=this;$(".displayers").on("change",function(){switch($(this).data("display")){case"agencia":"si"==this.value?$("#agenciaTab").show():$("#agenciaTab").hide();break;case"visa":"si"==this.value?($("#divVisa1").show(),$("#visaTab").hide(),$("#visaAprobada").val("")):($("#divVisa1").hide(),$("#visaTab").show(),$("#visaAprobada").val("no"),inscripcion.data2.visaAprobada="no")}}),$("#foto").on("click",function(e){var required=inscripcion.required();required&&$("#theFile").trigger("click")}),$("#theFile").on("change",function(e){inscripcion.uploadPhoto()}),$("#docTable").on("click",".saveDoc",function(e){inscripcion.saveDoc(this)}),$("#docTable").on("click",".notaShow",function(e){var index=this.value;document.getElementById("addNotaButton").value=index,$("#notaModal").modal("show")}),$("#docTable").on("click",".recibidoCheck",function(e){inscripcion.recibido(this)}),$("#docTable").on("click",".aprobadoCheck",function(e){inscripcion.aprovado(this)}),$(".saveNota").on("click",function(e){inscripcion.saveNota(this)}),$("#aprovadoButton").on("click",function(e){inscripcion.recibido2(),$("#seguroModal").modal("hide")}),$("form#pagosForm").on("submit",function(e){e.preventDefault();var obj={},data=$(this).serializeArray();data.forEach(function(field){obj[field.name]=field.value,"concepto2"==field.name&&field.value&&(obj.concepto=field.value)}),inscripcion.savePago(obj)}),$("form#hermanasForm").on("submit",function(e){e.preventDefault(),inscripcion.saveHermana()}),$("form#amigasForm").on("submit",function(e){e.preventDefault(),inscripcion.saveAmiga()})},Inscripcion.prototype.setDocs=function(){window.parent.InscripdocumentosAlmacen.query({inscripcion_id:this.data.id}).forEach(function(insc){insc.nota||(insc.nota="<button type='button' class='btn btn-primary notaShow' id='notaModalShow"+insc.id+"' style='background-color:#96689F' value='"+insc.id+"'>Agregar</button>");var user=new Object,fechatotalp="",fechatotalR="";insc.fechaAprovado&&(fechatotalp=insc.fechaAprovado),insc.fechaRecibido&&(fechatotalR=insc.fechaRecibido),documento=window.parent.DocumentosAlmacen.get(insc.doc_id),documento&&(insc.aprovadoPor?user=window.parent.UsuariosAlmacen.get(insc.aprovadoPor):user.nombre="",insc.documento?$("<tr class='added'><td>"+documento.nombre+"</td><td><input type='checkbox' id='recibido"+insc.id+"' class='recibidoCheck' value='1'></td><td><input type='checkbox' id='aprovado"+insc.id+"' class='aprobadoCheck' value='2'></td><td>"+fechatotalR+"</td><td>"+fechatotalp+"</td><td>"+user.nombre+"</td><td><a href='/v15/mariposa/"+insc.documento+"' target='_Blank'>ver: "+documento.nombre+"</a></td><td class='onHover'><div class='onclick' data-insc='"+insc.id+"' >"+insc.nota+"</div></td></tr><tr>"+incs.abreviatura+"</tr><tr>"+incs.proceso+"</tr>").appendTo("#docTable"):$("<tr class='added'><td>"+documento.nombre+"</td><td><input type='checkbox' id='recibido"+insc.id+"' class='recibidoCheck' value='1'></td><td><input type='checkbox' id='aprovado"+insc.id+"' class='aprobadoCheck' value='2'></td><td>"+fechatotalR+"</td><td>"+fechatotalp+"</td><td>"+user.nombre+"</td><td><form id='documentoForm"+insc.id+"' enctype='multipart/form-data'><input type='file' id='doc"+insc.id+"' class='elDocumento'><button type='button' class='btn btn-primary saveDoc' value='"+insc.id+"' style='background-color:#96689F'>Subir</button></form></td><td class='onHover'><div class='onclick' data-insc='"+insc.id+"' >"+insc.nota+"</div></td></tr>").appendTo("#docTable"),"1"==insc.recibido&&$("#recibido"+parseInt(insc.id)).prop("checked",!0),"1"==insc.aprovado&&$("#aprovado"+parseInt(insc.id)).prop("checked",!0))})},Inscripcion.prototype.setPagosAyuda=function(){window.parent.PagosDestinoAlmacen.query({destino_id:this.data.iddestino}).forEach(function(desti){var concepto=desti.pago,n=concepto.search("\\*"),valor=desti.valor,currency=desti.moneda,moneda="";switch(currency){case"1":moneda="Pesos";break;case"2":moneda="Dolares";break;case"3":moneda="Euros"}if(n&&"Seg"==this.type){var data={concepto:concepto,realizadoPor:"",valorPago:valor*-1,currency:currency};this.savePago(data)}$("<tr><td>"+concepto+"</td><td>"+valor*-1+"</td><td>"+moneda+"</td></tr>").appendTo("#ayudaTable")},this)},Inscripcion.prototype.setHermanas=function(){window.parent.HermanasAlmacen.query({inscripcion_id:this.data.id}).forEach(function(hermana){$("#headerRowHermana").show();var fecha="";hermana.edad&&(fecha=hermana.edad),$("<tr><td>"+hermana.nombre+"</td><td>"+fecha+"</td></tr>").appendTo("#hermanaTable")})},Inscripcion.prototype.setAmigas=function(){window.parent.AmigasAlmacen.query({inscripcion_id:this.data.id}).forEach(function(hermana){$("#headerRowAmiga").show(),$("<tr><td>"+hermana.nombre+"</td><td>"+lists.destino[hermana.destino]+"</td></tr>").appendTo("#amigaTable")})},Inscripcion.prototype.setPagos=function(p){if(p="undefined"!=typeof p?p:0,0==p){var dateObj=new Date,month=("0"+(dateObj.getMonth()+1)).slice(-2),day=("0"+dateObj.getDate()).slice(-2),year=dateObj.getUTCFullYear(),fecha2=year+"-"+month+"-"+day;window.parent.PagosAlmacen.query({inscripcion_id:this.data.id}).forEach(function(pago){var conceptoName=pago.concepto,fecha=pago.fecha;switch(pago.currency){case"1":this.pagos.pendientePesos=this.pagos.pendientePesos+JSON.parse(pago.valor),$("<tr class='losPagos'><td>"+conceptoName+"</td><td>"+pago.valor+"</td><td>0</td><td>0</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");break;case"2":this.pagos.pendienteDolares=this.pagos.pendienteDolares+JSON.parse(pago.valor),$("<tr class='losPagos'><td>"+conceptoName+"</td><td>0</td><td>"+pago.valor+"</td><td>0</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");break;case"3":this.pagos.pendienteEuros=this.pagos.pendienteEuros+JSON.parse(pago.valor),$("<tr class='losPagos'><td>"+conceptoName+"</td><td>0</td><td>0</td><td>"+pago.valor+"</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos")}},this)}$("#pagosPendientes").replaceWith("<tr id='pagosPendientes'><th>Pendientes</th><th>"+this.pagos.pendientePesos+"</th><th>"+this.pagos.pendienteDolares+"</th><th>"+this.pagos.pendienteEuros+"</th><th colspan='2'>"+fecha2+"</th></tr>")},Inscripcion.prototype.saveDoc=function(x){var inscDocID=x.value,theFile=document.getElementById("doc"+inscDocID),file=theFile.files[0],destinoNombre=(this.data.id,lists.destino[this.data.iddestino]),index=$(x).closest("tr").index(),anoquin=this.data.anoviaje_quinceanera;switch(this.data.mesviaje_quinceanera){case"06":var mesquin="Junio";break;case"12":var mesquin="Diciembre"}var nombrequin2=this.data.nombrequinceanera;if(file){var data=new FormData;data.append("doc",file),data.append("destino",destinoNombre),data.append("mes",mesquin),data.append("year",anoquin),data.append("nombre",nombrequin2),data.append("id",inscDocID),nombreFile=file.name.replace(/\s/g,"_"),nombre=nombrequin2.replace(/\s/g,"_"),eldestino=destinoNombre.replace(/\s/g,"_"),$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/guardaDoc",data:data,cache:!1,contentType:!1,processData:!1,success:function(data){$("#documentoForm"+inscDocID).hide();var a=document.createElement("a"),linkText=document.createTextNode("ver: Documento");a.appendChild(linkText),a.title="ver: Documento",a.href="/v15/mariposa/docs/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"/"+nombreFile,a.target="_blank",document.getElementById("docTable").rows[index].cells[6].appendChild(a);var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(inscDocID);inscripcionactualizar.documento="docs/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"/"+nombreFile,window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar)}})}},Inscripcion.prototype.saveNota=function(x){var bitacora=document.getElementById("notaArea").value,data={bitacora:bitacora,id:x.value};$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/guardaDoc",data:data,success:function(result){var y=document.getElementById("notaModalShow"+x.value);y||(y=$('.onclick[data-insc="'+x.value+'"]'));var index=$(y).closest("tr").index();document.getElementById("docTable").rows[index].cells[7].innerHTML="<div class='onclick' data-insc='"+x.value+"'>"+bitacora+"</div>";var doc=window.parent.InscripdocumentosAlmacen.get(x.value);doc.nota=bitacora,$("#notaModal").modal("hide"),window.parent.InscripdocumentosAlmacen.put(doc)}})},Inscripcion.prototype.savePago=function(data){data.idInsc=this.data.id,data.pendiente=0;var dateObj=new Date,month=("0"+(dateObj.getMonth()+1)).slice(-2),day=("0"+dateObj.getDate()).slice(-2),year=dateObj.getUTCFullYear(),fecha=year+"-"+month+"-"+day;switch(data.currency){case"1":this.pagos.pendientePesos=JSON.parse(this.pagos.pendientePesos)+JSON.parse(data.valorPago),$("<tr><td>"+data.concepto+"</td><td>"+data.valorPago+"</td><td>0</td><td>0</td><td>"+fecha+"</td><td>"+data.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");break;case"2":this.pagos.pendienteDolares=JSON.parse(this.pagos.pendienteDolares)+JSON.parse(data.valorPago),$("<tr><td>"+data.concepto+"</td><td>0</td><td>"+data.valorPago+"</td><td>0</td><td>"+fecha+"</td><td>"+data.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");break;case"3":this.pagos.pendienteEuros=JSON.parse(this.pagos.pendienteEuros)+JSON.parse(data.valorPago),$("<tr><td>"+data.concepto+"</td><td>0</td><td>0</td><td>"+data.valorPago+"</td><td>"+fecha+"</td><td>"+data.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos")}$("#pagosPendientes").replaceWith("<tr id='pagosPendientes'><th>Pendientes</th><th>"+this.pagos.pendientePesos+"</th><th>"+this.pagos.pendienteDolares+"</th><th>"+this.pagos.pendienteEuros+"</th><th colspan='2'>"+fecha+"</th></tr>"),0==this.pagos.pendientePesos&&0==this.pagos.pendienteDolares&&0==this.pagos.pendienteEuros&&(data.pendiente=1),$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/guardaPago",data:data,success:function(result){$("#concepto2").val(""),$("#concepto2").hide(),$("#concepto").show();var num=JSON.parse(result),resultado={id:num,inscripcion_id:data.idInsc,concepto:data.concepto,valor:data.valorPago,currency:data.currency,fecha:fecha,realizadoPor:data.realizadoPor};window.parent.PagosAlmacen.add(resultado)}})},Inscripcion.prototype.recibido=function(x){var inscID=this.data.id,state=x.value,index=$(x).closest("tr").index(),documentoID=0;user=window.parent.idusuarioactivo;var documento=document.getElementById("docTable").rows[index].cells[0].innerHTML;window.parent.DocumentosAlmacen.query({nombre:documento}).forEach(function(doc){documentoID=doc.id}),$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/updateDocumento",data:{inscripcionID:inscID,documento:documentoID,state:state,user:user},success:function(result){var id=JSON.parse(result),dateObj=new Date,month=("0"+(dateObj.getMonth()+1)).slice(-2),day=("0"+dateObj.getDate()).slice(-2),year=dateObj.getUTCFullYear();if("1"==state){var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(id);inscripcionactualizar.recibido=1,inscripcionactualizar.fechaRecibido=year+"-"+month+"-"+day,document.getElementById("docTable").rows[index].cells[3].innerHTML=year+"-"+month+"-"+day,window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar),window.parent.inscipdocumento=window.parent.InscripdocumentosAlmacen.data;var inscripcionactualizar=window.parent.inscripcionAlmacen.get(inscID);inscripcionactualizar.docRecibido=1,window.parent.inscripcionAlmacen.put(inscripcionactualizar),window.parent.inscripcion=window.parent.inscripcionAlmacen.data}}})},Inscripcion.prototype.aprovado=function(x){var index=$(x).closest("tr").index();document.getElementById("index").value=index;var documentoID=0,detalleID=0,doc=document.getElementById("docTable").rows[index].cells[0].innerHTML;window.parent.DocumentosAlmacen.query({nombre:doc}).forEach(function(doc){documentoID=doc.id}),window.parent.DetalleDocumentosAlmacen.query({docID:documentoID}).forEach(function(doc){detalleID=doc.id,pregunta=doc.pregunta,ejemplo=doc.ejemplo}),0!=detalleID?(document.getElementById("index").value=index,$(".remove").remove(),$("#seguroModal").modal("show"),window.parent.DetalleDocumentosAlmacen.query({docID:documentoID}).forEach(function(doc){doc.ejemplo?$("<tr class='remove'><td><input type='checkbox' class='checkClass' onclick='check()'></td><td class='remove'>"+doc.pregunta+"</td><td class='remove'><a href='/v15/mariposa/"+doc.ejemplo+"' target='_blank'>Ver Ejemplo</a></td></tr>").appendTo("#checkTable"):$("<tr class='remove'><td><input type='checkbox' class='checkClass'></td><td class='remove'>"+doc.pregunta+"</td><td class='remove'>Ejemplo no disponible</td></tr>").appendTo("#checkTable")})):this.recibido2()},Inscripcion.prototype.recibido2=function(){var inscID=this.data.id,state=2,index=document.getElementById("index").value,documentoID=0;user=window.parent.idusuarioactivo;var documento=document.getElementById("docTable").rows[index].cells[0].innerHTML;window.parent.DocumentosAlmacen.query({nombre:documento}).forEach(function(doc){documentoID=doc.id}),$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/updateDocumento",data:{inscripcionID:inscID,documento:documentoID,state:state,user:user},success:function(result){var id=JSON.parse(result),dateObj=new Date,month=("0"+(dateObj.getMonth()+1)).slice(-2),day=("0"+dateObj.getDate()).slice(-2),year=dateObj.getUTCFullYear(),inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(id);user2=window.parent.UsuariosAlmacen.get(user),document.getElementById("docTable").rows[index].cells[4].innerHTML=year+"-"+month+"-"+day,document.getElementById("docTable").rows[index].cells[5].innerHTML=user2.nombre,inscripcionactualizar.aprovado=1,inscripcionactualizar.fechaAprovado=year+"-"+month+"-"+day,inscripcionactualizar.aprovadoPor=user,window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar),window.parent.inscipdocumento=window.parent.InscripdocumentosAlmacen.data;var inscripcionactualizar=window.parent.inscripcionAlmacen.get(inscID);inscripcionactualizar.docAprovado=1,window.parent.inscripcionAlmacen.put(inscripcionactualizar),window.parent.inscripcion=window.parent.inscripcionAlmacen.data}})},Inscripcion.prototype.saveHermana=function(){var nombre=$("input[name=nombreHermana]").val(),edad=$("input[name=edadHermana]").val(),idInsc=this.data.id;$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/guardaHermana",data:{nombre:nombre,edad:edad,idInsc:idInsc},success:function(result){alert("La hermana se ha agregado con exito"),$("#headerRowHermana").show(),$("<tr><td>"+nombre+"</td><td>"+edad+"</td></tr>").appendTo("#hermanaTable");var num=JSON.parse(result),resultado={id:num,inscripcion_id:idInsc,nombre:nombre,edad:edad};window.parent.HermanasAlmacen.add(resultado)}})},Inscripcion.prototype.saveAmiga=function(){nombre=$("input[name=nombreAmiga]").val(),destino=$("select[name=destinoAmiga]").val();var idInsc=this.data.id;destino2="",window.parent.DestinosAlmacen.query({id:destino}).forEach(function(desti){destino2=desti.name}),$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/guardaAmiga",data:{nombre:nombre,destino:destino,idInsc:idInsc},success:function(result){alert("La Amiga se ha agregado con exito"),$("#headerRowAmiga").show(),$("<tr><td>"+nombre+"</td><td>"+destino2+"</td></tr>").appendTo("#amigaTable");var num=JSON.parse(result),resultado={id:num,inscripcion_id:idInsc,nombre:nombre,destino:destino};window.parent.AmigasAlmacen.add(resultado)}})},Inscripcion.prototype.setFields=function(){this.data.foto&&($("#theImg").attr("src","/v15/mariposa/"+this.data.foto),$("#theImg").show()),"no"==this.data.tieneVisa?($("#divVisa1").hide(),$("#visaTab").show()):"si"==this.data.tieneVisa&&($("#divVisa1").show(),$("#visaTab").hide()),"si"==this.data.esAgencia&&$("#agenciaTab").show()},Inscripcion.prototype.createSpecial=function(){var id=this.data.id;window.parent.DestinocumentosAlmacen.query({destino_id:this.data.iddestino}).forEach(function(desti){window.parent.DocumentosAlmacen.query({id:desti.doc_id}).forEach(function(doc){$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/guardaDocumento",data:{documento:doc.id,inscripcionID:id},success:function(result){var num=JSON.parse(result),resultado={id:num,doc_id:doc.id,inscripcion_id:id,recibido:0,aprovado:0,fechaRecibido:"",fechaAprovado:"",aprovadoPor:"",documento:""};window.parent.InscripdocumentosAlmacen.add(resultado),$("<tr class='added'><td>"+doc.nombre+"</td><td><input type='checkbox' id='recibido"+num+"' onclick='recibido(this)' value='1'></td><td><input type='checkbox' id='aprovado"+num+"' onclick='popout(this)' value='2'></td><td></td><td></td><td></td><td><form id='documentoForm"+num+"' enctype='multipart/form-data'><input type='file' id='doc"+num+"' class='elDocumento'><button type='button' class='btn btn-primary' value='"+num+"' onclick='uploadDoc(this)' style='background-color:#96689F'>Subir</button></form></td></tr>").appendTo("#docTable")}})})})},Inscripcion.prototype.uploadPhoto=function(){var theFile=document.getElementById("theFile"),file=theFile.files[0];if(file){var extension=file.name.split("."),destino=lists.destino[this.data.iddestino],mes=this.data.mesviaje_quinceanera,year=this.data.anoviaje_quinceanera,nombre=this.data.nombrequinceanera,id=this.data.id,data=new FormData;data.append("image",file),data.append("destino",destino),data.append("extension",extension[1]),data.append("mes",mes),data.append("year",year),data.append("nombre",nombre),data.append("id",id),nombre=nombre.replace(/\s/g,"_"),
destino=destino.replace(/\s/g,"_"),$.ajax({type:"POST",url:"/v15/mariposa/inscripcions/guardaFoto",data:data,cache:!1,contentType:!1,processData:!1,success:function(data){$("#theImg").attr("src"," /v15/mariposa/img/"+year+"/"+mes+"/"+destino+"/"+nombre+"."+extension[1]),$("#theImg").show();var inscripcionactualizar=window.parent.inscripcionAlmacen.get(id);inscripcionactualizar.foto="img/"+year+"/"+mes+"/"+destino+"/"+nombre+"."+extension[1],window.parent.inscripcionAlmacen.put(inscripcionactualizar),window.parent.inscripcion=window.parent.inscripcionAlmacen.data}})}};var tama=$(window).height(),segId=window.parent.idSeguimienteActualEnUso,whatis=window.parent.whatIsNow,theInsc={},lists={};$("#form-div, .bitacora-div").height(tama),$(document).ready(function(e){lists.agencia={},lists.ciudad={},lists.agente={},lists.destino={},window.parent.agencia.forEach(function(agencia){lists.agencia[agencia.name]=agencia.id,$("#agencia-list").append("<option  value='"+agencia.name+"'>")}),window.parent.ciudad.forEach(function(ciudad){lists.ciudad[ciudad.name]=ciudad.id,lists.ciudad[ciudad.id]=ciudad.name,$("#ciudades-list").append("<option value='"+ciudad.name+"'>")}),window.parent.destino.forEach(function(destino){lists.destino[destino.id]=destino.name,$("#iddestino").append("<option value='"+destino.id+"'>"+destino.name+"</option>"),$("#destinoAmiga").append("<option value='"+destino.id+"'>"+destino.name+"</option>")}),window.parent.todos.forEach(function(usuario){lists.agente[usuario.nombre]=usuario.id,$("#agente-list").append("<option value='"+usuario.nombre+"'>")}),$(".moveBitacora").click(function(e){e.preventDefault(),moveBitacora()}),theInsc=new Inscripcion(segId,whatis)}),$("#confirmModal").on("hidden.bs.modal",function(e){$(".modal-body").empty()}),window.onload=function(){$(".loader").hide()};
function addMedio(){medio=document.getElementById("agregarMedio").value,medio?(medio=medio.toUpperCase(),$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/agregamedio",data:{medio:medio},context:this}).done(function(result){if(result==-1)alert("El medio ingresado se encuentra disponible en la lista");else{$("#agencia-list").append("<option id='"+result+"' value='"+medio+"'>");var entada={id:result,name:medio};window.parent.AgenciasAlmacen.put(entada),alert("Se ha ingresado con éxito el nuevo medio")}})):alert("Por favor no dejar el campo vacio")}function moveBitacora(){$(".form-container").toggleClass("fullWidth")}var Seguimiento=function(id){var seg=Object.create(Seguimiento.prototype);if(seg.llamadaEfectiva="0",seg.url="seg",seg.user=window.parent.idusuarioactivo,seg.number=segNumber,segNumber=++segNumber,seg.insc=window.parent.inscripcionAlmacen.get(id),seg.data2={},0!=id)seg.createHeader(id),seg.type="edit",seg.data=window.parent.seguimientoAlmacen.get(id),seg.blockFields(),seg.bitacora=window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort:[{attribute:"fecha",descending:!0},{attribute:"hora",descending:!0}]}),0==seg.bitacora.total&&seg.downloadBitacora(id),seg.setBitacora();else{var date=seg.getDate(1);seg.type="new",seg.data={},seg.data.id=0,seg.data.nombreAgente=window.parent.nombreuseract,seg.data.agente=seg.user,seg.data.estado=1,seg.data.hora=date.hora,seg.data.fechaingreso=date.fecha,seg.bitacora=[]}return seg.setValues(),seg.setListeners(),seg};Seguimiento.prototype.alertBitacora=function(){$(".warning").addClass("show"),window.setTimeout(function(){$(".warning").removeClass("show")},3e3)},Seguimiento.prototype.required=function(){var required=!0;return $(".requiredd").each(function(){""!=$(this).val()&&"null"!=$(this).val()||(required=!1,$(this).addClass("missing"))}),0==required&&alert("Debes llenar todos los campos obligatorios *"),required},Seguimiento.prototype.saveValues=function(){var required=this.required();if(required){var urls={};urls.seg="/v15/mariposa/seguimientos/recibeajax",urls.insc="/v15/mariposa/inscripcions/recibeajax";var type=this.type;for(key in this.data2)this.data[key]=this.data2[key];"new"==type&&(this.newBita="Nuevo Seguimiento Creado por "+this.data.nombreAgente+", De la quinceañera "+this.data.nombrequinceanera),"change"==type&&this.saveBitacora(),$("#Enviar").attr("disabled","disabled"),$.ajax({method:"POST",url:urls[this.url],data:{data:this.data},context:this},this).done(function(result){$("input, select").removeClass("missing"),result!=-1&&result!=-2?($(".modal-body").append("<p>El seguimiento se ha ingresado con éxito</p>"),$("#confirmModal").modal("show"),this.data.id=result,this.data.numId=parseInt(result),window.parent.seguimientoAlmacen.put(this.data),window.parent.seguimiento=window.parent.seguimientoAlmacen.data,document.getElementById("est").innerHTML=" No."+result,this.saveBitacora(),$("#Enviar").attr("disabled",!1)):result==-1&&($(".modal-body").append("<p>El seguimiento se ha ingresado con éxito</p>"),$("#confirmModal").modal("show"),window.parent.seguimientoAlmacen.put(this.data),window.parent.seguimiento=window.parent.seguimientoAlmacen.data,$("#Enviar").attr("disabled",!1)),result==-2&&("Seg"==this.type&&(this.createSpecial(),this.setPagosAyuda(),this.type="Ins"),$(".modal-body").append("<p>La inscripción se ha ingresado con éxito</p>"),$("#confirmModal").modal("show"),window.parent.inscripcionAlmacen.put(this.data),window.parent.inscripcion=window.parent.inscripcionAlmacen.data,$("#Enviar").attr("disabled",!1))})}},Seguimiento.prototype.setValues=function(){var data=this.data;$("input, select, textarea").each(function(input){var clase=$(this).hasClass("noSet");this.id&&0==clase&&this.id in data&&($(this).val(data[this.id]),$(this).hasClass("ciudades")&&$(this).val(lists.ciudad[data[this.id]]))}),document.getElementById("est").innerHTML=" No."+data.id,"insc"==this.url&&(this.setDocs(),this.setPagos(),this.setPagosAyuda(),this.setHermanas(),this.setAmigas(),this.setFields())},Seguimiento.prototype.setBitacora=function(){var bitacoras=this.bitacora,length=0;"insc"==this.url&&(bitacoras=this.bitacora2.concat(bitacoras),length=this.bitacora2.length);var meses=[" ","ENE-","FEB-","MAR-","ABR-","MAY-","JUN-","JUL-","AGO-","SEP-","OCT-","NOV-","DIC-"],contenido="",count=0;bitacoras.forEach(function(bitacora){var classs="";count<length&&(classs="color"),count++,fecha=""+bitacora.fecha,arreglofecha=fecha.split("-"),mes=parseInt(arreglofecha[1]),fechatotal=arreglofecha[2]+"-"+meses[mes]+arreglofecha[0],hora=""+bitacora.hora,arrayhora=hora.split(":"),hor=parseInt(arrayhora[0]),minu=arrayhora[1],hor>12?(hor-=12,meri="Pm",horatotal=hor+":"+minu+" "+meri):(meri="Am",horatotal=hor+":"+minu+" "+meri),contenido+='<div class="bitacora-item '+classs+'"><div class="bitacora-name">'+bitacora.nombreUsuario+'</div><div class="bitacora-content">'+decodeURIComponent(bitacora.ingreso)+'</div><div class="bitacora-date">'+fechatotal+"  "+horatotal+'</div><div style="clear:both;"></div></div>'}),$("#list").empty(),document.getElementById("list").innerHTML=contenido},Seguimiento.prototype.saveBitacora=function(){var controller=this,urls={};urls.seg="/v15/mariposa/seguimientos/recibeBitacora",urls.insc="/v15/mariposa/inscripcions/recibeBitacora";var contenido=document.getElementById("bitacora").value,alert="1";if("new"!=this.type&&"change"!=this.type||(contenido=this.newBita,alert="0",this.type="edit"),contenido){var date=this.getDate(1),bitacora={idseguimiento:this.data.id,nombreUsuario:window.parent.nombreuseract,usuario:window.parent.idusuarioactivo,ingreso:decodeURIComponent(contenido),llamadaEfectiva:this.llamadaEfectiva,fecha:date.fecha,hora:date.hora};$.ajax({method:"POST",url:urls[this.url],data:bitacora,context:this}).done(function(idBitacora){controller.alertBitacora(),bitacora.id=idBitacora,this.data.bitacora=alert,"seg"==this.url?(this.bitacora.unshift(bitacora),window.parent.bitacoraAlmacen.add(bitacora),window.parent.bitacoraHoyAlmacen.add(bitacora),this.data.ultimo_contacto=bitacora.fecha,window.parent.seguimientoAlmacen.put(this.data),window.parent.seguimiento=window.parent.seguimientoAlmacen.data):(this.bitacora2.unshift(bitacora),window.parent.bitacora2Almacen.add(bitacora),window.parent.inscripcionAlmacen.put(this.data),window.parent.inscripcion=window.parent.inscripcionAlmacen.data),this.setBitacora(),window.parent.carganoti()}),$("#bitacora").val("")}},Seguimiento.prototype.getDate=function(p){p="undefined"!=typeof p?p:0,Time=new Date,1==p?fecha=Time.getFullYear()+"-"+(Time.getMonth()+1)+"-"+Time.getDate():fecha=Time.getFullYear()+"-0"+(Time.getMonth()+1)+"-"+Time.getDate(),hora=Time.getHours()+":",Time.getMinutes()<10?hora+="0"+Time.getMinutes():hora+=Time.getMinutes(),hora+=":"+Time.getSeconds();var date={fecha:fecha,hora:hora};return date},Seguimiento.prototype.setLLamadaEfectiva=function(){"0"==this.llamadaEfectiva?(this.llamadaEfectiva="1",$("#llamadaEfectiva").toggleClass("btn-success")):(this.llamadaEfectiva="0",$("#llamadaEfectiva").toggleClass("btn-success")),$("#callIcon").toggleClass("glyphicon-ok"),$("#callIcon").toggleClass("glyphicon-earphone")},Seguimiento.prototype.transferir=function(){var nombreT=document.getElementById("transferir").value,opcion=$("#agente-list").find('option[value="'+nombreT+'"]'),idT=$(opcion).attr("id"),bitacora=this.data.nombreAgente+" ha transferido el segumiento actual a "+nombreT,date=this.getDate(1),transferencia={iduser:nombreT,idseguimiento:this.data.id,idantiguo:this.data.nombreAgente,iduserantiguo:this.data.agente};$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/transferencia",data:transferencia,context:this}).done(function(idBitacora){var resultado={id:idBitacora,idseguimiento:this.data.id,usuario:window.parent.nombreuseract,ingreso:bitacora,fecha:date.fecha,hora:date.hora};this.bitacora.unshift(resultado),window.parent.bitacoraAlmacen.add(resultado),window.parent.bitacoraHoyAlmacen.add(resultado),this.setBitacora()}),this.data.agente=idT,this.data.nombreAgente=nombreT,this.setValues(),this.blockFields(),window.parent.seguimientoAlmacen.put(this.data),window.parent.segumiento=window.parent.seguimientoAlmacen.data,alert("Se transfirió el seguimiento exitosamente")},Seguimiento.prototype.blockFields=function(){var disabled=!1;this.user!=this.data.agente&&(disabled=!0,$("#Enviar").hide()),this.insc&&(disabled=!0,$("textarea").prop("disabled",disabled),$(".insc-row").show()),$("input, select, .form-div > textarea").each(function(e){"agregarSegg"!=this.id&&"nombreAgente"!=this.id&&"ultimo_contacto"!=this.id&&"fechaingreso"!=this.id&&$(this).prop("disabled",disabled)})},Seguimiento.prototype.setListeners=function(){$("button").off(),$("input, select, textarea").off("change"),$(".mailClick").off();var elSeguimiento=this;$(".mailClick").on("click",function(e){e.preventDefault();var mail=$(this).data("id");elSeguimiento.sendMail(mail)}),$("#Enviar").click(function(e){e.preventDefault(),elSeguimiento.saveValues()}),$("#guardarBita").click(function(e){e.preventDefault(),elSeguimiento.saveBitacora()}),$("#llamadaEfectiva").click(function(e){e.preventDefault(),elSeguimiento.setLLamadaEfectiva()}),$("#transferirBtn").click(function(e){e.preventDefault(),elSeguimiento.transferir()}),$("input, select, textarea").on("change",function(){if("bitacora"!=this.id&&($("#Enviar").show(),elSeguimiento.data2[this.id]=$(this).val(),"email"==this.type&&(elSeguimiento.data2[this.id]=elSeguimiento.data2[this.id].toLowerCase()),"nombrequinceanera"==this.id&&"new"!=elSeguimiento.type&&elSeguimiento.data2[this.id]!=elSeguimiento.data[this.id]&&(elSeguimiento.type="change",elSeguimiento.newBita="El nombre de la quinceañera ha cambiado de "+elSeguimiento.data[this.id]+" a "+elSeguimiento.data2[this.id]),"estado"==this.id&&elSeguimiento.data2[this.id]!=elSeguimiento.data[this.id])){elSeguimiento.type="change";var estado={1:"Pendiente",2:"Inscrita",3:"No Inscrita"};elSeguimiento.newBita="El estado ha cambiado de "+estado[elSeguimiento.data[this.id]]+" a "+estado[elSeguimiento.data2[this.id]]}var list=$(this).data("list");if(list){var realID=$(this).data("real");$(this).hasClass("ciudades")?elSeguimiento.data2[this.id]=lists.ciudad[this.value]:elSeguimiento.data2[realID]=lists[list][this.value]}}),$(".check2").on("change",function(){elSeguimiento.setSameFields()})},Seguimiento.prototype.createHeader=function(id){$(".seg-header").append("<div class='col-sm-2 btnHolder'><span class='segBtn' data-segId='"+id+"'>Seg: "+id+"</span> <button type='button' class='close' data-id='"+id+"' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")},Seguimiento.prototype.downloadBitacora=function(id,callback){$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/cargarBita",data:{id:id},context:this,dataType:"json"}).done(function(data){var obj=data;for(key in obj)this.bitacora.push(obj[key]),window.parent.bitacoraAlmacen.add(obj[key]);this.bitacora=window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort:[{attribute:"fecha",descending:!0},{attribute:"hora",descending:!0}]}),this.setBitacora()})},Seguimiento.prototype.setSameFields=function(){var parentesco=this.data2.parentesco||this.data.parentesco||"",clases=["nombre","celular","email"];clases.forEach(function(clas){var value=$("."+clas).val();$("."+clas+parentesco).val(value);var id=$("."+clas+parentesco).attr("id");this.data2[id]=value},this)},Seguimiento.prototype.sendMail=function(mail){var email=this.data2[mail]||this.data[mail];$.ajax({method:"POST",url:"/v15/mariposa/seguimientos/reenviarcorreo",data:{user:this.data.agente,destinoquin:this.data.destino,email:email,id:this.data.id,nombre:this.data.nombrequienllama},success:function(){$(".modal-body").append("<p>El correo se ha enviado con éxito</p>"),$("#confirmModal").modal("show")}},this)};var app=angular.module("seguimientos",[]);app.controller("AlertController",function($scope,$filter){function segFilter(value){return"string"==typeof value[$scope.searchKey]?value[$scope.searchKey].toLowerCase().includes($scope.search.toLowerCase()):value[$scope.searchKey]==$scope.search}$scope.seguimientos=window.parent.seguimiento,$scope.visible=!1,$scope.toDisplay=10,$scope.filteredItems=[],$scope.search="",$scope.searchKey="",$scope.close=function(){$scope.visible=!1},$(".check").on("keydown",function(){$scope.visible=!0}),$("input, select, textarea").on("focusin",function(){$scope.visible=!1}),$scope.changeSearch=function(val,key){$scope.search=val,$scope.searchKey=key,$scope.search&&($scope.filtered=$scope.seguimientos.filter(segFilter))}}),$(document).ready(function(e){lists.agencia={},lists.ciudad={},lists.agente={},$("#Enviar").hide(),window.parent.agencia.forEach(function(agencia){lists.agencia[agencia.name]=agencia.id,$("#agencia-list").append("<option  value='"+agencia.name+"'>")}),window.parent.ciudad.forEach(function(ciudad){lists.ciudad[ciudad.name]=ciudad.id,lists.ciudad[ciudad.id]=ciudad.name,$("#ciudades-list").append("<option value='"+ciudad.name+"'>")}),window.parent.destino.forEach(function(destino){$("#destino").append("<option value='"+destino.id+"'>"+destino.name+"</option>")}),window.parent.todos.forEach(function(usuario){lists.agente[usuario.nombre]=usuario.id,$("#agente-list").append("<option value='"+usuario.nombre+"'>")}),$(".moveBitacora").click(function(e){e.preventDefault(),moveBitacora()}),$(".seg-header").on("click",".segBtn",function(){var segId=$(this).data("segid"),elSeguimiento={};totalSeguimientos.forEach(function(seguimiento){seguimiento.data.id==segId&&(elSeguimiento=seguimiento)}),elSeguimiento.blockFields(),elSeguimiento.setValues(),elSeguimiento.setBitacora(),elSeguimiento.setListeners()}),$(".seg-header").on("click",".close",function(){var div=$(this).closest("div"),id=$(this).data("id"),index=-1;totalSeguimientos.forEach(function(seguimiento){seguimiento.data.id==id&&(index=seguimiento.number),index!=-1&&seguimiento.number>index&&(seguimiento.number=seguimiento.number-1)});var length=totalSeguimientos.length;if(length>1){if(0!=index)var newSeg=totalSeguimientos[index-1];else var newSeg=totalSeguimientos[index+1];newSeg.blockFields(),newSeg.setValues(),newSeg.setBitacora(),newSeg.setListeners()}totalSeguimientos.splice(index,1),$(div).remove()}),$("table").on("click",".segRow",function(e){e.preventDefault(),console.log(1);var id=$(this).data("id"),holder={},name="seg"+id;holder[name]=new Seguimiento(id),totalSeguimientos.push(holder[name])}),$("#agregarBtn").on("click",function(e){e.preventDefault();var id=$("#agregarSegg").val();$("#agregarSegg").val("");var holder={},name="seg"+id;holder[name]=new Seguimiento(id),totalSeguimientos.push(holder[name])}),$("#agregarMedioBtn").on("click",function(e){e.preventDefault(),addMedio()}),theSeg=Seguimiento(segId),totalSeguimientos.push(theSeg)});var totalSeguimientos=[],segNumber=0,segId=window.parent.idSeguimienteActualEnUso,theSeg={},lists={};0==segId&&window.parent.idSeguimienteActualEnUso==-1,window.onload=function(){$(".loader").hide(),$(".alert-text").addClass("alertMove")},$("#confirmModal").on("hidden.bs.modal",function(e){$(".modal-body").empty()});
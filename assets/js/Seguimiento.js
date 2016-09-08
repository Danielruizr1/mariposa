  var Seguimiento = function(id){
	   var seg = Object.create(Seguimiento.prototype);
	   seg.llamadaEfectiva = "0";
	   seg.url = "seg";
	   seg.user = window.parent.idusuarioactivo;
       seg.number = segNumber;
       segNumber = ++segNumber;
       seg.insc = window.parent.inscripcionAlmacen.get(id);
	   seg.data2 = {};
	   
	   if (id != 0){
	   	   seg.createHeader(id);
		   seg.type = "edit" ;
		   seg.data = window.parent.seguimientoAlmacen.get(id);
		   seg.blockFields();
		   seg.bitacora = window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]});
		   if(seg.bitacora.total == 0){
		   	  seg.downloadBitacora(id);
		   }
		   seg.setBitacora();

	   } else  {
	   	   var date = seg.getDate(1);
		   seg.type = "new" ;
		   seg.data = {};
		   seg.data.id = 0;
		   seg.data.nombreAgente = window.parent.nombreuseract;
		   seg.data.agente = seg.user;
		   seg.data.estado = 1;
		   seg.data.hora = date.hora;
		   seg.data.fechaingreso = date.fecha;
		   seg.bitacora = [];
	   }
	    seg.setValues();
	    seg.setListeners();
	   	return seg;
	  
	 }	

Seguimiento.prototype.alertBitacora = function() {
	$('.warning').addClass("show");

	window.setTimeout(function(){
		$('.warning').removeClass("show");

	},3000);


};


Seguimiento.prototype.required = function() {
	 var required = true;
	   $(".requiredd").each(function(){
          if($(this).val() == "" || $(this).val() == "null" ){
          	required = false;
          	$(this).addClass("missing");          	
          }
	   });
	   if(required == false) alert("Debes llenar todos los campos obligatorios *");

	  return required;
}
Seguimiento.prototype.saveValues = function(){
	   var required = this.required();
	   if(required){
	   var urls = {};
	   urls.seg = "/v15/mariposa/seguimientos/recibeajax";
	   urls.insc = "/v15/mariposa/inscripcions/recibeajax";
	   var type = this.type;
	   for(key in this.data2){
				  this.data[key] = this.data2[key];
				  }
	         if(type == "new") {
	           this.newBita = "Nuevo Seguimiento Creado por "+this.data.nombreAgente+", De la quinceañera "+this.data.nombrequinceanera;
	        
		 } 
		 if(type == "change"){
		 	this.saveBitacora();
		 }
		$("#Enviar").attr("disabled", "disabled");
		$.ajax({
			method: "POST",
			url: urls[this.url],
			data: {data: this.data},
			context: this
		 },this)
		.done(function(result){
			 $("input, select").removeClass("missing");
			 if(result != -1 && result != -2){
			 	 $( ".modal-body" ).append('<p>El seguimiento se ha ingresado con éxito</p>');
                 $('#confirmModal').modal('show');
			 	this.data.id = result;
			 	this.data.numId = parseInt(result);
			 	
			 	window.parent.seguimientoAlmacen.put(this.data);
	            window.parent.seguimiento=window.parent.seguimientoAlmacen.data;
			 	document.getElementById('est').innerHTML=' No.'+ result;
			 	this.saveBitacora();
			 	$("#Enviar").attr("disabled", false);
			 } else if(result == -1) {
			 $( ".modal-body" ).append('<p>El seguimiento se ha ingresado con éxito</p>');
             $('#confirmModal').modal('show');
			 window.parent.seguimientoAlmacen.put(this.data);
	         window.parent.seguimiento=window.parent.seguimientoAlmacen.data;
	         $("#Enviar").attr("disabled", false);
	     }
	     if(result == -2){
	     	if(this.type == "Seg"){
	     		this.createSpecial();
	     		this.setPagosAyuda();
	     		this.type = "Ins";
	     	} 
	     	$( ".modal-body" ).append('<p>La inscripción se ha ingresado con éxito</p>');
             $('#confirmModal').modal('show');
	     	window.parent.inscripcionAlmacen.put(this.data);			
	        window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
	        $("#Enviar").attr("disabled", false);
	     }

		})
	 }			  	 
	}
Seguimiento.prototype.setValues = function(){
	var data = this.data;
	     $("input, select, textarea").each(function(input){
	     	var clase = $(this).hasClass("noSet");
			 if(this.id && clase == false && this.id in data) {
				 $(this).val(data[this.id]); 
				 if($(this).hasClass("ciudades")){
				 	$(this).val(lists.ciudad[data[this.id]]);
				 }
				 }   
		 })
		 document.getElementById('est').innerHTML=' No.'+ data.id;
		 if(this.url == "insc"){
		 	this.setDocs();
		 	this.setPagos();
		 	this.setPagosAyuda();
		 	this.setHermanas();
		 	this.setAmigas();
		 	this.setFields();
		 }
	}
Seguimiento.prototype.setBitacora = function() {
	var bitacoras = this.bitacora;
	var length = 0;
	if (this.url == "insc"){
		bitacoras = this.bitacora2.concat(bitacoras);
		length = this.bitacora2.length;
	}
	var meses = [" ", "ENE-", "FEB-", "MAR-","ABR-","MAY-","JUN-","JUL-","AGO-","SEP-","OCT-","NOV-","DIC-"]
	var contenido = "";
	var count = 0;
	bitacoras.forEach(function(bitacora){
		var classs = "";
		if(count < length){
			classs ="color";
		}
		count++;
		fecha=""+bitacora.fecha;
	    arreglofecha=fecha.split('-');
	    mes=parseInt(arreglofecha[1]);
		fechatotal=arreglofecha[2]+"-"+meses[mes]+arreglofecha[0];
		hora=""+bitacora.hora;
		 arrayhora=hora.split(":");
		 hor=parseInt(arrayhora[0]);
		 minu=arrayhora[1];
		 if(hor>12){
			 hor=hor-12;
			 meri="Pm";
			 horatotal=hor+":"+minu+" "+meri;
		 }else{
			 meri="Am";
			 horatotal=hor+":"+minu+" "+meri;
		 }
        contenido+='<div class="bitacora-item '+classs+'"><div class="bitacora-name">'+bitacora.nombreUsuario+'</div><div class="bitacora-content">'+decodeURIComponent(bitacora.ingreso)+'</div><div class="bitacora-date">'+fechatotal+'  '+horatotal+'</div><div style="clear:both;"></div></div>';
         });
	$("#list").empty();
	document.getElementById("list").innerHTML = contenido;
}	

Seguimiento.prototype.saveBitacora = function() {
	var controller = this;
	var urls = {};
	   urls.seg = "/v15/mariposa/seguimientos/recibeBitacora";
	   urls.insc = "/v15/mariposa/inscripcions/recibeBitacora";
	var contenido=document.getElementById('bitacora').value;
	var alert = "1";
	if(this.type == "new" || this.type=="change"){
		contenido = this.newBita;
		alert = "0";
		this.type = "edit";
	}
	if (contenido){
    var date = this.getDate(1);
    var bitacora = {idseguimiento:this.data.id, nombreUsuario:window.parent.nombreuseract,usuario:window.parent.idusuarioactivo, ingreso:decodeURIComponent(contenido), llamadaEfectiva:this.llamadaEfectiva, fecha:date.fecha, hora:date.hora}
    $.ajax({
		  method: "POST",
		  url: urls[this.url],
		  data: bitacora,
		  context: this
		})
		  .done(function( idBitacora ) {
			  	controller.alertBitacora();

		       bitacora.id = idBitacora;
		       this.data.bitacora = alert;
		       if(this.url == "seg"){
		       this.bitacora.unshift(bitacora);
		       window.parent.bitacoraAlmacen.add(bitacora);
	           window.parent.bitacoraHoyAlmacen.add(bitacora);
			    this.data.ultimo_contacto = bitacora.fecha;
			    window.parent.seguimientoAlmacen.put(this.data);
				window.parent.seguimiento=window.parent.seguimientoAlmacen.data;
	          } else {
	          	  this.bitacora2.unshift(bitacora);
                  window.parent.bitacora2Almacen.add(bitacora);
                  window.parent.inscripcionAlmacen.put(this.data);
	              window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
	          }
	           this.setBitacora();
	           window.parent.carganoti();
		  });  
    
    $("#bitacora").val('');
 }
}

Seguimiento.prototype.getDate = function(p) {
	p = typeof p !== 'undefined' ?  p : 0;
	Time=new Date();
	if (p ==1){
        fecha=Time.getFullYear() + "-" +(Time.getMonth() +1)+ "-" + Time.getDate() ;
	}else {
		fecha=Time.getFullYear() + "-0" +(Time.getMonth() +1)+ "-" + Time.getDate() ;
	}
	hora=Time.getHours()+":";
	if(Time.getMinutes()<10){
		hora+="0"+Time.getMinutes();
	}
	else{
		hora+=Time.getMinutes();
	}
	hora+=":"+Time.getSeconds();
	var date = {fecha: fecha, hora: hora};
	return date;
}	

Seguimiento.prototype.setLLamadaEfectiva = function() {
       if(this.llamadaEfectiva == "0"){
       	   this.llamadaEfectiva = "1";
       	   $("#llamadaEfectiva").toggleClass("btn-success");
       } else {
       	  this.llamadaEfectiva = "0";
       	  $("#llamadaEfectiva").toggleClass("btn-success");
       }
       $("#callIcon").toggleClass('glyphicon-ok');
       $("#callIcon").toggleClass('glyphicon-earphone');
}

Seguimiento.prototype.transferir = function(){
    var nombreT = document.getElementById("transferir").value;
    var opcion = $("#agente-list").find('option[value="' + nombreT + '"]');
    var idT = $(opcion).attr('id');
    var bitacora= this.data.nombreAgente+" ha transferido el segumiento actual a "+ nombreT;
    var date = this.getDate(1);
    var transferencia = {iduser: nombreT, idseguimiento: this.data.id, idantiguo: this.data.nombreAgente, iduserantiguo: this.data.agente };
		 $.ajax({
		  method: "POST",
		  url: "/v15/mariposa/seguimientos/transferencia",
		  data: transferencia,
		  context: this
		})
		  .done(function( idBitacora ) {
		       var resultado ={id:idBitacora, idseguimiento: this.data.id, usuario:window.parent.nombreuseract, ingreso:bitacora, fecha:date.fecha, hora:date.hora};
		       this.bitacora.unshift(resultado);
		       window.parent.bitacoraAlmacen.add(resultado);
	           window.parent.bitacoraHoyAlmacen.add(resultado);
	           this.setBitacora();
		  }); 

		this.data.agente = idT;
		this.data.nombreAgente = nombreT;
		this.setValues();
		this.blockFields();
		window.parent.seguimientoAlmacen.put(this.data);
	    window.parent.segumiento=window.parent.seguimientoAlmacen.data;
       alert("Se transfirió el seguimiento exitosamente");
}

Seguimiento.prototype.blockFields = function() {
	var disabled = false;
	if(this.user != this.data.agente){
		disabled = true;
		$("#Enviar").hide();     
    }
    if(this.insc){
    	disabled = true;
    	$("textarea").prop("disabled", disabled);
    	$(".insc-row").show();
    }
    $("input, select, .form-div > textarea").each(function(e){
    	if(this.id != "agregarSegg" && this.id != "nombreAgente" && this.id != "ultimo_contacto" && this.id != "fechaingreso"){
          $(this).prop("disabled", disabled);

    	}
     })
}

Seguimiento.prototype.setListeners = function() {
	$("button").off();
	$("input, select, textarea").off("change");
	$(".mailClick").off();
	var elSeguimiento = this;

      $(".mailClick").on("click", function(e){
      	e.preventDefault();
      	var mail = $(this).data('id');
      	elSeguimiento.sendMail(mail);
      })
	  $("#Enviar").click(function(e){
		     e.preventDefault();
			 elSeguimiento.saveValues();
		   });
	   $("#guardarBita").click(function(e){
	   	    e.preventDefault();
	   	    elSeguimiento.saveBitacora();
	   })
	   $("#llamadaEfectiva").click(function(e){
	   	    e.preventDefault();
	   	    elSeguimiento.setLLamadaEfectiva();
	   })
	   $("#transferirBtn").click(function(e){
	   	   e.preventDefault();
	   	   elSeguimiento.transferir();
	   })
	   $("input, select, textarea").on("change", function(){
            if(this.id != "bitacora") {
                $("#Enviar").show();
                elSeguimiento.data2[this.id] = $(this).val();
                if(this.type == 'email') elSeguimiento.data2[this.id] = elSeguimiento.data2[this.id].toLowerCase();
                if(this.id == "nombrequinceanera" && elSeguimiento.type != "new" && elSeguimiento.data2[this.id] != elSeguimiento.data[this.id]){
                    elSeguimiento.type="change";
                    elSeguimiento.newBita= "El nombre de la quinceañera ha cambiado de "+elSeguimiento.data[this.id]+" a "+elSeguimiento.data2[this.id];
                }
                if(this.id == "estado" && elSeguimiento.data2[this.id] != elSeguimiento.data[this.id]){
                    elSeguimiento.type="change";
                    var estado = {1:'Pendiente', 2: 'Inscrita', 3: 'No Inscrita'};
                    elSeguimiento.newBita= "El estado ha cambiado de "+estado[elSeguimiento.data[this.id]]+" a "+estado[elSeguimiento.data2[this.id]];
                }
            }
            var list = $(this).data("list");
            if(list){
                 var realID = $(this).data("real");
                 if($(this).hasClass("ciudades")){
                     elSeguimiento.data2[this.id] = lists.ciudad[this.value];
                 } else {
                  elSeguimiento.data2[realID] = lists[list][this.value];    	 
            	}
            }
	   })
	   $(".check2").on("change", function(){
            elSeguimiento.setSameFields();
	   })
}

Seguimiento.prototype.createHeader = function(id) {
    $(".seg-header").append("<div class='col-sm-2 btnHolder'><span class='segBtn' data-segId='"+id+"'>Seg: "+id+"</span> <button type='button' class='close' data-id='"+id+"' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")
}

Seguimiento.prototype.downloadBitacora = function(id, callback) {
	     $.ajax({
	     	     method: "POST",
		         url: "/v15/mariposa/seguimientos/cargarBita",
		         data: {id:id},
		         context: this,
		         dataType: 'json',
			 
})
				.done(function( data ) {
                    var obj = data;
                    for(key in obj){
                       this.bitacora.push(obj[key]);
                       window.parent.bitacoraAlmacen.add(obj[key]);
                    }

                   this.bitacora = window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]});
                   this.setBitacora();
				});
}

Seguimiento.prototype.setSameFields = function(){
      var parentesco = this.data2.parentesco || this.data.parentesco || "";
      var clases = ["nombre", "celular", "email"]
      clases.forEach(function(clas){
      	 var value = $("."+clas).val();
         $("."+clas+parentesco).val(value);
      	 var id = $("."+clas+parentesco).attr("id");
      	 this.data2[id] = value;
      },this);
      	
      
}

Seguimiento.prototype.sendMail = function(mail){
	 var email = this.data2[mail] || this.data[mail];
     $.ajax({
	     	     method: "POST",
		         url: "/v15/mariposa/seguimientos/reenviarcorreo",
		         data: {user:this.data.agente, destinoquin: this.data.destino, email: email, id:this.data.id, nombre: this.data.nombrequienllama},
		         success: function() {
		         	 $( ".modal-body" ).append('<p>El correo se ha enviado con éxito</p>');
                     $('#confirmModal').modal('show')
		         },	 
},this);
}

function addMedio() {
    medio=document.getElementById('agregarMedio').value;
    if(medio){
			medio=medio.toUpperCase();
				$.ajax({
			     	     method: "POST",
				         url: "/v15/mariposa/seguimientos/agregamedio",
				         data: {medio:medio},
				         context: this			 
		})  
				.done(function( result ) {
						if(result==-1){
							alert("El medio ingresado se encuentra disponible en la lista");	
						} 
						else{
						$("#agencia-list").append("<option id='"+result+"' value='"+medio+"'>");
		                var entada={id:result,name:medio};
						window.parent.AgenciasAlmacen.put(entada);	
						alert("Se ha ingresado con éxito el nuevo medio");	
						}
		        });      
	} else {

		alert("Por favor no dejar el campo vacio");
	}  
}
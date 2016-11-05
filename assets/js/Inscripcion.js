var  Inscripcion = function(id, whatis){
	var insc = Object.create(Inscripcion.prototype);
	insc.type = whatis;
	insc.url = "insc";
  insc.tipo = "Ins";
	insc.data2 = {};
	insc.pagos = {};
	insc.pagos.pendientePesos = 0;
    insc.pagos.pendienteDolares = 0;
    insc.pagos.pendienteEuros = 0;
	insc.bitacora2 =  window.parent.bitacora2Almacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]});
	insc.bitacora =  window.parent.bitacoraAlmacen.query({idseguimiento:id},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]});
	if(insc.bitacora.total == 0){
		   	  insc.downloadBitacora(id);
		   }

	if(whatis == "Seg"){
       insc.data = window.parent.seguimientoAlmacen.get(id);
       insc.saveBitacora("Niña creada en inscripciones.")
	} else {
       insc.data = window.parent.inscripcionAlmacen.get(id);
	}
	insc.setBitacora();
	insc.setValues();
	insc.setListeners();
	insc.setListeners2();
	return insc;


}

Inscripcion.prototype = Object.create(Seguimiento.prototype);
Inscripcion.prototype.constructor = Inscripcion;

Inscripcion.prototype.setListeners2 = function(){
	var inscripcion = this;
	$(".displayers").on("change", function(){
        switch($(this).data("display")){
        	case "agencia":
           if(this.value == "si"){
             $("#agenciaTab").show();
           }else {
             $("#agenciaTab").hide();
           }
        	 break;
        	case "visa":
        	 if(this.value == "si"){
        	 	$('#divVisa1').show();
        	 	$('#visaTab').hide();
            $('#visaAprobada').val('');
        	 }else {
        	 	$('#divVisa1').hide();
        	 	$('#visaTab').show();
            $('#visaAprobada').val('no');
            inscripcion.data2['visaAprobada'] = 'no';
        	 }
        }
	}); 
   $("#foto").on("click", function(e){
     var required = inscripcion.required();
     if(required){
       $('#theFile').trigger('click');
     }
  })
  $("#theFile").on("change", function(e){
     inscripcion.uploadPhoto();
  })
	$("#docTable").on("click", ".saveDoc", function(e){
		inscripcion.saveDoc(this);
	})
	$("#docTable").on("click", ".notaShow", function(e){
		var index = this.value;
        document.getElementById("addNotaButton").value = index;
        $('#notaModal').modal('show');
	});
	$("#docTable").on("click", ".recibidoCheck", function(e){
		inscripcion.recibido(this);
	});
	$("#docTable").on("click", ".aprobadoCheck", function(e){
		inscripcion.aprovado(this);
	});
	$(".saveNota").on("click", function(e){
		inscripcion.saveNota(this);
	});
	$("#aprovadoButton").on("click", function(e){
		inscripcion.recibido2();
		$('#seguroModal').modal('hide');
	});
	$('form#pagosForm').on('submit', function(e) {
        e.preventDefault();
        var obj = {};
        var data = $( this ).serializeArray();
        data.forEach(function(field){
          obj[field.name] = field.value;
          if(field.name == "concepto2" && field.value){
          	obj["concepto"] = field.value;
          }
        });
        inscripcion.savePago(obj);
    });
    $('form#hermanasForm').on('submit', function(e) {
        e.preventDefault();
        inscripcion.saveHermana();
     });
     $('form#amigasForm').on('submit', function(e) {
        e.preventDefault();
        inscripcion.saveAmiga();
      });
}

Inscripcion.prototype.setDocs = function(){

	window.parent.InscripdocumentosAlmacen.query({inscripcion_id:this.data.id}).forEach(function(insc){
		   if(!insc.nota){
			   insc.nota="<button type='button' class='btn btn-primary notaShow' id='notaModalShow"+insc.id+"' style='background-color:#96689F' value='"+insc.id +"'>Agregar</button>";
			   }
		   var displayPattern = 'd-MMM-yyyy';
		   var user = new Object();
		   var fechatotalp ="";
		   var fechatotalR ="";
		   if(insc.fechaAprovado){
           fechatotalp=insc.fechaAprovado;
           }
           if(insc.fechaRecibido){
           fechatotalR=insc.fechaRecibido;
       }
         documento = window.parent.DocumentosAlmacen.get(insc.doc_id);

         if(documento){
           if(insc.aprovadoPor){user = window.parent.UsuariosAlmacen.get(insc.aprovadoPor);}else{user.nombre = "";}
           if(insc.documento){$("<tr class='added'><td>"+documento.nombre+"</td><td><input type='checkbox' id='recibido"+insc.id+"' class='recibidoCheck' value='1'></td><td><input type='checkbox' id='aprovado"+insc.id+"' class='aprobadoCheck' value='2'></td><td>"+fechatotalR+"</td><td>"+fechatotalp+"</td><td>"+user.nombre+"</td><td><a href='/v15/mariposa/"+insc.documento+"' target='_Blank'>ver: "+documento.nombre+"</a></td><td class='onHover'><div class='onclick' data-insc='"+insc.id +"' >"+insc.nota+"</div></td></tr><tr>"+incs.abreviatura+"</tr><tr>"+incs.proceso+"</tr>").appendTo("#docTable");}
           else {$("<tr class='added'><td>"+documento.nombre+"</td><td><input type='checkbox' id='recibido"+insc.id+"' class='recibidoCheck' value='1'></td><td><input type='checkbox' id='aprovado"+insc.id+"' class='aprobadoCheck' value='2'></td><td>"+fechatotalR+"</td><td>"+fechatotalp+"</td><td>"+user.nombre+"</td><td><form id='documentoForm"+insc.id+"' enctype='multipart/form-data'><input type='file' id='doc"+insc.id+"' class='elDocumento'><button type='button' class='btn btn-primary saveDoc' value='"+insc.id+"' style='background-color:#96689F'>Subir</button></form></td><td class='onHover'><div class='onclick' data-insc='"+insc.id +"' >"+insc.nota+"</div></td></tr>").appendTo("#docTable");}
           if(insc.recibido == "1"){$("#recibido"+parseInt(insc.id)).prop('checked', true);}
           if(insc.aprovado == "1"){$("#aprovado"+parseInt(insc.id)).prop('checked', true);}

         };
   });
}

Inscripcion.prototype.setPagosAyuda = function(){
	window.parent.PagosDestinoAlmacen.query({destino_id:this.data.iddestino}).forEach(function(desti){
   	var concepto = desti.pago;
    var n = concepto.search("\\*");
   	var valor = desti.valor;
    var currency = desti.moneda;
    var moneda = "";
    switch(currency){
        case "1":
        moneda = "Pesos";
        break;
        case "2":
        moneda = "Dolares";
        break;
        case "3":
        moneda = "Euros";
        break;
    }
     if(n && this.type == "Seg"){
      var data  = {concepto:concepto, realizadoPor:"", valorPago:valor*-1, currency:currency}
      this.savePago(data);
     }
    $("<tr><td>"+concepto+"</td><td>"+valor*-1+"</td><td>"+moneda+"</td></tr>").appendTo("#ayudaTable");
},this);
}

Inscripcion.prototype.setHermanas = function() {
	window.parent.HermanasAlmacen.query({inscripcion_id:this.data.id}).forEach(function(hermana){
     	   $("#headerRowHermana").show();
     	   var fecha ="";
     	   if(hermana.edad){fecha = hermana.edad}
           $("<tr><td>"+hermana.nombre+"</td><td>"+fecha+"</td></tr>").appendTo("#hermanaTable");
     });	
}
Inscripcion.prototype.setAmigas = function() {
	window.parent.AmigasAlmacen.query({inscripcion_id:this.data.id}).forEach(function(hermana){
     	   $("#headerRowAmiga").show();
			$("<tr><td>"+hermana.nombre+"</td><td>"+lists.destino[hermana.destino]+"</td></tr>").appendTo("#amigaTable");
	       });
}

Inscripcion.prototype.setPagos = function(p) {
	 p = typeof p !== 'undefined' ?  p : 0;
	 if(p == 0){
     var dateObj = new Date();
     var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
     var day = ("0" + (dateObj.getDate())).slice(-2);
     var year = dateObj.getUTCFullYear();
     var fecha2 = year+"-"+month+"-"+day;
     window.parent.PagosAlmacen.query({inscripcion_id:this.data.id}).forEach(function(pago){
     	        var conceptoName = pago.concepto;
                var fecha =pago.fecha;
                switch(pago.currency){
               case "1":
               this.pagos.pendientePesos = this.pagos.pendientePesos + JSON.parse(pago.valor);
               $("<tr class='losPagos'><td>"+conceptoName+"</td><td>"+pago.valor+"</td><td>0</td><td>0</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "2":
               this.pagos.pendienteDolares = this.pagos.pendienteDolares + JSON.parse(pago.valor);
               $("<tr class='losPagos'><td>"+conceptoName+"</td><td>0</td><td>"+pago.valor+"</td><td>0</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "3":
               this.pagos.pendienteEuros = this.pagos.pendienteEuros + JSON.parse(pago.valor);
               $("<tr class='losPagos'><td>"+conceptoName+"</td><td>0</td><td>0</td><td>"+pago.valor+"</td><td>"+fecha+"</td><td>"+pago.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
           }   
     },this);
     }else {

     }
     $("#pagosPendientes").replaceWith("<tr id='pagosPendientes'><th>Pendientes</th><th>"+this.pagos.pendientePesos+"</th><th>"+this.pagos.pendienteDolares+"</th><th>"+this.pagos.pendienteEuros+"</th><th colspan='2'>"+fecha2+"</th></tr>");
}

Inscripcion.prototype.saveDoc = function(x) {
   var inscDocID = x.value;
   var theFile = document.getElementById('doc'+inscDocID);
   var file = theFile.files[0];
   var inscID = this.data.id;
   var destinoNombre = lists.destino[this.data.iddestino];
   var index = $(x).closest("tr").index();
   var anoquin = this.data.anoviaje_quinceanera;
   switch(this.data.mesviaje_quinceanera){
    case "06":
    var mesquin="Junio";
    break;
    case "12":
    var mesquin="Diciembre";
    break;
   }
   var nombrequin2 = this.data.nombrequinceanera;
   if(file){
     var data = new FormData();
     data.append('doc', file);
     data.append('destino', destinoNombre);
     data.append('mes', mesquin);
     data.append('year', anoquin);
     data.append('nombre',nombrequin2 );
     data.append('id', inscDocID);
     nombreFile = file.name.replace(/\s/g, "_");
     nombre = nombrequin2.replace(/\s/g, "_");
     eldestino = destinoNombre.replace(/\s/g, "_");
           $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaDoc",
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	$("#documentoForm"+inscDocID).hide();
            	var a = document.createElement('a');
                var linkText = document.createTextNode("ver: Documento");
                a.appendChild(linkText);
                a.title = "ver: Documento";
                a.href = "/v15/mariposa/docs/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"/"+nombreFile;
                a.target = "_blank";
            	document.getElementById("docTable").rows[index].cells[6].appendChild(a);
                var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(inscDocID);
                inscripcionactualizar.documento = "docs/"+anoquin+"/"+mesquin+"/"+eldestino+"/"+nombre+"/"+nombreFile;
                window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar);
            }
        });
       }
}

Inscripcion.prototype.saveNota = function(x){
	var bitacora=document.getElementById('notaArea').value;	
	var data = {bitacora:bitacora, id:x.value};
	  $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaDoc",
            data: data,	 	     
            success: function(result) {
				var y =  document.getElementById('notaModalShow'+x.value)
				if (!y){
				 y = $('.onclick[data-insc="'+x.value+'"]');
				}
				var index = $(y).closest("tr").index();
				document.getElementById("docTable").rows[index].cells[7].innerHTML = "<div class='onclick' data-insc='"+x.value+"'>"+bitacora+"</div>";
				var doc=window.parent.InscripdocumentosAlmacen.get(x.value);
				doc.nota = bitacora;
				$('#notaModal').modal('hide');
				window.parent.InscripdocumentosAlmacen.put(doc);
            },       
    }); 
}

Inscripcion.prototype.savePago = function(data) {
           data.idInsc = this.data.id;
           data.pendiente = 0;
           var dateObj = new Date();
               var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
               var day = ("0" + (dateObj.getDate())).slice(-2);
               var year = dateObj.getUTCFullYear();
               var fecha = year+"-"+month+"-"+day;
                switch(data.currency){
               case "1":
               this.pagos.pendientePesos = JSON.parse(this.pagos.pendientePesos) + JSON.parse(data.valorPago);
               $("<tr><td>"+data.concepto+"</td><td>"+data.valorPago+"</td><td>0</td><td>0</td><td>"+fecha+"</td><td>"+data.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "2":
               this.pagos.pendienteDolares = JSON.parse(this.pagos.pendienteDolares) + JSON.parse(data.valorPago);
               $("<tr><td>"+data.concepto+"</td><td>0</td><td>"+data.valorPago+"</td><td>0</td><td>"+fecha+"</td><td>"+data.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
               case "3":
               this.pagos.pendienteEuros = JSON.parse(this.pagos.pendienteEuros) + JSON.parse(data.valorPago);
               $("<tr><td>"+data.concepto+"</td><td>0</td><td>0</td><td>"+data.valorPago+"</td><td>"+fecha+"</td><td>"+data.realizadoPor+"</td></tr>").insertAfter("#mainHeaderPagos");
               break;
           }
           $("#pagosPendientes").replaceWith("<tr id='pagosPendientes'><th>Pendientes</th><th>"+this.pagos.pendientePesos+"</th><th>"+this.pagos.pendienteDolares+"</th><th>"+this.pagos.pendienteEuros+"</th><th colspan='2'>"+fecha+"</th></tr>");
			 if(this.pagos.pendientePesos == 0 && this.pagos.pendienteDolares == 0 && this.pagos.pendienteEuros == 0){
		          data.pendiente = 1;
				 }
			
           $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaPago",
            data: data,	 	    
           success: function(result) {
			   $("#concepto2").val("");
			   $("#concepto2").hide();
			   $("#concepto").show();   
             var num = JSON.parse(result);
             var resultado={id:num, inscripcion_id:data.idInsc, concepto:data.concepto, valor:data.valorPago, currency:data.currency, fecha:fecha, realizadoPor:data.realizadoPor};  
             window.parent.PagosAlmacen.add(resultado);
           }

        });
}

Inscripcion.prototype.recibido = function(x){
	    var inscID = this.data.id;
    	var state = x.value;
    	var index = $(x).closest("tr").index();
    	var documentoID = 0;
    	user=window.parent.idusuarioactivo;
    	var documento = document.getElementById("docTable").rows[index].cells[0].innerHTML;
    	window.parent.DocumentosAlmacen.query({nombre:documento}).forEach(function(doc){
          documentoID=doc.id;
    	});	

           $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/updateDocumento",
            data: {inscripcionID:inscID, documento:documentoID, state:state, user:user},    	 

           success: function(result) {
           	var id = JSON.parse(result);
           	var dateObj = new Date();
           	var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
            var day = ("0" + (dateObj.getDate())).slice(-2);
             var year = dateObj.getUTCFullYear();
               
               if(state=="1"){
               	var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(id);
               	inscripcionactualizar.recibido = 1;
               	inscripcionactualizar.fechaRecibido = year + "-" + month + "-" + day;
               	document.getElementById("docTable").rows[index].cells[3].innerHTML = year + "-" + month + "-" + day;
               window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar);
	           window.parent.inscipdocumento=window.parent.InscripdocumentosAlmacen.data;
	           var inscripcionactualizar=window.parent.inscripcionAlmacen.get(inscID);
	           inscripcionactualizar.docRecibido=1;
	           window.parent.inscripcionAlmacen.put(inscripcionactualizar);
	           window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
	       }
           }

        });
}

Inscripcion.prototype.aprovado = function(x) {
	var index = $(x).closest("tr").index();
    document.getElementById("index").value = index;
 	var documentoID = 0;
 	var detalleID = 0;
 	var doc = document.getElementById("docTable").rows[index].cells[0].innerHTML;
    window.parent.DocumentosAlmacen.query({nombre:doc}).forEach(function(doc){
    	documentoID=doc.id;
    	});
    window.parent.DetalleDocumentosAlmacen.query({docID:documentoID}).forEach(function(doc){
    	detalleID=doc.id;
    	pregunta=doc.pregunta;
    	ejemplo=doc.ejemplo;
    	});	
    if(detalleID != 0){
    document.getElementById("index").value = index;	
    $(".remove").remove();	
    $('#seguroModal').modal('show');
    window.parent.DetalleDocumentosAlmacen.query({docID:documentoID}).forEach(function(doc){
    	if(doc.ejemplo){
    	 $("<tr class='remove'><td><input type='checkbox' class='checkClass' onclick='check()'></td><td class='remove'>"+doc.pregunta+"</td><td class='remove'><a href='/v15/mariposa/"+doc.ejemplo+"' target='_blank'>Ver Ejemplo</a></td></tr>").appendTo("#checkTable");
    	} else {
    	$("<tr class='remove'><td><input type='checkbox' class='checkClass'></td><td class='remove'>"+doc.pregunta+"</td><td class='remove'>Ejemplo no disponible</td></tr>").appendTo("#checkTable");	
    	}
    	});	
    } else {
    this.recibido2();
     }
}

Inscripcion.prototype.recibido2 = function() {
	 var inscID = this.data.id;
 	    var state = 2;
    	var index = document.getElementById("index").value;
    	var documentoID = 0;
    	user=window.parent.idusuarioactivo;
    	var documento = document.getElementById("docTable").rows[index].cells[0].innerHTML;
    	window.parent.DocumentosAlmacen.query({nombre:documento}).forEach(function(doc){
          documentoID=doc.id;
    	});	
            $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/updateDocumento",
            data: {inscripcionID:inscID, documento:documentoID, state:state, user:user},
           success: function(result) {
           	var id = JSON.parse(result);
           	var dateObj = new Date();
           	var month = ("0" + (dateObj.getMonth() + 1)).slice(-2); //months from 1-12
            var day = ("0" + (dateObj.getDate())).slice(-2);
             var year = dateObj.getUTCFullYear();
               var inscripcionactualizar=window.parent.InscripdocumentosAlmacen.get(id);
               	user2 = window.parent.UsuariosAlmacen.get(user);
				document.getElementById("docTable").rows[index].cells[4].innerHTML = year + "-" + month + "-" + day;
               	document.getElementById("docTable").rows[index].cells[5].innerHTML = user2.nombre;
               	inscripcionactualizar.aprovado=1;
               	inscripcionactualizar.fechaAprovado =  year + "-" + month + "-" + day;
               	inscripcionactualizar.aprovadoPor = user;
               window.parent.InscripdocumentosAlmacen.put(inscripcionactualizar);
	           window.parent.inscipdocumento=window.parent.InscripdocumentosAlmacen.data;
	           var inscripcionactualizar=window.parent.inscripcionAlmacen.get(inscID);
	           inscripcionactualizar.docAprovado=1;
	           window.parent.inscripcionAlmacen.put(inscripcionactualizar);
	           window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
           }

        });
}
Inscripcion.prototype.saveHermana = function() {
	        var nombre =  $('input[name=nombreHermana]').val();
			var edad = $('input[name=edadHermana]').val();
			var idInsc = this.data.id;

        //}

       $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaHermana",
            data: {nombre:nombre, edad:edad,  idInsc:idInsc},
           success: function(result) {
           alert("La hermana se ha agregado con exito");
           $("#headerRowHermana").show();
           $("<tr><td>"+nombre+"</td><td>"+edad+"</td></tr>").appendTo("#hermanaTable");
           var num = JSON.parse(result);
            var resultado={id:num, inscripcion_id:idInsc, nombre:nombre, edad:edad};  
             window.parent.HermanasAlmacen.add(resultado);
           }

        });
}

Inscripcion.prototype.saveAmiga = function(){
	        nombre =  $('input[name=nombreAmiga]').val();
			destino =  $('select[name=destinoAmiga]').val();
			var idInsc = this.data.id;
			destino2="";
	 window.parent.DestinosAlmacen.query({id:destino}).forEach(function(desti){
		 destino2 = desti.name;
	 });
			$.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaAmiga",
            data: {nombre:nombre, destino:destino,  idInsc:idInsc},
           success: function(result) {
           alert("La Amiga se ha agregado con exito");
           $("#headerRowAmiga").show();
           $("<tr><td>"+nombre+"</td><td>"+destino2+"</td></tr>").appendTo("#amigaTable");
            var num = JSON.parse(result);
            var resultado={id:num, inscripcion_id:idInsc, nombre:nombre, destino:destino}; 
             window.parent.AmigasAlmacen.add(resultado);
           }

        });
      
}
 Inscripcion.prototype.setFields = function() {
  if(this.data.foto){
    $("#theImg").attr("src", "/v15/mariposa/"+this.data.foto);
    $("#theImg").show();
  }
     if(this.data.tieneVisa == "no"){
   	 	$('#divVisa1').hide();
   	 	$('#visaTab').show();

     }else if(this.data.tieneVisa == "si"){
     	$('#divVisa1').show();
   	 	$('#visaTab').hide();
     }
     if(this.data.esAgencia == "si"){
     	$("#agenciaTab").show();
     }

 }

 Inscripcion.prototype.createSpecial = function() {
  var id = this.data.id;
  window.parent.DestinocumentosAlmacen.query({destino_id:this.data.iddestino}).forEach(function(desti){
      window.parent.DocumentosAlmacen.query({id:desti.doc_id}).forEach(function(doc){
           $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaDocumento",
            data: {documento:doc.id, inscripcionID:id},
           success: function(result) {
            var num = JSON.parse(result);
             var resultado={id:num, doc_id:doc.id, inscripcion_id:id, recibido:0, aprovado:0, fechaRecibido:"", fechaAprovado:"", aprovadoPor:"", documento:""};  
             window.parent.InscripdocumentosAlmacen.add(resultado);
             $("<tr class='added'><td>"+doc.nombre+"</td><td><input type='checkbox' id='recibido"+num+"' onclick='recibido(this)' value='1'></td><td><input type='checkbox' id='aprovado"+num+"' onclick='popout(this)' value='2'></td><td></td><td></td><td></td><td><form id='documentoForm"+num+"' enctype='multipart/form-data'><input type='file' id='doc"+num+"' class='elDocumento'><button type='button' class='btn btn-primary' value='"+num+"' onclick='uploadDoc(this)' style='background-color:#96689F'>Subir</button></form></td></tr>").appendTo("#docTable");
           }

        });
      });
      });
 }

 Inscripcion.prototype.uploadPhoto = function() {
    var theFile = document.getElementById('theFile');
     var file = theFile.files[0];
     if(file){
     var extension = file.name.split(".");
     var destino = lists.destino[this.data.iddestino];
     var mes = this.data.mesviaje_quinceanera;
     var year = this.data.anoviaje_quinceanera;
     var nombre = this.data.nombrequinceanera;
     var id = this.data.id;
     var data = new FormData();
     data.append('image', file);
     data.append('destino', destino);
     data.append('extension', extension[1]);
     data.append('mes', mes);
     data.append('year', year);
     data.append('nombre', nombre);
     data.append('id', id);
     nombre = nombre.replace(/\s/g, "_");
     destino = destino.replace(/\s/g, "_");
           $.ajax({
            type:'POST',
            url: "/v15/mariposa/inscripcions/guardaFoto",
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $("#theImg").attr("src", " /v15/mariposa/img/"+year+"/"+mes+"/"+destino+"/"+nombre+"."+extension[1]);
                $("#theImg").show();
                var inscripcionactualizar=window.parent.inscripcionAlmacen.get(id);
                inscripcionactualizar.foto = "img/"+year+"/"+mes+"/"+destino+"/"+nombre+"."+extension[1];
                window.parent.inscripcionAlmacen.put(inscripcionactualizar);
              window.parent.inscripcion=window.parent.inscripcionAlmacen.data;
            }
        });
       }
 }
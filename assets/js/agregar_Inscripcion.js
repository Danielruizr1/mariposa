var tama= $(window).height();
var segId = window.parent.idSeguimienteActualEnUso;
var whatis = window.parent.whatIsNow;
var theInsc = {};
var lists ={};
$('#form-div, .bitacora-div').height(tama-30);

$(document).ready(function(e){
     lists.agencia = {};
     lists.ciudad = {};
     lists.agente = {};
     lists.destino = {} 
	window.parent.agencia.forEach(function(agencia){
		   
		   lists.agencia[agencia.name] = agencia.id;
		   $("#agencia-list").append("<option  value='"+agencia.name+"'>");
		})
		
		window.parent.ciudad.forEach(function(ciudad){
			
			lists.ciudad[ciudad.name] = ciudad.id;
			lists.ciudad[ciudad.id] = ciudad.name;
		   $("#ciudades-list").append("<option value='"+ciudad.name+"'>");
		})
		window.parent.destino.forEach(function(destino){
			lists.destino[destino.id] = destino.name;
		   $("#iddestino").append("<option value='"+destino.id+"'>"+destino.name+"</option>");
		   $("#destinoAmiga").append("<option value='"+destino.id+"'>"+destino.name+"</option>");
		   
		})
		window.parent.todos.forEach(function(usuario){
			lists.agente[usuario.nombre] = usuario.id;
			$("#agente-list").append("<option value='"+usuario.nombre+"'>");
		})
		$(".moveBitacora").click(function(e){
	   	    e.preventDefault();
	   	    moveBitacora();
	   })
  theInsc = new Inscripcion(segId,whatis);
});

function moveBitacora (){
	 $(".form-container").toggleClass("fullWidth");
}

function check(){
    if ($('.checkClass:checked').length == $('.checkClass').length) {
        $("#aprovadoButton").prop("disabled", false); 
    }
  }
 $('#confirmModal').on('hidden.bs.modal', function (e) {
   $(".modal-body").empty();
})
 window.onload=function(){$(".loader").hide()};    
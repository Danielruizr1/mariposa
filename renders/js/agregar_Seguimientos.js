var app = angular.module("seguimientos", []);

app.controller("AlertController", function($scope, $filter){

		var controller = this;
  
        $scope.seguimientos = window.parent.seguimiento; 
        $scope.visible = false;
        $scope.toDisplay = 10;
        $scope.filteredItems = [];
        $scope.search = '';
        $scope.close = function() {
        	$scope.visible = false;
        }
        $(".check").on("keydown", function(){
	        $scope.visible = true;
       });
        $("input, select, textarea").on("focusin", function(){
	        $scope.visible = false;
       });

        $scope.changeSearch = function(val) {
        	$scope.search = val;
        	console.log(val);

        }


        
        
});
$(document).ready(function(e) {	
     lists.agencia = {};
     lists.ciudad = {};
     lists.agente = {};''
    $("#Enviar").hide();	 
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
		   $("#destino").append("<option value='"+destino.id+"'>"+destino.name+"</option>");
		})

		window.parent.todos.forEach(function(usuario){
			
			lists.agente[usuario.nombre] = usuario.id;
			$("#agente-list").append("<option value='"+usuario.nombre+"'>");
		})
        $(".moveBitacora").click(function(e){
	   	    e.preventDefault();
	   	    moveBitacora();
	   })

	   $(".seg-header").on("click", ".segBtn", function() {
	   	    var segId = $(this).data("segid");
	   	    var elSeguimiento = {};
	   	    totalSeguimientos.forEach(function(seguimiento){
	   	    	                    if(seguimiento.data.id == segId){
	   	    		                     elSeguimiento =seguimiento;
	   	    	                    }
	   	                        })
	   	    elSeguimiento.blockFields();
	   	    elSeguimiento.setValues();
		    elSeguimiento.setBitacora();
		    elSeguimiento.setListeners();
	   })
	   

	   $(".seg-header").on("click", ".close", function(){
	   	    var div = $(this).closest("div");
	   	    var id = $(this).data("id");
	   	    var index = -1;
            totalSeguimientos.forEach(function(seguimiento){
            	if(seguimiento.data.id == id){
                     index = seguimiento.number;
            	}
            	if(index != -1 && seguimiento.number > index ){
            		seguimiento.number = seguimiento.number-1;
            	}
            })
            var length= totalSeguimientos.length;
            if(length > 1){
            	if(index != 0){
            var newSeg = totalSeguimientos[index-1];
             }else {
             	var newSeg = totalSeguimientos[index+1];
            
		}
		       newSeg.blockFields();
		       newSeg.setValues();
		       newSeg.setBitacora();
		       newSeg.setListeners();
            }
            totalSeguimientos.splice(index, 1);
	   	    $(div).remove();
	   })

	   $("table").on("click",".segRow", function(e){
	   	  e.preventDefault();
	   	  console.log(1);
          var id = $(this).data("id");
          var holder = {};
	 	    var name  = "seg"+id;
	 	    holder[name] = new Seguimiento(id);
	        totalSeguimientos.push(holder[name]);
	  });
	   $("#agregarBtn").on("click", function(e){
	   	    e.preventDefault();
	   	    var id = $("#agregarSegg").val();
	   	    $("#agregarSegg").val('');
	   	    var holder = {};
     	    var name  = "seg"+id;
     	    holder[name] = new Seguimiento(id);
            totalSeguimientos.push(holder[name]);
            
	   })
	   $("#agregarMedioBtn").on("click", function(e){
	   	   e.preventDefault();
	   	   addMedio();
	   })
       theSeg = Seguimiento(segId);
       totalSeguimientos.push(theSeg);
});

var totalSeguimientos = [];
var segNumber = 0;
var segId = window.parent.idSeguimienteActualEnUso;
var theSeg = {};
var lists ={};
      if (segId == 0)
        { 
           window.parent.idSeguimienteActualEnUso==-1;
        }

 
 window.onload=function(){$(".loader").hide()
  $(".alert-text").addClass("alertMove");
};

function moveBitacora (){
	 $(".form-container").toggleClass("fullWidth");
}

$('#confirmModal').on('hidden.bs.modal', function (e) {
   $(".modal-body").empty();

})
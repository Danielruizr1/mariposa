function buscabitacora(idseg){
	//var sortAttributes = [{attribute: "id", descending: true}];
	ancho=window.innerWidth;
	anchoform=ancho*78/100;
	anchobit=ancho*20/100;
	document.getElementById('areaform').style.width=anchoform+'px';
	document.getElementById('bit').style.width=anchobit+'px';
	queryObj["idseguimiento"]=idseg;
	//@kike:Desactivado por que en el fetch cargada cada vez el array se estaba creciendo demasiado
	
	/*foodStore.fetch({query: queryObj, onBegin: clearOldList,onComplete: gotItems, onError: fetchFailed, sort:[{attribute: "fecha", descending:true},{attribute: "hora", descending: true}]});*/
	
	  
	   list = document.getElementById('list');
	   
	   while (list.hasChildNodes())
     {
         list.removeChild(list.firstChild);
     }  
     contenido="";
    
       

  
  window.parent.bitacoraAlmacen.query({idseguimiento:idseg},{sort: [{attribute: "fecha", descending: true},{attribute: "hora", descending: true}]}).forEach(function(shoe){
				   fecha=""+shoe.fecha;
				   arreglofecha=fecha.split('-');
					  fechatotal=arreglofecha[2]+"-";
					  mes=arreglofecha[1];
					  switch(mes){
						  case "01":
						   fechatotal+="ENE-";
						  break;
						  case "02":
						   fechatotal+="FEB-";
						  break;
						  case "03":
						   fechatotal+="MAR-";
						  break;
						  case "04":
						   fechatotal+="ABR-";
						  break;
						  case "05":
						   fechatotal+="MAY-";
						  break;
						  case "06":
						   fechatotal+="JUN-";
						  break;
						  case "07":
						   fechatotal+="JUL-";
						  break;
						  case "08":
						   fechatotal+="AGO-";
						  break;
						  case "09":
						   fechatotal+="SEP-";
						  break;
						  case "1":
						   fechatotal+="ENE-";
						  break;
						  case "2":
						   fechatotal+="FEB-";
						  break;
						  case "3":
						   fechatotal+="MAR-";
						  break;
						  case "4":
						   fechatotal+="ABR-";
						  break;
						  case "5":
						   fechatotal+="MAY-";
						  break;
						  case "6":
						   fechatotal+="JUN-";
						  break;
						  case "7":
						   fechatotal+="JUL-";
						  break;
						  case "8":
						   fechatotal+="AGO-";
						  break;
						  case "9":
						   fechatotal+="SEP-";
						  break;
						  case "10":
						   fechatotal+="OCT-";
						  break;
						  case "11":
						   fechatotal+="NOV-";
						  break;
						  case "12":
						   fechatotal+="DIC-";
						  break;
					  }
					 fechatotal+=arreglofecha[0];
					 hora=""+shoe.hora;
					 arrayhora=hora.split(":");
					 hor=parseInt(arrayhora[0]);
					 minu=arrayhora[1];
					 if(hor>12){
						 hor=hor-12;
						 meri="Pm";
						 horatotal=hor+":"+minu+" "+meri;
					 }
					 else
					 {
						 meri="Am";
						 horatotal=hor+":"+minu+" "+meri;
					 }
			       contenido+='<div style="width:95%; height:auto; border:solid 1px#D1CEE7;background-color:#EBE6FC;-moz-border-radius:15px;border-radius:15px;margin-bottom:0.5em;font-family:Verdana, Geneva, sans-serif; font-size:12px;"><div style="width:100%;color:#838284; text-align:left; float:left; margin-left:0.6em;">'+shoe.usuario+'</div><div style="width:90%; color:#515053; text-align: justify; float:left; margin-left:1em;clear:left">'+decodeURIComponent(shoe.ingreso)+'</div><div style="width:100%; color:#757575; float:right; text-align:right; margin-right:0.3em; clear:right">'+fechatotal+'  '+horatotal+'</div><div style="clear:both;"></div></div>';
               });
  
    return contenido;
			 
  //document.getElementById('list').innerHTML=contenido;
	
	
}



function setDatosSeguimiento(id)
     {
	        //setTimeout(buscabitacora(window.parent.idSeguimienteActualEnUso);,4000); 
			buscabitacora(id);
			
     }
	 
	
	self.addEventListener('message', function(e) {
	  setDatosSeguimiento(e.data);	
      self.postMessage(contenido);
    }, false); 
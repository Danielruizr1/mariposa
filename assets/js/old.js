
/******Funcion para reenviar correo****/
//Entrada: Ninguno
//Salida: Se Reenvia el correo solicitado.
function reenviarCorreo(id){
	//Id usuario, destinos, email, id Seguimiento, nombre
	idseguimiento=document.getElementById('id').value;;
	destinos=dijit.byId('iddestino').get('value').toString();
	idusuario=window.parent.idusuarioactivo;
	switch(id){
		case 1:
		 nombre=document.getElementById('nombrequienllama').value;
		 mail=document.getElementById('email').value;
		break;
		case 2:
		 nombre=document.getElementById('nombrequinceanera').value;
		 mail=document.getElementById('mail_quinceanera').value;
		break;
		case 3:
		 nombre=document.getElementById('nombrepadre').value;
		 mail=document.getElementById('mail_padre').value;
		break;
		case 4:
		 nombre=document.getElementById('nombremadre').value;
		 mail=document.getElementById('mail_madre').value;
		break;
	}
	if(nombre=="" || mail==""){
		alert("El nombre o el correo no pueden estar vacios");
    }
	else{
	require(["dojo/_base/xhr"],
    function(xhr) {
        // Execute a HTTP GET request
        xhr.get({
            // The URL to request
            url: "/v15/mariposa/seguimientos/reenviarcorreo?user="+idusuario+"&destinoquin="+destinos+"&email="+mail+"&id="+idseguimiento+"&nombre="+nombre,
            // The method that handles the request's successful result
            // Handle the response any way you'd like!
            load: function(result) {
				alert(result);
            }
        });        
    });
	}
}
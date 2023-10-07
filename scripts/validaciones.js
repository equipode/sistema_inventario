// JavaScript Documen
/* VALIDACIONES LADO DEL CLIENTE */

function justNumbers(e){
    // Valida Numeros y Punto
	var keynum = window.event ? window.event.keyCode : e.which;
	if ((keynum == 8) || (keynum == 46) || (keynum == 7) || (keynum == 61))
	return true;
	 
	return /\d/.test(String.fromCharCode(keynum));
}

function valida_Existencia(control_value){	
    if (control_value != "")	return true;
	else  return false;		
}
function valida_Numero(control_value){
	if( isNaN(control_value) )  return false;
	else return true;
}
function valida_Email(control_value){
	if(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.exec(control_value)) return true;	     
	else false;
}
function valida_Option(control_value){
	for(var i=0; i<control_value.length; i++) {	
	  if(control_value[i].checked) {
		return true;
		break;
	  }
	}
	return false; // si llega aqui es por que no hay nada seleccionado
}
function valida_Listas(control_value){	
	if( control_value == 0 ) {	
	  return false;
	}else return true;
}

function valida_File_image(control_value) {// VALIDA UNA ARCHIVO A SUBIR CON INPUT:FILE
   extensiones_permitidas = new Array(".gif", ".jpg", ".jpeg", ".png");
   mierror = "";

   if (!control_value) {
      return false;
   }else{
      //recupero la extensión de este nombre de archivo
      extension = (control_value.substring(control_value.lastIndexOf("."))).toLowerCase();
      //compruebo si la extensión está entre las permitidas
      permitida = false;
      for (var i = 0; i < extensiones_permitidas.length; i++) {
         if (extensiones_permitidas[i] == extension) {
           permitida = true;
           break;
         }
      }
      if (!permitida) 
         return false;
      else{ // //todo correcto subimos el archivo procesando el formulario          
         return true;
      }
   }
}

function preview_proyeccion(pagina) {
    var opciones="toolbar=no,location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=845, height=600, top=85, left=140";
    window.open(pagina,"",opciones);
}

//EL SIGUIENTE MODULO IMPLEMENTATODAS LAS VALIDACIONES ANTERIORES APLICANDO ESTILOS DE PLANTILLA ADMINLTE 2
// completar con las demas validaciones
function validate_result(tipo,control_value, postNameControls){
	switch(tipo){
		case "exists":
			if(valida_Existencia(control_value)){
				$("#"+postNameControls).removeClass("is-invalid");				
				return true;
			}else{
				$("#"+postNameControls).addClass("is-invalid");				
				return false;
			}
			break;

		case "lists":
			if(valida_Listas(control_value)){
				$("#"+postNameControls).removeClass("is-invalid");
				return true;
			}else{
				$("#"+postNameControls).addClass("is-invalid");
				return false;
			}
			break;

		case "email":
			if(valida_Email(control_value)){
				$("#"+postNameControls).removeClass("is-invalid");
				return true;
			}else{
				$("#"+postNameControls).addClass("is-invalid");
				return false;
			}
			break;
			
		default:
		    return false;
	}
}

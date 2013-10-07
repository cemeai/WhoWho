
function validarForm(thisform) {

	var allGood = true;
	resetForm();
	var allInputs = document.forma_contacto.getElementsByTagName("input");
	var allText = document.forma_contacto.getElementsByTagName("textarea");

	//------Para validaR INPUTS-----
	for (var i=0; i<allInputs.length; i++) {
        clase=allInputs[i].className;
		if ((clase=="reqd span3" || clase=="invalid span3") && allInputs[i].value=="") {
			allGood = false;
            allInputs[i].className="invalid span3";

		}
	}
	
	//-------Para validar TEXTAREAS-----------
	for (var i=0; i<allText.length; i++) {
        clase=allText[i].className;
		if ((clase=="reqd input-xlarge" || clase=="invalid input-xlarge") && allText[i].value=="") {
			allGood = false;
            allText[i].className="invalid input-xlarge";


		}
	}
	
	var nombre = document.getElementById("nombre_input").value;
	var asunto = document.getElementById("asunto_input").value;
	var mensaje = document.getElementById("mensaje_input").value;
	
	
	//si dichos campos estan vacios, concatenar al errorStr lo que es necesario		
	if(mensaje.length > 0) {
		if(mensaje.length < 10) {
			allGood=false;
			document.getElementById("mensaje_input").className ="invalid input-xlarge"			
			document.getElementById("span_mensaje").innerHTML="Al menos 10 caracteres";
			document.getElementById("span_mensaje").className ="help-block invalid_span"
		}
	}

	//------Para validar que sean VALORES ALFABETICOS en Nombre-----------
	
    flagNombre = false;
	if((nombre!='')){
		for (var i=0; i < nombre.length; i++) {
			var alpha = nombre.charAt(i);
			var x = alpha.charCodeAt(0);
			if( (x > 64 && x<91) || (x > 96 && x<123) ){
				flagNombre = true;
			}
		}
				
		if(flagNombre == false){
			document.getElementById("span_nombre").innerHTML="S&oacute;lo se aceptan letras en este campo";
			document.getElementById("span_nombre").className ="help-block invalid_span"
			allGood = false;		
			document.getElementById("nombre_input").className ="invalid span3"			
		}
	
	}
	//termina validacion de alfabeticos

	if (document.getElementById("asunto_input").value == "") {		
		document.getElementById("asunto_input").className ="invalid span3"	
		
	}		

	//validacion del email
	if (document.getElementById("email_input").value == "") {		
		document.getElementById("email_input").className ="invalid span3"
	}		

	//Para validad EMAIL: checa que si el campo email no tiene nada manda llamar la funcion checarEmail() y aparte lo pone INVALID
	if(document.forma_contacto.email_input.value!='')	{
		if(validaEmail(document.forma_contacto.email_input.value) == false){		
			allGood = false;		
			document.getElementById("email_input").className ="invalid span3"
			document.getElementById("span_email").className ="help-block invalid_span"
			document.getElementById("span_email").innerHTML="Mail No V&aacute;lido. Escribelo de nuevo."
			
		}	
	}
	//termina validacion de email

	return allGood;

}


function resetForm() {
		var allInputs = document.forma_contacto.getElementsByTagName("input");
		var allText = document.forma_contacto.getElementsByTagName("textarea");
		

		//para INPUTS
		for (var i=0; i<allInputs.length; i++) {
				clase=allInputs[i].className;
			if (clase=="invalid span3") {
				allInputs[i].className="reqd span3";
				document.getElementById("span_nombre").className ="help-block"
				document.getElementById("span_email").className ="help-block"
				document.getElementById("span_asunto").className ="help-block"
				document.getElementById("span_nombre").innerHTML="*Campo Obligatorio"
				document.getElementById("span_email").innerHTML="*Campo Obligatorio"
				document.getElementById("span_asunto").innerHTML="*Campo Obligatorio"


			}
		}
	
		//para TEXTAREAS
		for (var i=0; i<allText.length; i++) {
            clase=allText[i].className;
			if (clase=="invalid input-xlarge") {
				allText[i].className="reqd input-xlarge";
				document.getElementById("span_mensaje").className ="help-block"
				document.getElementById("span_mensaje").innerHTML="*Campo Obligatorio"

			}
		}
}



              
function validaEmail(str){
                
	var expresionMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var mailEscrito = document.getElementById("email_input").value;
						
	if (mailEscrito.match(expresionMail)){
		document.getElementById("span_email").className ="help-block"
		return true;
	}
	else{      
		return false;
	}
}



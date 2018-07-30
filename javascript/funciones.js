
function vacio(q) {   
        for ( i = 0; i < q.length; i++ ) {   
                if ( q.charAt(i) != " " ) {   
                        return false   
                }   
        }   
        return true
}   

function validarFormProfesorCargo(boton) {

	return true;
}

function validarFormProfesorCupof(boton) {

	return true;
}

function validarFormCargo(boton) {

	if (boton=='botonAceptar') {
		m="";
		e=0;
		if (vacio(document.formCargo.elements['nombre'].value)) {e=1;m=m+",nombre del cargo"}

		if (e==1) {
			m="Falta ingresar: "+m.slice(1,m.length);
			alert (m);
			return false;
		}
		return true
	} else {
		return true
	}

}

function validarFormProfesor(boton) {

	if (boton=='BotGrabar') {
		m="";
		e=0;
		if (vacio(document.formProfesor.elements['formNombre'].value)) {e=1;m=m+",Nombre"}
		if (vacio(document.formProfesor.elements['formApellido'].value)) {e=1;m=m+",Apellido"}
		if (vacio(document.formProfesor.elements['formCuil'].value)) {e=1;m=m+",Cuil"}
		if (!vacio(document.formProfesor.elements['formInstrumentoNum'].value)) {e=1;m=m+",Número de instrumento"}


		if (e==1) {
			m="Falta ingresar: "+m.slice(1,m.length);
			alert (m);
			return false;
		}
		return true
	} else {
		return true
	}

}

function validarFormCurso(boton) {

	if (boton=='BotGrabar') {
		m="";
		e=0;
		if (vacio(document.formProfesor.elements['formAnio'].value)) {e=1;m=m+",Año"}
		if (vacio(document.formProfesor.elements['formDivisión'].value)) {e=1;m=m+",División"}
		if (vacio(document.formProfesor.elements['formTurno'].value)) {e=1;m=m+",Turno"}
		if (!vacio(document.formProfesor.elements['formModalidad'].value)) {e=1;m=m+",Modalidad"}


		if (e==1) {
			m="Falta ingresar: "+m.slice(1,m.length);
			alert (m);
			return false;
		}
		return true
	} else {
		return true
	}

}

function validarFormBarrio(boton) {

	if (boton=='botonAceptar') {
		m="";
		e=0;
		if (vacio(document.formBarrio.elements['nombre'].value)) {e=1;m=m+",nombre del barrio"}

		if (e==1) {
			m="Falta ingresar: "+m.slice(1,m.length);
			alert (m);
			return false;
		}
		return true
	} else {
		return true
	}

}

function validarFormLocalidad(boton) {

	if (boton=='botonAceptar') {
		m="";
		e=0;
		if (vacio(document.formLocalidad.elements['nombre'].value)) {e=1;m=m+",nombre de la localidad"}

		if (e==1) {
			m="Falta ingresar: "+m.slice(1,m.length);
			alert (m);
			return false;
		}
		return true
	} else {
		return true
	}

}

function validarResumido(boton) {

	if (boton=='BotGrabar') {
		m="";
		e=0;
		if (vacio(document.formureg.elements['FormTxtDoc'].value)) {e=1;m=m+",Tipo o número de Documento"}
		if (vacio(document.formureg.elements['FormTxtApellido'].value)) {e=1;m=m+",Apellido"}
		if (vacio(document.formureg.elements['FormTxtNombre'].value)) {e=1;m=m+",Nombre"}
		if (!vacio(document.formureg.elements['FormTxtEmail'].value))
			if (document.formureg.elements['FormTxtEmail'].value.indexOf("@")==-1) {e=2}
		if (document.formureg.FormRadCat[1].checked)
			if (vacio(document.formureg.elements['FormTxtOtraInst'].value)) {e=1;m=m+",Institución"}


		if (e==1) {
			m="Falta ingresar: "+m.slice(1,m.length);
			alert (m);
			return false;
		}
		if (e==2) {
			alert ("Ud. ingresó una dirección de correo inválida");
			return false;
		}
		return true
	} else {
		return true
	}

}


// Permite que cuando se pulse el boton para dar de baja en el formulario de modificacion,
// el sistema pida confirmacion del borrado. Cuando el boton pulsado es el de Modificar, no
// pide confirmacion
function ConfirmarBaja(elboton) {
	var elboton;
	if (elboton=="BtnBaja") {
		resp=confirm("¿Está seguro que desea borrar el registro?") 
		if(resp) { 
			return true;
		} else {
			return false;
		}
	} else {
		return true;
	}
 }

function ConfirmarOperacionCoorGral() {
	if (document.formEvalResGral.FormRadConfirma[0].checked) {
		resp=confirm("Ud. seleccionó Confirmar. Esto hará que el expositor reciba la resolución del Coordinador. ¿Continúa?") 
		if(resp) return true;
		else return false;
	} else {
		resp=confirm("Ud. seleccionó No Confirmar. Esto hará que la resolución del Coordinador se borre para que éste emita otra. ¿Continúa?") 
		if(resp) return true;
		else return false;
	}
 }

// Permite que cuando se pulse un boton determinado en un formulario,
// el sistema pida confirmacion.
function ConfirmarBoton(controlar) {

	if (controlar=="si") {
		resp=confirm("¿Está seguro que desea borrar el registro?") 
		if(resp) return true;
		else return false;
	} else {
		return true;
	}
}

// Validacion para las entradas de numeros en formularios
function validarSoloNumeros(evento) {
    tecla = (document.all) ? evento.keyCode : evento.which;  // con document.all verifica si es IE
	                                                         // o FireFox. Según lo que sea, obtiene
															 // el codigo de la tecla con la 
															 // instruccion correspondiente
	if (tecla==8) return true; // para que pueda hacer backspace
    if (tecla==0) return true; // para que pueda pasar a otro campo con TAB
    patron =/\d/; // solo acepta numeros
    te = String.fromCharCode(tecla); // convierte el char a codigo ASCII
	return patron.test(te); // compara con el patron y devuelve true o false
}
	
function validarSoloNumerosyComa(evento) {
    tecla = (document.all) ? evento.keyCode : evento.which;  // con document.all verifica si es IE
	                                                         // o FireFox. Según lo que sea, obtiene
															 // el codigo de la tecla con la 
															 // instruccion correspondiente
	if (tecla==8) return true; // para que pueda hacer backspace
    if (tecla==0) return true; // para que pueda pasar a otro campo con TAB

	patron =/\d|\./; // solo acepta numeros y punto decimal
	
	te = String.fromCharCode(tecla); // convierte el char a codigo ASCII
	return patron.test(te); // compara con el patron y devuelve true o false
}

function validarSoloNumerosyGuion(evento) {
    tecla = (document.all) ? evento.keyCode : evento.which;  // con document.all verifica si es IE
	                                                         // o FireFox. Según lo que sea, obtiene
															 // el codigo de la tecla con la 
															 // instruccion correspondiente
	if (tecla==8) return true; // para que pueda hacer backspace
    if (tecla==0) return true; // para que pueda pasar a otro campo con TAB

	patron =/\d|\-/; // solo acepta numeros y el guion medio
	
	te = String.fromCharCode(tecla); // convierte el char a codigo ASCII
	return patron.test(te); // compara con el patron y devuelve true o false
}
//================================================================================================
// Otros patrones:
//		/[A-Za-z\s]/  letras mayusculas de la A a la Z, minusculas de la a a la Z y el espacio \s
//		/\w/  acepta numeros y letras
//		/\D/  no acepta numeros
//		/[A-Za-zñÑ\s]/ igual que el primero pero ahora incluye las letras ñ y Ñ
//================================================================================================

function validarSoloLetrasyNros(evento) {
    tecla = (document.all) ? evento.keyCode : evento.which;  // con document.all verifica si es IE
	                                                         // o FireFox. Según lo que sea, obtiene
															 // el codigo de la tecla con la 
															 // instruccion correspondiente
	if (tecla==8) return true; // para que pueda hacer backspace
    if (tecla==0) return true; // para que pueda pasar a otro campo con TAB

	if ((tecla>=48) && (tecla<=57) || (tecla>=97) && (tecla<=122)) { // deja pasar solo letras mi-
		return true;                             // núsculas y numeros
	} else {
		return false;
	}
}

function validarNoMinusculas(evento) {
    tecla = (document.all) ? evento.keyCode : evento.which;  // con document.all verifica si es IE
	                                                         // o FireFox. Según lo que sea, obtiene
															 // el codigo de la tecla con la 
															 // instruccion correspondiente
	
	if (tecla==8) return true; // para que pueda hacer backspace
    if (tecla==0) return true; // para que pueda pasar a otro campo con TAB

	if ((tecla<=95) || (tecla==193) || (tecla==201) || (tecla==205) || (tecla==211) || (tecla==218)) { // deja pasar mayusculas y numeros
		return true;                             
	} else {
		return false;
	}
}

function PopWindow()
{
window.open('./includes/popup.php','popup','width=450,height=275,menubar=no,scrollbars=yes,toolbar=no,location=no,directories=no,resizable=no,top=0,left=0');
}
function ventanaSecundaria (URL){ 
   window.open(URL,"ventana1","");
}

/*
function archivo(evt) {
  var urlfoto = evt.target.urlFoto; // FileList object

  // Obtenemos la imagen del campo "file".
  for (var i = 0, f; f = urlFoto[i]; i++) {
	//Solo admitimos imágenes.
	if (!f.type.match('image.*')) {
		continue;
	}

	var reader = new FileReader();

	reader.onload = (function(theFile) {
		return function(e) {
		  // Insertamos la imagen
		 document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
		};
	})(f);

	reader.readAsDataURL(f);
  }
}
*/
	 


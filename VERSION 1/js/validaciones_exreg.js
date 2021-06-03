//Definir inputs
const input_name = document.getElementById("inputName");
const input_ape1 = document.getElementById("inputApe1");
const input_ape2 = document.getElementById("inputApe2");
const input_pass_ini = document.getElementById("inputPassIni");
const input_pass_confirm = document.getElementById("inputPassConfirm");
const input_email = document.getElementById("inputEmail");
const input_tel = document.getElementById("inputTel");
const input_dni = document.getElementById("inputDNI");
const input_check_terms = document.getElementById("inputCheckTerms");
//Definir iconos
const icon_name = document.getElementById("iconName");
const icon_ape1 = document.getElementById("iconApe1");
const icon_ape2 = document.getElementById("iconApe2");
const icon_pass_ini = document.getElementById("iconPass1");
const icon_pass_confirm = document.getElementById("iconPass2");
const icon_email = document.getElementById("iconEmail");
const icon_dni = document.getElementById("iconDNI");
const icon_tel = document.getElementById("iconTel");

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_reg").addEventListener('submit', validarRegistro);
});

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_login").addEventListener('submit', validarLogin);
});

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_contact").addEventListener('submit', validarContacto);
});

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_issues").addEventListener('submit', validarFormProblema);
});

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_pass_change").addEventListener('submit', validarCambioContraseña);
});

//Función que comprueba que TODOS los datos estén debidamente validados
function validarRegistro(evento)
{
	//Validar cada campo
	validarDato(validarNombreCompleto(input_name.value), input_name, icon_name);
	validarDato(validarNombreCompleto(input_ape1.value), input_ape1, icon_ape1);
	validarDato(validarNombreCompleto(input_ape2.value), input_ape2, icon_ape2);
	validarDato(validarCorreo(input_email.value), input_email, icon_email);
	validarDato(validarContraseña(input_pass_ini.value, input_pass_confirm.value), input_pass_ini, icon_pass_ini);
	validarDato(validarContraseña(input_pass_ini.value, input_pass_confirm.value), input_pass_confirm, icon_pass_confirm);
	validarDato(validarDNI(input_dni.value), input_dni, icon_dni);
	validarDato(validarTelefono(input_tel.value), input_tel, icon_tel);

	//Validados los datos mediante expresiones regulares realizamos submit
	if(validarCorreo(input_email.value) && validarContraseña(input_pass_ini.value, input_pass_confirm.value) && validarNombreCompleto(input_name.value) 
		&& validarNombreCompleto(input_ape1.value) && validarNombreCompleto(input_ape2.value) && validarDNI(input_dni.value) && validarTelefono(input_tel.value) 
		&& validarCheckTerminos(input_check_terms.checked))
		this.submit();	//Envío del formulario
	//En caso contrario, nos quedamos en la página actual indicando los valores que no son correctos
	else
		evento.preventDefault();	//Continuar en el formulario en caso de que un campo sea erróneo
}

function validarLogin(evento)
{
	validarDato(validarCorreo(input_email.value), input_email, icon_email);
	validarDato(validarContraseñaLogin(input_pass_ini.value), input_pass_ini, icon_pass_ini);

	//Validados los datos mediante expresiones regulares realizamos submit
	if(validarCorreo(input_email.value) && validarContraseñaLogin(input_pass_ini.value))
		this.submit();
	//En caso contrario, nos quedamos en la página actual indicando los valores que no son correctos
	else
		evento.preventDefault();
}

function validarContacto(evento)
{
	validarDato(validarNombreCompleto(input_name.value), input_name, icon_name);
	validarDato(validarCorreo(input_email.value), input_email, icon_email);
	//Validados los datos mediante expresiones regulares realizamos submit
	if(validarCorreo(input_email.value) && validarNombreCompleto(input_name.value))
		this.submit();
	//En caso contrario, nos quedamos en la página actual indicando los valores que no son correctos
	else
		alert("error");
		evento.preventDefault();
}

function validarFormProblema(evento)
{
	validarDato(validarNombreCompleto(input_name.value), input_name, icon_name);
	validarDato(validarNombreCompleto(input_ape1.value), input_ape1, icon_ape1);
	validarDato(validarNombreCompleto(input_ape2.value), input_ape2, icon_ape2);
	validarDato(validarCorreo(input_email.value), input_email, icon_email);
	//Validados los datos mediante expresiones regulares realizamos submit
	if(validarCorreo(input_email.value) && validarNombreCompleto(input_name.value) && validarNombreCompleto(input_ape1.value) && validarNombreCompleto(input_ape2.value))
		this.submit();	//Envío del formulario
	//En caso contrario, nos quedamos en la página actual indicando los valores que no son correctos
	else
		evento.preventDefault();	//Continuar en el formulario en caso de que un campo sea erróneo
}

function validarCambioContraseña(evento)
{
	validarDato(validarCorreo(input_email.value), input_email, icon_email);
	validarDato(validarContraseña(input_pass_ini.value, input_pass_confirm.value), input_pass_ini, icon_pass_ini);
	validarDato(validarContraseña(input_pass_ini.value, input_pass_confirm.value), input_pass_confirm, icon_pass_confirm);

	//Validados los datos mediante expresiones regulares realizamos submit
	if(validarCorreo(input_email.value) && validarContraseña(input_pass_ini.value, input_pass_confirm.value))
		this.submit();
	//En caso contrario, nos quedamos en la página actual indicando los valores que no son correctos
	else
		evento.preventDefault();
}

//Función que recoge un booleano, el input y el icono
function validarDato(valor, input, icon)
{
	if(valor)
		cambiarCampos(input, icon, 'is-danger','is-success','fa-exclamation-triangle','fa-check-circle');
	else
		cambiarCampos(input, icon, 'is-success','is-danger','fa-check-circle','fa-exclamation-triangle');
}
//Cambiar el aspecto de los bordes y los iconos de los campos que se vean afectados
function cambiarCampos(input, icon, borde1, borde2, icono1, icono2)
{
	input.classList.remove(borde1);
	input.classList.add(borde2);
	icon.classList.remove(icono1);
	icon.classList.add(icono2);
}

//Aplicar expresiones regulares
function validarNombreCompleto(dato)
{
	if(dato.length > 0 && dato.length <= 45)
		return true;
	else return false;
}

function validarDNI(dni)
{
	if(/\d{8}[a-z A-Z]/.test(dni) && (dni.length != 0))
		return true;
	else return false;
}

function validarTelefono(tel)
{
	if (/^[6789]\d{8}$/.test(tel) && (tel.length != 0))
	  return true;
	else return false;
}

function validarCheckTerminos(isChecked)
{
	if(isChecked)
		return true;
	else return false;
}

function validarCorreo(correo)
{
	if((/^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(correo)))
  		return true;
	else return false;
}
/*
La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, 
al menos una minúscula y al menos una mayúscula.
Puede tener otros símbolos.
w3Unpocodet0d0
w3Unpo<code>t0d0
*/
function validarContraseñaLogin(contraseña)
{
	if((/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contraseña)))
  		return true;
	else return false;
}
function validarContraseña(contra1, contra2)
{
	if((/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contra1)) &&
		(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contra2)) &&
		(contra1 == contra2))
  		return true;
	else return false;
}
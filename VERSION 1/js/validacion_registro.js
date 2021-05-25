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
//Definir inputs
const icon_pass_ini = document.getElementById("iconPass1");
const icon_pass_confirm = document.getElementById("iconPass1");
const icon_email = document.getElementById("iconEmail");
const icon_dni = document.getElementById("iconDNI");
const icon_tel = document.getElementById("iconTel");

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_reg").addEventListener('submit', validarFormulario); 
});

//Función que comprueba que TODOS los datos estén debidamente validados
function validarFormulario(evento)
{
	var nom_completo_val = pass_val = correo_val = tel_val = dni_val = terms_val = false;
	var nombre = document.getElementById("inputName").value;
	var ape1 = document.getElementById("inputApe1").value;
	var ape2 = document.getElementById("inputApe2").value;
	var pass_ini = document.getElementById("inputPassIni").value;
	var pass_confirm = document.getElementById("inputPassConfirm").value;
	var correo = document.getElementById("inputEmail").value;
	var tel = document.getElementById("inputTel").value;
	var dni = document.getElementById("inputDNI").value;
	var checkTerms = document.getElementById("inputCheckTerms").checked;

	if(correo.length != 0 && validarCorreo(correo))
		correo_val = true;
	if(pass_ini.length != 0 && pass_confirm.length != 0 && validarContraseña(pass_ini, pass_confirm))
		pass_val = true;
	if(validarNombreCompleto(nombre, ape1, ape2))
		nom_completo_val = true;
	if(validarDNI(dni))
		dni_val = true;
	if(validarTelefono(tel))
		tel_val = true;
	if(validarCheckTerminos(checkTerms))
		terms_val = true;

	validarDato(correo_val, input_email, icon_email);
	validarDato(pass_val, input_pass_ini, icon_pass_ini);
	validarDato(pass_val, input_pass_confirm, icon_pass_confirm);
	validarDato(dni_val, input_dni, icon_dni);
	validarDato(tel_val, input_tel, icon_tel);

	//Validados los datos mediante expresiones regulares realizamos submit
	if(correo_val && pass_val && nom_completo_val && tel_val && terms_val && dni_val)
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

function cambiarCampos(input, icon, borde1, borde2, icono1, icono2)
{
	input.classList.remove(borde1);
	input.classList.add(borde2);
	icon.classList.remove(icono1);
	icon.classList.add(icono2);
}

//Aplicar expresiones

function validarNombreCompleto(nombre, ape1, ape2)
{
	if((nombre.length > 0 && nombre.length <= 45) && (ape1.length > 0 && ape2.length <= 45) && (ape2.length > 0 && ape2.length <= 45))
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
function validarContraseña(contra1, contra2)
{
	if((/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contra1)) &&
		(/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contra2)) &&
		(contra1 == contra2))
  		return true;
	else return false;
}
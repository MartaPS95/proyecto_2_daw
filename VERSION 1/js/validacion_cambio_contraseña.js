const input_email = document.getElementById("inputEmail");
const input_pass_ini = document.getElementById("inputPassIni");
const input_pass_confirm = document.getElementById("inputPassConfirm");

const icon_email = document.getElementById("iconEmail");
const icon_pass_ini = document.getElementById("iconPassIni");
const icon_pass_confirm = document.getElementById("iconPassConfirm");

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_pass_change").addEventListener('submit', validarFormulario); 
});

//Funciones de validación de expresiones regulares
function validarFormulario(evento) 
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

function cambiarCampos(input, icon, borde1, borde2, icono1, icono2)
{
	input.classList.remove(borde1);
	input.classList.add(borde2);
	icon.classList.remove(icono1);
	icon.classList.add(icono2);
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
const input_email = document.getElementById("inputEmail");
const input_pass = document.getElementById("inputPass");
const icon_email = document.getElementById("iconEmail");
const icon_pass = document.getElementById("iconPass");

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_login").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {
	var correo_valido = contraseña_valida = false;
	var correo = document.getElementById('inputEmail').value;
	var contraseña = document.getElementById("inputPass").value;
	if(correo.length != 0 && validarCorreo(correo))
		correo_valido = true;
	if(contraseña.length != 0 && validarContraseña(contraseña))
		contraseña_valida = true;

	validarDato(correo_valido, input_email, icon_email);
	validarDato(contraseña_valida, input_pass, icon_pass);

	//Validados los datos mediante expresiones regulares realizamos submit
	if(correo_valido && contraseña_valida)
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

function validarContraseña(contraseña)
{
	if((/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/.test(contraseña)))
  		return true;
	else return false;
}
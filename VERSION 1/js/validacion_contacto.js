const input_name = document.getElementById("inputName");
const input_email = document.getElementById("inputEmail");
const icon_name = document.getElementById("iconName");
const icon_email = document.getElementById("iconEmail");

document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("form_contact").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) 
{

	validarDato(validarNombre(input_name.value), input_name, icon_name);
	validarDato(validarCorreo(input_email.value), input_email, icon_email);
	//Validados los datos mediante expresiones regulares realizamos submit
	if(validarCorreo(input_email.value) && validarNombre(input_name.value))
	{
		alert("Se ha enviado su consulta");
		this.submit();
	}
	//En caso contrario, nos quedamos en la página actual indicando los valores que no son correctos
	else
	{
		alert("error");
		evento.preventDefault();
	}
}

//Función que recoge un booleano, el input y el icono
function validarDato(valor, input, icon)
{
	if(valor)
		cambiarCampos(input, icon, 'is-danger','is-success','fa-exclamation-triangle','fa-check');
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

//Aplicar expresiones regulares
function validarNombre(nombre)
{
	if(nombre.length > 0 && nombre.length <= 45)
		return true;
	else return false;
}

function validarCorreo(correo)
{
	if((/^\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(correo)))
  		return true;
	else return false;
}
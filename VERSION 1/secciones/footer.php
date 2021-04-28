<!--
	MARTA PARRA SÁEZ
	Archivo que contiene el pie de página de inicio
-->
<footer>
	<div>
		<?php
		setlocale(LC_TIME,"es_ES");
		#Correción del problema a la hora de mostrar la fecha en español
		echo utf8_encode(strftime("Hoy es %A del mes %B "));
		echo strftime("del año %Y");
		?>
	</div>
</footer>
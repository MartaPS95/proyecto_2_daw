<!--
	MARTA PARRA SÁEZ
	Archivo que contiene el pie de página de inicio
-->
<footer>
	<div>
		<?php
		setlocale(LC_TIME,"es_ES");
		echo strftime("Hoy es %A del mes %B del año %Y");
		?>
	</div>
</footer>
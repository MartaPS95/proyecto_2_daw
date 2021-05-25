<footer>
	<div>
		<?php
		setlocale(LC_TIME,"es_ES");
		echo utf8_encode(strftime("Hoy es %A del mes de %B "));
		echo strftime("del año %Y");
		?>
	</div>
</footer>
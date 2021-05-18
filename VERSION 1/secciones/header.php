<!--
	El header mostrará las características de nuestro documento html y aplicará los estilos asociados al framework de bulma, 
	que es el que estamos empleando en este caso. Se ha añadido el uso de un favicon para distinguir nuestra pestaña
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
	<!--Bulma local en caso de no haber internet-->
	<link rel="stylesheet" href="bulma/css/bulma.min.css">
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/estilos.css">
	<!--Iconos en los campos de los formularios obtenidos de Font Awsome-->
	<link rel="stylesheet" href="fa/css/all.min.css">
	<!--Favicon junto al título de cada una de las páginas de nuestra web-->
	<link rel = "icon" href = "assets/img/edu_favicon.png" type = "image/png">
	<script type = "text/javascript" src="./js/main.js?"></script>
</head>
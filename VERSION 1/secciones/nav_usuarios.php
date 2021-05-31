<!--
  [EN PRUEBAS]
  Esta sección navegador se aplica principalmente en las páginas asociadas a las sesiones abiertas de nuestros usuarios, 
  la idea sería colocar a la derecha el nombre del usuario con sesión abierta, si es posible una opción de ajustes de su página
  y notificaciones.
-->
<?php
  /*Se inicia la sesión que guardará en nuestro nav el nombre y el apellido del usuario*/
  session_start();
  if(isset($_SESSION['nombre']) && isset($_SESSION['apellidos']))
  {
      $nombre = $_SESSION['nombre'];
      $apellidos = $_SESSION['apellidos'];
  }
  //En caso de que el usuario no haya ingresado campos muestra error [En pruebas de nav]
  else
  {
    //Imaginemos que el usuario vuelve a la página de sesión después de haber cerrado, podríamos volver a login o mostrar un error de que no hay sesión.
    header("Location:./php/prueba_sesion.php");
  }
?>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <span class="navbar-item">
      <img src="./assets/img/edu_logo.png">
    </span>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href = "index.php">
        <span class = "icon is-large is-left">
          <i class = "fas fa-home"></i>
        </span>
        &nbsp;Inicio
      </a>
      <a class="navbar-item" href = "mantenimiento.php">
        <span class = "icon is-large is-left">
          <i class = "fas fa-book"></i>
        </span>
        &nbsp;Documentación
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Más
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href = "https://github.com/MartaPS95/proyecto_2_daw/blob/master/README.md" target = "_blank">  <!--Aqui puede ser una ventana js-->
            Sobre nosotros
          </a>
          <a class="navbar-item" href = "mantenimiento.php">
            Trabajos
          </a>
          <a class="navbar-item" href = "contacto.php">
            Contacto
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href = "form_problemas.php">
            Informar de un problema
          </a>
        </div>
      </div>
    </div>
    <div class="navbar-end is-fluid">
      <div class="navbar-item">
        <!--Mostramos el nombre y apellido del usuario actual-->
        <strong><?php echo $nombre . " " . $apellidos;?></strong>
      </div>
      <div class = "navbar-item">
        <!--Se aplica un submit que nos lleva a acceso.php donde se verificará la información-->
        
      </div>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          <span class="navbar-item"><!-- Imagen de usuario, en caso de que la quiera configurar-->
            <img src="./assets/img/user_default_image.png">
          </span>
        </a>
        <hr class="navbar-divider">
        <div class="navbar-dropdown">
           <a class="navbar-item" href = "./cambio_pass.php">  <!--Aqui puede ser una ventana js-->
            Cambiar contraseña
           </a>
           <hr class="navbar-divider">
          <a class="navbar-item" href = "./php/cierre_sesion.php">  <!--Aqui puede ser una ventana js-->
            Cerrar sesión
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
<?php 
  if(@$_POST['cierre_sesion'] == "Cerrar sesión")
  {
    session_destroy();
    unset($_SESSION['nombre']);
    unset($_SESSION['apellidos']);
  }
?>
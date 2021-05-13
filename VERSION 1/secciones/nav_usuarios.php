<!--
  [EN PRUEBAS]
  Esta sección navegador se aplica principalmente en las páginas asociadas a las sesiones abiertas de nuestros usuarios, 
  la idea sería colocar a la derecha el nombre del usuario con sesión abierta, si es posible una opción de ajustes de su página
  y notificaciones.
-->
<nav class="navbar" role="navigation" aria-label="user navigation">
  <div class="navbar-brand">
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div>

  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item">
        Inicio
      </a>
      <!--En esta opción se podría establecer la posibilidad de descargar un archivo que contiene precidamente la documentación del proyecto-->
      <a class="navbar-item">
        Documentación
      </a>

      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          Más
        </a>

        <div class="navbar-dropdown">
          <!--Acceso a mi repositorio de github donde se recoge más información del proyecto-->
          <a class="navbar-item" href = "https://github.com/MartaPS95/proyecto_2_daw/blob/master/README.md">
            Sobre nosotros
          </a>
          <a class="navbar-item">
            Trabajos
          </a>
          <a class="navbar-item" href = "contacto.php">
            Contacto
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Informar de un problema
          </a>
        </div>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
          <a href = "#">
            <strong>Nombre y apellidos usuario  </strong>
          </a>
          <div class = "buttons">
            <a href="index.php"class="button is-secondary">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
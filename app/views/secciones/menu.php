<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimiento
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo URL; ?>usuarios">Usuarios</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo URL; ?>autores">Autores</a>
          <a class="dropdown-item" href="<?php echo URL; ?>categorias">Categorias</a>
          <a class="dropdown-item" href="<?php echo URL; ?>libros">Libros</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Informes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Libros</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Usuarios</a>
        </div>
      </li>
      <?php if (isset($_SESSION["nuser"])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URL; ?>login/cerrar">Cerrar sesion</a>
        </li>
    </ul>
    <span><?php echo $_SESSION["nuser"]; ?></span>
  <?php } else { ?>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo URL; ?>login/">Login</a>
    </li>
    </ul>
  <?php } ?>
  </div>
</nav>
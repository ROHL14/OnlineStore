<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/OnlineStore">OnlineStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL; ?>productos">Productos</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mi cuenta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if (isset($_SESSION["nuser"])) { ?>
            <a class="dropdown-item" href="<?php echo URL; ?>cuenta"><?php echo $_SESSION["nuser"]; ?></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo URL; ?>login/cerrar">Cerrar sesion</a>
          <?php } else { ?>
            <a class="dropdown-item" href="<?php echo URL; ?>login/">Login</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo URL; ?>login/">Registrarse</a>
          <?php } ?>
        </div>
      </li>

  </div>
</nav>
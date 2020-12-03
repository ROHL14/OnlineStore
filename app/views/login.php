<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "app/views/secciones/css.php"; ?>
</head>

<body class="bg-dark">
  <div>
    <?php
    include_once "app/views/secciones/menu.php";
    ?>
  </div>
  <div class="container py-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Login</h3>
          </div>
          <div class="card-body">
            <form action="guardar.php" id="loginForm">
              <div class="form-group">
                <input type="text" name="user" id="user" class="form-control" placeholder="Usuario">
              </div>
              <div class="form-group">
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
              </div>
              <div class="alert alert-danger d-none" role="alert" id="mensaje"></div>
              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Login</button>
              </div>
              <p class="text-muted text-center">UNICAES &copy 2020</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php include_once "app/views/secciones/script.php"; ?>
<script type="text/javascript" src="<?php echo URL; ?>public/js/login.js"></script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "app/views/secciones/cssView.php";
  ?>
</head>

<body>

  <?php
  include_once "app/views/secciones/menuView.php";
  ?>



  <?php include_once "app/views/secciones/bodyView.php"; ?>


  <?php
  include_once "app/views/secciones/footerView.php";
  ?>

  <?php
  include_once "app/views/secciones/scriptView.php";
  ?>

  <!-- main -->
  <script type="text/javascript" src="<?php echo URL; ?>public/js/mainView.js"></script>
</body>

</html>
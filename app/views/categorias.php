<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once "app/views/secciones/css.php";
  ?>
</head>

<body>

  <?php
  include_once "app/views/secciones/menu.php";
  ?>
  <div>
    <div id="productsSection"></div>

    <div class="row">
      <div class="col-md-12">
        <nav aria-label="Page navigation example" class="float-right">
          <ul class="pagination">
          </ul>
        </nav>
      </div>
    </div>
  </div>



  <?php
  include_once "app/views/secciones/footer.php";
  ?>

  <?php
  include_once "app/views/secciones/script.php";
  ?>
  <!-- productos -->
  <script type="text/javascript" src="<?php echo URL; ?>public/js/productos.js"></script>
</body>

</html>
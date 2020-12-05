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

  <div class="container-fluid" id="container">
    <div class="row mt-3" id="productosBody">
      <div class="col-md-2">
        <div class="mt-3">
          <div class="sidebar">

            <h6>Productos</h6>
            <div class="sidebar-all" id="sideAll">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="filtro" id="todo" value="" onchange="aplicarFiltro(event)" checked>
                <label class=" form-check-label" for="todo">
                  Todos
                </label>
              </div>
            </div>

            <h6>Categorias</h6>
            <div class="sidebar-categorias" id="sideCategoria">
            </div>

            <h6>Marcas</h6>
            <div class="sidebar-marcas" id="sideMarca">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="row" id="productsSection">
        </div>

        <div class="row">
          <div class="col-md-10">
            <nav aria-label="Page navigation example" class="float-right">
              <ul class="pagination">
              </ul>
            </nav>
          </div>
        </div>

      </div>
    </div>

    <div class="content-panel mt-4 d-none p-5" id="panelFormulario">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="card-main">
            <div class="card-main__title">
              <button id="btnCancelar">
                <div class="icon">
                  <a><i class="fa fa-arrow-left"></i></a>
                </div>
              </button>
              <h3 id="marca"></h3>
            </div>
            <div class="card-main__body">
              <div class="half">
                <div class="featured_text">
                  <h1 id="nombre"></h1>
                  <p class="sub" id="categoria"></p>
                  <p class="price" id="precio"></p>
                </div>
                <div class="image" id="divFoto">

                </div>
              </div>
              <div class="half">
                <div class="description">
                  <p id="descripcion"></p>
                </div>
                <span class="stock"><i class="fa fa-pen"></i> <span id="cantidad"></span> </span>

              </div>
            </div>
            <div class="card-main__footer">

              <div class="action">
                <button type="button">Comprar</button>
              </div>
            </div>
          </div>
        </div>
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
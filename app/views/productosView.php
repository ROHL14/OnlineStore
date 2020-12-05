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

    <div class="content-panel d-none p-3" id="panelProducto">
      <div class="row">
        <div class="col-md-8 mx-auto">
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

              <div class="action" id="buttonSection">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-8 order-md-1 mx-auto d-none p-5" id="checkout">
      <h4 class="mb-3">Formulario de Envio</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" placeholder="" value="" required>
            <div class="invalid-feedback">
              Primer nombre requerido.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" placeholder="" value="" required>
            <div class="invalid-feedback">
              Apellido requerido.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email
            <input type="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Ingrese un correo electronico valido.
            </div>
        </div>

        <div class="mb-3">
          <label for="direccion">Direccion</label>
          <input type="text" class="form-control" id="direccion" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Ingrese la direccion de envio.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="ciudad">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" required>
            <div class="invalid-feedback">
              Ingrese una ciudad valida.
            </div>
          </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Pago</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nombre_tarjeta">Nombre en la tarjeta</label>
            <input type="text" class="form-control" id="nombre_tarjeta" placeholder="" required>
            <small class="text-muted">Nombre completo del propietario de la tarjeta</small>
            <div class="invalid-feedback">
              Nombre en la tarjeta es requerido
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="numero_tarjeta">Numero de la tarjeta de credito</label>
            <input type="text" class="form-control" id="numero_tarjeta" placeholder="" required>
            <div class="invalid-feedback">
              Numero de la tarjeta de credito es requerido
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="fecha_expiracion">Fecha de expiracion</label>
            <input type="text" class="form-control" id="fecha_expiracion" placeholder="" required>
            <div class="invalid-feedback">
              Fecha de expiracion es requerida
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="" required>
            <div class="invalid-feedback">
              Codigo de seguridad es requerido
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Realizar pago</button>
      </form>
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
  <script type="text/javascript" src="<?php echo URL; ?>public/js/productosView.js"></script>
</body>

</html>
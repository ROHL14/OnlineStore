<!DOCTYPE html>
<<<<<<< HEAD
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>..::OnlineStore::..</title>
	<?php include "app/views/secciones/css.php" ?>
</head>
<body>
	<div class="container">
		<section id="encabezado">
			<?php include "app/views/secciones/header.php" ?>
		</section>
		<section id="menu">
			<?php include "app/views/secciones/menu.php" ?>
		</section>
		<section id="centro">
			<div class="content-panel mt-4" id="panelDatos">
				<h4><i class="fa fa-book"></i>Productos
					<button class="btn btn-success btn-md ml-4" id="btnAgregar"><i class="fa fa-plus"></i>Agregar Producto</button>
				</h4>
				<hr>
				<div id="contentTable">
					<div class="row mb-1">
						<div class="input-group col-md-4">
						      <input class="form-control py-2" type="search" placeholder="Buscar" id="txtSearch">
						      <span class="input-group-append">
						        <button class="btn btn-outline-secondary" type="button">
						            <i class="fa fa-search"></i>
						        </button>
						      </span>
						</div>
					</div>
					<table class="table table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">Corr</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Descripcion</th>
					      <th scope="col">Categoria</th>
                          <th scope="col">Autor</th>
                          <th scope="col">precio</th>
					      <th scope="col">&nbsp;</th>
					    </tr>
					  </thead>
					  <tbody>
					  </tbody>
					</table>
					<div class="row">
						<div class="col-md-12">
							<nav aria-label="Page navigation example" class="float-right">
							  <ul class="pagination">
							    
							  </ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="content-panel m-4 d-none" id="panelFormulario">
				<div class="row">
					<div class="col-md-10 mx-auto">
						<h4><i class="fa fa-user"></i>Productos
						</h4>
						<hr>
						<form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
		                      <input type="hidden" id="id_producto" name="id_producto" value="0" class="campo">
						        <div class="form-group row">
		                          <label for="nombre_producto" class="col-sm-2 col-form-label">Producto</label>
		                          <div class="col-sm-10">
		                            <input type="text" class="form-control campo" id="nombre_producto" name="nombre_producto" placeholder="nombre_producto" required autofocus>
		                          </div>
		                        </div>
		                        <div class="form-group row">
		                          <label for="precio_producto" class="col-sm-2 col-form-label">Precio</label>
		                          <div class="col-sm-10">
		                            <input type="text" class="form-control campo" id="precio_producto" name="precio_producto" placeholder="precio_producto" required autofocus>
		                          </div>
		                        </div>
		                        <div class="form-group row">
		                          <label for="descripcion" class="col-sm-2 col-form-label">Descripci&oacute;n</label>
		                          <div class="col-sm-10">
		                            <textarea class="form-control campo" rows="3" id="descripcion" name="descripcion"></textarea>
		                          </div>
		                        </div>
		                        <div class="form-group row">
		                          <label for="id_categoria" class="col-sm-2 col-form-label">Categoria</label>
		                          <div class="col-sm-10">
		                            <select class="form-control campo" id="id_categoria" name="id_categoria" required>
		                                
		                            </select>
		                          </div>
		                        </div>
		                        <div class="form-group row">
		                          <label for="id_marca" class="col-sm-2 col-form-label">Marca</label>
		                          <div class="col-sm-10">
		                            <select class="form-control campo" id="id_marca" name="id_marca" required>
		                                
		                            </select>
		                          </div>
		                        </div>
		                        <div class="form-group row">
	                              	<label class="col-sm-2 col-sm-2 col-form-label">Foto</label>
	                              	<div class="col-sm-10">
	                                	<div class="img-thumbnail" id="divFoto" style="width: 200px; height: 150px;"></div>
	                                	<div>
	                                  		<span class="fileinput-new">Seleccione la foto</span>
	                                  		<input type="file" name="foto" id="foto" class="d-none">
	                                	</div>
	                              	</div>
	                          	</div>
		                        
						         <button type="button" class="btn btn-default" id="btnCancelar">Cancelar</button>
		                          <button type="submit" class="btn btn-primary">Guardar</button>
					  	</form>
					</div>
				</div>
			</div>
		</section>
		<section id="pie">
			<?php include "app/views/secciones/footer.php" ?>
		</section>
	</div>
<?php include "app/views/secciones/script.php" ?>
<script type="text/javascript" src="<?php echo URL;?>public/js/productos.js"></script>
</body>
=======
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="sidebar">
            <div class="sidebar-categorias"></div>
            <div class="sidebar-marcas"></div>
          </div>
        </div>
        <div class="col-md-9">
          <div id="productsSection"></div>
        </div>
      </div>


    </div>


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

>>>>>>> d86b544e6b0a62572fe7546a5dc0aeec08217e9e
</html>
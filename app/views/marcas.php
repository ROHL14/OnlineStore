<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>..::BookStore::..</title>
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
				<h4><i class="fa fa-user"></i>Marcas
					<button class="btn btn-success btn-md ml-4" id="btnAgregar"><i class="fa fa-plus"></i>Agregar Marca</button>
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
					      <th scope="col">Nombre de la marca</th>
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
						<h4><i class="fa fa-user"></i>Marca
						</h4>
						<hr>
						<form class="form-horizontal" role="form" id="miform" enctype="multipart/form-data">
							<input type="hidden" id="id_marca" name="id_marca" value="0">
							<div class="form-group row">
		                        <label for="marca" class="col-sm-2 col-form-label">Marca</label>
		                        <div class="col-sm-10">
		                            <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" required autofocus>
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
<script type="text/javascript" src="<?php echo URL;?>public/js/marcas.js"></script>
</body>
</html>
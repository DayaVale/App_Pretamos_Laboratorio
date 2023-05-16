<!DOCTYPE html>
<!--http://localhost/Capstone-EICT/admin.php-->
<html lang="es" xmlns:th="http://www.thymeleaf.org">
<head>
	<meta charset="UTF-8"/>
	<title>Registo de Inventario</title>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script 
		src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script 
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link rel="stylesheet"
		href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	<link rel="stylesheet" type="text/css" href="static/css/user-form.css"
		th:href="@{/css/user-form.css}">
	<!-- DATA TABLE -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="stylescss/styles4.css" />

	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#userList').DataTable();
	    } );
	</script>
</head>
<body>
	<div class="container">
	<div class="mx-auto col-sm-12 main-section" id="myTab" role="tablist">
		<ul class="nav nav-tabs justify-content-end ">
			<li class="nav-item">
			<a class="nav-link" id="form-tab" data-toggle="tab" href="#list1" role="tab" aria-controls="form" aria-selected="true">Mis Reservaciones</a>				   	
			</li>
			<li class="nav-item">
			<a class="nav-link" id="list-tab" data-toggle="tab" href="#form1" role="tab" aria-controls="list" aria-selected="true">Reservar</a>				   	
			</li>
			<li class="nav-item">
			<a class="nav-link" id="form-tab" data-toggle="tab" href="#list2" role="tab" aria-controls="form" aria-selected="true">Reservaciones</a>				   	
			</li>
			<li class="nav-item">
			<a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false">Inventario</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Registro de Nuevos equipos</a>				   	
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
				<div class="card">
					<div class="card-header">
						<h4>Inventario</h4>
					</div>
					<div class="card-body">
							<div class="table-responsive">
								<table id="userList" class="table table-bordered table-hover table-striped">
									<thead class="thead">
									<tr >
										<th >Numero Serial</th>
										<th >Nombre</th>
										<th >Cantidad Total</th>
										<th >Observacion</th>
										<th >Imagen</th>
										<th></th>
									</tr>
									<tbody>
									<?php 
									require 'Conexion_BD.php';
									$query = pg_query($conexion,"SELECT * FROM inventario_laboratorio");
									$result = pg_num_rows($query);
									if($result > 0){
										while($data = pg_fetch_assoc($query)){
										?>
										<tr>
										<th  id = "nserial"><?php echo $data['numero_serial']?></th>
										<th  id = "nombresi" ><?php echo $data['nombre_material']?></th>
										<th  id = "cantidad"><?php echo $data['cantidad_total']?></th>
										<th id = "obse"><?php echo $data['observacion']?></th>
										<th><img src="imgs/<?php echo $data['imagen']; ?>" alt="Imagen" width="100" height="100"></th>
										<td>
											<a href="#" data-toggle= "modal" data-target = "#exampleModal" onclick = "mostrarVentanaEmergente(this)"><i class="fas fa-edit"></i></a> 
											<a href="#"><i class="fas fa-search"></i></a>
											<a href="#"><i class="fas fa-times"></i></a>
											<a href="#"><i class="fas fa-check"></i></a>
										</td>
										<th></th>
										</tr>
										<?php
										}
									}
									?>
									</tbody>
									</thead>
								</table>
								<div class="modal fade" tabindex="-1" id = "exampleModal">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Editar Material</h5>
											</div>
											<div class="modal-body">
												<form id="formularioFila" enctype="multipart/form-data">
													<div class="form-group">
													<label for="nserial">Numero Serial:</label>
														<div class="col-lg-9">
														<input class="form-control" type="text" id="nserialInput" readonly disabled><br>
														</div>
													</div>
													<div class="form-group">
													<label for="nombresi">Nombre:</label>
													<input class="form-control" type="text" id="nombresiInput"><br>
													</div>
													<div class="form-group">
													<label for="cantidad">Cantidad Total:</label>
													<input class="form-control"  type="number" id="cantidadInput"><br>
													</div>
													<div class="form-group">
													<label for="obse">Observación:</label>
													<textarea class="form-control" type="text" id="obseInput"></textarea><br>
													</div>
													<div class="form-group">
													<label for="imagen">Imagen</label>
													<input class="form-control" type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*" onchange="mostrarImagen(event)">
													</div>
													<div class="image-preview-container" >
													<img id="imagenPreview" src="#" alt="Vista previa de la imagen" style="max-width: 100%; max-height: 200px;">
													</div>
												</form>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-dismiss="modal" id = "bntcerrar">Cerrar</button>
												<button type="button" class="btn btn-primary" type="submit">Guardar Cambios</button>
											</div>
										</div>
									</div>
								</div>
								<script src="ventanaeme.js"></script>
							</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
				<div class="card">
					<div class="card-header">
						<h4>Registro de Inventario</h4>
					</div>
					<div class="card-body">
						<form class="form" action="save_material.php" method="post" role="form" autocomplete="off" enctype="multipart/form-data">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Serial del Material</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name= "Serial" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Nombre del Material</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="material" required>
								</div>
							</div>
							<div class="form-group row">
							<label class="col-lg-3 col-form-label form-control-label">Cantidad Total</label>
							<div class="col-lg-9">
								<input class="form-control" type="number" name="cantidad" required min="0" pattern="\d+">
							</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Imagen</label>
								<div class="col-lg-9">
									<input type="file" name="imagen" accept="image/*" onchange="mostrarImagen2(event)" required>
								</div>
								</div>
								<div class="image-preview-container" >
								<img id="imagenPreview2" src="#" alt="Vista previa de la imagen" style="max-width: 100%; max-height: 200px;">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Observaciones</label>
								<div class="col-lg-9">
									<textarea class="form-control" name = "obser" type="text" rows="3"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12 text-center">
									<input type="reset" class="btn btn-secondary" value="Cancelar">
									<input type="submit" class="btn btn-primary" value="Guardar">
								</div>
							</div>
						</form>
						<script src="ventanaeme.js"></script>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
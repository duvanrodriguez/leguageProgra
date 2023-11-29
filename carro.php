<?php
	/*-------------------------
	Autor: Duvan Rodriguez
	---------------------------*/
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_carro="active";
	$title="carro | PROYECTO BD";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("includes/head.php");?>
  </head>
  <body>
	<?php
	include("includes/navbar.php");	
	?>
<br>
<main role="main">
    <div class="container">
    	<br>
		<div class="panel panel-success">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h4 class="h3 mb-0 text-gray-800"><i class='glyphicon glyphicon-search'></i> Consultar carros</h4>
			    <div class="btn-group pull-right">
			    	<button type='button' class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span><i class="bi bi-journal-plus"></i> Agregar</button>
				</div>
			</div>
    
    <hr>

    <br>

		<div class="panel-body">

			<?php
			include("modal/registro_carro.php");
			include("modal/editar_carro.php");
			?>
			
			<form class="form-horizontal" role="form" id="datos">
				
						
					<div class="row">
					<div class='col-md-4'>
						<label>Filtrar por placa</label>
						<input type="text" class="form-control" id="q" placeholder="placa" onkeyup='load(1);'>
					</div>
					

					<div class='col-md-12 text-center'>
						<span id="loader"></span>
					</div>
				</div>
				</form>
				<hr>
				<div>
					<div id="resultados"></div><!-- Carga los datos ajax -->
				</div>	
				<div>
					<div class="outer_div"></div><!-- Carga los datos ajax -->
				</div>
			
					
  </div>
</div>
		 
	</div>
</main>

<br>
<br>
<br>
<br>
<br>
<br>
	
	<?php
	include("includes/footer.php");
	?>
	<script type="text/javascript" src="js/carro.js"></script>
  </body>
</html>
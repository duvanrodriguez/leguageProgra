<?php
	/*-------------------------
	Autor: Duvan Rodriguez
	---------------------------*/

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		$active_profesor="active";	
	$title="profesor | PROYECTO BD";
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
				<h4 class="h3 mb-0 text-gray-800"><i class='glyphicon glyphicon-search'></i> Consultar Profesores</h4>
			    <div class="btn-group pull-right">
			    	<button type='button' class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span><i class="bi bi-journal-plus"></i> Agregar</button>
				</div>
			</div>
    
    <hr>

    <br>

		<div class="panel-body">

			<?php
			include("modal/registro_profesor.php");
			include("modal/editar_profesor.php");
			?>
			
			<form class="form-horizontal" role="form" id="datos">
				
						
					<div class="row">
					<div class='col-md-4'>
						<label>Filtrar por cedula</label>
						<input type="text" class="form-control" id="q" placeholder="cedula" onkeyup='load(1);'>
					</div>
					

					<div class='col-md-4'>
						<label>Filtrar por Curso</label>
						<select class='form-control' name='CodigoCurso' id='CodigoCurso' onchange="load(1);">
							<option value="">Selecciona un curso</option>
							<?php 
							$query_curso=mysqli_query($con,"select * from curso order by nombreCurso");
							while($rw=mysqli_fetch_array($query_curso))	{
								?>
							<option value="<?php echo $rw['CodigoCurso'];?>"><?php echo $rw['nombreCurso'];?></option>			
								<?php
							}
							?>
						</select>
					</div>

					<div class='col-md-4'>
						<label>Filtrar por Colegio</label>
						<select class='form-control' name='codigo' id='codigo' onchange="load(1);">
							<option value="">Selecciona un colegio</option>
							<?php 
							$query_colegio=mysqli_query($con,"select * from colegio order by nombre");
							while($rw=mysqli_fetch_array($query_colegio))	{
								?>
							<option value="<?php echo $rw['codigo'];?>"><?php echo $rw['nombre'];?></option>			
								<?php
							}
							?>
						</select>
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
	<script type="text/javascript" src="js/profesor.js"></script>
  </body>
</html>
<script>
//crear nuevo usuario
$( "#guardar_profesor" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_profesor.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();});
        location.reload();
      }, 1500);
		  }
	});
  event.preventDefault();
})

</script>
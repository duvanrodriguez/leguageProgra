<?php
	/*-------------------------
	Autor: Duvan Rodriguez
	---------------------------*/
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_curso="active";
	$title="Curso | PROYECTO BD";
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
	<div class="panel panel-success">


		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h4 class="h3 mb-0 text-gray-800"><i class='glyphicon glyphicon-search'></i> Consultar Cursos</h4>
			    <div class="btn-group pull-right">
			    	<button type='button' class="btn btn-success" data-toggle="modal" data-target="#nuevoCurso"><span class="glyphicon glyphicon-plus" ></span><i class="bi bi-journal-plus"></i> Agregar curso</button>
				</div>
			</div>

			<hr>

    <br>	

		<div class="panel-body">
		
			
			
			<?php
				include("modal/registro_curso.php");
				include("modal/editar_curso.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Nombre</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Nombre del curso" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
</main>
	<br><br>
	<br><br>
	<?php
	include("includes/footer.php");
	?>
	<script type="text/javascript" src="js/curso.js"></script>
  </body>
</html>
<script>
//crear nuevo usuario
$( "#guardar_curso" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_curso.php",
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

//editar curso
$( "#editar_curso" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_curso.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();});
        location.reload();
      }, 1500);
		  }
	});
  event.preventDefault();
})

$('#editarCurso').on('show.bs.modal', function(event){
	var button = $(event.relatedTarget)
	var CodigoCurso = button.data('CodigoCurso')
	var nombreCurso = button.data('nombreCurso')
	var lugar = button.data('lugar')
	var modal = $(this)
	modal.find('.modal-body #mod_CodigoCurso').val(CodigoCurso)
	modal.find('.modal-body #mod_nombreCurso').val(nombreCurso)
	modal.find('.modal-body #mod_lugar').val(lugar)
})


</script>
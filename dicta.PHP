<?php
	/*-------------------------
	Autor: Duvan Rodriguez
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
		$active_usuarios="active";	
	$title="Usuarios | Simple Stock";
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
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container">
		<div class="panel panel-success">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span> Nuevo Usuario</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Usuarios</h4>
		</div>			
			<div class="panel-body">
			<?php
			include("modal/registro_usuarios.php");
			include("modal/editar_usuarios.php");
			include("modal/cambiar_password.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">							
						<div class='col-md-4'>
						<label>Filtrar por Nombres</label>
						<input type="text" class="form-control" id="q" placeholder="Nombre" onkeyup='load(1);'>
						</div>

						<div class='col-md-4'>
						<label>Filtrar por subcategorias</label>
						<select class='form-control' name='id_rol' id='id_rol' onchange="load(1);">
							<option value="">Selecciona una subcategoria</option>
							<?php 
							$query_roles=mysqli_query($con,"select * from roles order by nombre_rol");
							while($rw=mysqli_fetch_array($query_roles))	{
								?>
							<option value="<?php echo $rw['id_rol'];?>"><?php echo $rw['nombre_rol'];?></option>			
								<?php
							}
							?>
						</select>
					</div>

					<div class='col-md-4'>
						<label>Filtrar por ciudad</label>
						<select class='form-control' name='id_cliente' id='id_cliente' onchange="load(1);">
							<option value="">Selecciona una ciudad</option>
							<?php 
							$query_clientes=mysqli_query($con,"select * from clientes order by nombre");
							while($rw=mysqli_fetch_array($query_clientes))	{
								?>
							<option value="<?php echo $rw['id_cliente'];?>"><?php echo $rw['nombre'];?></option>			
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
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
						
			</div>
		</div>

	</div>
</main>
	<hr>
	<?php
	include("includes/footer.php");
	?>
	<script type="text/javascript" src="js/usuarios.js"></script>

	
	


  </body>
</html>
<script>
$( "#guardar_usuario" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_usuario" ).submit(function( event ) {
  $('#actualizar_datos2').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_usuario.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos2').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_password" ).submit(function( event ) {
  $('#actualizar_datos3').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_password.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})
	function get_user_id(id){
		$("#user_id_mod").val(id);
	}

	function obtener_datos(id){
			var nombres = $("#nombres"+id).val();
			var apellidos = $("#apellidos"+id).val();
			var usuario = $("#user_name"+id).val();
			var email = $("#email"+id).val();
			
			$("#mod_id").val(id);
			$("#firstname2").val(nombres);
			$("#lastname2").val(apellidos);
			$("#user_name2").val(usuario);
			$("#user_email2").val(email);
			
		}
</script>
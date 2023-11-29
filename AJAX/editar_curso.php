<?php
	if (empty($_POST['mod_CodigoCurso'])) {
           $errors[] = "codigo vacío";
        }else if (empty($_POST['mod_nombreCurso'])) {
           $errors[] = "nombre vacío";
        } else if (empty($_POST['mod_lugar'])){
			$errors[] = "lugar vacío";
		} else if (
			!empty($_POST['mod_CodigoCurso']) &&
			!empty($_POST['mod_nombreCurso']) &&
			!empty($_POST['mod_lugar']) 
			 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code

		$CodigoCurso=intval($_POST["mod_CodigoCurso"]);
		$nombreCurso=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombreCurso"],ENT_QUOTES)));
		$lugar=mysqli_real_escape_string($con,(strip_tags($_POST["mod_lugar"],ENT_QUOTES)));
		


		$CodigoCurso=$_POST['CodigoCurso'];
		"UPDATE curso SET 
		nombreCurso='".$nombreCurso."',
		lugar='".$lugar."'
		WHERE CodigoCurso='".$CodigoCurso."'";



		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Se ha sido actualizado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>
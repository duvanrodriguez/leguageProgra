<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['mod_id_detalle'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_descripcion'])) {
           $errors[] = "descripcion vacío";
        }else if (empty($_POST['mod_carateristcas'])) {
           $errors[] = "carateristicas vacío";
        } else if (empty($_POST['mod_un'])){
			$errors[] = "UN vacío";
		} else if ($_POST['mod_cantidad']==""){
			$errors[] = "Cantidad vacio";
		} else if (empty($_POST['mod_prioridad'])){
			$errors[] = "Prioridad vacío";
		}else if (empty($_POST['mod_observaciones'])){
			$errors[] = "obsevaviones vacío";
		} else if (
			!empty($_POST['mod_id_detalle']) &&
			!empty($_POST['mod_descripcion']) &&
			!empty($_POST['mod_carateristcas']) &&
			!empty($_POST['mod_un']) &&
			!empty($_POST['mod_cantidad']) &&
			!empty($_POST['mod_prioridad']) &&
			!empty($_POST['mod_observaciones'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$descripcion=mysqli_real_escape_string($con,(strip_tags($_POST["mod_descripcion"],ENT_QUOTES)));
		$carateristcas=mysqli_real_escape_string($con,(strip_tags($_POST["mod_carateristcas"],ENT_QUOTES)));
		$un=mysqli_real_escape_string($con,(strip_tags($_POST["mod_un"],ENT_QUOTES)));
		$cantidad=intval($_POST["mod_cantidad"]);
		$prioridad=mysqli_real_escape_string($con,(strip_tags($_POST["mod_prioridad"],ENT_QUOTES)));
		$observaciones=mysqli_real_escape_string($con,(strip_tags($_POST["mod_observaciones"],ENT_QUOTES)));
		$id_detalle=$_POST['mod_id_detalle'];
		$sql="UPDATE detalle SET descripcion='".$descripcion."', carateristcas='".$carateristcas."', un='".$un."', cantidad='".$cantidad."', prioridad='".$prioridad."', observaciones='".$observaciones."' WHERE id_detalle='".$id_detalle."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "El detalle se ha actualizado satisfactoriamente.";
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
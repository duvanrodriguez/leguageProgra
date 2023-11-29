<?php	
		if (empty($_POST['CodigoCurso'])){
			$errors[] = "codigo curso vacíos";
		} elseif (empty($_POST['nombreCurso'])){
			$errors[] = "nombre curso vacíos";
		}elseif (empty($_POST['lugar'])) {
            $errors[] = "lugar vacío";
        } elseif (
			!empty($_POST['CodigoCurso'])
			&& !empty($_POST['nombreCurso'])
			&& !empty($_POST['lugar'])
			
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $CodigoCurso = intval($_POST["CodigoCurso"]);
				$nombreCurso = mysqli_real_escape_string($con,(strip_tags($_POST["nombreCurso"],ENT_QUOTES)));
				$lugar = mysqli_real_escape_string($con,(strip_tags($_POST["lugar"],ENT_QUOTES)));
				
				// se hace el inser into en la tabla curso
                 $sql = "INSERT INTO curso (CodigoCurso, nombreCurso, lugar)
                            VALUES('". $CodigoCurso ."','". $nombreCurso ."','". $lugar ."')";
                    $query_new_user_insert = mysqli_query($con,$sql);

                    // valida si los datos fueron insertados correctamente
                    if ($query_new_user_insert) {
                        $messages[] = "El curso ha sido creada con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                } else {
            $errors[] = "Un error desconocido ocurrió.";
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
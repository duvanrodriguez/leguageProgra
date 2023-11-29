<?php
		if (empty($_POST['cedula'])){
			$errors[] = "cedula vacíos";
		}elseif (empty($_POST['direccion'])){
			$errors[] = "direccion vacíos";
		}elseif (empty($_POST['edad'])) {
            $errors[] = "edad de usuario vacío";
        }elseif (empty($_POST['numero'])) {
            $errors[] = "numero vacío";
        }elseif (empty($_POST['CodColegio'])) {
            $errors[] = "CodColegio vacío";
        } elseif (
			!empty($_POST['cedula'])
			&& !empty($_POST['direccion'])
            && !empty($_POST['edad'])
            && !empty($_POST['numero'])
            && !empty($_POST['CodColegio'])
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
                $cedula = intval($_POST["cedula"]);
				$direccion = mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
				$edad = mysqli_real_escape_string($con,(strip_tags($_POST["edad"],ENT_QUOTES)));
				$numero = mysqli_real_escape_string($con,(strip_tags($_POST["numero"],ENT_QUOTES)));	
				$CodColegio = intval($_POST["CodColegio"]);

                // se hace el inser into en la tabla profesor
                    $sql = "INSERT INTO profesor (cedula, direccion, edad, numero, CodColegio)
                            VALUES('". $cedula ."','". $direccion ."','". $edad ."','". $numero ."','". $CodColegio ."')";
                    $query_new_pro_insert = mysqli_query($con,$sql);               

                    // valida si los datos fueron insertados correctamente
                    if ($query_new_pro_insert) {
                        $messages[] = "se ha registrado el profesor con éxito.";
                    } else {
                        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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
<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("../libraries/password_compatibility_library.php");
}		
		if (empty($_POST['nombres'])){
			$errors[] = "Nombres vacíos";
		}elseif (empty($_POST['apellidos'])){
			$errors[] = "Apellidos vacíos";
		}elseif (empty($_POST['user_name'])) {
            $errors[] = "Nombre de usuario vacío";
        }elseif (empty($_POST['email'])) {
            $errors[] = "El correo electrónico no puede estar vacío";
        } elseif (strlen($_POST['email']) > 64) {
            $errors[] = "El correo electrónico no puede ser superior a 64 caracteres";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Su dirección de correo electrónico no está en un formato de correo electrónico válida";
        } elseif (empty($_POST['password']) || empty($_POST['user_password_repeat'])) {
            $errors[] = "Contraseña vacía";
        } elseif ($_POST['password'] !== $_POST['user_password_repeat']) {
            $errors[] = "la contraseña y la repetición de la contraseña no son lo mismo";
        } elseif (strlen($_POST['password']) < 6) {
            $errors[] = "La contraseña debe tener como mínimo 6 caracteres";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $errors[] = "Nombre de usuario no puede ser inferior a 2 o más de 64 caracteres";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $errors[] = "Nombre de usuario no encaja en el esquema de nombre: Sólo aZ y los números están permitidos , de 2 a 64 caracteres";
        }elseif (empty($_POST['estado'])) {
            $errors[] = "Estado de usuario vacío";
        }elseif (empty($_POST['id_rol'])) {
            $errors[] = "Rol de usuario vacío";
        }elseif (empty($_POST['id_cliente'])) {
            $errors[] = "Cliente de usuario vacío";
        } elseif (
			!empty($_POST['user_name'])
			&& !empty($_POST['nombres'])
			&& !empty($_POST['apellidos'])
			&& strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['email'])
            && strlen($_POST['email']) <= 64
            && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['password'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['password'] === $_POST['user_password_repeat'])
            && !empty($_POST['estado'])
            && !empty($_POST['id_rol'])
            && !empty($_POST['id_cliente'])
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $nombres = mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));
				$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
				$estado = mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
				$id_rol = mysqli_real_escape_string($con,(strip_tags($_POST["id_rol"],ENT_QUOTES)));
				$id_cliente = intval($_POST["id_cliente"]);
				$user_name = mysqli_real_escape_string($con,(strip_tags($_POST["user_name"],ENT_QUOTES)));
                $email = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
				$password = $_POST['password'];
                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
				$user_password_hash = password_hash($password, PASSWORD_DEFAULT);
					
                // check if user or email address already exists
                $sql = "SELECT * FROM usuarios WHERE user_name = '" . $user_name . "' OR email = '" . $email . "';";
                $query_check_user_name = mysqli_query($con,$sql);
				$query_check_user=mysqli_num_rows($query_check_user_name);
                if ($query_check_user == 1) {
                    $errors[] = "Lo sentimos , el nombre de usuario ó la dirección de correo electrónico ya está en uso.";
                } else {
					// write new user's data into database
                    $sql = "INSERT INTO usuarios (nombres, apellidos, user_name, email, password, estado, id_rol, id_cliente)
                            VALUES('". $nombres ."','". $apellidos ."','". $user_name ."','". $email ."','". $user_password_hash ."','". $estado ."','". $id_rol ."','". $id_cliente ."')";
                    $query_new_user_insert = mysqli_query($con,$sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $messages[] = "La cuenta ha sido creada con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
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
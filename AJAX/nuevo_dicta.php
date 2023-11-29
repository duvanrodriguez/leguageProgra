<?php
include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
		
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['codigo'])) {
           $errors[] = "codigo vacío";
        } else if (empty($_POST['propietario'])){
			$errors[] = "propietario del producto vacío";
		} else if (empty($_POST['descripcion_equipo_elemento'])){
			$errors[] = "descripcion vacío";
		}  else if (empty($_POST['marca'])){
			$errors[] = "marca vacío";
		} else if (empty($_POST['serie'])){
			$errors[] = "serie del producto vacío";
		} else if ($_POST['cantidad']==""){
			$errors[] = "cantidad del producto vacío";
		}  else if (empty($_POST['sede'])){
			$errors[] = "sede del producto vacío";
		}else if (empty($_POST['responsable'])){
			$errors[] = "responsable vacío";
		} else if (empty($_POST['estado'])){
			$errors[] = "estado vacío";
		}  else if (empty($_POST['fecha_entrega'])){
			$errors[] = "fecha de entrega vacío";
		}else if (empty($_POST['proveedor'])){
			$errors[] = "proveedor del producto vacío";
		}else if (empty($_POST['precio_equipo'])){
			$errors[] = "precio del producto vacío";
		}else if (
			!empty($_POST['codigo']) &&
			!empty($_POST['propietario']) &&
			!empty($_POST['descripcion_equipo_elemento']) &&
			!empty($_POST['marca'])&&
			!empty($_POST['serie']) &&
			$_POST['cantidad']!="" &&
			!empty($_POST['sede'])&&
			!empty($_POST['responsable']) &&
			!empty($_POST['estado'])&&
			!empty($_POST['fecha_entrega']) &&
			!empty($_POST['proveedor']) &&
			!empty($_POST['precio_equipo']) 
			 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		include("../includes/funciones.php");
		// escaping, additionally removing everything that could be (html/javascript-) code
		$codigo=mysqli_real_escape_string($con,(strip_tags($_POST["codigo"],ENT_QUOTES)));
		$propietario=mysqli_real_escape_string($con,(strip_tags($_POST["propietario"],ENT_QUOTES)));
		$descripcion_equipo_elemento=mysqli_real_escape_string($con,(strip_tags($_POST["descripcion_equipo_elemento"],ENT_QUOTES)));
		$marca=mysqli_real_escape_string($con,(strip_tags($_POST["marca"],ENT_QUOTES)));
		$serie=mysqli_real_escape_string($con,(strip_tags($_POST["serie"],ENT_QUOTES)));
		$cantidad=intval($_POST["cantidad"]);
		$sede=mysqli_real_escape_string($con,(strip_tags($_POST["sede"],ENT_QUOTES)));
		$responsable=mysqli_real_escape_string($con,(strip_tags($_POST["responsable"],ENT_QUOTES)));
		$estado=mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
		$fecha_entrega=date($_POST["fecha_entrega"]);
		$proveedor=mysqli_real_escape_string($con,(strip_tags($_POST["proveedor"],ENT_QUOTES)));
		$precio_equipo=floatval($_POST["precio_equipo"]);
		$fecha_registro=date("Y-m-d");
		$id_subcategoria=intval($_POST['subcategoria']);
		$id_ciudad=intval($_POST['ciudad']);
		
		$sql="INSERT INTO inventarios (codigo_interno, propietario, descripcion_equipo_elemento, 
					marca, serie, cantidad, sede, responsable, estado,  fecha_registro, fecha_entrega, proveedor, precio_equipo, id_subcategoria, id_ciudad) 
			VALUES ('$codigo','$propietario', '$descripcion_equipo_elemento', '$marca', 
					'$serie', '$cantidad', '$sede', '$responsable', '$estado', 
					 '$fecha_registro', '$fecha_entrega', '$proveedor', '$precio_equipo', '$id_subcategoria', '$id_ciudad')";
		 $query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Elemento ha sido ingresado satisfactoriamente.";
				$id_inventario=get_his('inventarios','id_inventario', 'codigo_interno', $codigo, $propietario);
				$user_id=$_SESSION['user_id'];
				$firstname=$_SESSION['firstname'];
				$observaciones="$firstname agregó $cantidad producto(s) al inventario";
				echo guardar_historial2($id_inventario,$user_id,$fecha_registro,$observaciones,$proveedor,$precio_equipo,$codigo);
				
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
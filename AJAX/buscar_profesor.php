<?php
	/*-------------------------
	Autor: Duvan Rodriguez
	---------------------------*/
	
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$cedula=intval($_GET['id']);
		if ($delete1=mysqli_query($con,"DELETE * FROM profesor LIKE '".$cedula."'")){
		?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 

	}else{
		?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
		}	
		
	}
	
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('cedula');//Columnas de busqueda
		 $sTable = "profesor";
		 $sWhere = "";
		
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';

		
		$sWhere.=" order by cedula desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 18; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './profesor.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table table-bordered table-striped">
			  	<thead class="thead-dark">
				<tr  class="success">
					<th>Cedula</th>
					<th>Nombre Profe</th>
            		<th>Direccion</th>
            		<th>Edad</th>
            		<th>Numero</th>
            		<th>Nombre de Colegio</th>
            		<th class='text-right'>Acciones</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$cedula=$row['cedula'];
						$nombreProfe = $row['nombre_profe'];
						$direccion=$row['direccion'];
						$edad=$row['edad'];
						$numero=$row['numero'];

						$CodColegio=$row['CodColegio'];
					?>
					<tr>
						<td><?php echo $cedula;?></td>
						<td><?php echo $nombreProfe;?></td>
                		<td><?php echo $direccion;?></td>
                		<td><?php echo $edad;?></td>
                		<td><?php echo $numero;?></p></td>
                		<td><?php echo $CodColegio;?></p></td>
						
						
					<td class='text-right'>
						<a href="profeDescri.php?cedula=<?php echo $cedula;?>" class='btn btn-success' title='ver profesor'><i class="bi bi-pencil-square"></i></a> 
						<a href="profesor.php" class='btn btn-danger' title='Borrar profesor' onclick="eliminar('<?php echo $cedula; ?>')"><i class="bi bi-trash"></i> </a>
					</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=8><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			</thead>
			  </table>
			</div>
			<?php
		}
	}
?>
<?php

	/*-------------------------
	Autor: Duvan Rodriguez
	---------------------------*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$placa=intval($_GET['id']);
		if ($delete1=mysqli_query($con,"DELETE * FROM carro LIKE '".$placa."'")){
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
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('placa');//Columnas de busqueda
		 $sTable = "carro";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by placa";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './carro.php';
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
					<th>placa</th>
					<th>modelo</th>
					<th>color</th>
					<th>IdCedula</th>
					<th class='text-right'>Acciones</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$placa=$row['placa'];
						$modelo=$row['modelo'];
						$color=$row['color'];
						$IdCedula= $row['IdCedula'];
						
					?>
					<tr>
						
						<td><?php echo $placa; ?></td>
						<td ><?php echo $modelo; ?></td>
						<td><?php echo $color;?></td>
						<td><?php echo $IdCedula;?></td>
						
					<td class='text-right'>
						<a href="#" class='btn btn-success' title='Editar carro' data-placa='<?php echo $placa;?>' data-modelo='<?php echo $modelo?>' data-color='<?php echo $color;?>' data-IdCedula='<?php echo $IdCedula;?>' data-toggle="modal" data-target="#myModal2"><i class="bi bi-pencil-square"></i></a> 
						<a href="#" class='btn btn-danger' title='Borrar carro' onclick="eliminar('<?php echo $placa; ?>')"><i class="bi bi-trash"></i> </a>
					</td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>
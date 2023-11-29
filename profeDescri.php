<?php
	/*-------------------------
	Autor: Duvan Rodriguez
	---------------------------*/
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de row
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de row
	
	$active_carro="active";
	$title="profeDescri | PROYECTO BD";
	

	if (isset($_GET['cedula'])){
		$cedula=intval($_GET['cedula']);
		$query=mysqli_query($con,
			"select DISTINCT t1.*, t2.*, t3.*
				FROM profesor AS t1 
				INNER JOIN carro AS t2 ON t2.IdCedula = t1.cedula
				INNER JOIN colegio AS t3 ON t3.codigo = t1.CodColegio
		 		where cedula='$cedula'");
		$row=mysqli_fetch_array($query);
		
	} else {
		die("el profesor no existe");
	}
	
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



<div class="box-principal">
      <h3 class="titulo">Profesor <?php echo $row['nombre_profe']; ?><hr></h3>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Perfil del profesor <?php echo $row['nombre_profe']; ?><b></b></h3>
        </div>

        <hr>

        <div class="panel-body">
          <div class="row">
            <div class="col-md-3">
              <img class="img-responsive" src="img/avatar_2x.png">
            </div>

            <div class="col-md-9">
              <ul class="list-group">
                <li class="list-group-item">
                  <b>Nombre: </b><?php echo $row['nombre_profe']; ?>
                </li>
                <li class="list-group-item">
                  <b>No. Documento: </b><?php echo $row['cedula']; ?>
                </li>
                <li class="list-group-item">
                  <b>Edad: </b><?php echo $row['edad']; ?>
                </li>
                <li class="list-group-item">
                  <b>Numero: </b><?php echo $row['numero']; ?>
                </li>
                <li class="list-group-item">
                  <b>Direccion: </b><?php echo $row['direccion']; ?>
                </li>
              </ul>
            </div>

            <br>
            <hr>
            <br>

            <div class="panel-heading">
          		<h3 class="panel-title">El profesor pertenece a la institución<b></b></h3>
        		</div>
        		

          </div>
        </div>
      </div>
    </div>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">	
	<div class="container">

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2 text-center">
				 <img class="item-img img-responsive" src="img/usc.png" alt=""> 
					
              </div>
			  
              <div class="col-sm-4 text-left">
                <div class="col-md-20">
              <ul class="list-group">
                <li class="list-group-item">
                  <b>Codigo Ins.: </b><?php echo $row['codigo']; ?>
                </li>
                <li class="list-group-item">
                  <b>Nombre de Inst: </b><?php echo $row['nombre_colegio']; ?>
                </li>
                <li class="list-group-item">
                  <b>Direccion Inst: </b><?php echo $row['direccion']; ?>
                </li>
                <li class="list-group-item">
                  <b>Numero Inst: </b><?php echo $row['numero']; ?>
                </li>
              </ul>
            </div>
              </div>
            </div>
            <br>
            <div class="row">

            <div class="col-sm-8 col-sm-offset-2 text-left">
                  <div class="row">
                    <?php
						if (isset($message)){
							?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Aviso!</strong> row procesados exitosamente.
						</div>	
							<?php
						}
						if (isset($error)){
							?>
						<div class="alert alert-danger alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Error!</strong> No se pudo procesar los row.
						</div>	
							<?php
						}
					?>	
					 <table class='table table-bordered'>
						<tr>
							<th class='text-center' colspan=5 >CURSOS IMPARTIDOS POR EL DOCENTE</th>
						</tr>
						<tr>
							<td>dia</td>
							<td>CodCedula</td>
							<td>IdCurso</td>
							<td>hora_inicio</td>
							<td class='text-center'>hora_fin</td>
						</tr>
						<?php
							$query=mysqli_query($con);
							while ($row=mysqli_fetch_array($query)){
								?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class='text-center'></td>
						</tr>		
								<?php
							}
						?>
					 </table>
                  </div>
                                    
                                    
				</div>
            </div>
          </div>
        </div>
    </div>
</div>



</div>
</main>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php
	include("includes/footer.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
  </body>
</html>
<script>
$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_row').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(row){
			$("#resultados_ajax2").html(row);
			$('#actualizar_row').attr("disabled", false);
			window.setTimeout(function() {
				$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();});
				location.replace('stock.php');
			}, 4000);
		  }
	});
  event.preventDefault();
})

	$('#myModal2').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var codigo = button.data('codigo') // Extract info from data-* attributes
		var nombre = button.data('nombre')
		var categoria = button.data('categoria')
		var precio = button.data('precio')
		var stock = button.data('stock')
		var id = button.data('id')
		var modal = $(this)
		modal.find('.modal-body #mod_codigo').val(codigo)
		modal.find('.modal-body #mod_nombre').val(nombre)
		modal.find('.modal-body #mod_categoria').val(categoria)
		modal.find('.modal-body #mod_precio').val(precio)
		modal.find('.modal-body #mod_stock').val(stock)
		modal.find('.modal-body #mod_id').val(id)
	})
	
	function eliminar (id){
		var q= $("#q").val();
		if (confirm("Realmente deseas eliminar el producto")){	
			location.replace('stock.php?delete='+id);
		}
	}
</script>
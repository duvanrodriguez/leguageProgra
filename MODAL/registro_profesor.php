	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo profesor</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_profesor" name="guardar_profesor">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="cedula" class="col-sm-3 control-label">Cedula</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Cedula" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Direccion</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="edad" class="col-sm-3 control-label">Edad</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="edad" name="edad" placeholder="Edad" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="numero" class="col-sm-3 control-label">Numero</label>
				<div class="col-sm-8">
				  <input type="number" class="form-control" id="numero" name="numero" placeholder="Numero" required>
				</div>
			  </div>
			  <div class="form-group">
			  	<label for="CodColegio" class="col-sm-3 control-label">codigo del colegio</label>
			  	<div class="col-sm-8">
			  		<select class="form-control" name="CodColegio" id="CodColegio" required>
			  		<option>Seleccione un colegio</option>
			  		<?php
			  		$query_colegio=mysqli_query($con, "select * from colegio order by nombre_colegio");
			  		while($rw=mysqli_fetch_array($query_colegio)){
			  			?>
			  			<option value="<?php echo $rw['codigo'];?>"><?php echo $rw['nombre_colegio'];?></option>
			  			<?php
			  		}
			  		?>
			  		</select>
			  	</div>
			  </div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
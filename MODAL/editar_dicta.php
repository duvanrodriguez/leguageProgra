	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Estado de Orden</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_ordenes" name="editar_ordenes">
			<div id="resultados_ajax2"></div>


			   <div class="form-group">
				<label for="mod_id_estado" class="col-sm-3 control-label">ESTADOS</label>
				<div class="col-sm-8">
					<input type="hidden" name="mod_id_requisicion" id="mod_id_requisicion">	
					<select class='form-control' name='mod_id_estado' id='mod_id_estado' required>
						<option value="">Selecciona un estado</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from estados order by nombre_estado");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_estado'];?>"><?php echo $rw['nombre_estado'];?></option>			
								<?php
							}
							?>
					</select>
							  
				</div>
			  </div>

			   
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>
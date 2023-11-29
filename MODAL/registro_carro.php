<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoInventario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="bi bi-x-circle-fill"></i></button>
			<h4 class="modal-title" id="myModalLabel"> Agregar nuevo elemento al inventario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_inventario" name="guardar_inventario">
			<div id="resultados_ajax_inventario"></div>
			  

			  <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Codigo Interno</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Propietario" required >
				</div>
			  </div>

			  <div class="form-group">
			  	<label for="propietario" class="col-sm-3 control-label">Propietario</label>
			  	<div class="col-sm-8">
					<select class="form-control" name="propietario" id="propietario" required>
                		<option value="">Selecciona</option>
                		<option value="CONSORCIO VELNEC GNG-PEB">CONSORCIO VELNEC GNG-PEB</option>
                		<option value="CONSORCIO UG21 PEB-CAUCA">CONSORCIO UG21 PEB-CAUCA</option>
                		<option value="CONSORCIO SUPERVISION EQUIDAD 111">CONSORCIO SUPERVISION EQUIDAD 111</option>
                		<option value="CONSORCIO INTERVENTOR PEB-ET">CONSORCIO INTERVENTOR PEB-ET</option>
                		<option value="PEB CONSULTORES SAS">PEB CONSULTORES SAS</option>
              
              </select>		  
				</div>

			  </div>
		
			<div class="form-group">
				<label for="descripcion_equipo_elemento" class="col-sm-3 control-label">Descripcion</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="descripcion_equipo_elemento" name="descripcion_equipo_elemento" placeholder="Descripcion equipo elemento" required maxlength="255"></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<label for="subcategoria" class="col-sm-3 control-label">Clasificacion</label>
				<div class="col-sm-8">
					<select class='form-control' name='subcategoria' id='subcategoria' required>
						<option value="">Selecciona una categoría</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from subcategorias order by nombre_subcategoria");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_subcategoria'];?>"><?php echo $rw['nombre_subcategoria'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>


			<div class="form-group">
				<label for="marca" class="col-sm-3 control-label">Marca</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" required >
				</div>
			</div>

			<div class="form-group">
				<label for="serie" class="col-sm-3 control-label">SN</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="serie" name="serie" placeholder="Serie" required >
				</div>
			</div>
			
			<div class="form-group">
				<label for="cantidad" class="col-sm-3 control-label">Cantidad</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control" id="cantidad" name="cantidad" placeholder="cantidad" required>
				</div>
			</div>
			
			<div class="form-group">
				<label for="sede" class="col-sm-3 control-label">Sede</label>
				<div class="col-sm-8">
				  <input type="text" min="0" class="form-control" id="sede" name="sede" placeholder="sede" required>
				</div>
			</div>

			<div class="form-group">
				<label for="ciudad" class="col-sm-3 control-label">Ciudad</label>
				<div class="col-sm-8">
					<select class='form-control' name='ciudad' id='ciudad' required>
						<option value="">Selecciona una categoría</option>
							<?php 
							$query_categoria=mysqli_query($con,"select * from ciudades order by nombre_ciudad");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['id_ciudad'];?>"><?php echo $rw['nombre_ciudad'];?></option>			
								<?php
							}
							?>
					</select>			  
				</div>
			  </div>
			
			<div class="form-group">
				<label for="responsable" class="col-sm-3 control-label">Responsable</label>
				<div class="col-sm-8">
				  <input type="text" min="0" class="form-control" id="responsable" name="responsable" placeholder="Responsable" required>
				</div>
			</div>

			<div class="form-group">
				<label for="fecha_entrega" class="col-sm-3 control-label">Fecha de entrega</label>
				<div class="col-sm-8">
				  <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" placeholder="Código interno" required>
				</div>
			  </div>
			 
			 <div class="form-group">
				<label for="estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				  <input type="text" min="0" class="form-control" id="estado" name="estado" placeholder="Estado" required>
				</div>
			</div>
			 

			  <div class="form-group">
				<label for="proveedor" class="col-sm-3 control-label">Proveedor</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Código interno">
				</div>
			  </div>

			  <div class="form-group">
				<label for="precio_equipo" class="col-sm-3 control-label">Costo del elemento</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="precio_equipo" name="precio_equipo" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="10">
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
	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="editarCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Curso</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_curso" name="editar_curso">
			<div id="resultados_ajax2"></div>

			  <div class="form-group">
				<label for="mod_CodigoCurso" class="col-sm-3 control-label">Codigo Curso</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_CodigoCurso" name="mod_CodigoCurso" placeholder="Codigo Curso" required>
				  <input type="hidden" id="mod_CodigoCurso" name="mod_CodigoCurso">
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_nombreCurso" class="col-sm-3 control-label">Nombre Curso</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_nombreCurso" name="mod_nombreCurso" placeholder="Nombre Curso" required>
					<input type="hidden" name="mod_CodigoCurso" id="mod_CodigoCurso">
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_lugar" class="col-sm-3 control-label">Lugar</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_lugar" name="mod_lugar" placeholder="Lugar" required>
					<input type="hidden" name="mod_CodigoCurso" id="mod_CodigoCurso">
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
<form id="form_eventos">
	<input type="hidden" id="id_evento" name="id_evento" value="0">
	<div class="col-md-3">
	<div class="panel panel-danger">
		<div class="panel-heading"><b>DATOS DEL EVENTO</b>
 <button type="button" id="nuevoevento" class="btn btn-block dim btn-primary evento" onclick="NuevoEvento()" style="display: none"><i class="fa fa-plus"></i> NUEVO EVENTO</button>
		</div>
		<div class="panel-body" >
			<div class="form-group" >
		<label for="fecha" class=" control-label">FECHA</label>
		<input type="date" name="fecha" id="fecha" value="<?=date('Y-m-d') ?>" class="form-control" placeholder="FECHA " readonly='true'>
	</div>
	<div class="form-group" >
		<label for="hora" class=" control-label">HORA</label>
		<input type="time" name="hora" id="hora" value="" class="form-control" placeholder="HORA ">
	</div>
	<div class="form-group" >
		<label for="titulo" class=" control-label">TITULO</label>
		<input type="text" name="titulo" id="titulo" value="" class="form-control mayusculas" placeholder="TITULO DEL EVENTO" autocomplete="off">
	</div>
	<div class="form-group" >
		<label for="descripcion" class=" control-label">DESCRIPCIÓN</label>
		<textarea  name="descripcion" id="descripcion" value="" class="form-control mayusculas" placeholder="DESCRIPCIÓN DEL EVENTO" style="resize: none;" autocomplete="off"></textarea>
	</div>
	<div class="form-group">
                        <label for="color">COLOR EVENTO</label>
                        <input type="text" name="color" id='color' class="form-control color_evento" value="#5367ce">
                    </div>
		</div>
		<div class="panel-footer">
                    <button type="button" id="saveevento" class="btn btn-block dim btn-primary evento" onclick="CrearEvento()"><i class="fa fa-save"></i> GENERAR EVENTO</button>
                    <button type="button" id="eventoeditar" class="btn btn-block dim btn-success eventoeditar" onclick="EditarEvento()" style="display: none;"><i class="fa fa-edit"></i> EDITAR EVENTO</button>
                    <button type="button" id="eventoeliminar" class="btn btn-block dim btn-danger eventoeliminar" onclick="EliminarEvento()" style="display: none;"><i class="fa fa-trash"></i> ELIMINAR EVENTO</button>

                </div>
	</div>
</div>
</form>
<div class="col-md-9">
	<div class="panel panel-info">
		<div class="panel-heading"><b>CALENDARIO</b></div>
		<div class="panel-body" id="calendario">
		</div>
	</div>
</div>
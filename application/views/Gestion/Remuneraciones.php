<form id="form_remuneraciones">
	<div class="col-md-3">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h2 class="text-center"><b>REMUNERACIONES TRABAJADORES</b></h2>
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label>SELECCIONE UN MES</label>
					<input type="month" name="mes" id="mes" class="form-control numeros " value="" placeholder="MES REMUNERACIONES" onchange="ViewRemuneracion()" autocomplete="off" >
				</div>
			</div>
			<div class="panel-footer">
			</div>
		</div>
	</div>
	<div class="col-md-9" >
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h2 class="text-center"><b id="mes_rem"></b></h2>
			</div>
			<div class="panel-body">
				<h2 class="text-center"><b>LISTADO DE TRABAJADORES</b></h2>
				<input type="hidden" id="cant_trab" name="cant_trab" value="0">
				<table class="table table-bordered" id="tabla_trabajadores">
					<thead>
						<tr>
							<th>#</th>
							<th>TRABAJADOR</th>
							<th>DIAS TRABAJADOS</th>
							<th>DIAS LICENCIA</th>
							<th>DIAS VACACIONES</th>
							<th></th>
						</tr>
					</thead>
					 <tbody>
					</tbody>
				</table>
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-lg btn-primary dim" disabled="true" id="generarrem" name="generarrem" onclick="GenerarRemuneracion()"><i class="fa fa-save"></i> GENERAR REMUNERACIONES</button>
			</div>
		</div>
	</div>
</form>
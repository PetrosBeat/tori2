<form id="form_turnos" >
	<input type="hidden" name="dia" id="dia" value='0' required="">
	<input type="hidden" name="tipo" id="tipo" value='0'>
	<input type="hidden" name="cantidad" id="cantidad" value='0'>
		<input type="hidden" name="fecha" id="fecha" value='0'>
	<style type="text/css">
		table.table {
    width: auto;
    margin:0 auto;
}



/** only for the body of the table. */
table.table tbody td {
    padding:0.5;
}
	</style>

		<div class="panel panel-info">
			<div class="panel-heading">

				<h1 class="text-center"><b id="titulo"></b></h1>
			</div>
			<div class="panel-body">
				<div class="col-md-12">

					<div class="col-md-6 ">
						<div class="form-group">
							<label>AREA</label>
							<select name="select_area" id="select_area" class="form-control" required="" ></select>
						</div>
					</div>
					<div class="col-md-6 ">
						<div class="form-group">
							<label>SEMANA</label>
							<input type="week" name="semana" id="semana" class="form-control" required="" onchange="GenerarTurnoArea()" />
						</div>
					</div>
					<div class="col-md-12 " id="dias_div" style="display: none;">

					</div>
				</div>
				<div class="col-md-12">
					<hr>
				</div>
				<h1 class="text-center "><b class="diasem"></b></h1>
				<div class="col-md-12">
					<hr>
				</div>
				<div class="col-md-12  table-responsive">
					<table class="table  table-striped" id="TablaTurnoTrabajadores">
						<thead >
							<tr class="trabajadores"></tr>
						</thead>
						<tbody>
							<tr class="detalle_trabajadores"></tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>

</form>
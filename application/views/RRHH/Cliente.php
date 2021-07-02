<form class="form-horizontal form_cliente" id="form_cliente">
    <div class="panel panel-info" id="tab_cliente"  style="display:none">
        <div class="panel-heading"> <button class="btn btn-line btn-success dim limpiar" id="btntablacliente" ><i class="fa fa-eye"></i> VER TABLA CLIENTES</button><h3 class="text-center">Informacion Cliente</h3>
        </div>

        <div class="panel-body">
          <div class="col-md-6">
                <input type="hidden" id="id_cliente" name="id_cliente" value="" />
                <input type="hidden" id="cantidad_precios_cliente" name="cantidad_precios_cliente" value="0" />
                <h2 class="text-center"><b>INFORMACIÓN CLIENTE</b></h2>
            <div class="form-group">
                <label class="col-lg-3 control-label">Rut </label>
                <div class="col-lg-9"><input type="text" placeholder="Rut Cliente" class="form-control numeros ruts" id="rut_cliente" name="rut_cliente" required=""  /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Razon Social</label>
                <div class="col-lg-9"><input type="text" placeholder="Nombre cliente" class="form-control letras mayusculas" id="nombre_cliente" name="nombre_cliente" required="" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Correo</label>
                <div class="col-lg-9"><input type="email" placeholder="Correo Cliente " class="form-control mayusculas" id="correo_cliente" name="correo_cliente" required="" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Giro</label>
                <div class="col-lg-9">
                        <select id="giro_cliente" name='giro_cliente' class="form-control"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Telefono </label>
                <div class="col-lg-9"><input type="text" placeholder="Telefono Cliente" class="form-control numeros" id="telefono_cliente" name="telefono_cliente" required="" data-mask="(9) 9999-9999" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Comuna</label>
                <div class="col-lg-9"><input type="text" placeholder="Comuna Cliente " class="form-control mayusculas letras" id="comuna_cliente" name="comuna_cliente" required="" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Direccion</label>
                <div class="col-lg-9"><input type="text" placeholder="Direccion Cliente " class="form-control mayusculas letras" id="direccion_cliente" name="direccion_cliente" required="" /></div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Codigo SII Sucursal</label>
                <div class="col-lg-9"><input type="text" placeholder="cdgSIISucur Cliente " class="form-control precio" id="cdgSIISucur" name="cdgSIISucur" readonly="readonly" value="0" /></div>
            </div>
          </div>
          <div class="col-md-6">
            <button type='button' class="btn btn-line btn-success dim " id="btnaddprecio" onclick="AgregarPrecios()"><i class="fa fa-plus"></i> AÑADIR PRECIO</button>
              <h2 class="text-center"><b>PRECIOS CLIENTE</b></h2>
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover " id="TablaClientePrecio">
                <thead>
                    <tr>

                        <th>FECHA</th>
                        <th>PRECIO</th>
                        <th>TIPO</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody></tbody>
            </table>
              </div>
          </div>
        </div>
        <div class="panel-footer">

        <button type="button" onclick="IngresarCliente()" class="btn btn-primary dim pull-left" id="btnclienteadd" name="btnclienteadd">
            <i class="fa fa-save"></i>
            GUARDAR CLIENTE
        </button>
         <br><br> <br><br>
    </div>
    </div>

</form>
<div class="panel panel-danger" id="tab_tabla">
    <div class="panel-heading">
        <button type='button' class="btn btn-line btn-success dim limpiar" id="btncliente"><i class="fa fa-plus"></i> AÑADIR CLIENTE</button>

    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" id="TablaClientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Rut</th>
                        <th>Razon Social</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th class="hidden-print">Ver/Editar</th>
                        <th class="hidden-print">Mostrar/Ocultar</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

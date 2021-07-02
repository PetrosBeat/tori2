<form class="form-horizontal form_proveedor" id="form_proveedor">
    <div class="panel panel-info" id="tab_proveedor"  style="display:none">
        <div class="panel-heading"> <button class="btn btn-line btn-success dim limpiar" id="btntablaproveedor" ><i class="fa fa-eye"></i> VER TABLA PROVEEDORES</button><h3 class="text-center">Informacion Proveedor</h3>
        </div>

        <div class="panel-body">
          <div class="col-md-6">
                <input type="hidden" id="id_proveedor" name="id_proveedor" value="" />
                 <input type="hidden" id="tipo" name="tipo" value="0" />
                <input type="hidden" id="cantidad_precios_proveedor" name="cantidad_precios_proveedor" value="0" />
                <h2 class="text-center"><b>INFORMACIÓN PROVEEDOR</b></h2>
            <div class="form-group">
                <label class="col-lg-3 control-label">Rut </label>
                <div class="col-lg-9"><input type="text" placeholder="Rut Proveedor" class="form-control numeros ruts" id="rut_proveedor" name="rut_proveedor" required=""  /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Razon Social</label>
                <div class="col-lg-9"><input type="text" placeholder="Nombre proveedor" class="form-control letras mayusculas" id="nombre_proveedor" name="nombre_proveedor" required="" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Correo</label>
                <div class="col-lg-9"><input type="email" placeholder="Correo Proveedor " class="form-control mayusculas" id="correo_proveedor" name="correo_proveedor" required="" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Giro</label>
                <div class="col-lg-9">
                        <select id="giro_proveedor" name='giro_proveedor' class="form-control"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Telefono </label>
                <div class="col-lg-9"><input type="text" placeholder="Telefono Proveedor" class="form-control numeros" id="telefono_proveedor" name="telefono_proveedor" required="" data-mask="(9) 9999-9999" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Comuna</label>
                <div class="col-lg-9"><input type="text" placeholder="Comuna Proveedor " class="form-control mayusculas letras" id="comuna_proveedor" name="comuna_proveedor" required="" /></div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Direccion</label>
                <div class="col-lg-9"><input type="text" placeholder="Direccion Proveedor " class="form-control mayusculas letras" id="direccion_proveedor" name="direccion_proveedor" required="" /></div>
            </div>

            <div class="form-group">
                <label class="col-lg-3 control-label">Codigo SII Sucursal</label>
                <div class="col-lg-9"><input type="text" placeholder="cdgSIISucur Proveedor " class="form-control precio" id="cdgSIISucur" name="cdgSIISucur" readonly="readonly" value="0" /></div>
            </div>
          </div>
          <div class="col-md-6">
            <button type='button' class="btn btn-line btn-success dim " id="btnaddprecio" onclick="AgregarPrecios()"><i class="fa fa-plus"></i> AÑADIR PRECIO</button>
              <h2 class="text-center"><b>PRECIOS PROVEEDOR</b></h2>
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover " id="TablaProveedorPrecio">
                <thead>
                    <tr>

                        <th>FECHA</th>
                        <th>PRECIO</th>

                        <th></th>

                    </tr>
                </thead>
                <tbody></tbody>
            </table>
              </div>
          </div>
        </div>
        <div class="panel-footer">

        <button type="button" onclick="IngresarProveedor()" class="btn btn-primary dim pull-left" id="btnproveedoradd" name="btnproveedoradd">
            <i class="fa fa-save"></i>
            GUARDAR PROVEEDOR
        </button>
         <br><br> <br><br>
    </div>
    </div>

</form>
<div class="panel panel-danger" id="tab_tabla">
    <div class="panel-heading">
        <button type='button' class="btn btn-line btn-success dim limpiar" id="btnproveedor"><i class="fa fa-plus"></i> AÑADIR PROVEEDOR</button>

    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" id="TablaProveedores">
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

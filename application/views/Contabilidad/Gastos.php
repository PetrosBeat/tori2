

<div class="modal inmodal fade " id="ModalCheque" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content row">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title ">TOTAL GASTO : <i class="total_pago"></i></h4>
                <button type="button" class="btn btn-line btn-primary dim  " id="btnaddcheque" onclick="AgregarChequeGasto()"><i class="fa fa-plus"></i>Añadir Cheque</button>
                <button type="button" class="btn btn-line btn-info dim  " id="btnsavecheque" onclick="save_cheque()"><i class="fa fa-save"></i> Guardar Cheques</button> <small class="font-bold"></small>
            </div>
            <form class="form-horizontal" id="form_cheques">
                <div class="modal-body " id="cheque"></div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <form class="form-horizontal form_proveedor" id="form_proveedor">
    <div class="panel panel-info" id="tab_proveedor"  style="display:none">
        <div class="panel-heading"> <button class="btn btn-line btn-success dim limpiar" id="btntablaproveedor" ><i class="fa fa-eye"></i> VER TABLA GASTOS</button><h4 class="text-center">Informacion Proveedor</h4>
        </div>

        <div class="panel-body">
          <div class="col-md-12">
                <input type="hidden" id="id_proveedor" name="id_proveedor" value="" />
                <input type="hidden" id="tipo" name="tipo" value="1" />
                <h4 class="text-center"><b>INFORMACIÓN PROVEEDOR</b></h4>
            <div class="form-group">
                <label class=" control-label">Rut </label>
                <div class=""><input type="text" placeholder="Rut Proveedor" class="form-control numeros ruts" id="rut_proveedor" name="rut_proveedor" required=""  /></div>
            </div>
            <div class="form-group">
                <label class=" control-label">Razon Social</label>
                <div class=""><input type="text" placeholder="Nombre proveedor" class="form-control letras mayusculas" id="nombre_proveedor" name="nombre_proveedor" required="" /></div>
            </div>
            <div class="form-group">
                <label class=" control-label">Correo</label>
                <div class=""><input type="email" placeholder="Correo Proveedor " class="form-control mayusculas" id="correo_proveedor" name="correo_proveedor" required="" /></div>
            </div>
            <div class="form-group">
                <label class=" control-label">Giro</label>
                <div class="">
                        <select id="giro_proveedor" name='giro_proveedor' class="form-control"></select>
                </div>
            </div>
            <div class="form-group">
                <label class=" control-label">Telefono </label>
                <div class=""><input type="text" placeholder="Telefono Proveedor" class="form-control numeros" id="telefono_proveedor" name="telefono_proveedor" required="" data-mask="(9) 9999-9999" /></div>
            </div>
            <div class="form-group">
                <label class=" control-label">Comuna</label>
                <div class=""><input type="text" placeholder="Comuna Proveedor " class="form-control mayusculas letras" id="comuna_proveedor" name="comuna_proveedor" required="" /></div>
            </div>
            <div class="form-group">
                <label class=" control-label">Direccion</label>
                <div class=""><input type="text" placeholder="Direccion Proveedor " class="form-control mayusculas letras" id="direccion_proveedor" name="direccion_proveedor" required="" /></div>
            </div>

            <div class="form-group">
                <label class=" control-label">Codigo SII Sucursal</label>
                <div class=""><input type="text" placeholder="cdgSIISucur Proveedor " class="form-control precio" id="cdgSIISucur" name="cdgSIISucur" readonly="readonly" value="0" /></div>
            </div>
          </div>

        </div>
        <div class="panel-footer">

        <button type="button" onclick="IngresarProveedorGasto()" class="btn btn-primary dim pull-left" id="btnproveedoradd" name="btnproveedoradd">
            <i class="fa fa-save"></i>
            GUARDAR PROVEEDOR
        </button>
         <br><br> <br><br>
    </div>
    </div>

</form>
                        <form id="formgastos" class="form-horizontal">
                            <input type="hidden" name="cantidad_cheques" id="cantidad_cheques" value="0">
                            <div class="form-group">
                                <label for="select_proveedores" class="hidden-print">Buscar Proveedor</label>
                                <select class="select2_demo_2 form-control" id="select_proveedores" name="select_proveedores" required=""></select>
                                <button type="button" class="btn btn-primary btn-block hidden-print" id="btnprov" class="btn btn-line btn-info " accesskey="b"><i class="fa fa-plus"></i> AGREGAR PROVEEDOR</button>
                            </div>
                            <hr>
                            <h3 class="text-center">DESGLOSE DE GASTOS</h3>
                            <div class="form-group">
                                <label class="control-label">FECHA</label>
                                <div class="">
                                    <input type="date" placeholder="FECHA" class="form-control " id="fecha_gasto" name="fecha_gasto" required='' autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">TIPO DE DOCUMENTO</label>
                                <div class="">
                                    <select class="form-control m-b" name="tipo_documento" id="tipo_documento" required="">
                                        <option value="x" selected="">Seleccione</option>
                                        <option value="BOLETA">BOLETA</option>
                                        <option value="FACTURA">FACTURA</option>
                                        <option value="ESPECIAL">ESPECIAL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="display: none" id="n_bol">
                                <label class="control-label">NUMERO BOLETA</label>
                                <div class="">
                                    <input type="text" placeholder="NUMERO DE BOLETA " class="form-control numeros" id="numero_boleta" name="numero_boleta" required='' autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group" style="display: none" id="n_fac">
                                <label class="control-label">NUMERO FACTURA</label>
                                <div class="">
                                    <input type="text" placeholder="NUMERO FACTURA " class="form-control numeros" id="numero_factura" name="numero_factura" required='' autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">DINERO SACADO DE CAJA</label>
                                <div class="">
                                    <select class="form-control m-b" name="dinero_caja" id="dinero_caja" required="">
                                        <option value="x" selected="">Seleccione</option>
                                        <option value="0">SI</option>
                                        <option value="1">NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">TIPO DE PAGO</label>
                                <div class="">
                                    <select class="form-control m-b" name="forma_pago" id="forma_pago" required="">
                                        <option value="x" selected="">Seleccione</option>
                                        <option value="CONTADO">CONTADO</option>
                                        <option value="CHEQUE">CHEQUE</option>
                                        <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                        <option value="MULTIPLE">MULTIPLE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" style="display: none" id="m_caja">
                                <label class="control-label">MONTO CAJA</label>
                                <div class="">
                                    <input type="text" placeholder="TOTAL DINERO SACADO DE CAJA" class="form-control numeros precio" id="monto_caja" name="monto_caja" required='' autocomplete="off" value="$0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">TOTAL</label>
                                <div class="">
                                    <input type="text" placeholder="TOTAL DINERO " class="form-control numeros precio" id="total_gasto" name="total_gasto" required='' autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="control-label">OBSERVACIONES</label>
                                <textarea name="obs" id="obs" class="form-control mayusculas" placeholder="INGRESE LAS OBSERVACIONES PERTINENTES RESPECTO AL GASTO" cols="30" rows="10" style="resize:none;"></textarea>
                            </div>
                            <hr>
                            <button type="button" id="btngasto" class="btn  btn-primary btn-block hidden-print dim btn-lg" accesskey="b" disabled="" onclick="GenerarGasto()"><i class="fa fa-save"></i> GENERAR GASTO</button>
                        </form>
                    </div>
                    <div class="col-md-9 table-responsive">
                        <form id="formtablaproductos">
                            <h2 class="text-center">TABLA DE GASTOS</h2>
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover dataTables-example " id="TablaGastos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>FECHA</th>
                                            <th>PROVEEDOR</th>
                                            <th>DOCUMENTO</th>
                                            <th>NUMERO DOCUMENTO</th>
                                            <th>DINERO DE CAJA</th>
                                            <th>TOTAL GASTO</th>
                                            <th>OBSERVACION</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
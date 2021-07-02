<div class="modal inmodal fade " id="ModalCheque" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content row">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title ">TOTAL PAGO : <i class="total_pago"></i></h4>
                <button type="button" class="btn btn-line btn-primary dim  " id="btnaddcheque" onclick="AgregarChequePago()"><i class="fa fa-plus"></i>Añadir Cheque</button>
                <button type="button" class="btn btn-line btn-info dim  " id="btnsavecheque" onclick="save_cheque()"><i class="fa fa-save"></i> Guardar Cheques</button> <small class="font-bold"></small>
            </div>
            <form class="form-horizontal" id="form_cheques">
                <div class="modal-body " id="cheque"></div>
            </form>
        </div>
    </div>
</div>
<form id="formpago">
  <div id="mostrarpdf_pago"></div>
    <input type="hidden" id="cantidad_cheques" name="cantidad_cheques" value="0">
         <input type="hidden" id="rut_pago" name="rut_pago" value="">
            <div class="row">
               <div class="col-md-3">
                       <div class="panel panel-success" id="panel_pago">
                              <div class="panel-heading">
                                           <h3 class="text-center"><b>Tipo de Pago</b></h3>
                                        </div>
                                          <div class="panel-body">
                                            <div class="form-group">
                                               <div class="radio radio-success ">
                                                   <input type="radio"  value="0" name="tipo_pago"  id="pago_cliente"  >
                                                     <label for="pago_cliente">Clientes  </label>
                                                  </div>
                                                   <div class="radio radio-info ">
                                                      <input type="radio"  value="1" name="tipo_pago"  id="pago_proveedor">
                                                      <label for="pago_proveedor">Proveedores  </label>
                                                  </div>
                                               </div>
                                          </div>
                          </div>
                          <div class="panel panel-warning" id="panel_pago_deuda" style="display:none">
                              <div class="panel-heading">
                                   <h3 class="text-center"><b id="titulo_pago_deuda"></b></h3>
                                   <hr>
                                   <div id="boton_detalle_venta"></div>
                              </div>
                              <div class="panel-body">
                                  <div class="form-group">
                                         <label for="tipo_pago_deuda" class=" control-label " >TIPO PAGO</label>
                                          <div class="radio ">
                                            <input type="radio" name="tipo_pago_deuda" id="pago_contado" value="Contado" class="TipoPago" required="">
                                            <label for="pago_contado">Contado</label>
                                          </div>
                                           <div class="radio radio-info ">
                                              <input type="radio"  value="Cheque" name="tipo_pago_deuda" id="pago_cheque" data-toggle='modal' href='#ModalCheque' required="">
                                               <label for="pago_cheque">Cheque  </label>
                                             </div>
                                              <div class="radio radio-danger ">
                                                  <input type="radio"  value="Transferencia" name="tipo_pago_deuda" id="pago_transferencia" required="" class="TipoPago" >
                                                  <label for="pago_transferencia">Transferencia  </label>
                                              </div>
                                   </div>
                                    <div class="form-group">
                                        <label for="dinero_recibido" class=" control-label">Dinero Recibido</label>
                                        <div >
                                            <input type="text" name="dinero_recibido_pago" id="dinero_recibido_pago" placeholder="Dinero Recibido" class="form-control precio numeros" value="" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="deuda_final" class="control-label">Deuda Final</label>
                                        <div class="">
                                              <input type="text" name="deuda_final" id="deuda_final" placeholder="Deuda Final" value="" class="form-control"  readonly>
                                              <small id="saldo_favor"></small>
                                        </div>
                                    </div>
                                      <div class="col-md-12"></div>
                                      <button type="button" onclick="GenerarPago()"  class="btn btn-primary  dim btn-dim btn-block" id="btnguardar_pago" name="btnguardar_pago" disabled="true"><i class="fa fa-save"></i> Pagar Deuda</button>
                              </div>
                        </div>
                   </div>
                   <div class="col-lg-9" style="display: none" id="tabla_pagos">
                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                            <h3 class="text-center"><b id='titulo_tabla'></b></h3>
                                            <button type="button" id="btnmostrartabla" class="btn btn-block btn-danger"><i class="fa fa-eye"></i> Mostrar Deuda Clientes</button>
                                            <button type="button" id="btnmostrartabla2" class="btn btn-block btn-danger"><i class="fa fa-eye"></i> Mostrar Deuda Proveedores</button>
                                          </div>
                                          <div class="panel-body">

                                            <div id="tabla">

                                              <table class=" table table-striped table-bordered table-hover " id="TablaPago"  >
                                                          <thead>
                                                                 <tr>
                                                                      <td># </td>
                                                                      <td>Rut</td>
                                                                      <td>Nombre</td>
                                                                      <td>Deuda Total</td>
                                                                      <td>Ver Detalles</td>
                                                                   </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                </table>
                                            </div>
                                            <div id="tabla_detalle" class="col-md-12">
                                               <table class=" table table-striped table-bordered table-hover " id="TablaDetallePago"  >
                                                          <thead>
                                                                 <tr>
                                                                      <td># </td>
                                                                      <td id="vc">Numero Venta</td>

                                                                       <td>Estado</td>
                                                                      <td >Deuda </td>
                                                                   </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                </table>
                                            </div>
                                           </div>
                                        </div>
                   </div>

            </div>
</form>
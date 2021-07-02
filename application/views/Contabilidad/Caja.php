 <div id="carga" class="panel panel-warning">
  <h2 class="text-center">CARGANDO DATOS, ESPERE UN MOMENTO...</h2>
  <div class="sk-spinner sk-spinner-three-bounce">
    <div class="sk-bounce1"></div>
    <div class="sk-bounce2"></div>
    <div class="sk-bounce3"></div>
  </div>
</div>
<div class="row" style="display: none">
  <div class="col-md-6 col-md-offset-3" id="inicio_caja" style="display:none">
  <div class="panel panel-success">
  <div class="panel-heading">DETALLE DE CAJA</div>
  <div class="panel-body">
    <form id="formingresocaja" >
    <div class="col-md-12" >
       <br>
        <div class="form-group" style="display: none">
          <label for="fecha_caja" class="col-md-4 control-label">FECHA</label>
          <div class="col-md-7">
            <input type="text" name="fecha_caja" id="fecha_caja" value="" class="form-control fechas_sistema" placeholder="FECHA CAJA" >
          </div>
      </div>
    </div>
     <div class="col-md-12" >
         <br>
          <div class="form-group">
              <label for="monto_apertura" class="col-md-4 control-label">Monto Apertura</label>
              <div class="col-md-7">
               <input type="text" name="monto_apertura" id="monto_apertura" value="" class="form-control precio numeros"  placeholder="Monto Apertura" >
             </div>
         </div>
     </div>
      <div class="col-md-12"><br>
          <button type="button" onclick="IngresoCaja()"  class="btn btn-primary  dim btn-dim " id="btncajaHome" name="btncajaHome" ><i class="fa fa-save"></i> Iniciar Caja</button>
           <button type="button" onclick="VerInformeCaja()"  class="btn btn-info  dim btn-dim " ><i class="fa fa-eye"></i> Ver Informe Caja</button>
      </div>
</form>
  </div>
</div>
</div>
<div class="col-md-6 col-md-offset-3" id="fin_caja" style="display:none">
  <div class="panel panel-danger">
  <div class="panel-heading">CIERRE DE CAJA</div>
  <div class="panel-body">
    <form id="formcierrecaja" >

     <div class="col-md-12" >
         <br>
          <div class="form-group" style="display: none">
              <label for="monto_cierre" class="col-md-4 control-label">Monto Entrega Efectivo</label>
              <div class="col-md-7">
               <input type="text" name="monto_cierre" id="monto_cierre" value="$0" class="form-control precio numeros"  placeholder="Monto Entrega Efectivo" >
             </div>
         </div>
     </div>
      <div class="col-md-12"><br>
          <button type="button" onclick="CierreCaja()"  class="btn btn-primary  dim btn-dim " id="btncajafin" name="btncajafin" ><i class="fa fa-save"></i> Cerrar Caja</button>
          <button type="button" onclick="VerInformeCaja()"  class="btn btn-info  dim btn-dim " ><i class="fa fa-eye"></i> Ver Informe Caja</button>
      </div>
</form>
  </div>
</div>
</div>
<div class="col-lg-12" >
                          <div class="panel panel-info">
                            <div class="panel-heading">
                           <h3 class="text-center"><b>   Detalle de caja</b> </h3>
                            </div>
                            <div class="panel-body">
                               <div class="table-responsive">
                              <table  id="TablaCaja" class="table table-responsive dataTables-example">
                                                  <thead>
                                                    <tr>
                                                        <th style="width: auto">#</th>
                                                        <th>Estado</th>
                                                        <th style="width: auto">Fecha Apertura</th>
                                                        <th style="width: auto">Fecha Cierre</th>
                                                        <th style="width: auto">Monto Apertura</th>
                                                        <th style="width: auto">Monto Cierre</th>

                                                        <th style="width: auto"> Efectivo</th>
                                                        <th style="width: auto"> Credito</th>
                                                           <th style="width: auto"> Debito</th>
                                                          <th style="width: auto"> Cheque</th>
                                                           <th style="width: auto"> Transferencia</th>
                                                              <th style="width: auto">Pago Cliente </th>
                                                               <th style="width: auto">Pago Proveedor </th>


                                                    </tr>
                                                </thead>

                                                <tbody  >


                                                </tbody>
                                            </table>
                          </div>
                            </div>
                          </div>
                        </div>
<!--
<div class="col-md-12"  >
  <div class="panel panel-info">
    <div class="panel-heading"></div>
    <div class="panel-body" id="tabla_caja">

    </div>
  </div>
</div>-->
</div>
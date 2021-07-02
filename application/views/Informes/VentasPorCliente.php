<div class="row">

                <div class="col-md-12">
                        <div class="panel panel-info">
                                          <div class="panel-heading">
                                            <h3 class="text-center"><b>BUSQUEDA DE VENTAS POR CLIENTE</b></h3>
                                          </div>
                                          <div class="panel-body">
                                            <form id="formventaporcliente" class=" col-md-12">
                                              <input type="hidden" id="rutc" name="rutc" value="<?php if($cliente != ""){echo($cliente);}  ?>">
                                               <div class="form-group col-md-3">
                                                                <label for="fecha" >CLIENTE</label>
                                                                    <select name="select_clientes" id="select_clientes" class="form-control"></select>
                                                             </div>
                                                             <div class="form-group col-md-3">
                                                                <label for="fecha" >FECHA INICIO</label>
                                                                       <input type="text" id="fecha_inicio" name="fecha_inicio" class="form-control fechas_sistema3 numeros " autocomplete="off" value="<?php if($inicio != ""){echo($inicio);}  ?>">
                                                             </div>
                                                             <div class="form-group col-md-3">
                                                                <label for="fecha" >FECHA TERMINO</label>
                                                                    <input type="text" id="fecha_termino" name="fecha_termino" class="form-control fechas_sistema3 numeros" autocomplete="off" value="<?php if($fin != ""){echo($fin);}  ?>" onchange='ComprobarFecha()'>
                                                             </div>
                                                               <div class="col-md-3">
                                                                <br>
                                                                 <button  class="btn btn-line btn-info dim btn-block " type="button" id='btnbusquedainforme2' name='btnbusquedainforme2' onclick="BusquedaDetalleCliente()" disabled=""><i class="fa fa-eye"></i> Buscar</button></div>

                                          </form>
                                          <div id="resumen" style="display: none">


                                          </div>
                                          </div>
                                        </div>


                </div>
                <div class="col-md-12 " id="resultado" style="display: none" >
                         <div class="panel panel-primary">
                           <div class="panel-heading"><h3 class="text-center">SALDO/VENTAS CLIENTE <b class='cliente' style="color:blue"></b></h3></div>
                           <div class="panel-body">
                              <table class="table table-striped table-bordeblue table-hover " id="VentasCliente">

                            <thead>
                              <tr>
                                <td>Nº VENTA</td>
                                <td>FECHA</td>
                                <td>PRODUCTO</td>
                                <td>CANTIDAD</td>
                                <th >PRECIO</th>
                                <th >TOTAL</th>
                                <td>PAGADO</td>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                           </div>
                         </div>

                  </div>
</div>
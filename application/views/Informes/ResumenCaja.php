<div class="row">
                <div class="col-md-4">

                        <div class="panel panel-info">
                                          <div class="panel-heading">
                                            <h3 class="text-center"><b>Resumen Por Día</b></h3>
                                          </div>
                                          <div class="panel-body">
                                            <form id="formbusquedacaja">
                                              <input type="hidden" id="fecha_b" name="fecha_b" value="<?php if($fecha != ""){echo $fecha;} ?>">
                                             <div class=" control-label">
                                                                <label for="fecha" >Fecha Busqueda</label>
                                                             </div>
                                                             <div class=" form-group">
                                                                  <input type="date" class="form-control "  id="fecha" name="fecha" required="" value="<?=date("Y-m-d");  ?>" autocomplete="off">
                                                             </div>
                                                             <div class="">
                                                             <hr>
                                                                 <button  class="btn btn-line btn-info dim btn-block" type="button" id='btnbusquedainforme' name='btnbusquedainforme'  onclick="InformeCaja()"><i class="fa fa-eye"></i> Buscar</button>
                                                             </div>
                                          </form>
                                          <div id="resumen" style="display: none">


                                          </div>
                                          </div>
                                        </div>


                </div>
                <div class="col-md-8" id="resultado" style="display: none" >
                         <div class="panel panel-primary">
                           <div class="panel-heading"><h3 class="text-center">PRODUCTOS VENDIDOS DEL DIA <b class='fecha' style="color:blue"></b></h3></div>
                           <div class="panel-body">
                              <table class="table table-striped table-bordeblue table-hover " id="ProductosVendidos">

                            <thead>
                              <tr>
                                <td>PRODUCTO</td>
                                <td>CANTIDAD</td>
                                <th class="precio">TOTAL</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                           </div>
                         </div>
                         <div class="panel panel-primary">
                           <div class="panel-heading"><h3 class="text-center">DETALLE DEL FLUJO DEL DIA <b class='fecha' style="color:blue"></b></h3><small class="text-center">*VALORES ENTRE PARENTESIS SON VALORES NEGATIVOS</small></div>
                           <div class="panel-body" id="detalle_flujo">

                           </div>
                         </div>
                  </div>
</div>
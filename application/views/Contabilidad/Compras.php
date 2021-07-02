<?php $this->load->ver("ModalCompra") ?>
<form class="form-horizontal form_proveedor" id="form_proveedor" style="display:none">
    <div class="panel panel-info" id="tab_proveedor"  >
        <div class="panel-heading"> <button class="btn btn-line btn-success dim limpiar" id="btntablacompras" ><i class="fa fa-eye"></i> VER COMPRAS </button><h3 class="text-center">Informacion Proveedor</h3>
        </div>

        <div class="panel-body">
          <div class="col-md-6">
                <input type="hidden" id="id_proveedor" name="id_proveedor" value="" />
                 <input type="hidden" id="tipo" name="tipo" value="1" />

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
<div class="row">
  <form id="formcompras">
    <input type="hidden" id="cant_compra" name="cant_compra" value="">
    <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-body">
            <div class="col-md-12">
                        <div class="col-md-4">
                           <div class="fechas form-group t" id="data_1" style="display: none">
                           <label for="" class="hidden-print">Fecha </label>
                                <div class="input-group date ">
                                    <span class="input-group-addon hidden-print"><i class="fa fa-calendar "></i></span><input type="text" class="form-control fechas_sistema3" value="<?= date("d-m-Y") ?>" id="fecha" name="fecha" autocomplete="off" >
                                </div>
                            </div>
                          <div class="form-group">
                            <label for="select_proveedores" class="hidden-print">Buscar Proveedor</label>
                             <select class="select2_demo_2 form-control" id="select_proveedores" name="select_proveedores" required=""></select>
                                     <button type="button"  class="btn btn-primary btn-block hidden-print" data-toggle="modal"  class="btn btn-line btn-info " id="btnaddproveedor" ><i class="fa fa-plus"></i> AGREGAR PROVEEDOR</button>
                          </div>
                            <button type="button" id="btncompra" class="btn  btn-info btn-block hidden-print" data-toggle="modal"  class="btn btn-line btn-info " data-toggle="modal" href="#Compra"  accesskey="b" ><i class="fa fa-plus"></i> GENERAR COMPRA</button>
                        <div class="col-md-12 alert alert-success text-center">
                                <b><h2>TOTAL METROS</h2>
                                <h1 class="total_metros"></h1></b>
                                <input type="hidden" id="total_metros_compra" name="total_metros_compra" value='' >
                        </div>
                        </div>
                        <div class="col-md-8">
                            <form id="formtablaproductos">
                                    <div class="panel panel-warning col-md-12 col-xs-12">

                                    <h2 class="text-center">TABLA DE RECEPCION DE METROS</h2>
                                    <div class="panel-body">
                                         <div class="col-lg-12" >

                                                  <button class="btn btn-outline btn-success  dim hidden-print" type="button" onclick="TablaMetrosCubicos()"><i class="fa fa-plus"></i> AÑADIR COLUMNA</button>
                                               <button class="btn btn-outline btn-info  dim hidden-print" type="button" onclick="print('TablaCompraTemporal')"><i class="fa fa-print"></i> IMPRIMIR</button>
                                                     <div  id="TablaCompraTemporal" name="TablaCompraTemporal">

                                              <div class="borrartabla">
                                                <table  class="table table-striped table-bordered table-hover  " id="TablaMetrosCubicos">
                                                <thead>
                                                  <tr>
                                                    <th>DIAMETRO</th>
                                                    <th>CANTIDAD</th>
                                                    <th>CUBICO</th>
                                                     <th>TOTAL METROS</th>
                                                     <th class="hidden-print"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                              </table>
                                              </div>
                                         </div>
                                    </div>
                                    </div>
                              </div>
                          </form>
                        </div>

                    </div>
        </div>
      </div>
    </div>

  </div>



</form>
</div>
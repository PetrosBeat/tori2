 <div class="row">
    <input type="hidden" id="tipo_add" name="tipo_add" value="0">
<div class="panel panel-info">
    <div class="panel body">

    <div class="tabs-container">
        <div class="tabs-left">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true" onclick="cambio_tipo(0)">  PRODUCTOS</a></li>
                <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false" onclick="cambio_tipo(1)">INGREDIENTES</a></li>
                <li class=""><a data-toggle="tab" href="#tab-3" aria-expanded="false" onclick="cambio_tipo(2)">PAQUETES DE INGREDIENTES</a></li>
            </ul>
            <div class="tab-content ">
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        <h1 class="text-center"><b>PRODUCTOS</b></h1>
                        <table id="TablaProductos" class="table table-striped table-bordered " >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Imagen</th>
                                    <th>Categoria</th>
                                    <th>Precio Venta</th>
                                    <th>Ver/Editar</th>
                                </tr>
                            </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div id="tab-2" class="tab-pane">
                <div class="panel-body">
                     <h1 class="text-center"><b>INGREDIENTES</b></h1>
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="TablaIngredientes">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>NOMBRE (ABREVIATURA)</th>

                                <th>STOCK</th>
                                <th>ESTADO</th>
                                <th class="hidden-print">VER</th>
                                <th class="hidden-print">EDITAR</th>
                                <th class="hidden-print">MOSTRAR/OCULTAR</th>
                              </tr>
                            </thead>
                            <tbody >
                            </tbody>
                          </table>
                </div>
            </div>
            <div id="tab-3" class="tab-pane">
                <div class="panel-body">
                     <h1 class="text-center"><b>PAQUETES DE INGREDIENTES</b></h1>
                      <table id="TablaPaquetesIngredientes" class="table table-striped table-bordered " >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paquete</th>
                                    <th>Categoria</th>
                                    <th>Ver/Editar</th>
                                </tr>
                            </thead>
                        <tbody></tbody>
                    </table>
                    <hr>
                   <form id="form_paquetes_ingredientes">
                        <div class="col-md-6">
                         <div class="form-group createpingrediente">
                              <label for="nombre_paquete" class=" control-label">NOMBRE PAQUETE  </label>
                                <input type="text" name="nombre_paquete" id="nombre_paquete" placeholder="NOMBRE DEL PAQUETE DE INGREDIENTES" class="form-control mayusculas"   autocomplete="off" value="" >
                         </div>
                    </div>
                     <div id="paquetes_ingredientes"></div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="panel-footer">
    <button type='button' onclick="agregar_tipo()" class="btn btn-success dim agregarbtn" id="agregarbtn" name="agregarbtn"><i class="fa fa-plus"></i></button>
</div>
    </div>
</div>
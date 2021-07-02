<?php $this->load->ver('ModalCategoria') ?>
<div id="carga" class="panel panel-warning">
    <h2 class="text-center">CARGANDO DATOS, ESPERE UN MOMENTO...</h2>
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
    </div>
</div>
<div class="panel panel-danger" id="tab_categoria" style="display: none">
    <div class="panel-heading">
        <button data-toggle="modal" id="categoria" class="btn btn-line btn-success dim" data-toggle="modal" href="#ModalCategoria" ><i class="fa fa-list"></i> Añadir Categoria</button>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" id="TablaCategoria">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre Categoria </th>
                        <th class="hidden-print"></th>
                        <th class="hidden-print"></th>
                    </tr>
                </thead>
                <tbody >
                </tbody>
            </table>
        </div>
    </div>
</div>
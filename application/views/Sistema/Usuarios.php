 <div id="carga" class="panel panel-warning">
  <h2 class="text-center">CARGANDO DATOS, ESPERE UN MOMENTO...</h2>
  <div class="sk-spinner sk-spinner-three-bounce">
    <div class="sk-bounce1"></div>
    <div class="sk-bounce2"></div>
    <div class="sk-bounce3"></div>
  </div>
</div>

<div id="data_user" style="display: none">
  <div class="panel panel-info">
    <div class="panel-heading">  <button type="button"  class="btn btn-primary  dim btn-dim pull-left" onclick='Mostrar(0)'  ><i class="fa fa-eye"></i> VER TABLA USUARIOS</button><br><br></div>
<form id="form_usuarios"  class="form-horizontal">
    <div class="panel-body">

        <input type="hidden" name="id_usuario" id="id_usuario" value="0">
        <div class="col-lg-12" id="dat_text_user">

        </div>
        <div class="form-group datuser">
          <label for="rut_usuario" class="col-sm-4 control-label">Rut </label>
          <div class="col-sm-7">
            <input type="text" name="rut_usuario" id="rut_usuario" placeholder="Rut Usuario" class="form-control ruts"   autocomplete="off" value="" >

          </div>
        </div>
        <div class="form-group clave">
          <label for="clave_usuario" class="col-sm-4 control-label">Clave Usuario</label>
          <div class="col-sm-7">
            <input type="password" name="clave_usuario" id="clave_usuario" placeholder="Clave Usuario" class="form-control"  minlength="4" maxlength="10" autocomplete="off">
          </div>
        </div>
             <div class="form-group  cambio_clave">
          <label for="clave_antigua_usuario" class="col-sm-4 control-label">Clave Antigua</label>
          <div class="col-sm-7">
            <input type="password" name="clave_antigua_usuario" id="clave_antigua_usuario" placeholder="Clave Antigua Usuario" class="form-control"  minlength="4" maxlength="10" autocomplete="off">
          </div>
        </div>
        <div class="form-group cambio_clave">
          <label for="clave_nueva_usuario" class="col-sm-4 control-label">Clave Nueva</label>
          <div class="col-sm-7">
            <input type="text" name="clave_nueva_usuario" id="clave_nueva_usuario" placeholder="Clave Nueva Usuario" class="form-control "  value="" minlength="4" maxlength="10" >
          </div>
        </div>
        <div class="form-group datuser">
          <label for="nombres_usuario" class="col-sm-4 control-label">Nombres Usuario</label>
          <div class="col-sm-7">
            <input type="text" name="nombres_usuario" id="nombres_usuario" placeholder="Nombres Usuario" class="form-control letras mayusculas"  value=""  >
          </div>
        </div>
        <div class="form-group datuser">
          <label for="apellidos_usuario" class="col-sm-4 control-label">Apellidos Usuario</label>
          <div class="col-sm-7">
            <input type="text" name="apellidos_usuario" id="apellidos_usuario" placeholder="Apellidos Usuario" class="form-control letras mayusculas"  value="" >
          </div>
        </div>
        <div class="form-group datuser">
          <label for="rango_usuario" class="col-sm-4 control-label">Rango Usuario</label>
          <div class="col-sm-7">
            <select name="rango_usuario" id="rango_usuario" class="form-control" >
              <option value ="x">Seleccione una opción</option>
              <option value ="0">ADMINISTRADOR</option>
              <option value ="1">VENDEDOR</option>
              <option value ="2">CAJERO</option>
            </select>
          </div>
        </div>

    </div>
    <div class="panel-footer">
       <button type="button"  class="btn btn-primary  dim btn-dim pull-left" id="btnguardar" name="btnguardar" ><i class="fa fa-save"></i> Guardar</button><br><br>
    </div>
     </form>
  </div>
</div>
<div class="panel panel-success" id="tabla_user" style="display: none">
  <div class="panel-heading">
    <button  class="btn btn-line btn-info dim"  onclick="Mostrar(1)"><i class="fa fa-user-plus"></i> Añadir Usuario</button>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover " id="TablaUsuarios">
        <thead>
          <tr>
            <th># </th>
            <th>Nombre Completo</th>

            <th>Rango</th>
            <th>EDITAR</th>
            <th>CAMBIAR CLAVE</th>
            <th>ELIMINAR</th>
          </tr>
        </thead>
        <tbody >
        </tbody>
      </table>
    </div>
  </div>
</div>
<style type="text/css" media="screen">
 body {
  background-size: cover;
  background-image: url("assets/fondo.jpg");
  background-position: center center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #464646;
}
</style>
<div class=" loginColumns animated fadeInDown" style="margin: 0">
        <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-12 pull-left">
                    <div id="cargando"  style="display:none; color: green;">
                            <h2 class="text-center">Cargando....</h2>
                            <img class="center-block" src="assets/imagenes/cargando.gif" alt="" />
                    </div>
            <div id="respuesta"></div>
                <div class="ibox-content">
                <b><h2 class="font-bold text-center" style="color: aqua">BIENVENIDO(A) </h2></b>
                <b><h5 class=" text-center" style="color: red">INGRESE SUS CREDENCIALES </h5></b>
                    <form class="m-t" role="form" id="formconectar" autocomplete="off" >

                        <div class="form-group">
                            <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="Correo Electronico " required  >
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password"  placeholder="Contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b" >Ingresar</button>
                    </form>
                    <p class="m-t">
                        <small>POS VENTA.</small>
                    </p>
                </div>
            </div>
        </div>

</div>


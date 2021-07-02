
       <form  id="formdatosempresa">
         <div class="col-md-12">
             <div class="col-md-3 center-block"> <button  class="btn btn-block btn-info dim" type="button" onclick="GuardarPanel()"><i class="fa fa-save"></i> GUARDAR DATOS</button></div>
          </div>
        <div class="col-md-3">
           <div class="panel panel-info">
             <div class="panel-heading">Configuración de comandas</div>
             <div class="panel-body">
               <div class="form-group ">
                                     <label for="impresion_barra" class="control-label">IMPRESION BARRA </label>
                                    <div >
                                      <select name="impresion_barra" id="impresion_barra" class="form-control ">
                                        <option value="0" <?php if($empresa['impresion_barra'] == 0){echo "selected";} ?> >NO</option>
                                         <option value="1" <?php if($empresa['impresion_barra'] == 1){echo "selected";} ?> >SI</option>

                                      </select>
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                     <label for="impresion_cocina" class="control-label">IMPRESION COCINA </label>
                                    <div >
                                      <select name="impresion_cocina" id="impresion_cocina" class="form-control ">
                                        <option value="0" <?php if($empresa['impresion_cocina'] == 0){echo "selected";} ?> >NO</option>
                                         <option value="1" <?php if($empresa['impresion_cocina'] == 1){echo "selected";} ?> >SI</option>

                                      </select>
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                     <label for="impresion_venta" class="control-label">IMPRESION VENTA </label>
                                    <div >
                                      <select name="impresion_venta" id="impresion_venta" class="form-control ">
                                        <option value="0" <?php if($empresa['impresion_venta'] == 0){echo "selected";} ?> >NO</option>
                                         <option value="1" <?php if($empresa['impresion_venta'] == 1){echo "selected";} ?> >SI</option>

                                      </select>
                                      </div>
                                  </div>
                                   <div class="form-group ">
                                     <label for="impresion_precuenta" class="control-label">IMPRESION PRE-CUENTA </label>
                                    <div >
                                      <select name="impresion_precuenta" id="impresion_precuenta" class="form-control ">
                                        <option value="0" <?php if($empresa['impresion_precuenta'] == 0){echo "selected";} ?> >NO</option>
                                         <option value="1" <?php if($empresa['impresion_precuenta'] == 1){echo "selected";} ?> >SI</option>

                                      </select>
                                      </div>
                                  </div>
             </div>
           </div>
        </div>
        <div class="col-md-3">
          <div class="panel panel-success">
            <div class="panel-heading">Configuración Impresora</div>
            <div class="panel-body">
                  <div class="form-group ">
                                     <label for="tipo_impresora" class="control-label">TIPO DE IMPRESORA </label>
                                    <div >
                                      <select name="tipo_impresora" id="tipo_impresora" class="form-control ">
                                        <option value="0" <?php if($empresa['impresora_red'] == 0){echo "selected";} ?> >RED</option>
                                         <option value="1" <?php if($empresa['impresora_red'] == 1){echo "selected";} ?> >USB</option>

                                      </select>
                                      </div>
                                  </div>
                                   <div class="form-group ">
                                     <label for="ip_impresora" class="control-label">IP IMPRESORA </label>
                                    <div >
                                     <input type="text" name="ip_impresora" id="ip_impresora" placeholder="Iva " class="form-control mayusculas numeros"  value="<?=$empresa['ip_impresora'] ?>" required=""  >
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                     <label for="nombre_impresora" class="control-label">NOMBRE IMPRESORA </label>
                                    <div >
                                     <input type="text" name="nombre_impresora" id="nombre_impresora" placeholder="Iva " class="form-control mayusculas numeros"  value="<?=$empresa['nombre_impresora'] ?>" required=""  >
                                      </div>
                                  </div>
            </div>
          </div>
        </div>
           <div class="col-md-3 ">
               <div class="panel panel-success">
                    <div class="panel-heading">

                        <h3 class="text-center"><b>Configuración General</b></h3>
                    </div>
                    <div class="panel-body">
                       <div class="form-group ">
                                     <label for="nombre" class="control-label">NOMBRE EMPRESA </label>
                                    <div >
                                     <input type="text" name="nombre" id="nombre" placeholder="Nombre Empresa" class="form-control mayusculas"  value="<?=$empresa['nombre'] ?>" required="" >
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                     <label for="rut" class="control-label">RUT EMPRESA </label>
                                    <div >
                                     <input type="text" name="rut" id="rut" placeholder="Rut Empresa" class="form-control mayusculas numeros"  value="<?=$empresa['rut'] ?>" required="" onkeyup="Ruts(id);">
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                     <label for="giro" class="control-label">GIRO EMPRESA </label>
                                    <div >
                                     <input type="text" name="giro" id="giro" placeholder="Giro Empresa" class="form-control mayusculas letras"  value="<?=$empresa['giro'] ?>" required=""  >
                                      </div>
                                  </div>
                                     <div class="form-group ">
                                     <label for="direccion" class="control-label">DIRECCION </label>
                                    <div >
                                     <input type="text" name="direccion" id="direccion" placeholder="Direccion Empresa" class="form-control mayusculas"  value="<?=$empresa['direccion'] ?>" required=""   >
                                      </div>
                                  </div>
                                   <div class="form-group ">
                                     <label for="telefono" class="control-label">TELEFONO </label>
                                    <div >
                                     <input type="text" name="telefono" id="telefono" placeholder="Telefono Empresa" class="form-control numeros"  value="<?=$empresa['telefono'] ?>" required=""  data-mask='999-9999-99' >
                                      </div>
                                  </div>
                                   <div class="form-group ">
                                     <label for="correo" class="control-label">CORREO </label>
                                    <div >
                                     <input type="email" name="correo" id="correo" placeholder="Correo Empresa" class="form-control mayusculas"  value="<?=$empresa['correo'] ?>" required=""   >
                                      </div>
                                  </div>
                                   <div class="form-group ">
                                     <label for="ciudad" class="control-label">CIUDAD </label>
                                    <div >
                                     <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad Empresa" class="form-control mayusculas letras"  value="<?=$empresa['ciudad'] ?>" required=""  >
                                      </div>
                                  </div>


                   </div>


                </div>
           </div>
           <div class="col-md-3">
             <div class="panel panel-success">
               <div class="panel-heading">Configuración Sistema</div>
               <div class="panel-body">
                 <div class="form-group ">
                                     <label for="clave_descuento" class="control-label">CLAVE AUTORIZACION </label>
                                    <div >
                                     <input type="text" name="clave_descuento" id="clave_descuento" placeholder="Clave Autorizacion" class="form-control  numeros"  value="<?=$empresa['clave_autorizacion'] ?>" required=""  >
                                      </div>
                                  </div>
                                     <div class="form-group ">
                                     <label for="tipo_sistema" class="control-label">TIPO SISTEMA </label>
                                    <div >
                                      <select name="tipo_sistema" id="tipo_sistema" class="form-control ">
                                         <option value="0" <?php if($empresa['tipo_sistema'] === 0){echo "selected";} ?> >RESTAURANT</option>
                                         <option value="1" <?php if($empresa['tipo_sistema'] === 1){echo "selected";} ?> >MINI MARKET</option>
                                        <option value="2" <?php if($empresa['tipo_sistema'] === 2){echo "selected";} ?> >SUSHERIA </option>

                                      </select>
                                      </div>
                                  </div>

                                     <div class="form-group ">
                                     <label for="iva" class="control-label">% IVA </label>
                                    <div >
                                     <input type="text" name="iva" id="iva" placeholder="Iva " class="form-control mayusculas numeros"  value="<?=$empresa['iva'] ?>" required=""  >
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                     <label for="propina" class="control-label">¿CON PROPINA ?</label>
                                    <div >
                                      <select name="propina" id="propina" class="form-control ">
                                        <option value="0" <?php if($empresa['propina'] == 0){echo "selected";} ?> >NO</option>
                                         <option value="1" <?php if($empresa['propina'] == 1){echo "selected";} ?> >SI</option>

                                      </select>
                                      </div>
                                  </div>
                                  <div class="form-group ">
                                     <label for="delivery" class="control-label">¿CON DELIVERY? </label>
                                    <div >
                                      <select name="delivery" id="delivery" class="form-control ">
                                        <option value="0" <?php if($empresa['delivery'] == 0){echo "selected";} ?> >NO</option>
                                         <option value="1" <?php if($empresa['delivery'] == 1){echo "selected";} ?> >SI</option>

                                      </select>
                                      </div>
                                  </div>
               </div>
             </div>
           </div>

        </form>
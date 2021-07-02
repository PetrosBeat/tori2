<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?= $titulo ?> </title>

    <style type="text/css">
/* Layout de Objetos Globales */
html{
font-family: 'Helvetica';
  margin-top: auto;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: auto;
    text-transform: uppercase;
    font:12px;
}

body{


/*background-color:#BECEDC;
color:#000;
*/
}


#logo{
  margin-top: 5px;
  width: 12%;
  height:  0px;
margin-right: auto;
margin-left: 10px;
 position: relative;
}
#datos_empresa{
margin-right: 0px;
margin-left: 20px;
margin-top: 10px;
position: fixed;

}
#datos_empresa p {
  margin: 0px;
  padding: 0px;
  margin-left: 105px;

}
.direccion{
  width: 39%;
}
.giro{
  width: 50%;
}
#tabla_comprobante{
  margin-top: 10px;
margin-right: 30px;
margin-left: 450px;
 border: 3px solid red;
text-align: center;
}
.fecha{
margin-right: 0px;
margin-left: 450px;
margin-top: 20px;
text-align: center;
}
.contenedor2{
width: 420px;
margin-top: 10px;
margin-left: 10px;
border: 3px solid black;
}
.contenedor2 p{
  margin:0;
  padding:0;
}
.detalles{
    border: 3px solid black;
        margin-top: 5px;
    margin-right: 5px;
    margin-left: 10px;
  margin-bottom: auto;
}
.detalleiva{
margin-top: 10px;
margin-left: 500px;
margin-right: 5px;
text-align: center;
border: 3px solid black;

}
.detalleiva p{
margin:10;
padding:0;
}
#textderecha{

  text-align: right;
  float: left;
  margin-left: 70px;
}
#textizquerda{

  text-align: right;
  float: left;
 margin-left: 10px;
}
.detallefirma{
border: 3px solid black;
margin-top: 10px;
margin-right: 5px;
margin-left: 10px;
}
.detallefirma p{
  margin-left: 10px;
}
.footer {
    position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  text-align: center;
}
    </style>
</head>
<body >
     <div class="contenedor" style=" text-align: left">
     <img src="1.jpg" alt="Logo de Empresa" id="logo" name="logo"  >
                            <div id="datos_empresa" style="">



                                     <p  class="giro"><b>NOMBRE:</b> <?=$Empresa['RznSoc'] ?></p>
                                    <p  class="giro"><b>Giro:</b> <?=$Empresa['GiroEmis'] ?></p>

                                     <p  class="direccion"><b>Direccion:</b> <?=$Empresa['DirOrigen'] ?></p>
                               <p> <b> Ciudad: </b><?=$Empresa['CmnaOrigen'] ?></p>
                                   <p><b> Correo:</b> <?=$Empresa['CorreoEmisor'] ?></p>
                            </div>
                               <div id="tabla_comprobante" style="">
                                 <h2>    <strong>   <?=$Empresa['RUTEmisor'] ?></strong><br>
                                 <strong> VENTA</strong><br>
                                  <strong>N&deg; <?= $NumeroComprobante ?></strong><br></h2>
                            </div>

                     <div class="fecha" style="">
             <p  ><h3>FECHA DE EMISION  <?php $date = date_crear($Datos_Venta['fecha']); echo date_format($date, 'd-m-Y');?></h3></p>
        </div>
       </div>

       <div class="contenedor2" style="">

                  <?php if($Datos_Comprador != NULL)
                            {
                  ?>


                   <b>  <p  >SEÑORES &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Comprador['razonSocial']?></p>
                    <p  >RUT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Comprador['rut'] ?></p>
                    <p  >GIRO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Comprador['giro'] ?></p>

                    <p  >TELÉFONO&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Comprador['telefono']?></p>
                    <p  >CORREO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Datos_Comprador['email']?></p></b>
                          <?php
                            }
                            else
                            {
                          ?>
                           <b>  <p  >SEÑORES: &nbsp;&nbsp;&nbsp; <?=$Datos_Venta['razonSocial']?></p>
                              <p  >RUT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$Datos_Venta['rut'] ?></p></b>
                          <?php
                            }
                          ?>
       </div>

       <div class="detalles" style="">
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
               <th >NOMBRE PRODUCTO</th>
                <th >CANTIDAD</th>
                <th >PULGADAS</th>
                <th >PRECIO UNITARIO</th>
                <th >SUBTOTAL</th>
            </tr>
        </thead>
        <tbody>
      <?php $total = 0 ;$total_final=0; foreach($Datos_Detalle_Venta as $DatosDetalleVenta) {
          $productoo       = $this->Productos_Model->ver_producto_codigo($DatosDetalleVenta['codigo']);
          if(($DatosDetalleVenta['codigo'] == '1000' OR $DatosDetalleVenta['codigo'] =='404' OR $DatosDetalleVenta['codigo'] == '303') AND $DatosDetalleVenta['tipo_venta'] == '0')
                      {
                        $total_pulgadas = $DatosDetalleVenta['cantidad'] * $productoo['cantidad_palos'];

                        $total_final    = $total_pulgadas * $DatosDetalleVenta['valor_unitario'];
                      }
                      else
                      {
                          $total_pulgadas = $DatosDetalleVenta['cantidad'] * $DatosDetalleVenta['total_pulgadas'];

                          $total_final    = $total_pulgadas * $DatosDetalleVenta['valor_unitario'];
                      }

      ?>

                                    <tr>
                     <td style ="text-align: center"><?= $DatosDetalleVenta['nombre'];   ?></td>
                     <td style ="text-align: center"><?= number_format( $DatosDetalleVenta['cantidad'] , 0, ',', '.');
                     if($DatosDetalleVenta['tipo_venta'] == 0){
                      echo " PAQUETE(S)";
                    }elseif($DatosDetalleVenta['tipo_venta'] == 1 OR $DatosDetalleVenta['tipo_venta'] == 2){
                      echo " UNIDADE(S)";
                    }  ?></td>
                     <td style ="text-align: center"><?=$DatosDetalleVenta['total_pulgadas'];   ?></td>
                     <td style ="text-align: center;">$<?= number_format( $DatosDetalleVenta['valor_unitario'] , 0, ',', '.');   ?></td>
                     <td style ="text-align: center;">$<?= number_format($DatosDetalleVenta['total_final'] , 0, ',', '.');   ?></td>

                                    </tr>
            <?php $total = $total + $DatosDetalleVenta['total_final']; }   ?>

        </tbody>
    </table>
       </div>



<div class="footer" style="">
  <div class="detalleiva" style="text-align: center;">
            <br><br>
                       <b>
                                          <table>
                          <thead>

                          </thead>
                          <tbody style="font-size: 14px">


                           <?php




                                          $neto        = round($total / (1.19),1);
                                          $iva         = round((($neto * (0.19))),1);
                                          $total_final = intval(round(($neto +$iva),0));
                                     ?>
                               <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NETO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format( $neto, 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IVA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format( $iva, 0, ',', '.'); ?></td>
                            </tr>


                            <tr>
                              <td>&nbsp;&nbsp;&nbsp;TOTAL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                              <td align="right"><?=number_format($total_final, 0, ',', '.'); ?></td>
                            </tr>
                          </tbody>
                        </table>


                       </b></span><br>
                       <br><br>
                     </b>

       </div>



       <div style="margin-left: 10px"> GRACIAS POR SU COMPRA. NO VALIDO COMO DOCUMENTO TRIBUTARIO</div>


<br>


                    </body>
</html>
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
        margin-top: 5px;
    margin-right: 5px;
    margin-left: 10px;
  margin-bottom: auto;
}
.detalleiva{
margin-top: 10px;
margin-right: 5px;
text-align: center;

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
.bloque{  /*padre*/
  width: 50%;
    margin: 0;
  padding: 0;
  padding-top: 0;

}
.bloque .A, .bloque .B{  /*hijos*/
  display: inline-block;

}
.bloque .C, {  /*hijos*/
clear:both;

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
                                 <strong> INFORME DEL DIA </strong><br>
                                  <strong><?php $date = date_crear($Fecha); echo date_format($date, 'd-m-Y');?></strong><br></h2>
                            </div>
       </div>
    <div class="detalles" style="">

                  <?php if($Datos_Caja <> 0){ ?>
      <h2 style="text-align: center;">ARQUEO DE CAJA</h2>
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
                <th>HORA APERTURA</th>
                 <th>MONTO APERTURA</th>
                <th>HORA CIERRE</th>
                <th>MONTO ENTREGA</th>


            </tr>
        </thead>
        <tbody>

            <tr >
                     <td style ="text-align: center"> <?php $date = date_crear($Datos_Caja['fecha']); echo date_format($date, ' H:i');?>   </td>
                     <td style ="text-align: center">$<?= number_format( $Datos_Caja['monto_inicial'] , 0, ',', '.');   ?>     </td>
                     <td style ="text-align: center"><?php $date = date_crear($Datos_Caja['fecha_cierre']); if($Datos_Caja['fecha_cierre'] == "0000-00-00 00:00:00"){echo "<b style='color:red'>SIN CERRAR</b>";}else{echo date_format($date, 'H:i');} ?></td>
                      <td style ="text-align: center">$<?= number_format( $Datos_Caja['monto_entrega'] , 0, ',', '.');   ?>    </td>
             </tr>

        </tbody>
    </table>
    <?php } ?>
                  <?php $total_compras = 0; if($Datos_Compras <> 0){ ?>
     <hr>
     <h2 style="text-align: center;">COMPRAS</h2>
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
                  <th style="display: none;">FECHA </th>
                  <th>PROVEEDOR</th>
                   <th>COMP. EMPRESA</th>

                   <th>PRECIO COMPRA</th>
                  <th>TOTAL METROS</th>
                  <th>TIPO METRO</th>
                  <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($Datos_Compras as $Compras) { ?>
            <tr >
                     <td style ="text-align: center;display: none;"> <?php $date = date_crear($Compras['fecha']); echo date_format($date, 'd-m-Y H:i');?>   </td>
                     <td style ="text-align: center"><?= $Compras['razonSocial']   ?>    </td>
                     <td style ="text-align: center"><?= number_format( $Compras['comprobante_empresa'] , 0, ',', '.');   ?>    </td>
                     <td style ="text-align: center">$<?= number_format( $Compras['precio_compra'] , 0, ',', '.');   ?>     </td>
                     <td style ="text-align: center"><?= $Compras['total_metros']  ?>    </td>
                     <td style ="text-align: center"><?php if($Compras['quemado'] == 0 ){echo "VERDE";}else{echo "QUEMADO";}  ?>    </td>
                     <td style ="text-align: center">$<?= number_format( $Compras['total_final'] , 0, ',', '.');   ?>    </td>

             </tr>
      <?php $total_compras = $total_compras + ($Compras['total_final']);} ?>
        </tbody>
    </table>
    <?php } ?>
                  <?php $total_ventas = 0;$total_venta_credito=0; if($Datos_Ventas <> 0){ ?>
    <hr>
     <h2 style="text-align: center;">VENTAS</h2>
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
                  <th style="display: none;">FECHA </th>
                  <th>CLIENTE</th>
                   <th>COMP. EMPRESA</th>

                  <th>DOCUMENTO</th>
                  <th>FORMA DE PAGO</th>
                  <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($Datos_Ventas as $Ventas) { ?>
            <tr >
                     <td style ="text-align: center;display: none;"> <?php $date = date_crear($Ventas['fecha']); echo date_format($date, 'd-m-Y H:i');?>   </td>
                     <td style ="text-align: center"><?=$Ventas['razonSocial'];   ?>    </td>
                     <td style ="text-align: center"><?php if($Ventas['documento'] == "BOLETA"){
                            echo number_format( $Ventas['numero_documento'] , 0, ',', '.');
                     }else
                     {
                         echo   number_format( $Ventas['numero_comprobante'] , 0, ',', '.');
                     }
                     ?>
                     </td>
                     <td style ="text-align: center"><?= $Ventas['documento']  ?>    </td>
                     <td style ="text-align: center"><?= $Ventas['forma_pago']  ?>    </td>
                     <td style ="text-align: center">$<?= number_format( $Ventas['saldo_pendiente'] , 0, ',', '.');   ?>    </td>

             </tr>
      <?php if($Ventas['forma_pago'] =="CONTADO"){$total_ventas = $total_ventas + $Ventas['saldo_pendiente']; }elseif($Ventas['forma_pago'] =='CREDITO'){$total_venta_credito = $total_venta_credito + $Ventas['saldo_pendiente']; } } ?>
        </tbody>
    </table>
    <?php } ?>
                  <?php $total_gastos = 0; if($Datos_Gastos <> 0){ ?>
     <hr>
     <h2 style="text-align: center;">GASTOS</h2>
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
                  <th style="display: none;">FECHA </th>
                  <th>PROVEEDOR</th>
                   <th>DOCUMENTO</th>
                    <th>NRO DOCUMENTO</th>
                     <th>DINERO CAJA</th>
                      <th>TOTAL </th>
                  <th>DESCRIPCION</th>

            </tr>
        </thead>
        <tbody>
        <?php  foreach($Datos_Gastos as $Gastos) { ?>
            <tr >
                     <td style ="text-align: center;display: none;"> <?php $date = date_crear($Gastos['fecha']); echo date_format($date, 'd-m-Y ');?>   </td>
                     <td style ="text-align: center"><?=$Gastos['razonSocial'];   ?>     </td>
                     <td style ="text-align: center"><?= $Gastos['documento']   ?>    </td>
                       <td style ="text-align: center"><?= $Gastos['numero_documento']   ?>    </td>
                     <td style ="text-align: center">$ <?= number_format( $Gastos['total_caja'] , 0, ',', '.');   ?>    </td>
                     <td style ="text-align: center">$ <?= number_format( $Gastos['total'] , 0, ',', '.');   ?>    </td>
                      <td style ="text-align: center"><?= $Gastos['obs'];   ?>     </td>


             </tr>
      <?php $total_gastos = $total_gastos + $Gastos['total'] +$Gastos['total_caja']; } ?>
        </tbody>
    </table>
    <?php } ?>
                  <?php $total_pagos_clientes = 0; if($Datos_Pagos_Cliente <> 0){ ?>
     <hr>
     <h2 style="text-align: center;">PAGOS CLIENTES</h2>
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
                  <th style="display: none;">FECHA </th>
                  <th>CLIENTE</th>
                   <th>TIPO PAGO</th>
                  <th>DINERO RECIBIDO</th>


            </tr>
        </thead>
        <tbody>
        <?php  foreach($Datos_Pagos_Cliente as $Cliente) { ?>
            <tr >
                     <td style ="text-align: center;display: none;"> <?php $date = date_crear($Cliente['fecha']); echo date_format($date, 'd-m-Y H:i');?>   </td>
                     <td style ="text-align: center"><?=$Cliente['razonSocial'];  ?>   </td>
                     <td style ="text-align: center"><?=  $Cliente['forma_pago']   ?>    </td>
                     <td style ="text-align: center"><?= number_format( $Cliente['dinero_recibido'] , 0, ',', '.');  ?>    </td>


             </tr>
      <?php $total_pagos_clientes = $total_pagos_clientes + $Cliente['dinero_recibido'];} ?>
        </tbody>
    </table>
    <?php } ?>
                  <?php $total_pagos_proveedores = 0; if($Datos_Pagos_Proveedor <> 0){ ?>
     <hr>
     <h2 style="text-align: center;">PAGOS PROVEEDOR</h2>
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
                   <th style="display: none;">FECHA </th>
                  <th>PROVEEDOR</th>
                   <th>TIPO PAGO</th>
                  <th>DINERO ENTREGADO</th>

            </tr>
        </thead>
        <tbody>
        <?php  foreach($Datos_Pagos_Proveedor as $Proveedor) { ?>
            <tr >
                     <td style ="text-align: center;display: none;"> <?php $date = date_crear($Proveedor['fecha']); echo date_format($date, 'd-m-Y H:i');?>   </td>
                     <td style ="text-align: center"><?= $Proveedor['razonSocial'];   ?>    </td>
                     <td style ="text-align: center"><?=  $Proveedor['forma_pago']   ?>    </td>
                     <td style ="text-align: center"><?= number_format( $Proveedor['dinero_recibido'] , 0, ',', '.');  ?>    </td>


             </tr>
      <?php $total_pagos_proveedores = $total_pagos_proveedores + $Proveedor['dinero_recibido'];} ?>
        </tbody>
        <?php } ?>
                  <?php $total_pulgadas_inventario = 0;   if($Datos_Inventario <> 0){ ?>
    </table>

                    <div style="page-break-after: always;"></div>
                     <h2 style="text-align: center;">INVENTARIO EMPRESA </h2>
                          <table style="width: 100%;" >
                      <thead style="margin-bottom:50px;">
                          <tr style="text-align: center; margin-bottom:50px;">
                                 <th style="display: none;">FECHA </th>
                                <th>PRODUCTO</th>
                                <th>CANTIDAD</th>
                                <th>TOTAL PULGADAS</th>

                          </tr>
                      </thead>
                      <tbody>
                      <?php   foreach($Datos_Inventario as $Inventario) { ?>
                          <tr >
                                   <td style ="text-align: center;display: none;"> <?php $date = date_crear($Inventario['fecha']); echo date_format($date, 'd-m-Y');?>   </td>

                                   <td style ="text-align: center"><?=  $Inventario['nombre']   ?>    </td>
                                   <td style ="text-align: center">
                                    <?php if($Inventario['unidades'] == 0){
                                        echo $Inventario['cantidad']." PAQUETE(S)";
                                      }else{
                                        echo $Inventario['cantidad']." UNIDAD(ES)";
                                      }   ?>    </td>
                                   <td style ="text-align: center"><?=$Inventario['total_pulgadas']  ?>    </td>


                           </tr>
                    <?php $total_pulgadas_inventario = $total_pulgadas_inventario + $Inventario['total_pulgadas'];} ?>
                      </tbody>
                  </table>
                  <?php } ?>

        </div>
        <div class="footer" >
          <hr>
  <div class="" style="font-family: 'Helvetica';">
  <div class="bloque">
    <div class="A">
          <p>TOTAL COMPRAS : </p>
          <p>TOTAL VENTAS CONTADO: </p>
          <p>TOTAL VENTAS CREDITO: </p>
          <p>TOTAL GASTOS : </p>
          <p>TOTAL PAGOS CLIENTES : </p>
          <p>TOTAL PAGOS PROVEEDORES : </p>
           <p>TOTAL PULGADAS EMPRESA : </p>


    </div>
    <div class="B">
        <p>$<?=   number_format( $total_compras , 0, ',', '.');   ?> </p>
        <p>$<?=   number_format( $total_ventas , 0, ',', '.'); ?></p>
         <p>$<?=   number_format( $total_ventas , 0, ',', '.'); ?></p>
        <p> $<?=  number_format( $total_gastos , 0, ',', '.'); ?></p>
        <p> $<?=  number_format( $total_pagos_clientes , 0, ',', '.'); ?></p>
        <p> $<?=  number_format( $total_pagos_proveedores , 0, ',', '.'); ?></p>

          <p> <?= round($total_pulgadas_inventario,2) ?> PULGADAS</p>


    </div>
  </div>
</div>
</div>
      </body>


</html>
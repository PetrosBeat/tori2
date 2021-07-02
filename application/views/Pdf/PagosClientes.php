<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?= $titulo ?> </title>
    <style type="text/css">
/* Layout de Objetos Globales */
html{

  margin-top: auto;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: auto;
}

body{

font:12px Arial, Tahoma, Verdana, Helvetica, sans-serif;
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
margin-left: 110px;
position: fixed;

}
#datos_empresa p {
  margin: 0px;
  padding: 0px;

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
            <div class="contenedor" style="font-family: 'Helvetica';">
                          <img src="assets/imagenes/logo_empresa.jpg" alt="Logo de Empresa" id="logo" name="logo"  >
                            <div id="datos_empresa" style="font-family: 'Helvetica';">

                                   <h2><?=$Empresa['nombre_empresa'] ?></h2>
                                    <p  class="giro"><b>Giro:</b> <?=$Empresa['giro'] ?></p>

                                     <p  class="direccion"><b>Direccion:</b> <?=$Empresa['direccion'] ?></p>
                                  <b> Ciudad: </b><?=$Empresa['ciudad'] ?><br>
                                    <b> Correo:</b> <?=$Empresa['correo'] ?><br>
                            </div>
                               <div id="tabla_comprobante" style="font-family: 'Helvetica';">
                                 <h2>    <strong>   <?=$Empresa['rut'] ?></strong><br>
                                 <strong>PAGO CLIENTES</strong><br>
                                  <strong>N&deg; <?= $NumeroComprobante ?></strong><br></h2>
                            </div>

                     <div class="fecha" style="font-family: 'Helvetica';">
             <p  "><h3>FECHA DE EMISION  <?php $date = date_crear($Pago['fecha']); echo date_format($date, 'd-m-Y');?></h3></p>
        </div>
       </div>
       <div class="contenedor2" style="font-family: 'Helvetica';">
                    <p  >SEÑORES: &nbsp;&nbsp;&nbsp; <?=$Cliente['nombres']." ".$Cliente['apellidos'] ?></p>
                    <p  >RUT:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$Cliente['rut'] ?></p>
                    <p  >GIRO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$Cliente['giro'] ?></p>

                        <p  > CIUDAD: &nbsp;&nbsp;&nbsp; <?=$Cliente['ciudad'] ?></p>
                          <p  >CONTACTO: &nbsp;&nbsp;<?=$Cliente['telefono'] ?></p>
       </div>

       <div class="detalles" style="font-family: 'Helvetica';">
             <table id="TablaDetalleGuiaInterna" width="100%" >
                      <thead>
                                <tr style="text-align: center">
                                       <td>SEGUN VENTA</td>
                                         <td>FECHA</td>
                                       <td >NETO</td>
                                       <td >IVA </td>
                                       <td >TOTAL VENTA</td>
                                      <td >SALDO PENDIENTE</td>
                                      <td >ESTADO</td>
                                </tr>

                        </thead>

                          <tbody >
                          <?php $totales = 0;


                          ?>

                        <?php    foreach($DetallePago as $DetallePagos) {

                           ?>

                                    <tr style="text-align: center">
                                        <td ><?= number_format( $DetallePagos['numero_venta'] , 0, ',', '.');   ?></td>
                                        <td><?php $date2 = date_crear($DetallePagos['fecha']); echo date_format($date2, 'd-m-Y');?></td>
                                        <td ><?= number_format( $DetallePagos['neto'] , 0, ',', '.');   ?></td>
                                        <td ><?= number_format( $DetallePagos['iva'] , 0, ',', '.');   ?></td>
                                        <td ><?= number_format( $DetallePagos['total'] , 0, ',', '.');   ?></td>
                                        <td ><?= number_format( $DetallePagos['saldo_pendiente'] , 0, ',', '.');   ?></td>
                                         <td>
                                         <?php  if($DetallePagos['saldo_pendiente']  == 0) {echo "PAGADO";}else{echo "PENDIENTE";}  ?>
                                      </td>
                                    </tr>
            <?php } ?>

                        </tbody>
            </table>

       </div>

           <div class="footer">
              <div class="detalleiva" style="font-family: 'Helvetica';">

                       <p  style="margin:10;padding:0; ">TOTAL  PAGO&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;$ &nbsp;&nbsp;&nbsp; <?= number_format( $Pago['dinero_recibido'] , 0, ',', '.');?></p>
                        <p  style="margin:10;padding:0; ">TIPO  PAGO&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <?php

                            echo strtoupper($Pago['tipo_pago']);

                      ?></p>
                      <p  style="margin:10;padding:0; ">SALDO PENDIENTE&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;$ &nbsp;&nbsp;&nbsp; <?= number_format( $Pago['deuda_final'] , 0, ',', '.');?></p>

       </div>
       <div class="detallefirma" style="font-family: 'Helvetica';">
       <br><br>
    <p style="text-align: center;">NOMBRE RECIBE&nbsp;&nbsp;&nbsp; :&nbsp;_________________________________</p>
    <br>
    <br><br>
    <p style="text-align: center;">FIRMA RECIBE&nbsp;&nbsp;&nbsp; :&nbsp;_________________________________</p>
    <br>

       </div>
           </div>

<br>

                    </body>
</html>
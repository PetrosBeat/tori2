<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>VENTAS DEL MES</title>

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
        #DetalleVentasMes tbody tr {
			border: 1px solid black;
        }

</style>
</head>
<body >
     <div class="contenedor" style=" text-align: left">
                             <img src="1.jpg" alt="Logo de Empresa" id="logo" name="logo"  >
                            <div id="datos_empresa" style="">
                                     <p  class="giro"><b>NOMBRE:</b> <?=$Empresa['nombre'] ?></p>
                                     <p  class="giro"><b>Giro:</b> <?=$Empresa['giro'] ?></p>
                                     <p  class="direccion"><b>Direccion:</b> <?=$Empresa['direccion'] ?></p>
                                     <p> <b> Ciudad: </b><?=$Empresa['ciudad'] ?></p>
                                     <p><b> Correo:</b> <?=$Empresa['correo'] ?></p>
                            </div>
                               <div id="tabla_comprobante" style="">
                                  <h2><strong><?=$Empresa['rut'] ?></strong><br><strong> VENTAS MES</strong><br><strong></strong><br></h2>
                               </div>

                     <div class="fecha" style="">
                          <p><h3>FECHA DE EMISION  </h3></p>
                     </div>
       </div>


             <table style="width: 100%;" id="DetalleVentasMes" border="1">
        <thead >
            <tr style="text-align: center; margin-bottom:50px;">

                <th>NUMERO VENTA</th>
                <th>NRO EMPRESA</th>
                 <th>BOLETA</th>
                <th>FORMA PAGO</th>
                <th>FECHA</th>
                 <th>CLIENTE</th>
                <th>CANTIDAD | PRODUCTOS | PRECIO</th>
				<th> PULG.</th>

                <th>TOTAL</th>

            </tr>
        </thead>
        <tbody>
      <?php  $pulgadas = 0; $total = 0; foreach($Datos_Venta as $Venta) {
      ?>
            <tr>
                     <td style ="text-align: center"><?= $Venta['numero_venta'];   ?>   </td>
                      <td style ="text-align: center"><?= $Venta['comprobante_empresa'];   ?>   </td>
                       <td style ="text-align: center"><?= $Venta['numero_documento'];   ?>   </td>
                      	 <td style ="text-align: center"><?= $Venta['forma_pago'];   ?>   </td>
                     <td style ="text-align: center"> <?php $date = date_crear($Venta['fecha']); echo date_format($date, 'd-m-Y');?>    </td>
                     <td><?=$Venta['nombres']." ".$Venta['apellidos'] ?></td>
                     <td style ="text-align: center">
						<?php foreach ($this->Ventas_Model->ver_detalle_ventas($Venta['numero_venta']) as $key ){ $pulgadas = $pulgadas + $key['total_pulgadas'];

						if($key['codigo'] == 1000 OR $key['codigo'] == 8000)
						{
							$total = $total + ($key['cantidad'] * $key['valor_unitario']);
						}
						else
						{
							$total = $total + ($key['total_pulgadas'] * $key['valor_unitario']);
						}

						 ?>
								<?=$key['cantidad']." ".$key['nombre']." | $".number_format( $key['valor_unitario'] , 0, ',', '.')."<br>"?>
						<?php } ?></td>
                     <td style ="text-align: right"><?=$pulgadas;   ?></td>
                       <td style ="text-align: right;">$ <?= number_format( $total , 0, ',', '.')   ?></td>
             </tr>
  <?php $total = 0; $pulgadas = 0;} ?>

        </tbody>
    </table>



                    </body>
</html>
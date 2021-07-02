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
                                 <strong> INVENTARIO</strong><br>
                                 <strong>MES <?=date('F'); ?></strong><br></h2>
                            </div>



       </div>

       <div class="detalles" style="">
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
               <th >NUMERO INVENTARIO</th>
                 <th>FECHA</th>
                  <th>TOTAL EMPRESA</th>
                <th >DIMENSIONADO</th>
                <th >DESPUNTE</th>

            </tr>
        </thead>
        <tbody>
      <?php $empresa=0;$despunte=0;$dimensionado=0; foreach($Datos_Inventario as $DatosInventario) {

      ?>

                                    <tr >
                     <td style ="text-align: center"><?= $DatosInventario['numero_inventario'];   ?></td>
                      <td style ="text-align: center">  <?php $date = date_crear($DatosInventario['fecha']); echo date_format($date, 'd-m-Y');?></td>
                      <td style ="text-align: center"><?= $DatosInventario['total_empresa']   ?></td>
                       <td style ="text-align: center"><?= $DatosInventario['total_servicio_dimensionado']   ?></td>
                        <td style ="text-align: center"><?= $DatosInventario['total_servicio_despunte']   ?></td>



                                    </tr>
            <?php $empresa = $empresa + $DatosInventario['total_empresa'];$despunte = $despunte + $DatosInventario['total_servicio_despunte'];$dimensionado = $dimensionado + $DatosInventario['total_servicio_dimensionado']; }   ?>

        </tbody>
    </table>
       </div>


<div class="footer">
  <div class="detalleiva" style="font-family: 'Helvetica';">
  <div class="bloque">
    <div class="A">
          <p>TOTAL EMPRESA : </p>
          <p>TOTAL SERVICIO DIMENSIONADO : </p>
          <p>TOTAL SERVICIO DESPUNTE : </p>
          <p><h2>TOTAL PULGADAS DEL MES :</h2> </p>


    </div>
    <div class="B">
        <p><?= $empresa." PULGADAS";   ?> </p>
        <p><?= $dimensionado." PULGADAS"; ?></p>
        <p><?= $despunte." PULGADAS"; ?></p>
           <p><h2><?= $despunte+$dimensionado+$empresa." PULGADAS"; ?> </h2></p>

    </div>
  </div>
</div>
</div>


                    </body>
</html>
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
                                  <strong>N&deg; <?= $NumeroComprobante ?></strong><br></h2>
                            </div>

                     <div class="fecha" style="">
             <p ><h3>FECHA DE EMISION  <?php $date = date_crear($Datos_Inventario['fecha']); echo date_format($date, 'd-m-Y');?></h3></p>
        </div>
       </div>

       <div class="detalles" style="">
            <table style="width: 100%;" >
        <thead style="margin-bottom:50px;">
            <tr style="text-align: center; margin-bottom:50px;">
               <th >NOMBRE PRODUCTO</th>


                <th >CANTIDAD</th>
                <th >PULGADAS</th>

            </tr>
        </thead>
        <tbody>
      <?php $total_pulgadas = 0; foreach($Datos_Detalle_Inventario as $DetalleInventario) {

        $total_pulgadas = $total_pulgadas + $DetalleInventario['total_pulgadas'];
      ?>

                                    <tr >
                     <td style ="text-align: center"><?= $DetalleInventario['nombre'];   ?></td>

                     <td style ="text-align: center">  <?php if($DetalleInventario['unidades'] == 0){
                                        echo $DetalleInventario['cantidad']." PAQUETE(S)";
                                      }else if($DetalleInventario['unidades'] != 0 AND ($DetalleInventario['codigo'] === '1000' OR $DetalleInventario['codigo'] === '303' OR $DetalleInventario['codigo'] === '404')){
                                        echo $DetalleInventario['unidades']." UNIDAD(ES)";
                                      }   ?>    </td>
                                      <td style ="text-align: center">  <?php echo $DetalleInventario['total_pulgadas']; ?>    </td>
                                    </tr>
            <?php  }   ?>

        </tbody>
    </table>
       </div>


<div class="footer">
  <div class="detalleiva" style="font-family: 'Helvetica';">
  <div class="bloque">
    <div class="A">
          <p>TOTAL EMPRESA : </p>

    </div>
    <div class="B">
        <p><?= $total_pulgadas." PULGADAS";   ?> </p>


    </div>
  </div>
</div>
</div>


                    </body>
</html>
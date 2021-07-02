<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>LIQUIDACIONES DE SUELDO</title>
	<link rel="stylesheet" href="">
	<style type="text/css" media="screen">
		body{
			text-align: justify;
			text-transform: uppercase;
		}
		.texto
		{
			line-height :8px;
			font-size: 12px;
			font-weight: bold;
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
	</style>
</head>
<body>
	<?php foreach ($Datos_Liquidacion as $row): ?>
		<?php $fechaComoEntero = strtotime($row['fecha']); $m = date("m", $fechaComoEntero);$y = date("Y", $fechaComoEntero);
		if($m == '1')
		{
			$mes = "ENERO";
		}
		else if($m == '2')
		{
			$mes = "FEBRERO";
		}
		else if($m == '3')
		{
			$mes = "MARZO";
		}
		else if($m == '4')
		{
			$mes = "ABRIL";
		}
		else if($m == '5')
		{
			$mes = "MAYO";
		}
		else if($m == '6')
		{
			$mes = "JUNIO";
		}
		else if($m == '7')
		{
			$mes = "JULIO";
		}
		else if($m == '8')
		{
			$mes = "AGOSTO";
		}
		else if($m == '9')
		{
			$mes = "SEPTIEMBRE";
		}
		else if($m == '10')
		{
			$mes = "OCTUBRE";
		}
		else if($m == '11')
		{
			$mes = "NOVIEMBRE";
		}
		else if($m == '12')
		{
			$mes = "DICIEMBRE";
		}

		?>

		<p class="texto" style="line-height :5px;"><?=$Empresa['RznSoc']  ?></p>
	<p class="texto" style="line-height :5px;"><?=$Empresa['RUTEmisor']  ?></p>
	<p class="texto" style="line-height :5px;"><?=$Empresa['CmnaOrigen']  ?></p>
	<p style="text-align: center;font-size: 16px" class="texto">LIQUIDACION DE SUELDO</p>
	<p style="text-align: center;font-size: 16px" class="texto"><?=$mes." ".$y ?> </p>
	<?php $trabajador = $this->Trabajadores_Model->ver_trabajador_rut($row['rut_trabajador']);

	$afp = $this->Informacion_Model->getAfp($trabajador['afp']);
	if($trabajador['tipo_salud'] == '0')
	{
		$sa    = $this->Informacion_Model->getIsapres($trabajador['isapre']);
		$salud = "ISAPRE - ".$sa['nombre'];
	}
	else
	{
		$salud = "FONASA";
	}


	 ?>
<hr>
	<div class="bloque">
		<div class="A texto">R.U.N EMPLEADO </div>
		<div class="B texto">: <?=$trabajador['rut'] ?></div>
	</div>
	<div class="bloque">
		<div class="A texto">NOMBRE EMPLEADO </div>
		<div class="B texto">: <?=$trabajador['nombres']." ".$trabajador['apellidos'] ?></div>
	</div>
	<div class="bloque">
		<div class="A texto">CARGO EMPLEADO </div>
		<div class="B texto">: <?=$trabajador['cargo'] ?></div>
	</div>
	<div class="bloque">
		<div class="A texto">AFP </div>
		<div class="B texto" >: <?=$afp['nombre'] ?></div>
	</div>
	<div class="bloque">
		<div class="A texto">SALUD </div>
		<div class="B texto">: <?=$salud ?></div>
	</div>
	<div class="bloque">
		<div class="A texto"></div>
		<div class="B texto"></div>
	</div>


	<div style="page-break-after: always;"></div>

	<?php endforeach ?>



</body>
</html>
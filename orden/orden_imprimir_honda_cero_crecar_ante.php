<?php
session_start();
include('../valotablapc.php');
include('../funciones.php');
$ancho_tabla = '95%';

$sql_placas = "select cli.nombre as nombrecli,cli.identi as clidenti,cli.direccion,cli.telefono,car.placa,car.marca,car.modelo,car.color,car.tipo,car.chasis,
 o.fecha,o.observaciones,o.radio,o.antena,o.repuesto,o.herramienta,o.otros,o.iva as iva ,o.orden,o.kilometraje,o.mecanico,o.id,
 e.identi ,e.telefonos as telefonos_empresa ,e.direccion as direccion_empresa,o.kilometraje_cambio,e.tipo_taller,cli.email,e.condiciones_orden,
 o.fecha_entrega, o.fecha_salida , e.email_empresa,e.razon_social,o.abono,o.kilometraje,car.id,cli.email,u.nombre as usuario_creacion
from $tabla4 as car
inner join $tabla3 as cli on (cli.idcliente = car.propietario)
inner join $tabla14 as o  on (o.placa = car.placa)
inner join $tabla10 as e on  (e.id_empresa = o.id_empresa) 
inner join $tabla16 as u on (u.id_usuario = o.usuario_creacion)
where o.id = '".$_REQUEST['idorden']."'   and   o.id_empresa = '".$_SESSION['id_empresa']."'   ";
 //echo '<br>'.$sql_placas.'<br>';
$datos = mysql_query($sql_placas,$conexion);
$filas = mysql_num_rows($datos); 
$datos_orden = mysql_fetch_assoc($datos);
/*
echo '<pre>';
print_r($datos_orden);
echo '</pre>';
*/
///////////////////////


////////////////////////
if($datos_orden['mecanico']== '')
	{
		$nombre_mecanico = 'MECANICO NO ASIGNADO';
	}
else {
        $sql_nombre_mecanico = "select * from $tabla21 where idcliente = '".$datos_orden['mecanico']."'";
		$consulta_mecanico = mysql_query($sql_nombre_mecanico,$conexion);
		$filas_mecanico = mysql_num_rows($consulta_mecanico);
					if($filas_mecanico > 0)
						{
							$datos_mecanico = mysql_fetch_assoc($consulta_mecanico);
							$nombre_mecanico = $datos_mecanico['nombre'];
						}
					else {  $nombre_mecanico = 'NO_REGISTRADO';}	
	}
	

	
?>
<!DOCTYPE html>
<html lang="es"  class"no-js">
<head>
	<!--<meta charset="UTF-8">-->
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Document</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/style.css">
    <style type="text/css">
<!--

.style1 {font-weight: bold}
#Layer1 {
	position:absolute;
	width:135px;
	height:21px;
	z-index:1;
	left: 93px;
	top: 64px;
}
#Layer2 {
	position:absolute;
	width:229px;
	height:23px;
	z-index:2;
	left: 292px;
	top: 68px;
}
#Layer3 {
	position:absolute;
	width:141px;
	height:24px;
	z-index:3;
	left: 84px;
	top: 120px;
}
#Layer4 {
	position:absolute;
	width:157px;
	height:27px;
	z-index:4;
	left: 271px;
	top: 118px;
}
#Layer5 {
	position:absolute;
	width:120px;
	height:29px;
	z-index:5;
	left: 472px;
	top: 118px;
}
#Layer6 {
	position:absolute;
	width:144px;
	height:30px;
	z-index:6;
	left: 627px;
	top: 108px;
}
#Layer7 {
	position:absolute;
	width:134px;
	height:25px;
	z-index:6;
	left: 78px;
	top: 172px;
}
#Layer8 {
	position:absolute;
	width:150px;
	height:26px;
	z-index:7;
	left: 255px;
	top: 168px;
}
#Layer9 {
	position:absolute;
	width:131px;
	height:30px;
	z-index:8;
	left: 455px;
	top: 170px;
}
#Layer10 {
	position:absolute;
	width:126px;
	height:31px;
	z-index:9;
	left: 619px;
	top: 169px;
}
#Layer11 {
	position:absolute;
	width:131px;
	height:24px;
	z-index:10;
	left: 619px;
	top: 117px;
}
#Layer12 {
	position:absolute;
	width:304px;
	height:30px;
	z-index:11;
	left: 74px;
	top: 213px;
}
#Layer13 {
	position:absolute;
	width:249px;
	height:29px;
	z-index:12;
	left: 426px;
	top: 212px;
}
#Layer14 {
	position:absolute;
	width:111px;
	height:29px;
	z-index:13;
	left: 741px;
	top: 214px;
}
#Layer15 {
	position:absolute;
	width:150px;
	height:32px;
	z-index:14;
	left: 78px;
	top: 269px;
}
#Layer16 {
	position:absolute;
	width:677px;
	height:115px;
	z-index:15;
	left: 85px;
	top: 358px;
}
#Layer17 {
	position:absolute;
	width:81px;
	height:25px;
	z-index:16;
	left: 563px;
	top: 711px;
}
#Layer18 {
	position:absolute;
	width:85px;
	height:26px;
	z-index:17;
	left: 563px;
	top: 746px;
}
#Layer19 {
	position:absolute;
	width:89px;
	height:29px;
	z-index:18;
	left: 563px;
	top: 779px;
}
#Layer20 {
	position:absolute;
	width:90px;
	height:31px;
	z-index:19;
	left: 563px;
	top: 817px;
}
#Layer21 {
	position:absolute;
	width:95px;
	height:29px;
	z-index:20;
	left: 563px;
	top: 856px;
}
#Layer22 {
	position:absolute;
	width:99px;
	height:25px;
	z-index:21;
	left: 563px;
	top: 898px;
}
#Layer23 {
	position:absolute;
	width:96px;
	height:24px;
	z-index:22;
	left: 563px;
	top: 934px;
}
#Layer24 {
	position:absolute;
	width:98px;
	height:24px;
	z-index:23;
	left: 563px;
	top: 966px;
}
#Layer25 {
	position:absolute;
	width:89px;
	height:23px;
	z-index:24;
	left: 706px;
	top: 710px;
}
#Layer26 {
	position:absolute;
	width:90px;
	height:24px;
	z-index:25;
	left: 703px;
	top: 746px;
}
#Layer27 {
	position:absolute;
	width:113px;
	height:25px;
	z-index:26;
	left: 695px;
	top: 781px;
}
#Layer28 {
	position:absolute;
	width:98px;
	height:29px;
	z-index:27;
	left: 697px;
	top: 815px;
}
#Layer29 {
	position:absolute;
	width:98px;
	height:28px;
	z-index:28;
	left: 692px;
	top: 855px;
}
#Layer30 {
	position:absolute;
	width:113px;
	height:29px;
	z-index:29;
	left: 695px;
	top: 893px;
}
#Layer31 {
	position:absolute;
	width:139px;
	height:27px;
	z-index:30;
	left: 695px;
	top: 929px;
}
#Layer32 {
	position:absolute;
	width:134px;
	height:30px;
	z-index:31;
	left: 693px;
	top: 968px;
}

-->
    </style>
</head>
<body>


 <div id="Layer1"><?php echo $datos_orden['fecha']  ?></div>

 <div id="Layer2"><?php echo $datos_orden['nombrecli']  ?></div>
 <div id="Layer3"><?php echo $datos_orden['clidenti']  ?></div>
 <div id="Layer4"><?php echo $datos_orden['direccion']  ?></div>
 <div id="Layer5"><?php echo $datos_orden['telefono']  ?></div>
 <div id="Layer7"><?php echo $datos_orden['tipo']  ?></div>
 <div id="Layer8"><?php echo $datos_orden['placa']  ?></div>
 <div id="Layer9"><?php echo $datos_orden['modelo']  ?></div>
 <div id="Layer10"><?php echo $datos_orden['color']  ?></div>
 <div id="Layer11"><?php echo $datos_orden['email']  ?></div>
 <div id="Layer12"><?php echo $datos_orden['chasis']  ?></div>
 <div id="Layer13"><?php echo $datos_orden['motor']  ?></div>
 <div id="Layer14"><?php echo $datos_orden['kilometraje']  ?></div>
 <div id="Layer15"><?php echo $datos_orden['usuario_creacion']  ?></div>
 <div id="Layer16">
   <label>
   <textarea name="textarea" cols ="70"  rows = "5"><?php echo $datos_orden['observaciones']  ?></textarea>
   </label>
</div>

<?php
$sql_consulta_items ="select n.nombre,r.valor,cantidad from $tabla25 r
			inner join $tabla24 n on (n.id_nombre_inventario = r.id_nombre_inventario)
			where n.id_empresa = '".$id_empresa."'
			and id_orden = '".$_REQUEST['idorden']."'";
			//echo '<br>'.$sql_consulta_items.'<br>';
			$consulta_items = mysql_query($sql_consulta_items,$conexion);
			$conta = 1;
			while($row_items = mysql_fetch_assoc($consulta_items))
				{
				  
				  
				 // $result[$conta][0] =  $row_items['nombre'];
				  $result[$conta][1] =  $row_items['valor'];
				  $result[$conta][2] =  $row_items['cantidad'];
				// $result[0][$conta] =  $row_items['nombre'];
				  
				 // $valores_items[$conta] = $row_items['nombre'];
				 // echo '<br>'. $valores_items[$conta];
				 $conta++;
				}

	/*
	echo '<pre>';
	print_r($result);	
	echo '</pre>';
	*/
	////////
	
		

?>

<div id="Layer17"><?php echo $result[1][0] .$result[1][1].$result[1][2];  ?></div>
<div id="Layer18"><?php echo $result[2][0] .$result[2][1].$result[2][2];  ?></div>
<div id="Layer19"><?php echo $result[3][0] .$result[3][1].$result[3][2];  ?></div>
<div id="Layer20"><?php echo $result[4][0] .$result[4][1].$result[4][2];  ?></div>
<div id="Layer21"><?php echo $result[5][0] .$result[5][1].$result[5][2];  ?></div>
<div id="Layer22"><?php echo $result[6][0] .$result[6][1].$result[6][2];  ?></div>
<div id="Layer23"><?php echo $result[7][0] .$result[7][1].$result[7][2];  ?></div>
<div id="Layer24"><?php echo $result[8][0] .$result[8][1].$result[8][2];  ?></div>
<div id="Layer25"><?php echo $result[9][0] .$result[9][1].$result[9][2];  ?></div>
<div id="Layer26"><?php echo $result[10][0] .$result[10][1].$result[10][2];  ?></div>
<div id="Layer27"><?php echo $result[11][0] .$result[11][1].$result[11][2];  ?></div>
<div id="Layer28"><?php echo $result[12][0] .$result[12][1].$result[12][2];  ?></div>
<div id="Layer29"><?php echo $result[13][0] .$result[13][1].$result[13][2];  ?></div>
<div id="Layer30"><?php echo $result[14][0] .$result[14][1].$result[14][2];  ?></div>
<div id="Layer31"><?php echo $result[15][0] .$result[15][1].$result[15][2];  ?></div>
<div id="Layer32"><?php echo $result[16][0] .$result[16][1].$result[16][2];  ?></div>
</body>
</html>
<script src="../js/modernizr.js"></script>   
<script src="../js/prefixfree.min.js"></script>
<script src="../js/jquery-2.1.1.js"></script>  


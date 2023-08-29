<?php
require "functions/conection.php";
$monto= $_POST["monto"];
$fechaEmision= new DateTime($_POST["fechaEmision"]);
$dia=$fechaEmision->format("d");
$mes=$fechaEmision->format("m");
$anio=$fechaEmision->format("Y");
$fechaEmisionString=$anio."-".$mes."-".$dia;


$fecha = date_create($anio.'-'.$mes.'-'.$dia);
date_add($fecha, date_interval_create_from_date_string('30 days'));
$vencimiento=date_format($fecha, 'Y-m-d');

$c=conectar();
$sql="insert into facturas(monto,fechaEmision,fechaVencimiento) values($monto,'$fechaEmisionString','$vencimiento');";

mysqli_query($c,$sql);

header("location:index.php");





//gettype($fechaEmision);

?>

<a href="index.php">Volver a inicio</a>
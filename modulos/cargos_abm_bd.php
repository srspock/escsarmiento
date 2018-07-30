<?php

require_once $path_sql."BD_Cargo.php";

$page=$_GET['page'];

$Cargo=new BD_Cargo();
$Cargo->setPost($_POST);
$ret=$Cargo->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=car&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else
	echo "<center><a href='main.php?mod=car&page=$page'>No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";

?>
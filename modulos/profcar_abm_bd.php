<?php

require_once $path_sql."BD_Profesor_Cargo.php";

$page=$_GET['page'];

$profesor_cargo=new BD_Profesor_Cargo();
$profesor_cargo->setPost($_POST);
$ret=$profesor_cargo->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=pca&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else
	echo "<center><a href='main.php?mod=pca&page=$page'>No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";

?>
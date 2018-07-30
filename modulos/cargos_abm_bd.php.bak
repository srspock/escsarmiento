<?php

require_once $path_sql."BD_Barrio.php";

$page=$_GET['page'];

$barrio=new BD_Barrio();
$barrio->setPost($_POST);
$ret=$barrio->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=bar&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else
	echo "<center><a href='main.php?mod=bar&page=$page'>No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";

?>
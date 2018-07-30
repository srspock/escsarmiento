<?php

require_once $path_sql."BD_Cupof.php";

$page=$_GET['page'];

$cupof=new BD_Cupof();
$cupof->setPost($_POST);
$ret=$cupof->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=cup&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else
	echo "<center><a href='main.php?mod=cup&page=$page'>No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";

?>
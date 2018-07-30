<?php

require_once $path_sql."BD_Profesor_Cupof.php";

$page=$_GET['page'];

$profesor_cupof=new BD_Profesor_Cupof();
$profesor_cupof->setPost($_POST);
$ret=$profesor_cupof->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=pcu&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else
	echo "<center><a href='main.php?mod=pcu&page=$page'>No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";

?>
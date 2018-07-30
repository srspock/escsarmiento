<?php

require_once $path_sql."BD_Materia.php";

$page=$_GET['page'];

$materia=new BD_Materia();
$materia->setPost($_POST);
$ret=$materia->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=mat&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else
	echo "<center><a href='main.php?mod=mat&page=$page'>No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";

?>
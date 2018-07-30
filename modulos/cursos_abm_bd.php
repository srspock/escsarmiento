<?php

require_once $path_sql."BD_Curso.php";

$page=$_GET['page'];

$curso=new BD_Curso();
$curso->setPost($_POST);
$ret=$curso->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=curs&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else
	echo "<center><a href='main.php?mod=curs&page=$page'>No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";

?>
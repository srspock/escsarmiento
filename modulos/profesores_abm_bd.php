<?php

require_once $path_sql."BD_Profesor.php";

$page=$_GET['page'];

$profesor=new BD_Profesor();
$profesor->setPost($_POST);

if (!empty($_FILES["urlFoto"]["name"])) {     // Revisar si se presionó el boton Seleccionar foto o no
	$profesor->setFiles($_FILES);
	$profesor->setExisteFiles(true);
} else {
	$profesor->setFiles("");
	$profesor->setExisteFiles(false);
}
$ret=$profesor->procesarPeticion();
if ($ret)
	echo "<center><a href='main.php?mod=prof&page=$page'>Operaci&oacute;n exitosa! Pulse aqu&iacute; para volver</a></center>";
else {
	$error=$profesor->getError();
	if ($error==2)
		// No ingresó ninguna foto !
		echo "<center><a href='main.php?mod=prof&page=$page'>Debe ingresar una fotograf&iacute;a !! Pulse aqu&iacute; para volver</a></center>";
	else
		echo "<center><a href='main.php?mod=prof&page=$page'>ERROR(".$error."): No pudo ejecutarse la operaci&oacute;n! Pulse aqu&iacute; para volver</a></center>";
}

?>
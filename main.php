<?php
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['logueado'])) {
	$_SESSION['logueado']="si";   // cambiar a "no" cuando se utilice una opcion para loguearse
}
$_SESSION['logueado']="si";

?>

<!doctype html>
<html lang="es"> 
 <head>
  <meta charset="utf8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Sistema Web</title>
  <link rel="stylesheet" type="text/css"href="./estilos/estilosnuevo.css"/>
  <script type="text/javascript" src="./javascript/funciones.js"></script>
 </head>
 <body>

	<?php
	$path_plantillas="./plantillas/";
	$path_modulos="./modulos/";
	$path_includesvarios="./includesvarios/";
	$path_imagenes="./imagenes/";
	$path_javascript="./javascript/";
	$path_sql="./sql/";

	if (isset($_GET["mod"]))
		$mod=$_GET["mod"];
	else
		$mod="home";

	include ("conf.php");

	$plantilla=$path_plantillas.$conf[$mod]["plantilla"];
	$contenido=$path_modulos.$conf[$mod]["contenido"];
	$contenido_der=$path_modulos.$conf[$mod]["contenido_der"];

	include ($plantilla);
	?>
  
 </body>
</html>

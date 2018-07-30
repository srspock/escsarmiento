<?php
$servidor = "localhost";
$usuario = "root";
$clave = "sergio11";
$nombase = "escsarmiento";


$conex=new mysqli($servidor,  $usuario,  $clave,$nombase);


$sql="SELECT p.id, p.apellido, p.nombre, p.cuil, p.caracter, p.id_cargo, c.nombre as dcargo FROM profesores p, cargos c WHERE p.id_cargo = c.id";
$query=$sql." ORDER BY p.apellido, p.nombre ASC LIMIT 0, 8";

$result = mysqli_query ($conex, $query);
if ($result==false) {
	echo "Es falsoooo";
} else {
	echo "Es verdaderoooo<br>";
	echo $result;
}

?>

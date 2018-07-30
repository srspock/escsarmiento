<?php

if (isset($_GET['page']))
	$page=$_GET['page'];
else
	$page=1;

require_once $path_sql."BD_Profesor.php";
require_once $path_includesvarios."Paginacion.php";	// para paginar los resultados
require_once $path_sql."BD_conexion.php";	// clase para conectar la base de datos
require_once $path_includesvarios."vectores.php";

// Conectar a la base de datos
$archivo=new BD_conexion;
$archivo->conectar();

// Crear objeto página
$pagina=new Paginacion();
$pagina->setConexion($archivo->getConexion());
$pagina->setPorPagina(8);
$pagina->setSeparacionLinks("|");

// Setear la consulta de todos los registros
$profesor=new BD_Profesor();

$sql=$profesor->stringConsultaTabla();
$pagina->setConsulta($sql);

// Leer todos los registros
$resultado=$pagina->getResultado($page);

if ($pagina->getCantRegistros() > 0) {

	// Mostrar cabecera de la tabla
	echo "<center>";
	echo "<table>";
	echo "<tr>";
	echo "<th colspan=6>PROFESORES</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>APELLIDO</th>";
	echo "<th>NOMBRE</th>";
	echo "<th>CARACTER</th>";
	echo "<th colspan=2>ACCION</th>";
	echo "</tr>";

	// Mostrar detalle de la tabla
	foreach($resultado as $row) {
		echo "<tr>";
		$id=$row['id'];
		echo "<td>".$row['apellido']."</td>";
		echo "<td>".$row['nombre']."</td>";
		$caracter=$row['caracter'];
		$dcaracter=$v_caracter[$caracter];
		echo "<td>".$dcaracter."</td>";
		echo "<td>";
		echo "<a href='main.php?mod=cprofdy&cod=$id&act=v&page=$page'>Ver</a>&nbsp;";
		echo "</td>";
		echo "</tr>";
	}

	// Mostrar el pie de la tabla (control por paginas)
	echo "<tr><td colspan=7>";
	echo $pagina->getStringEnlaces();
	echo "</td></tr>";
	echo "</table></center><br>";
} else {
	echo "No hay registros para mostrar!";

}
$archivo->desconectar();
?>
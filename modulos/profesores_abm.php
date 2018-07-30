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
	echo "<br><center><a href='main.php?mod=profform&act=a&page=$page'><font size=5>Clic aqui para Agregar</font></a>";
	echo "<table  border=1>";
	echo "<tr align='center'>";
	echo "<th colspan=6>PROFESORES</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>APELLIDO</th>";
	echo "<th>NOMBRE</th>";
	echo "<th>CUIL</th>";
	echo "<th>CARACTER</th>";
	echo "<th>FOTOGRAFIA</th>";
	echo "<th colspan=2>ACCION</th>";
	echo "</tr>";

	// Mostrar detalle de la tabla
	foreach($resultado as $row) {
		echo "<tr>";
		$id=$row['id'];
		echo "<td>".$row['apellido']."</td>";
		echo "<td>".$row['nombre']."</td>";
		echo "<td>".$row['cuil']."</td>";
		$caracter=$row['caracter'];
		$dcaracter=$v_caracter[$caracter];
		echo "<td>".$dcaracter."</td>";
		$foto=$row['urlfoto'];
		echo "<td align='center'><img src='".$foto."' width='45' border='0' alt=''>";
		echo "<td align='center'>";
		echo "<a href='main.php?mod=profform&cod=$id&act=v&page=$page'>Detalles</a>&nbsp;";
		echo "<a href='main.php?mod=profform&cod=$id&act=m&page=$page'>    Modificar    </a>&nbsp;";
		echo "<a href='main.php?mod=profform&cod=$id&act=b&page=$page'>Borrar</a>";
		echo "</td>";
		echo "</tr>";
	}

	// Mostrar el pie de la tabla (control por paginas)
	echo "<tr><td colspan=7>";
	echo $pagina->getStringEnlaces();
	echo "</td></tr>";
	echo "</table></center><br>";
} else {
	echo "No hay registros para mostrar. <a href='main.php?mod=profform&act=a&page=$page'>Agregar</a>";

}
$archivo->desconectar();
?>
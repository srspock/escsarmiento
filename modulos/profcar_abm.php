<?php

if (isset($_GET['page']))
	$page=$_GET['page'];
else
	$page=1;

require_once $path_sql."BD_Profesor.php";
require_once $path_sql."BD_Cargo.php";
require_once $path_sql."BD_Profesor_Cargo.php";
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
$cargo=new BD_Cargo();
$profesor_cargo=new BD_Profesor_Cargo();

$sql=$profesor_cargo->stringConsultaTabla();
$pagina->setConsulta($sql);

// Leer todos los registros
$resultado=$pagina->getResultado($page);

if ($pagina->getCantRegistros() > 0) {

	// Mostrar cabecera de la tabla
	echo "<br><center><a href='main.php?mod=pcaform&act=a&page=$page'><font size=5>Clic aqui para Agregar</font></a>";
	echo "<table  border=1>";
	echo "<tr>";
	echo "<th colspan=4>PROFESOR Y SUS CARGOS</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>APELLIDO</th>";
	echo "<th>NOMBRE</th>";
	echo "<th>CARGO</th>";
	echo "<th>ACCION</th>";
	echo "</tr>";

	// Mostrar detalle de la tabla
	foreach($resultado as $row) {
		echo "<tr>";
		$id=$row['id'];

        echo "<td>".$row['apellidoprof']."</td>";
		echo "<td>".$row['nombreprof']."</td>";
		echo "<td>".$row['nombrecargo']."</td>";

		echo "<td align='center'>";
		echo "<a href='main.php?mod=pcaform&cod=$id&act=v&page=$page'>Detalles</a>&nbsp;";
		echo "<a href='main.php?mod=pcaform&cod=$id&act=m&page=$page'>    Modificar    </a>&nbsp;";
		echo "<a href='main.php?mod=pcaform&cod=$id&act=b&page=$page'>Borrar</a>";
		echo "</td>";
		echo "</tr>";
	}

	// Mostrar el pie de la tabla (control por paginas)
	echo "<tr><td colspan=6>";
	echo $pagina->getStringEnlaces();
	echo "</td></tr>";
	echo "</table></center><br>";
} else {
	echo "No hay registros para mostrar. <a href='main.php?mod=pcaform&act=a&page=$page'>Agregar</a>";

}
$archivo->desconectar();
?>
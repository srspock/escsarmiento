<?php

if (isset($_GET['page']))
	$page=$_GET['page'];
else
	$page=1;

require_once $path_sql."BD_Curso.php";
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
$curso=new BD_Curso();

$sql=$curso->stringConsultaTabla();
$pagina->setConsulta($sql);

// Leer todos los registros
$resultado=$pagina->getResultado($page);

if ($pagina->getCantRegistros() > 0) {

	// Mostrar cabecera de la tabla
	echo "<br><center><a href='main.php?mod=cursform&act=a&page=$page'><font size=5>Clic aqui para Agregar</font></a>";
	echo "<table  border=1>";
	echo "<tr align='center'>";
	echo "<th colspan=6>CURSOS</font></th>";
	echo "</tr>";
	echo "<tr align='center'>";
	echo "<th>A&Ntilde;O</th>";
	echo "<th>DIVISION</th>";
	echo "<th>TURNO</th>";
	echo "<th>MODALIDAD</th>";
	echo "<th colspan=2>ACCION</th>";
	echo "</tr>";

	// Mostrar detalle de la tabla
	foreach($resultado as $row) {
		echo "<tr>";
		$id=$row['id'];
		echo "<td align='center'>".$v_anio[$row['anio']]."</td>";
		echo "<td align='center'>".$v_division[$row['division']]."</td>";
		echo "<td align='center'>".$v_turno[$row['turno']]."</td>";
		echo "<td align='center'>".$v_modalidad[$row['modalidad']]."</td>";
		echo "<td align='center'>";
		echo "<a href='main.php?mod=cursform&cod=$id&act=v&page=$page'>Detalles</a>&nbsp;";
		echo "<a href='main.php?mod=cursform&cod=$id&act=m&page=$page'>    Modificar    </a>&nbsp;";
		echo "<a href='main.php?mod=cursform&cod=$id&act=b&page=$page'>Borrar</a>";
		echo "</td>";
		echo "</tr>";
	}

	// Mostrar el pie de la tabla (control por paginas)
	echo "<tr><td colspan=6>";
	echo $pagina->getStringEnlaces();
	echo "</td></tr>";
	echo "</table></center><br>";
} else {
	echo "No hay registros para mostrar. <a href='main.php?mod=cursform&act=a&page=$page'>Agregar</a>";

}
$archivo->desconectar();
?>
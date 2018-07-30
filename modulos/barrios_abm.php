<?php

if (isset($_GET['page']))
	$page=$_GET['page'];
else
	$page=1;

require_once $path_sql."BD_Barrio.php";
require_once $path_includesvarios."Paginacion.php";	// para paginar los resultados
require_once $path_sql."BD_conexion.php";	// clase para conectar la base de datos


// Conectar a la base de datos
$archivo=new BD_conexion;
$archivo->conectar();

// Crear objeto página
$pagina=new Paginacion();
$pagina->setConexion($archivo->getConexion());
$pagina->setPorPagina(8);
$pagina->setSeparacionLinks("|");

// Setear la consulta de todos los registros
$barrio=new BD_Barrio();
$sql=$barrio->stringConsultaTabla();
$pagina->setConsulta($sql);

// Leer todos los registros
$resultado=$pagina->getResultado($page);

if ($pagina->getCantRegistros() > 0) {

	// Mostrar cabecera de la tabla
	echo "<br><center><a href='main.php?mod=barform&act=a&page=$page'><font size=5>Clic aqui para Agregar a un Profesor</font></a>";
	echo "<table  border=1 cellspacing=0 width=600>";
	echo "<tr align='center'>";
	echo "<td colspan=3 bgcolor=#045DC5><font face='Arial Black' color='#fff'>PROFESORES</font></td>";
	echo "</tr>";
	echo "<tr align='center' bgcolor=#045DC5 >";
	echo "<td><font face='Arial' color='#fff'>APELLIDO Y NOMBRE</font></td>";
	echo "<td><font face='Arial' color='#fff'>DNI</font></td>";
	echo "<td colspan=2><font face='Arial' color='#fff'>ACCION</font></td>";
	echo "</tr>";

	// Mostrar detalle de la tabla
	foreach($resultado as $row) {
		echo "<tr>";
		$id=$row['id'];
		echo "<td align='center'>".$row['nombre']."</td><td>".$row['loc']."</td>";
		echo "<td align='center'>";
		echo "<a href='main.php?mod=barform&cod=$id&act=v&page=$page'>Detalles</a>&nbsp;";
		echo "<a href='main.php?mod=barform&cod=$id&act=m&page=$page'>    Modificar    </a>&nbsp;";
		echo "<a href='main.php?mod=barform&cod=$id&act=b&page=$page'>Borrar</a>";
		echo "</td>";
		echo "</tr>";
	}

	// Mostrar el pie de la tabla (control por paginas)
	echo "<tr><td colspan=4>";
	echo $pagina->getStringEnlaces();
	echo "</td></tr>";
	echo "</table></center><br>";
} else {
	echo "No hay registros para mostrar. <a href='main.php?mod=barform&act=a&page=$page'>Agregar</a>";

}
$archivo->desconectar();
?>
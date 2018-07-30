<?php

if (isset($_GET['page']))
	$page=$_GET['page'];
else
	$page=1;

require_once $path_sql."BD_Profesor_Cupof.php";
require_once $path_sql."BD_Cupof.php";

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
$profesor_cupof=new BD_Profesor_Cupof();

$sql=$profesor_cupof->stringConsultaTabla();
$pagina->setConsulta($sql);

// Leer todos los registros
$resultado=$pagina->getResultado($page);

if ($pagina->getCantRegistros() > 0) {

	// Mostrar cabecera de la tabla
	echo "<br><center><a href='main.php?mod=pcuform&act=a&page=$page'><font size=5>Clic aqui para Agregar</font></a>";
	echo "<table  border=1>";
	echo "<tr>";
	echo "<th colspan=6>PROFESOR Y CUPOF ASIGNADOS</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<th>APELLIDO</th>";
	echo "<th>NOMBRE</th>";
	echo "<th>CUPOF</th>";
	echo "<th>FECHA ALTA</th>";
	echo "<th>FECHA BAJA</th>";
	echo "<th colspan=2>ACCION</th>";
	echo "</tr>";

	// Mostrar detalle de la tabla
	foreach($resultado as $row) {
		echo "<tr>";
		$id=$row['id'];
		echo "<td align='center'>".$row['apellido']."</td>";
		echo "<td align='center'>".$row['nombre']."</td>";

		// En vez del cupof, muestro la materia y el curso correspondiente al cupof
		$idcupof=$row['id_cupof'];
		$cupof=new BD_Cupof();
		$regcupof=$cupof->consultarRegistroPorCupof($idcupof);
		$dcupof=$regcupof['numero']." - ".$regcupof['dmateria']." - ".$regcupof['danio']."&deg; - ".$regcupof['ddivision']."&deg;";
		echo "<td align='center'>".$dcupof."</td>";
		//-------------------------------------------------------------------------

		echo "<td align='center'>".$row['fecha_alta']."</td>";
		echo "<td align='center'>".$row['fecha_baja']."</td>";
		echo "<td align='center'>";
		echo "<a href='main.php?mod=pcuform&cod=$id&act=v&page=$page'>Detalles</a>&nbsp;";
		echo "<a href='main.php?mod=pcuform&cod=$id&act=m&page=$page'>    Modificar    </a>&nbsp;";
		echo "<a href='main.php?mod=pcuform&cod=$id&act=b&page=$page'>Borrar</a>";
		echo "</td>";
		echo "</tr>";
	}

	// Mostrar el pie de la tabla (control por paginas)
	echo "<tr><td colspan=6>";
	echo $pagina->getStringEnlaces();
	echo "</td></tr>";
	echo "</table></center><br>";
} else {
	echo "No hay registros para mostrar. <a href='main.php?mod=pcuform&act=a&page=$page'>Agregar</a>";

}
$archivo->desconectar();
?>
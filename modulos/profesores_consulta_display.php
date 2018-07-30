<?php
if (isset($_GET['page']))
	$page=$_GET['page'];
else
	$page=1;

require_once $path_sql."BD_Profesor.php";
require_once $path_sql."BD_Profesor_Cupof.php";
require_once $path_sql."BD_Cupof.php";

require_once $path_includesvarios."vectores.php";

$id=$_GET['cod'];

// Busca el registro seleccionado
$profesores=new BD_Profesor();
$row=$profesores->consultarRegistro($id);

$id_profesor=$row['id'];
$nombre=$row['nombre'];
$apellido=$row['apellido'];
$cuil=$row['cuil'];
$caracter=$row['caracter'];
$figlaboral=$row['fig_laboral'];
$nivel=$row['nivel'];
$urlfoto=$row['urlfoto'];


?>

<center><a href="main.php?mod=cprof&page=<?php echo $page; ?>">Volver</a></center>
<table border=0 class="tabladisplay">
	<tr>
		<td valign="top" width="300px"><img src="<?php echo $urlfoto;?>" width="300px" border="0" alt=""></td>
		<td valign="top" align="center">
			<?php
			echo "<h1>".$apellido.", ".$nombre."</h1>";
			echo "<h3>".$cuil."</h3>";
			echo "<br><h2>"."Car&aacute;cter: ".$v_caracter[$caracter]."</h2>";
			echo "<h2>"."Cargo: ".$figlaboral."</h2>";
			
			$profcupof=new BD_Profesor_Cupof();

			$resultado=$profcupof->leerCupofdeunProfesor($id_profesor);

			if ($resultado!=null) {
			
				echo "<br>------------------------";
				foreach ($resultado as $row) {
					$cupof=new BD_Cupof();
					$row2=$cupof->consultarRegistroPorCupof($row['id_cupof']);
					echo "<br>Materia: ".$row2['dmateria']."<br>";
					echo "Curso: ".$row2['danio']."&deg; - ".$row2['ddivision']."&deg;<br>";
					echo "------------------------";
				}
			}

			?>
		</td>
	</tr>
</table>
<center><a href="main.php?mod=cprof&page=<?php echo $page; ?>">Volver</a></center>

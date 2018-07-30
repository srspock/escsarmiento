<?php
require_once $path_sql.'BD_Cupof.php';
require_once $path_sql.'BD_Materia.php';
require_once $path_sql.'BD_Curso.php';
require_once $path_includesvarios.'vectores.php';

$page=$_GET['page'];

$act=$_GET['act'];

// Inicializa los campos del formulario
if ($act=="a") {
	$id=0;
	$numero="";
	$idmateria=1;
	$idcurso=1;
	$horas=0;
} else {
	$id=$_GET['cod'];

	// Busca el registro seleccionado
	$cupof=new BD_Cupof();
	$row=$cupof->consultarRegistro($id);

	$numero=$row['numero'];
	$idmateria=$row['id_materia'];
	$idcurso=$row['id_curso'];
	$horas=$row['horas'];
}

// Setea los campos a solo lectura seg�n la acci�n
if ($act=='m'||$act=='a')
	$readonly=" ";
else
	$readonly="readonly";

// Define el t�tulo seg�n la acci�n seleccionada
switch ($act) {
	case "a": $titulo="Alta de "; break;
	case "b": $titulo="Baja de "; break;
	case "m": $titulo="Modificaci&oacute;n de "; break;
	case "v": $titulo="Consulta de "; break;
}
// FORMULARIO HTML
?>

<center>
<a href="main.php?mod=cup&page=<?php echo $page; ?>">Volver</a>
<table width="550px">
<!--cellpadding="0" cellspacing="0"> -->
	<form name="formCupof" method="post" 
			   action="<?php echo ($act=='v')?'main.php?mod=cup&page='.$page : 'main.php?mod=cupbd&page='.$page; ?>"
		       onSubmit="return validarFormCupof(boton)">
	<thead>
	<tr>
		<th colspan=2 align="center"><?php echo $titulo; ?>Cupof</th>
	</tr>
	</thead>
	
	<tr>
		<td>C&oacute;digo</td>
		<td><?php echo $id;?></td>
	</tr>
	<tr>
		<td>N&uacute;mero</td>
		<td><input type="text" name="formNumero" value="<?php echo $numero;?>" <?php echo $readonly; ?> maxlength="8" size="8"></td>
	</tr>
	<tr>
		<td>Materia</td>
		<td>
			<select name='selMateria'>
		    <?php
				$materia=new BD_Materia();
				$vector=$materia->consultarTodo();
				foreach ($vector as $row) {
					$a=$row['id'];
					$b=$row['nombre'];
					if ($idmateria==$a)
						echo "<option value='$a' selected>$b</option>";
					else
						echo "<option value='$a' >$b</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Curso</td>
		<td>
			<select name='selCurso'>
		    <?php
				$curso=new BD_Curso();
				$vector=$curso->consultarTodo();
				foreach ($vector as $row) {
					$a=$row['id'];
					$b=$row['anio']."&ordm; ".$row['division']."&ordm;";
					if ($idcurso==$a)
						echo "<option value='$a' selected>$b</option>";
					else
						echo "<option value='$a' >$b</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Horas</td>
		<td><input type="text" name="formHoras" value="<?php echo $horas;?>" <?php echo $readonly; ?> maxlength="2" size="2" onKeyPress="return validarSoloNumeros(event)"></td>
	</tr>
	
	<input type="hidden" name="act" value="<?php echo $act; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<tr>
		<td colspan=2><br><br>
			<center>
			<input id="aceptar1" name="botonAceptar" type="submit" value="Aceptar" onClick="1boton=this.name" bgcolor="#E74C3C">
		   </center>
		</td>
	</tr>
	</form>
</table> 
<a href="main.php?mod=cup&page=<?php echo $page; ?>">Volver</a>
</center>

 

<?php
require_once $path_sql.'BD_Profesor.php';
require_once $path_sql.'BD_Cargo.php';
require_once $path_sql.'BD_Profesor_Cargo.php';
require_once $path_includesvarios.'vectores.php';

$page=$_GET['page'];

$act=$_GET['act'];

// Inicializa los campos del formulario
if ($act=="a") {
	$id=0;
	$idprofesor=1;
	$idcargo=1;

} else {
	$id=$_GET['cod'];

	// Busca el registro seleccionado
	$profesor_cargo=new BD_Profesor_Cargo();
	$row=$profesor_cargo->consultarRegistro($id);

	$idprofesor=$row['id_profesor'];
	$idcargo=$row['id_cargo'];

}

// Setea los campos a solo lectura según la acción
if ($act=='m'||$act=='a')
	$readonly=" ";
else
	$readonly="readonly";

// Define el título según la acción seleccionada
switch ($act) {
	case "a": $titulo="Alta de "; break;
	case "b": $titulo="Baja de "; break;
	case "m": $titulo="Modificaci&oacute;n de "; break;
	case "v": $titulo="Consulta de "; break;
}
// FORMULARIO HTML
?>

<center>
<a href="main.php?mod=pca&page=<?php echo $page; ?>">Volver</a>
<table width="550px">
<!--cellpadding="0" cellspacing="0"> -->
	<form name="formProfesorCargo" method="post" 
			   action="<?php echo ($act=='v')?'main.php?mod=pca&page='.$page : 'main.php?mod=pcabd&page='.$page; ?>"
		       onSubmit="return validarFormProfesorCargo(boton)">
	<thead>
	<tr>
		<th colspan=2 align="center"><?php echo $titulo; ?>Profesor con cargo</th>
	</tr>
	</thead>
	
	<tr>
		<td>C&oacute;digo</td>
		<td><?php echo $id;?></td>
	</tr>
	<tr>
		<td>Profesor</td>
		<td>
			<select name='selProfesor'>
		    <?php
				$profesor=new BD_Profesor();
				$vector=$profesor->consultarTodo();
				foreach ($vector as $row) {
					$a=$row['id'];
					$b=$row['apellido'].", ".$row['nombre']." - ".$row['cuil'];

					if ($idprofesor==$a)
						echo "<option value='$a' selected>$b</option>";
					else
						echo "<option value='$a' >$b</option>";
				} 
 			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Cargo</td>
		<td>
			<select name='selCargo'>
		    <?php
				$cargo=new BD_Cargo();
				$vector=$cargo->consultarTodo();
				foreach ($vector as $row) {
					$a=$row['id'];
					$b=$row['nombre'];
					if ($idcargo==$a)
						echo "<option value='$a' selected>$b</option>";
					else
						echo "<option value='$a' >$b</option>";
				} 
			?>
			</select>
			
		</td>
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
<a href="main.php?mod=pca&page=<?php echo $page; ?>">Volver</a>
</center>

 

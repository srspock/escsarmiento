<?php
require_once $path_sql.'BD_Curso.php';
require_once $path_includesvarios.'vectores.php';

$page=$_GET['page'];

$act=$_GET['act'];

// Inicializa los campos del formulario
if ($act=="a") {
	$id=0;
	$anio=1;
	$division=1;
	$turno=1;
	$modalidad=1;
} else {
	$id=$_GET['cod'];

	// Busca el registro seleccionado
	$curso=new BD_Curso();
	$row=$curso->consultarRegistro($id);

	$anio=$row['anio'];
	$division=$row['division'];
	$turno=$row['turno'];
	$modalidad=$row['modalidad'];
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
<a href="main.php?mod=curs&page=<?php echo $page; ?>">Volver</a>
<table width="550px">
<!--cellpadding="0" cellspacing="0"> -->
	<form name="formCurso" method="post" 
			   action="<?php echo ($act=='v')?'main.php?mod=curs&page='.$page : 'main.php?mod=cursbd&page='.$page; ?>"
		       onSubmit="return validarFormCurso(boton)">
	<thead>
	<tr>
		<th colspan=2 align="center"><?php echo $titulo; ?>Cursos</th>
	</tr>
	</thead>
	
	<tr>
		<td>C&oacute;digo</td>
		<td><?php echo $id;?></td>
	</tr>
	<tr>
		<td>A&ntilde;o</td>
		<td>
			<select name='selAnio'>
		    <?php
				foreach ($v_anio as $indice => $valor) {
					if ($anio==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Divisi&oacute;n</td>
		<td>
			<select name='selDivision'>
		    <?php
				foreach ($v_division as $indice => $valor) {
					if ($division==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Turno</td>
		<td>
			<select name='selTurno'>
		    <?php
				foreach ($v_turno as $indice => $valor) {
					if ($turno==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Modalidad</td>
		<td>
			<select cname='selModalidad'>
		    <?php
				foreach ($v_modalidad as $indice => $valor) {
					if ($modalidad==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
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
<a href="main.php?mod=curs&page=<?php echo $page; ?>">Volver</a>
</center>

 

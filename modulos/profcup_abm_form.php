<?php
require_once $path_sql.'BD_Profesor_Cupof.php';
require_once $path_sql.'BD_Profesor.php';
require_once $path_sql.'BD_Cupof.php';
require_once $path_includesvarios.'vectores.php';

$page=$_GET['page'];

$act=$_GET['act'];

// Inicializa los campos del formulario
if ($act=="a") {
	$id=0;
	$idprofesor=1;
	$idcupof=1;
	$fecha_alta="";
	$dd_alta="";
	$mm_alta="";
	$aa_alta="";
	$fecha_baja="";
	$dd_baja="";
	$mm_baja="";
	$aa_baja="";
	$tipo_baja=1;   //se usa vector v_tipos_baja[]
	$concepto_baja="";
	$instrumento=1;	//se usa vector v_instrumento[]
	$instrumento_num="";
} else {
	$id=$_GET['cod'];

	// Busca el registro seleccionado
	$profesor_cupof=new BD_Profesor_Cupof();
	$row=$profesor_cupof->consultarRegistro($id);

	$idprofesor=$row['id_profesor'];
	$idcupof=$row['id_cupof'];
	$fecha_alta=$row['fecha_alta'];
	$dd_alta=substr($fecha_alta,8,2);
	$mm_alta=substr($fecha_alta,5,2);
	$aa_alta=substr($fecha_alta,0,2);
	$fecha_baja=$row['fecha_baja'];
	$dd_baja=substr($fecha_baja,8,2);
	$mm_baja=substr($fecha_baja,5,2);
	$aa_baja=substr($fecha_baja,0,2);
	$tipo_baja=$row['tipo_baja'];
	$concepto_baja=$row['concepto_baja'];
	$instrumento=$row['instrumento'];
	$instrumento_num=$row['instrumento_num'];

}

// Setea los campos a solo lectura según la acción
if ($act=='m'||$act=='a') {
	$readonly=" ";
	$disabled=" ";
} else {
	$readonly="readonly";
	$disabled="disabled";
}

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
<a href="main.php?mod=pcu&page=<?php echo $page; ?>">Volver</a>
<table id="tablaform">
<!--cellpadding="0" cellspacing="0"> -->
	<form name="formProfesorCupof" method="post" 
			   action="<?php echo ($act=='v')?'main.php?mod=pcu&page='.$page : 'main.php?mod=pcubd&page='.$page; ?>"
		       onSubmit="return validarFormProfesorCupof(boton)">
	<thead>
	<tr>
		<th colspan=2 align="center"><?php echo $titulo; ?>Profesor - Cupof</th>
	</tr>
	</thead>
	
	<tr>
		<td>C&oacute;digo</td>
		<td><?php echo $id;?></td>
	</tr>


	<tr>
		<td>Profesor</td>
		<td>
			<select name='selProfesor' <?php echo $disabled; ?>>
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
		<td>Cupof</td>
		<td>
			<select name='selCupof' <?php echo $disabled; ?>>
		    <?php
				$cupof=new BD_Cupof();
				$vector=$cupof->consultarTodoConMateriaYCurso();
				foreach ($vector as $row) {
					$a=$row['id'];
					$b=$row['numero']." - ".$row['dmateria']." - ".$row['danio']."&deg; - ".$row['ddivision']."&deg;";
					if ($idcupof==$a)
						echo "<option value='$a' selected>$b</option>";
					else
						echo "<option value='$a' >$b</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	

	<tr>
		<td>Fecha de alta</td>
		<td>
			<select name='selDDalta' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_fecha_dd as $indice => $valor) {
					if ($dd_alta==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			/
			<select name='selMMalta' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_fecha_mm as $indice => $valor) {
					if ($mm_alta==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			/
			<select name='selAAalta' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_fecha_aa as $indice => $valor) {
					if ($aa_alta==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fecha de baja</td>
		<td>
			<select name='selDDbaja' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_fecha_dd as $indice => $valor) {
					if ($dd_baja==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			/
			<select name='selMMbaja' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_fecha_mm as $indice => $valor) {
					if ($mm_baja==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			/
			<select name='selAAbaja' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_fecha_aa as $indice => $valor) {
					if ($aa_baja==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tipo de baja</td>
		<td>
			<select name='selTipoBaja' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_tipos_baja as $indice => $valor) {
					if ($tipo_baja==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Concepto de la baja</td>
		<td><input type="text" name="formConceptoBaja" value="<?php echo $concepto_baja;?>" <?php echo $readonly; ?> maxlength="80" size="20"></td>
	</tr>
	<tr>
		<td>Instrumento</td>
		<td>
			<select name='selInstrumento' <?php echo $disabled; ?>>
		    <?php
				foreach ($v_instrumento as $indice => $valor) {
					if ($instrumento==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td >N&uacute;mero de instrumento</td>
		<td><input type="text" name="formInstrumentoNum" value="<?php echo $instrumento_num;?>" <?php echo $readonly; ?> maxlength="15" size="18"></td>
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
<a href="main.php?mod=pcu&page=<?php echo $page; ?>">Volver</a></center>

 

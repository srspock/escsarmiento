<?php
require_once $path_sql.'BD_Barrio.php';
require_once $path_sql.'BD_Localidad.php';

$page=$_GET['page'];

$act=$_GET['act'];

// Inicializa los campos del formulario
if ($act=="a") {
	$id=0;
	$nom="";
	$idloc=0;
} else {
	$id=$_GET['cod'];

	// Busca el registro seleccionado
	$barrio=new BD_Barrio();
	$row=$barrio->consultarRegistro($id);

	$nom=$row['nombre'];
	$idloc=$row['id_localidad'];
	
}

// Setea los campos a solo lectura seg�n la acci�n
if ($act=='m'||$act=='a')
	$readonly=" ";
else
	$readonly="readonly";

// Define el t�tulo seg�n la acci�n seleccionada
switch ($act) {
	case "a": $titulo="ALTA"; break;
	case "b": $titulo="BAJA"; break;
	case "m": $titulo="MODIFICAR"; break;
	case "v": $titulo="CONSULTA"; break;
}
// FORMULARIO HTML
?>

<center>
<table width="550px" height="20px">
<!--cellpadding="0" cellspacing="0"> -->
	<form name="formBarrio" method="post" 
			   action="<?php echo ($act=='v')?'main.php?mod=bar&page='.$page : 'main.php?mod=barbd&page='.$page; ?>"
		       onSubmit="return validarFormBarrio(boton)">
	<thead>
	<tr>
		<td colspan=2 align="center"><?php echo $titulo; ?></td>
	</tr>
	</thead>
	
	<tr>
		<td class="facil">C&oacute;digo</td>
		<td class="facil3"><?php echo $id;?></td>
	</tr>
	<tr>
		<td class="facil">Nombre</td>
		<td><input class="facil2" type="text" name="nombre" value="<?php echo $nom;?>" <?php echo $readonly; ?> maxlength="30" size="43"></td>
	</tr>
	<tr>
		<td class="facil">Localidad</td>
		<td>
			<select class="facil2" name='sel_localidad'>
		    <?php
				$localidad=new BD_Localidad();
				$vector=$localidad->consultarTodo();
				foreach ($vector as $row) {
					$a=$row['id'];
					$b=$row['nombre'];
					if ($idloc==$a)
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
		<td colspan=2>
			<center>
			<input id="aceptar1" name="botonAceptar" type="submit" value="Aceptar" onClick="1boton=this.name" bgcolor="#E74C3C">
		   </center>
		</td>
	</tr>
	<tr>
	<td  class="facil4" colspan=2 align="center"><a href="main.php?mod=bar&page=<?php echo $page; ?>">Volver</a></td>
	</tr>
	</form>
</table> 
</center>

 

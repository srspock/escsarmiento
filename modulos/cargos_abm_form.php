<?php
require_once $path_sql.'BD_Cargo.php';

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
	$Cargo=new BD_Cargo();
	$row=$Cargo->consultarRegistro($id);

	$nom=$row['nombre'];
	
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
<a href="main.php?mod=car&page=<?php echo $page; ?>">Volver</a>
<table width="550px">
<!--cellpadding="0" cellspacing="0"> -->
	<form name="formCargo" method="post" 
			   action="<?php echo ($act=='v')?'main.php?mod=car&page='.$page : 'main.php?mod=carbd&page='.$page; ?>"
		       onSubmit="return validarFormCargo(boton)">
	<thead>
	<tr>
		<th colspan=2 align="center"><?php echo $titulo; ?>Cargos</th>
	</tr>
	</thead>
	
	<tr>
		<td>C&oacute;digo</td>
		<td><?php echo $id;?></td>
	</tr>
	<tr>
		<td>Nombre</td>
		<td><input type="text" name="nombre" value="<?php echo $nom;?>" <?php echo $readonly; ?> maxlength="30" size="43"></td>
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
<a href="main.php?mod=car&page=<?php echo $page; ?>">Volver</a>
</center>

 

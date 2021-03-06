<?php
require_once $path_sql.'BD_Cargo.php';
require_once $path_sql.'BD_Profesor.php';
require_once $path_includesvarios.'vectores.php';



$page=$_GET['page'];

$act=$_GET['act'];

// Inicializa los campos del formulario
if ($act=="a") {
	$id=0;
	$nombre="";
	$apellido="";
	$cuil="";
	$caracter=1;
	$figlaboral="";
	$nivel=1;
	$urlfoto="";
} else {
	$id=$_GET['cod'];

	// Busca el registro seleccionado
	$profesores=new BD_Profesor();
	$row=$profesores->consultarRegistro($id);

	$nombre=$row['nombre'];
	$apellido=$row['apellido'];
	$cuil=$row['cuil'];
	$caracter=$row['caracter'];
	$figlaboral=$row['fig_laboral'];
	$nivel=$row['nivel'];
	$urlfoto=$row['urlfoto'];
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
<a href="main.php?mod=prof&page=<?php echo $page; ?>">Volver</a>
<table width="550px">
<!--cellpadding="0" cellspacing="0"> -->
	<form name="formProfesor" method="post" enctype="multipart/form-data"
			   action="<?php echo ($act=='v')?'main.php?mod=prof&page='.$page : 'main.php?mod=profbd&page='.$page; ?>"
		       onSubmit="return validarFormProfesor(boton)">
	<thead>
	<tr>
		<th colspan=2 align="center"><?php echo $titulo; ?>Profesores</th>
	</tr>
	</thead>
	
	<tr>
		<td>C&oacute;digo</td>
		<td><?php echo $id;?></td>
	</tr>
	<tr>
		<td>Nombre</td>
		<td><input type="text" name="formNombre" value="<?php echo $nombre;?>" <?php echo $readonly; ?> maxlength="30" size="43"></td>
	</tr>
	<tr>
		<td>Apellido</td>
		<td><input type="text" name="formApellido" value="<?php echo $apellido;?>" <?php echo $readonly; ?> maxlength="30" size="43"></td>
	</tr>
	<tr>
		<td>Cuil</td>
		<td><input type="text" name="formCuil" value="<?php echo $cuil;?>" <?php echo $readonly; ?> maxlength="13" size="13"  onKeyPress="return validarSoloNumerosyGuion(event)"></td>
	</tr>
	<tr>
		<td>Car&aacute;cter</td>
		<td>
			<select name='selCaracter'>
		    <?php
				foreach ($v_caracter as $indice => $valor) {
					if ($caracter==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td>Figura laboral</td>
		<td><input type="text" name="figLaboral" value="<?php echo $figlaboral;?>" <?php echo $readonly; ?> maxlength="1" size="1"></td>
	</tr>
	<tr>
		<td >Nivel</td>
		<td>
			<select name='selNivel'>
		    <?php
				foreach ($v_nivel as $indice => $valor) {
					if ($nivel==$indice)
						echo "<option value='$indice' selected>$valor</option>";
					else
						echo "<option value='$indice' >$valor</option>";
				} 
			?>
			</select>
			
		</td>
	</tr>
	<tr>
		<td valign="top">
			Foto
		</td>
		<td bgcolor="#ffffcc" align="center"><br><br>
			<img src="<?php echo $urlfoto; ?>" width="200" border="1" alt=""><br>
			<?php 
				if ($act=="m") echo "Actual<br>";
			?>
			<output id="list"></output><br>
			<br><br>
			<input type="file" id="urlFoto" name="urlFoto"><br><br>

			<input type="hidden" name="urlFotoGuardada" value="<?php echo $urlfoto; ?>">
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
<a href="main.php?mod=prof&page=<?php echo $page; ?>">Volver</a>
</center>

        <script>
              function archivo(evt) {
                  var urlFoto = evt.target.files; // FileList object
             
                  // Obtenemos la imagen del campo "file".
                  for (var i = 0, f; f = urlFoto[i]; i++) {
                    //Solo admitimos im�genes.
                    if (!f.type.match('image.*')) {
                        continue;
                    }
             
                    var reader = new FileReader();
             
                    reader.onload = (function(theFile) {
                        return function(e) {
                          // Insertamos la imagen
                         document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/><br>Nuevo'].join('');
                        };
                    })(f);
             
                    reader.readAsDataURL(f);
                  }
              }
             
              document.getElementById('urlFoto').addEventListener('change', archivo, false);
      </script>

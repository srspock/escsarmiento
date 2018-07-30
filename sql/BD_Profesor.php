<?php
require_once 'BD_class_abstracta.php';
require_once $path_includesvarios.'subir_fichero.php';

class BD_Profesor extends BD_class_abstracta {

	 private $post;
	 private $files;
	 private $existeFiles;
	 private $error;  // 0=sin error, 1=en Consulta, 2=es alta y no ingresó foto, 3=al subir la foto

	function setPost($v) {
		$this->post=$v;
	}

	function setFiles($v) {
		$this->files=$v;
	}

	function setExisteFiles($v) {
		$this->existeFiles=$v;
	}

	function getError() {
		return $this->error;
	}

	function procesarPeticion() {

		$act=$this->post['act'];
		$id=$this->post['id'];
		$ape=$this->post['formApellido'];
		$nom=$this->post['formNombre'];
		$cuil=$this->post['formCuil'];
		$caracter=$this->post['selCaracter'];
		$fig=$this->post['figLaboral'];
		$niv=$this->post['selNivel'];
		$urlFotoGuardada=$this->post['urlFotoGuardada'];
		$files=$this->files;
		$existef=$this->existeFiles;

		if ($act=="a" and $existef==false) {
			$this->error=2;  // Es un alta y no ingresó la fotografía
			return false;
		}

	    $ret=false;
		if ($existef)		// Subir la foto si se presionó el boton Seleccionar archivo
			subir_fichero('fotos','urlFoto',$files);

		// Guardar en la tabla
		switch ($act) {
			case "a":
					$foto='fotos'."/".$files['urlFoto']['name'];
					$sql="INSERT INTO profesores (APELLIDO, NOMBRE, CUIL, CARACTER, FIG_LABORAL, NIVEL, URLFOTO) VALUES ('$ape', '$nom', '$cuil', '$caracter', '$fig', '$niv', '$foto')";
					break;
			case "m":
					if ($existef)
						$foto='fotos'."/".$files['urlFoto']['name'];
					else
						$foto=$urlFotoGuardada;

					$sql="UPDATE profesores SET APELLIDO='$ape', NOMBRE='$nom', CUIL='$cuil', CARACTER='$caracter', FIG_LABORAL='$fig', NIVEL='$niv', URLFOTO='$foto' WHERE ID=$id";
					break;
			case "b":
					$sql="DELETE FROM profesores WHERE ID=$id";
					break;
			default:
					$sql="";
		}

		$ret=$this->ejecutarConsulta($sql);
		if (!$ret)
			$this->error=1;
		else
			$this->error=0;
		return $ret;
	}

	function stringConsultaTabla() {
		$sql="SELECT p.id, p.apellido, p.nombre, p.cuil, p.caracter, p.urlfoto FROM profesores p ";
		$sql=$sql." ORDER BY p.apellido, p.nombre ASC";
		return $sql;
	}

	function consultarTodo() {

		$sql="SELECT id, apellido, nombre, cuil, caracter, fig_laboral, nivel, urlfoto FROM profesores";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			while ($fila = mysqli_fetch_array($result)) {
				$vSalida[]=$fila;
			}
		return $vSalida;
	}

	function consultarRegistro($id) {

		$sql="SELECT id, apellido, nombre, cuil, caracter, fig_laboral, nivel, urlfoto FROM profesores WHERE ID=$id";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;

	}
	
}

?>

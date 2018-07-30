<?php
require_once 'BD_class_abstracta.php';

class BD_Materia extends BD_class_abstracta {

	 private $post;

	function setPost($v) {
		$this->post=$v;
	}

	function procesarPeticion() {

		$act=$this->post['act'];
		$id=$this->post['id'];
		$nom=$this->post['nombre'];
		$hss=$this->post['horas_semanales'];

		switch ($act) {
			case "a":
					$sql="INSERT INTO materias (NOMBRE, HORAS_SEMANALES) VALUES ('$nom', '$hss')";
					break;
			case "m":
					$sql="UPDATE materias SET NOMBRE='$nom', HORAS_SEMANALES='$hss' WHERE ID=$id";
					break;
			case "b":
					$sql="DELETE FROM materias WHERE ID=$id";
					break;
			default:
					$sql="";
		}

		$ret=$this->ejecutarConsulta($sql);
		
		return $ret;
	}

	function stringConsultaTabla() {
		$sql="SELECT materias.id, materias.nombre, materias.horas_semanales  FROM materias";
		$sql=$sql." ORDER BY materias.nombre ASC";
		return $sql;
	}

	function consultarTodo() {

		$sql="SELECT id, nombre, horas_semanales FROM materias";
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

		$sql="SELECT id, nombre, horas_semanales FROM materias WHERE ID=$id";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;

	}
	
}

?>

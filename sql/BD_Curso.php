<?php
require_once 'BD_class_abstracta.php';

class BD_Curso extends BD_class_abstracta {

	 private $post;

	function setPost($v) {
		$this->post=$v;
	}

	function procesarPeticion() {

		$act=$this->post['act'];
		$id=$this->post['id'];

		$anio=$this->post['selAnio'];
		$division=$this->post['selDivision'];
		$turno=$this->post['selTurno'];
		$modalidad=$this->post['selModalidad'];

		switch ($act) {
			case "a":
					$sql="INSERT INTO cursos (ANIO, DIVISION, TURNO, MODALIDAD) VALUES ('$anio', '$division', '$turno', '$modalidad')";
					break;
			case "m":
					$sql="UPDATE cursos SET ANIO='$anio', DIVISION='$division', TURNO='$turno', MODALIDAD='$modalidad' WHERE ID=$id";
					break;
			case "b":
					$sql="DELETE FROM cursos WHERE ID=$id";
					break;
			default:
					$sql="";
		}

		$ret=$this->ejecutarConsulta($sql);
		
		return $ret;
	}

	function stringConsultaTabla() {
		$sql="SELECT c.id, c.anio, c.division, c.turno, c.modalidad FROM cursos c";
		$sql=$sql." ORDER BY c.anio ASC, c.division ASC";
		return $sql;
	}

	function consultarTodo() {

		$sql="SELECT id, anio, division, turno, modalidad FROM cursos";
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

		$sql="SELECT id, anio, division, turno, modalidad FROM cursos WHERE ID=$id";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;

	}
	
}

?>

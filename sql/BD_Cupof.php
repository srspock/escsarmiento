<?php
require_once 'BD_class_abstracta.php';

class BD_Cupof extends BD_class_abstracta {

	 private $post;

	function setPost($v) {
		$this->post=$v;
	}

	function procesarPeticion() {

		$act=$this->post['act'];
		$id=$this->post['id'];
		$numero=$this->post['formNumero'];
		$idmateria=$this->post['selMateria'];
		$idcurso=$this->post['selCurso'];
		$horas=$this->post['formHoras'];

		switch ($act) {
			case "a":
					$sql="INSERT INTO cupof (NUMERO, ID_MATERIA, ID_CURSO, HORAS) VALUES ('$numero', '$idmateria', '$idcurso', '$horas')";
					break;
			case "m":
					$sql="UPDATE cupof SET NUMERO='$numero', ID_MATERIA='$idmateria', ID_CURSO='$idcurso', HORAS='$horas' WHERE ID=$id";
					break;
			case "b":
					$sql="DELETE FROM cupof WHERE ID=$id";
					break;
			default:
					$sql="";
		}

		$ret=$this->ejecutarConsulta($sql);
		
		return $ret;
	}

	function stringConsultaTabla() {
		$sql="SELECT cf.id, cf.numero, cf.id_materia, cf.id_curso, cf.horas, m.nombre as dmateria, c.anio as danio, c.division as ddivision FROM cupof cf, materias m, cursos c WHERE m.id = cf.id_materia AND c.id = cf.id_curso";
		$sql=$sql." ORDER BY cf.numero ASC, m.nombre ASC, danio ASC, ddivision ASC";
		return $sql;
	}

	function consultarTodo() {

		$sql="SELECT id, numero, id_materia, id_curso, horas FROM cupof";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			while ($fila = mysqli_fetch_array($result)) {
				$vSalida[]=$fila;
			}
		return $vSalida;
	}

	function consultarTodoConMateriaYCurso() {

		$sql=$this->stringConsultaTabla();
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

		$sql="SELECT id, numero, id_materia, id_curso, horas FROM cupof WHERE ID=$id";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;

	}

	function consultarRegistroPorCupof($valor) {

		$sql="SELECT cf.id, cf.numero, cf.id_materia, cf.id_curso, cf.horas, m.nombre as dmateria, c.anio as danio, c.division as ddivision FROM cupof cf, materias m, cursos c WHERE cf.id = $valor AND m.id = cf.id_materia AND c.id = cf.id_curso";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;
	}
	
}

?>

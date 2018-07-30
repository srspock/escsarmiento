<?php
require_once 'BD_class_abstracta.php';

class BD_Localidad extends BD_class_abstracta {

	 private $post;

	function setPost($v) {
		$this->post=$v;
	}

	function ejecutarAbm() {

		$act=$this->post['act'];
		$id=$this->post['id'];
		$nom=$this->post['nombre'];

		switch ($act) {
			case "a":
					$sql="INSERT INTO localidades (NOMBRE) VALUES ('$nom')";
					break;
			case "m":
					$sql="UPDATE localidades SET NOMBRE='$nom'  WHERE ID=$id";
					break;
			case "b":
					$sql="DELETE FROM localidades WHERE ID=$id";
					break;
			default:
					$sql="";
		}

		$ret=$this->ejecutarSql($sql);
		
		return $ret;
	}

	function stringConsultaTabla() {
		$sql="SELECT id, nombre FROM localidades";
		$sql=$sql." ORDER BY nombre ASC";
		return $sql;
	}

	function consultarTodo() {

		$sql="SELECT id, nombre FROM localidades";
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

		$sql="SELECT id, nombre FROM localidades WHERE ID=$id";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;

	}
	
}

?>

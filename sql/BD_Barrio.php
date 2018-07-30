<?php
require_once 'BD_class_abstracta.php';

class BD_Barrio extends BD_class_abstracta {

	 private $post;

	function setPost($v) {
		$this->post=$v;
	}

	function procesarPeticion() {

		$act=$this->post['act'];
		$id=$this->post['id'];
		$nom=$this->post['nombre'];
		$idloc=$this->post['sel_localidad'];

		switch ($act) {
			case "a":
					$sql="INSERT INTO barrios (NOMBRE,ID_LOCALIDAD) VALUES ('$nom', '$idloc')";
					break;
			case "m":
					$sql="UPDATE barrios SET NOMBRE='$nom',  ID_LOCALIDAD='$idloc' WHERE ID=$id";
					break;
			case "b":
					$sql="DELETE FROM barrios WHERE ID=$id";
					break;
			default:
					$sql="";
		}

		$ret=$this->ejecutarConsulta($sql);
		
		return $ret;
	}

	function stringConsultaTabla() {
		$sql="SELECT barrios.id, barrios.nombre, localidades.nombre as loc FROM barrios, localidades WHERE barrios.id_localidad = localidades.id";
		$sql=$sql." ORDER BY barrios.nombre ASC";
		return $sql;
	}

	function consultarTodo() {

		$sql="SELECT id, nombre, id_localidad FROM barrios";
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

		$sql="SELECT id, nombre, id_localidad FROM barrios WHERE ID=$id";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;

	}
	
}

?>

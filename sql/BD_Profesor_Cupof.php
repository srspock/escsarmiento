<?php
require_once 'BD_class_abstracta.php';

class BD_Profesor_Cupof extends BD_class_abstracta {

	 private $post;

	function setPost($v) {
		$this->post=$v;
	}

	function procesarPeticion() {

		$act=$this->post['act'];
		$id=$this->post['id'];

		$idprofesor=$this->post['selProfesor'];
		$idcupof=$this->post['selCupof'];
		$fechaAlta=$this->post['selAAalta']."-".$this->post['selMMalta']."-".$this->post['selDDalta'];
		$fechaBaja=$this->post['selAAbaja']."-".$this->post['selMMbaja']."-".$this->post['selDDbaja'];
		$tipoBaja=$this->post['selTipoBaja'];
		$conceptoBaja=$this->post['formConceptoBaja'];
		$instrumento=$this->post['selInstrumento'];
		$instrumentoNum=$this->post['formInstrumentoNum'];

		switch ($act) {
			case "a":
					$sql="INSERT INTO profesor_cupof (ID_PROFESOR, ID_CUPOF, FECHA_ALTA, FECHA_BAJA, TIPO_BAJA, CONCEPTO_BAJA, INSTRUMENTO, INSTRUMENTO_NUM) VALUES ('$idprofesor', '$idcupof', '$fechaAlta', '$fechaBaja', '$tipoBaja', '$conceptoBaja', '$instrumento', '$instrumentoNum')";
					break;
			case "m":
					$sql="UPDATE profesor_cupof SET ID_PROFESOR='$idprofesor', ID_CUPOF='$idcupof', FECHA_ALTA='$fechaAlta', FECHA_BAJA='$fechaBaja', TIPO_BAJA='$tipoBaja', CONCEPTO_BAJA='$conceptoBaja', INSTRUMENTO='$instrumento', INSTRUMENTO_NUM='$instrumentoNum'  WHERE ID=$id";
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
		$sql="SELECT pc.id, pc.id_profesor, pc.id_cupof, pc.fecha_alta, pc.fecha_baja, p.apellido, p.nombre FROM profesor_cupof pc, profesores p WHERE pc.id_profesor=p.id";
		$sql=$sql." ORDER BY p.apellido ASC, p.nombre ASC";
		return $sql;
	}

	function consultarTodo() {

		$sql="SELECT id, id_profesor, id_cupof, fecha_alta, fecha_baja, tipo_baja, concepto_baja, instrumento, instrumento_num FROM profesor_cupof";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			while ($fila = mysqli_fetch_array($result)) {
				$vSalida[]=$fila;
			}
		return $vSalida;
	}

	function leerCupofdeunProfesor($idprofesor) {

		$sql="SELECT pc.id, pc.id_profesor, pc.id_cupof, c.numero FROM profesor_cupof pc, cupof c WHERE pc.id_profesor = $idprofesor AND pc.id_cupof = c.id";
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

		$sql="SELECT id, id_profesor, id_cupof, fecha_alta, fecha_baja, tipo_baja, concepto_baja, instrumento, instrumento_num FROM profesor_cupof WHERE ID=$id";
		$result=$this->ejecutarConsulta($sql);
		$num=mysqli_num_rows($result);
		$vSalida=null;
		if ($num>0)
			$vSalida=mysqli_fetch_array($result);
        return $vSalida;

	}
	
}

?>

<?php
require_once $path_sql."BD_class_abstracta.php";

class BD_conexion extends BD_class_abstracta {

	function conectar() {
		$this->conectarDatabase();
	}

	function desconectar() {
		$this->desconectarDatabase();
	}

	function getConexion() {
		return $this->conexion;
	}

}
?>

<?php
class BD_class_abstracta {
        public $conexion;

	private $servidor = "localhost";
 	private $usuario = "root";
        private $clave = "sergio11";
        private $nombase = "escsarmiento";
/*
		private $servidor = "mysql.hostinger.com.ar	";
        private $usuario = "u373001709_root1";
        private $clave = "";
        private $nombase = "u373001709_bicho";
*/

/*
		private $servidor = "mysql13.000webhost.com	";
        private $usuario = "a8531066_root";
        private $clave = "maxtone81a";
        private $nombase = "a8531066_dogseek";
*/

/*
		private $servidor = "mysql.hostinger.es	";
        private $usuario = "u279376732_root";
        private $clave = "maxtone81a";
        private $nombase = "u279376732_dogse";
*/

		
		function conectarDatabase() {
			$this->conexion=new mysqli($this->servidor,  $this->usuario,  $this->clave,$this->nombase);

			/* Verificar la conexión */
			if (mysqli_connect_errno()) {
				printf("Conexión fallida: %s\n", mysqli_connect_error());
				exit();
			}
      }

		function desconectarDatabase() {
			$this->conexion->close();
		}

/*
		protected function ejecutarSql($comando) {
            $this->conectarDatabase();
            $ret=$this->conexion->query($comando);
            return $ret;
        }
*/
		protected function ejecutarConsulta($comando) {
			$this->conectarDatabase();
			$result=$this->conexion->query($comando);
			return $result;
		}

}
?>

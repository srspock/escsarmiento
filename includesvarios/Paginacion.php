<?php
class Paginacion {

	private $homeUrl;
	private $porPagina;
	private $conexion;
	private $consulta;
	private $cantRegistros;
	private $separacionLinks;

	function setHomeUrl ($valor) {
		$this->homeUrl=$valor;
	}
	function setPorPagina ($valor) {
		$this->porPagina=$valor;
	}
	function setConexion ($valor) {
		$this->conexion=$valor;
	}
	function setConsulta($valor) {
		$this->consulta=$valor;
	}
	function setSeparacionLinks($valor) {
		$this->separacionLinks=$valor;
	}
	function getResultado($page) {
		$per_page=$this->porPagina;
		$conex=$this->conexion;
		$consulta=$this->consulta;
		
		// Page will start from 0 and Multiple by Per Page
		$start_from = ($page - 1) * $per_page;

		//Selecting the data from table but with limit
		$query =  $consulta . " LIMIT $start_from, $per_page";
		$result = mysqli_query ($conex, $query);
		$cantidadRegistros=mysqli_num_rows($result);        /* Agregado por mi */
		if ($cantidadRegistros==0) {                        /* Modificado por mi */
			$this->cantRegistros=0;
			return false;
		} else {
			$i=-1;
			while ($r = mysqli_fetch_assoc($result)) {
				$i++;
				$array[$i]=$r;
			}
			$this->cantRegistros=$i + 1;   // Calcula la cantidad de registros leídos

			return $array;   // Devuelve un array que contiene otro array correspondiente a cada fila de registro leído
		}
	}
	function getCantRegistros() {
		return $this->cantRegistros;
	}
	function getStringEnlaces() {

		//Now select all from table
		$result = mysqli_query($this->conexion, $this->consulta);

		// Count the total records
		$total_records = $result->num_rows;

		//Using ceil function to divide the total records on per page
		$total_pages = ceil($total_records / $this->porPagina);

		$host=$_SERVER['HTTP_HOST'];
		$url=$_SERVER['REQUEST_URI'];

//		$dir=$this->homeUrl;
		$url="http://".$host.$url;
		$pos=strpos($url,"page=");
		if ($pos!="")
			$dir=substr($url,0,$pos-1);
		else
			$dir=$url;

		
		//Going to first page
		$stringEnlaces= "<center><a href='".$dir."&page=1'>"."Primera pagina"."</a> ".$this->separacionLinks;

		for ($i=1; $i<=$total_pages; $i++) {
			$stringEnlaces=$stringEnlaces."<a href='".$dir."&page=".$i."'>".$i."</a> ".$this->separacionLinks;
		}

		// Going to last page
		$stringEnlaces=$stringEnlaces."<a href='".$dir."&page=$total_pages'>"."Ultima pagina"."</a></center> ";

		return $stringEnlaces;
	}

}


?>
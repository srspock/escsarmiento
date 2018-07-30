<?php
if ((!isset($_SESSION['logueado']))||($_SESSION['logueado']!="si")) {
	die ("<BR><center>Debe ingresar por la p&aacute;gina principal</center><BR>");
}
?>

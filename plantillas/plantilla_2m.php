<table class="tablas">
<tr class="uno">
	<?php include ($path_includesvarios."cabecera.php"); ?>
</tr>
<tr>
	<td colspan=2 class="links">
		<!--<a href="./main.php?mod=bar" style="text-decoration:none"><font color="#000" face ="arial">Barrios</font></a>-->
		<nav class="navegacion">
			<ul class="menu">
				<li><a href="./main.php?mod=home">Inicio</a></li>
				<li><a href="">Archivos</a>
					<ul class = "submenu">
						<li><a href="./main.php?mod=car">Cargos</a></li>
						<li><a href="./main.php?mod=prof">Profesores</a></li>
						<li><a href="./main.php?mod=curs">Cursos</a></li>
						<li><a href="./main.php?mod=mat">Materias</a></li>
						<li><a href="./main.php?mod=cup">Cupof</a></li>
						<li><a href="./main.php?mod=pca">Profesor y sus cargos</a></li>
						<li><a href="./main.php?mod=pcu">Profesor y cupof</a></li>

					</ul>		
				</li>
				<li><a href=" ">Consultas</a>
					<ul class = "submenu2">
							<li><a href="./main.php?mod=cprof">Profesores</a></li>
						</ul>  
				</li>
				<li><a href=" ">Licencias</a>
					<ul class = "submenu2">
							<li><a href=" ">Inicio1</a></li>
							<li><a href=" ">Inicio2</a></li>
							<li><a href=" ">Inicio3</a></li>
						</ul>  
				</li>
				<li><a href=" ">Pases Alumnos</a></li>
				<li><a href=" ">Titulos</a></li>

			</ul>
			</nav>
	</td>
</tr>
<tr class="cuerpo">
	<td id="izquierda"><?php include ($contenido); ?></td>
	<td id="derecha"><?php include ($contenido_der); ?></td>
</tr>
<tr class="abajo">
	<?php include ($path_includesvarios."pie.php"); ?>
</tr>
</table>

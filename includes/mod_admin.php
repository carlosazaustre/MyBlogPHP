<h3 class="section"><?php echo "¡Hola <b>" . $_SESSION['$nombre'] . "</b>!"; ?></h3>
	<div class="module">
		<ul>
			<li><a href="cuenta.php">Mi Cuenta</a></li>
			<?php
				if(getPerfilUsuario($_SESSION['$nombre']) == 'autor')
				{
					echo "<li><a href=\"javascript:call('panel.php', 'main');\">Panel de Administración</a></li>";
				}
			?>
			<li><a href="logout.php">Cerrar Sesión</a></li>
		</ul>
	</div>
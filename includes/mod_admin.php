<h3 class="section"><?php echo "�Hola <b>" . $_SESSION['$nombre'] . "</b>!"; ?></h3>
	<div class="module">
		<ul>
			<li><a href="cuenta.php">Mi Cuenta</a></li>
			<?php
				if(getPerfilUsuario($_SESSION['$nombre']) == 'autor')
				{
					echo "<li><a href=\"javascript:call('panel.php', 'main');\">Panel de Administraci�n</a></li>";
				}
			?>
			<li><a href="logout.php">Cerrar Sesi�n</a></li>
		</ul>
	</div>
<h3 class="section">Meta</h3>
	<div class="module">
		<ul>
			<?php
				if ($_SESSION['$login'] == false)
				{
					echo "<li><a href=\"javascript:call('login.html', 'main');\">Login</a></li>";
				}
			?>
			<li><a href="javascript:call('formRegistro.php', 'main');">Registro</a></li>
		</ul>
	</div>
<h3 class="section">Autor</h3>
	<div class="module">
		<?php
			$autores = getPerfil();

			foreach ($autores as $autor)
			{
				echo "<p class='center'><img src='" . $autor->foto . "' alt='foto' title='" . $autor->alias . "' width='60' /></p>";
				echo "<ul class='perfil'>";
				echo "<li><b>Nombre:</b><br /> " . $autor->nombre . " " . $autor->apellidos . "</li>"; 
				echo "<li><b>email:</b><br /> ". $autor->email . "</li>";
				$fechaActual = date("Y-m-d");
				$fechaNacimiento =  $autor->fecha_nac;
				$edad = $fechaActual - $fechaNacimiento;
				echo "<li><b>Edad:</b> " . $edad . "</li>";
				echo "<li><b>Ciudad:</b> " . $autor->ciudad . "</li>";
				echo "</ul>";
			}
		?>
	</div>
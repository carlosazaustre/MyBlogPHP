<div>
<h2>Registro de nuevo usuario</h2>
	<p>Rellena el siguiente formulario para crear tu propia cuenta y poder comentar las entradas
	con tu nombre.</p>
	
	<form action="registro.php" method="post" enctype="multipart/form-data">
	<fieldset>
		<label for="alias">Alias: </label>
		<input type="text" name="alias" />
		<label for="pass">Contraseña: </label>
		<input type="password" name="pass" />
		<label for="nombre">Nombre: </label>
		<input type="text" name="nombre" size="40"/>
		<label for="apellidos">Apellidos: </label>
		<input type="text" name="apellidos" size="40"/>
		<br /><br />
		<label for="email">Correo electrónico: </label>
		<input type="text" name="email" />
		<label for="url">Web: </label>
		<input type="text" name="url" />
		<label for="fecha_nac">Fecha de Nacimiento: </label>
		<input type="text" name="fecha_nac" value="aaaa-mm-dd" />
		<label for="ciudad">Ciudad: </label>
		<input type="text" name="ciudad" />
		<label for="foto">Imagen para mostrar: </label>
		<input type="file" name="foto" />
		<br />
		<?php 
			$antispam = substr(md5(uniqid(rand())),0,6);
			echo "<label for='antispam'>Antispam: <b>".$antispam."</b></label>";
			echo "<span class='postbottom'>Introduzca los caracteres en la siguiente casilla</span>";
			echo "<input type='text' name='antispam' />";
			echo "<input type='hidden' name='antispam_gen' value='".$antispam."' />"; 
		?>
		<br/>
		<input type="submit" value="Registro" />		
	</fieldset>
	</form>
</div>
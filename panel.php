<?php include "includes/funciones.php"; ?>
<div>
<h2>Panel de Administración</h2>
	<br />
	<h3>Insertar nueva entrada</h3>
		<form action="insertarEntrada.php" method="post">
		<fieldset>
			<label for="titulo">Título:</label>
			<input name="titulo" type="text" size="52" />
			<label for="texto">Entrada:</label>
			<textarea name="texto" cols="40" rows="15"></textarea>
			<label for="tags">Etiquetas:</label>
			<?php
				$tags = getTagList();
				foreach ($tags as $tag)
				{
					echo "<input class='noblock' type='checkbox' name='tag[]' value='".$tag->nombre."' /><i>".$tag->nombre."</i>";
				}
			?>
			<br />
			<span class="postbottom">Elije una o varias etiquetas para esta entrada</span>
			<br />
			<br />
			<input type="submit" value="Crear Entrada" />
		</fieldset>
		</form>
		<br />
	<h3>Crear Etiquetas (Tags)</h3>
		<form action="crearTag.php" method="post">
		<fieldset>
			<label for="tag">Nombre etiqueta:</label>
			<input name="tag" type="text" />
			<label for="descripcion">Descripción:</label>
			<textarea name="descripcion" cols="40" rows="5"></textarea>
			<br />
			<br />
			<input type="submit" value="Crear Etiqueta" />
		</fieldset>
		</form>
	<h3>Administrar Entradas</h3>
		<br />
		<table>
			<tr>
				<th>Título entrada</th>
				<th>Fecha</th>
				<th>Autor</th>
				<th>Borrar</th>
				<th>Modificar</th>
			</tr>
		<?php
			$entradas = GetEntradas(null, null, null);
				foreach ($entradas as $post)
				{
					echo "<tr>";
					echo "<td><b>" . $post->titulo . "</b></td>";
					echo "<td>" . $post->fecha . "</td>";
					echo "<td>" . $post->autor . "</td>";
					echo "<td><a href='borrar.php?id=" . $post->id . "'>Borrar</a></td>";
					echo "<td><a href='modificar.php?id=" . $post->id . "'>Modificar</a></td>";
					echo "</tr>";
				}
		?>
		</table>
</div>
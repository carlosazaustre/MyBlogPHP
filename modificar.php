<?php
	session_start();
	include "includes/funciones.php";
	$tiempo = microtime();
	$tiempo = explode(" ", $tiempo);
	$tiempo = $tiempo[1] + $tiempo[0];
	$tiempoinicial = $tiempo;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo $tituloBlog ?></title>
		<link href="estilos/estilo.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<script language="JavaScript" type="text/javascript" src="scripts/ajax.js"></script>
	</head>
	<body>
		<div id="container">
			<?php include "includes/header.php"; ?>
			<div id="main">
				<div>
				<?php 
					$id = $_GET['id'];
					$entradas = GetEntradas($id, null, null);
					$post = $entradas[0];

					echo "<form action='modificarEntrada.php' method='post'>";
					echo "<fieldset>";
					echo "<input name='id' type='hidden' value='" . $post->id . "' />";
					echo "<label for='titulo'>Título:</label>";
					echo "<input name='titulo' type='text' size='52' value ='" . $post->titulo . "' />";
					echo "<label for='texto'>Entrada:</label>";
					echo "<textarea name='texto' cols='40' rows='15'>" . $post->texto . "</textarea>";
					echo "<label for='tags'>Etiquetas:</label>";
					$tags = getTagList();
					foreach ($tags as $tag)
					{
						echo "<input class='noblock' type='checkbox' name='tag[]' value='".$tag->nombre."' /><i>".$tag->nombre."</i>";
					}
					echo "<br /><span class='postbottom'>Inserta las etiquetas separadas por comas</span>";
					echo "<br /><br />";
					echo "<input type='submit' value='Modificar Entrada' />";
					echo "</fieldset>";
					echo "</form>";
				?>
				</div>
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>
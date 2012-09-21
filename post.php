<?php
	session_start();
	include 'includes/funciones.php';
	$tiempo = microtime();
	$tiempo = explode(" ", $tiempo);
	$tiempo = $tiempo[1] + $tiempo[0];
	$tiempoinicial = $tiempo;
	
	$id = $_GET["id"];
	$entradas = GetEntradas($id, null, null);
	foreach ($entradas as $post)
	{
		$tituloEntrada = $post->titulo;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo $tituloBlog." :: ".$tituloEntrada; ?></title>
		<link href="estilos/estilo.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<script language="JavaScript" type="text/javascript" src="scripts/ajax.js"></script>
	</head>
	<body>
		<div id="container">
			<?php include "includes/header.php"; ?>
			<div id="main">
				<?php 
				$id = $_GET["id"];
				$entradas = GetEntradas($id, null, null);
				
				foreach ($entradas as $post)
				{
					echo "<div class='post'>";
					echo "<h2><a href='post.php?id=" . $post->id . "' title='" . $post->titulo . "'>" . $post->titulo . "</a></h2>";
					
					$fechaTexto = getFecha($post->fecha);
					$tiempo = getHora($post->hora);
					$numComentarios = GetNumComentarios($post->id);
					
					echo "<span class='fecha'><img src='pics/date.png' alt='fecha' />" . $fechaTexto . " | ";
					echo "" . $tiempo . "</span>";
					echo "<p>" . $post->texto . "</p>";
					echo "<span class='postbottom'>";
					echo "Escrito por <b>" . $post->autor . "</b> | ";
					echo "<img src='pics/folder.png' alt='etiquetas' />Archivado en <a href='busqueda.php?tag=1' title='etiqueta'>etiqueta</a>";
					echo "</span>";
					echo "<br /><br />";
					echo "<h3>Comentarios (" .$numComentarios . "):</h3>";
					
					$comentarios = GetComentarios($id);
					
					foreach ($comentarios as $comment)
					{
						$imagen = getURLImagen($comment->autor);
						$webAutor = getURLautor($comment->autor);
		
						echo "<p><img class='comentario' src='" . $imagen . "' alt='". $comment->autor . "' width='50' />" . $comment->texto . "</p>";
						echo "<span class='fecha'>Escrito por: <b><a href='" .$webAutor. "'>" . $comment->autor . "</a></b> | ";
						echo getFecha($comment->fecha) . " | " . getHora($comment->hora) . "</span>";
						echo "<hr />";
					}
					echo "<h3>Escribe un comentario</h3>";
					echo "<form action='comentar.php' method='post' enctype='multipart/form-data'>";

					if($_SESSION['$login'] == true)
					{
						echo "<br /><span>Estás comentando como <b>" .$_SESSION['$nombre']. "</b></span><br />";
					}
					else
					{
						echo "<br /><span><a href=\"javascript:call('registro.html','main');\">Regístrate</a> para poder comentar con tu cuenta de usuario</span><br />";
						echo "<br /><label for='nombre'>Nombre:</label>";	
						echo "<input type='text' name='nombre' />";						
					}
					
					echo "<label for='comentario'>Comentario:</label>";
					echo "<textarea cols='37' rows='8' name='comentario'></textarea>";
					echo "<input type='hidden' name='idEntrada' value='" .$id. "' />";
					echo "<input type='reset' value='Reestablecer' />";
					echo "<input type='submit' value='Escribir Comentario' />";
					echo "</form>";
					
					echo "</div>";
				}
				?>										
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>
<?php
	session_start();
	include 'includes/funciones.php';
	$tiempo = microtime();
	$tiempo = explode(" ", $tiempo);
	$tiempo = $tiempo[1] + $tiempo[0];
	$tiempoinicial = $tiempo;
	
	$anho = $_GET['a'];
	$mes = $_GET['m'];
	if($mes < 10)
	{
		$mes = "0".$mes;
	}
	$mesLetra = MesLetra($mes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title><?php echo $tituloBlog." :: Archivo de ".$mesLetra." de ".$anho; ?></title>
		<link href="estilos/estilo.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="favicon.ico" />
		<script language="JavaScript" type="text/javascript" src="scripts/ajax.js"></script>
	</head>
	<body>
		<div id="container">
			<?php include "includes/header.php"; ?>
			<div id="main">
				<?php 
				$entradas = GetEntradasPorFecha($anho, $mes);
				
				if($entradas == null)
				{
					echo "<div><span class='mensaje'>No Hay entradas en el Blog para esa fecha</span></div>";
				}
				else
				{
					echo "<div><span class='mensaje'>Archivo de entradas con fecha: <b>".$mesLetra." de ".$anho."</b></span></div>";
				}
				
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
					echo "<img src='pics/comment.png' alt='comentarios' />";
					echo "<a href='post.php?id=" . $post->id . "'> " . $numComentarios . " comentarios</a> | ";
					
					
					$etiquetas = getTagsEntrada($post->id);
					if($etiquetas != null)
					{
						echo "<img src='pics/folder.png' alt='etiquetas' />Archivado en: ";
						foreach($etiquetas as $etiqueta)
						{
							echo "<a href='busqueda.php?tag=".$etiqueta."'>".$etiqueta."</a>";
						}
					}
					else
					{
						echo "Sin etiquetar";
					}
					
					echo "</span>";
					echo "<br />";
					echo "</div>";
				}
				?>										
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>
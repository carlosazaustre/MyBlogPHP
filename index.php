<?php
	session_start();
	include 'includes/funciones.php';
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
				<?php 
				$registros = 3; // 4 post por página
				$pagina = $_GET['p'];
				if (!$pagina) 
				{
					$inicio = 0;
					$pagina = 1;
				}
				else 
				{
					$inicio = ($pagina - 1) * $registros;
				} 
				
				//////////////////////////
				// Para paginar resultados 	//
				//////////////////////////
				$resultados = mysql_query("SELECT id FROM entradas");
				$total_registros = mysql_num_rows($resultados);
				$entradas = GetEntradas(null, $inicio, $registros);
				$total_paginas = ceil($total_registros/$registros);
				
				if($entradas == null)
				{
					echo "<div><span class='mensaje'>No Hay entradas en el Blog</span></div>";
				}
				
				////////////////////////////
				// Muestra los post, uno a uno //
				////////////////////////////
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
					
					/////////////////////////////////
					// Añade las etiquetas a la entrada  //
					////////////////////////////////
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
				
				///////////////////////////////////
				//Barra de navegación de paginación  //
				///////////////////////////////////
				echo "<div>";
				echo "<p class='paginacion'>";
				if(($pagina - 1) > 0) 
				{
					echo "<a href='index.php?p=".($pagina-1)."'>< Entradas Anteriores</a> "; 
				}
				for ($i=1; $i<=$total_paginas; $i++)
				{
					if ($pagina == $i) 
					{
						echo "<b>".$pagina."</b> ";
					}
					else
					{
						echo "<a href='index.php?p=$i'>$i</a> ";
					}
				}
				if(($pagina + 1)<=$total_paginas) 
				{
					echo " <a href='index.php?p=".($pagina+1)."'>Entradas Siguientes ></a>";
				}
				echo "</p>";
				echo "</div>";
				?>										
			</div>
			<?php include "includes/sidebar.php" ?>
			<?php include "includes/footer.php" ?>
		</div>
	</body>
</html>
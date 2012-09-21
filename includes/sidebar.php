<div id="sidebar">
	<?php 
		if($_SESSION['$login'] == true)
		{
			include "mod_admin.php";
		}
		else
		{
			include "mod_meta.php";
		}
		
		include "mod_perfil.php";
		include "mod_etiquetas.php"; 
		include "mod_archivo.php"; 
		include "mod_enlaces.php"; 
	?>
	<p class="center">	
	<img src="pics/rss.png" alt="rss" />
	</p>
	<p class="center">
	<a href="http://validator.w3.org/check?uri=referer" title="XHTML 1.0 Transitional Válido">
	<img src="pics/xhtml10.gif" alt="W3C XHTML Válido" /></a>
	</p>
	<p class="center">
	<a href="http://jigsaw.w3.org/css-validator/check/referer" title="CSS 2.1 Válido">
	<img src="pics/css.gif" alt="WC3 CSS Válido" /></a>
	</p>
</div>
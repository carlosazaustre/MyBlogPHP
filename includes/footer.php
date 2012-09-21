<div id="footer">
	<span class='smallfont'>
		<a href="" title="MyBlogLite v0.1">
		<img src="pics/myblog.png" alt="icono mybloglite" title="Powered by MyBlogLite" /></a>
		© 2009 <?php echo $autorBlog; ?> | Powered by 
		<a href="http://www.php.net" title="PHP">PHP</a> &amp; 
		<a href="http://www.mysql.org" title="MySQL">MySQL</a> | 
		<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/es/" title="Licencia Creative Commons 3.0">Licencia Creative Commons</a> |
		<?php
			$tiempo = microtime();
			$tiempo = explode(" ", $tiempo);
			$tiempo = $tiempo[1] + $tiempo[0];
			$tiempofinal = $tiempo;
			$tiempototal = ($tiempofinal - $tiempoinicial);
			$tiempototal = substr($tiempototal, 0, 6);
			echo "Página generada en " . $tiempototal . " seg.";
		?>
	</span>
</div>
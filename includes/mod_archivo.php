<h3 class="section">Archivo</h3>
	<div class="module">
	<ul>
	<?php
		for($a = 1901; $a < 2099; $a++)
		{
			if(hayEntradasAnho($a) > 0)
			{
				for($m = 1; $m < 13; $m++)
				{
					$num = hayEntradasMes($a, $m);
					if($num > 0)
					{
						$mes = MesLetra($m);
						echo "<li><a href='archivo.php?a=".$a."&m=".$m."'>".$mes." ".$a."</a> (".$num.")</li>";
					}
				}
			}
		}
	?>
	</ul>
	</div>
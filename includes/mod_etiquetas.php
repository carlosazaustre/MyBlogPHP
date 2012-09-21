<h3 class="section">Tags</h3>
	<div class="module">
		<ul class="etiqetas">
		<?php 
			$tags = getTagList();
			foreach ($tags as $tag)
			{
				$num = countTags($tag->nombre);
				echo "<li><a href='busqueda.php?tag=".$tag->nombre."' title='".$tag->descripcion."'>";
				echo $tag->nombre."</a> (".$num.")</li>";
			}
		?>
		</ul>
	</div>
<div class="container">
	<div class="row">
		<div class="col-md-6"><h1>liste des contrats</h1></div>
		<div class="col-md-6 go-down"><a class="pull-right" href="index.php?rt=Contrat/viewAdd">Ajouter Une Contrat</a></div>
	</div>
	<?php
		echo '<div class="row">';
		echo '<div class="list-group">';
		foreach ($files as $file) {
			echo "<a href='index.php?rt=Contrat/download&filename=$file->name' class='list-group-item'>";
			echo "<h4 class='list-group-item-heading'>$file->name</h4>";
			echo "<p class='list-group-item-text'>$file->size</p>";
			echo '</a>';
		}
		echo '</div>';
		echo '</div>';
	?>

</div>
<div class="container">
	<?php
		if(isset($errorUpload)){
			echo '<div class="alert alert-danger alert-dismissable"><ul>';
			echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&#x2716;</a>';
			foreach($errorUpload as $error){
				echo "<li>".$error."</li>";
			}
			echo '</ul></div>';
		}
	?>
	<form action="index.php?rt=contrat/uploadFile" method="POST" enctype="multipart/form-data">
		<input type="file" name="file" class="input-login-form" required>
		<input type="submit" class="input-login-form" >
	</form>
</div>
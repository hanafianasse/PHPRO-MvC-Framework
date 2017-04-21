<!DOCTYPE html>
<html>
<head>
	<title>change Password</title>
	<link rel="shortcut icon" href="asset/images/ibm.ico">
	<link rel="stylesheet" type="text/css" href="Style/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="hero-unit center">
						<h1>Récuperation du compte</h1>
						<br/>
						<p>Nouveau mot de passe</p>
					</div>
					<br/>
			</div>
		</div>
		<?php
			if(isset($message)){
				echo '<div class="col-md-6 col-md-offset-3">';
				echo '<div class="alert alert-danger alert-dismissable"><ul>';
				echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&#x2716;</a>';
				echo "<li>".$message."</li>";
				echo '</ul></div>';
				echo '</div>';
			}
		?>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form id="changingPassword" method="POST" action="index.php?rt=auth/setNewPassword">
					<div class="form-group">
						<label>Entrer le nouveau mot de passe</label>
						<input type="password" class="form-control" name="password1" placeholder="mot de passe" required>
					</div>
					<div class="form-group">
						<label>Confirmer le nouveau mote de passe</label>
						<input type="password" class="form-control" name="password2" placeholder="mote de passe" required>
					</div>
					<button type="submit" class="btn btn-success btn-block">Valider</button>
				</form>
			</div>
		</div>
	</div>
	<footer class="text-center footer">
		<hr/>
		<p>Author:
				<a href="https://github.com/hanafianasse" target="_blank">Anasse HANAFI</a>
		</p>
		<p>&copy; 2017</p>
</footer>
</body>
</html>
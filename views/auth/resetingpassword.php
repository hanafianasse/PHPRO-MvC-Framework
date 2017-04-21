<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
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
						<p>Entrez votre code</p>
					</div>
					<br/>
			</div>
		</div>
		<?php
			if(isset($wrongCode)){
				echo '<div class="alert alert-danger alert-dismissable"><ul>';
				echo '<a href="#" class="close" data-dismiss="alert" aria-label="close">&#x2716;</a>';
				echo "<li>".$wrongCode."</li>";
				echo '</ul></div>';
			}
		?>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<form method="POST" action="index.php?rt=auth/checkCode">
					<div class="form-group">
						<input type="text" class="form-control" name="code" placeholder="Code" required>
					</div>
					<button type="submit" class="btn btn-success btn-block">Envoyer le Code</button>
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
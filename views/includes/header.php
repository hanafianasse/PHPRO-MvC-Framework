<!DOCTYPE html>
<html>
	<head>
	<title>IBM - Contrat</title>
	<link rel="shortcut icon" href="asset/images/ibm.ico">
	<link rel="stylesheet" type="text/css" href="Style/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php?rt=accueil">IBM</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li id="onglet-1"><a href="index.php?rt=Adherent">Adhérents<span class="sr-only">(current)</span></a></li>
						<li id="onglet-2"><a href="index.php?rt=Contrat">Contrats</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $login ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Mon Profile</a></li>
								<li><a href="#">A propos</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="index.php?rt=auth/disconnect">Se déconnecter</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>


<script type="text/javascript">
	var selectOnglet1 = function(){
		document.getElementById("onglet-2").classList.remove("active");
		document.getElementById("onglet-1").classList.add("active");
	}

	var selectOnglet2 = function(){
		document.getElementById("onglet-2").classList.add("active");
		document.getElementById("onglet-1").classList.remove("active");
	}
</script>
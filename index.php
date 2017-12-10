<!DOCTYPE HTML>
<html lang="pl">
<?php
$user =  $_COOKIE['user'];
$czyzalogowano = $_COOKIE['czyzalogowano'];
?>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/z7/style.css"> <!-- Ścieżka do osobnego arksza stylów CSS.-->
<title>Piotr Grabowski zad7</title>
</head>
<body>
	<div id ="container">
		<div id="logo">
			<h1> Piotr Grabowski zad7 - dysk sieciowy </h1>
		</div>
		<div id="content">
		<?php
		if ($user!=null && $czyzalogowano==1) {
			header('Location: http://piotrg.gbzl.pl/z7/panel_uzytkownika/panel_uzytkownika.php'); //przejście do panelu, w którym wybieramy co chcemy dalej robić
			exit();	
		}
		else {
			echo '<a href="http://piotrg.gbzl.pl/z7/logowanie/logowanie.php" > Logowanie </a> <br>
				
				  <a href="http://piotrg.gbzl.pl/z7/rejestracja/rejestracja.php" > Rejestracja </a> <br>';
		}	
		?>
		</div>
	</div>




</body>

</html>


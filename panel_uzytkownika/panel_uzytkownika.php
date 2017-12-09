<!DOCTYPE HTML>
<html lang="pl">
<?php
$user =  $_COOKIE['user'];
$czyzalogowano = $_COOKIE['czyzalogowano'];
$sciezka_do_pliku = $_COOKIE['sciezka_do_pliku'];
?>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/z7/style.css"> <!-- Ścieżka do osobnego arksza stylów CSS.-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- Adres niezbędny do działania biblioteki JQuery.  -->
<title>Piotr Grabowski zad7</title>
</head>
<body>
	<div id ="container">
		
		<?php
		if ($user!=null && $czyzalogowano==1) 	{
			echo '<div id="logo">';
			echo "<h1> Witaj <u>$user</u> </h1>";
			echo '</div>';
			}
		?>
		<div id="content1">
			<?php 
			
			if ($user==null && $czyzalogowano==null) echo 'Wylogowano z serwisu.<br> <a href="http://piotrg.gbzl.pl/z7/logowanie/logowanie.php" >  Zaloguj się<a/> ponownie <a/>';
			
			if ($user!=null && $czyzalogowano==1) {
			
				
			
			echo
			'<table class="przyciski" "><tr class="przyciski"><td class="upload">
			<a href="http://piotrg.gbzl.pl/z7/logowanie/wyloguj.php"  >  Wyloguj<a/><br>
			</td>
			<td class="przyciski">
			<form method="post" action="dodaj_folder.php"><br>
			Dodaj nowy folder (Maksymalna długość nazwy to 255 znaków.)<br><textarea rows="1" cols="26" name="nazwa_folderu_do_utworzenia" maxlength="255" size="30" style="height:15px;" required></textarea><br> 
			<input type="submit" value="Utwórz nowy folder"/>
			</td>
			<td class="upload">
			
			<a href="http://piotrg.gbzl.pl/z7/panel_uzytkownika/dodaj_plik.html"  >  Dodaj plik<a/><br>(max 8MB)
			</td>
			</tr></table>';
			}
			
			?>
		</div>
		<div id="fileview">
			<?php 
			//echo '<a href="http://piotrg.gbzl.pl/z7/" >  Przejdź poziom wyżej<a/>';
			?>
			<script>
			$(document).ready(function(){ //Skrypt odpowiedzialny za przeładowanie div'a  co sekundę. 
			var refreshId = setInterval(function(){
			$("#fileview").load("pokaz_pliki.php"); //Załadowanie skryptu odpowiedzialnego za wyswietlanie plików
			}, 1000);
			});	
			</script>
		</div>
		
		
	</div>




</body>

<html/>


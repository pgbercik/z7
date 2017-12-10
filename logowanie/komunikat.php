<!DOCTYPE HTML>
<html lang="pl">
<head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head> 
<meta charset="utf-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- Adres niezbędny do działania biblioteki JQuery.  -->
<link rel="stylesheet" type="text/css" href="/z7/style.css"> <!-- Ścieżka do osobnego arksza stylów CSS.-->
<body> 
	<div id="container">
		<div id="content">
		<?php 
			$user = $_COOKIE['user']; // odczytywanie nazwy użytkownika z pliku cookie.
			$LicznikBlednychLogowan = $_COOKIE['LicznikBlednychLogowan']; // odczytywanie informacji o ilości błędnych logowań
			$ZleLogowanieData = $_COOKIE['ZleLogowanieData'];
			$sciezka_do_pliku = "/home/pgbercik/domains/piotrg.gbzl.pl/public_html/z7/dysk/".$user;
			$sciezka_do_pliku = urlencode($sciezka_do_pliku);
			if ($LicznikBlednychLogowan >= 3) {
						
						echo "Data ostatniego błędnego logowania to: <u>".$ZleLogowanieData."</u><br>";
						echo "Konto zostało odblokowane.  <br>";
						echo "Zalogowano jako ".$user;
						
					}
					else 
					{
						echo "Zalogowano jako <u><b>".$user."</b></u><br> Za chwilę nastąpi przekierowanie.";
						 
					}
			
			setcookie('sciezka_do_pliku', $sciezka_do_pliku, time() + (86400*30), "/"); //kasowanie pliku cookie
			setcookie('LicznikBlednychLogowan', $LicznikBlednychLogowan, time() + (-3600), "/"); //kasowanie pliku cookie
			setcookie('ZleLogowanieData', $ZleLogowanieData, time() + (-3600), "/");
		?> 
	
			<script type="text/javascript"> // skrypt opóźniający powrót do strony logowania o 2 sekundy
			window.setTimeout(function() {
				window.location.href='http://piotrg.gbzl.pl/z7/panel_uzytkownika/panel_uzytkownika.php';
			}, 2000);
		</script>
		</div> 
	</div> 

</body> 
</html> 
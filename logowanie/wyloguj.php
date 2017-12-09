<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl"> 
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
			echo "Wylogowano użytkownika <u>".$user."</u> z serwisu. <br> Za chwilę nastąpi automatyczne przekierowanie na stronę główną.";  
			setcookie('user', $user, time() + (-3600), "/"); // usuwanie pliku cookie z nazwą użytkownika
			setcookie('czyzalogowano', 0, time() + (-3600), "/"); 
			setcookie('sciezka_do_pliku', $sciezka_do_pliku,time() + (-3600), "/");
			$link = mysqli_connect(localhost,pgbercik_zad7,pgbercik6z7, pgbercik_zad7);
			mysqli_close($link);
		?> 
	
			<script type="text/javascript"> // skrypt opóźniający powrót do strony logowania o 2 sekundy
			window.setTimeout(function() {
				window.location.href='http://piotrg.gbzl.pl/z7';
			}, 1000);
		</script>
		</div> 
	</div> 

</body> 
</html> 
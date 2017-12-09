<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl"> 
<head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/z7/style.css"> <!-- Ścieżka do osobnego arkusza stylów CSS.--> 

</head> 
<body> 
<div id="container">
	<div id="content">
		<?php 
		  $datagodzina = date('Y:m:j H:i:s:A', time()); //pobieranie aktualnej daty i godziny
		  $user=$_POST['user'];                      // login  
		  $pass=$_POST['pass'];                      // hasło 
		  
		  $link = mysqli_connect(localhost,pgbercik_zad7,pgbercik6z7, pgbercik_zad7);           
		  if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }        
		  mysqli_query($link, "SET NAMES 'utf8'");                      // ustawienie polskich znaków 
		 
			$zapytanie = mysqli_query($link, "INSERT INTO users (user, pass) VALUES ('$user', '$pass');"); //dodawanie nowego użytkownika
			mysqli_query($link, "INSERT INTO pgbercik_zad7.logi ( logi.id,logi.DobreLogowanieData, logi.ZleLogowanieData, logi. LicznikBlednychLogowan) VALUES ((SELECT users.id FROM users WHERE users.user='$user' AND users.pass='$pass'),'0','0',0);"); //dodawanie pierwszego wpisu o użytkowniku do tabeli z logami
			
			//dodawanie katalogu użytkownika o takiej samej nazwie jak jego login
			$sciezka = "./../dysk/$user/"; // ścieżka do tworzonego folderu
			mkdir($sciezka, 0777, true); //polecenie tworzące folder
			
			if ($zapytanie  === false) echo "Wystąpił błąd przy dodawaniu użytkownika. Sprawdź dane.";  // jeśli zapytanie SQL dodające zwróci błąd, to wyświetlam odpowiedni komunikat
			if ($zapytanie  === true) {echo "Pomyślnie dodano użytkownika o danych: "; // komunikat po pomyślnym dodaniu użytkownika
			echo'<br>';
			echo "login: ".$user;
			echo'<br>';
			echo "hasło: ".$pass;
			echo'<br>';	
			}
			
		 
		?> 
		<br><a href="http://piotrg.gbzl.pl/z7/logowanie/logowanie.php"  > Powrót do formularza logowania <a/>
	</div>
</div>	
</body> 
</html> 
<!DOCTYPE HTML>
<html lang="pl">
<head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <link rel="stylesheet" type="text/css" href="/z7/style.css"> <!-- Ścieżka do osobnego arksza stylów CSS.-->
</head> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- Adres niezbędny do działania biblioteki JQuery.  -->
<body>
	<div id="container">
		<div id="content">
		<?php 
			$datagodzina = date('Y:m:j H:i:s:A', time()); //pobieranie aktualnej daty i godziny
			$user=$_POST['user'];                      // login z formularza 
			$pass=$_POST['pass'];                      // hasło z formularza 
			$link = mysqli_connect(localhost,pgbercik_zad7,pgbercik6z7, pgbercik_zad7);            // połączenie z BD – wpisać swoje parametry !!! 
			if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }        // obsługa błędu połączenia z BD 
			mysqli_query($link, "SET NAMES 'utf8'");                      // ustawienie polskich znaków 
		  
			
				$result = mysqli_query($link, "SELECT * FROM pgbercik_zad7.users WHERE user='$user';"); // pobranie z bazy danych z pracownikami wiersza z loginem
				
				
				
				//dokończyć logowanie, dodać wpsiy sql o błędnym logowaniu i ostatnie złe logoanie pobierane z bazy
		
			$rekord = mysqli_fetch_array($result);                  // wiersza z BD, struktura zmiennej jak w BD  
			$result1 = mysqli_query($link,"SELECT * FROM pgbercik_zad7.logi where id=(SELECT id FROM pgbercik_zad7.users WHERE user='$user');"); //pobranie wiersza ze statystykami logwania dla danego użytkownika
					while ($wiersz = mysqli_fetch_array ($result1)) {
						$DobreLogowanieData = $wiersz[DobreLogowanieData];
						$ZleLogowanieData = $wiersz[ZleLogowanieData];
						$LicznikBlednychLogowan = $wiersz[LicznikBlednychLogowan];
					}
			if(!$rekord)                        //Jeśli brak, to nie ma użytkownika o podanym loginie 
			{ 
			                      
			echo "Niepoprawne dane logowania !";               
			echo '<br><a href="http://piotrg.gbzl.pl/z7/logowanie/logowanie.php" > Powrót do strony logowania <a/>';
	
		   
			} 
			else 
			{                                                      
				if($rekord['pass']==$pass)                       // Sprawdzamy czy login zgadza się z tym z bazy danych 
				{ 

					$czyzalogowano=1;
					setcookie('user', $user, time() + (86400 * 30), "/"); // zapisywanie nazwy uzytkownika do pliku cookie widocznego w każdym folderze - decyduje o tym znaczek /
					setcookie('czyzalogowano', $czyzalogowano, time() + (86400 * 30), "/"); // plik cookie dający stronir informację czy klient się zalogował
					mysqli_query($link, "UPDATE pgbercik_zad7.logi SET DobreLogowanieData='$datagodzina' WHERE id=(SELECT id FROM pgbercik_zad7.users WHERE user='$user' AND pass='$pass');"); // dodawanie informaci o dacie i godzinie logowania prawidłowego
					mysqli_query($link, "UPDATE pgbercik_zad7.logi SET LicznikBlednychLogowan=0 WHERE id=(SELECT id FROM pgbercik_zad7.users WHERE user='$user' AND pass='$pass');"); // kasowanie licznika błędnych logowań
					setcookie('LicznikBlednychLogowan', $LicznikBlednychLogowan, time() + (86400 * 30), "/"); //dodawanie do cookie infirmacji o stanie licnika błędnych logowań
					setcookie('ZleLogowanieData', $ZleLogowanieData, time() + (86400 * 30), "/");
					header('Location: http://piotrg.gbzl.pl/z7/logowanie/komunikat.php'); //przejście do panelu, w którym wybieramy co chcemy dalej robić
					exit();	
					mysqli_close($link); 
				} 
				else    //czynności podejmowane, jeśli hasło jest błędne                      
				{
					
					if ( $LicznikBlednychLogowan >= 3) { //blokowanie konta
						echo 'Po 3 nieskutecznych próbach zalogowania konto zostało zablokowane.<br> <a href="http://piotrg.gbzl.pl/z7/logowanie/logowanie.php" > Zaloguj się <a/> ponownie, wprowadzając <b>prawidłowe</b> dane logowania, aby odblokować konto.';
					}
					else 
					{
						mysqli_query($link, "UPDATE pgbercik_zad7.logi SET logi.ZleLogowanieData='$datagodzina', LicznikBlednychLogowan=LicznikBlednychLogowan+1 WHERE id=(SELECT id FROM pgbercik_zad7.users WHERE user='$user');"); // dodawanie daty błędnego logowania i zwiększanie licznika błędnych logowań
						echo "Niepoprawne dane logowania !";  
						echo '<br><a href="http://piotrg.gbzl.pl/z7/logowanie/logowanie.php" > Powrót do strony logowania <a/>';
					
					}
					
					
				} 
			} 
		 mysqli_close($link);     
		?> 
		</div>
	</div>
</body> 
</html> 
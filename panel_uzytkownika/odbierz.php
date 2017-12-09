<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="/z7/style.css"> <!-- Ścieżka do osobnego arksza stylów CSS.-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- Adres niezbędny do działania biblioteki JQuery.  -->
<title>Piotr Grabowski zad7</title>
</head>
<body>
<div id ="container">
<div id ="content1">
<?php 
$sciezka_do_pliku = $_COOKIE['sciezka_do_pliku']; //pobieranie ścieżki do zapisu pliku z linka
$sciezka_do_pliku = urldecode($sciezka_do_pliku); // dekodowanie ścieżki 
?> 
<?php 
 $max_rozmiar = 8388608;

 if (is_uploaded_file($_FILES['plik']['tmp_name']))  
    {  
     if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar B"; } // komunikat pojawi się jeśłi chcemy wgrać większy plik niż 8 MB 
     else  
     {             echo 'Wgrano plik: '.$_FILES['plik']['name'].'<br/>'; // komunikat o pomyślnym wgraniu pliku
            move_uploaded_file($_FILES['plik']['tmp_name'],$sciezka_do_pliku."/".$_FILES['plik']['name']); 
    } 
    }   
 else {echo 'Błąd przy przesyłaniu danych!';} 
   
?> 

<br><br>Za 3 sekundy nastąpi automatyczne przejście do panelu klienta.
<script type="text/javascript"> // skrypt opóźniający powrót do strony logowania o 2 sekundy
			window.setTimeout(function() {
				window.location.href='http://piotrg.gbzl.pl/z7/panel_uzytkownika/panel_uzytkownika.php';
			}, 3000);
</script>
</div>
</div>

</body>

<html/>
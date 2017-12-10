<?php
$sciezka_do_pliku = $_COOKIE['sciezka_do_pliku']; //pobieranie zmiennej mówiącej gdzie mamy utworzyć plik
$sciezka_do_pliku = urldecode($sciezka_do_pliku);
echo $sciezka_do_pliku;
chdir("$sciezka_do_pliku"); //ustwianie katalogu głównego obecnego użytkownika
echo "<br>";
echo "Tu jestem ".getcwd();/**/
echo "<br>";
$nazwa_folderu_do_utworzenia = $_POST['nazwa_folderu_do_utworzenia'];// pobieranie nazwy folderu
echo $nazwa_folderu_do_utworzenia;
mkdir($nazwa_folderu_do_utworzenia, 0777, true); //tworzenie nowego folderu

header('Location: http://piotrg.gbzl.pl/z7/panel_uzytkownika/panel_uzytkownika.php'); //przejście do panelu, w którym wybieramy co chcemy dalej robić
exit();	


?>
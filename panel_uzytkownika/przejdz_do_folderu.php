<?php 
$sciezka_do_pliku = $_GET['sciezka_do_pliku']; //pobieranie folderu z linka
chdir("$sciezka_do_pliku"); //ustwianie katalogu głównego obecnego użytkownika
echo $sciezka_do_pliku."<br>";
$sciezka_do_pliku = urldecode($sciezka_do_pliku);  
setcookie('sciezka_do_pliku', $sciezka_do_pliku, time() + (86400*30), "/"); //kasowanie pliku cookie
echo $sciezka_do_pliku;
//echo getcwd(); 
header('Location: http://piotrg.gbzl.pl/z7/panel_uzytkownika/panel_uzytkownika.php'); //przejście do panelu, w którym wybieramy co chcemy dalej robić
exit();	
?>
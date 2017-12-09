<?php

$sciezka_do_pliku = $_COOKIE['sciezka_do_pliku'];
$sciezka_do_pliku=urldecode($sciezka_do_pliku); //dekodowanie informacji o ścieżce do pliku, wcześniej była zakodowana za pomocą urlencode(), aby można było obsługiaćpliki i katalogi ze spacjami w nazwie
chdir("$sciezka_do_pliku");


//$plik_zakodowany = $_GET["plik_zakodowany"];
$plik_do_pobrania = $_GET['plik_do_pobrania'];
$plik_do_pobrania = urldecode($plik_do_pobrania);  //dekodowanie nazwy pliku do pobrania



if (file_exists($plik_do_pobrania)) {
    header('Content-Description: File Transfer');
	header('Content-Disposition: attachment; filename="' . basename($plik_do_pobrania) . '"');
	header('Content-Transfer-Encoding: binary');
    header('Connection: Keep-Alive');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($plik_do_pobrania));
	
    readfile($plik_do_pobrania);
    exit;
}
?>
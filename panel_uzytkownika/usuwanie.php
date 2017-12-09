	<?php 
	$sciezka_do_pliku = $_COOKIE['sciezka_do_pliku']; //pobieranie ścieżki do zapisu pliku z linka
	$sciezka_do_pliku = urldecode($sciezka_do_pliku); // dekodowanie ścieżki */
	$plik_do_skasowania = $_GET['plik_do_skasowania'];
	$plik_do_skasowania = urldecode($plik_do_skasowania);
	echo $plik_do_skasowania.'<br>';
	echo $sciezka_do_pliku.'<br>';
	//echo "po zmianie katalogu<br>";
	chdir("$sciezka_do_pliku");

	if(!is_dir($plik_do_skasowania)) { //kasowanie pojdynczych plików
		echo "plik";
		unlink("$plik_do_skasowania");	
	}
	function kasujFolder($cala_sciezka) { //funkcja kasująca foldery wraz z podfolderami
	$macierz = glob($cala_sciezka . '/*');
	foreach ($macierz as $plik) {
		is_dir($plik) ? kasujFolder($plik) : unlink($plik);
	}
	rmdir($cala_sciezka);
	return;
}
	if( is_dir($plik_do_skasowania)) { //kasowanie folderów z plikami
		
		kasujFolder("$sciezka_do_pliku"."/".$plik_do_skasowania); // wywołanie funkcji kasującej foldery raz z podfolderami i zawartością
	}
	
	
	header('Location: http://piotrg.gbzl.pl/z7/panel_uzytkownika/panel_uzytkownika.php'); //powrót do panelu użytkownika
	exit();	
	?> 
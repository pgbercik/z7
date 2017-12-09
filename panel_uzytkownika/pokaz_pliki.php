<?php 
		
		$user =  $_COOKIE['user'];
		$czyzalogowano = $_COOKIE['czyzalogowano'];
		$sciezka_do_pliku = $_COOKIE['sciezka_do_pliku'];
		$sciezka_do_pliku = urldecode($sciezka_do_pliku);
		function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' B';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' B';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
		if ($user!=null && $czyzalogowano==1) {	
			//chdir("/home/pgbercik/domains/piotrg.gbzl.pl/public_html/z7/dysk/user1"); //ustwianie katalogu głównego obecnego użytkownika
			chdir("$sciezka_do_pliku"); //ustwianie katalogu głównego obecnego użytkownika
			
			echo "<b>Obecnie przeglądany katalog: </b>".substr("$sciezka_do_pliku", 57, 5000)."<br>";
			
			if(strcmp ( dirname($sciezka_do_pliku)."/" , "/home/pgbercik/domains/piotrg.gbzl.pl/public_html/z7/dysk/" )==0) ; //dzięki temu warunkowyżaden użytkownik nie może przeglądać zawartości katalogów pozostałych użytkowników - warunek ten sprawdza czy katalog nadrzędny do bieżącego to katalog, w którym znajduję się katalogi poszczególnych użytkowników - w takim przypadku nie wyświetlamy linku do katalogu nadrzędnego
			//if (urldecode($sciezka_do_pliku)=="/home/pgbercik/domains/piotrg.gbzl.pl/public_html/z7/dysk/".$user."/") ; 
			
			else echo "<a href="."http://piotrg.gbzl.pl/z7/panel_uzytkownika/przejdz_do_folderu.php?sciezka_do_pliku=".urlencode(dirname("$sciezka_do_pliku"))." >  Przejdź poziom wyżej <a/>"; // link odpowiedzialny za przechodzenie do katalogu o jeden poziom wyżej
			
			ob_start();
			echo "<br>";

			echo '<table>
			<tr>
				<th class="plik">Nazwa pliku</th>
				<th class="plik">Usuń</th>
				<th class="data">Rozmiar</th>
				<th class="data">Data utworzenia</th>
				
			</tr>';
			$macierz = glob("".'*', GLOB_BRACE);
			foreach($macierz as $plik_w_folderze) {
				$plik_zakodowany = urlencode($plik_w_folderze);
				//echo $plik_zakodowany;
				echo 
			'<tr><td class="plik">';
				if(is_dir($plik_w_folderze)) { //instrukcja sprawdzająca czy mamy do czynienia z plikiem czy folderem  - wdla plików generuje linki do pobrania, a dla folderów generuje linko do otwarcia folderu
				echo '<img src="/z7/img/folder.png" alt="$plik_w_folderze" height="15">';	//ikonka smbolizująca folder
				echo "<a href="."http://piotrg.gbzl.pl/z7/panel_uzytkownika/przejdz_do_folderu.php?sciezka_do_pliku=".urlencode(getcwd())."/".$plik_zakodowany."/"." >  $plik_w_folderze<a/>"; 
				}
				else {
				echo '<img src="/z7/img/file.png" alt="$plik_w_folderze" height="15">'; //ikonka smbolizująca plik
				echo "<a href="."http://piotrg.gbzl.pl/z7/panel_uzytkownika/pobierz.php?plik_do_pobrania=".$plik_zakodowany." >  $plik_w_folderze<a/>"; 
				}
				echo'</td>';		
				if(!is_dir($plik_w_folderze)) {echo '<td class="plik">'; echo "<a href="."http://piotrg.gbzl.pl/z7/panel_uzytkownika/usuwanie.php?plik_do_skasowania=".$plik_zakodowany." >  Usuń plik<a/>";  echo '</td>';} //link do usuwania pliku 
				else {echo '<td class="plik">'; echo "<a href="."http://piotrg.gbzl.pl/z7/panel_uzytkownika/usuwanie.php?plik_do_skasowania=".$plik_zakodowany." >  Usuń katalog<a/>";  echo '</td>';} //link do usuwania katalogu
				echo '<td class="data">'; if(!is_dir($plik_w_folderze)) echo formatSizeUnits(filesize($plik_w_folderze)); echo '</td>';// wyświetlanie rozmiaru pliku
				
				echo '<td class="data">'; echo date ("Y:m:d H:i:s:A", filemtime($plik_w_folderze)); echo '</td></tr>'; //wyświetlanie daty utworzenia pliku
				
				//echo $plik_w_folderze;
				//echo "<br>";
			}
			echo '</table>';
			ob_flush(); 
		}
		

?>
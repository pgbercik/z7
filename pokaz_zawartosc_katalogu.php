<?php
//$dir    = 'z_instrukcji/';
//$files1 = scandir($dir); //sortowanie w kolejności rosnącej
//$files2 = scandir($dir, 1); //sortowanie w kolejności malejącej

echo $datagodzina;
print_r($files1);
echo "<br>";
//print_r($files2);

 //wyświetlanie linków do otwarcia plików
$files = scandir('z_instrukcji/'); 

foreach($files as $file){ ?>
<a href="../z7/z_instrukcji/<?php echo $file; ?>"><?php echo $file; ?></a><br>
<?
}
?>




<?php

$names=array();
$filename="db/result-".$_POST['id'].".csv";

for ($x = 1; $x <= sizeof($_POST)-1; $x++) {
    array_push($names, $_POST[a.$x]);
}

$file = fopen($filename, "a+");
fwrite($file, "\n");
foreach ($names as $satir) {
    fwrite($file, $satir . ",");
}
fclose($file);

?>
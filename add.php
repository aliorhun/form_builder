<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/survey.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
//    $sql =<<<EOF
//    CREATE TABLE anketler
//    (ID INT PRIMARY KEY     NOT NULL AUTOINCREMENT,
//    ACAN           TEXT    NOT NULL,
//    ANKET            TEXT     NOT NULL,
//    MAIL        TEXT);
// EOF;

$anket=$_POST['sourcecode'];

$i=1;
$anket2="";
foreach (explode("\n", $anket) as $line) { 
  if(strpos($line, 'action=""') !== false){
    $line = str_replace('action=""', 'action="c.php"',$line);
  } 
  if(strpos($line, 'name=""') !== false){
     $line = str_replace('name=""', 'name="a'.$i.'"',$line);
     $i++;
  } 
  $anket2=$anket2."\n".$line;
}

$sql =<<<EOF
INSERT INTO anketler (USER,ANKET,MAIL)
VALUES ('ali','$anket2', 'ali@orhun.net' );
EOF;

$ret = $db->exec($sql);
if(!$ret){
   echo $db->lastErrorMsg();
} else {
   echo "Anket eklendi\n";
}

$db->close();

?>
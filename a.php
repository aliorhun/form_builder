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

$anket='
<form method="POST" action="" class="form-horizontal">
  <fieldset id="content_form_name">
    <legend>Form Name</legend>
  </fieldset>
  <div class="form-group">
    <label class="control-label col-sm-4" for="text_input">Text Input</label>
    <div class="controls col-sm-8">
      <input type="text" name="" id="text_input" placeholder="placeholder" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="select_multiple">Select - Multiple</label>
    <div class="controls col-sm-8">
      <select name="" class="form-control" id="select_multiple" multiple="multiple" size="3">
        <option value="1">Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="text_input">Text Input</label>
    <div class="controls col-sm-8">
      <input type="text" name="" id="text_input" placeholder="placeholder" class="form-control">
    </div>
  </div>
</form>

';

$sql =<<<EOF
INSERT INTO anketler (ACAN,ANKET,MAIL)
VALUES ('ali','$anket', 'ali@orhun.net' );
EOF;

$ret = $db->exec($sql);
if(!$ret){
   echo $db->lastErrorMsg();
} else {
   echo "Anket eklendi\n";
}
$db->close();

?>
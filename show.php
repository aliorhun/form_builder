<html>
    <head>
        <title>Form Builder</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/codemirror.css" rel="stylesheet">

        <link href="css/form_builder.css" rel="stylesheet">
    </head>
    <body>

    <?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/survey.db');
      }
   }
   $db = new MyDB();

$sql =<<<EOF
SELECT * from anketler where id=$_GET[id];
EOF;

$ret = $db->query($sql);

while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
  $anket01=$row['ANKET'];
  $anket01 = str_replace('<form method="POST" action="result.php" class="form-horizontal">', '<form method="POST" action="c.php" class="form-horizontal"><input type ="hidden" name="id" value="'.$_GET[id].'">',$anket01);
  echo $anket01;
}
$db->close();

?>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script src="js/form_builder.min.js"></script>

        <script src="js/codemirror.min.js"></script>
        <script src="js/formatting.js"></script>
    </body>
</html>
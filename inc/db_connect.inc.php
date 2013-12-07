<?
$database = mysql_connect("localhost", "pracownia", "#luserpracownia")
   or die("Nie mo¿na siê po³¹czyæ\n");

mysql_select_db("protetyka")
    or die ("Nie mozna wybraæ bazy danych");

define('DB_INIT_CODE_1', "SET NAMES latin2");
define('DB_INIT_CODE_2', "SET CHARACTER SET latin2");
define('DB_INIT_CODE_3', "SET COLLATION_CONNECTION='latin2_general_ci'");
mysql_query("SET NAMES latin2");
?>
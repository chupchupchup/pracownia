<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('../inc/db_connect.inc.php');
        $result = mysql_query($query);

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('../inc/db_close.inc.php');

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

  $D=date('j');
  if($D<10){
     $D='0'.$D;
  }

  $M=date('m');

  for ($i=1;$i<=12;$i++){
    if($M==$i){
       $M=$i;
    }
  }
  if($M<10){
     $M='0'.$M;
  }

  $Y=date('Y');
  $datazwrotu=$Y.'-'.$M.'-'.$D;
  //echo $datazwrotu;
	  //wyszukiwanie zlecen dopisanych ktore trzeba dzisiaj oddac
	  $sql="SELECT * FROM zlecenieinfo WHERE zwrotzleceniadata LIKE '".$datazwrotu."%' AND wpis<>'del' ORDER BY idzleceniapoz ASC";
	  $tablica_wynikow=myquery($sql);
?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />

        <!-- compliance patch for microsoft browsers -->
        <!--[if lt IE 7]>
            <link rel='stylesheet' type='text/css' href='tabs-ie.css' />
            <script src="./ie7/ie7-standard-p.js" type="text/javascript"></script>
        <![endif]-->

  <script type="text/javascript" src="../js/sorttable.js"></script>
<style>
  table td, table th {
    padding: 1px;
    border: solid 0px #a2a2a2;
    border-width: 0 0px 1px 0;
  }
</style>
</head>
<body>
     <table id="table2" class="sortable" cellspacing="0" cellpadding="2">
       <tr style="font-weight: bold;">
       <td NOWRAP ALIGN="left" VALIGN="center">NR&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center">ID ZLECENIA&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center">DATA WPISANIA&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center">ZWROT ZLECENIA&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center">PACJENT&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center">TECHNIK&nbsp;</td>
       <td ALIGN="left" VALIGN="center">INFO&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center">ETAP&nbsp;</td>
       </tr>
<?
     for($i=0;$i<mysql_numrows($tablica_wynikow);$i++) {
       $arr = mysql_fetch_array ($tablica_wynikow);
       
?>
       <tr>
       <td NOWRAP ALIGN="right" VALIGN="center"><? echo $arr["idzlecenianr"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["idzleceniapoz"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["datawpisania"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["zwrotzleceniadata"].', '.$arr["zwrotzleceniagodz"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["pacjent"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["pracownikid"] ?>&nbsp;</td>
       <td ALIGN="left" VALIGN="center">
<?
	  //wyszukiwanie szczegolow zlecenia z odpowiedniej tabeli zlecen dopisanych
	  $sql_pom="SELECT * FROM ".$arr[kategoria]." WHERE idzlecenianr='".$arr['idzlecenianr']."' AND idzleceniapoz='".$arr['idzleceniapoz']."' AND datawpisania='".$arr['datawpisania']."' ";
	  $tab_pom=myquery($sql_pom);
          $arr_pom = mysql_fetch_array($tab_pom);
          
          $info=$arr_pom[0];
          $size=(sizeof($arr_pom)/2); //na koncu bylo jeszcze -1
          for($j=5;$j<$size;$j++) {
              if($arr_pom[$j]!="" && $arr_pom[$j]!="0"){
                  $info=$info.', '.$arr_pom[$j];
              }
              else{
                  $info=$info;
              }
          }
          echo $info;
?>
       &nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["wpis"] ?>&nbsp;</td>
       </tr>
<?
     }
?>
     </table>
</body>
</html>
<?
}
else{
  header("Location: index.php");
}
?>

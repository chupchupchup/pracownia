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

         $lekarz=$_REQUEST['lekarz'];
         $datarozlicz=$_REQUEST['datarozlicz'];

	  //wyszukiwanie zlecen do rozliczenia lekarza
$sql="SELECT f.fv_nr,
       rz.idzlecenianr, rz.idzleceniapoz, rz.kwota, rz.wzk, rz.opiszlecenia, rz.zwrotzlecenia,
       z.pacjent
FROM rozlicz_zleceniodawca rz

LEFT JOIN (
 SELECT idzlecenianr,idzleceniapoz,pacjent FROM zlecenieinfo WHERE wpis = 'roz' OR wpis = 'zap'
) as z ON rz.idzlecenianr = z.idzlecenianr AND rz.idzleceniapoz = z.idzleceniapoz

LEFT JOIN (
 SELECT fv_nr,data_zaplaty FROM faktury WHERE data_zaplaty = '0000-00-00'
) as f ON rz.fv_nr = f.fv_nr

WHERE rz.roz_lek = 'tak' AND rz.idzleceniapoz LIKE '/".$lekarz."/%'
GROUP BY rz.idzlecenianr, rz.idzleceniapoz
ORDER by f.fv_nr";

//echo $sql.'<br>';

/*         $sql="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.zaplacono,rz.datazaplaty,rz.wzk,rz.opiszlecenia,z.pacjent,rz.zwrotzlecenia from zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr
         and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='".$datarozlicz."'
         and ( z.wpis='roz' OR z.wpis='zap') and rz.idzleceniapoz LIKE '/".$lekarz."/%'
         ORDER BY rz.idzlecenianr,rz.idzleceniapoz ";
*/

/*         $sql="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,kwota,zaplacono,datazaplaty,wzk,opiszlecenia,pacjent,zwrotzleceniadata
         from rozlicz_zleceniodawca rz inner join zlecenieinfo z on (rz.idzlecenianr=z.idzlecenianr AND rz.idzleceniapoz=z.idzleceniapoz)
         where rz.roz_lek='tak' and rz.datarozliczenia='0000-00-00' and ( z.wpis='roz' OR z.wpis='zap')
         and rz.idzleceniapoz LIKE '/".$lekarz."/%' GROUP BY rz.idzlecenianr,rz.idzleceniapoz";
*/
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
       <tr style="font-weight: bold;height:40px;">
       <td NOWRAP ALIGN="left" VALIGN="center">NR FV&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center">NR&nbsp;</td>
       <td NOWRAP ALIGN="center" VALIGN="center">ID ZLECENIA&nbsp;</td>
       <td NOWRAP ALIGN="center" VALIGN="center" style="width:100px;">DO ZAP£ATY&nbsp;</td>
<!--       <td NOWRAP ALIGN="center" VALIGN="center">ZAP£ACONO&nbsp;</td>
        <td NOWRAP ALIGN="center" VALIGN="center">DATA ZAP£ATY&nbsp;</td>
 -->
       <td NOWRAP ALIGN="center" VALIGN="center" style="width:100px;">WZ&nbsp;</td>
       <td NOWRAP ALIGN="center" VALIGN="center" style="width:100px;">ZWROT&nbsp;</td>
       <td NOWRAP ALIGN="center" VALIGN="center" style="width:100px;">PACJENT&nbsp;</td>
       <td ALIGN="left" VALIGN="center">INFO&nbsp;</td>
<!--        <td NOWRAP ALIGN="left" VALIGN="center">ETAP&nbsp;</td>
 -->
       </tr>
<?
     for($i=0;$i<mysql_numrows($tablica_wynikow);$i++) {
       $arr = mysql_fetch_array ($tablica_wynikow);

?>
       <tr style="height:30px;">
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["fv_nr"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="right" VALIGN="center" width="40px"><? echo $arr["idzlecenianr"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="left" VALIGN="center"><? echo $arr["idzleceniapoz"] ?>&nbsp;</td>
       <td NOWRAP ALIGN="center" VALIGN="center"><? echo $arr["kwota"].'<!--  z³ -->' ?></td>
<!--       <td NOWRAP ALIGN="center" VALIGN="center"><? echo $arr["zaplacono"].' z³' ?>&nbsp;</td>
        <td NOWRAP ALIGN="center" VALIGN="center"><? echo $arr["datazaplaty"] ?>&nbsp;</td>
 -->
       <td NOWRAP ALIGN="center" VALIGN="center"><? echo $arr["wzk"] ?>&nbsp;</td>
<?
	  //wyszukiwanie zlecen do rozliczenia lekarza
         $sqll="select zwrotzleceniadata from zlecenieinfo
         where idzlecenianr='".$arr['idzlecenianr']."' and idzleceniapoz='".$arr["idzleceniapoz"]."'
         and wpis!='del' ORDER BY idzlecenianr,idzleceniapoz ";
	 $wynik=myquery($sqll);

         $zwrotdata='0000-00-00';
         for($k=0;$k<mysql_numrows($wynik);$k++) {
           $arrr = mysql_fetch_array ($wynik);
           if($arrr['zwrotzleceniadata']>$zwrotdata){
             $zwrotdata=$arrr['zwrotzleceniadata'];
               //echo '&nbsp;&nbsp;&nbsp;'.$zwrotdata.'<br>';
           }
         }//echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$zwrotdata.'<br>';
?>
       <td NOWRAP ALIGN="center" VALIGN="center"><? echo $zwrotdata ?>&nbsp;</td>

       <td NOWRAP ALIGN="center" VALIGN="center"><? echo $arr['pacjent'] ?>&nbsp;</td>
       <td ALIGN="left" VALIGN="center" ><? echo $arr["opiszlecenia"] ?>&nbsp;</td>
       </tr>
<?
     }
?>
     </table>
<br />
<!-- 
<table cellspacing="0" cellpadding="2">
<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td>SUMA DO ZAP£ATY: </td>
    <td>&nbsp;&nbsp;<b><?=$_REQUEST['suma'];?> z³</b></td>
</tr>
<tr>
    <td>ZAP£ACONO: </td>
    <td>&nbsp;&nbsp;<b><?=$_REQUEST['zaplacone'];?> z³</b></td>
</tr>
</table>
 -->
</body>
</html>
<?
}
else{
  header("Location: index.php");
}
?>

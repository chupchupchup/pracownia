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
        //echo mysql_numrows($result).'<br>';
        return $result;
    }
//------------------------------------------------------------------------------------------------------------------
 $nr_zlec = $_REQUEST['nr_zlec'];
 $id_zlec = $_REQUEST['id_zlec'];
 $liczbatech=$_REQUEST['liczbatech'];
 $max_punkty = $_REQUEST['max_punkty'];

 $data = $_REQUEST['data'];//data wpisania zlecenia
 //$tabela = $_REQUEST['tabela'];
 $zwrotzlecenia = $_REQUEST['zwrotzleceniadata'];
// $nr_rozliczenia=$_REQUEST['nr_rozliczenia'];

?>
<html>
<HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />
</head>
 <body>
  <p style="font-size:20px;font-weight:800;margin-left:10px;float:left;">PODZIEL PUNKTY:  <b style="font-size:30px; color:#FF0000 ">[ <? echo $max_punkty;?> pkt. ]</b> &nbsp;&nbsp;</p>
  <br>
  <hr>

  <br>
  <hr>
   <table class="tab">
     <tr bgcolor="#D6D9FE" style="width:90%">

<?

          //tablica technikow
	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }

 if( isset($_REQUEST['dodaj'])=='tak' ){

  $punkty_suma=0;
     for($i=0;$i<$liczbatech;$i++) {
       $technik[$i] = $_REQUEST['technik'.$i];
       $punkty[$i] = $_REQUEST['punkty'.$i];
	   $punkty_suma = $punkty_suma + $_REQUEST['punkty'.$i];
       $czyrozlicz[$i] = 'tak';
     }
         if($punkty_suma==$max_punkty){
		   $punkty_ok='tak';
		 }
		 else{
		   $punkty_ok='nie';
?>		   <td style="font-size:14px;font-weight:800; width:100%; ">	
		     <a href="edytujrozliczenietech.php?id_zlec=<?= $id_zlec;?>&nr_zlec=<?= $nr_zlec;?>&punkty=<?= $max_punkty;?>&amp" target="_self" style="text-decoration:none; color:#FF0000; width:100%; "> NIEPRAWID£OWO ROZDZIELONA LICZBA PUNKTÓW <br> >>> powtórz wprowadzanie <<< </a>
		   </td></tr><tr bgcolor="#D6D9FE" style="width:90%">
<?
		 }

     for($i=0;$i<$liczbatech;$i++) {
       //echo $technik[$i].' - '.$punkty[$i].' - '.$czyrozlicz[$i].'<br />';


	  //wyszukiwanie czy zlecenie nie jest juz dopisane
	  $sql="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND technik='".$technik[$i]."' ";
	  $wynik=myquery($sql);
          $arr = mysql_fetch_assoc($wynik);
          $czyjuzzleceniewpisane = mysql_numrows($wynik);

       if($czyjuzzleceniewpisane==0 && $punkty_ok=='tak'){
		   //echo ' INSERT <br />';
           $sq="INSERT INTO rozlicz_technicy (idzlecenianr,idzleceniapoz,technik,punkty,roz_tech) VALUES  ( '".$nr_zlec."', '".$id_zlec."', '".$technik[$i]."', '".$punkty[$i]."', '".$czyrozlicz[$i]."' ) ";
           myquery($sq);

           //$sql="UPDATE zlecenieinfo SET wpis='roz' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND wpis!='del' ";
           //myquery($sql);
       }
       elseif($czyjuzzleceniewpisane!=0) {
         echo ' PUNKTY ZOSTA£Y JU¯ WCZE¦NIEJ ROZDZIELONE <br />';
         //$sq="UPDATE rozlicz_technicy SET punkty='".$punkty[$i]."', roz_tech='".$czyrozlicz[$i]."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND technik='".$technik[$i]."' ";
         //myquery($sq);
       }
     }

          //sprawdzenie jak sie dopisalo
	  $sql="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            echo '<td style="font-size:10px;font-weight:800;">'.$ar['technik'].', '.$ar['punkty'].' pkt,<br> rozliczanie - '.$ar['roz_tech'].'</td> ';
          }

 }
 
?>
  </tr>
  </table>
  
</body>
</html>
<?
}
else{
  header("Location: index.php");
}
?>

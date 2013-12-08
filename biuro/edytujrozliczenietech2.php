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
?>
<html>
<HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />
</head>
 <body>
  <p style="font-size:20px;font-weight:800;margin-left:10px;float:left;">ROZLICZANIE TECHNIKÓW </p>
    <button style="margin-left:100px;width:160px;height:25px;background-color:#E70000;color:#E8E8E8" type="button" onclick="javascript:window.opener='x';window.open('','_parent','');window.close();">
      <b>ZAMKNIJ STRONĘ</b>
    </button>

  <br>
  <hr>
   <table class="tab">
     <tr bgcolor="#D6D9FE" style="width:90%">

<?
 $data = $_REQUEST['data'];//data wpisania zlecenia
 $nr_zlec = $_REQUEST['nr_zlec'];
 $id_zlec = $_REQUEST['id_zlec'];
 //$tabela = $_REQUEST['tabela'];
 $zwrotzlecenia = $_REQUEST['zwrotzleceniadata'];
 $liczbatech=$_REQUEST['liczbatech'];
// $nr_rozliczenia=$_REQUEST['nr_rozliczenia'];

          //tablica technikow
	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }

 if( isset($_REQUEST['dodaj'])=='tak' ){

     for($i=0;$i<$liczbatech;$i++) {
       $technik[$i] = $_REQUEST['technik'.$i];
       $punkty[$i] = $_REQUEST['punkty'.$i];
       $czyrozlicz[$i] = $_REQUEST['czyrozlicz'.$i];
     }

     for($i=0;$i<$liczbatech;$i++) {
       //echo $technik[$i].' - '.$punkty[$i].' - '.$czyrozlicz[$i].'<br />';


	  //wyszukiwanie czy zlecenie nie jest juz dopisane
	  $sql="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND technik='".$technik[$i]."' ";
	  $wynik=myquery($sql);
          $arr = mysql_fetch_assoc($wynik);
          $czyjuzzleceniewpisane = mysql_numrows($wynik);

       if($czyjuzzleceniewpisane==0){
         //echo ' INSERT <br />';
         $sq="INSERT INTO rozlicz_technicy (idzlecenianr,idzleceniapoz,technik,punkty,roz_tech) VALUES  ( '".$nr_zlec."', '".$id_zlec."', '".$technik[$i]."', '".$punkty[$i]."', '".$czyrozlicz[$i]."' ) ";
         myquery($sq);

         $sql="UPDATE zlecenieinfo SET wpis='roz' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND wpis!='del' ";
         myquery($sql);
       }
       else {
         //echo ' UPDATE <br />';
         $sq="UPDATE rozlicz_technicy SET punkty='".$punkty[$i]."', roz_tech='".$czyrozlicz[$i]."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND technik='".$technik[$i]."' ";
         myquery($sq);
       }
     }

          //sprawdzenie jak sie dopisalo
	  $sql="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            echo '<td style="font-size:10px;font-weight:800;">'.$ar['technik'].', '.$ar['punkty'].' pkt,<br> rozliczanie - '.$ar['roz_tech'].'</td> ';
          }

 }
 
 elseif( isset($_REQUEST['update'])=='tak' ){

       $technik = $_REQUEST['technik'];
       $punkty = $_REQUEST['punkty'];
       $czyrozlicz = $_REQUEST['czyrozlicz'];

       if($czyrozlicz!='usun'){
         //echo ' UPDATE 2 <br />';
         $sq="UPDATE rozlicz_technicy SET punkty='".$punkty."', roz_tech='".$czyrozlicz."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND technik='".$technik."' ";
         myquery($sq);
       }
       elseif($czyrozlicz=='usun'){
	 $sq="DELETE FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND technik='".$technik."' ";
         myquery($sq);
       }

          //sprawdzenie jak sie dopisalo
	  $sql="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            echo '<td style="font-size:10px;font-weight:800;">'.$ar['technik'].', '.$ar['punkty'].' pkt,<br> rozliczanie - '.$ar['roz_tech'].'</td> ';
          }
 }

 elseif( isset($_REQUEST['aktualizuj'])=='tak' ){

          //sprawdzenie dospianych technikow
	  $sql="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            echo '<td style="font-size:10px;font-weight:800;">'.$ar['technik'].', '.$ar['punkty'].' pkt,<br> rozliczanie - '.$ar['roz_tech'].'</td> ';
          }
 }

?>
  </tr>
  </table>
  
  <form name="form1" method="post" action="edytujrozliczenietech2.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="data" value="<? echo $data;?>" >
   <input type="hidden" name="nr_zlec" value="<? echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<? echo $id_zlec;?>" >

   <input type="hidden" name="zwrotzleceniadata" value="<? echo $zwrotzlecenia;?>" >
   <input type="hidden" name="update" value="tak" >

<hr>
<br>
   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1">
        <tr bgcolor="#D6D9FE">
          <td>
            <select name='technik' style="float:right;font-size:14px;font-weight:800;">
<?              for($i=0;$i<sizeof($technicy);$i++) {
?>                  <option><?=$technicy[$i]?></option>
<?              }
?>          </select>
          </td>
          <td>&nbsp;- WYBIERZ TECHNIKA
          </td>
        </tr>
        <tr bgcolor="#D6D9FE">
       <td><input type="text" name="punkty" value="" style="float:right;width:80px;font-size:14px;font-weight:800;"></td>
       <td>&nbsp; - PUNKTY</td>
     </tr>
        <tr bgcolor="#D6D9FE">
       <td>
         <select name="czyrozlicz" style="float:right;font-size:14px;font-weight:800;">
           <option selected>tak</option>
           <option>nie</option>
           <option>nie_rozliczac</option>
           <option>usun</option>
       </select>
       </td>
       <td>&nbsp; - CZY ROZLICZAĆ ZLECENIE</td>
     </tr>
     <tr><td><br></td></tr>
   </table>

   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1" align="left">
     <tr>
       <td><input type="submit" name="Submit" value="AKCEPTUJ" style="margin-top:5px;width:160px;height:25px;background-color:#CCFF99;" >
       <td><input type="reset" name="RESET" value="WYCZYŚĆ" style="margin-top:5px;width:160px;height:25px;background-color:#E70000;color:#E8E8E8;" >
     </tr>
   </table>
</form>
</body>
</html>
<?
}
else{
  header("Location: index.php");
}
?>

<?php
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

// $data = $_REQUEST['data'];//data wpisania zlecenia
 $nr_zlec = $_REQUEST['nr_zlec'];
 $id_zlec = $_REQUEST['id_zlec'];
 $kwota = $_REQUEST['kwota'];
 //$nr_rozl = $_REQUEST['nr_rozl'];
// $tabela = $_REQUEST['tabela'];

	  $sql="SELECT zaplacono,datazaplaty FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
                 $zaplacono=$ar['zaplacono'];
                 $datazaplaty=$ar['datazaplaty'];
          }
          if($datazaplaty=='' || !isset($datazaplaty) || $datazaplaty=='0000-00-00'){
               $D=date('j'); if($D<10){ $D='0'.$D; }
               $M=date('m');
               $Y=date('Y');
               $datazaplaty=$Y.'-'.$M.'-'.$D;
          }


          if( $zaplacono==0 || !isset($zaplacono) ){
            $zaplacono=$kwota;
          }


 if( isset($_REQUEST['zmien'])=='tak' ){

     if( $_SESSION['dostep']=='boss' ){
       $zaplacono = $_REQUEST['zaplacono'];
       $datazaplaty = $_REQUEST['datazaplaty'];

         $sq="UPDATE rozlicz_zleceniodawca SET zaplacono='".$zaplacono."', datazaplaty='".$datazaplaty."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
         myquery($sq);

         $sqq="UPDATE zlecenieinfo SET wpis='zap' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND wpis!='del' ";
         myquery($sqq);

          //sprawdzenie jak sie dopisalo
	  $sql="SELECT zaplacono,datazaplaty FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
                 echo 'Zaplacono - '.$ar['zaplacono'].'z³, dnia: '.$ar['datazaplaty'].'<br />';
          }
     }
     else{
         echo 'BRAK UPRAWNIEÑ DO UZUPE£NIANIA ROZLICZENIA - UPRAWNIENIA POSIADA SZEF';
     }

 }

?>
<html>
<HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
 <body bgcolor="#F4FFF0">
  <p><strong><u class="style2">ZAP£ACONO:</u></strong></p>
  <br>
  <form name="form" method="post" action="zaplacono_lek.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->

   <input type="hidden" name="nr_zlec" value="<?php echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<?php echo $id_zlec;?>" >

   <input type="hidden" name="zmien" value="tak" >

<hr>
   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1">
        <tr>
          <td width="150px;">
            <input name='zaplacono' size='10' maxlength='50' value='<?php=$zaplacono?>'/> Z£
          </td>
          <td><strong>&nbsp;- WP£ATA LEKARZA</strong>
          </td>
        </tr>
     <tr><td><br></td></tr>
        <tr>
          <td width="150px;">
            <input name='datazaplaty' size='10' maxlength='50' value='<?php=$datazaplaty?>'/>
          </td>
          <td><strong>&nbsp;- DATA WP£ATY</strong>
          </td>
        </tr>
   </table>

<hr>
   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1" align="left">
     <tr>
       <td><input type="submit" name="Submit" value="AKCEPTUJ">&nbsp;&nbsp;</td>
       <td><input type="reset" name="RESET" value="WYCZY¦Æ"></td>
     </tr>
   </table>
</form>
</body>
</html>
<?php

}
else{
  header("Location: index.php");
}
?>

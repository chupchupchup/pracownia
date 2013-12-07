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
 //$nr_rozliczenia = $_REQUEST['nr_rozliczenia'];
         // echo $nr_rozliczenia.'-nr<br>';
// $tabela = $_REQUEST['tabela'];

	  $sql="SELECT datarozliczenia FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $w=myquery($sql); $a = mysql_fetch_assoc($w);
          $dataarchiw=$a['datarozliczenia'];
          //echo $dataarchiw.'---<br>';

 if( isset($_REQUEST['zmien'])=='tak' ){

       $dataarchiw=$_REQUEST['dataarchiw'];
       $czyrozlicz = $_REQUEST['czyrozlicz'];

       $lekarz = explode('/', $id_zlec);

       if($dataarchiw<>"0000-00-00"){
           $s="SELECT datarozliczenia FROM archiwum_rozliczen WHERE idrozliczanego='".$lekarz[1]."' AND datarozliczenia='".$dataarchiw."' ";
           $r=myquery($s);
           if(mysql_num_rows($r) == 1){
               //ok
           }
           else{
             echo 'b��dnie wpisana data '.$dataarchiw.', nie ma rozliczenia lekarza z t� dat�<br />';
             $dataarchiw="0000-00-00";
           }

       }

         //echo ' UPDATE 4 <br />';
         $sq="UPDATE rozlicz_zleceniodawca SET roz_lek='".$czyrozlicz."',datarozliczenia='".$dataarchiw."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
         myquery($sq);

          //sprawdzenie jak sie dopisalo
	  $sql="SELECT roz_lek FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
                 echo 'NOWY STATUS ROZLICZANIA - '.$ar['roz_lek'].'<br />';
          }
 }

?>
<html>
<HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
 <body bgcolor="#F4FFF0">
  <p><strong><u class="style2">DODAJ LUB USU� Z ROZLICZENIA:</u></strong></p>
  <br>
  <form name="form" method="post" action="czyrozlicz_lek.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="nr_zlec" value="<?php echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<?php echo $id_zlec;?>" >
   <input type="hidden" name="zmien" value="tak" >

<hr>
   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1">
        <tr>
          <td width="30%">
            <select name='czyrozlicz' >
              <option>tak</option>
              <option>nie</option>
              <option>nie_rozliczac</option>
            </select>
          </td>
          <td><strong>&nbsp;- WYBIERZ CZY ZLECENIE MA BY� ROZLICZONE LEKARZOWI</strong>
          </td>
        </tr>
     <tr><td><br></td></tr>
        <tr>
          <td>
          <input type="text" style="width:100px;" name="dataarchiw" value="<?php=$dataarchiw;?>" />
          </td>
          <td><strong>&nbsp;- WPISZ DAT� ARCHIWUM DO KT�REGO CHCESZ PRZENIE�� ZLECENIE</strong>
          </td>
        </tr>
     <tr><td><br></td></tr>
   </table>

<hr>
   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1" align="left">
     <tr>
       <td><input type="submit" name="Submit" value="ZMIE�">&nbsp;&nbsp;</td>
       <td><input type="reset" name="RESET" value="WYCZY��"></td>
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

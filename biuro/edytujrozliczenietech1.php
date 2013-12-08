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

 $data = $_REQUEST['data'];//data wpisania zlecenia
 $nr_zlec = $_REQUEST['nr_zlec'];
 $id_zlec = $_REQUEST['id_zlec'];
 //$tabela = $_REQUEST['tabela'];
 $zwrotzlecenia = $_REQUEST['zwrotzleceniadata'];
 $liczbatech=$_REQUEST['liczbatech'];
 //$nr_rozliczenia=$_REQUEST['nr_rozliczenia'];
 $technik_prowadzacy = $_REQUEST['technik_prowadzacy'];

//echo $liczbatech.' zrobic petle dla takiej liczby technikow<br />';

          //tablica technikow
	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }

?>
<html>
<HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />
</head>
 <body>
  <p style="font-size:20px;font-weight:800;margin-left:10px;float:left;">ROZLICZANIE TECHNIKÓW </p>
    <button style="margin-left:100px;width:160px;height:25px;background-color:#E70000;color:#E8E8E8" type="button" onclick="javascript:window.opener='x';window.open('','_parent','');window.close();">
      <b>ZAMKNIJ STRONÊ</b>
    </button>

  <br>
  <hr>

  <form name="form1" method="post" action="edytujrozliczenietech2.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="data" value="<?php echo $data;?>" >
   <input type="hidden" name="nr_zlec" value="<?php echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<?php echo $id_zlec;?>" >
   <input type="hidden" name="zwrotzleceniadata" value="<?php echo $zwrotzlecenia;?>" >
   <input type="hidden" name="liczbatech" value="<?php echo $liczbatech;?>" >
   <input type="hidden" name="dodaj" value="tak" >

<?php for($j=0;$j<$liczbatech;$j++) {
    //echo $liczbatech.' - '.$j.'<br>';
?>

   <table class="tab">
        <tr bgcolor="#D6D9FE">
          <td>
            <select name='technik<?php=$j?>' style="float:right;font-size:14px;font-weight:800;">
<?php              for($i=0;$i<sizeof($technicy);$i++) {
                  if($technicy[$i]==$technik_prowadzacy){
?>                    <option selected><?php=$technicy[$i]?></option>
<?php                }
                  else {
?>                  <option><?php=$technicy[$i]?></option>
<?php                }
                }
?>          </select>
          </td>
          <td>&nbsp;- WYBIERZ TECHNIKA
          </td>
        </tr>
     <tr bgcolor="#D6D9FE">
       <td><input type="text" name="punkty<?php=$j?>" value="" style="float:right;width:80px;font-size:14px;font-weight:800;"></td>
       <td>&nbsp; - PUNKTY</td>
     </tr>
     <tr bgcolor="#D6D9FE">
       <td>
         <select name="czyrozlicz<?php=$j?>" style="float:right;font-size:14px;font-weight:800;">
<?php        if($arr['roz_lek']=='tak'){
?>         <option selected>tak</option>
           <option>nie</option>
           <option>nie_rozliczac</option>
<?php         }
           elseif($arr['roz_lek']=='nie'){
?>         <option selected>tak</option>
           <option selected>nie</option>
           <option>nie_rozliczac</option>
<?php         }
           elseif($arr['roz_lek']=='nie_rozliczac'){
?>         <option>tak</option>
           <option>nie</option>
           <option selected>nie_rozliczac</option>
<?php         }
           else{
?>         <option>tak</option>
           <option>nie</option>
           <option>nie_rozliczac</option>
<?php         }
?>       </select>
       </td>
       <td>&nbsp; - CZY ROZLICZAÆ ZLECENIE</td>
     </tr>
     <tr><td><br></td></tr>
   </table>
<?php
 }
?>

   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1" align="left">
     <tr>
       <td><input type="submit" name="Submit" value="AKCEPTUJ" style="margin-top:5px;width:160px;height:25px;background-color:#CCFF99;" >
       <td><input type="reset" name="RESET" value="WYCZY¦Æ" style="margin-top:5px;width:160px;height:25px;background-color:#E70000;color:#E8E8E8;" >
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

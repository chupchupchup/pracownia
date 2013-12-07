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
 $tabela = $_REQUEST['tabela'];
 $zwrotzlecenia = $_REQUEST['zwrotzleceniadata'];
 $technik_prowadzacy = $_REQUEST['technik_prowadzacy'];
 //$liczbatech=$_REQUEST['liczbatech'];
 //$nr_rozliczenia = $_REQUEST['nr_rozliczenia'];
 
?>
<html>
<HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />


<style type="text/css">
form {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; text-decoration: none;
	border: 0px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

</style>

</head>
 <body>
  <p style="font-size:20px;font-weight:800;margin-left:10px;float:left;">ROZLICZANIE TECHNIK�W </p>

    <button style="margin-left:100px;width:160px;height:25px;background-color:#E70000;color:#E8E8E8" type="button" onclick="javascript:window.opener='x';window.open('','_parent','');window.close();">
      <b>ZAMKNIJ STRON�</b>
    </button>

  <hr>
  <br>

  <form name="form1" method="post" action="edytujrozliczenietech1.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="data" value="<?php echo $data;?>" >
   <input type="hidden" name="nr_zlec" value="<?php echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<?php echo $id_zlec;?>" >
   <input type="hidden" name="tabela" value="<?php echo $tabela;?>" >
   <input type="hidden" name="zwrotzleceniadata" value="<?php echo $zwrotzlecenia;?>" >
   <input type="hidden" name="technik_prowadzacy" value="<?php echo $technik_prowadzacy;?>" >

   <table class="tab">
     <tr bgcolor="#D6D9FE">
       <td>
         OKRE�L LICZB� TECHNIK�W DO ROZLICZENIA:
       </td>
       <td style="width:100px;">
         <select name="liczbatech" style="margin-left:20px;width:60px;font-size:22px;">
           <option>1</option>
           <option>2</option>
           <option>3</option>
           <option>4</option>
           <option>5</option>
           <option>6</option>
         </select>
       </td>
     </tr>
     <tr>
       <td><input type="submit" name="Submit" value="AKCEPTUJ" style="margin-top:5px;width:160px;height:25px;background-color:#CCFF99;" >
       </td>
     </tr>
   </table>
</form>
<div>
<br>
<hr style="height:4px;background-color:black;">
<br>
  <form name="form2" style="float:left;"  method="post" action="edytujrozliczenietech2.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="data" value="<?php echo $data;?>" >
   <input type="hidden" name="nr_zlec" value="<?php echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<?php echo $id_zlec;?>" >
   <input type="hidden" name="tabela" value="<?php echo $tabela;?>" >
   <input type="hidden" name="zwrotzleceniadata" value="<?php echo $zwrotzlecenia;?>" >
   <input type="hidden" name="aktualizuj" value="tak" >

   <table class="tab">
     <tr bgcolor="#D6D9FE">
       <td style="font-size:14px;">
         PRZEJD� DO EDYCJI ROZLICZE� JE�ELI TECHNIK POJAWI� SI� NA LI�CIE PO PRAWEJ STRONIE ---->
       </td>
       <td style="width:60%;font-size:11px;font-weight:800;">
<?php
	  $sql="SELECT * FROM rozlicz_technicy WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wy=myquery($sql);
          while( $ar = mysql_fetch_assoc($wy) ) {
                 //echo $ar['technik'].' - '.$ar['punkty'].' - '.$ar['roz_tech'].'<br />';
                 echo ' &nbsp;&nbsp;&nbsp;- '.$ar['technik'].'<br />';
          }

?>     </td>
     </tr>
     <tr>
       <td><input type="submit" name="Submit" value="EDYTUJ" style="margin-top:5px;width:160px;height:25px;background-color:#000099;color:#E8E8E8">&nbsp;&nbsp;</td>
     </tr>
   </table>
</form>

</div>

</body>
</html>
<?php
}
else{
  header("Location: index.php");
}
?>

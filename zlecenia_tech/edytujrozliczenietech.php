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

 $nr_zlec = $_REQUEST['nr_zlec'];
 $id_zlec = $_REQUEST['id_zlec'];
 $max_punkty = $_REQUEST['punkty'];

 //$data = $_REQUEST['data'];//data wpisania zlecenia
 //$tabela = $_REQUEST['tabela'];
 //$zwrotzlecenia = $_REQUEST['zwrotzleceniadata'];
 //$technik_prowadzacy = $_REQUEST['technik_prowadzacy'];
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
  <p style="font-size:20px;font-weight:800;margin-left:10px;float:left;">PUNKTACJA <b style="font-size:30px; color:#FF0000 ">[ <?php echo $max_punkty;?> pkt. ]</b></p>
  <br>
  <hr>
  <br>

  <form name="form1" method="post" action="edytujrozliczenietech1.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="nr_zlec" value="<?php echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<?php echo $id_zlec;?>" >
   <input type="hidden" name="max_punkty" value="<?php echo $max_punkty;?>" >

   <input type="hidden" name="data" value="<?php echo $data;?>" >
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
</div>

</body>
</html>
<?php
}
else{
  header("Location: index.php");
}
?>

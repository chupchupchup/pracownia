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
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>";//When executing:<br>\n<b>$query\n</b><br>";
        }
        if (mysql_errno()==1062){
        	echo "Zlecenie z takim identyfikatorem ju¿ istnieje, dodanie nie jest mo¿liwe - popraw zlecenie<br /><br /><br /><br />";
		  }

    include('../inc/db_close.inc.php');

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

?>

<html>
<head>

<script>
function sendvalue(targetfield1,targetfield2,value,value2)
{
    window.opener.targetfield1.value=value;
    window.opener.targetfield2.value=value2;
    window.close();
    parent.window.close();
}

	var targetfield1 = parent.targetfield1;
	var targetfield2 = parent.targetfield2;

</script>

<style type="text/css">
.inputfr {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #E5E5FF; border: 1px #0066CC outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; 		
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

.inputf {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #FFFFE6; border: 1px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

form {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; text-decoration: none;
	border: 0px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}
.tab {
        font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; text-decoration: none;

}

</style>

</head>
<body bgcolor="#EDFFED">

<button style="margin-top:-32px;margin-left:-8px;width:60px;height:25px;background-color:#E70000;color:#E8E8E8;font-size: 11px;" type="button" onclick="javascript:window.opener='x';window.open('','_parent','');window.close();">
  <b>zamknij</b>
</button>
<br />
<form name="form" action="magazyn_dodaj_nazwa.php" method="post">

  <table class="tab">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">Wyszukaj po nazwie: </td>
     <td style="width:200px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="nazwa" size="28" value="">
     </td>
    </tr>
    <tr>
      <td></td>
      <td><input value="szukaj" name="submit" type="submit" style="float:right;background:#C7C7FF;"></td>
    </tr>
  </table>

</form>

<?php
if( $_POST['nazwa']!='' ){

   $sql="SELECT nazwa,producent FROM material_nazwy WHERE nazwa LIKE '%".$_POST['nazwa']."%' ";
   $wynik=myquery($sql);

   ?>
    <hr />
    <b style="margin-top:20px;margin-left:10px;">Wybierz nazwê materia³u:</b>
    <table class="tab" style="margin-top:10px;margin-left:60px;">
   <?php
   $i=1;
   while( $arr = mysql_fetch_assoc($wynik) ){
        ?>
         <tr class="inputfr">
           <a href="javascript: void(0);" style="text-decoration:none;" onClick="sendvalue(targetfield1,targetfield2,'<?php=$arr['nazwa']?>','<?php=$arr['producent']?>');">
           <td><?php=$i;?>. </td>
           <td style="width:200px; height:15px; font-size: 12px;text-align:center;color:#000099;">
              <?php=$arr['nazwa']?> | <?php=$arr['producent']?>
           </td>
           </a>
         </tr>
        <?php
   $i++;
   }
   ?>
   </table>
   <?php
}

}
else{
  header("Location: ./index.php");
}

?>

</body>
</html>

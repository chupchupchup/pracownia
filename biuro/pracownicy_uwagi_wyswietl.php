<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$tablica_wynikow_uwaga=$_SESSION['tablica_wynikow_uwaga'];

?>

<html>
<head>
</head>
<body topmargin="0" leftmargin="0">
  <table cellspacing="1" cellpadding="1" width="551px">
<?php
foreach($tablica_wynikow_uwaga as $value){
?>
    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:548px;">
      <a style="color:white;" href="../biuro.php?strona=glowna&wpis=edycja_uwaga&pracownikid=<?php echo $value[1]?>&pracownicy_uwagi_id=<?php echo $value[0]?>&amp" target="_parent">
        <td nowrap style="float:left;text-align:center;font-size:12px; width:150px;">data uwagi:<b> <?php echo  $value[3] ?> </b>&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">uwaga: <b><?php echo  $value[2]?></b>&nbsp;</td>
      </a>
    </tr>
<?php
}
?>	
  </table>
</body>
</html>
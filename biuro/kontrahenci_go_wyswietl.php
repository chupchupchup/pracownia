<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$tablica_wynikow_go=$_SESSION['tablica_wynikow_go'];

?>

<html>
<head>
</head>
<body topmargin="0" leftmargin="0">
  <table cellspacing="1" cellpadding="1" width="551px">
<?php
foreach($tablica_wynikow_go as $value){
?>
    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:548px;">
      <a style="color:white;" href="../biuro.php?strona=glowna_kontrahenci&wpis=edycja_go&idzleceniodawcy=<?php echo $value[1]?>&id_go=<?php echo $value[0]?>&amp" target="_parent">
        <td nowrap style="float:left;text-align:center;font-size:12px; width:150px;">dzien:<b> <?php echo  $value[2] ?> </b>&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">otwarte: <b><?php echo  $value[3]?> - <?php echo  $value[4]?></b>&nbsp;</td>
      </a>
    </tr>
<?php
}
?>	
  </table>
</body>
</html>
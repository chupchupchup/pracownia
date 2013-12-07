<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$tablica_wynikow_urlop=$_SESSION['tablica_wynikow_urlop'];
//print_r($tablica_wynikow_urlop);

?>

<html>
<head>
</head>
<body topmargin="0" leftmargin="0">
  <table cellspacing="1" cellpadding="1" width="551px">
<?php
foreach($tablica_wynikow_urlop as $value){

$spr1=substr($value[2],4);
$spr2=substr($value[3],4);
?>
    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:548px;">
<?php
if($spr1=='-00-00' && $spr2=='-00-00'){
?>
      <a style="color:white;" href="../biuro.php?strona=glowna&wpis=edycja_ustaw_urlop&pracownikid=<?php=$value[1]?>&pracownicy_urlop_id=<?php=$value[0]?>&amp" target="_parent">
<?php
}else{
?>
      <a style="color:white;" href="../biuro.php?strona=glowna&wpis=edycja_urlop&pracownikid=<?php=$value[1]?>&pracownicy_urlop_id=<?php=$value[0]?>&amp" target="_parent">
<?php
}
?>
        <td nowrap style="float:left;text-align:center;font-size:12px;">rok urlopu:<b> <?php= $value[4] ?> </b>&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">data: <b><?php= $value[2]?> - <?php= $value[3]?></b>&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">ilosc dni urlopu:&nbsp;&nbsp;<b><?php=$value[7]?></b>&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">pozostalo:&nbsp;&nbsp;<b><?php=$value[6]?></b>&nbsp;</td>
      </a>
    </tr>
<?php
}
?>	
  </table>
</body>
</html>






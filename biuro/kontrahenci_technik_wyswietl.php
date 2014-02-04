<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$tablica_wynikow_technik=$_SESSION['tablica_wynikow_technik'];

?>

<html>
<head>
</head>
<body topmargin="0" leftmargin="0">
  <table cellspacing="1" cellpadding="1" width="551px">
<?php
foreach($tablica_wynikow_technik as $value){
?>
    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:548px;">
      <a style="color:white;" href="../biuro.php?strona=glowna_kontrahenci&wpis=edycja_technik&idzleceniodawcy=<?php echo $value[0]?>&praca=<?php echo $value[1]?>&amp" target="_parent">
        <td nowrap style="float:left;text-align:left;font-size:12px; width:400px;">Pracownik:<b> <?php echo  $value[2] ?> </b>&nbsp;</td>
        <td nowrap style="float:left;text-align:left;font-size:12px;">praca: <b><?php echo  $value[1]?></b>&nbsp;</td>
      </a>
    </tr>
<?php
}
?>	
  </table>
</body>
</html>

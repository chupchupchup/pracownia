<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$tablica_wynikow_cert=$_SESSION['tablica_wynikow_cert'];

?>

<html>
<head>
</head>
<body topmargin="0" leftmargin="0">
  <table cellspacing="1" cellpadding="1" width="551px">
<?
foreach($tablica_wynikow_cert as $value){
?>
    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:548px;">
      <a style="color:white;" href="../biuro.php?strona=glowna&wpis=edycja_cert&pracownikid=<?=$value[1]?>&pracownicy_certyfikaty_id=<?=$value[0]?>&amp" target="_parent">
        <td nowrap style="float:left;text-align:center;font-size:12px;">data otrzymania cert:<b> <?= $value[3] ?> </b>&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">cert: <b><?= $value[2]?></b>&nbsp;</td>
      </a>
    </tr>
<?
}
?>	
  </table>
</body>
</html>
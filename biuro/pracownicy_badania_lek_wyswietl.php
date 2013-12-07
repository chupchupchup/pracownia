<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

$tablica_wynikow_badania_lek=$_SESSION['tablica_wynikow_badania_lek'];
//print_r($tablica_wynikow_urlop);

?>

<html>
<head>
</head>
<body topmargin="0" leftmargin="0">
  <table cellspacing="1" cellpadding="1" width="551px">
<?php
foreach($tablica_wynikow_badania_lek as $value){
?>
    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:548px;">
      <a style="color:white;" href="../biuro.php?strona=glowna&wpis=edycja_badania&pracownikid=<?php=$value[1]?>&pracownicy_badania_lek_id=<?php=$value[0]?>&amp" target="_parent">
        <td nowrap style="float:left;text-align:center;font-size:12px;">data badania:<b> <?php= $value[2] ?> </b>&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">data nastepnego badania: <b><?php= $value[3]?></b>&nbsp;</td>
        <td nowrap style="float:left;text-align:left;font-size:12px;">opis badania:&nbsp;&nbsp;<b><?php=$value[4]?></b>&nbsp;</td>
      </a>
    </tr>
<?php
}
?>	
  </table>
</body>
</html>
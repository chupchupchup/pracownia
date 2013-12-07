<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

//data wystwienia wz-ki -------------------------------------------
  $D=date('j');
  if($D<10){
     $D='0'.$D;
  }

  $M=date('m');
//  if($M<10){
//     $M='0'.$M;
//  }

  $Y=date('Y');
  $datawystawienia=$Y.'-'.$M.'-'.$D;
//------------------------------------------------------------------

//ZLECENIE  --------------------------------------------------------
  $nr=$_REQUEST['nr_zlec'];
  $id=$_REQUEST['id_zlec'];
  $zlecenie=$nr.$id;

//OPIS ZLECENIA  ---------------------------------------------------
  $opiszlecenia=$_REQUEST['opiszlecenia'];
//------------------------------------------------------------------

//WZ  --------------------------------------------------------------
  $wzk=$_REQUEST['wzk'];
//------------------------------------------------------------------

//KWOTA  -----------------------------------------------------------
  $kwota=$_REQUEST['kwota'];
//------------------------------------------------------------------

//DATA ZWROTU  ------------------------------------------------
  $datazwrotu=$_REQUEST['datazwrotu'];
//------------------------------------------------------------------

//PACJENT  ---------------------------------------------------------
  $pacjent=$_REQUEST['pacjent'];
//------------------------------------------------------------------

?>
<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
</head>
<title> DRUKOWANIE WZ </title>
<body style="margin-top:0px;margin-left:0px;font-size : 10px;font-family : Verdana, Geneva, Arial, Helvetica, Sans-Serif;" OnLoad="window.print();">

<div onclick="javascript:window.close();">
<br /><br /><br /><br /><br />

<table border="1px" width="800px" height="200px" align="CENTER" valign="MIDDLE" cellspacing="0" CELLPADDING="0" frame="hsides" rules="rows">
<tr>
    <td style="text-align:center;width:170px;height:30px;">WZ (wydanie zewn�trzne):&nbsp;</td>
    <td style="font-size:17px;text-align:left;width:170px;height:30px;">&nbsp;&nbsp;<b><?php=$wzk;?></b></td>
    <td>&nbsp;</td>
    <td style="text-align:right;width:80px;height:30px;">GDA�SK&nbsp;</td>
    <td style="text-align:center;width:100px;height:30px;">&nbsp;<?php=$datawystawienia;?></td>
</tr>
<tr>
    <td style="text-align:left;width:130px;height:30px;">&nbsp;&nbsp;ZLECENIE NR:</td>
    <td style="font-size:18px;text-align:left;width:300px;height:30px;">&nbsp;&nbsp;<b><?php=$zlecenie;?></b></td>
    <td>&nbsp;</td>
    <td style="text-align:left;width:80px;height:30px;">&nbsp;Z DNIA: </td>
    <td style="font-size:16px;text-align:left;width:130px;height:30px;">&nbsp;&nbsp;<b><?php=$datazwrotu;?></b></td>
</tr>
<tr>
    <td style="text-align:left;width:170px;height:20px;">&nbsp;&nbsp;PACJENT:</td>
    <td style="font-size:18px;text-align:left;height:20px;">&nbsp;&nbsp;<b><?php=ucwords($pacjent);?></b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>
<table border="0px" width="800px" height="100px" align="CENTER" valign="MIDDLE" cellspacing="0" CELLPADDING="0" frame="hsides" rules="rows">
<tr>
    <td style="text-align:left;width:170px;">&nbsp;&nbsp;OPIS ZLECENIA:</td>
    <td style="font-size:18px;text-align:left;">&nbsp;&nbsp;<b><?php=$opiszlecenia;?></b></td>
</tr>
</table>
<table border="1px" width="800px" height="35px" align="CENTER" valign="MIDDLE" cellspacing="0" CELLPADDING="0" frame="hsides" rules="rows">
<tr>
    <td style="text-align:left;width:170px;height:25px;">&nbsp;&nbsp;DO ZAP�ATY:</td>
    <td style="font-size:18px;text-align:left;width:170px;height:25px;">&nbsp;&nbsp;<b><?php=$kwota;?>z�</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>
<br /><br /><br /><br /><br />
<br /><br /><br /><br /><br />
<hr style="height:5px;color:black;border: 5px dashed #000000;">
<br /><br /><br /><br /><br />
<br /><br /><br /><br /><br />
<table border="1px" width="800px" height="200px" align="CENTER" valign="MIDDLE" cellspacing="0" CELLPADDING="0" frame="hsides" rules="rows">
<tr>
    <td style="text-align:center;width:170px;height:30px;">WZ (wydanie zewn�trzne):&nbsp;</td>
    <td style="font-size:17px;text-align:left;width:170px;height:30px;">&nbsp;&nbsp;<b><?php=$wzk;?></b></td>
    <td>&nbsp;</td>
    <td style="text-align:right;width:80px;height:30px;">GDA�SK&nbsp;</td>
    <td style="text-align:center;width:100px;height:30px;">&nbsp;<?php=$datawystawienia;?></td>
</tr>
<tr>
    <td style="text-align:left;width:130px;height:30px;">&nbsp;&nbsp;ZLECENIE NR:</td>
    <td style="font-size:18px;text-align:left;width:300px;height:30px;">&nbsp;&nbsp;<b><?php=$zlecenie;?></b></td>
    <td>&nbsp;</td>
    <td style="text-align:left;width:80px;height:30px;">&nbsp;Z DNIA: </td>
    <td style="font-size:16px;text-align:left;width:130px;height:30px;">&nbsp;&nbsp;<b><?php=$datazwrotu;?></b></td>
</tr>
<tr>
    <td style="text-align:left;width:170px;height:20px;">&nbsp;&nbsp;PACJENT:</td>
    <td style="font-size:18px;text-align:left;height:20px;">&nbsp;&nbsp;<b><?php=ucwords($pacjent);?></b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>
<table border="0px" width="800px" height="100px" align="CENTER" valign="MIDDLE" cellspacing="0" CELLPADDING="0" frame="hsides" rules="rows">
<tr>
    <td style="text-align:left;width:170px;">&nbsp;&nbsp;OPIS ZLECENIA:</td>
    <td style="font-size:18px;text-align:left;">&nbsp;&nbsp;<b><?php=$opiszlecenia;?></b></td>
</tr>
</table>
<table border="1px" width="800px" height="35px" align="CENTER" valign="MIDDLE" cellspacing="0" CELLPADDING="0" frame="hsides" rules="rows">
<tr>
    <td style="text-align:left;width:170px;height:25px;">&nbsp;&nbsp;DO ZAP�ATY:</td>
    <td style="font-size:18px;text-align:left;width:170px;height:25px;">&nbsp;&nbsp;<b><?php=$kwota;?>z�</b></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
</table>

</div>
</body>
</html>

<?php
}
else{
  header("Location: ./index.php");
}
?>


<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

   $etykieta=$_SESSION['form_tab']['idzlecenianr'].$_SESSION['form_tab']['idzleceniapoz'];

   $kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];
?>

<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
</head>
<title> DRUKOWANIE ETYKIETY </title>
<body style="margin-top:0px;margin-left:0px;" OnLoad="window.print();window.close();">

<div onclick="javascript:window.close();">

 <b style="font-size:10px;"><cite><?=$etykieta?></cite></b><br />
 <b style="font-size:10px;"><cite><?=$_SESSION['form_tab']['kategoria']?></cite></b><br />
 <cite style="font-size:10px;">wprowadzono: <b><?=$_SESSION['datawpisania']?> </b></cite><br />
 <cite style="font-size:10px;">termin realizacji: <b><?=$_SESSION['form_tab']['zwrotzleceniadata'].', '.$_SESSION['form_tab']['zwrotzleceniagodz']?> </b></cite><br />

<div style="margin-top:10px;margin-left:-4px;">
 <img src="barcode_img.php?num=<?php echo($kod_kreskowy) ?>&type=code128&imgtype=png"
   alt="PNG: <?php echo($kod_kreskowy) ?>" title="PNG: <?php echo($kod_kreskowy) ?>" >

</div>

</div>

</body>
</html>

<?  
}
else{
  header("Location: ./index.php");
}
?>

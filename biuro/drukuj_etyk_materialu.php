<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

   $etykieta=$_SESSION['form_tab']['idzlecenianr'].$_SESSION['form_tab']['idzleceniapoz'];

   //$kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];
?>

<html>
<head>
 <meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
</head>
<title> DRUKOWANIE ETYKIET MATERIAŁÓW</title>
<body style="margin-top:0px;margin-left:0px;" OnLoad="window.print();window.close();">

<div onclick="javascript:window.close();">
  <b style="font-size:12px;"><cite><?php=$etykieta?></cite></b><br /><hr />
  <b style="font-size:12px;"><cite>UŻYTY MATERIAŁ:</cite></b><br />
  <b style="font-size:12px;"><cite><?php
//    foreach($_SESSION['etykieta_materialu_all'] as $klucz => $wartosc){
      //echo strtoupper($wartosc).'<br /><hr />';
//      echo mb_convert_case($wartosc, MB_CASE_UPPER, "ISO-8859-2").'<br /><hr />';
//    }
	echo $_SESSION['etykieta_materialu'];
  ?></cite></b><br />

</div>

</body>
</html>

<?php
}
else{
  header("Location: ./index.php");
}
?>

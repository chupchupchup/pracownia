<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

require_once('deklaracja_zgodnosci.php');
require_once('../inc/common.php');
 
if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

	$deklaracja = new DeklaracjaZgodnosciPDF();
	
	$deklaracja->klient = $_SESSION['form_tab']['klient'];
	$deklaracja->nr_zlecenia = $_SESSION['form_tab']['idzlecenianr'].$_SESSION['form_tab']['idzleceniapoz'];
	$deklaracja->opis_zlecenia = $_SESSION['opis_all'];		
	$deklaracja->extra = $_SESSION['form_tab']['extra'];
	$deklaracja->etykieta = $_SESSION['etykieta'];		
	$deklaracja->pacjent = $_SESSION['form_tab']['pacjent'];		
	
	$filename = '../inc/fpdf/out/pdf_'.md5(time().rand()).'.pdf';
	$deklaracja->draw($filename);
	
	$idzlecenianr = $_SESSION['form_tab']['idzlecenianr'];
 	$idzleceniapoz = $_SESSION['form_tab']['idzleceniapoz'];
 	$datawpisania = $_SESSION['form_tab']['datawpisania'];
 	
	$sql = "UPDATE zlecenieinfo SET deklaracja='".basename($filename)."' WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";	
	myquery($sql);
	
	header('Location: '.$filename);
} else {
	header("Location: ./index.php");
}
?>
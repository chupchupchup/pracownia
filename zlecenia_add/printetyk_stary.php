<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
    $etykieta=$_REQUEST['zlecenienr'].$_REQUEST['zleceniepoz'];
    $kod_kreskowy = $_REQUEST['kod_kreskowy'];

    $etykieta=$_SESSION['form_tab']['idzlecenianr'].$_SESSION['form_tab']['idzleceniapoz'];

    $kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];

    $pdf = new EtykietaPDF();
    $pdf->etykieta = $etykieta;
    $pdf->kategoria = $_REQUEST['kategoria'];
    $pdf->data = $_REQUEST['datawpisania'];
    $pdf->termin = $_REQUEST['zwrotzleceniadata'].', '.$_REQUEST['zwrotzleceniagodz'];
    $pdf->barcode = "barcode_img.php?num=".$kod_kreskowy."&type=code128&imgtype=png";
    $filename = '../inc/fpdf/out/etyk_'.md5(time().rand()).'.pdf';
    $pdf->draw($filename);

    header('Location: '.$filename);
    //$kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];
} else {
    header("Location: ./index.php");
}
?>
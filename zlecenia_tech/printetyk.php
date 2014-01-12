<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('etykieta.php');
require_once('../inc/common.php');

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

    $etykieta=$_SESSION['form_tab']['idzlecenianr'].$_SESSION['form_tab']['idzleceniapoz'];

    $kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];

    $pdf = new EtykietaPDF();
    $pdf->etykieta = $etykieta;
    $pdf->kategoria = $_SESSION['form_tab']['kategoria'];
    $pdf->data = $_SESSION['datawpisania'];
    $pdf->termin = $_SESSION['form_tab']['zwrotzleceniadata'].', '.$_SESSION['form_tab']['zwrotzleceniagodz'];
    $pdf->barcode = "barcode_img.php?num=".$kod_kreskowy."&type=code128&imgtype=png";
    $filename = '../inc/fpdf/out/etyk_'.md5(time().rand()).'.pdf';
    $pdf->draw($filename);

    header('Location: '.$filename);
    //$kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];
} else {
    header("Location: ./index.php");
}
?>
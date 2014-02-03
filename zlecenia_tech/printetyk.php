<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

require_once('etykieta.php');
require_once('../inc/common.php');

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

    $etykieta=$_SESSION['form_tab']['idzlecenianr'].$_SESSION['form_tab']['idzleceniapoz'];

    $kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];

    $pdf = new EtykietaPDF('P','mm',array(75,50));
    $pdf->etykieta = $etykieta;
    $pdf->kategoria = $_SESSION['form_tab']['kategoria'];
    $pdf->data = $_SESSION['datawpisania'];
    $pdf->termin = $_SESSION['form_tab']['zwrotzleceniadata'].', '.$_SESSION['form_tab']['zwrotzleceniagodz'];

    $url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $url .= $_SERVER['SERVER_NAME'];
    $url .= htmlspecialchars($_SERVER['REQUEST_URI']);
    $baseurl = dirname($url);

    $pdf->barcode = $baseurl."/barcode_img.php?num=".$kod_kreskowy."&type=code128&imgtype=png";
    $filename = '../inc/fpdf/out/etyk_'.md5(time().rand()).'.pdf';
    $pdf->draw($filename);

    header('Location: '.$filename);
    //$kod_kreskowy = $_SESSION['form_tab']['kod_kreskowy'];
} else {
    header("Location: ./index.php");
}
?>

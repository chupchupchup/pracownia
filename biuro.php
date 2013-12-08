<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
  include('./inc/smarty_path.inc.php');

 if( !isset($_REQUEST['strona']) ){
  include('./biuro/biuro_glowna.php');
 }
 elseif($_REQUEST['strona']=="glowna"){
  include('./biuro/biuro_glowna.php');
 }
 elseif($_REQUEST['strona']=="glowna_kontrahenci"){
  include('./biuro/biuro_glowna_kontrahenci.php');
 }
 elseif($_REQUEST['strona']=="glowna_dostawcy"){
  include('./biuro/biuro_glowna_dostawcy.php');
 }
 elseif($_REQUEST['strona']=="glowna_producenci"){
  include('./biuro/biuro_glowna_producenci.php');
 }
 elseif($_REQUEST['strona']=="zlecenia"){

//echo iconv("Windows-1255","ISO-8859-2",$_REQUEST['id_zlec']).'<br>';
  include('./biuro/biuro_zlecenia.php');
 }
 elseif($_REQUEST['strona']=="rozliczenia"){
  include('./biuro/biuro_rozliczenia.php');
 }
 elseif($_REQUEST['strona']=="rozliczenia_tech"){
  include('./biuro/biuro_rozliczenia_tech.php');
 }
 elseif($_REQUEST['strona']=="rozliczenia_lek"){
  include('./biuro/biuro_rozliczenia_lek.php');
 }
 elseif($_REQUEST['strona']=="rozliczenia_poz"){
  include('./biuro/biuro_rozliczenia_poz.php');
 }
 elseif($_REQUEST['strona']=="rozliczenia_arch"){
  include('./biuro/biuro_rozliczenia_arch.php');
 }
 elseif($_REQUEST['strona']=="magazyn"){
  include('./biuro/magazyn.php');
 }
 elseif($_REQUEST['strona']=="faktury_lek_pop"){
  include('./biuro/faktury_wydruk_popup.php');
 }
 elseif($_REQUEST['strona']=="faktury_main"){
  include('./biuro/faktury_main.php');
 }
 elseif($_REQUEST['strona']=="faktury_niezaplacone"){
  include('./biuro/faktury_niezaplacone.php');
 }
 elseif($_REQUEST['strona']=="wyszukaj_faktury"){
  include('./biuro/faktury_wyszukaj_wyswietl.php');
 }
 elseif($_REQUEST['strona']=="faktury_hist"){
  include('./biuro/faktury_wydruk_historia.php?fv_nr=$_REQUEST["fv_nr"]');
 }

}
else{
  header("Location: index.php");
}
?>

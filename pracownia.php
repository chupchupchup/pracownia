<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

//echo $_REQUEST['strona'];
include('./inc/smarty_path.inc.php');

//wyswietlenie panelu gornego -----------------------------------
if ( $_SESSION['panelgorny']=='pracpin' ) {
  include('gorny_panel.html');
}
elseif ( $_SESSION['panelgorny']=='techpin' ) {
  include('gorny_panel_tech.html');
}
else{
  echo '<b>ERROR - sprawd¼ w pliku pracownia.php ustawienie zmiennej $_SESSION[\'panelgorny\'] </b><br><br>';
}
//---------------------------------------------------------------


if ( !isset($_SESSION['strona']) && isset($_REQUEST['strona']) ) {
    include($_REQUEST['strona']);
} 
elseif( !isset($_SESSION['strona']) && !isset($_REQUEST['strona']) ){
    include('temp/blad.html');
}
elseif (isset($_SESSION['strona'])) {
    include($_SESSION['strona']);
}

}
else{
  header("Location: index.php");
}
?>

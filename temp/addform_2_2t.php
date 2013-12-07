<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

  //zleceniodawca
  $_SESSION['form_tab']['idzleceniapoz_tmp']="/".$_REQUEST['zleceniodawca']."/";
  $smarty->assign('idzleceniapoz_tmp',$_SESSION['form_tab']['idzleceniapoz_tmp'] ); 
  
  //budowanie tablicy - wyswietlania ROKU
  if(date('Y')>=2008){
  	$loop=date('Y')-2008;  
   for($i=0;$i<=$loop;$i++){
  	  $tab_rok[]=2008+$i;
	} 
  }
  $smarty->assign('tab_rok',$tab_rok ); //rok do wyboru
  $smarty->assign('selected_rok',date('Y') ); //selected rok
  

  // ustaw: rok | nr zlecenia | pacjenta | idzewnetrzne  

  $smarty->display('addform_2_2t.tpl');

}
else{
  header("Location: ./index.php");
}
?>

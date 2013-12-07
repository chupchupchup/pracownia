<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
unset($_SESSION['strona']);
// include('./inc/smarty_path.inc.php');
// $smarty->assign('', $);
 $smarty->display('addform_1.tpl');
  
}
else{
  header("Location: ./index.php");
}
?>
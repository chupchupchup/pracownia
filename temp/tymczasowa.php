<?
if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
        $smarty->assign('idusera', $_SESSION['idusera']);
        $smarty->assign('login', $_REQUEST['login']);
	$smarty->display('tymczasowa.tpl');
}
else{
  header("Location: ../index.php");
}
?>


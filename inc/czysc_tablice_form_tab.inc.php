<?
//------------------------------------------------------------------------------------------------------------------
//funkcja czyszczaca zmienna $_SESSION['form_tab']
    function czysc_tablice_form_tab () {
	 			 $tmp=$_SESSION['form_tab'];
				 unset($_SESSION['form_tab']);

 				 $_SESSION['form_tab']['idzlecenianr']=$tmp['idzlecenianr'];
 				 $_SESSION['form_tab']['idzleceniapoz']=$tmp['idzleceniapoz'];
 				 $_SESSION['form_tab']['zwrotzleceniadata']=$tmp['zwrotzleceniadata'];
 				 $_SESSION['form_tab']['zwrotzleceniagodz']=$tmp['zwrotzleceniagodz'];
 				 $_SESSION['form_tab']['pacjent']=$tmp['pacjent'];
 				 $_SESSION['form_tab']['idzewnetrzny']=$tmp['idzewnetrzny'];
 				 $_SESSION['form_tab']['zakladka']=$tmp['zakladka'];
 				 $_SESSION['form_tab']['zlecenie']=$tmp['zlecenie'];

 				 unset($tmp);
    }
//------------------------------------------------------------------------------------------------------------------
?>

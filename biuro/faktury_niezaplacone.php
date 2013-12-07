<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']!='razdwatrzybabajagapatrzy'){
  header("Location: index.php");
}
//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('./inc/db_connect.inc.php');
        $result = mysql_query($query);

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('./inc/db_close.inc.php');

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------
//funkacja wykonujaca zapytanie SQL i przepisujaca tablice wynikow do tablicy ktora zostaje przeslana do szablonu
function pobierz_dane ($sql) {

   $sql_result=myquery($sql);

   $f=array();
   while ($row = mysql_fetch_row($sql_result)) {
        $f[] = $row;
   }
   //echo '<br />';
  return $f;
}
//------------------------------------------------------------------------------------------------------------------

    $t_opis=array('NR FV'=>'80','STATUS'=>'100','WARTO¦Æ <br />NETTO'=>'120','WARTO¦Æ <br />BRUTTO'=>'120','ZAP£ACONO <br />BRUTTO'=>'120','DATA <br />FV'=>'60','SPOSÓB <br />ZAP£ATY'=>'100','TERMIN <br />ZAP£ATY'=>'100','KLIENT'=>'120');
    $smarty->assign('tablica_opisy', $t_opis);

if($_SESSION['idusera']=='JERZY.ANDRYSKOWSKI' || $_SESSION['idusera']=='ANIA.ANDRYSKOWSKA'){
    $sql="SELECT fv_nr, status, concat(wartosc_netto_fv, ' z³'), concat(kwota_zaplacona, ' z³'), data_fv, sposob_zaplaty, concat(termin_zaplaty, ' dni'),idzleceniodawcy 
          FROM faktury
          WHERE status='niezap³acona' ORDER BY data_fv, idzleceniodawcy ";

    $sql_sum="SELECT fv_nr, sum(wartosc_brutto_fv) as sum_b, sum(kwota_zaplacona) as sum_z, idzleceniodawcy
          FROM faktury
          WHERE status='niezap³acona' ORDER BY data_fv, idzleceniodawcy ";
}
else{
    $sql="SELECT fv_nr, status, concat(wartosc_netto_fv, ' z³'), concat(kwota_zaplacona, ' z³'), data_fv, sposob_zaplaty, concat(termin_zaplaty, ' dni'),idzleceniodawcy 
          FROM faktury
          WHERE status='niezap³acona' AND fv_nr NOT LIKE '%/9999' ORDER BY data_fv, idzleceniodawcy ";

    $sql_sum="SELECT fv_nr, sum(wartosc_brutto_fv) as sum_b, sum(kwota_zaplacona) as sum_z, idzleceniodawcy
          FROM faktury
          WHERE status='niezap³acona' AND fv_nr NOT LIKE '%/9999' ORDER BY data_fv, idzleceniodawcy ";
}

    $tablica_wynikow=pobierz_dane($sql);    //print_r($tablica_wynikow);

    $smarty->assign('tablica_wynikow', $tablica_wynikow);

		  
//echo $sql_sum;
    $sql_sum_result=myquery($sql_sum);
    $arr_sum = mysql_fetch_assoc($sql_sum_result);
    $sum_wart_brutto = $arr_sum['sum_b'];
    $sum_zaplacone = $arr_sum['sum_z'];

    $smarty->assign('sum_wart_brutto', $sum_wart_brutto);
    $smarty->assign('sum_zaplacone', $sum_zaplacone);


  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'faktury_lista_niezaplacone.tpl');

  $smarty->assign('ID', 'faktury');

  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->display('biuro_rozliczenia.tpl');
?>

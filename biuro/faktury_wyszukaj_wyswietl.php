<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']!='razdwatrzybabajagapatrzy'){
  header("Location: index.php");
}

//czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// funkcja czyszczaca zmienne formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

require_once('./filterek/class.inputfilter_clean.php');

function czysc_zmienne_formularza($input)
{
	$myFilter = new InputFilter($tags, $attr, $tag_method, $attr_method, $xss_auto);

        //zmienna do czyszczenia
	$input = stripslashes($input);

	// process input
	$result = $myFilter->process($input);

        //czysta zmienna
        $input=strip_tags($result);

        //zwrocenie wyniku
        return $input;
}
//koniec podstawowej funkcji czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  //zmienne do czyszczenia
  $fv_nr = czysc_zmienne_formularza($_REQUEST['fv_nr']);
  $klient = czysc_zmienne_formularza($_REQUEST['klient']);
  $status = czysc_zmienne_formularza($_REQUEST['status']);

  $czyData = czysc_zmienne_formularza($_REQUEST['czyData']);
  $dataodY = czysc_zmienne_formularza($_REQUEST['dataodY']);
  $dataodM = czysc_zmienne_formularza($_REQUEST['dataodM']);
  $dataodD = czysc_zmienne_formularza($_REQUEST['dataodD']);
  $datadoY = czysc_zmienne_formularza($_REQUEST['datadoY']);
  $datadoM = czysc_zmienne_formularza($_REQUEST['datadoM']);
  $datadoD = czysc_zmienne_formularza($_REQUEST['datadoD']);

  $dataOd=$dataodY.'-'.$dataodM.'-'.$dataodD;
  $dataDo=$datadoY.'-'.$datadoM.'-'.$datadoD;

  $wyszukiwanie= czysc_zmienne_formularza($_REQUEST['wyszukaj']);

//koniec czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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

//------------------------------------------------------------------------------------------------------------------
  if($wyszukiwanie=='form'){

    if($_REQUEST['status']=='dowolny'){
      $status_sql = "status LIKE '%' ";
    }else{
      if( $_REQUEST['status']=='niezap³acona' ){
        $status_sql = "status = 'niezap³acona' ";
      }
      elseif( $_REQUEST['status']=='zap³acona' ){
        $status_sql = "status = 'zap³acona' ";
      }
      elseif( $_REQUEST['status']=='anulowana' ){
        $status_sql = "status = 'anulowana' ";
      }
      else{                                                        //te warunki potrzebne ¿eby przy powrocie do wyszukiwania miedzy stronami albo
        $status_sql = $_SESSION['status_sql'];                      //z ostatnich wynikow wyszukiwania ze zmiennej sesyjnej ustawiæ wartosci
      }                                                             //wyszukiwanych pól - tak samo ponizej
    }
    $_SESSION['status_sql'] = $status_sql;


    if($_REQUEST['fv_nr']==''){
      $fv_nr_sql = "fv_nr LIKE '%' ";
    }else{
      if( isset($_REQUEST['fv_nr']) ){
        $fv_nr_sql = "fv_nr LIKE '%".$_REQUEST['fv_nr']."%' ";
      }else{
        $fv_nr_sql = $_SESSION['fv_nr_sql'];
      }
    }
    $_SESSION['fv_nr_sql'] = $fv_nr_sql;


/*    if($klient=='dowolny'){
      $klient_sql = "kontrahent_nazwa LIKE '%' ";
    }else{
      if( isset($_REQUEST['klient']) ){
        $klient_sql = "kontrahent_nazwa = '".$_REQUEST['klient']."' ";
      }else{
        $klient_sql = $_SESSION['klient_sql'];
      }
    }
    $_SESSION['klient_sql'] = $klient_sql;
*/

    if($klient=='dowolny'){
      $klient_sql = "idzleceniodawcy LIKE '%' ";
    }else{
      if( isset($_REQUEST['klient']) ){
        $klient_sql = "idzleceniodawcy = '".$_REQUEST['klient']."' ";
      }else{
        $klient_sql = $_SESSION['klient_sql'];
      }
    }
    $_SESSION['klient_sql'] = $klient_sql;


    if(!isset($_REQUEST['str']) ){
      $strona=0;
    }
    else {
      $strona=$_REQUEST['str'];
    }
    $_SESSION['strona'] = $strona;


    if( isset($_REQUEST['czyData']) ){
      $data_sql = "data_fv >= '".$dataOd."' AND data_fv <= '".$dataDo."' ";
    }
    else {
      if( !isset($_REQUEST['czyData']) && isset($_SESSION['data_sql']) && isset($_REQUEST['str']) ){
        $data_sql = $_SESSION['data_sql'];
      }else{
        $data_sql = "data_fv LIKE '%' ";
      }
    }
    $_SESSION['data_sql'] = $data_sql;


    include('./inc/db_connect.inc.php');
    //Pobranie liczby rekordów
    $query_count = mysql_query(" SELECT count(fv_nr) FROM faktury
                                 WHERE ".$fv_nr_sql."
                                 AND ".$status_sql."
                                 AND ".$klient_sql."
                                 AND ".$data_sql." " );
    $r = mysql_fetch_array($query_count);
    include('./inc/db_close.inc.php');
    //Liczba stron, u¿ycie ceil - zaokr±glenie w górê, w celu zapewnienia, ¿e ¿adna strona siê nie straci
    //echo $r[0].'<br>';
    $pages = ceil($r[0]/15);
    $_SESSION['pages'] = $pages;

   $pages=$_SESSION['pages'];
   $offset=$strona*15;

if($_SESSION['idusera']=='JERZY.ANDRYSKOWSKI' || $_SESSION['idusera']=='ANIA.ANDRYSKOWSKA'){
    $sql="SELECT fv_nr, status, concat(wartosc_netto_fv, ' z³'), concat(kwota_zaplacona, ' z³'), data_fv, sposob_zaplaty, concat(termin_zaplaty, ' dni'), idzleceniodawcy
          FROM faktury
          WHERE ".$fv_nr_sql."
          AND ".$status_sql."
          AND ".$klient_sql."
          AND ".$data_sql."
          ORDER BY data_fv, idzleceniodawcy ";

   // echo '<b style="color:white;">'.$sql.'</b><br>';
    $tablica_wynikow=pobierz_dane($sql);    //print_r($tablica_wynikow);
    $_SESSION['tablica_wynikow'] = $tablica_wynikow;

    $sql_sum="SELECT fv_nr, sum(wartosc_brutto_fv) as sum_b, sum(kwota_zaplacona) as sum_z, idzleceniodawcy
          FROM faktury
          WHERE ".$fv_nr_sql."
          AND ".$status_sql."
          AND ".$klient_sql."
          AND ".$data_sql."
          ORDER BY data_fv, idzleceniodawcy ";
}
else{
    $sql="SELECT fv_nr, status, concat(wartosc_netto_fv, ' z³'), concat(kwota_zaplacona, ' z³'), data_fv, sposob_zaplaty, concat(termin_zaplaty, ' dni'), idzleceniodawcy
          FROM faktury
          WHERE ".$fv_nr_sql."
          AND ".$status_sql."
          AND ".$klient_sql."
          AND ".$data_sql."
		  AND fv_nr NOT LIKE '%/9999' 
          ORDER BY data_fv, idzleceniodawcy ";

   // echo '<b style="color:white;">'.$sql.'</b><br>';
    $tablica_wynikow=pobierz_dane($sql);    //print_r($tablica_wynikow);
    $_SESSION['tablica_wynikow'] = $tablica_wynikow;

    $sql_sum="SELECT fv_nr, sum(wartosc_brutto_fv) as sum_b, sum(kwota_zaplacona) as sum_z, idzleceniodawcy
          FROM faktury
          WHERE ".$fv_nr_sql."
          AND ".$status_sql."
          AND ".$klient_sql."
          AND ".$data_sql."
		  AND fv_nr NOT LIKE '%/9999' 
          ORDER BY data_fv, idzleceniodawcy ";
}
		  
//echo $sql_sum;
    $sql_sum_result=myquery($sql_sum);
    $arr_sum = mysql_fetch_assoc($sql_sum_result);
    $sum_wart_brutto = $arr_sum['sum_b'];
    $sum_zaplacone = $arr_sum['sum_z'];
    $_SESSION['sum_wart_brutto'] = $sum_wart_brutto;
    $_SESSION['sum_zaplacone'] = $sum_zaplacone;

  }
  elseif($wyszukiwanie=='ostatnie'){
        $pages=$_SESSION['pages'];
        $strona=$_SESSION['strona'];
        $tablica_wynikow=$_SESSION['tablica_wynikow'];
        $sum_wart_brutto = $_SESSION['sum_wart_brutto'];
        $sum_zaplacone = $_SESSION['sum_zaplacone'];
  }

    $smarty->assign('tablica_wynikow', $tablica_wynikow);
    $smarty->assign('sum_wart_brutto', $sum_wart_brutto);
    $smarty->assign('sum_zaplacone', $sum_zaplacone);

    $t_opis=array('NR FV'=>'80','STATUS'=>'100','WARTO¦Æ <br />NETTO'=>'120','WARTO¦Æ <br />BRUTTO'=>'120','ZAP£ACONO <br />BRUTTO'=>'110','DATA <br />FV'=>'60','SPOSÓB <br />ZAP£ATY'=>'100','TERMIN <br />ZAP£ATY'=>'100', 'KLIENT'=>'120');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('pages_count', $pages);
    $smarty->assign('page_number', $strona);
    $smarty->assign('nr_strony', 'nie_wyswietl');

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'faktury_lista_niezaplacone.tpl');

  $smarty->assign('ID', 'faktury');

  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->display('biuro_rozliczenia.tpl');

?>

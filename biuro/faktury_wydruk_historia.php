<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']!='razdwatrzybabajagapatrzy'){
  header("Location: index.php");
}

//------------------------------------------------------------------------------------------------------------------

//include('../inc/smarty_path.inc.php');
  require('../libs/Smarty.class.php');
  $smarty=& new Smarty;
  global $smarty;

//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('../inc/db_connect.inc.php');
        $result = mysql_query($query);

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('../inc/db_close.inc.php');

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------
    $fv_nr=$_REQUEST['fv_nr'];

      //pobieram dane faktury potrzebne do wydrukowania faktury
      $sql="SELECT * FROM faktury WHERE fv_nr='".$fv_nr."' ";
      $sql_result=myquery($sql);
      $arr = mysql_fetch_assoc($sql_result);

    $smarty->assign('data_sprzedazy', $arr['data_fv']);

    $smarty->assign('nr_fv', $arr['fv_nr']);

    $smarty->assign('sposob_zaplaty', $arr['sposob_zaplaty']);

    $smarty->assign('termin_zaplaty', $arr['termin_zaplaty']);

    $smarty->assign('konto_bankowe', $arr['konto_bankowe']);	

    $smarty->assign('kontrahent_nazwa', $arr['kontrahent_nazwa']);
    $smarty->assign('kontrahent_adres', $arr['kontrahent_adres']);
    $smarty->assign('kontrahent_nip', $arr['kontrahent_nip']);

    $smarty->assign('sprzedawca_nazwa', 'Uslugi Protetyczne Jerzy Andryskowski');
    $smarty->assign('sprzedawca_adres', '80-246 Gdañsk, ul.Jaskowa Dolina 9/1');
    $smarty->assign('sprzedawca_nip', '584-000-01-05');

    //$suma_wartosc_vat=$arr['wartosc_netto_fv']*0.22;
    //$suma_wartosc_brutto=$arr['wartosc_netto_fv']*1.22;
    $suma_wartosc_vat=0;
    $suma_wartosc_brutto=$arr['wartosc_netto_fv'];
    $suma=array($arr['wartosc_netto_fv'],$suma_wartosc_vat,$suma_wartosc_brutto);
    $smarty->assign('tab_suma', $suma);
    //$smarty->assign('tab_suma', $_SESSION['tab_suma']);

        //pobranie danych zamowienia do faktury
$sql1="SELECT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.opiszlecenia FROM rozlicz_zleceniodawca as rz
         where rz.fv_nr='".$fv_nr."' 
		 ORDER BY rz.idzleceniapoz, rz.idzlecenianr";
//        $sql1="SELECT concat(ul.producent, ' ', ul.kategoria, ' ', ul.model) as urz, concat(ulm.producent, ' ', ulm.symbol) as mat,zm.ilosc,zm.cena,zm.idusera,zm.id FROM zamowienia_material as zm, urzadzenia_klienta as uk, urzadzenia_lista as ul, urzadzenia_lista_material as ulm
//        WHERE uk.id=zm.id_urzadzenia_klienta AND ul.id=uk.id_urzadzenia AND ulm.id=zm.id_materialu AND zm.fv_nr='".$fv_nr."' ORDER BY zm.data_zamowienia ";
    //echo $sql1.'<br>';
        $sql_result1=myquery($sql1);

        while($arr1 = mysql_fetch_assoc($sql_result1)){
          //echo '<b style="color:#ffffff;">'.$arr['urz'].', '.$arr['mat'].', '.$arr['ilosc'].', '.$arr['cena'].', '.$arr['idusera'].'</b><br />';
          //$wartosc_brutto=$arr1['kwota'];
          //$wartosc_netto=$wartosc_brutto/1.22;
          //$wartosc_vat=$wartosc_netto*0.22;
          $wartosc_brutto=$arr1['kwota'];
          $wartosc_netto=$wartosc_brutto;
          $wartosc_vat=0;
          $tab_el_fv[]=array('33.10.17','Prace protetyczne, zlecenie nr '.$arr1['idzlecenianr'].$arr1['idzleceniapoz'], 1, $wartosc_netto, $wartosc_vat, $wartosc_brutto, $arr1['idzlecenianr'], $arr1['idzleceniapoz']);//??????????????????????????????????????
          //$tab_el_fv[]=array($arr1['opiszlecenia'], 1, $wartosc_netto, $wartosc_vat, $wartosc_brutto, $arr1['idzlecenianr'], $arr1['idzleceniapoz']);//??????????????????????????????????????
          $suma_wartosc_netto=$suma_wartosc_netto+$wartosc_netto; //sumowanie wartosci netto do faktury
        }

    $smarty->assign('tab_el_fv', $tab_el_fv);
                            //,'PKWiU'=>'50'
    $t_opis=array('l.p.'=>'20','Nazwa towaru/us³ugi'=>'150','Ilo¶æ'=>'60', 'jm'=>'50', 'Cena <br />netto'=>'80', 'Stawka <br />VAT %'=>'80','Warto¶æ <br />netto'=>'80','Warto¶æ <br />VAT'=>'80','Warto¶æ <br />brutto'=>'80');
    $smarty->assign('tablica_opisy', $t_opis);

    //-----------------------------------------------------------------------------------------------------------
    
    $smarty->display('faktury_wydruk_historia.tpl');
?>

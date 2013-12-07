<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

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

//------------------------------------------------------------------------------------------------------------------
//czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// funkcja czyszczaca zmienne formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

require_once('../filterek/class.inputfilter_clean.php');

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

//echo 'test<br>';
if( isset($_POST['fv_nr']) ){
  //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $fv_nr = czysc_zmienne_formularza($_POST['fv_nr']);
  $status = czysc_zmienne_formularza($_REQUEST['status']);
  $zaplacono = czysc_zmienne_formularza($_POST['zaplacono']);
  $data_fv = czysc_zmienne_formularza($_POST['data_fv']);
  $sposob_zaplaty = czysc_zmienne_formularza($_POST['sposob_zaplaty']);
  $termin_zaplaty = czysc_zmienne_formularza($_POST['termin_zaplaty']);
  $data_zaplaty = czysc_zmienne_formularza($_POST['data_zaplaty']);
  $uwagi_fv = czysc_zmienne_formularza( addslashes($_POST['uwagi_fv']) );

if( $status=='usun' ){
    //wyczyscic dane faktury z tabeli faktury dane o tej fakturze i przy zamowieniach wyczyscic pola z nr fv

    $sql2="UPDATE rozlicz_zleceniodawca SET fv_nr='0' WHERE fv_nr='".$fv_nr."' ";
        echo $sql2.'<br>';
    $sql_result2=myquery($sql2);

    $sql3="DELETE FROM faktury WHERE fv_nr='".$fv_nr."' ";
        echo $sql3.'<br>';
    $sql_result3=myquery($sql3);
}
else{
    $sql="UPDATE faktury SET status='".$status."', kwota_zaplacona='".$zaplacono."', data_fv='".$data_fv."', sposob_zaplaty='".$sposob_zaplaty."', 
	                         termin_zaplaty='".$termin_zaplaty."', data_zaplaty='".$data_zaplaty."', uwagi_fv ='".$uwagi_fv."'
                         WHERE fv_nr='".$fv_nr."' ";
    $wy=myquery($sql);    //print_r($wy);
}
 
    header("Location: faktury_info.php?fv_nr=".$fv_nr."&komunikat=DANE ZOSTA£Y ZAKTUALIZOWANE&amp ");

}

}
else{
  header("Location: ../index.php");
}
?>

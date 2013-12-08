<?php
//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {

        //nawiazanie polaczenia z baza danych
        include('./inc/db_connect.inc.php');
        //pobranie wyniku zapytania
        $result = mysql_query($query);
        //zakonczenie polaczenia z baza danych
        include('./inc/db_close.inc.php');

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

if(isset($_POST['loginek']) && isset($_POST['haselko']) ) {

//czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
require_once('./inc/filtr_formularzy.inc.php');

   //zmienna do czyszczenia
   $log = czysc_zmienne_formularza($_POST['loginek']);
   $pass = czysc_zmienne_formularza($_POST['haselko']);

//koniec czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//sprawdzenie czy login i haslo znajduja sie w bazie i pobranie danych logujacej sie osoby
 $sql="select * from loguserpass where login='".$log."' and haselko='".MD5($pass)."' ";
 $sql_result=myquery($sql);

//pobranie wynikow zapytania do tablicy
 $arr = mysql_fetch_array($sql_result);

 //jezeli pin jest w bazie nastepuje logowanie do bazu
 if(mysql_numrows($sql_result)==1 && $arr['status']=='act') {

    session_start();

    $_SESSION['autoryzacjapracowni']="razdwatrzybabajagapatrzy";
    $_SESSION['idusera']=$arr['idusera'];
    $_SESSION['dostep']=$arr['dostep'];

    //dostep do strony zarzadzania zleceniami pracowni
    if($arr['dostep']=='zarzadzanie' || $arr['dostep']=='boss'){
            header("Location: biuro.php");
    }
    //dostep dla klientow do przegladania statusu zlecen
    elseif($arr['dostep']=='lekarz'){
            header("Location: /temp/tymczasowa.php");
    }

 }
 //jezeli status uzytkownika jest 'del'
 elseif(mysql_numrows($sql_result)==1 && $arr['status']<>'act'){
    echo '<br />NIE MO¯NA PO£¡CZYÆ SIÊ Z BAZ¡ DANYCH PONIEWA¯ TO KONTO U¯YTKOWNIKA ZOSTA£O ZABLOKOWANE, W CELU ODBLOKOWANIA DOSTÊPU SKONTAKTUJ SIÊ Z ADMINISTRATOREM SYSTEMU';
 }
 //jezeli nie wystepuje w bazie
 else {
     //echo MD5($pin).' - ';
    //licznik prob zwieksza sie o 1
    if(isset($_REQUEST['count'])>0) {
        $c=$_REQUEST['count']+1;
         //////////////////////////////////echo $c;
    }
    //jezeli byla to pierwsza proba licznik ustawiany jest na =1
    else{
        $c=1;
    }
    //jezeli licznik osiagnie 10 prob nieudanego logowania nastepuje zablokowanie konta u¿ytkownika
    //jest to mechanizm ochrony przed atakiem na baze
    if($c==10) {
        $sql="update loguserpass set status='del', datablokady='".date('H:i:s, d-n-Y')."' where login='".$log."'";
        $sql_result=myquery($sql);

        //ustawienie licznika w stan poczatkowy
        $c=1;//echo ' --------------- '.$c;
        echo '<br />U¯YTKOWNIK ZOSTA£ ZABLOKOWANY - ZBYT WIELE NIEUDANYCH PRÓB LOGOWANIA, W CELU ODBLOKOWANIA SKONTAKTUJ SIÊ Z ADMINISTRATOREM SYSTEMU';
    }
    //jezeli licznik jeszcze nie osiagnal 10 prob to wyswietla siê strona logowania ponownie
    else{
	   include('./inc/smarty_path.inc.php');
      echo '<br />liczba nieudanych prób logowania: '.$c;
        $smarty->assign('count', $c);
	     $smarty->display('login.tpl');
    }
 }
}
else {

      $godz_data = date('H:i:s, d-n-Y');
      echo $godz_data.'<br />';

      include('./inc/smarty_path.inc.php');

      //count przesylany na wypadek gdy nie podano ani loginu ani hasla
      $smarty->assign('count', $_REQUEST['count']);
      $smarty->display('login.tpl');

}
?>

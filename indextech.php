<?
//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {

        //nawiazanie polaczenia z baza danych
        include('./inc/db_connect.inc.php');
        //pobranie wyniku zapytania
        $result = mysql_query($query);
        //zakonczenie polaczenia z baza danych

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }

        include('./inc/db_close.inc.php');

        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

if(isset($_POST['pin'])) {

//czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
require_once('./inc/filtr_formularzy.inc.php');

        //zmienna do czyszczenia
	$pin = czysc_zmienne_formularza($_POST['pin']);

//koniec czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//sprawdzenie czy pin znajduje sie w bazie pinow i pobranie danych logujacej sie osoby
 $sql="select * from logpintech where pin='".MD5($pin)."' ";
 $sql_result=myquery($sql);

//pobranie wynikow zapytania do tablicy
 $arr = mysql_fetch_array($sql_result);

 //jezeli pin jest w bazie nastepuje logowanie do bazu
 if(mysql_numrows($sql_result)==1 && $arr['status']=='act') {

    session_start();

    $_SESSION['autoryzacjapracowni']="razdwatrzybabajagapatrzy";
    $_SESSION['idusera']=$arr['idusera'];
    $_SESSION['panelgorny']='techpin';
    //echo $_SESSION['idusera'].'<br>';
    $_SESSION['strona']='zlecenia_tech/addform_1.php';//'temp/tymczasowa.php';

    header("Location: pracownia.php");
 }
 //jezeli status uzytkownika jest 'del'
 elseif(mysql_numrows($sql_result)==1 && $arr['status']<>'act'){
    echo '<br />NIE MO¯NA PO£¡CZYÆ SIÊ Z BAZ¡ DANYCH PONIEWA¯ TO KONTO U¯YTKOWNIKA ZOSTA£O ZABLOKOWANE, W CELU ODBLOKOWANIA DOSTÊPU SKONTAKTUJ SIÊ Z ADMINISTRATOREM SYSTEMU';
 }
 //jezeli pin nie wystepuje w bazie
 else {
     //////////////////////////////////////echo MD5($pin).' - ';
    //licznik prob zwieksza sie o 1
    if(isset($_REQUEST['count'])>0) {
        $c=$_REQUEST['count']+1;
         //////////////////////////////////echo $c;
    }
    //jezeli byla to pierwsza proba licznik ustawiany jest na =1
    else{
        $c=1;
    }
    //jezeli licznik osiagnie 10 prob nieudanego logowania nastepuje zablokowanie IP
    //jest to mechanizm ochrony przed atakiem na baze
    if($c==10) {
        $sql="update logpinip set status='del', datablokady='".date('H:i:s, j-n-Y')."' where iplog='".$HTTP_SERVER_VARS['REMOTE_ADDR']."' ";
        $sql_result=myquery($sql);
        
        //ustawienie licznika w stan poczatkowy
        $c=1;//echo ' --------------- '.$c;
        echo '<br />IP ZOSTA£ ZABLOKOWANY - ZBYT WIELE NIEUDANYCH PRÓB LOGOWANIA, W CELU ODBLOKOWANIA SKONTAKTUJ SIÊ Z ADMINISTRATOREM SYSTEMU';
    }
    else{
      //pobranie IP komputera ktory sie laczy z baza
      $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];

      //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      require_once('./inc/filtr_formularzy.inc.php');
          //zmienna do czyszczenia
	  $ip = czysc_zmienne_formularza($ip);
          //echo $ip;
      //koniec czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

      //sprawdzenie czy ip znajduje sie w bazie ip dopuszczonych do logowania
      $sql="select * from logpinip where iplog='".$ip."' ";
      $sql_result=myquery($sql);

      //pobranie wynikow zapytania do tablicy
      $arr = mysql_fetch_array($sql_result);

      //jezeli IP jest dopuszczany do logowania wtedy nastepuje przekierowanie na strone z panelem logowania
      if(mysql_numrows($sql_result)==1 && $arr['status']=='act') {

	  include('./inc/smarty_path.inc.php');
          echo '<br />liczba nieudanych prób logowania: '.$c;
          $smarty->assign('count', $c);
	       $smarty->display('logintech.tpl');

      }
      else{
          echo '<br />NIE MO¯NA PO£¡CZYÆ SIÊ Z BAZ¡ DANYCH Z TEGO IP - '.$ip.', W CELU ODBLOKOWANIA DOSTÊPU SKONTAKTUJ SIÊ Z ADMINISTRATOREM SYSTEMU';
      }	

    }
 }
}
else {

      $godz_data = date('H:i:s, j-m-Y');
      echo $godz_data.'<br />';

      //pobranie IP komputera ktory sie laczy z baza
      $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];

      //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      require_once('./inc/filtr_formularzy.inc.php');
          //zmienna do czyszczenia
	  $ip = czysc_zmienne_formularza($ip);
          //echo $ip;
      //koniec czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

      //sprawdzenie czy ip znajduje sie w bazie ip dopuszczonych do logowania
      $sql="select * from logpinip where iplog='".$ip."' ";
      $sql_result=myquery($sql);

      //pobranie wynikow zapytania do tablicy
      $arr = mysql_fetch_array($sql_result);

      //jezeli IP jest dopuszczany do logowania wtedy nastepuje przekierowanie na strone z panelem logowania
      if(mysql_numrows($sql_result)==1 && $arr['status']=='act') {

	       include('./inc/smarty_path.inc.php');

          $smarty->assign('count', $_REQUEST['count']);
	       $smarty->display('logintech.tpl');

      }
      else{
          echo '<br />NIE MO¯NA PO£¡CZYÆ SIÊ Z BAZ¡ DANYCH Z TEGO IP - '.$ip.', W CELU ODBLOKOWANIA DOSTÊPU SKONTAKTUJ SIÊ Z ADMINISTRATOREM SYSTEMU';
      }	

}
?>

<?
//pobranie IP komputera ktory sie laczy z baza
      $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];

      //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      require_once('./inc/filtr_formularzy.inc.php');
          //zmienna do czyszczenia
	   $ip = czysc_zmienne_formularza($ip);
          //echo $ip;
      //koniec czyszczenia zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
      

if($ip=='127.0.0.1' || $ip=='192.168.51.4') {

  header("Location: indexpin.php");

}
else {
  header("Location: indexuserpass.php");
}

?>
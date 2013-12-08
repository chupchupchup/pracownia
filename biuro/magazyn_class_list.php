<?php

class Dane
{
 // nasza wlasciwosc, chroniona przed dostepem z zewnatrz
 protected $dane;// = array();

 function __construct($dane = array())
 {
 if (is_array($dane))
 $this->dane = $dane;
 else if ($dane instanceof Dane)
 $this->dane = $dane->pobierzJakoTablica();
 }

 // zwraca atrybut
 function __get($parametr)
 {
 if (isset($this->dane[$parametr]))
 return $this->dane[$parametr];
 return '';
 }

 // ustawia atrybut
 function __set($parametr, $wartosc)
 {
 $this->dane[$parametr] = $wartosc;
 }

 // zwraca dane w postaci listy par klucz='wartosc'
 // oddzielonych przez AND
 function pobierzListeDanych()
 {
   $list = '';
   foreach($this->dane as $atrybut => $wartosc)
   $list .= $atrybut.' LIKE \'%'.addslashes($wartosc).'%\' AND ';

   //echo 'list= '.substr($list, 0, -4).' <br />';
   return substr($list, 0, -4);
 }

 function pobierzListeDanych_edit()
 {
   $list = '';
   foreach($this->dane as $atrybut => $wartosc)
   $list .= $atrybut.' = \''.addslashes($wartosc).'\' AND ';

   //echo 'list_edit= '.substr($list, 0, -4).' <br />';
   return substr($list, 0, -4);
 }

 function pobierz_tablice(){

   foreach($this->dane as $atrybut => $wartosc)
     $tab[$atrybut] = $wartosc;
     
  return $tab;   
 }

 // zwraca dane w postaci listy par klucz='wartosc'
 // oddzielonych przecinkiem
 function ustawListeDanych()
 {
 $list = '';
 foreach($this->dane as $atrybut => $wartosc)
 $list .= $atrybut.' = \''.addslashes($wartosc).'\' , ';

 //echo 'list1= '.substr($list, 0, -2).' <br />';
 return substr($list, 0, -2);
 }

 // zwraca listê atrybutow oddzielonych przecinkiem
 function pobierzListeAtrybutow()
 {
 return join(', ', array_keys($this->dane));
 }

 // zwraca listê warto¶ci oddzielonych przecinkiem
 function pobierzListeWartosci()
 {
 $values = array();
 foreach($this->dane as $wartosc)
 $values[] = '\''.addslashes($wartosc).'\'';
 return join(', ', $values);
 }

 // zwraca dane w postaci tablicy (zwraca przez wartosc)
 function pobierzJakoTablica()
 {
 return $this->dane;
 }

 function wyswietl()
 {
/*
  print_r($this->dane[0]);
  echo '<br>';echo '<br>';
  print_r($this->dane[1]);
  echo '<br>';echo '<br>';
  print_r($this->dane[2]);
  echo '<br>';echo '<br>';
  print_r($this->dane[3]);
  echo '<br>';echo '<br>';
*/
  //nie wiem dlaczego ale trzeba zadeklarowac zeby dzialalo smarty
  $smarty = new Smarty();
  global $smarty;

  $smarty->assign('wyswietl_keys', $this->dane[0]);
  $smarty->assign('wyswietl', $this->dane[1]);
  $smarty->assign('pages_count', $this->dane[2]);
  $smarty->assign('page_number', $this->dane[3]);
  $smarty->assign('nr_strony', $this->dane[4]);

  $smarty->assign('ID', 'wyszukaj');
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'magazyn_wyswietl.tpl');
  //$smarty->display('wyswietl.tpl');
 }

 function wyswietl_edycja($info)
 {
  //nie wiem dlaczego ale trzeba zadeklarowac zeby dzialalo smarty
  $smarty = new Smarty();
  global $smarty;

  $smarty->assign('wyswietl_edycja', $this->dane[0]);
  $smarty->assign('osoba_pobierajaca', $this->dane[1]);
  $smarty->assign('ID', 'wyszukaj');
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'magazyn_wyswietl_edycja.tpl');
  $smarty->assign('info', $info);
  $smarty->assign('wyswietl_wynik_szukaj', $_SESSION['wyswietl_wynik_szukaj']);

 }

 function wyswietl_podmagazyn()
 {
  //nie wiem dlaczego ale trzeba zadeklarowac zeby dzialalo smarty
  $smarty = new Smarty();
  global $smarty;

  $smarty->assign('wyswietl_keys', $this->dane[0]);
  $smarty->assign('wyswietl', $this->dane[1]);
  $smarty->assign('pages_count', $this->dane[2]);
  $smarty->assign('page_number', $this->dane[3]);
  $smarty->assign('nr_strony', $this->dane[4]);

  $smarty->assign('ID', 'wyszukaj_podmagazyn');
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'magazyn_wyswietl_podmagazyn.tpl');
  $smarty->assign('wyswietl_wynik_szukaj', $_SESSION['wyswietl_wynik_szukaj_podmagazyn']);
  //echo $_SESSION['wyswietl_wynik_szukaj_podmagazyn'].'<br>';
 }

 function wyswietl_edycja_podmagazyn($info)
 {
  //nie wiem dlaczego ale trzeba zadeklarowac zeby dzialalo smarty
  $smarty = new Smarty();
  global $smarty;

  $smarty->assign('wyswietl_edycja', $this->dane[0]);
  $smarty->assign('osoba_wykorzystujaca', $this->dane[1]);
  $smarty->assign('ID', 'wyszukaj_podmagazyn');
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'magazyn_wyswietl_podmagazyn_edycja.tpl');
  $smarty->assign('info', $info);
  $smarty->assign('wyswietl_wynik_szukaj_podmagazyn', $_SESSION['wyswietl_wynik_szukaj_podmagazyn']);

 }

}


class Magazyn
{

 //
 function pobierz_dane ($sql) {

   $f=array();
   while ($row = mysql_fetch_row($sql)) {
        $f[] = $row;
   }
  return $f;
 }

 //
 function pobierz(Dane $szukamy, $strona, $czyData, $dataOd, $dataDo)
 {
   //include('./inc/table_menu_arrays.inc.php');
   $wyszukaj_template_table_menu=array('Nazwa'=>'200','Data'=>'100','Ilo¶æ ca³kowita'=>'150','Ilo¶æ pozosta³a'=>'150','Cena zakupu'=>'100','Wpisuj±cy'=>'130');

   include('./inc/db_connect.inc.php');

   if($czyData=='takData'){
     $data="AND data_dodania>='".$dataOd."' AND data_dodania<='".$dataDo."' ";
   }
   else {
     $data='';
   }
   
   //Pobranie liczby rekordów
   $query_count = mysql_query('SELECT count(*) FROM material WHERE '.$szukamy->pobierzListeDanych().' '.$data );
       //echo 'query_count = '.'SELECT count(*) FROM material WHERE '.$szukamy->pobierzListeDanych().' '.$data .' <br>';
   $r = mysql_fetch_array($query_count);
   //Liczba stron, u¿ycie ceil - zaokr±glenie w górê, w celu zapewnienia, ¿e ¿adna strona siê nie straci
   //echo $r[0].'<br>';
   $pages = ceil($r[0]/15);
   $offset=$strona*15;

   //Pobranie wynikow od offset do offset+15
   $query = mysql_query('SELECT * FROM material WHERE '.$szukamy->pobierzListeDanych().' '.$data.'LIMIT '.$offset.',15' );
       //echo 'query = '.'SELECT * FROM material WHERE '.$szukamy->pobierzListeDanych().' '.$data.'LIMIT '.$offset.',15'.' <br>';

   include('./inc/db_close.inc.php');

   $pobrane=array($wyszukaj_template_table_menu, $this->pobierz_dane($query), $pages, $strona, 'wyswietl');

   if (mysql_num_rows($query))
   return new Dane( $pobrane );
   return false;

 }

 // DO EDYCJI
 function pobierz_edit(Dane $szukamy)
 {
   //$wyszukaj_template_table_menu=array('Nazwa'=>'200','Data'=>'100','Ilo¶æ ca³kowita'=>'150','Ilo¶æ pozosta³a'=>'150','Cena zakupu'=>'100','Wpisuj±cy'=>'130');

   include('./inc/db_connect.inc.php');

   //Pobranie wynikow od offset do offset+15
   $query = mysql_query('SELECT * FROM material WHERE '.$szukamy->pobierzListeDanych_edit().' ' );

   //pobranie ID pracownikow
   $query1=mysql_query('SELECT pracownikid FROM pracownicy'); //WHERE stanowisko="technik" ');
   //$pracownik[]=''; //jezeli pracownik nie jest ustawiony lub ma byc to opcja pusta
     while( $ar = mysql_fetch_assoc($query1) ) {
       $pracownik[]=$ar['pracownikid'];
     }

   include('./inc/db_close.inc.php');

   //$pobrane=array($wyszukaj_template_table_menu, $this->pobierz_dane($query), $pages, $strona);
   $pobrane=array($this->pobierz_dane($query),$pracownik);

   if (mysql_num_rows($query))
   return new Dane( $pobrane );
   return false;

 }

 // DO EDYCJI PODMAGAZYN
 function pobierz_edit_podmagazyn(Dane $szukamy)
 {
   //$wyszukaj_template_table_menu=array('Nazwa'=>'200','Data'=>'100','Ilo¶æ ca³kowita'=>'150','Ilo¶æ pozosta³a'=>'150','Cena zakupu'=>'100','Wpisuj±cy'=>'130');

   include('./inc/db_connect.inc.php');

   //Pobranie wynikow od offset do offset+15
   $query = mysql_query('SELECT * FROM material_user WHERE '.$szukamy->pobierzListeDanych_edit().' ' );

//echo 'SELECT * FROM material_user WHERE '.$szukamy->pobierzListeDanych_edit().' ';

   //pobranie ID pracownikow
   $query1=mysql_query('SELECT pracownikid FROM pracownicy'); //WHERE stanowisko="technik" ');
   //$pracownik[]=''; //jezeli pracownik nie jest ustawiony lub ma byc to opcja pusta
     while( $ar = mysql_fetch_assoc($query1) ) {
       $pracownik[]=$ar['pracownikid'];
     }

   include('./inc/db_close.inc.php');

   //$pobrane=array($wyszukaj_template_table_menu, $this->pobierz_dane($query), $pages, $strona);
   $pobrane=array($this->pobierz_dane($query),$pracownik);

   if (mysql_num_rows($query))
   return new Dane( $pobrane );
   return false;

 }

 // DO ZAMOWIENIA bo sie konczy
 function pobierz_material()
 {
   $wyszukaj_template_table_menu=array('Nazwa'=>'200','Data'=>'100','Ilo¶æ ca³kowita'=>'150','Ilo¶æ pozosta³a'=>'150','Cena zakupu'=>'100','Wpisuj±cy'=>'130');

   include('./inc/db_connect.inc.php');

     $pobierz="SELECT * FROM material WHERE ilosc_pozostala <= ilosc_calkowita/4 AND status='act'";
     //$pobierz='SELECT * FROM material WHERE 1';
     $query = mysql_query($pobierz);

   //Pobranie liczby rekordów
   $query_count = mysql_query($pobierz);
   $r = mysql_fetch_array($query_count);
   $pages = ceil($r[0]/15);
   $offset=$strona*15;

   include('./inc/db_close.inc.php');

   $pobrane=array($wyszukaj_template_table_menu, $this->pobierz_dane($query), $pages, $strona);

   if (mysql_num_rows($query))
   return new Dane( $pobrane );
   return false;

 }

// POBIERZ Z PODMAGAZYNU
 function pobierz_podmagazyn(Dane $szukamy, $strona, $czyData, $dataOd, $dataDo)
 {
   //include('./inc/table_menu_arrays.inc.php');
   $wyszukaj_template_table_menu=array('Nazwa'=>'200','Ilo¶æ'=>'150','Cena materia³u'=>'150','Wykorzystuj±cy'=>'130','Data'=>'100');

   include('./inc/db_connect.inc.php');

   if($czyData=='takData'){
     $data="AND data_pobrania>='".$dataOd."' AND data_pobrania<='".$dataDo."' ";
   }
   else {
     $data='';
   }

   //Pobranie liczby rekordów
   $query_count = mysql_query('SELECT count(*) FROM material_user WHERE '.$szukamy->pobierzListeDanych().' '.$data );
       //echo 'query_count = '.'SELECT count(*) FROM material_user WHERE '.$szukamy->pobierzListeDanych().' '.$data.' <br>';
   $r = mysql_fetch_array($query_count);
   //Liczba stron, u¿ycie ceil - zaokr±glenie w górê, w celu zapewnienia, ¿e ¿adna strona siê nie straci
   //echo $r[0].'<br>';
   $pages = ceil($r[0]/15);
   $offset=$strona*15;

   //Pobranie wynikow od offset do offset+15
   $query = mysql_query('SELECT * FROM material_user WHERE '.$szukamy->pobierzListeDanych().' '.$data.'LIMIT '.$offset.',15' );
       //echo 'query_count = '.'SELECT * FROM material_user WHERE '.$szukamy->pobierzListeDanych().' '.$data.'LIMIT '.$offset.',15'.' <br>';

   include('./inc/db_close.inc.php');

   $pobrane=array($wyszukaj_template_table_menu, $this->pobierz_dane($query), $pages, $strona, 'wyswietl');

   if (mysql_num_rows($query))
   return new Dane( $pobrane );
   return false;

 }

 function dodaj(Dane $dane)
 {
   include('./inc/db_connect.inc.php');
     mysql_query('INSERT INTO material ('.$dane->pobierzListeAtrybutow().') VALUES('.$dane->pobierzListeWartosci().')');

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function dodaj_pobrany_material(Dane $dane)
 {
   include('./inc/db_connect.inc.php');
     mysql_query('INSERT INTO material_user ('.$dane->pobierzListeAtrybutow().') VALUES('.$dane->pobierzListeWartosci().')');

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function aktualizuj(Dane $dane1, Dane $dane2)
 {
   include('./inc/db_connect.inc.php');
     mysql_query('UPDATE material SET '.$dane1->ustawListeDanych().' WHERE '.$dane2->pobierzListeDanych_edit().' ');

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function aktualizuj_podmagazyn(Dane $dane1, Dane $dane2)
 {
   include('./inc/db_connect.inc.php');
     mysql_query('UPDATE material_user SET '.$dane1->ustawListeDanych().' WHERE '.$dane2->pobierzListeDanych_edit().' ');

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function aktualizuj_podmagazyn_update(Dane $dane1, Dane $dane2)
 {
   include('./inc/db_connect.inc.php');
     //echo 'aktualizuj podmagazyn update <br>';

     $tab_dane1=$dane1->pobierz_tablice();
     $cena_zakupu=$tab_dane1['cena_zakupu'];
     $ilosc_calkowita=$tab_dane1['ilosc_calkowita'];
     //echo $cena_zakupu.' - cena zakupu<br>';
     //echo $ilosc_calkowita.' - ilosc_calkowita<br>';

     $query = mysql_query("SELECT id_material_user,ilosc FROM material_user WHERE ".$dane2->pobierzListeDanych_edit()." ");
     while( $arr = mysql_fetch_assoc($query) ) {
   
	   $ilosc_do_pobrania=$arr['ilosc'];
       $cena_materialu=$cena_zakupu*($ilosc_do_pobrania/$ilosc_calkowita);
       //echo $ilosc_do_pobrania.' , '.$cena_materialu.'<br>'; 
       $ustaw_dane = "nazwa='".$tab_dane1['nazwa']."', jednostka_miary='".$tab_dane1['jednostka_miary']."', producent='".$tab_dane1['producent']."', nr_seryjny='".$tab_dane1['nr_seryjny']."', cena_materialu='".round($cena_materialu, 2)."' ";
       //echo '<br>'.$ustaw_dane.'<br>';  
       mysql_query("UPDATE material_user SET ".$ustaw_dane." WHERE id_material_user='".$arr['id_material_user']."' ");
     }
	  
   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function usun(Dane $dane)
 {
   include('./inc/db_connect.inc.php');
     mysql_query('UPDATE material SET status=\'del\' WHERE '.$dane->pobierzListeDanych_edit().' ');

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function nie_usun(Dane $dane)
 {
   include('./inc/db_connect.inc.php');
     mysql_query('UPDATE material SET status=\'act\' WHERE '.$dane->pobierzListeDanych_edit().' ');

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function wyk_usun(Dane $dane)
 {
   include('./inc/db_connect.inc.php');
     mysql_query('UPDATE material SET status=\'wyk\' WHERE '.$dane->pobierzListeDanych_edit().' ');

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

 function usun_podmagazyn(Dane $dane, $status)
 {
   include('./inc/db_connect.inc.php');
     mysql_query("UPDATE material_user SET status='".$status."' WHERE ".$dane->pobierzListeDanych_edit()." ");

   if (mysql_affected_rows())
   return true;
   return false;

   include('./inc/db_close.inc.php');
 }

}

?>

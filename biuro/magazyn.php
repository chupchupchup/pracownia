<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

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
	  //wyszukiwanie zlecen dopisanych
//	  $sql="SELECT count(*) as count FROM zlecenieinfo WHERE wpis='new' ";
//          $sql_result=myquery($sql);
//          $arr = mysql_fetch_assoc($sql_result);
//	  $smarty->assign('liczba_nowych', $arr['count']);
//------------------------------------------------------------------------------------------------------------------

require('magazyn_class_list.php');

// najpierw przygotujmy sobie obiekt klasy Magazyn
$mag = new Magazyn;

//--------------------------------------------
if($_REQUEST['wpis']=='wyszukaj'){

	  $sql="SELECT pracownikid FROM pracownicy  ";
	  $wy=myquery($sql);
          //zrobic z tego normalna tablice
          $pracownik[]=''; //jezeli pracownik nie jest ustawiony lub ma byc to opcja pusta
          while( $ar = mysql_fetch_assoc($wy) ) {
            $pracownik[]=$ar['pracownikid'];
          }
          $smarty->assign('osoba_dodajaca', $pracownik);


          $dzien=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
          $smarty->assign('dzien', $dzien);

          $M=date('m');//aktualny miesiac
          if($M<10){$M='0'.$M;}
          $smarty->assign('M', $M);
          $miesiac=array('01','02','03','04','05','06','07','08','09','10','11','12');
          $smarty->assign('miesiac', $miesiac);

          $Y=date('Y');//aktualny rok
          $smarty->assign('Y', $Y);
          for($i=2008;$i<=$Y+1;$i++){
             $rok[]=$i;
          }
          $smarty->assign('rok', $rok);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'magazyn_wyszukaj.tpl');

  $smarty->assign('ID', 'wyszukaj');
}
//--------------------------------------------
elseif($_REQUEST['szukaj']=='zaawansowane'){

 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');

// teraz szukamy:
$szukamy = new Dane; // tworzymy now± tablicê na dane

if( isset($_POST['nazwa']) || isset($_POST['osoba_dodajaca']) || isset($_POST['czyData']) ){
  //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $nazwa = czysc_zmienne_formularza($_POST['nazwa']);
  $czyData = czysc_zmienne_formularza($_POST['czyData']);
  $dataodY = czysc_zmienne_formularza($_POST['dataodY']);
  $dataodM = czysc_zmienne_formularza($_POST['dataodM']);
  $dataodD = czysc_zmienne_formularza($_POST['dataodD']);
  $datadoY = czysc_zmienne_formularza($_POST['datadoY']);
  $datadoM = czysc_zmienne_formularza($_POST['datadoM']);
  $datadoD = czysc_zmienne_formularza($_POST['datadoD']);
  $osoba_dodajaca = czysc_zmienne_formularza($_POST['osoba_dodajaca']);

  $dataOd=$dataodY.'-'.$dataodM.'-'.$dataodD;
  $dataDo=$datadoY.'-'.$datadoM.'-'.$datadoD;
  
    //echo $_POST['nazwa'].' - POST nazwa<br>';
  $szukamy->nazwa = $_POST['nazwa']; // podajemy np. nazwê szukanego materia³u
  $szukamy->osoba_dodajaca = $_POST['osoba_dodajaca']; // podajemy np. wpisujacego uzytkownika

  // zapamientujemy wyszukiwanie w zmiennej sesyjnej zeby mozna bylo skakac po stronach wyszukiwania
  $_SESSION['czyData']=$czyData;
  $_SESSION['dataOd']=$dataOd;
  $_SESSION['dataDo']=$dataDo;
  $_SESSION['nazwa']=$nazwa;
  $_SESSION['osoba_dodajaca']=$osoba_dodajaca;
  $_SESSION['wyswietl_wynik_szukaj']='szukaj';
}
// jezeli dane sa przekazywane przez link do wyswietlenia ktorejs ze stron wynikow
elseif( ( isset($_SESSION['nazwa']) || isset($_SESSION['osoba_dodajaca']) || isset($_SESSION['dataOd']) || isset($_SESSION['dataDo']) ) && !isset($_POST['nazwa']) && !isset($_POST['osoba_dodajaca']) && !isset($_POST['czyData']) ) {
  $szukamy->nazwa = $_SESSION['nazwa']; // podajemy np. nazwisko szukanego uzytkownika
  $szukamy->osoba_dodajaca = $_SESSION['osoba_dodajaca']; // podajemy np. imie szukanego uzytkownika
  $dataOd=$_SESSION['dataOd'];
  $dataDo=$_SESSION['dataDo'];
  $czyData = $_SESSION['czyData'];
}
else{
  header("Location: biuro.php?strona=magazyn&wpis=wyszukaj");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
}

if(!isset($_REQUEST['str']) ){
  $str=0;
}
else {
  $str=$_REQUEST['str'];
}
  //echo $str.' - numer strony<br>';

  $material = $mag->pobierz($szukamy,$str,$czyData,$dataOd,$dataDo); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam materia³

if($material!=false){

//  echo '<br>';  print_r($material);  echo '<br>';
//  $material=$material->pobierzJakoTablica();
//  $smarty->assign('wyswietl_keys', $material[0]);
//  $smarty->assign('wyswietl', $material[1]);
//  $smarty->assign('pages_count', $material[2]);
//  $smarty->assign('page_number', $material[3]);
//  $smarty->assign('ID', 'wyszukaj');
//  $smarty->assign('sub', 'tak');
//  $smarty->assign('plik', 'magazyn_wyswietl.tpl');

  $material->wyswietl(); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
}
else{
  //header("Location: biuro.php?strona=magazyn&wpis=wyszukaj");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
}

}

//--------------------------------------------
elseif($_REQUEST['wpis']=='dodaj'){

  $smarty->assign('ID', 'dodaj');

//pobrac z bazy nazwy dostawców i przeslac do szablonu
  $sql="SELECT nazwa FROM material_dostawcy";
  $wyn=myquery($sql);

    $dostawca[]='';
    while( $ar = mysql_fetch_assoc($wyn) ) {
      $dostawca[]=$ar['nazwa'];
    }
    $smarty->assign('dostawca', $dostawca);
  
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'magazyn_dodaj.tpl');
}
elseif($_REQUEST['dodaj']=='dodaj_form'){
 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');

// teraz szukamy:
$dodaj = new Dane; // tworzymy now± jakby tablicê na dane

if( isset($_POST['nazwa']) || isset($_POST['ilosc_calkowita']) || isset($_POST['cena_zakupu']) ){
  //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $nazwa = czysc_zmienne_formularza($_POST['nazwa']);
  $ilosc_calkowita = czysc_zmienne_formularza($_POST['ilosc_calkowita']);
  $cena_zakupu = czysc_zmienne_formularza($_POST['cena_zakupu']);
  $jednostka_miary = czysc_zmienne_formularza($_POST['jednostka_miary']);
  $producent = czysc_zmienne_formularza($_POST['producent']);
  $nr_seryjny = czysc_zmienne_formularza($_POST['nr_seryjny']);
  $dostawca = czysc_zmienne_formularza($_POST['dostawca']);
  $data_dodania=date('Y-m-d');
  $osoba_dodajaca=$_SESSION['idusera'];
  $ilosc_pozostala=$ilosc_calkowita;

  // zapamientujemy wyszukiwanie w zmiennej sesyjnej zeby mozna bylo skakac po stronach wyszukiwania
  $_SESSION['nazwa']=$nazwa;

  $dodaj->nazwa = $nazwa;
  $dodaj->ilosc_calkowita = $ilosc_calkowita;
  $dodaj->cena_zakupu = $cena_zakupu;
  $dodaj->jednostka_miary = $jednostka_miary;
  $dodaj->data_dodania = $data_dodania;
  $dodaj->osoba_dodajaca = $osoba_dodajaca;
  $dodaj->ilosc_pozostala = $ilosc_pozostala;
  $dodaj->producent = $producent;
  $dodaj->nr_seryjny = $nr_seryjny;
  $dodaj->dostawca = $dostawca;

  $dodany_material = $mag->dodaj($dodaj); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam Material

  if($dodany_material==true){
    $dodany_material = $mag->pobierz($dodaj,0,'nie',0,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $dodany_material->wyswietl(); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    echo 'dane nie zostaly dodane<br>';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }

}

}

//--------------------------------------------
elseif($_REQUEST['wpis']=='edycja'){

$edycja = new Dane; // tworzymy now± jakby tablicê na dane
$edycja->id_material = $_REQUEST['indeks']; // podajemy indeks edytowanego materialu

$edytowany_material = $mag->pobierz_edit($edycja); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam Material

//pobrac z bazy nazwy dostawców i przeslac do szablonu
  $sql="SELECT nazwa FROM material_dostawcy";
  $wyn=myquery($sql);
    $dostawca[]='';
	while( $ar = mysql_fetch_assoc($wyn) ) {
      $dostawca[]=$ar['nazwa'];
    }
    $smarty->assign('dostawca', $dostawca);

  if($edytowany_material!=false){
    $info='';
    $edytowany_material->wyswietl_edycja($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  elseif($edytowany_material==false){
    echo '<br>nie zostaly pobrane dane do edycji <br>';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }

     //echo 'indeks - '.$_REQUEST['indeks'].'<br>';
}

//--------------------------------------------
elseif($_REQUEST['wpis']=='update'){
//pobrac z bazy nazwy dostawców i przeslac do szablonu
  $sql="SELECT nazwa FROM material_dostawcy";
  $wyn=myquery($sql);
    $dostawca[]='';
	while( $ar = mysql_fetch_assoc($wyn) ) {
      $dostawca[]=$ar['nazwa'];
    }
    $smarty->assign('dostawca', $dostawca);

$zmien = new Dane; // tworzymy now± jakby tablicê na dane
//$zmien->id_material = $_POST['indeks'];
$zmien->nazwa = $_POST['nazwa'];
$zmien->ilosc_calkowita = $_POST['ilosc_calkowita'];
$zmien->ilosc_pozostala = $_POST['ilosc_calkowita']-$_POST['ilosc_pobrana'];
$zmien->cena_zakupu = $_POST['cena_zakupu'];
$zmien->jednostka_miary = $_POST['jednostka_miary'];
$zmien->producent = $_POST['producent'];
$zmien->nr_seryjny = $_POST['nr_seryjny'];
$zmien->dostawca = $_POST['dostawca'];

$zmien1 = new Dane; // tworzymy now± jakby tablicê na dane
$zmien1->id_material = $_POST['indeks']; // podajemy indeks rekordu ktory bedziemy aktualizowac

$zmien_material = $mag->aktualizuj($zmien,$zmien1); // aktualizujemy dane w bazie

  if($zmien_material==true){
    
    $zmien_podmagazyn = new Dane; // tworzymy now± jakby tablicê na dane
	$zmien_podmagazyn->nazwa = $_POST['nazwa'];
	$zmien_podmagazyn->jednostka_miary = $_POST['jednostka_miary'];
	$zmien_podmagazyn->producent = $_POST['producent'];
    $zmien_podmagazyn->nr_seryjny = $_POST['nr_seryjny'];
    $zmien_podmagazyn->dostawca = $_POST['dostawca'];
	$zmien_podmagazyn->cena_zakupu = $_POST['cena_zakupu'];    
	$zmien_podmagazyn->ilosc_calkowita = $_POST['ilosc_calkowita'];
    $zmien_material_podmagazyn = $mag->aktualizuj_podmagazyn_update($zmien_podmagazyn,$zmien1); // aktualizujemy dane w bazie

    $zmien_material = $mag->pobierz_edit($zmien1,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $info='dane zosta³y zaktualizowane';
    $zmien_material->wyswietl_edycja($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    $zmien_material = $mag->pobierz_edit($zmien1,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $info='dane nie zostaly zmienione';
    $zmien_material->wyswietl_edycja($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
    //header("Location: ");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }
}

elseif( $_REQUEST['usun']=='wyk' ){

$usun1 = new Dane; // tworzymy now± jakby tablicê na dane
$usun1->id_material = $_REQUEST['indeks']; // podajemy nazwisko dodawanego uzytkownika itd.

$usun = new Dane; // tworzymy now± jakby tablicê na dane
$usun->id_material = $_REQUEST['indeks']; // podajemy nazwisko dodawanego uzytkownika itd.
$usun->nazwa = $_REQUEST['nazwa'];
$usun->ilosc_calkowita = $_REQUEST['ilosc_calkowita'];
$usun->ilosc_pozostala = $_REQUEST['ilosc_pozostala'];
$usun->cena_zakupu = $_REQUEST['cena_zakupu'];
$usun->jednostka_miary = $_REQUEST['jednostka_miary'];
$usun->data_dodania = $_REQUEST['data_dodania'];

$usuwany_material = $mag->wyk_usun($usun1); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika

  if($usuwany_material!=false){

    $usun_material_podmagazyn = $mag->usun_podmagazyn($usun1,'wyk'); // aktualizujemy dane w bazie

    $usuwany_material = $mag->pobierz_edit($usun,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $info='materia³ zosta³ wykorzystany';
    $usuwany_material->wyswietl_edycja($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    echo 'materia³ nie zosta³ ustawiony jako wykorzystany';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }
}

elseif( $_REQUEST['usun']=='tak' ){

$usun1 = new Dane; // tworzymy now± jakby tablicê na dane
$usun1->id_material = $_REQUEST['indeks']; // podajemy nazwisko dodawanego uzytkownika itd.

$usun = new Dane; // tworzymy now± jakby tablicê na dane
$usun->id_material = $_REQUEST['indeks']; // podajemy nazwisko dodawanego uzytkownika itd.
$usun->nazwa = $_REQUEST['nazwa'];
$usun->ilosc_calkowita = $_REQUEST['ilosc_calkowita'];
$usun->ilosc_pozostala = $_REQUEST['ilosc_pozostala'];
$usun->cena_zakupu = $_REQUEST['cena_zakupu'];
$usun->jednostka_miary = $_REQUEST['jednostka_miary'];
$usun->data_dodania = $_REQUEST['data_dodania'];

$usuwany_material = $mag->usun($usun1); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika

  if($usuwany_material!=false){

    $usun_material_podmagazyn = $mag->usun_podmagazyn($usun1,'del'); // aktualizujemy dane w bazie

    $usuwany_material = $mag->pobierz_edit($usun,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $info='materia³ zosta³ usuniêty';
    $usuwany_material->wyswietl_edycja($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    echo 'dane nie zostaly usuniête';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }
}

elseif( $_REQUEST['usun']=='nie' ){

$usun1 = new Dane; // tworzymy now± jakby tablicê na dane
$usun1->id_material = $_REQUEST['indeks']; // podajemy nazwisko dodawanego uzytkownika itd.

$usun = new Dane; // tworzymy now± jakby tablicê na dane
$usun->id_material = $_REQUEST['indeks']; // podajemy nazwisko dodawanego uzytkownika itd.
$usun->nazwa = $_REQUEST['nazwa'];
$usun->ilosc_calkowita = $_REQUEST['ilosc_calkowita'];
$usun->ilosc_pozostala = $_REQUEST['ilosc_pozostala'];
$usun->cena_zakupu = $_REQUEST['cena_zakupu'];
$usun->jednostka_miary = $_REQUEST['jednostka_miary'];
$usun->data_dodania = $_REQUEST['data_dodania'];
//echo $_REQUEST['data_dodania'].'<br>';

$usuwany_material = $mag->nie_usun($usun1); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika

  if($usuwany_material!=false){

    $usun_material_podmagazyn = $mag->usun_podmagazyn($usun1,'act'); // aktualizujemy dane w bazie

    $usuwany_material = $mag->pobierz_edit($usun,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $info='materia³ zosta³y przywrócony';
    $usuwany_material->wyswietl_edycja($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    echo '<br>dane nie zostaly przywrócone<br>';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }
}

//--------------------------------------------
elseif($_REQUEST['wpis']=='pobierz'){

$pobierz = new Dane; // tworzymy now± jakby tablicê na dane
$pobierz->id_material = $_POST['indeks']; // podajemy indeks edytowanego materialu

$pobierz->nazwa = $_POST['nazwa'];
$pobierz->producent = $_POST['producent'];
$pobierz->nr_seryjny = $_POST['nr_seryjny'];
$pobierz->dostawca = $_POST['dostawca'];
$pobierz->osoba_wykorzystujaca = $_POST['osoba_wykorzystujaca'];

$data_pobrania=date('Y-m-d');
$pobierz->data_pobrania = $data_pobrania;

$cena_materialu=$_POST['cena']*($_POST['ilosc_do_pobrania']/$_POST['ilosc_calkowita']);
$pobierz->cena_materialu = round($cena_materialu, 2);
//echo round($cena_materialu, 2).'<br>';

$pobierz->jednostka_miary = $_POST['jednostka_miary'];

if( ($_POST['ilosc_pozostala']-$_POST['ilosc_do_pobrania']) >=0 ){
  $pobierz->ilosc = $_POST['ilosc_do_pobrania'];

//aktualizujemy tabele material i odejmujemy ilosc pobrana materialu
  $zmien = new Dane; // tworzymy now± jakby tablicê na dane
  $zmien->ilosc_pozostala = $_POST['ilosc_pozostala']-$_POST['ilosc_do_pobrania'];
  $zmien1 = new Dane; // tworzymy now± jakby tablicê na dane
  $zmien1->id_material = $_POST['indeks']; // podajemy indeks rekordu ktory bedziemy aktualizowac
  $zmien_material = $mag->aktualizuj($zmien,$zmien1); // aktualizujemy dane w bazie
//--------------------

  $pobrany_material = $mag->dodaj_pobrany_material($pobierz); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam Material
}
else {
    //ERROR
}

  if($pobrany_material==true){
    $pobrany_material = $mag->pobierz_podmagazyn($pobierz,0,'nie','',''); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam Materail pobrany
    $pobrany_material->wyswietl_podmagazyn(); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    echo 'dane nie zostaly dodane';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }

}

//--------------------------------------------
elseif($_REQUEST['wpis']=='do_zamowienia'){

//$edycja = new Dane; // tworzymy now± jakby tablicê na dane
//$edycja->id_material = $_REQUEST['indeks']; // podajemy indeks edytowanego materialu

 $pobierz_material = $mag->pobierz_material(); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika

  if($pobierz_material!=false){
    $pobierz_material->wyswietl(); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    echo 'dane nie zostaly pobrane<br>';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }

  $smarty->assign('ID', 'do_zamowienia');

  //$smarty->assign('sub', 'tak');
  //$smarty->assign('plik', 'magazyn_dodaj.tpl');
}

//--------------------------------------------
elseif($_REQUEST['wpis']=='wyszukaj_podmagazyn'){

	  $sql="SELECT pracownikid FROM pracownicy  ";
	  $wy=myquery($sql);
          //zrobic z tego normalna tablice
          $pracownik[]=''; //jezeli pracownik nie jest ustawiony lub ma byc to opcja pusta
          while( $ar = mysql_fetch_assoc($wy) ) {
            $pracownik[]=$ar['pracownikid'];
          }
          $smarty->assign('osoba_wykorzystujaca', $pracownik);


          $dzien=array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
          $smarty->assign('dzien', $dzien);

          $M=date('m');//aktualny miesiac
          if($M<10){$M='0'.$M;}
          $smarty->assign('M', $M);
          $miesiac=array('01','02','03','04','05','06','07','08','09','10','11','12');
          $smarty->assign('miesiac', $miesiac);

          $Y=date('Y');//aktualny rok
          $smarty->assign('Y', $Y);
          for($i=2008;$i<=$Y+1;$i++){
             $rok[]=$i;
          }
          $smarty->assign('rok', $rok);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'magazyn_wyszukaj_podmagazyn.tpl');

  $smarty->assign('ID', 'wyszukaj_podmagazyn');
}
//--------------------------------------------
elseif($_REQUEST['szukaj']=='zaawansowane_podmagazyn'){

 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');

// teraz szukamy:
$szukamy = new Dane; // tworzymy now± tablicê na dane

if( isset($_POST['nazwa']) || isset($_POST['podmagazyn_osoba_wykorzystujaca']) || isset($_POST['czyData']) ){
  //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $nazwa = czysc_zmienne_formularza($_POST['nazwa']);
  $czyData = czysc_zmienne_formularza($_POST['czyData']);
  $dataodY = czysc_zmienne_formularza($_POST['dataodY']);
  $dataodM = czysc_zmienne_formularza($_POST['dataodM']);
  $dataodD = czysc_zmienne_formularza($_POST['dataodD']);
  $datadoY = czysc_zmienne_formularza($_POST['datadoY']);
  $datadoM = czysc_zmienne_formularza($_POST['datadoM']);
  $datadoD = czysc_zmienne_formularza($_POST['datadoD']);
  $podmagazyn_osoba_wykorzystujaca = czysc_zmienne_formularza($_POST['podmagazyn_osoba_wykorzystujaca']);

  $dataOd=$dataodY.'-'.$dataodM.'-'.$dataodD;
  $dataDo=$datadoY.'-'.$datadoM.'-'.$datadoD;

    //echo $_POST['nazwa'].' - POST nazwa<br>';
  $szukamy->nazwa = $nazwa; // podajemy np. nazwê szukanego materia³u
  $szukamy->osoba_wykorzystujaca = $podmagazyn_osoba_wykorzystujaca; // podajemy np. wpisujacego uzytkownika

  // zapamientujemy wyszukiwanie w zmiennej sesyjnej zeby mozna bylo skakac po stronach wyszukiwania
  $_SESSION['podmagazyn_czyData']=$czyData;
  $_SESSION['podmagazyn_dataOd']=$dataOd;
  $_SESSION['podmagazyn_dataDo']=$dataDo;
  $_SESSION['nazwa_podmagazyn']=$nazwa;
  $_SESSION['podmagazyn_osoba_wykorzystujaca']=$podmagazyn_osoba_wykorzystujaca;
  $_SESSION['wyswietl_wynik_szukaj_podmagazyn']='szukaj_podmagazyn';
}
// jezeli dane sa przekazywane przez link do wyswietlenia ktorejs ze stron wynikow
elseif( ( isset($_SESSION['nazwa_podmagazyn']) || isset($_SESSION['osoba_wykorzystujaca']) || isset($_SESSION['podmagazyn_dataOd']) || isset($_SESSION['podmagazyn_dataDo']) ) && !isset($_POST['nazwa']) && !isset($_POST['podmagazyn_osoba_wykorzystujaca']) && !isset($_POST['czyData']) ) {
  $szukamy->nazwa = $_SESSION['nazwa_podmagazyn']; // podajemy np. nazwisko szukanego uzytkownika
  $szukamy->osoba_wykorzystujaca = $_SESSION['podmagazyn_osoba_wykorzystujaca']; // podajemy np. imie szukanego uzytkownika
  $dataOd=$_SESSION['podmagazyn_dataOd'];
  $dataDo=$_SESSION['podmagazyn_dataDo'];
  $czyData = $_SESSION['podmagazyn_czyData'];
}
else{
  header("Location: biuro.php?strona=magazyn&wpis=wyszukaj_podmagazyn");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
}

if(!isset($_REQUEST['str']) ){
  $str=0;
}
else {
  $str=$_REQUEST['str'];
}
  //echo $str.' - numer strony<br>';

  $material = $mag->pobierz_podmagazyn($szukamy,$str,$czyData,$dataOd,$dataDo); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam materia³

if($material!=false){
  $material->wyswietl_podmagazyn(); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
}
else{
  header("Location: biuro.php?strona=magazyn&wpis=wyszukaj_podmagazyn");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
}

}

//--------------------------------------------
elseif($_REQUEST['wpis']=='edycja_podmagazyn'){

$edycja = new Dane; // tworzymy now± jakby tablicê na dane
$edycja->id_material_user = $_REQUEST['indeks']; // podajemy indeks edytowanego materialu

$edytowany_material = $mag->pobierz_edit_podmagazyn($edycja); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam Material

  if($edytowany_material!=false){
    $info='';
    $edytowany_material->wyswietl_edycja_podmagazyn($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  elseif($edytowany_material==false){
    echo 'nie zostaly pobrane dane do edycji';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }

}

//--------------------------------------------
elseif($_REQUEST['wpis']=='update_podmagazyn'){

$zmien = new Dane; // tworzymy now± jakby tablicê na dane
$zmien->nazwa = $_POST['nazwa'];
$zmien->osoba_wykorzystujaca = $_POST['osoba_wykorzystujaca'];
$zmien->cena_materialu = $_POST['cena_materialu'];

$zmien1 = new Dane; // tworzymy now± jakby tablicê na dane
$zmien1->id_material_user = $_POST['indeks']; // podajemy indeks rekordu ktory bedziemy aktualizowac

$zmien_material = $mag->aktualizuj_podmagazyn($zmien,$zmien1); // aktualizujemy dane w bazie

  if($zmien_material==true){
    $zmien_material = $mag->pobierz_edit_podmagazyn($zmien1,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $info='dane zosta³y zaktualizowane';
    $zmien_material->wyswietl_edycja_podmagazyn($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    $zmien_material = $mag->pobierz_edit_podmagazyn($zmien1,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    $info='dane nie zostaly zmienione';
    $zmien_material->wyswietl_edycja_podmagazyn($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
    //header("Location: ");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }
}

elseif( $_REQUEST['usun_podmagazyn']=='wyk' || $_REQUEST['usun_podmagazyn']=='act' || $_REQUEST['usun_podmagazyn']=='del' ){

$usun = new Dane; // tworzymy now± jakby tablicê na dane
$usun->id_material_user = $_REQUEST['indeks']; // podajemy nazwisko dodawanego uzytkownika itd.

$usuwany_material = $mag->usun_podmagazyn($usun,$_REQUEST['usun_podmagazyn']); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika

  if($usuwany_material!=false){
    $usuwany_material = $mag->pobierz_edit_podmagazyn($usun,0); // wyszukujemy w bazie przekazuj±c jej dane z tablicy, baza zwraca nam U¿ytkownika
    if($_REQUEST['usun_podmagazyn']=='wyk'){ $info='materia³ zosta³ wykorzystany'; }
    elseif($_REQUEST['usun_podmagazyn']=='act'){ $info='materia³ zosta³ przywrócony'; }
    elseif($_REQUEST['usun_podmagazyn']=='del'){ $info='materia³ zosta³ usuniêty'; }
    $usuwany_material->wyswietl_edycja_podmagazyn($info); // wy¶wietlamy szablon Smarty jezeli sa jakies wyniki zapytania
  }
  else{
    echo 'dane nie zostaly usuniête';
    //header("Location: wyszukaj.php");   //jak zapytanie nie zwrocilo wynikow to wracamy do wyszukiwania
  }
}

  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->display('magazyn.tpl');

}
//--------------------------------------------
else{
  header("Location: index.php");
}
?>

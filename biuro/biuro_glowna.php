<?
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
//funkacja wykonujaca zapytanie SQL i przepisujaca tablice wynikow do tablicy ktora zostaje przeslana do szablonu
function pobierz_dane ($sql) {
   //echo $sql.'<br />';
   $sql_result=myquery($sql);

   $f=array();
   while ($row = mysql_fetch_row($sql_result)) {
        $f[] = $row;
   }
  return $f;
}
//------------------------------------------------------------------------------------------------------------------


if($_REQUEST['wpis']=='pracownik'){

  $smarty->assign('ID', 'pracownicy');

  $sql="SELECT pracownikid  FROM pracownicy ORDER BY pracownikid ";
  $wyn=myquery($sql);

    $przelozony[]='';
    while( $ar = mysql_fetch_assoc($wyn) ) {
      $przelozony[]=$ar['pracownikid'];
    }
    $smarty->assign('przelozony', $przelozony);
  
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'pracownicy.tpl');
}
elseif($_REQUEST['wpis']=='dodaj_form'){

  $smarty->assign('ID', 'pracownicy');

  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $adres = $_POST['adres'];
  $miejscowosc = $_POST['miejscowosc'];
  $kod_pocztowy = $_POST['kod_pocztowy'];
  $tel_sluzb = $_POST['tel_sluzb'];
  $tel_prv = $_POST['tel_prv'];
  $tel_prv_kom = $_POST['tel_prv_kom'];
  if($_POST['pesel']==''){$pesel='00000000000';}else{$pesel==$_POST['pesel'];}
  $nr_dowodu_osob = $_POST['nr_dowodu_osob'];
  $email = $_POST['email'];
  $stanowisko = $_POST['stanowisko'];
  $zespol = $_POST['zespol'];
  $przelozony = $_POST['przelozony'];
  $data_urodzenia = $_POST['data_urodzenia'];
  $data_rozp_pracy = $_POST['data_rozp_pracy'];
  $data_zak_pracy = $_POST['data_zak_pracy'];
  $data_wstepnego_szkolenia_BHP = $_POST['data_wstepnego_szkolenia_BHP'];
  $czas_pracy = $_POST['czas_pracy'];

  $sql="SELECT pracownikid,imie,nazwisko,pesel FROM pracownicy WHERE (imie='".$imie."' AND nazwisko='".$nazwisko."') OR (pesel='".$pesel."' AND pesel<>'00000000000') ORDER BY pracownikid ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
 
  if($spr>0){
    $tablica_wynikow=pobierz_dane($sql);
    $smarty->assign('tablica_wynikow', $tablica_wynikow);

    $t_opis=array('Imiê'=>'200','Nazwisko'=>'200','Pesel'=>'100');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('lokalizacja', 'dodaj_pracownika');
    $smarty->assign('komunikat', '&nbsp;<b>Istnieje osoba o podobnych / identycznych danych:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_wyszukaj.tpl');
  }
  else{
    $pracownikid=mb_strtoupper($imie, 'ISO-8859-2').'.'.mb_strtoupper($nazwisko, 'ISO-8859-2'); //echo $pracownikid.'<br />';
    $sql="INSERT INTO pracownicy (pracownikid,imie,nazwisko,adres,miejscowosc,kod_pocztowy,tel_sluzb,tel_prv,tel_prv_kom,pesel,nr_dowodu_osob,email,stanowisko,zespol,przelozony,
	                              data_urodzenia,data_rozp_pracy,data_zak_pracy,data_wstepnego_szkolenia_BHP,czas_pracy) 
						VALUES ('".$pracownikid."', '".$imie."', '".$nazwisko."', '".$adres."', '".$miejscowosc."', '".$kod_pocztowy."', '".$tel_sluzb."', '".$tel_prv."', '".$tel_prv_kom."',
						        '".$pesel."', '".$nr_dowodu_osob."', '".$email."', '".$stanowisko."', '".$zespol."', '".$przelozony."', '".$data_urodzenia."', '".$data_rozp_pracy."',
							    '".$data_zak_pracy."', '".$data_wstepnego_szkolenia_BHP."', '".$czas_pracy."') ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Pracownik zostal dodany.&amp");
  }

}
elseif($_REQUEST['wpis']=='wyszukaj_form'){
  $smarty->assign('ID', 'pracownicy');

  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $pesel = $_POST['pesel'];
  $stanowisko = $_POST['stanowisko'];

  $sql="SELECT pracownikid,imie,nazwisko,pesel,stanowisko FROM pracownicy WHERE imie LIKE '%".$imie."%' AND nazwisko LIKE '%".$nazwisko."%' AND pesel LIKE '%".$pesel."%'
               AND stanowisko LIKE '%".$stanowisko."%' ORDER BY pracownikid ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);

  if($spr>0){
    $tablica_wynikow=pobierz_dane($sql);
    $smarty->assign('tablica_wynikow', $tablica_wynikow);

    $t_opis=array('Imiê'=>'200','Nazwisko'=>'200','Pesel'=>'100','Stanowisko'=>'100');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('lokalizacja', 'wyszukaj_pracownika');
    $smarty->assign('komunikat', '&nbsp;<b>Wyniki wyszukiwania:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_wyszukaj.tpl');
  }
  else{
    $smarty->assign('imie', $imie);
    $smarty->assign('nazwisko', $nazwisko);
    $smarty->assign('pesel', $pesel);
    $smarty->assign('stanowisko', $stanowisko);

    $smarty->assign('komunikat', '&nbsp;<b>Brak wyników wyszukiwania:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy.tpl');
  }

}
elseif($_REQUEST['wpis']=='edycja_pracownika'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownikid = $_REQUEST['pracownikid']; 

//-- lista przelozonych
  $sql="SELECT pracownikid  FROM pracownicy ORDER BY pracownikid ";
  $wyn=myquery($sql);

    $przelozony_tab[]='';
    while( $ar = mysql_fetch_assoc($wyn) ) {
      $przelozony_tab[]=$ar['pracownikid'];
    }
    $smarty->assign('przelozony_tab', $przelozony_tab);
//----

  $sql="SELECT * FROM pracownicy WHERE pracownikid = '".$pracownikid."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('imie', $arr['imie']);
    $smarty->assign('nazwisko', $arr['nazwisko']);
    $smarty->assign('adres', $arr['adres']);
    $smarty->assign('miejscowosc', $arr['miejscowosc']);
    $smarty->assign('kod_pocztowy', $arr['kod_pocztowy']);
    $smarty->assign('tel_sluzb', $arr['tel_sluzb']);
    $smarty->assign('tel_prv', $arr['tel_prv']);
    $smarty->assign('tel_prv_kom', $arr['tel_prv_kom']);
    $smarty->assign('pesel', $arr['pesel']);
    $smarty->assign('nr_dowodu_osob', $arr['nr_dowodu_osob']);
    $smarty->assign('email', $arr['email']);
    $smarty->assign('stanowisko', $arr['stanowisko']);
    $smarty->assign('zespol', $arr['zespol']);
    $smarty->assign('przelozony', $arr['przelozony']);
    $smarty->assign('data_urodzenia', $arr['data_urodzenia']);
    $smarty->assign('data_rozp_pracy', $arr['data_rozp_pracy']);
    $smarty->assign('data_zak_pracy', $arr['data_zak_pracy']);
    $smarty->assign('data_wstepnego_szkolenia_BHP', $arr['data_wstepnego_szkolenia_BHP']);
    $smarty->assign('czas_pracy', $arr['czas_pracy']);

//-- lista I.C.E.
    $sql_ice="SELECT * FROM pracownicy_ice WHERE pracownikid='".$pracownikid."' ORDER BY nazwisko,imie ";
    $tablica_wynikow_ice=pobierz_dane($sql_ice);
    $smarty->assign('tablica_wynikow_ice', $tablica_wynikow_ice);
//-- lista urlopow
    $sql_urlop="SELECT * FROM pracownicy_urlop WHERE pracownikid='".$pracownikid."' AND dataod<>'0000-00-00' AND datado<>'0000-00-00' ORDER BY rok_urlopu desc,urlop_pozostalo asc";
    $tablica_wynikow_urlop=pobierz_dane($sql_urlop);
    $_SESSION['tablica_wynikow_urlop']=$tablica_wynikow_urlop;
	//$smarty->assign('tablica_wynikow_urlop', $tablica_wynikow_urlop);
	$smarty->assign('sub', 'tak');
    //$smarty->assign('plik_urlop', "./biuro/pracownicy_urlop_wyswietl.php?tablica_wynikow_urlop={$tablica_wynikow_urlop}");
//-- lista badan lekarskich
    $sql_badania_lek="SELECT * FROM pracownicy_badania_lek WHERE pracownikid='".$pracownikid."' ORDER BY data_badania desc,data_nast_badania desc";
    $tablica_wynikow_badania_lek=pobierz_dane($sql_badania_lek);
    $_SESSION['tablica_wynikow_badania_lek']=$tablica_wynikow_badania_lek;
	$smarty->assign('sub_badania_lek', 'tak');
//-- lista szkolen BHP
    $sql_bhp="SELECT * FROM pracownicy_bhp WHERE pracownikid='".$pracownikid."' ORDER BY data_szkolenia desc,data_nast_szkolenia desc";
    $tablica_wynikow_bhp=pobierz_dane($sql_bhp);
    $_SESSION['tablica_wynikow_bhp']=$tablica_wynikow_bhp;
	$smarty->assign('sub_bhp', 'tak');
//-- lista Certyfikatow
    $sql_cert="SELECT * FROM pracownicy_certyfikaty WHERE pracownikid='".$pracownikid."' ORDER BY data_otrzymania_cert desc";
    $tablica_wynikow_cert=pobierz_dane($sql_cert);
    $_SESSION['tablica_wynikow_cert']=$tablica_wynikow_cert;
	$smarty->assign('sub_cert', 'tak');
//-- lista Uwag
    $sql_uwaga="SELECT * FROM pracownicy_uwagi WHERE pracownikid='".$pracownikid."' ORDER BY data_uwagi desc";
    $tablica_wynikow_uwaga=pobierz_dane($sql_uwaga);
    $_SESSION['tablica_wynikow_uwaga']=$tablica_wynikow_uwaga;
	$smarty->assign('sub_uwaga', 'tak');
    $smarty->assign('akt_data',date('Y').'-'.date('m').'-'.date('j'));

//----

    $smarty->assign('komunikat', '&nbsp;<b>'.$_REQUEST['komunikat'].'</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja.tpl');
  }
  else{
    $smarty->assign('imie', $imie);
    $smarty->assign('nazwisko', $nazwisko);
    $smarty->assign('pesel', $pesel);
    $smarty->assign('stanowisko', $stanowisko);

    $smarty->assign('komunikat', '&nbsp;<b>Nie mozna edytowac (sprawdz ponownie):</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy.tpl');
  }

}
elseif($_REQUEST['wpis']=='aktualizuj_form'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $adres = $_POST['adres'];
  $miejscowosc = $_POST['miejscowosc'];
  $kod_pocztowy = $_POST['kod_pocztowy'];
  $tel_sluzb = $_POST['tel_sluzb'];
  $tel_prv = $_POST['tel_prv'];
  $tel_prv_kom = $_POST['tel_prv_kom'];
  if($_POST['pesel']==''){$pesel='00000000000';}else{$pesel=$_POST['pesel'];}
  $nr_dowodu_osob = $_POST['nr_dowodu_osob'];
  $email = $_POST['email'];
  $stanowisko = $_POST['stanowisko'];
  $zespol = $_POST['zespol'];
  $przelozony = $_POST['przelozony'];
  $data_urodzenia = $_POST['data_urodzenia'];
  $data_rozp_pracy = $_POST['data_rozp_pracy'];
  $data_zak_pracy = $_POST['data_zak_pracy'];
  $data_wstepnego_szkolenia_BHP = $_POST['data_wstepnego_szkolenia_BHP'];
  $czas_pracy = $_POST['czas_pracy'];

    $sql="UPDATE pracownicy SET imie='".$imie."',nazwisko='".$nazwisko."',adres='".$adres."',miejscowosc='".$miejscowosc."',kod_pocztowy='".$kod_pocztowy."',
	                            tel_sluzb='".$tel_sluzb."',tel_prv='".$tel_prv."',tel_prv_kom='".$tel_prv_kom."',pesel='".$pesel."',nr_dowodu_osob='".$nr_dowodu_osob."',
								email='".$email."',stanowisko='".$stanowisko."',zespol='".$zespol."',przelozony='".$przelozony."',data_urodzenia='".$data_urodzenia."',
								data_rozp_pracy='".$data_rozp_pracy."',data_zak_pracy='".$data_zak_pracy."',data_wstepnego_szkolenia_BHP='".$data_wstepnego_szkolenia_BHP."',
								czas_pracy='".$czas_pracy."' WHERE pracownikid='".$pracownikid."' ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane pracownika zostaly zaktualizowane.&amp");

}
elseif($_REQUEST['wpis']=='edycja_ice'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownicy_ice_id = $_REQUEST['pracownicy_ice_id'];
    $pracownikid = $_REQUEST['pracownikid']; 

  $sql="SELECT * FROM pracownicy_ice WHERE pracownicy_ice_id = '".$pracownicy_ice_id."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownicy_ice_id', $arr['pracownicy_ice_id']);
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('imie', $arr['imie']);
    $smarty->assign('nazwisko', $arr['nazwisko']);
    $smarty->assign('tel', $arr['tel']);
    $smarty->assign('pokrewienstwo', $arr['pokrewienstwo']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja_ice.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Nie mozna edytowac wpisu I.C.E. (sprawdz ponownie):.&amp");
  }

}
elseif($_REQUEST['wpis']=='dodaj_ice'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $tel = $_POST['tel'];
  $pokrewienstwo = $_POST['pokrewienstwo'];

  $sql="INSERT INTO pracownicy_ice (pracownikid,imie,nazwisko,tel,pokrewienstwo) 
						VALUES ('".$pracownikid."', '".$imie."', '".$nazwisko."', '".$tel."', '".$pokrewienstwo."') ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=I.C.E. dla pracownika zostal dodany.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_ice'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_ice_id = $_POST['pracownicy_ice_id'];
  $pracownikid = $_POST['pracownikid'];
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];
  $tel = $_POST['tel'];
  $pokrewienstwo = $_POST['pokrewienstwo'];

    $sql="UPDATE pracownicy_ice SET imie='".$imie."',nazwisko='".$nazwisko."',tel='".$tel."',pokrewienstwo='".$pokrewienstwo."' WHERE pracownicy_ice_id='".$pracownicy_ice_id."' ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane I.C.E. dla pracownika zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_ice'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_ice_id = $_POST['pracownicy_ice_id'];
  $pracownikid = $_POST['pracownikid'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM pracownicy_ice WHERE pracownicy_ice_id='".$pracownicy_ice_id."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane I.C.E. dla pracownika zostaly zaktualizowane.&amp");
}
//urlopy-------------------------------------------------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_urlop'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownicy_urlop_id = $_REQUEST['pracownicy_urlop_id'];
    $pracownikid = $_REQUEST['pracownikid']; 

  $sql="SELECT * FROM pracownicy_urlop WHERE pracownicy_urlop_id = '".$pracownicy_urlop_id."' ORDER BY rok_urlopu,dataod";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownicy_urlop_id', $arr['pracownicy_urlop_id']);
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('dataod', $arr['dataod']);
    $smarty->assign('datado', $arr['datado']);
    $smarty->assign('rok_urlopu', $arr['rok_urlopu']);
    $smarty->assign('ilosc_dni_urlopu', $arr['ilosc_dni_urlopu']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja_urlop.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Nie mozna edytowac wpisu urlopu (sprawdz ponownie):.&amp");
  }

}
elseif($_REQUEST['wpis']=='edycja_ustaw_urlop'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownicy_urlop_id = $_REQUEST['pracownicy_urlop_id'];
    $pracownikid = $_REQUEST['pracownikid']; 

  $sql="SELECT * FROM pracownicy_urlop WHERE pracownicy_urlop_id = '".$pracownicy_urlop_id."' ORDER BY rok_urlopu,dataod";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownicy_urlop_id', $arr['pracownicy_urlop_id']);
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('dataod', $arr['dataod']);
    $smarty->assign('datado', $arr['datado']);
    $smarty->assign('rok_urlopu', $arr['rok_urlopu']);
    $smarty->assign('ilosc_dni_urlopu', $arr['ilosc_dni_urlopu']);
    $smarty->assign('ilosc_dni_urlopu_akt_rok', $arr['ilosc_dni_urlopu_akt_rok']);
    $smarty->assign('urlop_pozostalo', $arr['urlop_pozostalo']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja_ustaw_urlop.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Nie mozna edytowac wpisu urlopu (sprawdz ponownie):.&amp");
  }

}
elseif($_REQUEST['wpis']=='dodaj_urlop'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $dataod = $_POST['dataod'];
  $datado = $_POST['datado'];
  $rok_urlopu = $_POST['rok_urlopu'];
  $ilosc_dni_urlopu = $_POST['ilosc_dni_urlopu'];

   //pobrac ostatni wpis z tego roku i zaktualizowac jak wyzej pozostale dni urloopu
    $sql_temp="SELECT * FROM pracownicy_urlop WHERE rok_urlopu='".$rok_urlopu."' AND pracownikid = '".$pracownikid."' ORDER BY urlop_pozostalo LIMIT 1 ";
    $wyn_temp=myquery($sql_temp);
    $arr_temp = mysql_fetch_assoc($wyn_temp);

    $urlop_pozostalo=$arr_temp['urlop_pozostalo']-$ilosc_dni_urlopu;
    
    $sql="INSERT INTO pracownicy_urlop (pracownikid, dataod, datado, rok_urlopu, ilosc_dni_urlopu_akt_rok, urlop_pozostalo, ilosc_dni_urlopu) 
	             VALUES ('".$pracownikid."','".$dataod."','".$datado."','".$rok_urlopu."','".$arr_temp['ilosc_dni_urlopu_akt_rok']."','".$urlop_pozostalo."','".$ilosc_dni_urlopu."')";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Urlop zostal dodany.&amp");
}
elseif($_REQUEST['wpis']=='dodaj_ustaw_urlop'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $dataod = $_POST['rok_urlopu'].'-00-00';
  $datado = $_POST['rok_urlopu'].'-00-00';
  $rok_urlopu = $_POST['rok_urlopu'];
  $ilosc_dni_urlopu_akt_rok = $_POST['ilosc_dni_urlopu_akt_rok'];
  $ilosc_dni_urlopu = 0;
  $urlop_pozostalo=$_POST['ilosc_dni_urlopu_akt_rok'];
    
   //pobrac wpis z tego roku jesli jest
    $sql_temp="SELECT * FROM pracownicy_urlop WHERE rok_urlopu='".$rok_urlopu."' AND pracownikid = '".$pracownikid."' AND dataod='".$dataod."' AND datado='".$datado."' ";
    $wyn_temp=myquery($sql_temp);
    $czy_jest=mysql_num_rows($wyn_temp); 
    $arr_temp = mysql_fetch_assoc($wyn_temp);

    if($czy_jest>0){
	  header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Urlop roczny nie zostal dodany poniewaz byl juz ustawiony. Edytuj wpis.&amp");
	}else{
      $sql="INSERT INTO pracownicy_urlop (pracownikid, dataod, datado, rok_urlopu, ilosc_dni_urlopu_akt_rok, urlop_pozostalo, ilosc_dni_urlopu) 
	             VALUES ('".$pracownikid."','".$dataod."','".$datado."','".$rok_urlopu."','".$ilosc_dni_urlopu_akt_rok."','".$urlop_pozostalo."','".$ilosc_dni_urlopu."')";
      $wyn=myquery($sql);
  
	  header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Urlop zostal ustawiony.&amp");
    }
}
elseif($_REQUEST['wpis']=='aktualizuj_urlop'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_urlop_id = $_POST['pracownicy_urlop_id'];
  $pracownikid = $_POST['pracownikid'];
  $dataod = $_POST['dataod'];
  $datado = $_POST['datado'];
  $rok_urlopu = $_POST['rok_urlopu'];
  $ilosc_dni_urlopu = $_POST['ilosc_dni_urlopu'];

//pobrac dane tego urlopu zeby zmienic liczbe dni urlopu i pozostalych
  $sql_temp="SELECT * FROM pracownicy_urlop WHERE pracownicy_urlop_id = '".$pracownicy_urlop_id."' ORDER BY rok_urlopu,dataod";
  $wyn_temp=myquery($sql_temp);
  $arr_temp = mysql_fetch_assoc($wyn_temp);
  
  if($arr_temp['rok_urlopu']==$rok_urlopu){
    $ilosc_dni_urlopu_roznica=$ilosc_dni_urlopu-$arr_temp['ilosc_dni_urlopu'];
    $urlop_pozostalo=$arr_temp['urlop_pozostalo']-$ilosc_dni_urlopu_roznica;

    $sql="UPDATE pracownicy_urlop SET dataod='".$dataod."',datado='".$datado."',rok_urlopu='".$rok_urlopu."',urlop_pozostalo='".$urlop_pozostalo."',ilosc_dni_urlopu='".$ilosc_dni_urlopu."' WHERE pracownicy_urlop_id='".$pracownicy_urlop_id."' ";
    $wyn=myquery($sql);
  }
  elseif($arr_temp['rok_urlopu']!=$rok_urlopu){
   //pobrac ostatni wpis z tego roku i zaktualizowac jak wyzej pozostale dni urloopu
    $sql_temp1="SELECT * FROM pracownicy_urlop WHERE rok_urlopu='".$rok_urlopu."' AND pracownikid = '".$pracownikid."' ORDER BY urlop_pozostalo LIMIT 1 ";
    $wyn_temp1=myquery($sql_temp1);
    $arr_temp1 = mysql_fetch_assoc($wyn_temp1);

    $urlop_pozostalo=$arr_temp1['urlop_pozostalo']-$ilosc_dni_urlopu;
    
	//DODANIE DO tego roku edytowanego urlopu
    $sql="INSERT INTO pracownicy_urlop (pracownikid, dataod, datado, rok_urlopu, ilosc_dni_urlopu_akt_rok, urlop_pozostalo, ilosc_dni_urlopu) 
	             VALUES ('".$pracownikid."','".$dataod."','".$datado."','".$rok_urlopu."','".$arr_temp1['ilosc_dni_urlopu_akt_rok']."','".$urlop_pozostalo."','".$ilosc_dni_urlopu."')";
    $wyn=myquery($sql);
    
	//usuniecie edytowanego urlopu bo zostal przeniesiony do nowego roku
	$sql="DELETE FROM pracownicy_urlop WHERE pracownicy_urlop_id='".$pracownicy_urlop_id."' ";
    $wyn=myquery($sql);

  }
  else{}
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane urlopu zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_ustaw_urlop'){
	
  $smarty->assign('ID', 'pracownicy');

  $pracownicy_urlop_id = $_POST['pracownicy_urlop_id'];
  $pracownikid = $_POST['pracownikid'];
  $rok_urlopu = $_POST['rok_urlopu'];
  $ilosc_dni_urlopu_akt_rok = $_POST['ilosc_dni_urlopu_akt_rok'];
  $dataod=$rok_urlopu.'-00-00';
  $datado=$rok_urlopu.'-00-00';

    //pobrac ilosc_dni_urlopu_akt_rok z tego roku i policzyc roznice 
    $sql_temp="SELECT ilosc_dni_urlopu_akt_rok FROM pracownicy_urlop WHERE pracownicy_urlop_id='".$pracownicy_urlop_id."' ";
    $wyn_temp=myquery($sql_temp);
    $arr_temp = mysql_fetch_assoc($wyn_temp);
	
	$ilosc_dni_urlopu_akt_rok_roznica = $ilosc_dni_urlopu_akt_rok - $arr_temp['ilosc_dni_urlopu_akt_rok'];
	
    //pobrac wpisy z tego roku i zaktualizowac roznice dni urloopu
    $sql_temp1="SELECT * FROM pracownicy_urlop WHERE rok_urlopu='".$rok_urlopu."' AND pracownikid = '".$pracownikid."' ";
    $wyn_temp1=myquery($sql_temp1);

    while($arr_temp1 = mysql_fetch_assoc($wyn_temp1)){
	  if($arr_temp1['dataod']==$dataod && $arr_temp1['datado']==$datado){
	    $sql="UPDATE pracownicy_urlop SET ilosc_dni_urlopu_akt_rok='".$ilosc_dni_urlopu_akt_rok."', urlop_pozostalo='".$ilosc_dni_urlopu_akt_rok."' WHERE pracownicy_urlop_id='".$arr_temp1['pracownicy_urlop_id']."' ";
        $wyn=myquery($sql);    
	  }else{
	    $urlop_pozostalo=$arr_temp1['urlop_pozostalo']+$ilosc_dni_urlopu_akt_rok_roznica;
	    $sql="UPDATE pracownicy_urlop SET ilosc_dni_urlopu_akt_rok='".$ilosc_dni_urlopu_akt_rok."', urlop_pozostalo='".$urlop_pozostalo."' WHERE pracownicy_urlop_id='".$pracownicy_urlop_id."' ";
        $wyn=myquery($sql);    
	  }
	}

	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane urlopu zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_urlop'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_urlop_id = $_POST['pracownicy_urlop_id'];
  $pracownikid = $_POST['pracownikid'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM pracownicy_urlop WHERE pracownicy_urlop_id='".$pracownicy_urlop_id."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Urlop zostal usuniety.&amp");
}
//KONIEC URLOPY-------------------------------------------------------------------------------------------------------------------
//BADANIA LEKARSKIE -------------------------------------------------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_badania'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownicy_badania_lek_id = $_REQUEST['pracownicy_badania_lek_id'];
    $pracownikid = $_REQUEST['pracownikid']; 

  $sql="SELECT * FROM pracownicy_badania_lek WHERE pracownicy_badania_lek_id = '".$pracownicy_badania_lek_id."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownicy_badania_lek_id', $arr['pracownicy_badania_lek_id']);
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('data_badania', $arr['data_badania']);
    $smarty->assign('data_nast_badania', $arr['data_nast_badania']);
    $smarty->assign('opis_badania', $arr['opis_badania']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja_badania_lek.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Nie mozna edytowac wpisu badan lekarskich (sprawdz ponownie):.&amp");
  }
	
}
elseif($_REQUEST['wpis']=='dodaj_badania'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $data_badania = $_POST['data_badania'];
  $data_nast_badania = $_POST['data_nast_badania'];
  $opis_badania = $_POST['opis_badania'];

    $sql="INSERT INTO pracownicy_badania_lek (pracownikid, data_badania, data_nast_badania, opis_badania) 
	             VALUES ('".$pracownikid."','".$data_badania."','".$data_nast_badania."','".$opis_badania."')";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Badanie zostalo dodane.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_badania'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_badania_lek_id = $_POST['pracownicy_badania_lek_id'];
  $pracownikid = $_POST['pracownikid'];
  $data_badania = $_POST['data_badania'];
  $data_nast_badania = $_POST['data_nast_badania'];
  $opis_badania = $_POST['opis_badania'];

  $sql="UPDATE pracownicy_badania_lek SET pracownikid='".$pracownikid."',data_badania='".$data_badania."',data_nast_badania='".$data_nast_badania."',opis_badania='".$opis_badania."' WHERE pracownicy_badania_lek_id='".$pracownicy_badania_lek_id."' ";
  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane badania zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_badania'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_badania_lek_id = $_POST['pracownicy_badania_lek_id'];
  $pracownikid = $_POST['pracownikid'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM pracownicy_badania_lek WHERE pracownicy_badania_lek_id='".$pracownicy_badania_lek_id."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Badanie zostalo usuniete.&amp");
}
//KONIEC BADANIA LEKARSKIE-------------------------------------------------------------------------------------------------------------------
//BHP -------------------------------------------------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_bhp'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownicy_bhp_id = $_REQUEST['pracownicy_bhp_id'];
    $pracownikid = $_REQUEST['pracownikid']; 

  $sql="SELECT * FROM pracownicy_bhp WHERE pracownicy_bhp_id = '".$pracownicy_bhp_id."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownicy_bhp_id', $arr['pracownicy_bhp_id']);
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('data_szkolenia', $arr['data_szkolenia']);
    $smarty->assign('data_nast_szkolenia', $arr['data_nast_szkolenia']);
    $smarty->assign('opis_szkolenia', $arr['opis_szkolenia']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja_bhp.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Nie mozna edytowac wpisu BHP (sprawdz ponownie):.&amp");
  }
	
}
elseif($_REQUEST['wpis']=='dodaj_bhp'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $data_szkolenia = $_POST['data_szkolenia'];
  $data_nast_szkolenia = $_POST['data_nast_szkolenia'];
  $opis_szkolenia = $_POST['opis_szkolenia'];

    $sql="INSERT INTO pracownicy_bhp (pracownikid, data_szkolenia, data_nast_szkolenia, opis_szkolenia) 
	             VALUES ('".$pracownikid."','".$data_szkolenia."','".$data_nast_szkolenia."','".$opis_szkolenia."')";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Szkolenie zostalo dodane.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_bhp'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_bhp_id = $_POST['pracownicy_bhp_id'];
  $pracownikid = $_POST['pracownikid'];
  $data_szkolenia = $_POST['data_szkolenia'];
  $data_nast_szkolenia = $_POST['data_nast_szkolenia'];
  $opis_szkolenia = $_POST['opis_szkolenia'];

  $sql="UPDATE pracownicy_bhp SET pracownikid='".$pracownikid."',data_szkolenia='".$data_szkolenia."',data_nast_szkolenia='".$data_nast_szkolenia."',opis_szkolenia='".$opis_szkolenia."' WHERE pracownicy_bhp_id='".$pracownicy_bhp_id."' ";
  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane szkolenia zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_bhp'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_bhp_id = $_POST['pracownicy_bhp_id'];
  $pracownikid = $_POST['pracownikid'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM pracownicy_bhp WHERE pracownicy_bhp_id='".$pracownicy_bhp_id."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Szkolenie zostalo usuniete.&amp");
}
//KONIEC BHP-------------------------------------------------------------------------------------------------------------------
//CERTYFIKATY -------------------------------------------------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_cert'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownicy_certyfikaty_id = $_REQUEST['pracownicy_certyfikaty_id'];
    $pracownikid = $_REQUEST['pracownikid']; 

  $sql="SELECT * FROM pracownicy_certyfikaty WHERE pracownicy_certyfikaty_id = '".$pracownicy_certyfikaty_id."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownicy_certyfikaty_id', $arr['pracownicy_certyfikaty_id']);
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('data_otrzymania_cert', $arr['data_otrzymania_cert']);
    $smarty->assign('certyfikat', $arr['certyfikat']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja_certyfikaty.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Nie mozna edytowac wpisu certyfikatu (sprawdz ponownie):.&amp");
  }
	
}
elseif($_REQUEST['wpis']=='dodaj_cert'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $data_otrzymania_cert = $_POST['data_otrzymania_cert'];
  $certyfikat = $_POST['certyfikat'];

    $sql="INSERT INTO pracownicy_certyfikaty (pracownikid, data_otrzymania_cert, certyfikat) 
	             VALUES ('".$pracownikid."','".$data_otrzymania_cert."','".$certyfikat."')";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Certyfikat zostal dodany.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_cert'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_certyfikaty_id = $_POST['pracownicy_certyfikaty_id'];
  $pracownikid = $_POST['pracownikid'];
  $data_otrzymania_cert = $_POST['data_otrzymania_cert'];
  $certyfikat = $_POST['certyfikat'];

  $sql="UPDATE pracownicy_certyfikaty SET pracownikid='".$pracownikid."',data_otrzymania_cert='".$data_otrzymania_cert."',certyfikat='".$certyfikat."' WHERE pracownicy_certyfikaty_id='".$pracownicy_certyfikaty_id."' ";
  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Dane certyfikatu zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_cert'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_certyfikaty_id = $_POST['pracownicy_certyfikaty_id'];
  $pracownikid = $_POST['pracownikid'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM pracownicy_certyfikaty WHERE pracownicy_certyfikaty_id='".$pracownicy_certyfikaty_id."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Certyfikat zostal usuniety.&amp");
}
//KONIEC CERTYFIKATY -------------------------------------------------------------------------------------------------------------------
//UWAGI -------------------------------------------------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_uwaga'){
  
  $smarty->assign('ID', 'pracownicy');

    $pracownicy_uwagi_id = $_REQUEST['pracownicy_uwagi_id'];
    $pracownikid = $_REQUEST['pracownikid']; 

  $sql="SELECT * FROM pracownicy_uwagi WHERE pracownicy_uwagi_id = '".$pracownicy_uwagi_id."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('pracownicy_uwagi_id', $arr['pracownicy_uwagi_id']);
    $smarty->assign('pracownikid', $arr['pracownikid']);
    $smarty->assign('data_uwagi', $arr['data_uwagi']);
    $smarty->assign('uwaga', $arr['uwaga']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'pracownicy_edycja_uwagi.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Nie mozna edytowac uwagi (sprawdz ponownie):.&amp");
  }
	
}
elseif($_REQUEST['wpis']=='dodaj_uwaga'){

  $smarty->assign('ID', 'pracownicy');

  $pracownikid = $_POST['pracownikid'];
  $data_uwagi = $_POST['data_uwagi'];
  $uwaga = $_POST['uwaga'];

    $sql="INSERT INTO pracownicy_uwagi (pracownikid, data_uwagi, uwaga) 
	             VALUES ('".$pracownikid."','".$data_uwagi."','".$uwaga."')";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Uwaga zostala dodana.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_uwaga'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_uwagi_id = $_POST['pracownicy_uwagi_id'];
  $pracownikid = $_POST['pracownikid'];
  $data_uwagi = $_POST['data_uwagi'];
  $uwaga = $_POST['uwaga'];

  $sql="UPDATE pracownicy_uwagi SET pracownikid='".$pracownikid."',data_uwagi='".$data_uwagi."',uwaga='".$uwaga."' WHERE pracownicy_uwagi_id='".$pracownicy_uwagi_id."' ";
  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Uwaga zostala zaktualizowana.&amp");
}
elseif($_REQUEST['wpis']=='usun_uwaga'){

  $smarty->assign('ID', 'pracownicy');

  $pracownicy_uwagi_id = $_POST['pracownicy_uwagi_id'];
  $pracownikid = $_POST['pracownikid'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM pracownicy_uwagi WHERE pracownicy_uwagi_id='".$pracownicy_uwagi_id."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid=".$pracownikid."&komunikat=Uwaga zostala usunieta.&amp");
}


else{
//------------------------------------------------------------------------------------------------------------------
	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT count(*) as count FROM zlecenieinfo WHERE wpis='new' ";
          $sql_result=myquery($sql);
          $arr = mysql_fetch_assoc($sql_result);
	  $smarty->assign('liczba_nowych', $arr['count']);
//------------------------------------------------------------------------------------------------------------------

  $smarty->assign('sub', 'tak');
  $smarty->assign('log', $_SESSION['idusera'] );
  $smarty->assign('plik', 'glowna.tpl');
}


$smarty->display('biuro_glowna.tpl');
}
else{
  header("Location: index.php");
}
?>

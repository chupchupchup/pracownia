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


if($_REQUEST['wpis']=='kontrahenci'){

  $smarty->assign('ID', 'kontrahenci');

  $sql="SELECT idzleceniodawcy FROM zleceniodawca ORDER BY idzleceniodawcy ";
  $wyn=myquery($sql);
  
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'kontrahenci.tpl');
}
elseif($_REQUEST['wpis']=='dodaj_kontrahenci'){

  $smarty->assign('ID', 'kontrahenci');
            
  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $data_umowy = $_POST['data_umowy'];
  $nr_umowy = $_POST['nr_umowy'];
  $nazwa = $_POST['nazwa'];
  $adres = $_POST['adres'];
  $adres_korespond = $_POST['adres_korespond'];
  $adres_gabinetu = $_POST['adres_gabinetu'];
  $nip = $_POST['nip'];
  $tel = $_POST['tel'];
  $tel_kom = $_POST['tel_kom'];
  $email = $_POST['email'];
  $rabat = $_POST['rabat'];
  $miejsce_poz_prac_po_godz = $_POST['miejsce_poz_prac_po_godz'];
  $wz_ost = '0/'.$_POST['idzleceniodawcy'].'/'.date(Y);

  $sql="SELECT idzleceniodawcy,nazwa,adres,concat(tel,' ',tel_kom) FROM zleceniodawca WHERE idzleceniodawcy='".$idzleceniodawcy."' AND nazwa LIKE '%".$nazwa."%' AND adres LIKE '%".$adres."%' AND nip LIKE '%".$nip."%' AND nr_umowy LIKE '%".$nr_umowy."%' ORDER BY nazwa ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);

  if($spr>0){
    $tablica_wynikow=pobierz_dane($sql);
    $smarty->assign('tablica_wynikow', $tablica_wynikow);

    $t_opis=array('ID KONTRHENTA'=>'200','Nazwa'=>'400','Adres'=>'400','Tel.'=>'180');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('lokalizacja', 'dodaj_kontrahenci');
    $smarty->assign('komunikat', '&nbsp;<b>Istnieje kontrahent o podobnych / identycznych danych:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci_wyszukaj.tpl');
  }
  else{
    $sql="INSERT INTO zleceniodawca (idzleceniodawcy,nazwa,adres,adres_korespond,adres_gabinetu,nip,tel,tel_kom,email,rabat,miejsce_poz_prac_po_godz,
	                              nr_umowy,data_umowy,wz_ost) 
						VALUES ('".$idzleceniodawcy."', '".$nazwa."', '".$adres."', '".$adres_korespond."', '".$adres_gabinetu."', '".$nip."', '".$tel."', '".$tel_kom."', '".$email."',
						        '".$rabat."', '".$miejsce_poz_prac_po_godz."', '".$nr_umowy."', '".$data_umowy."', '".$wz_ost."' ) ";
    $wyn=myquery($sql);
  echo $sql;
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Kontrahent zostal dodany.&amp");
  }

}
elseif($_REQUEST['wpis']=='wyszukaj_kontrahenci'){

  $smarty->assign('ID', 'kontrahenci');

  $nazwa = $_POST['nazwa'];
  $adres = $_POST['adres'];
  $nip = $_POST['nip'];
  $tel = $_POST['tel'];

  $sql="SELECT idzleceniodawcy,nazwa,adres,concat(tel,' ',tel_kom) FROM zleceniodawca WHERE nazwa LIKE '%".$nazwa."%' AND adres LIKE '%".$adres."%' AND nip LIKE '%".$nip."%' AND (tel LIKE '%".$tel."%' OR tel_kom LIKE '%".$tel_kom."%') ORDER BY nazwa ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);

  if($spr>0){
    $tablica_wynikow=pobierz_dane($sql);
    $smarty->assign('tablica_wynikow', $tablica_wynikow);

    $t_opis=array('ID KONTRHENTA'=>'200','Nazwa'=>'400','Adres'=>'400','Tel.'=>'180');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('lokalizacja', 'wyszukaj_kontrahenci');
    $smarty->assign('komunikat', '&nbsp;<b>Wyniki wyszukiwania:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci_wyszukaj.tpl');
  }
  else{
    $smarty->assign('nazwa', $nazwa);
    $smarty->assign('adres', $adres);
    $smarty->assign('nip', $nip);
    $smarty->assign('tel', $tel);

    $smarty->assign('komunikat', '&nbsp;<b>Brak wynik�w wyszukiwania:</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci.tpl');
  }

}
elseif($_REQUEST['wpis']=='edycja_kontrahenci'){
  
  $smarty->assign('ID', 'kontrahenci');

    $idzleceniodawcy = $_REQUEST['idzleceniodawcy']; 

  $sql="SELECT * FROM zleceniodawca WHERE idzleceniodawcy = '".$idzleceniodawcy."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('idzleceniodawcy', $arr['idzleceniodawcy']);
    $smarty->assign('data_umowy', $arr['data_umowy']);
    $smarty->assign('nr_umowy', $arr['nr_umowy']);
    $smarty->assign('nazwa', $arr['nazwa']);
    $smarty->assign('adres', $arr['adres']);
    $smarty->assign('adres_korespond', $arr['adres_korespond']);
    $smarty->assign('adres_gabinetu', $arr['adres_gabinetu']);
    $smarty->assign('nip', $arr['nip']);
    $smarty->assign('tel', $arr['tel']);
    $smarty->assign('tel_kom', $arr['tel_kom']);
    $smarty->assign('email', $arr['email']);
    $smarty->assign('rabat', $arr['rabat']);
    $smarty->assign('miejsce_poz_prac_po_godz', $arr['miejsce_poz_prac_po_godz']);
    $smarty->assign('wz_ost', $arr['wz_ost']);

//-- lista Godz otwarcia
    $sql_go="SELECT * FROM zleceniodawca_godz_pracy WHERE idzleceniodawcy='".$idzleceniodawcy."' ";
    $tablica_wynikow_go=pobierz_dane($sql_go);
    $_SESSION['tablica_wynikow_go']=$tablica_wynikow_go;
	$smarty->assign('sub_go', 'tak');
//-- lista Uwag
    $sql_uwaga="SELECT * FROM zleceniodawca_uwagi WHERE idzleceniodawcy='".$idzleceniodawcy."' ORDER BY data_uwagi desc";
    $tablica_wynikow_uwaga=pobierz_dane($sql_uwaga);
    $_SESSION['tablica_wynikow_uwaga']=$tablica_wynikow_uwaga;
	$smarty->assign('sub_uwaga', 'tak');
    $smarty->assign('akt_data',date('Y').'-'.date('m').'-'.date('j'));

//-- lista Technicy
    $sql_technicy="SELECT * FROM zleceniodawca_technik WHERE idzleceniodawcy='".$idzleceniodawcy."' ORDER BY pracownikid desc";
    $tablica_wynikow_technik=pobierz_dane($sql_technicy);
    $_SESSION['tablica_wynikow_technik']=$tablica_wynikow_technik;
	
	$smarty->assign('sub_technik', 'tak');
	    $sql="SELECT pracownikid FROM pracownicy ORDER BY pracownikid ";
    $wyn=myquery($sql);
    $technik[]='';
    while( $ar = mysql_fetch_assoc($wyn) ) {
      $technik[]=$ar['pracownikid'];
    }
    $smarty->assign('technik', $technik);
//-- lista wsp lekarzy
    $sql_wsp_lek="SELECT * FROM zleceniodawca_wsp_lek WHERE idzleceniodawcy='".$idzleceniodawcy."' ORDER BY nazwa desc";
    $tablica_wynikow_wsp_lek=pobierz_dane($sql_wsp_lek);
    $_SESSION['tablica_wynikow_wsp_lek']=$tablica_wynikow_wsp_lek;
	$smarty->assign('sub_wsp_lek', 'tak');
/*
//-- lista Certyfikatow
    $sql_cert="SELECT * FROM pracownicy_certyfikaty WHERE pracownikid='".$pracownikid."' ORDER BY data_otrzymania_cert desc";
    $tablica_wynikow_cert=pobierz_dane($sql_cert);
    $_SESSION['tablica_wynikow_cert']=$tablica_wynikow_cert;
	$smarty->assign('sub_cert', 'tak');

//----
*/

    $smarty->assign('komunikat', '&nbsp;<b>'.$_REQUEST['komunikat'].'</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci_edycja.tpl');
  }
  else{
    $smarty->assign('nazwa', $nazwa);
    $smarty->assign('adres', $adres);
    $smarty->assign('nip', $nip);
    $smarty->assign('tel', $tel);

    $smarty->assign('komunikat', '&nbsp;<b>Nie mozna edytowac (sprawdz ponownie):</b><br />');
    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci.tpl');
  }

}
elseif($_REQUEST['wpis']=='aktualizuj_kontrahenci'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $data_umowy = $_POST['data_umowy'];
  $nr_umowy = $_POST['nr_umowy'];
  $nazwa = $_POST['nazwa'];
  $adres = $_POST['adres'];
  $adres_korespond = $_POST['adres_korespond'];
  $adres_gabinetu = $_POST['adres_gabinetu'];
  $nip = $_POST['nip'];
  $tel = $_POST['tel'];
  $tel_kom = $_POST['tel_kom'];
  $email = $_POST['email'];
  $rabat = $_POST['rabat'];
  $miejsce_poz_prac_po_godz = $_POST['miejsce_poz_prac_po_godz'];
  $wz_ost = $_POST['wz_ost'];


    $sql="UPDATE zleceniodawca SET data_umowy='".$data_umowy."',nr_umowy='".$nr_umowy."',nazwa='".$nazwa."',adres='".$adres."',adres_korespond='".$adres_korespond."',
	                            adres_gabinetu='".$adres_gabinetu."',nip='".$nip."',tel='".$tel."',tel_kom='".$tel_kom."',email='".$email."',
								rabat='".$rabat."',miejsce_poz_prac_po_godz='".$miejsce_poz_prac_po_godz."',wz_ost='".$wz_ost."'
						    WHERE idzleceniodawcy='".$idzleceniodawcy."' ";
    echo $sql;
	$wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane kontrahenta zostaly zaktualizowane.&amp");

}
// godziny otwarcia ---------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_go'){
  
  $smarty->assign('ID', 'kontrahenci');

    $id_go = $_REQUEST['id_go'];
    $idzleceniodawcy = $_REQUEST['idzleceniodawcy']; 

  $sql="SELECT * FROM zleceniodawca_godz_pracy WHERE id_go = '".$id_go."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('id_go', $arr['id_go']);
    $smarty->assign('idzleceniodawcy', $arr['idzleceniodawcy']);
    $smarty->assign('dzien_tyg', $arr['dzien_tyg']);
    $smarty->assign('otwarte_od', $arr['otwarte_od']);
    $smarty->assign('otwarte_do', $arr['otwarte_do']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci_edycja_go.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Nie mozna edytowac wpisu godzin otwarcia (sprawdz ponownie):.&amp");
  }

}
elseif($_REQUEST['wpis']=='dodaj_go'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $dzien_tyg = $_POST['dzien_tyg'];
  $otwarte_od = $_POST['otwarte_od'];
  $otwarte_do = $_POST['otwarte_do'];

  $sql="INSERT INTO zleceniodawca_godz_pracy (idzleceniodawcy,dzien_tyg,otwarte_od,otwarte_do) 
						VALUES ('".$idzleceniodawcy."', '".$dzien_tyg."', '".$otwarte_od."', '".$otwarte_do."') ";
  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Wpis otwarcia zostal dodany.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_go'){

  $smarty->assign('ID', 'kontrahenci');

  $id_go = $_POST['id_go'];
  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $dzien_tyg = $_POST['dzien_tyg'];
  $otwarte_od = $_POST['otwarte_od'];
  $otwarte_do = $_POST['otwarte_do'];

    $sql="UPDATE zleceniodawca_godz_pracy SET dzien_tyg='".$dzien_tyg."',otwarte_od='".$otwarte_od."',otwarte_do='".$otwarte_do."' WHERE id_go='".$id_go."' ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane godz. otwarcia zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_go'){

  $smarty->assign('ID', 'kontrahenci');

  $id_go = $_POST['id_go'];
  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM zleceniodawca_godz_pracy WHERE id_go='".$id_go."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane godz. otwarcia zostaly usuniete.&amp");
}
//---------------------------------------------------------------------
// UWAGI ---------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_uwaga'){
  
  $smarty->assign('ID', 'kontrahenci');

    $id_uwagi = $_REQUEST['id_uwagi'];
    $idzleceniodawcy = $_REQUEST['idzleceniodawcy']; 

  $sql="SELECT * FROM zleceniodawca_uwagi WHERE id_uwagi = '".$id_uwagi."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
    $smarty->assign('id_uwagi', $arr['id_uwagi']);
    $smarty->assign('idzleceniodawcy', $arr['idzleceniodawcy']);
    $smarty->assign('data_uwagi', $arr['data_uwagi']);
    $smarty->assign('uwaga', $arr['uwaga']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci_edycja_uwagi.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Nie mozna edytowac wpisu uwagi (sprawdz ponownie):.&amp");
  }

}
elseif($_REQUEST['wpis']=='dodaj_uwaga'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $data_uwagi = $_POST['data_uwagi'];
  $uwaga = $_POST['uwaga'];

  $sql="INSERT INTO zleceniodawca_uwagi (idzleceniodawcy,data_uwagi,uwaga) 
						VALUES ('".$idzleceniodawcy."', '".$data_uwagi."', '".$uwaga."' ) ";
  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Wpis uwagi zostal dodany.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_uwaga'){

  $smarty->assign('ID', 'kontrahenci');

  $id_uwagi = $_POST['id_uwagi'];
  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $data_uwagi = $_POST['data_uwagi'];
  $uwaga = $_POST['uwaga'];

    $sql="UPDATE zleceniodawca_uwagi SET data_uwagi='".$data_uwagi."',uwaga='".$uwaga."' WHERE id_uwagi='".$id_uwagi."' ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane uwagi zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_uwaga'){

  $smarty->assign('ID', 'kontrahenci');

  $id_uwagi = $_POST['id_uwagi'];
  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM zleceniodawca_uwagi WHERE id_uwagi='".$id_uwagi."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane uwagi zostaly usuniete.&amp");
}
//---------------------------------------------------------------------
// TECHNIK ---------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_technik'){
  
  $smarty->assign('ID', 'kontrahenci');

    $praca = $_REQUEST['praca'];
    $idzleceniodawcy = $_REQUEST['idzleceniodawcy']; 

  $sql="SELECT * FROM zleceniodawca_technik WHERE idzleceniodawcy = '".$idzleceniodawcy."' AND praca = '".$praca."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){

    $sql="SELECT pracownikid FROM pracownicy ORDER BY pracownikid ";
    $wyn=myquery($sql);
    $technik[]='';
    while( $ar = mysql_fetch_assoc($wyn) ) {
      $technik[]=$ar['pracownikid'];
    }
    $smarty->assign('technik', $technik);

    $smarty->assign('idzleceniodawcy', $arr['idzleceniodawcy']);
    $smarty->assign('praca', $arr['praca']);
    $smarty->assign('pracownikid', $arr['pracownikid']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci_edycja_technik.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_technik&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Nie mozna edytowac wpisu technika (sprawdz ponownie):.&amp");
  }

}
elseif($_REQUEST['wpis']=='dodaj_technik'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $praca = $_POST['praca'];
  $pracownikid = $_POST['pracownikid'];

  $sql="INSERT INTO zleceniodawca_technik (idzleceniodawcy,praca,pracownikid) 
						VALUES ('".$idzleceniodawcy."', '".$praca."', '".$pracownikid."' ) ";
echo $sql;

  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Wpis technika zostal dodany.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_technik'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $praca_poprzednia = $_POST['praca_poprzednia'];
  $praca = $_POST['praca'];
  $pracownikid = $_POST['pracownikid'];

    $sql="UPDATE zleceniodawca_technik SET praca='".$praca."',pracownikid='".$pracownikid."' WHERE idzleceniodawcy='".$idzleceniodawcy."' AND praca='".$praca_poprzednia."' ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane technika zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_technik'){

  $smarty->assign('ID', 'kontrahenci');

  $praca = $_POST['praca'];
  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM zleceniodawca_technik WHERE idzleceniodawcy = '".$idzleceniodawcy."' AND praca = '".$praca."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane technika zostaly usuniete.&amp");
}
//---------------------------------------------------------------------
// WSPOLPRACUJACY LEKARZE ---------------------------------------------------------------------
elseif($_REQUEST['wpis']=='edycja_wsp_lek'){
  
  $smarty->assign('ID', 'kontrahenci');

    $nazwa = $_REQUEST['nazwa'];
    $idzleceniodawcy = $_REQUEST['idzleceniodawcy']; 
    $id_wsp_lek = $_REQUEST['id_wsp_lek']; 

  $sql="SELECT * FROM zleceniodawca_wsp_lek WHERE id_wsp_lek = '".$id_wsp_lek."' ";
  $wyn=myquery($sql);
  $spr= mysql_num_rows($wyn);
  $arr = mysql_fetch_assoc($wyn);

  if($spr>0){
/*
    $sql="SELECT pracownikid FROM pracownicy ORDER BY pracownikid ";
    $wyn=myquery($sql);
    $technik[]='';
    while( $ar = mysql_fetch_assoc($wyn) ) {
      $technik[]=$ar['pracownikid'];
    }
    $smarty->assign('technik', $technik);
*/
    $smarty->assign('idzleceniodawcy', $arr['idzleceniodawcy']);
    $smarty->assign('nazwa', $arr['nazwa']);
    $smarty->assign('id_wsp_lek', $arr['id_wsp_lek']);

    $smarty->assign('sub', 'tak');
    $smarty->assign('plik', 'kontrahenci_edycja_wsp_lek.tpl');
  }
  else{
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Nie mozna edytowac wpisu wspolpracujacego lekarza (sprawdz ponownie):.&amp");
  }

}
elseif($_REQUEST['wpis']=='dodaj_wsp_lek'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $nazwa = $_POST['nazwa'];

  $sql="INSERT INTO zleceniodawca_wsp_lek (idzleceniodawcy,nazwa) 
						VALUES ('".$idzleceniodawcy."', '".$nazwa."' ) ";

  $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Wpis wspolpracujacego lekarza zostal dodany.&amp");
}
elseif($_REQUEST['wpis']=='aktualizuj_wsp_lek'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $nazwa = $_POST['nazwa'];
  $id_wsp_lek = $_POST['id_wsp_lek'];

    $sql="UPDATE zleceniodawca_wsp_lek SET nazwa='".$nazwa."' WHERE id_wsp_lek='".$id_wsp_lek."' ";
    $wyn=myquery($sql);
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane wspolpracujacego lekarza zostaly zaktualizowane.&amp");
}
elseif($_REQUEST['wpis']=='usun_wsp_lek'){

  $smarty->assign('ID', 'kontrahenci');

  $idzleceniodawcy = $_POST['idzleceniodawcy'];
  $id_wsp_lek = $_POST['id_wsp_lek'];
  $czy_usunac = $_POST['czy_usunac'];

  if($czy_usunac=='tak'){
    $sql="DELETE FROM zleceniodawca_wsp_lek WHERE id_wsp_lek = '".$id_wsp_lek."' ";
    $wyn=myquery($sql);
  }
  
	header("Location: biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy=".$idzleceniodawcy."&komunikat=Dane wspolpracujacego lekarza zostaly usuniete.&amp");
}
//---------------------------------------------------------------------


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

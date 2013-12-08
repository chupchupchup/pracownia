<?php

function myquery ($query) {
    include(dirname(__FILE__).'/db_connect.inc.php');
    $result = mysql_query($query);

    if (mysql_errno()){
        echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
    }
    include(dirname(__FILE__).'/db_close.inc.php');

    return $result;
}


function material_etykiety($material, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania) {
	$e = $_SESSION['etykieta'];
	$etykieta_materialu = $_SESSION['etykieta_materialu'];
	if ($e == null) {
	   	$e = array();
	}
	if (empty($etykieta_materialu)) {
	  	$etykieta_materialu = '';
	}
	
	if (empty($material)) {	    
		$_SESSION['etykieta_materialu'] = $etykieta_materialu;
		$_SESSION['etykieta'] = $e;
		
		return;
	}
	
	$sql="SELECT nazwa,producent,nr_seryjny,dostawca FROM material_user WHERE upper(nazwa) like upper('".$material."') AND osoba_wykorzystujaca='".$_SESSION['idusera']."' AND status='act' ";
	$wynik=myquery($sql);

	$i=0;

    //tutaj dodawanie do tabeli etykiet
    include(dirname(__FILE__).'/db_connect.inc.php');
    //spr czy juz cos nie jest z tych materialow wpisane to tabeli material_etykiety
    $query = mysql_query("SELECT nazwa FROM material_etykiety WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ");
    //jezeli jest w tabeli to wywalamuy zeby wpisac nowe
    if (mysql_num_rows($query)){
      mysql_query("DELETE FROM material_etykiety WHERE kategoria='".$kategoria."' AND idzlecenianr='".$idzlecenianr."' AND
                                     idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ");
    }

	while($arr = mysql_fetch_array($wynik)){
  		//$etykieta_materialu[$i]=$arr['nazwa'].' | S/N:'.$arr['nr_seryjny'].' | Prod.:'.$arr['producent'].'';
  		$etykieta_materialu=$etykieta_materialu.'<br>'.$arr['nazwa'].' | S/N:'.$arr['nr_seryjny'].' | Prod.:'.$arr['producent'].'';
    	//dodawanie do tabeli etykiet
    	$m = array();
    	$m['nazwa'] = $arr['producent'].' '.$arr['nazwa'];
    	$m['nr_seryjny'] = $arr['nr_seryjny'];
    	$e[] = $m;     	
    	mysql_query("INSERT INTO material_etykiety (idzlecenianr,idzleceniapoz,datawpisania,kategoria,nazwa,nr_seryjny,producent,dostawca) VALUES ( '".$idzlecenianr."','".$idzleceniapoz."','".$datawpisania."','".$kategoria."','".$arr['nazwa']."','".$arr['nr_seryjny']."','".$arr['producent']."','".$arr['dostawca']."' ) ");
  		$i++;
	}
    include(dirname(__FILE__).'/db_close.inc.php');
	//print_r($etykieta_materialu);
	$_SESSION['etykieta_materialu']=$etykieta_materialu;
	$_SESSION['etykieta']=$e;
}

function pobierz_dane ($sql) {

   $sql_result=myquery($sql);

   $tablica_wynikow_zapytania=array();
   while ($row = mysql_fetch_row($sql_result)) {
        $tablica_wynikow_zapytania[] = $row;
   }
  return $tablica_wynikow_zapytania;
}

function pobierz_producentow() {
	$sql = 'SELECT id, nazwa FROM material_producenci ORDER BY id ASC';
	$result = myquery($sql);
	
	$producenci = array();
	while ($row = mysql_fetch_assoc($result)) {
		$producenci[] = $row;
	}
	
	return $producenci;
}

function extra_pack($request) {
	$extra = array();
	for ($i=1; $i<=5; $i++) {
		$nr = 'nr_seryjny_'.$i;
		if (isset($request[$nr]) && !empty($request[$nr])) {
			$producent = 'producent_'.$i;
			if (isset($request[$producent]) && ($request[$producent] != 0)) {
				$e = array('id_producenta' => czysc_zmienne_formularza($request[$producent]), 'nr_seryjny' =>czysc_zmienne_formularza($request[$nr]), 'nazwa' => czysc_zmienne_formularza($request['producent_'.$i.'_nazwa']));
				$extra[] = $e;
			}
		}
	}
	
	return $extra;
}

function extra_unpack($extra, &$target) {
	$i=1;

	foreach ($extra as $e) {
		$target['producent_'.$i]=$e['id_producenta'];
		$target['producent_'.$i.'_nazwa']=$e['nazwa'];
		$target['nr_seryjny_'.$i]=$e['nr_seryjny'];
		$i++;
	}
}

function extra_copy_to_session($request) {
	for ($i=1; $i<=5; $i++) {
		if ($_REQUEST['producent_'.$i] != null) {
			$_SESSION['form_tab']['producent_'.$i]=$_REQUEST['producent_'.$i];			
		}
		if ($_REQUEST['producent_'.$i.'_nazwa'] != null) {
			$_SESSION['form_tab']['producent_'.$i.'_nazwa']=$_REQUEST['producent_'.$i.'_nazwa'];			
		}
		if ($_REQUEST['nr_seryjny_'.$i] != null) {
			$_SESSION['form_tab']['nr_seryjny_'.$i]=$_REQUEST['nr_seryjny_'.$i];			
		}
	}
}

function extra_dbstore($idzlecenianr, $idzleceniapoz, $kategoria, $extra) {
	$sql = "SELECT 1 FROM materialy_extra WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND kategoria='".$kategoria."'";
	$result = myquery($sql);

	if (mysql_num_rows($result)) { // sa juz jakies materialy, wywalamy je
		myquery("DELETE FROM materialy_extra WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND kategoria='".$kategoria."'");
	}
	
	foreach($extra as $e) {
		myquery("INSERT INTO materialy_extra (idzlecenianr, idzleceniapoz, kategoria, id_producenta, nr_seryjny) VALUES ('".$idzlecenianr."', '".$idzleceniapoz."', '".$kategoria."', '".$e['id_producenta']."', '".$e['nr_seryjny']."')");
	}
}

function extra_dbload($idzlecenianr, $idzleceniapoz, $kategoria) {
	$extra = array();
	
	$sql = "SELECT id_producenta, nr_seryjny, nazwa FROM materialy_extra m JOIN material_producenci p ON m.id_producenta = p.id WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND kategoria='".$kategoria."'";
	$result = myquery($sql);

	while ($e = mysql_fetch_assoc($result)) {
		$extra[] = $e;
	}
	
	return $extra;
}

function material_dentyna ($rodzaj_dentyna, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania){

    $dentyna = explode(',', $_SESSION['form_tab'][$rodzaj_dentyna]);
    //echo print_r($dentyna).'<br>';

  if($rodzaj_dentyna=='dentyna_kiss'){
    $dent='';
    foreach($dentyna as $klucz => $wartosc){
		material_etykiety('Porcelana KISS Dentyna '.$wartosc, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
    }
  }
  elseif($rodzaj_dentyna=='dentyna_na_zloto'){
    $dent='';
    foreach($dentyna as $klucz => $wartosc){
		material_etykiety('Porcelana Na Z³oto Dentyna '.$wartosc, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
    }
  }
  elseif($rodzaj_dentyna=='dentyna_na_cerkon'){
    $dent='';
    foreach($dentyna as $klucz => $wartosc){
		material_etykiety('Porcelana Dentyna Na Cerkon '.$wartosc, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
    }
  }
  elseif($rodzaj_dentyna=='dentyna_na_empress'){
    $dent='';
    foreach($dentyna as $klucz => $wartosc){
		material_etykiety('Porcelana Dentyna Na Empress '.$wartosc, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
    }
  }
  elseif($rodzaj_dentyna=='dentyna_na_metal'){
    $dent='';
    foreach($dentyna as $klucz => $wartosc){
		material_etykiety('Porcelana Dentyna Na Metal '.$wartosc, $kategoria, $idzlecenianr, $idzleceniapoz, $datawpisania);
    }
  }

}

?>

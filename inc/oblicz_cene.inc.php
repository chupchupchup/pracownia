<?
class CenaCount {

  // -------------------------------------------------------
  // Construct - check automaticaly some params
  // -------------------------------------------------------

  public function __construct() {

    $this->cena  = 0;

  }
  // -------------------------------------------------------


//funkcja obliczajaca cenê zlecenia
function cena ($idzlecenianr, $idzleceniapoz, $kategoria, $datawpisania) {

 //CENA zlecenia
 $sql_cennik="SELECT * FROM  ".$kategoria."_cennik";
 $cennik=myquery($sql_cennik);
 $arr = mysql_fetch_assoc($cennik);

 $sql="SELECT * FROM ".$kategoria." WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 $wyn=myquery($sql);
 $arr1 = mysql_fetch_assoc($wyn);

  $c=0;
    switch ($kategoria) {
      case "porcelana_wkladykk":
        $c=$c+$this->c_wkladykk($arr,$arr1);
        break;
      case "porcelana_korona_licowana_na_metalu":
        $c=$c+$this->c_korona_licowana_na_metalu($arr,$arr1);
        break;
      case "porcelana_korona_pelnoceramiczna":
        $c=$c+$this->c_korona_pelnoceramiczna($arr,$arr1);
        break;
      case "porcelana_inlay_onlay_licowka":
        $c=$c+$this->c_inlay_onlay_licowka($arr,$arr1);
        break;
      case "porcelana_implanty":
        $c=$c+$this->c_implanty($arr,$arr1);
        break;
      case "porcelana_korony_inne":
        $c=$c+$this->c_korony_inne($arr,$arr1);
        break;
      case "porcelana_naprawa":
        $c=$c+$this->c_porcelana_naprawa($arr,$arr1);
        break;
      case "proteza_szkielet_szynoproteza":
        $c=$c+$this->c_szkielet_szynoproteza($arr,$arr1);
        break;
      case "proteza_calkowita":
        $c=$c+$this->c_calkowita($arr,$arr1);
        break;
      case "proteza_czesciowa":
        $c=$c+$this->c_czesciowa($arr,$arr1);
        break;
      case "proteza_szyny":
        $c=$c+$this->c_szyny($arr,$arr1);
        break;
      case "proteza_naprawa":
        $c=$c+$this->c_proteza_naprawa($arr,$arr1);
        break;
      case "proteza_prace_pomocnicze":
        $c=$c+$this->c_proteza_prace_pomocnicze($arr,$arr1);
        break;
    }

//???  echo $c.'<br>';
  return $c;
}


//FUNKCJA ZWRACAJ¡CA LICZBÊ ZÊBÓW
function ilosc_zebow($tablica_zlecenia) {
  $zabki = explode(',', $tablica_zlecenia['zeby']);
  $zabki_count=count($zabki);
  //echo 'ilosc zabkow='.$zabki_count.'<br>';
  return $zabki_count;
}

//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI WKLADY K-K
function c_wkladykk($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){

    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby' && $tablica_zlecenia[$klucz]!='wzornik'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczba_wkladow'];
      //echo 'klucz='.$klucz.'; ---------------------------------------------------------------';
      //echo $tablica_zlecenia[$klucz].'='.$tablica_cen[$tablica_zlecenia[$klucz]].'<br><br><br>';
    }
    elseif($tablica_zlecenia[$klucz]=='wzornik'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
      //echo 'klucz='.$klucz.'; ---------------------------------------------------------------';
      //echo $tablica_zlecenia[$klucz].'='.$tablica_cen[$tablica_zlecenia[$klucz]].'<br><br><br>';
    }

  }

      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}

//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PORCELANA KORONA LICOWANA NA METALU
function c_korona_licowana_na_metalu($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;

  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='gotowa' && $tablica_zlecenia[$klucz]!='chrom kobalt'
     && $tablica_zlecenia[$klucz]!='chrom nikiel' && $tablica_zlecenia[$klucz]!='ponowne napalenie porcelany'
     && $tablica_zlecenia[$klucz]!='zatrzaski' && $tablica_zlecenia[$klucz]!='zasuwy'
     && $tablica_zlecenia[$klucz]!='szklane podparcie' && $klucz!='przedzial_malowanie'
     && $tablica_zlecenia[$klucz]!='kompozyt' && $klucz!='porcelana'
     && $tablica_zlecenia[$klucz]!='z³oto'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='gotowa'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_gotowa'];
    }
    elseif($tablica_zlecenia[$klucz]=='ponowne napalenie porcelany'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczba_ponowne_nap_porcel'];
    }
    elseif($tablica_zlecenia[$klucz]=='zatrzaski'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczbazatrzaskow'];
    }
    elseif($tablica_zlecenia[$klucz]=='zasuwy'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczbazasow'];
    }
    elseif($tablica_zlecenia[$klucz]=='szklane podparcie'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczba_szklane_podparcie'];
    }
    elseif($klucz=='przedzial_malowanie'){
      $c_pom=$c_pom+$tablica_cen['przedzial_malowanie_'.$tablica_zlecenia[$klucz]];
    }

  //echo $c_pom.'-c_pom<br>';
  }
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PORCELANA KORONA PE£NOCERAMICZNA
function c_korona_pelnoceramiczna($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='gotowa' && $tablica_zlecenia[$klucz]!='liczba_gotowa'
     && $klucz!='przedzial_malowanie' && $tablica_zlecenia[$klucz]!='empress' && $tablica_zlecenia[$klucz]!='cerkon' 
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='gotowa'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_gotowa'];
    }
    elseif($klucz=='przedzial_malowanie'){
      $c_pom=$c_pom+$tablica_cen['przedzial_malowanie_'.$tablica_zlecenia[$klucz]];
    }

  //echo $c_pom.'-c_pom<br>';
  }
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PORCELANA INLAY ONLAY LICÓWKA
function c_inlay_onlay_licowka($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='licowka_kompozyt' && $tablica_zlecenia[$klucz]!='licowka_Empress'
     && $tablica_zlecenia[$klucz]!='licowka_cerkon' && $tablica_zlecenia[$klucz]!='licowka_wypalana'
     && $tablica_zlecenia[$klucz]!='licowka_Gradia'
     && $tablica_zlecenia[$klucz]!='inlay_onlay_zloto' && $tablica_zlecenia[$klucz]!='inlay_onlay_Gradia'
     && $tablica_zlecenia[$klucz]!='inlay_onlay_kompozyt' && $tablica_zlecenia[$klucz]!='inlay_onlay_Empress'
     && $tablica_zlecenia[$klucz]!='inlay_onlay_cerkon' && $tablica_zlecenia[$klucz]!='inlay_onlay_metal'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
	  //echo $tablica_cen[$tablica_zlecenia[$klucz]].' - '.$tablica_zlecenia[$klucz].'<br>';
    }
    elseif($tablica_zlecenia[$klucz]=='licówka kompozyt'){
      $c_pom=$c_pom+$tablica_cen['licowka_kompozyt']*$tablica_zlecenia['liczba_licowka_kompozyt'];
	  //echo $tablica_cen['licowka_kompozyt'].' - '.$tablica_zlecenia[$klucz].'<br>';
    }
    elseif($tablica_zlecenia[$klucz]=='licówka Empress'){
      $c_pom=$c_pom+$tablica_cen['licowka_Empress']*$tablica_zlecenia['liczba_licowka_Empress'];
    }
    elseif($tablica_zlecenia[$klucz]=='licówka cerkon'){
      $c_pom=$c_pom+$tablica_cen['licowka_cerkon']*$tablica_zlecenia['liczba_licowka_cerkon'];
    }
    elseif($tablica_zlecenia[$klucz]=='licówka wypalana'){
      $c_pom=$c_pom+$tablica_cen['licowka_wypalana']*$tablica_zlecenia['liczba_licowka_wypalana'];
    }
    elseif($tablica_zlecenia[$klucz]=='licówka Gradia'){
      $c_pom=$c_pom+$tablica_cen['licowka_Gradia']*$tablica_zlecenia['liczba_licowka_Gradia'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay z³oto'){
      $c_pom=$c_pom+$tablica_cen['inlay_onlay_zloto']*$tablica_zlecenia['liczba_inlay_onlay_zloto'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay Gradia'){
      $c_pom=$c_pom+$tablica_cen['inlay_onlay_Gradia']*$tablica_zlecenia['liczba_inlay_onlay_Gradia'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay kompozyt'){
      $c_pom=$c_pom+$tablica_cen['inlay_onlay_kompozyt']*$tablica_zlecenia['liczba_inlay_onlay_kompozyt'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay Empress'){
      $c_pom=$c_pom+$tablica_cen['inlay_onlay_Empress']*$tablica_zlecenia['liczba_inlay_onlay_Empress'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay cerkon'){
      $c_pom=$c_pom+$tablica_cen['inlay_onlay_cerkon']*$tablica_zlecenia['liczba_inlay_onlay_cerkon'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay metal'){
      $c_pom=$c_pom+$tablica_cen['inlay_onlay_metal']*$tablica_zlecenia['liczba_inlay_onlay_metal'];
    }
//echo $tablica_zlecenia[$klucz].'<br>';
  //echo $c_pom.'-c_pom<br>';
  }
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PORCELANA IMPLANTY
function c_implanty($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='licowane porcelan±' && $tablica_zlecenia[$klucz]!='cerkon'
     && $tablica_zlecenia[$klucz]!='korona z implantem' && $tablica_zlecenia[$klucz]!='przês³o'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='korona z implantem'){
      //echo $tablica_zlecenia[$klucz].'<br>';
      //echo 'korona '.$tablica_zlecenia['material'].' = '.$tablica_cen['korona '.$tablica_zlecenia['material']].'<br>';
      //echo $tablica_zlecenia['liczba_korona_implant'].'<br>';
      $c_pom=$c_pom+$tablica_cen['korona '.$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_korona_implant'];
      //echo $c_pom;
    }
    elseif($tablica_zlecenia[$klucz]=='przês³o'){
      //echo $tablica_zlecenia[$klucz].'<br>';
      $c_pom=$c_pom+$tablica_cen['przês³o '.$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_przeslo'];
      //echo $c_pom;
    }

//  echo $c_pom.'-c_pom<br>';
  }

      $c_pom=$c_pom+$tablica_zlecenia['zakupione_cena'];
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PORCELANA KORONY INNE
function c_korony_inne($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='korona akrylowa' && $tablica_zlecenia[$klucz]!='korona kompozytowa'
     && $tablica_zlecenia[$klucz]!='w³ókno szklane' && $tablica_zlecenia[$klucz]!='teleskop metal'
     && $tablica_zlecenia[$klucz]!='teleskop z³oty' && $tablica_zlecenia[$klucz]!='teleskop cerkon'
     && $tablica_zlecenia[$klucz]!='teleskop licowany kompozytem' && $tablica_zlecenia[$klucz]!='akrylowa skanowana'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='korona akrylowa'){
      $c_pom=$c_pom+$tablica_cen['korona akrylowa']*$tablica_zlecenia['liczba_korona_akryl'];
    }
    elseif($tablica_zlecenia[$klucz]=='korona kompozytowa'){
      $c_pom=$c_pom+$tablica_cen['korona kompozytowa']*$tablica_zlecenia['liczba_korona_kompozyt'];
    }
    elseif($tablica_zlecenia[$klucz]=='w³ókno szklane'){
      $c_pom=$c_pom+$tablica_cen['w³ókno szklane']*$tablica_zlecenia['liczba_wlokno_szklane'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop metal'){
      $c_pom=$c_pom+$tablica_cen['teleskop metal']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop z³oty'){
      $c_pom=$c_pom+$tablica_cen['teleskop z³oty']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop cerkon'){
      $c_pom=$c_pom+$tablica_cen['teleskop cerkon']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop licowany kompozytem'){
      $c_pom=$c_pom+$tablica_cen['teleskop licowany kompozytem']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='akrylowa skanowana'){
      $c_pom=$c_pom+$tablica_cen['akrylowa skanowana']*$tablica_zlecenia['liczba_akryl_skan'];
    }

  //echo $c_pom.'-c_pom<br>';
  }
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}

/*
//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PORCELANA NAPRAWA
function c_porcelana_naprawa($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }else{}

  //echo $c_pom.'-c_pom<br>';
  }
      $c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}
*/

//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PROTEZA SZKIELET SZYNOPROTEZA
function c_szkielet_szynoproteza($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='szkieletowa' && $tablica_zlecenia[$klucz]!='szkieletowa na zasuwach'
     && $tablica_zlecenia[$klucz]!='szkieletowa na zatrzaskach' && $tablica_zlecenia[$klucz]!='szkieletowa na teleskopach'
     && $tablica_zlecenia[$klucz]!='szynoproteza' && $tablica_zlecenia[$klucz]!='gotowa'
     && $tablica_zlecenia[$klucz]!='zêby ivoclar'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa'){
      $c_pom=$c_pom+$tablica_cen['szkieletowa']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa na zasuwach'){
      $c_pom=$c_pom+$tablica_cen['szkieletowa na zasuwach']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa na zatrzaskach'){
      $c_pom=$c_pom+$tablica_cen['szkieletowa na zatrzaskach']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa na teleskopach'){
      $c_pom=$c_pom+$tablica_cen['szkieletowa na teleskopach']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szynoproteza'){
      $c_pom=$c_pom+$tablica_cen['szynoproteza']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='gotowa'){
      $c_pom=$c_pom+$tablica_cen['gotowa']*$tablica_zlecenia['liczba_gotowa'];
    }
    elseif($tablica_zlecenia[$klucz]=='zêby ivoclar'){
      $c_pom=$c_pom+$tablica_cen['zêby ivoclar']*$tablica_zlecenia['liczba_zeby_ivoclar'];
    }

  //echo $c_pom.'-c_pom<br>';
  }

      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PROTEZA CA£KOWITA
function c_calkowita($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='proteza standardowa' && $tablica_zlecenia[$klucz]!='proteza ca³kowita w artykulatorze'
     && $tablica_zlecenia[$klucz]!='proteza w systemie iniekcyjnym' && $tablica_zlecenia[$klucz]!='nak³ady'
     && $tablica_zlecenia[$klucz]!='zêby ivoclar'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza standardowa'){
      $c_pom=$c_pom+$tablica_cen['proteza standardowa']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza ca³kowita w artykulatorze'){
      $c_pom=$c_pom+$tablica_cen['proteza ca³kowita w artykulatorze']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza w systemie iniekcyjnym'){
      $c_pom=$c_pom+$tablica_cen['proteza w systemie iniekcyjnym']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='nak³ady'){
      $c_pom=$c_pom+$tablica_cen['nak³ady']*$tablica_zlecenia['liczba_naklady'];
    }
    elseif($tablica_zlecenia[$klucz]=='zêby ivoclar'){
      $c_pom=$c_pom+$tablica_cen['zêby ivoclar']*$tablica_zlecenia['liczba_zeby_ivoclar'];
    }

  //echo $c_pom.'-c_pom<br>';
  }

      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PROTEZA CZÊ¦CIOWA
function c_czesciowa($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='proteza standardowa' && $tablica_zlecenia[$klucz]!='proteza w artykulatorze'
     && $tablica_zlecenia[$klucz]!='proteza w systemie iniekcyjnym' && $tablica_zlecenia[$klucz]!='mikroproteza'
     && $tablica_zlecenia[$klucz]!='zêby ivoclar'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza standardowa'){
      $c_pom=$c_pom+$tablica_cen['proteza standardowa']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza w artykulatorze'){
      $c_pom=$c_pom+$tablica_cen['proteza w artykulatorze']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza w systemie iniekcyjnym'){
      $c_pom=$c_pom+$tablica_cen['proteza w systemie iniekcyjnym']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='mikroproteza'){
      $c_pom=$c_pom+$tablica_cen['mikroproteza']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='zêby ivoclar'){
      $c_pom=$c_pom+$tablica_cen['zêby ivoclar']*$tablica_zlecenia['liczba_zeby_ivoclar'];
    }

  //echo $c_pom.'-c_pom<br>';
  }
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PROTEZA SZYNY
function c_szyny($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]])
      && $tablica_zlecenia[$klucz]!='wybielajaca' && $tablica_zlecenia[$klucz]!='relaksacyjnatm'
      && $tablica_zlecenia[$klucz]!='relaksacyjnatn' && $tablica_zlecenia[$klucz]!='relaksacyjnam'
      && $tablica_zlecenia[$klucz]!='relaksacyjnampk' && $tablica_zlecenia[$klucz]!='ochronna'
      && $tablica_zlecenia[$klucz]!='pozycjonowanie' && $tablica_zlecenia[$klucz]!='nagryzowa_w_artykulatorz'
      && $tablica_zlecenia[$klucz]!='nti' && $tablica_zlecenia[$klucz]!='aparat_ortodontyczny'
      && $tablica_zlecenia[$klucz]!='szyna_korony_tymczasowe' && $tablica_zlecenia[$klucz]!='szyna_zabiegi_implantologiczne'
      && $tablica_zlecenia[$klucz]!='plyta_podjezykowa' && $tablica_zlecenia[$klucz]!='aparat_przeciw_chrapaniu'
      && $tablica_zlecenia[$klucz]!='inne'
    ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='wybielajaca'){
      $c_pom=$c_pom+$tablica_cen['wybielajaca']*$tablica_zlecenia['liczbawybielajacych'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna twardo-miêkka'){
      $c_pom=$c_pom+$tablica_cen['relaksacyjnatm']*$tablica_zlecenia['liczbarelaksacyjnatm'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna twarda-nagryzowa'){
      $c_pom=$c_pom+$tablica_cen['relaksacyjnatn']*$tablica_zlecenia['liczbarelaksacyjnatn'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna miêkka'){
      $c_pom=$c_pom+$tablica_cen['relaksacyjnam']*$tablica_zlecenia['liczbarelaksacyjnam'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna miêkka press-kolor'){
      $c_pom=$c_pom+$tablica_cen['relaksacyjnampk']*$tablica_zlecenia['liczbarelaksacyjnampk'];
    }
    elseif($tablica_zlecenia[$klucz]=='ochronna kolor'){
      $c_pom=$c_pom+$tablica_cen['ochronna']*$tablica_zlecenia['liczbaochronna'];
    }
    elseif($tablica_zlecenia[$klucz]=='do pozycjonowania implantów z markerami'){
      $c_pom=$c_pom+$tablica_cen['pozycjonowanie']*$tablica_zlecenia['liczbapozycjonowanie'];
    }
    elseif($tablica_zlecenia[$klucz]=='nagryzowa w artykulatorze'){
      $c_pom=$c_pom+$tablica_cen['nagryzowa_w_artykulatorze']*$tablica_zlecenia['liczbanagryzowa_w_artykulatorze'];
    }
    elseif($tablica_zlecenia[$klucz]=='nti'){
      $c_pom=$c_pom+$tablica_cen['nti']*$tablica_zlecenia['liczbanti'];
    }
    elseif($tablica_zlecenia[$klucz]=='aparat ortodontyczny'){
      $c_pom=$c_pom+$tablica_cen['aparat_ortodontyczny']*$tablica_zlecenia['liczbaaparat_ortodontyczny'];
    }
    elseif($tablica_zlecenia[$klucz]=='szyna do koron tymczasowych'){
      $c_pom=$c_pom+$tablica_cen['szyna_korony_tymczasowe']*$tablica_zlecenia['liczbaszyna_korony_tymczasowe'];
    }
    elseif($tablica_zlecenia[$klucz]=='szyna do zabiegów implantologicznych z nawierceniami'){
      $c_pom=$c_pom+$tablica_cen['szyna_zabiegi_implantologiczne']*$tablica_zlecenia['liczbaszyna_zabiegi_implantologiczne'];
    }
    elseif($tablica_zlecenia[$klucz]=='p³yta podjêzykowa twarda'){
      $c_pom=$c_pom+$tablica_cen['plyta_podjezykowa']*$tablica_zlecenia['liczbaplyta_podjezykowa'];
    }
    elseif($tablica_zlecenia[$klucz]=='aparat przeciw chrapaniu'){
      $c_pom=$c_pom+$tablica_cen['aparat_przeciw_chrapaniu']*$tablica_zlecenia['liczbaaparat_przeciw_chrapaniu'];
    }
    elseif($tablica_zlecenia[$klucz]=='inne'){
      $c_pom=$c_pom+$tablica_cen['inne']*$tablica_zlecenia['liczbainne'];
    }

  }

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PROTEZA NAPRAWA
function c_proteza_naprawa($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='dostawienie zêba' && $tablica_zlecenia[$klucz]!='dostawienie klamry'
     && $tablica_zlecenia[$klucz]!='element lany'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='dostawienie zêba' && $tablica_zlecenia['dostawienie_zeba_ilosc']>0){
        $c_pom=$c_pom+$tablica_cen['dostawienie zêba']*$tablica_zlecenia['dostawienie_zeba_ilosc']+25;
    }
    elseif($tablica_zlecenia[$klucz]=='dostawienie klamry' && $tablica_zlecenia['dostawienie_klamry_ilosc']>0){
      $c_pom=$c_pom+$tablica_cen['dostawienie klamry']*$tablica_zlecenia['dostawienie_klamry_ilosc']+25;
    }
    elseif($tablica_zlecenia[$klucz]=='element lany'){
      $c_pom=$c_pom+$tablica_cen['element lany']*$tablica_zlecenia['element_lany_ilosc'];
    }

  //echo $c_pom.'-c_pom<br>';
  }
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


//FUNKCJA OBLICZAJ¡CA CENÊ DLA TABELI PROTEZA PRACE POMOCNICZE
function c_proteza_prace_pomocnicze($tablica_cen,$tablica_zlecenia) {
  $c_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_cen[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='model diagnostyczny / orientacyjny' && $tablica_zlecenia[$klucz]!='dodatkowy wzornik'
     && $tablica_zlecenia[$klucz]!='wax-up' && $tablica_zlecenia[$klucz]!='model dzielony dodatkowy'
     && $tablica_zlecenia[$klucz]!='³y¿ka indywidualna'
     ){
      $c_pom=$c_pom+$tablica_cen[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='model diagnostyczny / orientacyjny'){
      $c_pom=$c_pom+$tablica_cen['model diagnostyczny / orientacyjny']*$tablica_zlecenia['liczba_model_diag_orient'];
    }
    elseif($tablica_zlecenia[$klucz]=='dodatkowy wzornik'){
      $c_pom=$c_pom+$tablica_cen['dodatkowy wzornik']*$tablica_zlecenia['liczba_dodatkowy_wzornik'];
    }
    elseif($tablica_zlecenia[$klucz]=='wax-up'){
      $c_pom=$c_pom+$tablica_cen['wax-up']*$tablica_zlecenia['liczba_wax_up'];
    }
    elseif($tablica_zlecenia[$klucz]=='model dzielony dodatkowy'){
      $c_pom=$c_pom+$tablica_cen['model dzielony dodatkowy']*$tablica_zlecenia['liczba_model_dzielony_dodatkowy'];
    }
    elseif($tablica_zlecenia[$klucz]=='³y¿ka indywidualna'){
      $c_pom=$c_pom+$tablica_cen['³y¿ka indywidualna']*$tablica_zlecenia['liczba_lyzka_indywidualna'];
    }

  //echo $c_pom.'-c_pom<br>';
  }
      //$c_pom=$c_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $c_pom;
}


}
?>

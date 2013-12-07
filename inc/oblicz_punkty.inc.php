<?php
class PunktyCount {

  // -------------------------------------------------------
  // Construct - check automaticaly some params
  // -------------------------------------------------------

  public function __construct() {

    $this->punkty  = 0;

  }
  // -------------------------------------------------------


//funkcja zliczajaca punkty za zlecenie z danej tabeli
function punkty ($idzlecenianr, $idzleceniapoz, $kategoria, $datawpisania) {

 $sql_punkty="SELECT * FROM  ".$kategoria."_punkty";
 $punkty=myquery($sql_punkty);
 $arr = mysql_fetch_assoc($punkty);

 $sql="SELECT * FROM ".$kategoria." WHERE idzlecenianr='".$idzlecenianr."' AND idzleceniapoz='".$idzleceniapoz."' AND datawpisania='".$datawpisania."' ";
 $wyn=myquery($sql);
 $arr1 = mysql_fetch_assoc($wyn);

  $p=0;
    switch ($kategoria) {
      case "porcelana_wkladykk":
        $p=$p+$this->p_wkladykk($arr,$arr1);
        break;
      case "porcelana_korona_licowana_na_metalu":
        $p=$p+$this->p_korona_licowana($arr,$arr1);
        break;
      case "porcelana_korona_pelnoceramiczna":
        $p=$p+$this->p_korona_pelnoceramiczna($arr,$arr1);
        break;
      case "porcelana_inlay_onlay_licowka":
        $p=$p+$this->p_inlay_onlay_licowka($arr,$arr1);
        break;
      case "porcelana_implanty":
        $p=$p+$this->p_implanty($arr,$arr1);
        break;
      case "porcelana_korony_inne":
        $p=$p+$this->p_korony_inne($arr,$arr1);
        break;
      case "porcelana_naprawa":
        $p=$p+$this->p_porcelana_naprawa($arr,$arr1);
        break;
      case "proteza_szkielet_szynoproteza":
        $p=$p+$this->p_szkielet_szynoproteza($arr,$arr1);
        break;
      case "proteza_calkowita":
        $p=$p+$this->p_calkowita($arr,$arr1);
        break;
      case "proteza_czesciowa":
        $p=$p+$this->p_czesciowa($arr,$arr1);
        break;
      case "proteza_szyny":
        $p=$p+$this->p_szyny($arr,$arr1);
        break;
      case "proteza_naprawa":
        $p=$p+$this->p_proteza_naprawa($arr,$arr1);
        break;
      case "proteza_prace_pomocnicze":
        $p=$p+$this->p_proteza_prace_pomocnicze($arr,$arr1);
        break;
    }

//???  echo $p.'<br>';
  return $p;
}

//FUNKCJA ZWRACAJ�CA LICZB� Z�B�W
function ilosc_zebow($tablica_zlecenia) {
  $zabki = explode(',', $tablica_zlecenia['zeby']);
  $zabki_count=count($zabki);
  //echo 'ilosc zabkow='.$zabki_count.'<br>';
  return $zabki_count;
}

//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI WKLADY K-K
function p_wkladykk($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){

    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby' && $tablica_zlecenia[$klucz]!='wzornik'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczba_wkladow'];
      //echo 'klucz='.$klucz.'; ---------------------------------------------------------------';
      //echo $tablica_zlecenia[$klucz].'='.$tablica_punktow[$tablica_zlecenia[$klucz]].'<br><br><br>';
    }
    elseif($tablica_zlecenia[$klucz]=='wzornik'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
      //echo 'klucz='.$klucz.'; ---------------------------------------------------------------';
      //echo $tablica_zlecenia[$klucz].'='.$tablica_punktow[$tablica_zlecenia[$klucz]].'<br><br><br>';
    }

  }

     // $p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}

//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PORCELANA KORONA LICOWANA NA METALU
function p_korona_licowana($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;

  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='gotowa' && $tablica_zlecenia[$klucz]!='chrom kobalt'
     && $tablica_zlecenia[$klucz]!='chrom nikiel' && $tablica_zlecenia[$klucz]!='ponowne napalenie porcelany'
     && $tablica_zlecenia[$klucz]!='zatrzaski' && $tablica_zlecenia[$klucz]!='zasuwy'
     && $tablica_zlecenia[$klucz]!='szklane podparcie' && $klucz!='przedzial_malowanie'
     && $tablica_zlecenia[$klucz]!='kompozyt' && $klucz!='porcelana'
     && $tablica_zlecenia[$klucz]!='z�oto'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='gotowa'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_gotowa'];
    }
    elseif($tablica_zlecenia[$klucz]=='ponowne napalenie porcelany'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczba_ponowne_nap_porcel'];
    }
    elseif($tablica_zlecenia[$klucz]=='zatrzaski'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczbazatrzaskow'];
    }
    elseif($tablica_zlecenia[$klucz]=='zasuwy'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczbazasow'];
    }
    elseif($tablica_zlecenia[$klucz]=='szklane podparcie'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]]*$tablica_zlecenia['liczba_szklane_podparcie'];
    }
    elseif($klucz=='przedzial_malowanie'){
      $p_pom=$p_pom+$tablica_punktow['przedzial_malowanie_'.$tablica_zlecenia[$klucz]];
    }
  //    $p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);
  }
  
  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PORCELANA KORONA PE�NOCERAMICZNA
function p_korona_pelnoceramiczna($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='cerkon' && $tablica_zlecenia[$klucz]!='empress'
     && $tablica_zlecenia[$klucz]!='gotowa' && $tablica_zlecenia[$klucz]!='liczba_gotowa'
     && $klucz!='przedzial_malowanie'    //&& $tablica_zlecenia[$klucz]!='empress' && $tablica_zlecenia[$klucz]!='cerkon' 
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='gotowa'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_gotowa'];
    }
    elseif($klucz=='przedzial_malowanie'){
      $p_pom=$p_pom+$tablica_punktow['przedzial_malowanie_'.$tablica_zlecenia[$klucz]];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PORCELANA INLAY ONLAY LIC�WKA
function p_inlay_onlay_licowka($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='licowka_kompozyt' && $tablica_zlecenia[$klucz]!='licowka_Empress'
     && $tablica_zlecenia[$klucz]!='licowka_cerkon' && $tablica_zlecenia[$klucz]!='licowka_wypalana'
     && $tablica_zlecenia[$klucz]!='licowka_Gradia'
     && $tablica_zlecenia[$klucz]!='inlay_onlay_zloto' && $tablica_zlecenia[$klucz]!='inlay_onlay_Gradia'
     && $tablica_zlecenia[$klucz]!='inlay_onlay_kompozyt' && $tablica_zlecenia[$klucz]!='inlay_onlay_Empress'
     && $tablica_zlecenia[$klucz]!='inlay_onlay_cerkon' && $tablica_zlecenia[$klucz]!='inlay_onlay_metal'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='lic�wka kompozyt'){
      $p_pom=$p_pom+$tablica_punktow['licowka_kompozyt']*$tablica_zlecenia['liczba_licowka_kompozyt'];
    }
    elseif($tablica_zlecenia[$klucz]=='lic�wka Empress'){
      $p_pom=$p_pom+$tablica_punktow['licowka_Empress']*$tablica_zlecenia['liczba_licowka_Empress'];
	  //echo $tablica_punktow['licowka_Empress'].' - cena <br>';
    }
    elseif($tablica_zlecenia[$klucz]=='lic�wka cerkon'){
      $p_pom=$p_pom+$tablica_punktow['licowka_cerkon']*$tablica_zlecenia['liczba_licowka_cerkon'];
    }
    elseif($tablica_zlecenia[$klucz]=='lic�wka wypalana'){
      $p_pom=$p_pom+$tablica_punktow['licowka_wypalana']*$tablica_zlecenia['liczba_licowka_wypalana'];
    }
    elseif($tablica_zlecenia[$klucz]=='lic�wka Gradia'){
      $p_pom=$p_pom+$tablica_punktow['licowka_Gradia']*$tablica_zlecenia['liczba_licowka_Gradia'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay z�oto'){
      $p_pom=$p_pom+$tablica_punktow['inlay_onlay_zloto']*$tablica_zlecenia['liczba_inlay_onlay_zloto'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay Gradia'){
      $p_pom=$p_pom+$tablica_punktow['inlay_onlay_Gradia']*$tablica_zlecenia['liczba_inlay_onlay_Gradia'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay kompozyt'){
      $p_pom=$p_pom+$tablica_punktow['inlay_onlay_kompozyt']*$tablica_zlecenia['liczba_inlay_onlay_kompozyt'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay Empress'){
      $p_pom=$p_pom+$tablica_punktow['inlay_onlay_Empress']*$tablica_zlecenia['liczba_inlay_onlay_Empress'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay cerkon'){
      $p_pom=$p_pom+$tablica_punktow['inlay_onlay_cerkon']*$tablica_zlecenia['liczba_inlay_onlay_cerkon'];
    }
    elseif($tablica_zlecenia[$klucz]=='inlay onlay metal'){
      $p_pom=$p_pom+$tablica_punktow['inlay_onlay_metal']*$tablica_zlecenia['liczba_inlay_onlay_metal'];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PORCELANA IMPLANTY
function p_implanty($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='licowane porcelan�' && $tablica_zlecenia[$klucz]!='cerkon'
     && $tablica_zlecenia[$klucz]!='korona z implantem' && $tablica_zlecenia[$klucz]!='prz�s�o'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='korona z implantem'){
      $p_pom=$p_pom+$tablica_punktow['korona '.$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_korona_implant'];
    }
    elseif($tablica_zlecenia[$klucz]=='prz�s�o'){
      $p_pom=$p_pom+$tablica_punktow['prz�s�o '.$tablica_zlecenia['material']]*$tablica_zlecenia['liczba_przeslo'];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom+$tablica_zlecenia['zakupione_cena'];
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PORCELANA KORONY INNE
function p_korony_inne($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='korona akrylowa' && $tablica_zlecenia[$klucz]!='korona kompozytowa'
     && $tablica_zlecenia[$klucz]!='w��kno szklane' && $tablica_zlecenia[$klucz]!='teleskop metal'
     && $tablica_zlecenia[$klucz]!='teleskop z�oty' && $tablica_zlecenia[$klucz]!='teleskop cerkon'
     && $tablica_zlecenia[$klucz]!='teleskop licowany kompozytem' && $tablica_zlecenia[$klucz]!='akrylowa skanowana'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='korona akrylowa'){
      $p_pom=$p_pom+$tablica_punktow['korona akrylowa']*$tablica_zlecenia['liczba_korona_akryl'];
    }
    elseif($tablica_zlecenia[$klucz]=='korona kompozytowa'){
      $p_pom=$p_pom+$tablica_punktow['korona kompozytowa']*$tablica_zlecenia['liczba_korona_kompozyt'];
    }
    elseif($tablica_zlecenia[$klucz]=='w��kno szklane'){
      $p_pom=$p_pom+$tablica_punktow['w��kno szklane']*$tablica_zlecenia['liczba_wlokno_szklane'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop metal'){
      $p_pom=$p_pom+$tablica_punktow['teleskop metal']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop z�oty'){
      $p_pom=$p_pom+$tablica_punktow['teleskop z�oty']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop cerkon'){
      $p_pom=$p_pom+$tablica_punktow['teleskop cerkon']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='teleskop licowany kompozytem'){
      $p_pom=$p_pom+$tablica_punktow['teleskop licowany kompozytem']*$tablica_zlecenia['liczba_teleskop'];
    }
    elseif($tablica_zlecenia[$klucz]=='akrylowa skanowana'){
      $p_pom=$p_pom+$tablica_punktow['akrylowa skanowana']*$tablica_zlecenia['liczba_akryl_skan'];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}

/*
//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PORCELANA NAPRAWA
function p_porcelana_naprawa($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }else{}

  //echo $p_pom.'-p_pom<br>';
  }
      $p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}
*/

//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PROTEZA SZKIELET SZYNOPROTEZA
function p_szkielet_szynoproteza($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='szkieletowa' && $tablica_zlecenia[$klucz]!='szkieletowa na zasuwach'
     && $tablica_zlecenia[$klucz]!='szkieletowa na zatrzaskach' && $tablica_zlecenia[$klucz]!='szkieletowa na teleskopach'
     && $tablica_zlecenia[$klucz]!='szynoproteza' && $tablica_zlecenia[$klucz]!='gotowa'
     && $tablica_zlecenia[$klucz]!='z�by ivoclar'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa'){
      $p_pom=$p_pom+$tablica_punktow['szkieletowa']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa na zasuwach'){
      $p_pom=$p_pom+$tablica_punktow['szkieletowa na zasuwach']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa na zatrzaskach'){
      $p_pom=$p_pom+$tablica_punktow['szkieletowa na zatrzaskach']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szkieletowa na teleskopach'){
      $p_pom=$p_pom+$tablica_punktow['szkieletowa na teleskopach']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='szynoproteza'){
      $p_pom=$p_pom+$tablica_punktow['szynoproteza']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='gotowa'){
      $p_pom=$p_pom+$tablica_punktow['gotowa']*$tablica_zlecenia['liczba_gotowa'];
    }
    elseif($tablica_zlecenia[$klucz]=='z�by ivoclar'){
      $p_pom=$p_pom+$tablica_punktow['z�by ivoclar']*$tablica_zlecenia['liczba_zeby_ivoclar'];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PROTEZA CA�KOWITA
function p_calkowita($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='proteza standardowa' && $tablica_zlecenia[$klucz]!='proteza ca�kowita w artykulatorze'
     && $tablica_zlecenia[$klucz]!='proteza w systemie iniekcyjnym' && $tablica_zlecenia[$klucz]!='nak�ady'
     && $tablica_zlecenia[$klucz]!='z�by ivoclar'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza standardowa'){
      $p_pom=$p_pom+$tablica_punktow['proteza standardowa']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza ca�kowita w artykulatorze'){
      $p_pom=$p_pom+$tablica_punktow['proteza ca�kowita w artykulatorze']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza w systemie iniekcyjnym'){
      $p_pom=$p_pom+$tablica_punktow['proteza w systemie iniekcyjnym']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='nak�ady'){
      $p_pom=$p_pom+$tablica_punktow['nak�ady']*$tablica_zlecenia['liczba_naklady'];
    }
    elseif($tablica_zlecenia[$klucz]=='z�by ivoclar'){
      $p_pom=$p_pom+$tablica_punktow['z�by ivoclar']*$tablica_zlecenia['liczba_zeby_ivoclar'];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PROTEZA CZʦCIOWA
function p_czesciowa($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='proteza standardowa' && $tablica_zlecenia[$klucz]!='proteza w artykulatorze'
     && $tablica_zlecenia[$klucz]!='proteza w systemie iniekcyjnym' && $tablica_zlecenia[$klucz]!='mikroproteza'
     && $tablica_zlecenia[$klucz]!='z�by ivoclar'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza standardowa'){
      $p_pom=$p_pom+$tablica_punktow['proteza standardowa']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza w artykulatorze'){
      $p_pom=$p_pom+$tablica_punktow['proteza ca�kowita w artykulatorze']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='proteza w systemie iniekcyjnym'){
      $p_pom=$p_pom+$tablica_punktow['proteza w systemie iniekcyjnym']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='mikroproteza'){
      $p_pom=$p_pom+$tablica_punktow['mikroproteza']*$tablica_zlecenia['liczba_proteza'];
    }
    elseif($tablica_zlecenia[$klucz]=='z�by ivoclar'){
      $p_pom=$p_pom+$tablica_punktow['z�by ivoclar']*$tablica_zlecenia['liczba_zeby_ivoclar'];
    }

  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PROTEZA SZYNY
function p_szyny($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]])
      && $tablica_zlecenia[$klucz]!='wybielajaca' && $tablica_zlecenia[$klucz]!='relaksacyjnatm'
      && $tablica_zlecenia[$klucz]!='relaksacyjnatn' && $tablica_zlecenia[$klucz]!='relaksacyjnam'
      && $tablica_zlecenia[$klucz]!='relaksacyjnampk' && $tablica_zlecenia[$klucz]!='ochronna'
      && $tablica_zlecenia[$klucz]!='pozycjonowanie' && $tablica_zlecenia[$klucz]!='nagryzowa_w_artykulatorz'
      && $tablica_zlecenia[$klucz]!='nti' && $tablica_zlecenia[$klucz]!='aparat_ortodontyczny'
      && $tablica_zlecenia[$klucz]!='szyna_korony_tymczasowe' && $tablica_zlecenia[$klucz]!='szyna_zabiegi_implantologiczne'
      && $tablica_zlecenia[$klucz]!='plyta_podjezykowa' && $tablica_zlecenia[$klucz]!='aparat_przeciw_chrapaniu'
      && $tablica_zlecenia[$klucz]!='inne'
    ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='wybielajaca'){
      $p_pom=$p_pom+$tablica_punktow['wybielajaca']*$tablica_zlecenia['liczbawybielajacych'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna twardo-mi�kka'){
      $p_pom=$p_pom+$tablica_punktow['relaksacyjnatm']*$tablica_zlecenia['liczbarelaksacyjnatm'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna twarda-nagryzowa'){
      $p_pom=$p_pom+$tablica_punktow['relaksacyjnatn']*$tablica_zlecenia['liczbarelaksacyjnatn'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna mi�kka'){
      $p_pom=$p_pom+$tablica_punktow['relaksacyjnam']*$tablica_zlecenia['liczbarelaksacyjnam'];
    }
    elseif($tablica_zlecenia[$klucz]=='relaksacyjna mi�kka press-kolor'){
      $p_pom=$p_pom+$tablica_punktow['relaksacyjnampk']*$tablica_zlecenia['liczbarelaksacyjnampk'];
    }
    elseif($tablica_zlecenia[$klucz]=='ochronna kolor'){
      $p_pom=$p_pom+$tablica_punktow['ochronna']*$tablica_zlecenia['liczbaochronna'];
    }
    elseif($tablica_zlecenia[$klucz]=='do pozycjonowania implant�w z markerami'){
      $p_pom=$p_pom+$tablica_punktow['pozycjonowanie']*$tablica_zlecenia['liczbapozycjonowanie'];
    }
    elseif($tablica_zlecenia[$klucz]=='nagryzowa w artykulatorze'){
      $p_pom=$p_pom+$tablica_punktow['nagryzowa_w_artykulatorze']*$tablica_zlecenia['liczbanagryzowa_w_artykulatorze'];
    }
    elseif($tablica_zlecenia[$klucz]=='nti'){
      $p_pom=$p_pom+$tablica_punktow['nti']*$tablica_zlecenia['liczbanti'];
    }
    elseif($tablica_zlecenia[$klucz]=='aparat ortodontyczny'){
      $p_pom=$p_pom+$tablica_punktow['aparat_ortodontyczny']*$tablica_zlecenia['liczbaaparat_ortodontyczny'];
    }
    elseif($tablica_zlecenia[$klucz]=='szyna do koron tymczasowych'){
      $p_pom=$p_pom+$tablica_punktow['szyna_korony_tymczasowe']*$tablica_zlecenia['liczbaszyna_korony_tymczasowe'];
    }
    elseif($tablica_zlecenia[$klucz]=='szyna do zabieg�w implantologicznych z nawierceniami'){
      $p_pom=$p_pom+$tablica_punktow['szyna_zabiegi_implantologiczne']*$tablica_zlecenia['liczbaszyna_zabiegi_implantologiczne'];
    }
    elseif($tablica_zlecenia[$klucz]=='p�yta podj�zykowa twarda'){
      $p_pom=$p_pom+$tablica_punktow['plyta_podjezykowa']*$tablica_zlecenia['liczbaplyta_podjezykowa'];
    }
    elseif($tablica_zlecenia[$klucz]=='aparat przeciw chrapaniu'){
      $p_pom=$p_pom+$tablica_punktow['aparat_przeciw_chrapaniu']*$tablica_zlecenia['liczbaaparat_przeciw_chrapaniu'];
    }
    elseif($tablica_zlecenia[$klucz]=='inne'){
      $p_pom=$p_pom+$tablica_punktow['inne']*$tablica_zlecenia['liczbainne'];
    }
  }

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA LICZB� PUNKT�W DLA TABELI PROTEZA NAPRAWA
function p_proteza_naprawa($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='dostawienie z�ba' && $tablica_zlecenia[$klucz]!='dostawienie klamry'
     && $tablica_zlecenia[$klucz]!='element lany'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='dostawienie z�ba' && $tablica_zlecenia['dostawienie_zeba_ilosc']>0){
      $p_pom=$p_pom+$tablica_punktow['dostawienie z�ba']*$tablica_zlecenia['dostawienie_zeba_ilosc']+1;
    }
    elseif($tablica_zlecenia[$klucz]=='dostawienie klamry' && $tablica_zlecenia['dostawienie_klamry_ilosc']>0){
      $p_pom=$p_pom+$tablica_punktow['dostawienie klamry']*$tablica_zlecenia['dostawienie_klamry_ilosc']+1;
    }
    elseif($tablica_zlecenia[$klucz]=='element lany'){
      $p_pom=$p_pom+$tablica_punktow['element lany']*$tablica_zlecenia['element_lany_ilosc'];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


//FUNKCJA OBLICZAJ�CA CEN� DLA TABELI PROTEZA PRACE POMOCNICZE
function p_proteza_prace_pomocnicze($tablica_punktow,$tablica_zlecenia) {
  $p_pom=0;
  foreach($tablica_zlecenia as $klucz => $wartosc){
    if($tablica_zlecenia[$klucz]!='' && isset($tablica_punktow[$tablica_zlecenia[$klucz]]) && $klucz!='zeby'
     && $tablica_zlecenia[$klucz]!='model diagnostyczny / orientacyjny' && $tablica_zlecenia[$klucz]!='dodatkowy wzornik'
     && $tablica_zlecenia[$klucz]!='wax-up' && $tablica_zlecenia[$klucz]!='model dzielony dodatkowy'
     && $tablica_zlecenia[$klucz]!='�y�ka indywidualna'
     ){
      $p_pom=$p_pom+$tablica_punktow[$tablica_zlecenia[$klucz]];
    }
    elseif($tablica_zlecenia[$klucz]=='model diagnostyczny / orientacyjny'){
      $p_pom=$p_pom+$tablica_punktow['model diagnostyczny / orientacyjny']*$tablica_zlecenia['liczba_model_diag_orient'];
    }
    elseif($tablica_zlecenia[$klucz]=='dodatkowy wzornik'){
      $p_pom=$p_pom+$tablica_punktow['dodatkowy wzornik']*$tablica_zlecenia['liczba_dodatkowy_wzornik'];
    }
    elseif($tablica_zlecenia[$klucz]=='wax-up'){
      $p_pom=$p_pom+$tablica_punktow['wax-up']*$tablica_zlecenia['liczba_wax_up'];
    }
    elseif($tablica_zlecenia[$klucz]=='model dzielony dodatkowy'){
      $p_pom=$p_pom+$tablica_punktow['model dzielony dodatkowy']*$tablica_zlecenia['liczba_model_dzielony_dodatkowy'];
    }
    elseif($tablica_zlecenia[$klucz]=='�y�ka indywidualna'){
      $p_pom=$p_pom+$tablica_punktow['�y�ka indywidualna']*$tablica_zlecenia['liczba_lyzka_indywidualna'];
    }

  //echo $p_pom.'-p_pom<br>';
  }
      //$p_pom=$p_pom*$this->ilosc_zebow($tablica_zlecenia);

  return $p_pom;
}


}
?>

<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

require_once('./inc/common.php');	
	
//------------------------------------------------------------------------------------------------------------------
//funkacja wykonujaca zapytanie SQL i przepisujaca tablice wynikow do tablicy ktora zostaje przeslana do szablonu
function pobierz_dane1 ($sql,$row_number) {

   $sql_result=myquery($sql);

   $f=array();
   $spr=0;
   while ($row = mysql_fetch_row($sql_result)) {
      if($row_number==$spr){
        $f[] = $row;
      }
      else {}
        $spr++;
   }
  return $f;
}
//------------------------------------------------------------------------------------------------------------------

  $t_opis=array('Nr Zlecenia'=>'60','ID Zlecenia'=>'200','Data Wpisania'=>'100','Zwrot Data'=>'80','Zwrot Godz'=>'50', 'Pacjent'=>'100','Tabela'=>'150','Technik'=>'100','Etap'=>'30');
  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Data Wpisania'=>'130','Zwrot Zlecenia'=>'130', 'Pacjent'=>'100','ID Zewn�trzne'=>'100','Tabela'=>'150','Pracownik'=>'130','Waga Z�ota'=>'100','UWAGI'=>'130','Wpis'=>'50');

if($_REQUEST['wpis']=='new' && !isset($_REQUEST['form_wyswietl_zlecenie']) ){
	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM zlecenieinfo WHERE wpis='new' ORDER BY zwrotzleceniadata ASC";
	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('edycja', 'edycja');

  $smarty->assign('ID', 'wtrakcie');

  $smarty->assign('plik', 'tabela_wynik_zapytania_sql.tpl');
}
elseif($_REQUEST['wpis']=='out' && !isset($_REQUEST['form_wyswietl_zlecenie']) ){
	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM zlecenieinfo WHERE wpis='out' ORDER BY zwrotzleceniadata ASC";
	  //$sql="SELECT * FROM zlecenieinfo as z,rozlicz_zleceniodawca as rz,rozlicz_technicy as rt WHERE z.wpis='out'
          //ORDER BY z.zwrotzleceniadata ASC";
          //AND ( rz.roz_lek LIKE 'nie%' OR rt.roz_tech LIKE 'nie%' OR rz.roz_lek=NULL OR rt.roz_tech='NULL' ) AND
          //rz.datawpisania=z.datawpisania and rz.idzlecenianr=z.idzlecenianr
          //and rz.idzleceniapoz=z.idzleceniapoz and rz.kategoria=z.kategoria
	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('edycja', 'edycja');

  $smarty->assign('ID', 'wyslane');

  $smarty->assign('plik', 'tabela_wynik_zapytania_sql.tpl');
}

elseif($_REQUEST['data']=='dzis'){
  $D=date('j');

  if($D<10){
     $D='0'.$D;
  }

  $M=date('m');

  for ($i=1;$i<=12;$i++){
    if($M==$i){
       $M=$i;
    }
  }
  if($M<10){
     $M='0'.$M;
  }

  $Y=date('Y');
  $datazwrotu=$Y.'-'.$M.'-'.$D;
  //echo $datazwrotu.'<br>';

	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM zlecenieinfo WHERE zwrotzleceniadata LIKE '".$datazwrotu."%' ORDER BY idzleceniapoz,zwrotzleceniadata ASC";
	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('edycja', 'edycja');

  $smarty->assign('drukuj', 'dzis');

  $smarty->assign('ID', 'dzisiaj');

  $smarty->assign('plik', 'tabela_wynik_zapytania_sql.tpl');
}

elseif($_REQUEST['wpis']=='szukaj'){

	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ORDER BY pracownikid";
	  $wy=myquery($sql);
          //zrobic z tego normalna tablice
          $technicy[]=''; //jezeli technik nie jest ustawiony lub ma byc to opcja pusta
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }
          $smarty->assign('technicy', $technicy);

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

  //$smarty->assign('ifrm', 'tak');
  //$smarty->assign('plik', './biuro/szukaj_zlecen.php');
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'szukaj_zlecen.tpl');

  $smarty->assign('ID', 'wyszukaj');

}
elseif($_REQUEST['edycja']=='edycja'){
 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');

function win2iso($str) {
  return iconv("Windows-1250", "ISO-8859-2", $str);
}

 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $nr_zlec = czysc_zmienne_formularza($_REQUEST['nr_zlec']);
 $id_zlec = czysc_zmienne_formularza($_REQUEST['id_zlec']);
// $id_zlec = win2iso($id_zlec);
 
// $data = czysc_zmienne_formularza($_REQUEST['data']);
// $tabela = czysc_zmienne_formularza($_REQUEST['tabela']);
	  $smarty->assign('nr_zlec', $nr_zlec);
	  $smarty->assign('id_zlec', $id_zlec);
//	  $smarty->assign('data', $data);
//	  $smarty->assign('tabela', $tabela);

	  //wyszukiwanie zlecen dopisanych
//	  $sql="SELECT * FROM ".$tabela." WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND datawpisania='".$data."' ";
//	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
//	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ";
	  $wy=myquery($sql);
          //zrobic z tego normalna tablice
          $technicy[]=''; //jezeli technik nie jest ustawiony lub nie ma byc to opcja pusta
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }

          $wpis_tab=array('new','out','roz','zap','del');
	  $smarty->assign('wpis_tab', $wpis_tab);


          $zlecenie_tab=array('zlecenie','reklamacja','naprawa gwarancyjna');
	  $smarty->assign('zlecenie_tab', $zlecenie_tab);

	  $sql="SELECT * FROM zlecenieinfo WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ORDER BY datawpisania DESC"; //GROUP BY datawpisania ORDER BY datawpisania ASC";
	  $wyn=myquery($sql);
//echo $sql.'<br>';
       $k=0;
       $tablica_wynikow=array();
       while($arr = mysql_fetch_assoc($wyn) ){
	
      //echo 'KATEGORIA:'.$arr['kategoria'].'<br>';
	  //wyszukiwanie zlecen dopisanych
	  //!!!!!!!!! zrobic wyswietlanie wszystkich zlecen
          $sql="SELECT * FROM ".$arr['kategoria']." WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND datawpisania='".$arr['datawpisania']."' ";

          $result = myquery($sql);
          $num_rows = mysql_num_rows($result);
          //echo 'NUMROWS:'.$num_rows.' <br>';
          if($num_rows>1){
              //$t_w=pobierz_dane1($sql,);
              //$elem=sizeof($t_w);
                    
              for($ind=0;$ind<$num_rows;$ind++ ){
                 //$tablica_wynikow[$k]=pobierz_dane1($sql,$ind);
                 //$sql_tab=$sql."AND datawpisania='".$arr['datawpisania']."' ";
                 $tablica_wynikow[$k]=pobierz_dane($sql);

               $data[$k]=$arr['datawpisania'];
	
               $tabela[$k]=$arr['kategoria'];

               $tech[$k]=$arr['pracownikid'];
	
               $wagazlota[$k]=$arr['wagazlota'];

               $pacjent[$k]=$arr['pacjent'];

               $zwrotzleceniadata[$k]=$arr['zwrotzleceniadata'];
               $zwrotzleceniagodz[$k]=$arr['zwrotzleceniagodz'];

               $zlecenie[$k]=$arr['zlecenie'];

               $uwagi[$k]=$arr['uwagi'];
	
               $wpis[$k]=$arr['wpis'];
               $deklaracja[$k]=$arr['deklaracja'];
               
               //$nr_rozliczenia[$k]=$arr['nr_rozliczenia'];
               
               //  echo $tablica_wynikow[$k][0][0]." - $ind<br>$zwrotzleceniadata[$k]<br>";

               if($ind<$num_rows-1){
                 //po to zeby przeskoczyc o jedno przejscie bo powtarza zlecenia
                 $arr = mysql_fetch_assoc($wyn);
               }else {}
	       $k++;
              }
          }
          else {
	       $tablica_wynikow[$k]=pobierz_dane($sql);

               $data[$k]=$arr['datawpisania'];
	
               $tabela[$k]=$arr['kategoria'];

               $tech[$k]=$arr['pracownikid'];
	
               $wagazlota[$k]=$arr['wagazlota'];

               $pacjent[$k]=$arr['pacjent'];

               $zwrotzleceniadata[$k]=$arr['zwrotzleceniadata'];
               $zwrotzleceniagodz[$k]=$arr['zwrotzleceniagodz'];

               $zlecenie[$k]=$arr['zlecenie'];

               $uwagi[$k]=$arr['uwagi'];
	
               $wpis[$k]=$arr['wpis'];
               $deklaracja[$k]=$arr['deklaracja'];
               
               //$nr_rozliczenia[$k]=$arr['nr_rozliczenia'];

	       $k++;
          }
              //for($r=0;$r<sizeof($tablica_wynikow[$k]);$r++ ){
              //   echo $tablica_wynikow[$k][$r][3].', ';
              //}

       }
//              $wyn_tab=array_unique($tablica_wynikow);

	  $smarty->assign('data', $data);
	  $smarty->assign('tabela', $tabela);
          $smarty->assign('technicy', $technicy);
          $smarty->assign('tech', $tech);
          $smarty->assign('wagazlota', $wagazlota);
          $smarty->assign('pacjent', $pacjent);
          $smarty->assign('zwrotzleceniadata', $zwrotzleceniadata);
	  $smarty->assign('zwrotzleceniagodz', $zwrotzleceniagodz);
	  $smarty->assign('uwagi', $uwagi);
          $smarty->assign('zlecenie', $zlecenie);
          $smarty->assign('wpis', $wpis);
          $smarty->assign('deklaracja', $deklaracja);
          //$smarty->assign('nr_rozliczenia', $nr_rozliczenia);

	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('ilosc_wpisow', $k);
  $smarty->assign('sub', 'tak');
  //$smarty->assign('plik', 'zarzadzanie_wyswietl_zlecenie.tpl');
  $nie_pokaz_szkieletu_strony='tak';
  $smarty->display('zarzadzanie_wyswietl_zlecenie.tpl');
}
elseif($_REQUEST['form_wyswietl_zlecenie']=='form1'){

 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $wagazlota_up = czysc_zmienne_formularza($_REQUEST['wagazlota']);
 $pacjent_up = czysc_zmienne_formularza($_REQUEST['pacjent']);
 //$rozliczenie = czysc_zmienne_formularza($_REQUEST['rozliczenie']);
 $zwrotzleceniadata_up = czysc_zmienne_formularza($_REQUEST['zwrotzleceniadata']);
 $zwrotzleceniagodz_up = czysc_zmienne_formularza($_REQUEST['zwrotzleceniagodz']);
 $uwagi_up = czysc_zmienne_formularza($_REQUEST['uwagi']);
 $technicy_up = czysc_zmienne_formularza($_REQUEST['technicy']);
 $wpis_up = czysc_zmienne_formularza($_REQUEST['wpis']);
 $zlecenie_up= czysc_zmienne_formularza($_REQUEST['zlecenie']);
 $nr_zlec_up = czysc_zmienne_formularza($_REQUEST['nr_zlec']);
 $id_zlec_up = czysc_zmienne_formularza($_REQUEST['id_zlec']);
 $data_up = czysc_zmienne_formularza($_REQUEST['data']);
 $tabela_up = czysc_zmienne_formularza($_REQUEST['tabela']);

/*        if($wpis=='roz' || $wpis=='zap'){
	  $sql="SELECT wpis FROM zlecenieinfo WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND datawpisania='".$data."' AND kategoria='".$tabela."' ";
          if($wpis=='roz' || $wpis=='zap'){
	
          }
          else{

          }
        }
*/
         // aktualizuje we wszystkich etapach
         $sql="UPDATE zlecenieinfo SET pacjent='".$pacjent_up."',pracownikid='".$technicy_up."', wpis='".$wpis_up."' WHERE idzlecenianr='".$nr_zlec_up."' AND idzleceniapoz='".$id_zlec_up."' ";
         $wynik=myquery($sql);
         // aktualizuje szczeg�y wybranego etapu
         $sql="UPDATE zlecenieinfo SET wagazlota='".$wagazlota_up."', zwrotzleceniadata='".$zwrotzleceniadata_up."', zwrotzleceniagodz='".$zwrotzleceniagodz_up."', zlecenie='".$zlecenie_up."', uwagi='".$uwagi_up."' WHERE idzlecenianr='".$nr_zlec_up."' AND idzleceniapoz='".$id_zlec_up."' AND datawpisania='".$data_up."' AND kategoria='".$tabela_up."' ";
         $wynik=myquery($sql);

/*
	  //wyszukiwanie zlecen zupdateowanych
	  $sql="SELECT * FROM zlecenieinfo WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND datawpisania='".$data."' AND kategoria='".$tabela."' ";
	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('edycja', 'edycja');

  $smarty->assign('plik', 'tabela_wynik_zapytania_sql.tpl');
*/
//----------------------------------------------NOWE TESTOWE--------------------------------------------

          $nr_zlec = czysc_zmienne_formularza($_REQUEST['nr_zlec']);
          $id_zlec = czysc_zmienne_formularza($_REQUEST['id_zlec']);
	  $smarty->assign('nr_zlec', $nr_zlec);
	  $smarty->assign('id_zlec', $id_zlec);

	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ";
	  $wy=myquery($sql);
          //zrobic z tego normalna tablice
          $technicy[]=''; //jezeli technik nie jest ustawiony lub nie ma byc to opcja pusta
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }

          $wpis_tab=array('new','out','roz','zap','del');
	  $smarty->assign('wpis_tab', $wpis_tab);


          $zlecenie_tab=array('zlecenie','reklamacja','naprawa gwarancyjna');
	  $smarty->assign('zlecenie_tab', $zlecenie_tab);

	  $sql0="SELECT * FROM zlecenieinfo WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ORDER BY datawpisania DESC"; //GROUP BY datawpisania ORDER BY datawpisania ASC";
	  $wyn=myquery($sql0);

       $k=0;
       $tablica_wynikow=array();
//echo 'mysql_num_rows: '.mysql_num_rows($wyn).'<br>';
       while($arr = mysql_fetch_assoc($wyn) ){
	   //   echo $arr['kategoria'].'<br>';
	  //wyszukiwanie zlecen dopisanych
	  //!!!!!!!!! zrobic wyswietlanie wszystkich zlecen
          $sql="SELECT * FROM ".$arr['kategoria']." WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND datawpisania='".$arr['datawpisania']."' ";

          $result = myquery($sql);
          $num_rows = mysql_num_rows($result);
          if($num_rows>1){

              for($ind=0;$ind<$num_rows;$ind++ ){
               //$sql_tab=$sql."AND datawpisania='".$arr['datawpisania']."' ";
               $tablica_wynikow[$k]=pobierz_dane($sql);

               $data[$k]=$arr['datawpisania'];

               $tabela[$k]=$arr['kategoria'];

               $tech[$k]=$arr['pracownikid'];
	
               $wagazlota[$k]=$arr['wagazlota'];

               $pacjent[$k]=$arr['pacjent'];

               $zwrotzleceniadata[$k]=$arr['zwrotzleceniadata'];
               $zwrotzleceniagodz[$k]=$arr['zwrotzleceniagodz'];

               $uwagi[$k]=$arr['uwagi'];

               $zlecenie[$k]=$arr['zlecenie'];
	
               $wpis[$k]=$arr['wpis'];
               $deklaracja[$k]=$arr['deklaracja'];
               
               //$nr_rozliczenia[$k]=$arr['nr_rozliczenia'];

               if($ind<$num_rows-1){
                 //po to zeby przeskoczyc o jedno przejscie bo powtarza zlecenia
                 $arr = mysql_fetch_assoc($wyn);
               }else {}

	       $k++;
              }
          }
          else {
                 //echo "$k;";
	       $tablica_wynikow[$k]=pobierz_dane($sql);

               $data[$k]=$arr['datawpisania'];
	       //echo  'data wpisania '.$arr['datawpisania'].'<br>';
	       
               $tabela[$k]=$arr['kategoria'];

               $tech[$k]=$arr['pracownikid'];
	
               $wagazlota[$k]=$arr['wagazlota'];

               $pacjent[$k]=$arr['pacjent'];
	       //echo  'pacjent '.$pacjent[$k].'<br>';

               $zwrotzleceniadata[$k]=$arr['zwrotzleceniadata'];
               $zwrotzleceniagodz[$k]=$arr['zwrotzleceniagodz'];

               $uwagi[$k]=$arr['uwagi'];
	
               $zlecenie[$k]=$arr['zlecenie'];

               $wpis[$k]=$arr['wpis'];
               $deklaracja[$k]=$arr['deklaracja'];
               
               //$nr_rozliczenia[$k]=$arr['nr_rozliczenia'];

	       $k++;
          }

       }
       
//echo $k.'<br>';
	  $smarty->assign('data', $data);
	  $smarty->assign('tabela', $tabela);
          $smarty->assign('technicy', $technicy);
          $smarty->assign('tech', $tech);
          $smarty->assign('wagazlota', $wagazlota);
          $smarty->assign('pacjent', $pacjent);
          $smarty->assign('zwrotzleceniadata', $zwrotzleceniadata);
	  $smarty->assign('zwrotzleceniagodz', $zwrotzleceniagodz);
	  $smarty->assign('uwagi', $uwagi);
	  $smarty->assign('zlecenie', $zlecenie);
          $smarty->assign('wpis', $wpis);
          $smarty->assign('deklaracja', $deklaracja);
          //$smarty->assign('nr_rozliczenia', $nr_rozliczenia);

	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('ilosc_wpisow', $k);
  $smarty->assign('sub', 'tak');
  $nie_pokaz_szkieletu_strony='tak';
  $smarty->display('zarzadzanie_wyswietl_zlecenie.tpl');


//----------------------------------------------NOWE TESTOWE--------------------------------------------

}
elseif($_POST['szukaj']=='zaawansowane'){
 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $pacjent = czysc_zmienne_formularza($_POST['pacjent']);
 // echo 'pacjent: '.$pacjent.'<br>';
 $zleceniodawca = czysc_zmienne_formularza($_POST['zleceniodawca']);
 // echo 'lekarz: '.$zleceniodawca.'<br>';
 $nrpracy = czysc_zmienne_formularza($_POST['nrpracy']);
 //echo 'nr pracy: '.$nrpracy.'<br>';
 $etap = czysc_zmienne_formularza($_POST['etap']);
 // echo 'wpis: '.$etap.'<br>';
  //$czyData = czysc_zmienne_formularza($_POST['czyData']);
  //echo 'czy data: '.$czyData.'<br>';
 $dataodY = czysc_zmienne_formularza($_POST['dataodY']);
 $dataodM = czysc_zmienne_formularza($_POST['dataodM']);
 $dataodD = czysc_zmienne_formularza($_POST['dataodD']);
 $datadoY = czysc_zmienne_formularza($_POST['datadoY']);
 $datadoM = czysc_zmienne_formularza($_POST['datadoM']);
 $datadoD = czysc_zmienne_formularza($_POST['datadoD']);
 
 $technik = czysc_zmienne_formularza($_POST['technik']);
// echo 'technik: '.$technik.'<br>';
 
 $dataOd=$dataodY.'-'.$dataodM.'-'.$dataodD;
 $dataDo=$datadoY.'-'.$datadoM.'-'.$datadoD;
// echo 'data: '.$dataOd.' do '.$dataDo.'<br>';

	//wyszukiwanie zlecen zupdateowanych
$sql="SELECT * FROM zlecenieinfo 
			 WHERE pacjent LIKE '%".$pacjent."%' AND idzleceniapoz LIKE '%".$zleceniodawca."%' 
			       AND CONCAT(idzlecenianr,idzleceniapoz) LIKE '%".$nrpracy."%' AND pracownikid LIKE '%".$technik."%' 
				   AND wpis LIKE '%".$etap."%' AND zwrotzleceniadata >= '".$dataOd."' and zwrotzleceniadata <= '".$dataDo."' 
		     ORDER BY idzlecenianr, idzleceniapoz ";
echo $sql.'<br>';
	$tablica_wynikow=pobierz_dane($sql);
	//tablice dopisanych wierszy
	$smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);

  $smarty->assign('plik', 'tabela_wynik_zapytania_sql.tpl');
}

  $smarty->assign('log', $_SESSION['idusera'] );
  if($nie_pokaz_szkieletu_strony=='tak'){
    //nie chce wyswietlac menu itp. tylko sama wywolywana strone
    //$nie_pokaz_szkieletu_strony='nie';
  }else {
    $smarty->display('biuro_zlecenia.tpl');
  }

}
else{
  header("Location: index.php");
}
?>

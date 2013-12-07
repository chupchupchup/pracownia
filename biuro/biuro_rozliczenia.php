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

if($_REQUEST['wpis']=='szukaj'){

	  $sql="SELECT pracownikid FROM pracownicy WHERE stanowisko='technik' OR stanowisko='' ORDER BY pracownikid";
	  $wy=myquery($sql);
          //zrobic z tego normalna tablice
          $technicy[]=''; //jezeli technik nie jest ustawiony lub ma byc to opcja pusta
          while( $ar = mysql_fetch_assoc($wy) ) {
            $technicy[]=$ar['pracownikid'];
          }
          $smarty->assign('technicy', $technicy);

          $sql="SELECT idzleceniodawcy FROM zleceniodawca ORDER BY idzleceniodawcy";
	  $wy=myquery($sql);
          $zleceniodawca[]='';
          while( $ar = mysql_fetch_assoc($wy) ) {
            $zleceniodawca[]=$ar['idzleceniodawcy'];
          }
          $smarty->assign('zleceniodawca', $zleceniodawca);
//echo $sql;
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
  $smarty->assign('plik', 'szukaj_rozliczenia.tpl');

  $smarty->assign('ID', 'wyszukaj');
}
elseif($_POST['szukaj']=='zaawansowane'){
 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

 $pacjent = czysc_zmienne_formularza($_POST['pacjent']);
// echo 'pacjent: '.$pacjent.'<br>';
    if($pacjent==''){
      $pacjent_sql = "z.pacjent LIKE '%' ";
    }else{
      $pacjent_sql = "z.pacjent LIKE '%".$pacjent."%' ";
    }

 $zleceniodawca = czysc_zmienne_formularza($_POST['zleceniodawca']);
// echo 'lekarz: '.$zleceniodawca.'<br>';
    if($zleceniodawca==''){
      $zleceniodawca_sql = "z.idzleceniapoz LIKE '%' ";
    }else{
      $zleceniodawca_sql = "TRIM(LEADING '/' FROM SUBSTRING_INDEX(z.idzleceniapoz,'/',2)) = '".$zleceniodawca."' ";//!!!!!!!!!!!!!WA�NE!!!!!!!
	}
/*
 $idzewnetrzne = czysc_zmienne_formularza($_POST['idzewnetrzne']);
// echo 'idzewnetrzne: '.$idzewnetrzne.'<br>';
    if($idzewnetrzne==''){
      $idzewnetrzne_sql = '';
    }else{
      $idzewnetrzne_sql = "AND pacjent LIKE '".$idzewnetrzne."' ";
    }
*/
 $etap = czysc_zmienne_formularza($_POST['etap']);
// echo 'wpis: '.$etap.'<br>';
    if($etap==''){
      $etap_sql = "z.wpis LIKE '%' ";
    }else{
      $etap_sql = "z.wpis = '".$etap."' ";
    }

 $technik = czysc_zmienne_formularza($_POST['technik']);
// echo 'technik: '.$technik.'<br>';
    if($technik==''){
      $technik_sql = "rt.technik LIKE '%' ";
    }else{
      $technik_sql = "rt.technik = '".$technik."' ";
    }

  //$czyData = czysc_zmienne_formularza($_POST['czyData']);
  //echo 'czy data: '.$czyData.'<br>';
 $dataodY = czysc_zmienne_formularza($_POST['dataodY']);
 $dataodM = czysc_zmienne_formularza($_POST['dataodM']);
 $dataodD = czysc_zmienne_formularza($_POST['dataodD']);
 $datadoY = czysc_zmienne_formularza($_POST['datadoY']);
 $datadoM = czysc_zmienne_formularza($_POST['datadoM']);
 $datadoD = czysc_zmienne_formularza($_POST['datadoD']);

 $dataOd=$dataodY.'-'.$dataodM.'-'.$dataodD;
 $dataDo=$datadoY.'-'.$datadoM.'-'.$datadoD;
 //echo 'data: '.$dataOd.' do '.$dataDo.'<br>';

	//WYSZUKAMY JEZELI ROZLICZONY JEST LEKARZ I TECHNIK - INACZEJ NIE POROWNAMY KWOT ZAPLALCONYCH ZA ZLECENIE Z PUNKTAMI ITP. DLA TECHNIKOW
	//wyszukiwanie zlecen zupdateowanych
	//$sql="SELECT * FROM zlecenieinfo WHERE pacjent LIKE '%$pacjent%' AND idzleceniapoz LIKE '%$zleceniodawca%' AND idzewnetrzne LIKE '%$idzewnetrzne%' AND pracownikid LIKE '%$technik%' AND wpis LIKE '%$etap%' AND zwrotzleceniadata >= '$dataOd' and zwrotzleceniadata <= '$dataDo' order by idzlecenianr, idzleceniapoz ";
 $sql="SELECT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty,rz.kwota,
              rz.zaplacono,rz.opiszlecenia  
			  FROM zlecenieinfo z, rozlicz_technicy rt, rozlicz_zleceniodawca rz
              WHERE ".$technik_sql."
              AND ".$etap_sql." 
              AND ".$zleceniodawca_sql." 
              AND ".$pacjent_sql." 
              AND z.zwrotzleceniadata >= '".$dataOd."' AND z.zwrotzleceniadata <= '".$dataDo."'
              AND rt.roz_tech='tak'
              AND rt.idzlecenianr=rz.idzlecenianr AND rz.idzlecenianr=z.idzlecenianr
              AND rt.idzleceniapoz=rz.idzleceniapoz AND rz.idzleceniapoz=z.idzleceniapoz
              GROUP BY CONCAT( rt.idzlecenianr, rt.idzleceniapoz ) 
              ORDER BY SUBSTRING(rt.idzleceniapoz, -4), rt.idzlecenianr ";
 //echo $sql.'<br><br>';
/*
 $sql_sum="SELECT sum(rt.punkty) as sum_p,sum(rz.kwota) as sum_k, sum(rz.zaplacono) as sum_z    
			  FROM zlecenieinfo z, rozlicz_technicy rt, rozlicz_zleceniodawca rz
              WHERE ".$technik_sql."
              AND ".$etap_sql." 
              AND ".$zleceniodawca_sql." 
              AND ".$pacjent_sql." 
              AND z.zwrotzleceniadata >= '".$dataOd."' AND z.zwrotzleceniadata <= '".$dataDo."'
              AND rt.roz_tech='tak'
              AND rt.idzlecenianr=rz.idzlecenianr AND rz.idzlecenianr=z.idzlecenianr
              AND rt.idzleceniapoz=rz.idzleceniapoz AND rz.idzleceniapoz=z.idzleceniapoz
              GROUP BY CONCAT( rt.idzlecenianr, rt.idzleceniapoz ) 
               ";
 echo $sql_sum.'<br>';
	  $wy_sum=myquery($sql_sum);
      $ar_sum = mysql_fetch_assoc($wy_sum);
      $smarty->assign('sum_punkty', $ar_sum['sum_p']);
      $smarty->assign('sum_kwota', $ar_sum['sum_k']);
      $smarty->assign('sum_zaplacono', $ar_sum['sum_z']);
*/

/*
select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty,rz.kwota,
rz.zaplacono,rz.opiszlecenia FROM zlecenieinfo z, rozlicz_technicy rt,
rozlicz_zleceniodawca rz
where rt.technik='CHOJNACKA-GIBUS.MARTA'
and rt.idzlecenianr=rz.idzlecenianr and rz.idzlecenianr=z.idzlecenianr
and rt.idzleceniapoz=rz.idzleceniapoz and rz.idzleceniapoz=z.idzleceniapoz
and z.zwrotzleceniadata >= '2009-01-01' and z.zwrotzleceniadata <= '2009-01-31'
and ( z.wpis='roz' OR z.wpis='zap')  and rt.roz_tech='tak' and rz.roz_lek='tak'
ORDER BY rt.idzleceniapoz,rt.idzlecenianr LIMIT 20;
*/


  $tablica_wynikow=pobierz_dane($sql);
  //tablice dopisanych wierszy
  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Technik'=>'160','Punkty'=>'60','Wycena'=>'100','Zap�acone'=>'60','INFO'=>'100');
  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);

  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_szukaj.tpl');
}
elseif($_POST['szukaj']=='zaawansowane_korony_licowane'){
 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

 $zleceniodawca = czysc_zmienne_formularza($_POST['zleceniodawca']);
// echo 'lekarz: '.$zleceniodawca.'<br>';

 $dataodY = czysc_zmienne_formularza($_POST['dataodY']);
 $dataodM = czysc_zmienne_formularza($_POST['dataodM']);
 $dataodD = czysc_zmienne_formularza($_POST['dataodD']);
 $datadoY = czysc_zmienne_formularza($_POST['datadoY']);
 $datadoM = czysc_zmienne_formularza($_POST['datadoM']);
 $datadoD = czysc_zmienne_formularza($_POST['datadoD']);

 $dataOd=$dataodY.'-'.$dataodM.'-'.$dataodD;
 $dataDo=$datadoY.'-'.$datadoM.'-'.$datadoD;
 //echo 'data: '.$dataOd.' do '.$dataDo.'<br>';


 $sql="SELECT TRIM(LEADING '/' FROM SUBSTRING_INDEX(idzleceniapoz,'/',2)) as kontrahent, sum(liczba_gotowa) as 'suma koron'
  FROM porcelana_korona_licowana_na_metalu 
  WHERE material='porcelana' AND TRIM(LEADING '/' FROM SUBSTRING_INDEX(idzleceniapoz,'/',2)) LIKE '%".$zleceniodawca."' 
  AND DATE(datawpisania) BETWEEN '".$dataOd."' AND '".$dataDo."'
  GROUP BY TRIM(LEADING '/' FROM SUBSTRING_INDEX(idzleceniapoz,'/',2)) ORDER BY `kontrahent`  ASC";
  //echo $sql.'<br>';

  //tablice dopisanych wierszy
  $tablica_wynikow=pobierz_dane($sql);
  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('dataOd', $dataOd);
  $smarty->assign('dataDo', $dataDo);

  $t_opis=array('Zleceniodawca'=>'200','Ilosc koron'=>'100');
  $smarty->assign('sub', 'tak');
  $smarty->assign('tablica_opisy', $t_opis);

  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_szukaj_korony_licowane.tpl');
}
elseif($_REQUEST['kto']=='technik'){

         $technik=$_REQUEST['technik'];

	 //
        $sql="Select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty,rz.kwota FROM zlecenieinfo as z, rozlicz_technicy as rt 
              LEFT JOIN rozlicz_zleceniodawca as rz ON (rz.idzlecenianr=rt.idzlecenianr AND rz.idzleceniapoz=rt.idzleceniapoz) 
              Where rt.roz_tech='tak' AND rt.idzlecenianr=z.idzlecenianr AND rt.idzleceniapoz=z.idzleceniapoz AND rt.datarozliczenia='0000-00-00' 
			  AND ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ORDER BY SUBSTRING(rt.idzleceniapoz, -4), rt.idzlecenianr ";


/*
         $sql="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty FROM zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='0000-00-00'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ORDER BY SUBSTRING(rt.idzleceniapoz, -4), rt.idzlecenianr ";
*/
//echo $sql.'<br>';

	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

	 //sumowanie punktow technika
/*         $sql1="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty from zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='0000-00-00'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ";
          $suma_punktow=0;
	  $wyn=myquery($sql1);
          while( $arr = mysql_fetch_assoc($wyn) ) {
            $suma_punktow=$suma_punktow+$arr['punkty'];
          }
	    $smarty->assign('suma_punktow', $suma_punktow);
*/
	 //sumowanie punktow i wyceny prac technika
        $sql1="Select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,sum(rt.punkty) as sum_punkty,sum(rz.kwota) as sum_wycena FROM zlecenieinfo as z, rozlicz_technicy as rt 
              LEFT JOIN rozlicz_zleceniodawca as rz ON (rz.idzlecenianr=rt.idzlecenianr AND rz.idzleceniapoz=rt.idzleceniapoz) 
              Where rt.roz_tech='tak' AND rt.idzlecenianr=z.idzlecenianr AND rt.idzleceniapoz=z.idzleceniapoz AND rt.datarozliczenia='0000-00-00' 
			  AND ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ORDER BY SUBSTRING(rt.idzleceniapoz, -4), rt.idzlecenianr ";
	    $wyn1=myquery($sql1);
        $arr1 = mysql_fetch_assoc($wyn1);
        $suma_wyceny=$arr1['sum_wycena'];
	    $smarty->assign('suma_wyceny', $suma_wyceny);
        $suma_punktow=$arr1['sum_punkty'];
	    $smarty->assign('suma_punktow', $suma_punktow);


  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Data Wpisania'=>'130','Zwrot Data'=>'100','Zwrot Godz'=>'100', 'Pacjent'=>'100','Tabela'=>'150','Technik'=>'100');
  $t_opis=array('<input type="checkbox" name="checkall" onclick="checkedAll();">'=>'20','Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Technik'=>'160','Punkty'=>'60','Wycena'=>'60','Czy Rozlicza�'=>'100');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('technik', $technik);
  
  $D=date('j');
  if($D<10){
     $D='0'.$D;
  }
  $M=date('m');
  $Y=date('Y');
  $akt_data=$Y.'-'.$M.'-'.$D;

  $sql2="select datarozliczenia from archiwum_rozliczen where idrozliczanego='".$technik."' order by datarozliczenia DESC";
	  $datarozliczenia[]=$akt_data;
	  $wy=myquery($sql2);
          while( $ar = mysql_fetch_assoc($wy) ) {
		    if($ar['datarozliczenia']==$akt_data){}
			else{
              $datarozliczenia[]=$ar['datarozliczenia'];
			}
          }
          $smarty->assign('datarozliczenia_tab', $datarozliczenia);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_tech.tpl');

  $smarty->assign('ID', 'roztech');
}
elseif($_REQUEST['rozlicz']=='tech'){

  $D=date('j');
  if($D<10){
     $D='0'.$D;
  }

  $M=date('m');
//  if($M<10){
//     $M='0'.$M;
//  }

  $Y=date('Y');
  $datarozliczenia=$Y.'-'.$M.'-'.$D;

  $technik=$_REQUEST['technik'];
  $liczba_el_roz=$_REQUEST['liczba_el_roz'];

    //$tab_el_fv=array();
    $suma_punkt�w=0;
    for ($i=0;$i<$liczba_el_roz;$i+=1){
      if( isset($_POST['nr_'.$i]) ){

$sql="UPDATE rozlicz_technicy SET datarozliczenia='".$datarozliczenia."' WHERE technik='".$technik."' AND roz_tech='tak' AND datarozliczenia='0000-00-00'
      AND idzlecenianr='".$_POST['nr_'.$i]."' AND idzleceniapoz='".$_POST['zlec_poz_'.$i]."' AND exists (SELECT null FROM zlecenieinfo 
	  WHERE rozlicz_technicy.technik='".$technik."' AND rozlicz_technicy.idzlecenianr=zlecenieinfo.idzlecenianr
      AND rozlicz_technicy.idzleceniapoz=zlecenieinfo.idzleceniapoz AND (zlecenieinfo.wpis='roz' OR zlecenieinfo.wpis='zap') )
     ";
         $sql_result=myquery($sql);
         //echo  'rozlicz=tech<br>';
      }
    }

	 //rozliczenie zlecen - zapis
         $sql="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty from zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ";

	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

//kod dopisania do tabeli archiwum rozliczen info o rozliczeniu
           $s="SELECT * FROM archiwum_rozliczen WHERE idrozliczanego='".$technik."' AND datarozliczenia='".$datarozliczenia."' ";
           $r=myquery($s);
        if( sizeof($tablica_wynikow) > 0 && mysql_num_rows($r) == 0 ){
          $sq="INSERT INTO archiwum_rozliczen (idrozliczanego,datarozliczenia) VALUES  ('".$technik."', '".$datarozliczenia."') ";
          myquery($sq);
        }else{
           if(mysql_num_rows($r) > 0){
             //echo 'juz dopisane <br>';
           }
           elseif(sizeof($tablica_wynikow) == 0){
             //echo 'nie ma czego dodawa� <br>';
           }
        }

	 //sumowanie punktow technika
         $sql1="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty from zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ";
          $suma_punktow=0;
	  $wyn=myquery($sql1);
          while( $arr = mysql_fetch_assoc($wyn) ) {
            $suma_punktow=$suma_punktow+$arr['punkty'];
          }
	    $smarty->assign('suma_punktow', $suma_punktow);

  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Data Wpisania'=>'130','Zwrot Data'=>'100','Zwrot Godz'=>'100', 'Pacjent'=>'100','Tabela'=>'150','Technik'=>'100');
  $t_opis=array('Roz.'=>'20','Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Technik'=>'160','Punkty'=>'100','Czy Rozlicza�'=>'100');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('technik', $technik);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_arch_tech.tpl');

//  $smarty->assign('ID', 'roztech');
}
elseif($_REQUEST['archiwum']=='technik'){

         $technik=$_REQUEST['technik'];

	 //
         $sql="select datarozliczenia from archiwum_rozliczen where idrozliczanego='".$technik."' order by datarozliczenia DESC";

	  $tablica_wynikow=pobierz_dane($sql);
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $t_opis=array('DATA ROZLICZENIA'=>'200');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('technik', $technik);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'arch_tech.tpl');

  $smarty->assign('ID', 'archiwum');
}
elseif($_REQUEST['archiwum']=='technik_pokaz'){

         $technik=$_REQUEST['technik'];
         $datarozliczenia=$_REQUEST['datarozliczenia'];

	 /*
     $sql="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty from zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ORDER BY rt.idzleceniapoz, rt.idzlecenianr";
*/
     $sql="Select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty,rz.kwota FROM zlecenieinfo as z, rozlicz_technicy as rt 
              LEFT JOIN rozlicz_zleceniodawca as rz ON (rz.idzlecenianr=rt.idzlecenianr AND rz.idzleceniapoz=rt.idzleceniapoz) 
              Where rt.roz_tech='tak' AND rt.idzlecenianr=z.idzlecenianr AND rt.idzleceniapoz=z.idzleceniapoz AND rt.datarozliczenia='".$datarozliczenia."' 
			  AND ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ORDER BY SUBSTRING(rt.idzleceniapoz, -4), rt.idzlecenianr ";

        
 

	  $tablica_wynikow=pobierz_dane($sql);
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

	 //sumowanie punktow technika
         $sql1="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty from zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ";
          $suma_punktow=0;
	  $wyn=myquery($sql1);
          while( $arr = mysql_fetch_assoc($wyn) ) {
            $suma_punktow=$suma_punktow+$arr['punkty'];
          }
	    $smarty->assign('suma_punktow', $suma_punktow);

  $t_opis=array('Roz.'=>'20','Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Technik'=>'160','Punkty'=>'100','Wycena'=>'100','Czy Rozlicza�'=>'100');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('technik', $technik);
  $smarty->assign('datarozliczenia', $datarozliczenia);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_arch_tech.tpl');

  $smarty->assign('ID', 'archiwum');
}
elseif($_REQUEST['rozlicz']=='tech_anuluj'){

  $datarozliczenia=$_REQUEST['datarozliczenia'];
  $technik=$_REQUEST['technik'];
  $liczba_el_roz=$_REQUEST['liczba_el_roz'];

    $suma_punkt�w=0;
    for ($i=0;$i<$liczba_el_roz;$i+=1){
      if( isset($_POST['nr_'.$i]) ){

$sql="UPDATE rozlicz_technicy SET datarozliczenia='0000-00-00' WHERE technik='".$technik."' AND roz_tech='tak' AND datarozliczenia='".$datarozliczenia."'
      AND idzlecenianr='".$_POST['nr_'.$i]."' AND idzleceniapoz='".$_POST['zlec_poz_'.$i]."' AND exists (SELECT null FROM zlecenieinfo 
	  WHERE rozlicz_technicy.technik='".$technik."' AND rozlicz_technicy.idzlecenianr=zlecenieinfo.idzlecenianr
      AND rozlicz_technicy.idzleceniapoz=zlecenieinfo.idzleceniapoz AND (zlecenieinfo.wpis='roz' OR zlecenieinfo.wpis='zap') )
     ";
         $sql_result=myquery($sql);
         //echo  'rozlicz=tech<br>';
      }
    }

	 //rozliczenie zlecen - zapis
         $sql="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty from zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ";

	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

//kod dopisania do tabeli archiwum rozliczen info o rozliczeniu
           $s="SELECT * FROM archiwum_rozliczen WHERE idrozliczanego='".$technik."' AND datarozliczenia='".$datarozliczenia."' ";
           $r=myquery($s);
        if( mysql_num_rows($r) > 0 ){
		  $r1=myquery($sql);
		  if( mysql_num_rows($r1) == 0 ){
            $sq="DELETE FROM archiwum_rozliczen WHERE idrozliczanego='".$technik."' AND datarozliczenia='".$datarozliczenia."' ";
            myquery($sq);
		  }
		  else{}
        }else{
             echo 'nie bylo takiego rozliczenia w archiwum <br>';
        }

	 //sumowanie punktow technika
         $sql1="select DISTINCT rt.idzlecenianr,rt.idzleceniapoz,rt.technik,rt.punkty from zlecenieinfo as z, rozlicz_technicy as rt
         where rt.roz_tech='tak' and rt.idzlecenianr=z.idzlecenianr
         and rt.idzleceniapoz=z.idzleceniapoz and rt.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rt.technik='".$technik."' ";
          $suma_punktow=0;
	  $wyn=myquery($sql1);
          while( $arr = mysql_fetch_assoc($wyn) ) {
            $suma_punktow=$suma_punktow+$arr['punkty'];
          }
	    $smarty->assign('suma_punktow', $suma_punktow);

  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Data Wpisania'=>'130','Zwrot Data'=>'100','Zwrot Godz'=>'100', 'Pacjent'=>'100','Tabela'=>'150','Technik'=>'100');
  $t_opis=array('Roz.'=>'20','Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Technik'=>'160','Punkty'=>'100','Czy Rozlicza�'=>'100');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('technik', $technik);

  $smarty->assign('ID', 'archiwum');

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_arch_tech.tpl');
}
elseif($_REQUEST['kto']=='zleceniodawca'){

         $lekarz=$_REQUEST['zleceniodawca'];

	 //																	rz.zaplacono,rz.datazaplaty,
         $sql="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.wzk,rz.opiszlecenia from zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr
         and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='0000-00-00'
         and ( z.wpis='roz' OR z.wpis='zap') and rz.idzleceniapoz LIKE '/".$lekarz."/%' AND rz.fv_nr='0'
         ORDER BY rz.idzleceniapoz, rz.idzlecenianr";
		 //echo $sql.'<br>';

	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

         $sql1="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.zaplacono,rz.wzk from zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr
         and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='0000-00-00'
         and ( z.wpis='roz' OR z.wpis='zap') and rz.idzleceniapoz LIKE '/".$lekarz."/%' AND rz.fv_nr='0' ";
          $suma_zl=0;
          $suma_zaplacone=0;
	  $wyn=myquery($sql1);
	  //$zwrotdata='0000-00-00';
          while( $arr = mysql_fetch_assoc($wyn) ) {
            $suma_zl=$suma_zl+$arr['kwota'];
            $suma_zaplacone=$suma_zaplacone+$arr['zaplacono'];
            //if($arr['zwrotzleceniadata']>$zwrotdata){
            //  $zwrotdata=$arr['zwrotzleceniadata'];
            //}
            
          }
	    //$smarty->assign('pacjent', $arr['pacjent'] ); echo 'pacjent '.$arr['pacjent'].'<br>';
	    //$smarty->assign('zwrotdata', $zwrotdata );echo 'data zwrotu '.$zwrotdata.'<br>';
	    $smarty->assign('suma_zl', $suma_zl);
	    $smarty->assign('suma_zaplacone', $suma_zaplacone);

  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Data Wpisania'=>'130','Zwrot Data'=>'100','Zwrot Godz'=>'100', 'Pacjent'=>'100','Tabela'=>'150','Technik'=>'100');
  $t_opis=array('FV'=>'30','Nr Zlecenia'=>'60','ID Zlecenia'=>'200','Rozliczenie'=>'80','WZK'=>'100','Opis Zlecenia'=>'100','Czy Rozlicza�'=>'60');
  $smarty->assign('tablica_opisy', $t_opis);                                       // ,'Zaplacono'=>'80','Data Zap�aty'=>'100' 
  $smarty->assign('lekarz', $lekarz);

  $smarty->assign('datarozliczenia', '0000-00-00');
  $smarty->assign('drukuj', 'rozlek');
  
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_lek.tpl');

  $smarty->assign('ID', 'rozlek');
}
elseif($_REQUEST['rozlicz']=='lek'){

//echo 'test';

  $D=date('j');
  if($D<10){
     $D='0'.$D;
  }

  $M=date('m');
//  if($M<10){
//     $M='0'.$M;
//  }

  $Y=date('Y');
  $datarozliczenia=$Y.'-'.$M.'-'.$D;

  $lekarz=$_REQUEST['lekarz'];
  $_SESSION['kontrahent']=$lekarz;
  //echo $_SESSION['kontrahent'].'<br>';
  $liczba_el_fv=$_POST['liczba_el_fv'];
  $smarty->assign('liczba_el_fv', $liczba_el_fv);
  $_SESSION['liczba_el_fv']=$liczba_el_fv;

      //pobieram dane kontrahenta potrzebne do wystawienia faktury
      $sql1="SELECT nazwa, adres, nip FROM zleceniodawca WHERE idzleceniodawcy='".$lekarz."' ";
      //echo $sql1.'<br>';
	  $sql_result1=myquery($sql1);
      $arr1 = mysql_fetch_assoc($sql_result1);

    $tab_el_fv=array();
    $suma_wartosc_netto=0;
    for ($i=0;$i<$liczba_el_fv;$i+=1){
      if( isset($_POST['nr_'.$i]) ){

        //pobranie danych zamowienia do faktury
$sql="SELECT DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.opiszlecenia FROM zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr and rz.idzlecenianr='".$_POST['nr_'.$i]."'
         and rz.idzleceniapoz=z.idzleceniapoz and rz.idzleceniapoz='".$_POST['zlec_poz_'.$i]."'
         and ( z.wpis='roz' OR z.wpis='zap') ORDER BY rz.idzleceniapoz, rz.idzlecenianr";
//        $sql="SELECT concat(ul.producent, ' ', ul.kategoria, ' ', ul.model) as urz, concat(ulm.producent, ' ', ulm.symbol) as mat,zm.ilosc,zm.cena,zm.idusera,zm.id FROM zamowienia_material as zm, urzadzenia_klienta as uk, urzadzenia_lista as ul, urzadzenia_lista_material as ulm
//        WHERE uk.id=zm.id_urzadzenia_klienta AND ul.id=uk.id_urzadzenia AND ulm.id=zm.id_materialu AND zm.id='".$_POST['id_nr_'.$i]."' ORDER BY zm.data_zamowienia ";
        $sql_result=myquery($sql);

        while($arr = mysql_fetch_assoc($sql_result)){
          $wartosc_brutto=$arr['kwota'];
          //$wartosc_netto=$wartosc_brutto/1.22;
          //$wartosc_vat=$wartosc_netto*0.22;                          //   $arr['opiszlecenia']
          $wartosc_netto=$wartosc_brutto; //bo pracownia zwolniona jest z VATu
          $wartosc_vat='0.00';                          //   $arr['opiszlecenia']
          $tab_el_fv[]=array('33.10.17','Prace protetyczne, zlecenie nr '.$arr['idzlecenianr'].$arr['idzleceniapoz'], 1, $wartosc_netto, $wartosc_vat, $wartosc_brutto, $arr['idzlecenianr'], $arr['idzleceniapoz']);//??????????????????????????????????????
          $suma_wartosc_netto=$suma_wartosc_netto+$wartosc_netto; //sumowanie wartosci netto do faktury
        }

      }
    }

    $suma_wartosc_vat='0.00';//$suma_wartosc_netto*0.22;
    $suma_wartosc_brutto=$suma_wartosc_netto;//*1.22;
    $suma=array($suma_wartosc_netto,$suma_wartosc_vat,$suma_wartosc_brutto);
    $smarty->assign('tab_suma', $suma);
    $_SESSION['tab_suma']=$suma;
                                   //,'PKWiU'=>'50'
    $t_opis=array('l.p.'=>'20','Nazwa towaru/us�ugi'=>'150','Ilo��'=>'60', 'jm'=>'50', 'Cena <br />netto'=>'80', 'Stawka <br />VAT %'=>'80','Warto�� <br />netto'=>'80','Warto�� <br />VAT'=>'80','Warto�� <br />brutto'=>'80');
    $smarty->assign('tablica_opisy', $t_opis);

    $smarty->assign('tab_el_fv', $tab_el_fv);
    $_SESSION['tab_el_fv']=$tab_el_fv;

    $smarty->assign('data_sprzedazy', date("Y-m-d"));
    $_SESSION['data_sprzedazy']=date("Y-m-d");

    //pobranie z tabeli faktury - ostatniego nr faktury z aktualnego miesiaca i roku
    $sql222="SELECT  SUBSTRING( fv_nr, 1, LOCATE('/', fv_nr)-1 )  as max_nr_fv FROM faktury WHERE SUBSTRING(fv_nr, -4)='".date(Y)."' AND SUBSTRING(fv_nr, -7,2)='".date(m)."'";
        //echo $sql222.'<br>';
    $sql_result222=myquery($sql222);
	
	$tab_nr_fak=array();
    while($arr222 = mysql_fetch_assoc($sql_result222)){
	  $tab_nr_fak[]=$arr222['max_nr_fv'];
	}
	rsort($tab_nr_fak);
    //echo 'rsort- '.$tab_nr_fak[0].'<br><br>';

/*
    $sql2="SELECT  max(SUBSTRING( fv_nr, 1, LOCATE('/', fv_nr)-1 ))  as max_nr_fv FROM faktury WHERE SUBSTRING(fv_nr, -4)='".date(Y)."' AND SUBSTRING(fv_nr, -7,2)='".date(m)."'";
        echo $sql2.'<br>';
    $sql_result2=myquery($sql2);

    $arr2 = mysql_fetch_assoc($sql_result2);
echo $arr2['max_nr_fv'].'<br>';
*/
/*
    $tab_temp=array();
	while($arr2 = mysql_fetch_assoc($sql_result2)){
         //echo $arr2['max_nr_fv'].'<br>';
		 $tab_temp[]=$arr2['max_nr_fv'];
	}	
	$i=0;sort($tab_temp); 
*/

//     if(max($tab_temp)>0){
	 if($tab_nr_fak[0]>0){
	 //if($arr2['max_nr_fv']>0){
	 
        //$fv_tmp = explode("/", $arr2['max_nr_fv']);
        //$nr_fv=($fv_tmp[0]+1).'/'.$fv_tmp[1].'/'.$fv_tmp[2];
        //$nr_fv=(max($tab_temp)+1).'/'.date(m).'/'.date(Y);
//        $nr_fv=($arr2['max_nr_fv']+1).'/'.date(m).'/'.date(Y);
        $nr_fv=($tab_nr_fak[0]+1).'/'.date(m).'/'.date(Y);
        //echo $nr_fv.'<br>';
      }else{
        $nr_fv='1/'.date(m).'/'.date(Y);
      }
    $smarty->assign('nr_fv', $nr_fv);
	
    $smarty->assign('akt_mies', date(m));
    $smarty->assign('akt_rok', date(Y));
    $_SESSION['nr_fv']=$nr_fv;

    $smarty->assign('kontrahent_nazwa', $arr1['nazwa']);
    $smarty->assign('kontrahent_adres', $arr1['adres']);
    $smarty->assign('kontrahent_nip', $arr1['nip']);

    $smarty->assign('sprzedawca_nazwa', 'Uslugi Protetyczne Jerzy Andryskowski');
    $smarty->assign('sprzedawca_adres', '80-246 Gda�sk, ul.Jaskowa Dolina 9/1');
    $smarty->assign('sprzedawca_nip', 'PL 584-000-01-05');




/*
$sql="UPDATE rozlicz_zleceniodawca SET datarozliczenia='".$datarozliczenia."' WHERE
     idzleceniapoz LIKE '/".$lekarz."/%' AND roz_lek='tak' AND datarozliczenia='0000-00-00'
     AND exists (SELECT NULL FROM zlecenieinfo WHERE rozlicz_zleceniodawca.idzleceniapoz LIKE '/".$lekarz."/%' AND rozlicz_zleceniodawca.idzlecenianr=zlecenieinfo.idzlecenianr
     AND rozlicz_zleceniodawca.idzleceniapoz=zlecenieinfo.idzleceniapoz AND (zlecenieinfo.wpis='roz' OR zlecenieinfo.wpis='zap') )
     ";
         $sql_result=myquery($sql);
         echo  'rozlicz=lek';

//kod dopisania do tabeli archiwum rozliczen info o rozliczeniu

	 //
         $sql="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.zaplacono,rz.wzk from zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr
         and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rz.idzleceniapoz LIKE '/".$lekarz."/%' ORDER BY rz.idzleceniapoz, rz.idzlecenianr";

	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

//kod dopisania do tabeli archiwum rozliczen info o rozliczeniu
           $s="SELECT * FROM archiwum_rozliczen WHERE idrozliczanego='".$lekarz."' AND datarozliczenia='".$datarozliczenia."' ";
           $r=myquery($s);
        if( sizeof($tablica_wynikow) > 0 && mysql_num_rows($r) == 0 ){
          $sq="INSERT INTO archiwum_rozliczen (idrozliczanego,datarozliczenia) VALUES  ('".$lekarz."', '".$datarozliczenia."') ";
          myquery($sq);
        }else{
           if(mysql_num_rows($r) > 0){
             echo 'juz dopisane <br>';
           }
           elseif(sizeof($tablica_wynikow) == 0){
             echo 'nie ma czego dodawa� <br>';
           }
        }

  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Data Wpisania'=>'130','Zwrot Data'=>'100','Zwrot Godz'=>'100', 'Pacjent'=>'100','Tabela'=>'150','Technik'=>'100');
  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Rozliczenie'=>'160','Zaplacono'=>'160','WZK'=>'100','Czy Rozlicza�'=>'100');
  $t_opis=array('Nr Zlecenia'=>'60','ID Zlecenia'=>'200','Rozliczenie'=>'80','Zaplacono'=>'80','WZK'=>'100','Czy Rozlicza�'=>'60');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('lekarz', $lekarz);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_lek.tpl');

  $smarty->assign('ID', 'rozlek');
*/
  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'faktury_wygeneruj.tpl');

  $smarty->assign('ID', 'rozlek');
}
elseif($_REQUEST['archiwum']=='zleceniodawca'){

         $lekarz=$_REQUEST['zleceniodawca'];

	 //
         $sql="select datarozliczenia from archiwum_rozliczen where idrozliczanego='".$lekarz."' order by datarozliczenia DESC";

	  $tablica_wynikow=pobierz_dane($sql);
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

  $t_opis=array('DATA ROZLICZENIA'=>'200');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('lekarz', $lekarz);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'arch_lek.tpl');

  $smarty->assign('ID', 'archiwum');
}
elseif($_REQUEST['archiwum']=='lekarz_pokaz'){

         $lekarz=$_REQUEST['lekarz'];
         $datarozliczenia=$_REQUEST['datarozliczenia'];

	 //
         $sql="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.zaplacono,rz.datazaplaty,rz.wzk,rz.opiszlecenia from zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr
         and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rz.idzleceniapoz LIKE '/".$lekarz."/%' ORDER BY rz.idzleceniapoz, rz.idzlecenianr";

	  $tablica_wynikow=pobierz_dane($sql);
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

         $sql1="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.zaplacono,rz.wzk from zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr
         and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='".$datarozliczenia."'
         and ( z.wpis='roz' OR z.wpis='zap') and rz.idzleceniapoz LIKE '/".$lekarz."/%' ";
          $suma_zl=0;
          $suma_zaplacone=0;
	  $wyn=myquery($sql1);
          while( $arr = mysql_fetch_assoc($wyn) ) {
            $suma_zl=$suma_zl+$arr['kwota'];
            $suma_zaplacone=$suma_zaplacone+$arr['zaplacono'];
          }
	    $smarty->assign('suma_zl', $suma_zl);
	    $smarty->assign('suma_zaplacone', $suma_zaplacone);

  $t_opis=array('Nr Zlecenia'=>'60','ID Zlecenia'=>'200','Rozliczenie'=>'80','Zaplacono'=>'80','Data Zap�aty'=>'100','WZK'=>'100','Opis Zlecenia'=>'100','Czy Rozlicza�'=>'60');

  $smarty->assign('drukuj', 'rozlek');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('lekarz', $lekarz);
  $smarty->assign('datarozliczenia', $datarozliczenia);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_arch_lek.tpl');

  $smarty->assign('ID', 'archiwum');
}
elseif($_REQUEST['rozlicz']=='lek_anuluj'){

  $datarozliczenia=$_REQUEST['datarozliczenia'];
  $lekarz=$_REQUEST['lekarz'];

$sql="UPDATE rozlicz_zleceniodawca SET datarozliczenia='0000-00-00' WHERE idzleceniapoz LIKE '/".$lekarz."/%' AND roz_lek='tak' AND datarozliczenia='".$datarozliczenia."'
      AND exists (SELECT null FROM zlecenieinfo WHERE rozlicz_zleceniodawca.idzleceniapoz LIKE '/".$lekarz."/%' AND rozlicz_zleceniodawca.idzlecenianr=zlecenieinfo.idzlecenianr
      AND rozlicz_zleceniodawca.idzleceniapoz=zlecenieinfo.idzleceniapoz AND (zlecenieinfo.wpis='roz' OR zlecenieinfo.wpis='zap') )
     ";
         $sql_result=myquery($sql);
         echo  'rozlicz=lek<br>';

	 //rozliczenie zlecen - zapis
         $sql="select DISTINCT rz.idzlecenianr,rz.idzleceniapoz,rz.kwota,rz.zaplacono,rz.wzk from zlecenieinfo as z, rozlicz_zleceniodawca as rz
         where rz.roz_lek='tak' and rz.idzlecenianr=z.idzlecenianr
         and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='0000-00-00'
         and ( z.wpis='roz' OR z.wpis='zap') and rz.idzleceniapoz LIKE '/".$lekarz."/%' ORDER BY rz.idzleceniapoz, rz.idzlecenianr";

	  $tablica_wynikow=pobierz_dane($sql);
	  //tablice dopisanych wierszy
	  $smarty->assign('tablica_wynikow', $tablica_wynikow);

//kod dopisania do tabeli archiwum rozliczen info o rozliczeniu
           $s="SELECT * FROM archiwum_rozliczen WHERE idrozliczanego='".$lekarz."' AND datarozliczenia='".$datarozliczenia."' ";
           $r=myquery($s);
        if( mysql_num_rows($r) > 0 ){
          $sq="DELETE FROM archiwum_rozliczen WHERE idrozliczanego='".$lekarz."' AND datarozliczenia='".$datarozliczenia."' ";
          myquery($sq);
        }else{
             echo 'nie bylo takiego rozliczenia w archiwum <br>';
        }

  //$t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Data Wpisania'=>'130','Zwrot Data'=>'100','Zwrot Godz'=>'100', 'Pacjent'=>'100','Tabela'=>'150','Technik'=>'100');
  $t_opis=array('Nr Zlecenia'=>'60','ID Zlecenia'=>'200','Rozliczenie'=>'80','Zaplacono'=>'80','WZK'=>'100','Czy Rozlicza�'=>'60');
  $smarty->assign('tablica_opisy', $t_opis);
  $smarty->assign('lekarz', $lekarz);

  $smarty->assign('sub', 'tak');
  $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_lek.tpl');

  $smarty->assign('ID', 'archiwum');
}
elseif($_REQUEST['kto']=='pozostale'){

  if($_REQUEST['tech_lek']=='technicy'){

      $sql="select distinct z.idzlecenianr,z.idzleceniapoz from zlecenieinfo as z, rozlicz_technicy as rt
      where rt.roz_tech<>'tak' and rt.roz_tech<>'nie_rozliczac' and rt.datarozliczenia='0000-00-00'
      and rt.idzlecenianr=z.idzlecenianr and rt.idzleceniapoz=z.idzleceniapoz and (z.wpis='roz' OR z.wpis='zap') ORDER BY z.idzleceniapoz,z.idzlecenianr";

      $sql1="select distinct z.idzlecenianr,z.idzleceniapoz from zlecenieinfo z left outer join rozlicz_technicy rt
      on (rt.idzlecenianr=z.idzlecenianr and rt.idzleceniapoz=z.idzleceniapoz) where rt.idzleceniapoz is null and
      rt.idzlecenianr is null and (z.wpis='roz' OR z.wpis='zap') ORDER BY z.idzleceniapoz,z.idzlecenianr";

      //$t_opis=array('Data Wpisania'=>'130','Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Technik'=>'160','Punkty'=>'100','Czy Rozlicza�'=>'100');
      $t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200');
      $smarty->assign('tablica_opisy', $t_opis);

      $smarty->assign('sub', 'tak');
      $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_poz.tpl');

      $tablica_wynikow=pobierz_dane($sql);
      $tablica_wynikow1=pobierz_dane($sql1);
      $tablica_wyn=array_merge($tablica_wynikow, $tablica_wynikow1);
      //tablice dopisanych wierszy
      $smarty->assign('tablica_wynikow', $tablica_wyn);

  }
  elseif($_REQUEST['tech_lek']=='lekarze'){
      /*
      $sql="select DISTINCT z.datawpisania,z.idzlecenianr,z.idzleceniapoz from zlecenieinfo as z, rozlicz_zleceniodawca as rz
      where (rz.roz_lek<>'tak' and rz.datawpisania=z.datawpisania and rz.idzlecenianr=z.idzlecenianr
      and rz.idzleceniapoz=z.idzleceniapoz and rz.datarozliczenia='0000-00-00'
      and ( z.wpis='roz' OR z.wpis='zap') ) OR ( z.datawpisania NOT IN ( SELECT datawpisania FROM rozlicz_zleceniodawca) and ( z.wpis='roz' OR z.wpis='zap') )";
      */
      
      $sql="select distinct z.idzlecenianr,z.idzleceniapoz from zlecenieinfo as z, rozlicz_zleceniodawca as rz
      where rz.roz_lek<>'tak' and rz.roz_lek<>'nie_rozliczac' and rz.datarozliczenia='0000-00-00'
      and rz.idzlecenianr=z.idzlecenianr and rz.idzleceniapoz=z.idzleceniapoz and (z.wpis='roz' OR z.wpis='zap') ORDER BY z.idzleceniapoz,z.idzlecenianr";

      $sql1="select distinct z.idzlecenianr,z.idzleceniapoz from zlecenieinfo z left outer join rozlicz_zleceniodawca rz
      on (rz.idzlecenianr=z.idzlecenianr and rz.idzleceniapoz=z.idzleceniapoz) where rz.idzleceniapoz is null and
      rz.idzlecenianr is null and (z.wpis='roz' OR z.wpis='zap') ORDER BY z.idzleceniapoz,z.idzlecenianr";

      //$t_opis=array('Data Wpisania'=>'130','Nr Zlecenia'=>'90','ID Zlecenia'=>'200','Rozliczenie / z�'=>'160','WZK'=>'100','Czy Rozlicza�'=>'100');
      $t_opis=array('Nr Zlecenia'=>'90','ID Zlecenia'=>'200');
      $smarty->assign('tablica_opisy', $t_opis);

      $smarty->assign('sub', 'tak');
      $smarty->assign('plik', 'tabela_wynik_zapytania_rozliczenia_poz.tpl');

      $tablica_wynikow=pobierz_dane($sql);
      $tablica_wynikow1=pobierz_dane($sql1);
      $tablica_wyn=array_merge($tablica_wynikow, $tablica_wynikow1);
      //tablice dopisanych wierszy
      $smarty->assign('tablica_wynikow', $tablica_wyn);
  }

      $smarty->assign('ID', 'pozostale');
}

elseif($_REQUEST['edycja']=='edycja'){
 //plik z funkcjami do czyszczenia zmiennych z niebezpiecznego kodu !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 require_once('./inc/filtr_formularzy.inc.php');
 //czyszczenie zmiennych formularza !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $nr_zlec = czysc_zmienne_formularza($_REQUEST['nr_zlec']);
 $id_zlec = czysc_zmienne_formularza($_REQUEST['id_zlec']);
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

	  $sql="SELECT * FROM zlecenieinfo WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ORDER BY datawpisania DESC";
	  $wyn=myquery($sql);

       $k=0;
       $tablica_wynikow=array();
       while($arr = mysql_fetch_assoc($wyn) ){
	
	  //wyszukiwanie zlecen dopisanych
	  //!!!!!!!!! zrobic wyswietlanie wszystkich zlecen
          $sql="SELECT * FROM ".$arr['kategoria']." WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND datawpisania='".$arr['datawpisania']."' ";

          $result = myquery($sql);
          $num_rows = mysql_num_rows($result);
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
               //echo $zlecenie[$k].' - a<br>';
               
               $uwagi[$k]=$arr['uwagi'];
	
               $wpis[$k]=$arr['wpis'];

               $nr_rozliczenia[$k]=$arr['nr_rozliczenia'];
               
               $deklaracja[$k]=$arr['deklaracja'];

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
               //echo $zlecenie[$k].' - <br>'.$arr['zlecenie'];

               $uwagi[$k]=$arr['uwagi'];
	
               $wpis[$k]=$arr['wpis'];

               $nr_rozliczenia[$k]=$arr['nr_rozliczenia'];
               
               $deklaracja[$k]=$arr['deklaracja'];
               
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
//          $smarty->assign('nr_rozliczenia', $nr_rozliczenia);

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

         $sql="UPDATE zlecenieinfo SET pacjent='".$pacjent_up."', wagazlota='".$wagazlota_up."', zwrotzleceniadata='".$zwrotzleceniadata_up."', zwrotzleceniagodz='".$zwrotzleceniagodz_up."', zlecenie='".$zlecenie_up."', uwagi='".$uwagi_up."', pracownikid='".$technicy_up."', wpis='".$wpis_up."' WHERE idzlecenianr='".$nr_zlec_up."' AND idzleceniapoz='".$id_zlec_up."' AND datawpisania='".$data_up."' AND kategoria='".$tabela_up."' ";
         $wynik=myquery($sql);

/*
//wyszukiwanie zlecen zupdateowanych
$sql="SELECT * FROM zlecenieinfo WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND datawpisania='".$data."' AND kategoria='".$tabela."' ";
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
       while($arr = mysql_fetch_assoc($wyn) ){
	       //echo $arr['kategoria'].'<br>';
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

               $zlecenie[$k]=$arr['zlecenie'];

               $uwagi[$k]=$arr['uwagi'];
	
               $wpis[$k]=$arr['wpis'];

               $nr_rozliczenia[$k]=$arr['nr_rozliczenia'];
               $deklaracja[$k]=$arr['deklaracja'];
               
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

               $zlecenie[$k]=$arr['zlecenie'];

               $uwagi[$k]=$arr['uwagi'];
	
               $wpis[$k]=$arr['wpis'];

               $nr_rozliczenia[$k]=$arr['nr_rozliczenia'];
               $deklaracja[$k]=$arr['deklaracja'];
               
	       $k++;
          }

       	}
       	
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
        $smarty->assign('nr_rozliczenia', $nr_rozliczenia);
        $smarty->assign('deklaracja', $deklaracja);

	  	//tablice dopisanych wierszy
	  	$smarty->assign('tablica_wynikow', $tablica_wynikow);

  $smarty->assign('ilosc_wpisow', $k);
  $smarty->assign('sub', 'tak');
  $nie_pokaz_szkieletu_strony='tak';
  $smarty->display('zarzadzanie_wyswietl_zlecenie.tpl');


//----------------------------------------------KONIEC NOWE TESTOWE--------------------------------------------

}
//$sub=substr($ar,0,10);

  $smarty->assign('log', $_SESSION['idusera'] );
  if($nie_pokaz_szkieletu_strony=='tak'){
    //nie chce wyswietlac menu itp. tylko sama wywolywana strone
    //$nie_pokaz_szkieletu_strony='nie';
  }else {
    $smarty->display('biuro_rozliczenia.tpl');
  }

}
else{
  header("Location: index.php");
}
?>

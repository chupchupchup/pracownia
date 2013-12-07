<?
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){

//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('../inc/db_connect.inc.php');
        $result = mysql_query($query);

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('../inc/db_close.inc.php');
        //echo mysql_numrows($result).'<br>';
        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

if( (isset($_REQUEST['nr_zlec']) && isset($_REQUEST['id_zlec']) && isset($_REQUEST['zwrotzleceniadata'])) ){

 //$data = $_REQUEST['data'];//data wpisania zlecenia
 $nr_zlec = $_REQUEST['nr_zlec'];
 $id_zlec = $_REQUEST['id_zlec'];
 $tabela = $_REQUEST['tabela'];
 $zwrotzlecenia = $_REQUEST['zwrotzleceniadata'];
 $stara_wz = $_REQUEST['stara_wz'];
 //$nr_rozliczenia_old=$_REQUEST['nr_rozliczenia_old'];
 //$nr_rozliczenia=$_REQUEST['nr_rozliczenia'];

 if( isset($_REQUEST['edytuj'])=='tak' ){
      //echo 'update lub dopisanie rozliczenia zlecenia do tabeli rozlicz_zleceniodawca <br />';
      $czyrozlicz = $_REQUEST['czyrozlicz'];
      //echo $czyrozlicz.' - czy rozliczac<br>';
      $kwota = $_REQUEST['kwota'];
      //echo $kwota.' - kaska ;)<br>';
      $wzk = $_REQUEST['wzk'];
      //echo $wzk.' - wzk<br>';
      $opiszlecenia = $_REQUEST['opiszlecenia'];
      //echo $opiszlecenia.' - opiszlecenia<br>';
      $czyjuzzleceniewpisane = $_REQUEST['czyjuzzleceniewpisane'];
      //echo $czyjuzzleceniewpisane.' - liczba okreslajaca czy wpisane zlecenie<br>';
      $lekarz = $_REQUEST['lekarz'];

      //echo $nr_zlec.$id_zlec.'<br>';

      if($czyjuzzleceniewpisane==0){

	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM ".$tabela." WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wynik=myquery($sql);
          $opiszlecenia='';
          while($arr_pom = mysql_fetch_array($wynik)){

            $info=$arr_pom[0];
            $size=(sizeof($arr_pom)/2); //na koncu bylo jeszcze -1
            for($j=5;$j<$size;$j++) {
                if($arr_pom[$j]!="" && $arr_pom[$j]!="0"){
                  $info=$info.'; '.$arr_pom[$j];
                }
                else{
                  $info=$info;
                }
            }
            //echo $info;
            $opiszlecenia=$opiszlecenia.' '.$info;
          }

/*         if( isset($_REQUEST['nr_rozliczenia']) && $_REQUEST['nr_rozliczenia']>0 ){
           $nr_rozliczenia=$_REQUEST['nr_rozliczenia'];
         }else {
           $nr_rozliczenia=1;
         }
*/
         echo 'INSERT';
         $sq="INSERT INTO rozlicz_zleceniodawca (idzlecenianr,idzleceniapoz,zwrotzlecenia,kwota,wzk,opiszlecenia,roz_lek,lekarz) VALUES  ('".$nr_zlec."', '".$id_zlec."', '".$zwrotzlecenia."', '".$kwota."', '".$wzk."', '".$opiszlecenia."', '".$czyrozlicz."', '".$lekarz."') ";
         myquery($sq);

         $sql="UPDATE zlecenieinfo SET wpis='roz' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' AND wpis!='del' ";
         myquery($sql);

         $tablica_id_zlec0 = explode('/', $id_zlec);
         $sqll="UPDATE zleceniodawca SET wz_ost='".$wzk."' WHERE idzleceniodawcy='".$tablica_id_zlec0[1]."' ";
         myquery($sqll);
         
         //$nr_rozliczenia_old=$nr_rozliczenia;
      }
      else {
         echo 'UPDATE_<br>';
         // sprawdzic czy w zleceniodwaca nie jest
         // zapisany juz nr wz
         // zapisac jezeli jest wiekszy w danym roku
         $tablica_id_zlec0 = explode('/', $id_zlec);
         //echo $id_zlec.'<br>';
         $tablica_wz = explode('/', $wzk);
         //echo $wzk.'<br>';
         $tablica_stara_wz = explode('/', $stara_wz);

         if($tablica_wz[1]==$tablica_id_zlec0[1]){// &&$tablica_wz[2]==$tablica_id_zlec0[2]){
           if($tablica_wz[0]>$tablica_stara_wz[0]){
             //echo '1<br>';
             $sq="UPDATE rozlicz_zleceniodawca SET kwota='".$kwota."', wzk='".$wzk."', opiszlecenia='".$opiszlecenia."', roz_lek='".$czyrozlicz."', lekarz='".$lekarz."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
             myquery($sq);

             $sqll="UPDATE zleceniodawca SET wz_ost='".$wzk."' WHERE idzleceniodawcy='".$tablica_id_zlec0[1]."' ";
             myquery($sqll);

           }
           else{
             //echo '2<br>';
             $sq="UPDATE rozlicz_zleceniodawca SET kwota='".$kwota."', opiszlecenia='".$opiszlecenia."', roz_lek='".$czyrozlicz."', lekarz='".$lekarz."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
             myquery($sq);
             echo '<br />nie mo¿na zapisaæ nr WZ-ki ni¿szego ni¿ by³ ostatnio, mo¿e to prowadziæ do zduplikowania numerów WZ-tek';

           }
         }
         elseif($tablica_wz[1]!=$tablica_id_zlec0[1]){
             //echo '3<br>';
             $sq="UPDATE rozlicz_zleceniodawca SET kwota='".$kwota."', wzk='".$wzk."', opiszlecenia='".$opiszlecenia."', roz_lek='".$czyrozlicz."', lekarz='".$lekarz."' WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
             myquery($sq);
         }
         
      }

      echo '<br /><br /><br />';
 }


	  //wyszukiwanie zlecen dopisanych
	  $sql="SELECT * FROM rozlicz_zleceniodawca WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wynik=myquery($sql);
          $arr = mysql_fetch_assoc($wynik);
          $czyjuzzleceniewpisane = mysql_numrows($wynik);

	  $sqlll="SELECT pacjent FROM zlecenieinfo WHERE idzlecenianr='".$nr_zlec."' AND idzleceniapoz='".$id_zlec."' ";
	  $wynikkk=myquery($sqlll);
          $arrr = mysql_fetch_assoc($wynikkk);

          if($arr['wzk']=='' || $_REQUEST['nowe_roz']=='tak'){
            $tablica_id_zlec = explode('/', $id_zlec);
            //echo $tablica_id_zlec[1].' - lekarz<br>';
	    $sqll="SELECT wz_ost FROM zleceniodawca WHERE idzleceniodawcy='".$tablica_id_zlec[1]."' ";
	    $wynikk=myquery($sqll);
            $arrrr = mysql_fetch_assoc($wynikk);

            $tablica_wz_ost = explode('/', $arrrr['wz_ost']);   //echo $arrrr['wz_ost'].'<br>';
            
            if($tablica_wz_ost[2]==date('Y')){
              $pom=($tablica_wz_ost[0]+1);
              $stara_wz=$arrrr['wz_ost'];
            }
            elseif($tablica_wz_ost[2]<date('Y')){
              $pom=1;
              $tablica_wz_ost[2]=date('Y');
              $stara_wz='0/'.$tablica_wz_ost[1].'/'.$tablica_wz_ost[2];
            }

            $wz=$pom.'/'.$tablica_wz_ost[1].'/'.$tablica_wz_ost[2];//nastepny nr wzki
          }
          else{
              $wz=$arr['wzk'];
              //$stara_wz=$wz;
          }

}

?>
<html>
<HEAD>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
 <body bgcolor="#F4FFF0">

  <p><strong><u class="style2">EDYCJA ROZLICZENIA LEKARZA :</u></strong></p>
  <br>

<div>
  <form name="form_rozlicz_lek" method="post" action="edytujrozliczenielek.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="nr_zlec" value="<? echo $nr_zlec;?>" >
   <input type="hidden" name="id_zlec" value="<? echo $id_zlec;?>" >
   <input type="hidden" name="tabela" value="<? echo $tabela;?>" >
   <input type="hidden" name="zwrotzleceniadata" value="<? echo $zwrotzlecenia;?>" >
   <input type="hidden" name="czyjuzzleceniewpisane" value="<? echo $czyjuzzleceniewpisane;?>" >
   <input type="hidden" name="stara_wz" value="<?= $stara_wz;?>" >
   <input type="hidden" name="edytuj" value="tak" >

   <table width="100%" border="0" CELLPADDING="0" CELLSPACING="1" align="left">
     <tr>
       <td>
         <input type="text" name="kwota" value="<?=$arr['kwota']?>" style="float:right;width:180px;">
       </td>
       <td>
         <strong>&nbsp; Z£ - ROZLICZENIE </strong>
       </td>
     </tr>
     <tr><td><br></td></tr>
     <tr>
       <td><input type="text" name="wzk" value="<?=$wz?>" style="float:right;width:300px;" readonly></td>
       <td><strong>&nbsp; - WZ</strong></td>
     </tr>
     <tr><td><br></td></tr>
     <tr>
       <td>
         <select name="czyrozlicz" style="float:right;width:120px;font-size:16px;">
<?        if($arr['roz_lek']=='tak'){
?>         <option selected>tak</option>
           <option>nie</option>
           <option>nie_rozliczac</option>
<?         }
           elseif($arr['roz_lek']=='nie'){
?>         <option>tak</option>
           <option selected>nie</option>
           <option>nie_rozliczac</option>
<?         }
           elseif($arr['roz_lek']=='nie_rozliczac'){
?>         <option>tak</option>
           <option>nie</option>
           <option selected>nie_rozliczac</option>
<?         }
           else{
?>         <option>tak</option>
           <option>nie</option>
           <option>nie_rozliczac</option>
<?         }
?>       </select>
       </td>
       <td><strong>&nbsp; - CZY ROZLICZAÆ ZLECENIE</strong></td>
     </tr>
     <tr><td><br></td></tr>
    <tr>
     <td><textarea name="opiszlecenia" style="float:right;width:250px;" cols="30" rows="8"><?=$arr['opiszlecenia'];?></textarea></td>
     <td><strong>&nbsp; - INFORMACJA O ZLECENIU NA<br /> &nbsp;&nbsp;&nbsp;&nbsp;WZ-tce</strong></td>
    </tr>
     <tr><td><br /></td></tr>
     <tr>
       <td>
         <input type="text" name="lekarz" value="<?=$arr['lekarz']?>" style="float:right;width:180px;">
       </td>
       <td>
         <strong>&nbsp; - LEKARZ ZLECAJ¡CY </strong>
       </td>
     </tr>
     <tr><td><br /></td></tr>
     <tr>
       <td><input type="submit" name="Submit" value="AKCEPTUJ">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       <td><input type="reset" name="RESET" value="WYCZY¦Æ"></td>
     </tr>
     <tr><td><br /></td></tr>
</form>
     </td></tr>
    </table>
</div>

<div style="width:100%;clear:both;float:left;margin-top:30px;">

<?
if($arr['opiszlecenia']!=''){
?>
<button style="width:200px;height:25px;background-color:#CDEDED;margin-left:10px;" type="button" onclick="window.open('drukuj_wz.php?kwota=<?=$arr['kwota']?>&wzk=<?=$arr['wzk'];?>&id_zlec=<?=$id_zlec;?>&nr_zlec=<?=$nr_zlec;?>&opiszlecenia=<?=$arr['opiszlecenia'];?>&pacjent=<?=$arrr['pacjent'];?>&datazwrotu=<?=$arr['zwrotzlecenia'];?>', 'drukowanie', 'toolbar=no, scrollbars=no, resizable=yes, status=no, menubar=no, location=no, directories=no, width=850, height=400')">
  <b>DRUKUJ WZ</b>
</button>
<?
}
?>

</body>
</html>
<?
}
else{
  header("Location: index.php");
}
?>

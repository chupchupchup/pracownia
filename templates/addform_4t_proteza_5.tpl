<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel='stylesheet' type='text/css' href='css/addform_tabs.css' />
  <script type="text/javascript" src="js/kolornik.js"></script>
  
        <!-- compliance patch for microsoft browsers -->
        <!--[if lt IE 7]>
            <link rel='stylesheet' type='text/css' href='tabs-ie.css' />
            <script src="./ie7/ie7-standard-p.js" type="text/javascript"></script>
        <![endif]-->
</head>
<body id='5'>

{literal}
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:60px;width:90px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
tr#zab input{
	height:50px;width:50px;
}
tr#material input{
	height:45px;width:45px;
}
div#newsel select{
	height:40px;width:150px;
	font-size:20px;
}

</style>
{/literal}

        <ul id="tabs" style="font-size:12px;color:white;">
            <li id="tab1"><div><div><span>Szkielet /<br /> Szynoproteza&nbsp;</span></div></div></li>
            <li id="tab2"><div><div><span>Całkowita<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab3"><div><div><span>Częściowa<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab4"><div><div><span>Szyny<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab5" style="color:black;"><div><div><span>Naprawa<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab6"><div><div><span>Prace<br />Pomocnicze</span></div></div></li>
        </ul>

        <div id='iframe'>
   <br />

<!-- <div align="center" style="margin-top:0px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij" >COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_tech/addform_3t.php">
</form>
</div>
 -->
<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="sklejenie" value="sklejenie" {if $sklejenie== "sklejenie"}checked{/if}/></td>
   <td> - SKLEJENIE</td>
   <td><input type="checkbox" name="naprawa_z_siatka" value="naprawa z siatką" {if $naprawa_z_siatka== "naprawa z siatką"}checked{/if}/></td>
   <td> - NAPRAWA Z SIATKĄ</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="dostawienie_zeba" value="dostawienie zęba" {if $dostawienie_zeba== "dostawienie zęba"}checked{/if}/></td>
   <td> - DOSTAWIENIE ZĘBA</td>
   <td>
	  <select name="dostawienie_zeba_ilosc" style="height:40px;width:60px;font-size:20px;">
		 		 <option value="" {if $dostawienie_zeba_ilosc== ""}selected{/if}>  </option>
		 		 <option value="1" {if $dostawienie_zeba_ilosc== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $dostawienie_zeba_ilosc== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $dostawienie_zeba_ilosc== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $dostawienie_zeba_ilosc== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $dostawienie_zeba_ilosc== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $dostawienie_zeba_ilosc== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $dostawienie_zeba_ilosc== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $dostawienie_zeba_ilosc== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $dostawienie_zeba_ilosc== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $dostawienie_zeba_ilosc== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $dostawienie_zeba_ilosc== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $dostawienie_zeba_ilosc== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $dostawienie_zeba_ilosc== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $dostawienie_zeba_ilosc== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $dostawienie_zeba_ilosc== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $dostawienie_zeba_ilosc== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $dostawienie_zeba_ilosc== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $dostawienie_zeba_ilosc== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $dostawienie_zeba_ilosc== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $dostawienie_zeba_ilosc== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $dostawienie_zeba_ilosc== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $dostawienie_zeba_ilosc== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $dostawienie_zeba_ilosc== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $dostawienie_zeba_ilosc== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $dostawienie_zeba_ilosc== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $dostawienie_zeba_ilosc== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $dostawienie_zeba_ilosc== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $dostawienie_zeba_ilosc== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $dostawienie_zeba_ilosc== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $dostawienie_zeba_ilosc== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $dostawienie_zeba_ilosc== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $dostawienie_zeba_ilosc== "32"}selected{/if}> 32 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="dostawienie_klamry" value="dostawienie klamry" {if $dostawienie_klamry== "dostawienie klamry"}checked{/if}/></td>
   <td> - DOSTAWIENIE KLAMRY</td>
   <td>
	  <select name="dostawienie_klamry_ilosc" style="height:40px;width:60px;font-size:20px;">
		 		 <option value="" {if $dostawienie_klamry_ilosc== ""}selected{/if}>  </option>
		 		 <option value="1" {if $dostawienie_klamry_ilosc== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $dostawienie_klamry_ilosc== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $dostawienie_klamry_ilosc== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $dostawienie_klamry_ilosc== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $dostawienie_klamry_ilosc== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $dostawienie_klamry_ilosc== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $dostawienie_klamry_ilosc== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $dostawienie_klamry_ilosc== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $dostawienie_klamry_ilosc== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $dostawienie_klamry_ilosc== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $dostawienie_klamry_ilosc== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $dostawienie_klamry_ilosc== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $dostawienie_klamry_ilosc== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $dostawienie_klamry_ilosc== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $dostawienie_klamry_ilosc== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $dostawienie_klamry_ilosc== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $dostawienie_klamry_ilosc== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $dostawienie_klamry_ilosc== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $dostawienie_klamry_ilosc== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $dostawienie_klamry_ilosc== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $dostawienie_klamry_ilosc== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $dostawienie_klamry_ilosc== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $dostawienie_klamry_ilosc== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $dostawienie_klamry_ilosc== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $dostawienie_klamry_ilosc== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $dostawienie_klamry_ilosc== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $dostawienie_klamry_ilosc== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $dostawienie_klamry_ilosc== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $dostawienie_klamry_ilosc== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $dostawienie_klamry_ilosc== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $dostawienie_klamry_ilosc== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $dostawienie_klamry_ilosc== "32"}selected{/if}> 32 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="element_lany" value="element lany" {if $element_lany== "element lany"}checked{/if}/></td>
   <td> - ELEMENT LANY</td>
   <td>
	  <select name="element_lany_ilosc" style="height:40px;width:60px;font-size:20px;">
		 		 <option value="" {if $element_lany_ilosc== ""}selected{/if}>  </option>
		 		 <option value="1" {if $element_lany_ilosc== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $element_lany_ilosc== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $element_lany_ilosc== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $element_lany_ilosc== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $element_lany_ilosc== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $element_lany_ilosc== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $element_lany_ilosc== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $element_lany_ilosc== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $element_lany_ilosc== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $element_lany_ilosc== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $element_lany_ilosc== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $element_lany_ilosc== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $element_lany_ilosc== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $element_lany_ilosc== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $element_lany_ilosc== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $element_lany_ilosc== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $element_lany_ilosc== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $element_lany_ilosc== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $element_lany_ilosc== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $element_lany_ilosc== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $element_lany_ilosc== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $element_lany_ilosc== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $element_lany_ilosc== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $element_lany_ilosc== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $element_lany_ilosc== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $element_lany_ilosc== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $element_lany_ilosc== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $element_lany_ilosc== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $element_lany_ilosc== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $element_lany_ilosc== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $element_lany_ilosc== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $element_lany_ilosc== "32"}selected{/if}> 32 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
    <tr id="material">
   <td><input type="checkbox" name="podsypanie_zebow" value="podsypanie zębów" {if $podsypanie_zebow== "podsypanie zębów"}checked{/if}/></td>
   <td> - PODSYPANIE ZĘBÓW</td>
   <td><input type="checkbox" name="lutowanie" value="lutowanie" {if $lutowanie== "lutowanie"}checked{/if}/></td>
   <td> - LUTOWANIE</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="wymiana_akrylu" value="wymiana akrylu" {if $wymiana_akrylu== "wymiana akrylu"}checked{/if}/></td>
   <td> - WYMIANA AKRYLU</td>
   <td><input type="checkbox" name="podscielenie" value="podścielenie protezy" {if $podscielenie== "podścielenie protezy"}checked{/if}/></td>
   <td> - PODŚCIELENIE PROTEZY</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="matryca" value="wymiana matryc" {if $matryca== "wymiana matryc"}checked{/if}/></td>
   <td> - WYMIANA MATRYC</td>
   <td><input type="checkbox" name="miekkie_podscielenie" value="miękkie podścielenie" {if $miekkie_podscielenie== "miękkie podścielenie"}checked{/if}/></td>
   <td> - MIĘKKIE PODŚCIELENIE</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="lutowanie_wymiana_akrylu" value="lutowanie z wymianą akrylu" {if $lutowanie_wymiana_akrylu== "lutowanie z wymianą akrylu"}checked{/if}/></td>
   <td> - LUTOWANIE Z WYMIANĄ AKRYLU</td>
   <td><input type="checkbox" name="lutowanie_szkieletu" value="lutowanie szkieletu" {if $lutowanie_szkieletu== "lutowanie szkieletu"}checked{/if}/></td>
   <td> - LUTOWANIE SZKIELETU</td>
  </tr>
</table>

<hr style="width:100%;"/>

  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej" >DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_proteza_5.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">

    {include file="materialy_extra.tpl"}
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

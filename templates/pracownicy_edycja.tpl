<html>
<head>

{literal}

  <script type="text/javascript" src="./js/sorttable.js"></script>

<style type="text/css">
.inputfr {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #E5E5FF; border: 1px #0066CC outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; 		
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

.inputf {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #FFFFE6; border: 1px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

form {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; text-decoration: none;
	border: 0px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}
.tab {
        font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; text-decoration: none;
}

</style>
{/literal}

</head>

<body topmargin="0">
{$komunikat}
<table width="500" border="0">
  <tr>
    <td valign="top">
<div style="margin-left:60px;margin-top:20px;">

<form name="form" action="./biuro.php" method="post" >
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="aktualizuj_form" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:108px; height:25px; font-size: 12px;text-align:right; color:#CCCCCC"><b>EDYCJA</b>&nbsp;</td>
            <td style="width:400px; height:25px; font-size: 12px; color:#CCCCCC" nowrap><b> PRACOWNIKA: </b></td>
      </tr>
  </table>

  <table class="tab" style="width:508px; ">
    <tr class="inputfr">
     <td>ID Pracownika: </td>
     <td><input type="text" class="inputf" name="pracownikid" size="30" value="{$pracownikid}" readonly=""/> </td>
    </tr>
    <tr class="inputfr">
     <td style="width:200px; height:25px; font-size: 11px;">Imie: </td>
     <td style="width:350px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="imie" size="30" value="{$imie}" >
     </td>
    </tr>
    <tr class="inputfr">
     <td>Nazwisko: </td>
     <td><input type="text" class="inputf" name="nazwisko" size="30" value="{$nazwisko}"/> </td>
    </tr>
    <tr class="inputfr">
     <td>Adres zamieszkania: </td>
     <td><input type="text" class="inputf" name="adres" size="30" value="{$adres}" /></td>
    </tr>
    <tr class="inputfr">
     <td>MIEJSCOWOSC: </td>
     <td><input type="text" class="inputf" name="miejscowosc" size="30" value="{$miejscowosc}" /></td>
    </tr>
    <tr class="inputfr">
     <td>KOD POCZTOWY: </td>
     <td><input type="text" class="inputf" name="kod_pocztowy" size="30" value="{$kod_pocztowy}" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL SLUZB.: </td>
     <td><input type="text" class="inputf" name="tel_sluzb" size="30" value="{$tel_sluzb}" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL PRV DOM: </td>
     <td><input type="text" class="inputf" name="tel_prv" size="30" value="{$tel_prv}" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL PRV KOM.: </td>
     <td><input type="text" class="inputf" name="tel_prv_kom" size="30" value="{$tel_prv_kom}" /></td>
    </tr>
    <tr class="inputfr">
     <td>PESEL: </td>
     <td><input type="text" class="inputf" name="pesel" size="30" value="{$pesel}" /></td>
    </tr>
    <tr class="inputfr">
     <td>NR DOWODU: </td>
     <td><input type="text" class="inputf" name="nr_dowodu_osob" size="30" value="{$nr_dowodu_osob}" /></td>
    </tr>
    <tr class="inputfr">
     <td>E-mail: </td>
     <td><input type="text" class="inputf" name="email" size="30" value="{$email}" /></td>
    </tr>
    <tr class="inputfr">
     <td>Stanowisko: </td>
     <td>
       <select name="stanowisko" class="inputf" style="width:100px; ">
           <option></option>
           <option {if $stanowisko=='technik'}selected{else}{/if}>technik</option>
       </select>
     </td>
    </tr>
    <tr class="inputfr">
     <td>Zespól: </td>
     <td><input type="text" class="inputf" name="zespol" size="30" value="{$zespol}" /></td>
    </tr>
    <tr class="inputfr">
     <td>Przelozony: </td>
     <td>
       <select name='przelozony' id='przelozony'  style="width:276px;">
              {foreach key=key item=item from=$przelozony_tab}
                  <option {if $przelozony_tab[$key]==$przelozony}selected{else}{/if}>{$przelozony_tab[$key]}</option>
              {/foreach}
       </select>
	 </td>
    </tr>
    <tr class="inputfr">
     <td>Data urodzenia: </td>
     <td><input type="text" class="inputf" name="data_urodzenia" size="30" value="{$data_urodzenia}" /></td>
    </tr>
    <tr class="inputfr">
     <td>Data rozp. pracy: </td>
     <td><input type="text" class="inputf" name="data_rozp_pracy" size="30" value="{$data_rozp_pracy}" /></td>
    </tr>
    <tr class="inputfr">
     <td>Data zak. pracy: </td>
     <td><input type="text" class="inputf" name="data_zak_pracy" size="30" value="{$data_zak_pracy}" /></td>
    </tr>
    <tr class="inputfr">
     <td>Data wst. szkolenia_BHP: </td>
     <td><input type="text" class="inputf" name="data_wstepnego_szkolenia_BHP" size="30" value="{$data_wstepnego_szkolenia_BHP}" /></td>
    </tr>
    <tr class="inputfr">
     <td>Czas pracy: </td>
     <td>
       <select name="czas_pracy" class="inputf" style="width:100px; ">
           <option></option>
           <option {if $czas_pracy=='etat'}selected{else}{/if}>etat</option>
           <option {if $czas_pracy=='3/4 etatu'}selected{else}{/if}>3/4 etatu</option>
           <option {if $czas_pracy=='1/2 etatu'}selected{else}{/if}>1/2 etatu</option>
           <option {if $czas_pracy=='1/4 etatu'}selected{else}{/if}>1/4 etatu</option>
       </select>
	 </td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr>
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Zatwierdz" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />
<!-- CERTYFIKATY --------------------------------------------------------------------------------------------------------- -->
  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Certyfikaty:</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_cert == "tak"}
   <iframe src="./biuro/pracownicy_cert_wyswietl.php" style="width:568px;height:65px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_cert" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">DATA otrzymania certyfikatu: </td>
     <td style="height:25px; font-size: 11px;"><input type="text" class="inputf" name="data_otrzymania_cert" size="10" align="left" /> </td>
     <td style="width:100px; height:25px; font-size: 11px;">Certyfikat: </td>
     <td><textarea name="certyfikat" cols="30" rows="2"></textarea> </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />

<!-- --------------------------------------------------------------------------------------------------------- -->
<!-- UWAGI --------------------------------------------------------------------------------------------------------- -->
  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Uwagi:</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_uwaga == "tak"}
   <iframe src="./biuro/pracownicy_uwagi_wyswietl.php" style="width:568px;height:65px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_uwaga" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">DATA uwagi: </td>
     <td style="height:25px; font-size: 11px;"><input type="text" class="inputf" name="data_uwagi" size="10" align="left" value="{$akt_data}" /> </td>
     <td style="width:100px; height:25px; font-size: 11px;">Uwaga: </td>
     <td><textarea name="uwaga" cols="30" rows="2"></textarea> </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />

<!-- --------------------------------------------------------------------------------------------------------- -->

</div>
	</td>
    <td valign="top">
<div style="margin-left:60px;margin-top:20px;">

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Osoba do</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> kontaktu w przypadku nieszczesliwego wypadku - I.C.E.: </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

  <table cellspacing="1" cellpadding="1" width="568px">
  {section name=f loop=$tablica_wynikow_ice}

    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:558px;">
      <a style="color:white;" href="./biuro.php?strona=glowna&wpis=edycja_ice&pracownikid={$tablica_wynikow_ice[f][1]}&pracownicy_ice_id={$tablica_wynikow_ice[f][0]}&amp" target="_self">
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow_ice[f][2]|truncate:40}&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow_ice[f][3]|truncate:40}&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow_ice[f][4]|truncate:40}&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow_ice[f][5]|truncate:40}&nbsp;</td>
      </a>
    </tr>

  {/section}
  </table>

<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_ice" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:200px; height:25px; font-size: 11px;">Imie: </td>
     <td style="width:350px; height:25px; font-size: 11px;"><input type="text" class="inputf" name="imie" size="30" /> </td>
     <td>Nazwisko: </td>
     <td ><input type="text" class="inputf" name="nazwisko" size="30" ></td>
    </tr>
    <tr class="inputfr">
     <td>Telefon: </td>
     <td><input type="text" class="inputf" name="tel" size="30" ></td>
     <td>Pokrewienstwo: </td>
     <td><input type="text" class="inputf" name="pokrewienstwo" size="30" ></td>
    </tr>
    <tr>
      <td></td> 
      <td></td> 
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
<hr />
</form>

<!-- --------------------------------------------------------------------------------------------------------- -->
  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>URLOPY</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> : </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub == "tak"}
   <iframe src="./biuro/pracownicy_urlop_wyswietl.php" style="width:568px;height:100px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_urlop" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:200px; height:25px; font-size: 11px;">DATA od - do: </td>
     <td style="width:300px; height:25px; font-size: 11px;"><input type="text" class="inputf" name="dataod" size="10" /> - <input type="text" class="inputf" name="datado" size="10" > </td>
     <td>Rok urlopu: </td>
     <td >
	   <select name="rok_urlopu" class="inputf" style="width:100px; ">
           <option>2011</option>
           <option>2012</option>
           <option>2013</option>
           <option>2014</option>
           <option>2015</option>
           <option>2016</option>
           <option>2017</option>
           <option>2018</option>
           <option>2019</option>
           <option>2020</option>
       </select>
     </td>
    </tr>
    <tr class="inputfr">
     <td>Ilosc dni urlopu: </td>
     <td>
       <input type="text" class="inputf" name="ilosc_dni_urlopu" size="6" >
	 </td>
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_ustaw_urlop" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td>Rok urlopu: </td>
     <td >
	   <select name="rok_urlopu" class="inputf" style="width:100px; ">
           <option>2011</option>
           <option>2012</option>
           <option>2013</option>
           <option>2014</option>
           <option>2015</option>
           <option>2016</option>
           <option>2017</option>
           <option>2018</option>
           <option>2019</option>
           <option>2020</option>
       </select>
     </td>
     <td>Ilosc dni urlopu w tym roku: </td>
     <td>
       <input type="text" class="inputf" name="ilosc_dni_urlopu_akt_rok" size="6" >
	 </td>
      <td><input value="[USTAW]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Badania</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> lekarskie: </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_badania_lek == "tak"}
   <iframe src="./biuro/pracownicy_badania_lek_wyswietl.php" style="width:568px;height:65px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_badania" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">DATA badania: </td>
     <td style="height:25px; font-size: 11px;"><input type="text" class="inputf" name="data_badania" size="10" align="left" /> </td>
     <td style="width:180px; height:25px; font-size: 11px;">DATA nastepnego badania: </td>
     <td > <input type="text" class="inputf" name="data_nast_badania" size="10" > </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td>Opis badan: </td>
     <td><textarea name="opis_badania" cols="30" rows="2"></textarea> </td>
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />

<!-- --------------------------------------------------------------------------------------------------------- -->
  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>BHP:</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_bhp == "tak"}
   <iframe src="./biuro/pracownicy_bhp_wyswietl.php" style="width:568px;height:65px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_bhp" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">DATA szkolenia: </td>
     <td style="height:25px; font-size: 11px;"><input type="text" class="inputf" name="data_szkolenia" size="10" align="left" /> </td>
     <td style="width:180px; height:25px; font-size: 11px;">DATA nastepnego szkolenia: </td>
     <td > <input type="text" class="inputf" name="data_nast_szkolenia" size="10" > </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td>Opis szkolenia: </td>
     <td><textarea name="opis_szkolenia" cols="30" rows="2"></textarea> </td>
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />

<!-- --------------------------------------------------------------------------------------------------------- -->
	</td>
  </tr>
</table>

</body>
</html>

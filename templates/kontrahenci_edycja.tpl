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
  <input type="hidden" name="strona" value="glowna_kontrahenci" />
  <input type="hidden" name="wpis" value="aktualizuj_kontrahenci" />
  <input type="hidden" name="idzleceniodawcy" value="{$idzleceniodawcy}" />

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#336600">
            <td style="width:108px; height:25px; font-size: 12px;text-align:right; color:#CCCCCC"><b>EDYCJA</b>&nbsp;</td>
            <td style="width:400px; height:25px; font-size: 12px; color:#CCCCCC" nowrap><b> KONTRAHENTA: </b></td>
      </tr>
  </table>

  <table class="tab" style="width:508px; ">
    <tr class="inputfr">
     <td>ID KONTRAHENTA: </td>
     <td><input type="text" class="inputf" name="idzleceniodawcy" size="30" value="{$idzleceniodawcy}" readonly="" /></td>
    </tr>
    <tr class="inputfr">
     <td>DATA UMOWY: </td>
     <td><input type="text" class="inputf" name="data_umowy" value="{$data_umowy}" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>NR UMOWY: </td>
     <td><input type="text" class="inputf" name="nr_umowy" value="{$nr_umowy}" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td style="width:200px; height:25px; font-size: 11px;">Nazwa: </td>
     <td style="width:350px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="nazwa" value="{$nazwa}" size="30" >
     </td>
    </tr>
    <tr class="inputfr">
     <td>Adres: </td>
     <td><input type="text" class="inputf" name="adres" value="{$adres}" size="30"/> </td>
    </tr>
    <tr class="inputfr">
     <td>Adres do korespondencji: </td>
     <td><input type="text" class="inputf" name="adres_korespond" value="{$adres_korespond}" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Adres gabinetu: </td>
     <td><input type="text" class="inputf" name="adres_gabinetu" value="{$adres_gabinetu}" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>NIP.: </td>
     <td><input type="text" class="inputf" name="nip" size="30" value="{$nip}" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL STACJONARNY: </td>
     <td><input type="text" class="inputf" name="tel" size="30" value="{$tel}" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL KOM.: </td>
     <td><input type="text" class="inputf" name="tel_kom" size="30" value="{$tel_kom}" /></td>
    </tr>
    <tr class="inputfr">
     <td>E-mail: </td>
     <td><input type="text" class="inputf" name="email" size="30" value="{$email}" /></td>
    </tr>
    <tr class="inputfr">
     <td>RABAT: </td>
     <td><input type="text" class="inputf" name="rabat" value="{$rabat}" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Miejsce pozostawienia prac po godz: </td>
     <td><input type="text" class="inputf" name="miejsce_poz_prac_po_godz" value="{$miejsce_poz_prac_po_godz}" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Ostatnia WZ-ka: </td>
     <td><input type="text" class="inputf" name="wz_ost" value="{$wz_ost}" size="30" /></td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr>
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Zatwierdz" name="submit" type="submit" style="background:#C5D33F;"></td>
    </tr>
  </table>
</form>
<hr />
<!-- techik --------------------------------------------------------------------------------------------------------- -->
  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#336600">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Technik:</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b></b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_technik == "tak"}
   <iframe src="./biuro/kontrahenci_technik_wyswietl.php" style="width:568px;height:52px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna_kontrahenci" />
  <input type="hidden" name="wpis" value="dodaj_technik" />
  <input type="hidden" name="idzleceniodawcy" value="{$idzleceniodawcy}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">Technik: </td>
     <td style="height:25px; font-size: 11px;">	   
       <select name='pracownikid' style="width:276px;">
              {foreach key=key item=item from=$technik}
                  <option>{$technik[$key]}</option>
              {/foreach}
       </select>
 </td>
     <td style="width:100px; height:25px; font-size: 11px;">Praca: </td>
     <td style="height:25px; font-size: 11px;">	   
	 <select name="praca" class="inputf" style="width:100px; ">
           <option>porcelana</option>
           <option>proteza</option>
       </select>
 </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#C5D33F; color:#000000"></td>
    </tr>
  </table>
</form>
<hr />
<!-- --------------------------------------------------------------------------------------------------------- -->

</div>
	</td>
    <td valign="top">
<div style="margin-left:60px;margin-top:20px;">

<!-- godziny otwarcia --------------------------------------------------------------------------------------------------------- -->
  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#336600">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Godziny </b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b>otwarcia: </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_go == "tak"}
   <iframe src="./biuro/kontrahenci_go_wyswietl.php" style="width:568px;height:162px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna_kontrahenci" />
  <input type="hidden" name="wpis" value="dodaj_go" />
  <input type="hidden" name="idzleceniodawcy" value="{$idzleceniodawcy}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">Dzien tygodnia: </td>
     <td style="height:25px; font-size: 11px;">	   
	 <select name="dzien_tyg" class="inputf" style="width:100px; ">
           <option>poniedzialek</option>
           <option>wtorek</option>
           <option>sroda</option>
           <option>czwartek</option>
           <option>piatek</option>
           <option>sobota</option>
           <option>niedziela</option>
       </select>
 </td>
     <td style="width:100px; height:25px; font-size: 11px;">Otwarte od-do: </td>
     <td>
      <input type="text" class="inputf" name="otwarte_od" size="10" align="left" /> - <input type="text" class="inputf" name="otwarte_do" size="10" align="left" />
	 </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#C5D33F; color:#000000"></td>
    </tr>
  </table>
</form>
<hr />
<!-- UWAGI --------------------------------------------------------------------------------------------------------- -->

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#336600">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Uwagi:</b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> </b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_uwaga == "tak"}
   <iframe src="./biuro/kontrahenci_uwagi_wyswietl.php" style="width:568px;height:65px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna_kontrahenci" />
  <input type="hidden" name="wpis" value="dodaj_uwaga" />
  <input type="hidden" name="idzleceniodawcy" value="{$idzleceniodawcy}" />

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
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#C5D33F; color:#000000"></td>
    </tr>
  </table>
</form>
<hr />

<!-- --------------------------------------------------------------------------------------------------------- -->
  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#336600">
            <td style="width:128px; height:25px; font-size: 14px;text-align:right; color:#CCCCCC"><b>Wspólpracujacy </b>&nbsp;</td>
            <td style="width:450px; height:25px; font-size: 14px; color:#CCCCCC" nowrap><b> Lekarze:</b> 
			<span style=" font-size:12px"></span>
			</td>
      </tr>
  </table>

 {if $sub_wsp_lek == "tak"}
   <iframe src="./biuro/kontrahenci_wsp_lek_wyswietl.php" style="width:568px;height:65px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 
<hr />
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna_kontrahenci" />
  <input type="hidden" name="wpis" value="dodaj_wsp_lek" />
  <input type="hidden" name="idzleceniodawcy" value="{$idzleceniodawcy}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:160px; height:25px; font-size: 11px;">Wspolpracujacy Lekarze: </td>
     <td style="height:25px; font-size: 11px;"><input type="text" class="inputf" name="nazwa" size="60" align="left" /> </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[DODAJ+]" name="submit" type="submit" style="background-color:#C5D33F; color:#000000"></td>
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

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

<b style="font-size:12px; background:#E6E2EB; color: #656565;"> {$info} </b>
<br />

<div style="margin-left:0px;margin-top:10px;width:330px;height:304px; float:left">

<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="magazyn" />
  <input type="hidden" name="wpis" value="update" />
  <input type="hidden" name="indeks" value="{$wyswietl_edycja[0][0]}"/>
  <input type="hidden" name="ilosc_pobrana" value="{$wyswietl_edycja[0][3]-$wyswietl_edycja[0][4]}"/>

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#D6D9FE">
            <td style="width:108px; height:25px; font-size: 12px;text-align:right;"><b>EDYCJA</b>&nbsp;</td>
            <td style="width:325px; height:25px; font-size: 12px;" nowrap><b> MATERIA£U: </b></td>
      </tr>
  </table>
  
  <table class="tab">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">Nazwa: </td>
     <td style="width:200px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="nazwa" size="30" value="{$wyswietl_edycja[0][1]}"/>
     </td>
    </tr>
    <tr class="inputfr">
     <td>Ilo¶æ ca³kowita: </td>
     <td><input type="text" class="inputf" name="ilosc_calkowita" size="10" value="{$wyswietl_edycja[0][3]}"/> </td>
    </tr>
    <tr class="inputfr">
     <td>Ilo¶æ pozosta³a: </td>
     <td><input type="text" class="inputf" name="ilosc_pozostala" size="10" value="{$wyswietl_edycja[0][4]}"/> </td>
    </tr>
    <tr class="inputfr">
     <td>Cena: </td>
     <td><input type="text" class="inputf" name="cena_zakupu" size="10" value="{$wyswietl_edycja[0][5]}"/></td>
    </tr>
    <tr class="inputfr">
     <td>Jednostka miary: </td>
     <td>
       <select name="jednostka_miary" class="inputf">
           <option {if $wyswietl_edycja[0][7]=="szt."} selected {/if} >szt.</option>
           <option {if $wyswietl_edycja[0][7]=="cm"} selected {/if} >cm</option>
           <option {if $wyswietl_edycja[0][7]=="g"} selected {/if} >g</option>
           <option {if $wyswietl_edycja[0][7]=="ml"} selected {/if} >ml</option>
       </select>
     </td>
    <tr class="inputfr">
     <td>Producent: </td>
     <td><input type="text" class="inputf" name="producent" size="30" value="{$wyswietl_edycja[0][9]}"/></td>
    </tr>
    <tr class="inputfr">
     <td>Numer seryjny: </td>
     <td><input type="text" class="inputf" name="nr_seryjny" size="30" value="{$wyswietl_edycja[0][10]}"/></td>
    </tr>
    <tr class="inputfr">
     <td>Dostawca <br>materialu: </td>
     <td>
       <select name="dostawca" class="inputf" style="margin-left:0px;width:300px;">
        {foreach key=key item=item from=$dostawca}
           {if $dostawca[$key]==$wyswietl_edycja[0][11]}
  		     <option selected>{$dostawca[$key]}</option>
		   {else}
  		     <option>{$dostawca[$key]}</option>
		   {/if}
        {/foreach}
      </select>
	 </td>
    </tr>
    <tr class="inputfr">
     <td>Data dodania: </td>
     <td><input type="text" class="inputf" name="data_dodania" size="10" value="{$wyswietl_edycja[0][2]}" readonly/></td>
    </tr>
    <tr class="inputfr">
     <td>Status: </td>
     <td><input type="text" class="inputf" name="status" size="2" value="{$wyswietl_edycja[0][8]}" readonly/></td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr><td>&nbsp; </td></tr>
    <tr>
      <td><input value="Wyczy¶æ" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Zatwierd¼" name="submit" type="submit" style="background:#C7C7FF;">
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        {if $wyswietl_edycja[0][8] == "act"}
          <button style="background:#E70000;color:#E8E8E8;" type="button" onclick="self.location.href=('biuro.php?strona=magazyn&usun=wyk&indeks={$wyswietl_edycja[0][0]}&nazwa={$wyswietl_edycja[0][1]}&ilosc_calkowita={$wyswietl_edycja[0][3]}&ilosc_pozostala={$wyswietl_edycja[0][4]}&cena_zakupu={$wyswietl_edycja[0][5]}&jednostka_miary={$wyswietl_edycja[0][7]}&data_dodania={$wyswietl_edycja[0][2]}&amp')">
          <b> wyk </b>
          </button>
          &nbsp;&nbsp;
          <button style="background:#E70000;color:#E8E8E8;" type="button" onclick="self.location.href=('biuro.php?strona=magazyn&usun=tak&indeks={$wyswietl_edycja[0][0]}&nazwa={$wyswietl_edycja[0][1]}&ilosc_calkowita={$wyswietl_edycja[0][3]}&ilosc_pozostala={$wyswietl_edycja[0][4]}&cena_zakupu={$wyswietl_edycja[0][5]}&jednostka_miary={$wyswietl_edycja[0][7]}&data_dodania={$wyswietl_edycja[0][2]}&amp')">
          <b> del </b>
          </button>
        {/if}
        {if $wyswietl_edycja[0][8] == "wyk"}
          <button style="background:#E70000;color:#E8E8E8;" type="button" onclick="self.location.href=('biuro.php?strona=magazyn&usun=nie&indeks={$wyswietl_edycja[0][0]}&nazwa={$wyswietl_edycja[0][1]}&ilosc_calkowita={$wyswietl_edycja[0][3]}&ilosc_pozostala={$wyswietl_edycja[0][4]}&cena_zakupu={$wyswietl_edycja[0][5]}&jednostka_miary={$wyswietl_edycja[0][7]}&data_dodania={$wyswietl_edycja[0][2]}&amp')">
          <b> act </b>
          </button>
          &nbsp;&nbsp;
          <button style="background:#E70000;color:#E8E8E8;" type="button" onclick="self.location.href=('biuro.php?strona=magazyn&usun=tak&indeks={$wyswietl_edycja[0][0]}&nazwa={$wyswietl_edycja[0][1]}&ilosc_calkowita={$wyswietl_edycja[0][3]}&ilosc_pozostala={$wyswietl_edycja[0][4]}&cena_zakupu={$wyswietl_edycja[0][5]}&jednostka_miary={$wyswietl_edycja[0][7]}&data_dodania={$wyswietl_edycja[0][2]}&amp')">
          <b> del </b>
          </button>
        {/if}
        {if $wyswietl_edycja[0][8] == "del"}
          <button style="background:#E70000;color:#E8E8E8;" type="button" onclick="self.location.href=('biuro.php?strona=magazyn&usun=nie&indeks={$wyswietl_edycja[0][0]}&nazwa={$wyswietl_edycja[0][1]}&ilosc_calkowita={$wyswietl_edycja[0][3]}&ilosc_pozostala={$wyswietl_edycja[0][4]}&cena_zakupu={$wyswietl_edycja[0][5]}&jednostka_miary={$wyswietl_edycja[0][7]}&data_dodania={$wyswietl_edycja[0][2]}&amp')">
          <b> act </b>
          </button>
          &nbsp;&nbsp;
          <button style="background:#E70000;color:#E8E8E8;" type="button" onclick="self.location.href=('biuro.php?strona=magazyn&usun=wyk&indeks={$wyswietl_edycja[0][0]}&nazwa={$wyswietl_edycja[0][1]}&ilosc_calkowita={$wyswietl_edycja[0][3]}&ilosc_pozostala={$wyswietl_edycja[0][4]}&cena_zakupu={$wyswietl_edycja[0][5]}&jednostka_miary={$wyswietl_edycja[0][7]}&data_dodania={$wyswietl_edycja[0][2]}&amp')">
          <b> wyk </b>
          </button>
        {/if}
      </td>
    </tr>

  </table>
</form>

{if $wyswietl_wynik_szukaj == "szukaj"}

<button style="margin-left:10px;margin-top:15px;width:330px;background:#6F6FFF;color:#E8E8E8;font-size:11px;text-align:center;" type="button" onclick="self.location.href=('biuro.php?strona=magazyn&szukaj=zaawansowane&amp')">
  <b> POWRÓT DO OSTATNICH WYNIKÓW WYSZUKIWANIA </b>
</button>
{/if}

</div>

<div style="margin-left:0px;margin-top:10px;width:330px;height:304px; float:left">

<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="magazyn" />
  <input type="hidden" name="wpis" value="pobierz" />
  <input type="hidden" name="indeks" value="{$wyswietl_edycja[0][0]}"/>
  <input type="hidden" name="ilosc_calkowita" value="{$wyswietl_edycja[0][3]}"/>
  <input type="hidden" name="ilosc_pozostala" value="{$wyswietl_edycja[0][4]}"/>
  <input type="hidden" name="cena" value="{$wyswietl_edycja[0][5]}"/>
  <input type="hidden" name="jednostka_miary" value="{$wyswietl_edycja[0][7]}"/>

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#D6D9FE">
            <td style="width:108px; height:25px; font-size: 12px;text-align:right;"><b>POBIERZ </b>&nbsp;</td>
            <td style="width:200px; height:25px; font-size: 12px;" nowrap><b>MATERIA£: </b></td>
      </tr>
  </table>

  <table class="tab">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">Nazwa: </td>
     <td style="width:200px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="nazwa" size="30" value="{$wyswietl_edycja[0][1]}" readonly/>
     </td>
    </tr>
    <tr class="inputfr">
     <td>Producent: </td>
     <td><input type="text" class="inputf" name="producent" size="30" value="{$wyswietl_edycja[0][9]}" readonly/></td>
    </tr>
    <tr class="inputfr">
     <td>Numer seryjny: </td>
     <td><input type="text" class="inputf" name="nr_seryjny" size="30" value="{$wyswietl_edycja[0][10]}" readonly/></td>
    </tr>
    <tr class="inputfr">
     <td>Dostawca <br>materialu: </td>
     <td><input type="text" class="inputf" name="dostawca" size="30" value="{$wyswietl_edycja[0][11]}" readonly/></td>
    </tr>
    <tr class="inputfr">
     <td>Data dodania: </td>
     <td><input type="text" class="inputf" name="data_dodania" size="10" value="{$wyswietl_edycja[0][2]}" readonly/></td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr class="inputfr">
     <td><b>Ilo¶æ do pobrania: </b></td>
     <td><input type="text" class="inputf" style="font-weight:bold;" name="ilosc_do_pobrania" size="10" value="{$wyswietl_edycja[0][4]}"/> </td>
    </tr>
    <tr class="inputfr">
     <td><b>Osoba pobieraj±ca: </b></td>
     <td>
            <select name='osoba_wykorzystujaca' style="width:200px;font-weight:bold;font-size:12px;">
              {foreach key=key item=item from=$osoba_pobierajaca}
                  <option>{$osoba_pobierajaca[$key]}</option>
              {/foreach}
          </select>
     </td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr><td>&nbsp; </td></tr>
    <tr>
      <td><input value="Wyczy¶æ" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Zatwierd¼" name="submit" type="submit" style="background:#C7C7FF;"></td>
    </tr>

  </table>
</form>
</div>

</body>
</html>

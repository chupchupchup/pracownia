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

<script>
function openSelectWindow(theURL,winName,myWidth, myHeight, isCenter, formfield1, formfield2)
{
	if(window.screen)
		if(isCenter)
			var myLeft = 5;
	var myTop = 5;
	if(isCenter=="true"){
		myLeft = (screen.width-myWidth)/2+250;
		myTop = (screen.height-myHeight)/2;
	}

	targetfield1 = formfield1;
	targetfield2 = formfield2;
	//alert(targetfield1);

	okno = window.open(theURL,winName,'location=0,directories=0,scrollbars=yes,toolbar=0,menubar=0,resizable=0,status=0,width='+myWidth+',height='+myHeight+',left=' + myLeft+ ',top=' + myTop);

	return false;
}

function choosewin(formfield1,formfield2,netid)
{

   //alert(formfield1);
   //alert(netid);
	if(netid)
		okno = openSelectWindow('./biuro/magazyn_dodaj_nazwa.php','choose',350,300,'true',formfield1,formfield2)
	else
		okno = openSelectWindow('./biuro/magazyn_dodaj_nazwa.php','choose2',350,300,'true',formfield1,formfield2)
	return false;

}

</script>

{/literal}

</head>

<body topmargin="0">
{$komunikat}
<table width="500" border="0">
  <tr>
    <td align="center" valign="top">
<div style="margin-left:60px;margin-top:50px;">

<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="wyszukaj_form" />

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#D6D9FE">
            <td style="width:108px; height:25px; font-size: 12px;text-align:right;"><b>WYSZUKAJ</b>&nbsp;</td>
            <td style="width:200px; height:25px; font-size: 12px;" nowrap><b> PRACOWNIKA: </b></td>
      </tr>
  </table>

  <table class="tab" style="width:308px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">Imie: </td>
     <td style="width:350px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="imie" size="30" value="{$imie}" >
     </td>
    </tr>
    <tr class="inputfr">
     <td>Nazwisko: </td>
     <td><input type="text" class="inputf" name="nazwisko" size="30" value="{$nazwisko}"/> </td>
    </tr>
    <tr class="inputfr">
     <td>pesel: </td>
     <td><input type="text" class="inputf" name="pesel" size="12" maxlength="11" value="{$pesel}"/></td>
    </tr>
    <tr class="inputfr">
     <td>Stanowisko: </td>
     <td>
       <select name="stanowisko" class="inputf" style="width:100px; ">
           <option></option>
           <option {if $stanowisko=='technik'}selected{else}{/if}>technik</option>
       </select>
     </td>
    <tr><td>&nbsp; </td></tr>
    <tr>
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Zatwierdz" name="submit" type="submit" style="background:#C7C7FF;"></td>
    </tr>
  </table>
</form>

</div>
	</td>
    <td>
<div style="margin-left:60px;margin-top:50px;">

<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="dodaj_form" />

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#C5D33F">
            <td style="width:108px; height:25px; font-size: 12px;text-align:right;"><b>DODAJ</b>&nbsp;</td>
            <td style="width:400px; height:25px; font-size: 12px;" nowrap><b> PRACOWNIKA: </b></td>
      </tr>
  </table>

  <table class="tab" style="width:508px; ">
    <tr class="inputfr">
     <td style="width:200px; height:25px; font-size: 11px;">Imie: </td>
     <td style="width:350px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="imie" size="30" >
     </td>
    </tr>
    <tr class="inputfr">
     <td>Nazwisko: </td>
     <td><input type="text" class="inputf" name="nazwisko" size="30"/> </td>
    </tr>
    <tr class="inputfr">
     <td>Adres zamieszkania: </td>
     <td><input type="text" class="inputf" name="adres" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>MIEJSCOWOSC: </td>
     <td><input type="text" class="inputf" name="miejscowosc" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>KOD POCZTOWY: </td>
     <td><input type="text" class="inputf" name="kod_pocztowy" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL SLUZB.: </td>
     <td><input type="text" class="inputf" name="tel_sluzb" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL PRV DOM: </td>
     <td><input type="text" class="inputf" name="tel_prv" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>TEL PRV KOM.: </td>
     <td><input type="text" class="inputf" name="tel_prv_kom" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>PESEL: </td>
     <td><input type="text" class="inputf" name="pesel" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>NR DOWODU: </td>
     <td><input type="text" class="inputf" name="nr_dowodu_osob" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>E-mail: </td>
     <td><input type="text" class="inputf" name="email" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Stanowisko: </td>
     <td>
       <select name="stanowisko" class="inputf" style="width:100px; ">
           <option></option>
           <option>technik</option>
       </select>
     </td>
    </tr>
    <tr class="inputfr">
     <td>Zespól: </td>
     <td><input type="text" class="inputf" name="zespol" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Przelozony: </td>
     <td>
       <select name='przelozony' id='przelozony'  style="width:276px;">
              {foreach key=key item=item from=$przelozony}
                  <option>{$przelozony[$key]}</option>
              {/foreach}
       </select>
	 </td>
    </tr>
    <tr class="inputfr">
     <td>Data urodzenia: </td>
     <td><input type="text" class="inputf" name="data_urodzenia" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Data rozp. pracy: </td>
     <td><input type="text" class="inputf" name="data_rozp_pracy" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Data zak. pracy: </td>
     <td><input type="text" class="inputf" name="data_zak_pracy" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Data wst. szkolenia_BHP: </td>
     <td><input type="text" class="inputf" name="data_wstepnego_szkolenia_BHP" size="30" /></td>
    </tr>
    <tr class="inputfr">
     <td>Czas pracy: </td>
     <td>
       <select name="czas_pracy" class="inputf" style="width:100px; ">
           <option></option>
           <option>etat</option>
           <option>3/4 etatu</option>
           <option>1/2 etatu</option>
           <option>1/4 etatu</option>
       </select>
	 </td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr>
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Zatwierdz" name="submit" type="submit" style="background:#C5D33F;"></td>
    </tr>
  </table>
</form>

</div>
	</td>
  </tr>
</table>


</body>
</html>

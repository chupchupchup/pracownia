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
<div style="margin-left:60px;margin-top:20px; width:140px; background-color:">
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="usun_urlop" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />
  <input type="hidden" name="pracownicy_urlop_id" value="{$pracownicy_urlop_id}" />
  <input name="czy_usunac" type="checkbox" value="tak"> 
  <input value="[USUN-]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC">
</form>
</div>

<div style="margin-left:60px;margin-top:20px;">

<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="aktualizuj_ustaw_urlop" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />
  <input type="hidden" name="pracownicy_urlop_id" value="{$pracownicy_urlop_id}" />

  <table class="tab" style="width:800px; ">
    <tr class="inputfr">
     <td style="width:100px; height:25px; font-size: 11px;">Rok urlopu: </td>
     <td style="width:100px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="rok_urlopu" size="4" value="{$rok_urlopu}" readonly>
	 </td>
     <td style="width:260px;">Ilosc dni urlopu przyslugujacego w tym roku: </td>
     <td><input type="text" class="inputf" name="ilosc_dni_urlopu_akt_rok" size="6" value="{$ilosc_dni_urlopu_akt_rok}" ></td>
    </tr>
    <tr>
      <td></td> 
      <td></td> 
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3; float:right;"/></td>
      <td><input value="Aktualizuj" name="submit" type="submit" style="background-color:#336633; color:#CCCCCC"></td>
    </tr>
  </table>
<hr />
</form>

</div>

</body>
</html>

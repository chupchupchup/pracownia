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
  <input type="hidden" name="strona" value="glowna_kontrahenci" />
  <input type="hidden" name="wpis" value="usun_wsp_lek" />
  <input type="hidden" name="id_wsp_lek" value="{$id_wsp_lek}" />
  <input type="hidden" name="idzleceniodawcy" value="{$idzleceniodawcy}" />
  <input type="checkbox" name="czy_usunac" value="tak"> 
  <input value="[USUN-]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC">
</form>
</div>

<div style="margin-left:60px;margin-top:20px;">

<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna_kontrahenci" />
  <input type="hidden" name="wpis" value="aktualizuj_wsp_lek" />
  <input type="hidden" name="idzleceniodawcy" value="{$idzleceniodawcy}" />
  <input type="hidden" name="id_wsp_lek" value="{$id_wsp_lek}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td style="width:180px; height:25px; font-size: 11px;">Wspolpracujacy lekarz: </td>
      <td style="height:25px; font-size: 11px;">
	    <input name="nazwa" type="text" value="{$nazwa}" >
	  </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="[AKTUALIZUJ+]" name="submit" type="submit" style="background-color:#C5D33F; color:#000000"></td>
    </tr>
  </table>
</form>
<hr />

</div>

</body>
</html>

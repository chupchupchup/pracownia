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
  <input type="hidden" name="wpis" value="usun_uwaga" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />
  <input type="hidden" name="pracownicy_uwagi_id" value="{$pracownicy_uwagi_id}" />
  <input name="czy_usunac" type="checkbox" value="tak"> 
  <input value="[USUN-]" name="submit" type="submit" style="background-color:#CC3300; color:#CCCCCC">
</form>
</div>

<div style="margin-left:60px;margin-top:20px;">

<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="glowna" />
  <input type="hidden" name="wpis" value="aktualizuj_uwaga" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />
  <input type="hidden" name="pracownicy_uwagi_id" value="{$pracownicy_uwagi_id}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:80px; height:25px; font-size: 11px;">Data uwagi: </td>
     <td style="height:25px; font-size: 11px;"><input type="text" class="inputf" name="data_uwagi" size="10" value="{$data_uwagi}"/> </td>
     <td>Uwaga: </td>
     <td><textarea name="uwaga" cols="30" rows="5">{$uwaga}</textarea> </td>
    </tr>
  </table>
  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Aktualizuj" name="submit" type="submit" style="background-color:#336633; color:#CCCCCC"></td>
    </tr>
  </table>
</form>
<hr />

</div>

</body>
</html>

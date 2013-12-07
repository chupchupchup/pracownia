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
  <input type="hidden" name="wpis" value="aktualizuj_urlop" />
  <input type="hidden" name="pracownikid" value="{$pracownikid}" />
  <input type="hidden" name="pracownicy_urlop_id" value="{$pracownicy_urlop_id}" />

  <table class="tab" style="width:558px; ">
    <tr class="inputfr">
     <td style="width:200px; height:25px; font-size: 11px;">Data od: </td>
     <td style="width:350px; height:25px; font-size: 11px;"><input type="text" class="inputf" name="dataod" size="30" value="{$dataod}"/> </td>
     <td>Data do: </td>
     <td ><input type="text" class="inputf" name="datado" size="30" value="{$datado}" ></td>
    </tr>
    <tr class="inputfr">
     <td>Rok urlopu: </td>
     <td>
	   <select name="rok_urlopu" class="inputf" style="width:100px; ">
           <option {if $rok_urlopu=='2011'}selected{else}{/if}>2011</option>
           <option {if $rok_urlopu=='2012'}selected{else}{/if}>2012</option>
           <option {if $rok_urlopu=='2013'}selected{else}{/if}>2013</option>
           <option {if $rok_urlopu=='2014'}selected{else}{/if}>2014</option>
           <option {if $rok_urlopu=='2015'}selected{else}{/if}>2015</option>
           <option {if $rok_urlopu=='2016'}selected{else}{/if}>2016</option>
           <option {if $rok_urlopu=='2017'}selected{else}{/if}>2017</option>
           <option {if $rok_urlopu=='2018'}selected{else}{/if}>2018</option>
           <option {if $rok_urlopu=='2019'}selected{else}{/if}>2019</option>
           <option {if $rok_urlopu=='2020'}selected{else}{/if}>2020</option>
       </select>
	 </td>
     <td>Ilosc dni urlopu: </td>
     <td><input type="text" class="inputf" name="ilosc_dni_urlopu" size="30" value="{$ilosc_dni_urlopu}" ></td>
    </tr>
    <tr>
      <td></td> 
      <td></td> 
      <td><input value="Wyczysc" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td><input value="Aktualizuj" name="submit" type="submit" style="background-color:#336633; color:#CCCCCC"></td>
    </tr>
  </table>
<hr />
</form>
</div>

</body>
</html>

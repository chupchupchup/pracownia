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
  <input type="hidden" name="strona" value="glowna_producenci" />
  <input type="hidden" name="wpis" value="aktualizuj_form" />
  <input type="hidden" name="id" value="{$id}" />

  <table cellpadding="0" cellspacing="0" border="1" frame="hsides" rules="rows">
      <tr bgcolor="#CC3300">
            <td style="width:108px; height:25px; font-size: 12px;text-align:right; color:#CCCCCC"><b>EDYCJA</b>&nbsp;</td>
            <td style="width:400px; height:25px; font-size: 12px; color:#CCCCCC" nowrap><b> PRODUCENTA: </b></td>
      </tr>
  </table>

  <table class="tab" style="width:508px; ">
    <tr class="inputfr">
     <td>ID: </td>
     <td><input type="text" class="inputf" name="dummy" size="30" value="{$id}" readonly="true"/> </td>
    </tr>
    <tr class="inputfr">
     <td style="width:200px; height:25px; font-size: 11px;">Nazwa: </td>
     <td style="width:350px; height:25px; font-size: 11px;">
       <input type="text" class="inputf" name="nazwa" size="30" value="{$nazwa}" >
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

</div>
	</td>

	</td>
  </tr>
</table>

</body>
</html>

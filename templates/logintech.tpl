<html>
<head>
<title>PRACOWNIA</title>
<link rel="stylesheet" href="./css/login.css" type="text/css">
<meta http-equiv="Content-Type" content="text-html; charset=iso-8859-2">
</head>

{literal}
<style type="text/css">
.touch {
	border:1px solid black;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size:15px;
	background-color:#ECECEC;
	color:#003366;
	width:65px;
	height:65px;
	}
#touchDiv,fieldset {text-align:center;}
</style>
{/literal}

</head>

<body>

<div style="margin-top: 80px;" align="center">
<form name="zaloguj" method="post" action="indextech.php">

  <table style="width:300px;" border="1" frame="BORDER" rules="NONE" cellpadding="8" cellspacing="0">
    <tr>
      <td class="logowanie" align="center">LOGOWANIE DO SYSTEMU ZARZĄDZANIA ZLECENIAMI PRACOWNI</td>
    </tr>
  </table>

  <table style="width:300px;" border="0" rules="NONE" cellpadding="6" cellspacing="0">
    <tr class="inputfr">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr class="inputfr">
      <td align="right"><b>PODAJ PIN:</b></td>
      <td><input class="inputf" type="password" name="pin" maxlength="6" size="8" onfocus="document.forms['zaloguj'].elements['focusedField'].value = this.name"></td>
    </tr>
  </table>

  <table style="width:300px;" border="1" frame="BELOW" rules="NONE" cellpadding="18" cellspacing="0">
    <tr class="inputfr" align="center">
      <td>
      	  <input class="inputf" style="height:40px;width:100px;" type="submit" name="ZALOGUJ" value="ZALOGUJ">
      	  <input class="inputf" style="height:40px;width:100px;" type="reset" name="WYCZYSC" value="WYCZYSC">
      </td>
    </tr>
  </table>

<input type="hidden" name="focusedField">
<input type="hidden" name="count" value="{$count}">
</form>
</div>

<!-- klawiatura numeryczna na ekranie -->
{literal}
<script type="text/javascript">
function addIt(cKey)
{
dsel = document.forms["zaloguj"].elements["focusedField"];
selectedElement = (dsel.value!='')?dsel.value:"pin";

d = document.forms["zaloguj"].elements[selectedElement];
d.value =  (cKey.value=='cofnij') ? d.value.slice(0,-1) : d.value+cKey.value;
}
</script>
{/literal}

<div id="touchDiv">
<input class="touch" type="button" value="7" onclick="addIt(this)">
<input class="touch" type="button" value="8" onclick="addIt(this)">
<input class="touch" type="button" value="9" onclick="addIt(this)"><br />
<input class="touch" type="button" value="4" onclick="addIt(this)">
<input class="touch" type="button" value="5" onclick="addIt(this)">
<input class="touch" type="button" value="6" onclick="addIt(this)"><br />
<input class="touch" type="button" value="1" onclick="addIt(this)">
<input class="touch" type="button" value="2" onclick="addIt(this)">
<input class="touch" type="button" value="3" onclick="addIt(this)"><br />
<input class="touch" type="button" value="0" onclick="addIt(this)">
<input class="touch" type="button" value="cofnij" onclick="addIt(this)" style="width:134px">
</div>

<!-- <div>
<form name="zaloguj" action>
<fieldset><legend>The Input</legend>
<input type="text" name="bar" onfocus="document.forms['zaloguj'].elements['focusedField'].value = this.name"><br>
<input type="text" name="bar2" onfocus="document.forms['zaloguj'].elements['focusedField'].value = this.name"><br>
<input type="text" name="focusedField" value="document.forms['zaloguj'].elements['focusedField'].value">
</fieldset>
</form>
</div>
 -->
</body>
</html>

<html>
<head>
<title>LOGOWANIE</title>
<link rel="stylesheet" href="./css/login.css" type="text/css">
<meta http-equiv="Content-Type" content="text-html; charset=iso-8859-2">
</head>
</head>
<body>

<div style="margin-top: 100px;" align="center">
<form name="zaloguj" method="post" action="indexuserpass.php">

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
      <td align="right"><b>LOGIN:</b></td>
      <td><input class="inputf" type="text" name="loginek" maxlength="20" size="15"></td>
    </tr>
    <tr class="inputfr">
      <td align="right"><b>HASŁO:</b></td>
      <td><input class="inputf" type="password" name="haselko" maxlength="20" size="15"></td>
    </tr>
  </table>

  <table style="width:300px;" border="1" frame="BELOW" rules="NONE" cellpadding="18" cellspacing="0">
    <tr class="inputfr" align="center">
      <td>
      	  <input class="inputf" type="submit" name="ZALOGUJ" value="ZALOGUJ">
      	  <input class="inputf" type="reset" name="WYCZYSC" value="WYCZYSC">
      </td>
    </tr>
  </table>

<input type="hidden" name="count" value="{$count}">
</form>
</div>

</body>
</html>

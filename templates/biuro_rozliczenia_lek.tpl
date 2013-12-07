<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
 <body bgcolor="#F4FFF0">
  <p><strong><u>WYBIERZ LEKARZA DO ROZLICZENIA :</u></strong></p>
  <br>
  <form name="form1" method="post" action="./biuro.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="strona" value="rozliczenia">
   <input type="hidden" name="kto" value="zleceniodawca">

<hr>
   <table width="60%" border="0" cellpadding="0" cellspacing="1">
     <tr><td><br></td></tr>
        <tr>
          <td>
            <select name="zleceniodawca" style="margin-left:20px;float:left;">
              {foreach key=key item=item from=$zleceniodawca}
                  <option>{$zleceniodawca[$key]}</option>
              {/foreach}
            </select>
            <strong>&nbsp;<--- wybierz lekarza</strong>
          </td>
        </tr>
     <tr><td><br></td></tr>
   </table>
<hr>
   <table width="100%" border="0" cellpadding="0" cellspacing="1" align="left">
     <tr>
       <td><input type="submit" name="Submit" value="AKCEPTUJ" style="margin-left:20px;float:left;">&nbsp;&nbsp;<input type="reset" name="RESET" value="WYCZYŚĆ"></td>
     </tr>
   </table>
</form>
</body>
</html>


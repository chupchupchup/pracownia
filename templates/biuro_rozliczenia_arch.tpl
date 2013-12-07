<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
 <body bgcolor="#F4FFF0">
  <p><strong><u>PRZESZUKAJ ARCHIWUM ROZLICZEŃ :</u></strong></p>
<hr>
  <form name="form1" method="post" action="./biuro.php">

   <!-- ukryte pole przekazujace identyfikator rekordu w bazie danych-->
   <input type="hidden" name="strona" value="rozliczenia">
   <input type="hidden" name="archiwum" value="technik">

   <table width="60%" border="0" cellpadding="0" cellspacing="1">
     <tr><td><br></td></tr>
        <tr>
          <td>
            <select name="technik" style="margin-left:20px;float:left;">
              {foreach key=key item=item from=$technicy}
                  <option>{$technicy[$key]}</option>
              {/foreach}
            </select>
            <strong>&nbsp;<--- wybierz technika</strong>
          </td>
        </tr>
     <tr><td><br></td></tr>
   </table>
   <table width="100%" border="0" cellpadding="0" cellspacing="1" align="left">
     <tr>
       <td><input type="submit" name="Submit" value="AKCEPTUJ" style="margin-left:20px;float:left;">&nbsp;&nbsp;<input type="reset" name="RESET" value="WYCZYŚĆ"></td>
     </tr>
   </table>
</form>

<br><hr>

</body>
</html>


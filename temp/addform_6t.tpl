<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel='stylesheet' type='text/css' href='css/addform_tabs.css' />

        <!-- compliance patch for microsoft browsers -->
        <!--[if lt IE 7]>
            <link rel='stylesheet' type='text/css' href='tabs-ie.css' />
            <script src="./ie7/ie7-standard-p.js" type="text/javascript"></script>
        <![endif]-->
</head>
<body>

{literal}
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:60px;width:120px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
</style>
{/literal}

<div style="margin-top:20px;clear:both;float:left;">

<div align="center" style="margin-top:0px;margin-left:10px;">
 <form name="dodaj" method="post" action="pracownia.php">
  <button class="b" style="width:120px;height:80px;" type="submit" name="dodaj" ><b>KONTYNUUJ<br />DODAWANIE</b></button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_3i.php">
</form>
</div>


<button class="b" style="margin-top:60px;width:120px;height:80px;background-color:#EDEDED;margin-left:10px;" type="button" onclick="window.open('zlecenia_add/printetyk.php', 'drukowanie', 'toolbar=no, scrollbars=no, resizable=no, status=no, menubar=no, location=no, directories=no, width=300, height=20')"> <b>DRUKUJ <br />ETYKIETĘ</b> </button>
 
<div align="center" style="margin-top:60px;margin-left:10px;">
 <form name="zakoncz" method="post" action="pracownia.php">
  <button class="b" style="width:120px;" type="submit" name="zakoncz" ><b>ZAKOŃCZ</b></button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_7i.php">
</form>
</div>

</div>


<div>
&nbsp;&nbsp;
  <table cellspacing="0" cellpadding="5" bgcolor="White" style="margin-left:200px;" border="1" FRAME="hsides" RULES="rows">

      <tr bgcolor="#D6D9FE" >
            <td style="width:150px; height:25px; font-size: 11px;"><b> DODANE ZLECENIE: </b></td>
            <td style="width:300px; height:25px; font-size: 11px;"><b>  </b></td>
      </tr>

    {foreach key=key item=item from=$tablica_wynikow}
      <tr>
        <td style="width:150px; height:25px; font-size: 11px;"><b> {$key} </b></td>
        <td style="width:300px; height:25px; font-size: 11px;"><b> {$item} </b></td>
      </tr>
    {/foreach}

  </table>
<div>

</body>
</html>
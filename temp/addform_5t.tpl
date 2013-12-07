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

<br />
<div align="center" style="margin-top:30px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij" ><b>COFNIJ</b></button>
  <input type="hidden" name="{$cofnij0}" value="{$cofnij1}">
  <input type="hidden" name="strona" value="zlecenia_add/addform_4i.php">
</form>
</div>
&nbsp;&nbsp;

  <table style="margin-left:200px;" bgcolor="White" border="1" FRAME="hsides" RULES="rows" CELLPADDING="6" CELLSPACING="0">

      <tr class="inputfr">
            <td style="width:150px; height:25px; font-size: 11px;"><b> DANE </b></td>
            <td style="width:300px; height:25px; font-size: 11px;"><b> WARTOŚĆ </b></td>
      </tr>

    {foreach key=key item=item from=$tablica_wynikow}
      <tr>
        <td style="width:150px; height:25px; font-size: 11px;"><b> {$key} </b></td>
        <td style="width:300px; height:25px; font-size: 11px;"><b> {$item} </b></td>
      </tr>
    {/foreach}

  </table>

<div align="center" style="margin-top:0px;margin-left:10px;margin-top:-80px;clear:both;float:left;">
 <form name="dodaj" method="post" action="pracownia.php">
  <button class="b" style="width:120px;height:80px;" type="submit" name="dodaj" ><b>DODAJ<br />ZLECENIE</b></button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_6i.php">
</form>
</div>

</body>
</html>
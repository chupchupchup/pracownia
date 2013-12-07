<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />

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
  <button class="b" type="submit" name="cofnij"><b>COFNIJ</b></button>
  <input type="hidden" name="{$cofnij0}" value="{$cofnij1}">
  <input type="hidden" name="strona" value="zlecenia_add/addform_4.php">
</form>
</div>
&nbsp;&nbsp;

  <table style="margin-left:200px;height:170px;" bgcolor="White" border="1" frame="hsides" rules="rows" cellpadding="6" cellspacing="0">

      <tr class="inputfr">
            <td style="width:150px; height:25px; font-size: 11px;"><b> DANE </b></td>
            <td style="width:300px; height:25px; font-size: 11px;"><b>  </b></td>
      </tr>

    {foreach key=key item=item from=$tablica_wynikow}
       {if $item =="" || $key =="zakladka" || $key =="idzleceniapoz_tmp"  || $key =="wpis" || $key =="nr_rozliczenia" || $key =="wpisujacy" || $key =="zwrotzleceniagodz" }
       {elseif $key =="idzlecenianr"}
         <tr>
          <td style="width:150px; height:25px; font-size: 11px;"><b> idzlecenia </b></td>
          <td style="width:300px; height:25px; font-size: 11px;"><b>  {$item}
       {elseif $key =="idzleceniapoz" }
             {$item} </b></td>
         </tr>
       {else}
         <tr>
          <td style="width:150px; height:25px; font-size: 11px;"><b> {$key} </b></td>
          <td style="width:300px; height:25px; font-size: 11px;"><b> {$item} </b></td>
         </tr>
       {/if}
    {/foreach}

  </table>

<div align="center" style="margin-left:10px;margin-top:-40px;clear:both;float:left;">
 <form name="dodaj" method="post" action="pracownia.php">
  <button class="b" style="width:120px;height:80px;" type="submit" name="dodaj"><b>DODAJ<br />ZLECENIE</b></button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_6.php">
</form>
</div>

</body>
</html>

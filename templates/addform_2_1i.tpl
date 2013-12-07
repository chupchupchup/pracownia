<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />
  <script type="text/javascript" src="js/kolornik.js"></script>

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
   padding-left:0px; height:60px;width:90px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
</style>
{/literal}

<div style="position:absolute; margin: 50px 0px 0px 0px;">

<hr />
<br />

<div align="center" style="margin-top:0px;margin-left:20px;clear:both;float:left;">

 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij">COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_2i.php">
</form>

</div>

{if $visible == "tak"}

  <table style="width:80%;margin-left:130px;" border="1" frame="hsides" rules="all" cellpadding="6" cellspacing="0">

      <tr class="inputfr">
            <td style="width:300px; height:30px; font-size: 11px;"><b> ID ZLECENIODAWCY </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> NAZWA </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> ADRES </b></td>
      </tr>

   {assign var=v value=1}
   {section name=f loop=$tablica_wynikow}

      {if $v is not odd} {assign var=color value="white"} {else} {assign var=color value="white"} {/if}
      {assign var=v value=$v+1}

      <tr bgcolor="{$color}" onmouseover="this.style.background='#ccffcc'" onmouseout="this.style.background='{$color}'">
            <a href="pracownia.php?strona=zlecenia_add/addform_2_2i.php&zleceniodawca={$tablica_wynikow[f][0]}&amp">
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][0]} </b></td>
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][1]} </b></td>
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][2]} </b></td>
            </a>
      </tr>
   {/section}

  </table>

  <table style="width:80%;margin-left:133px;" border="1" frame="BELOW" rules="NONE" cellpadding="1" cellspacing="0">
    <tr class="inputfr" align="left">
      <td>   &nbsp;
<!--          <b>STRONY :</b>  {assign var=lstr value=1}
                    {section name=petla loop=$liczbastron}

                    <a href="pracownia.php?strona=zlecenia_add/addform_2_1.php&litera={$litera}&limitstart={$lstr}&amp" style="text-decoration: none;">
                        <b style="font-size:20px;"><i> &nbsp; <{$lstr}> &nbsp;&nbsp;&nbsp; </i></b>
                    </a>
                   {assign var=lstr value=$lstr+1}
                   {/section}
 -->      </td>
    </tr>
  </table>

{/if}


</div>

</body>
</html>

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
  <input type="hidden" name="strona" value="zlecenia_tech/addform_2t.php">
</form>

</div>

{if $visible == "tak"}

  <table style="width:85%;margin-left:130px;" border="1" frame="hsides" rules="all" cellpadding="6" cellspacing="0">

      <tr class="inputfr">
            <td style="width:300px; height:30px; font-size: 11px;"><b> NR_ID / <small>[druk_starej etykiety]</small> </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> ID  </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> DATA WPIS.  </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> ZWROT DATA  </b></td>
            <td style="width:100px; height:30px; font-size: 11px;"><b> ZWROT GODZ.  </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> PACJENT </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> STATUS </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> KATEGORIA  </b></td>
      </tr>

   {assign var=v value=1}
   {section name=f loop=$tablica_wynikow}

      {if $v is not odd} {assign var=color value="white"} {else} {assign var=color value="white"} {/if}
      {assign var=v value=$v+1}

      <tr bgcolor="{$color}" onmouseover="this.style.background='#ccffcc'" onmouseout="this.style.background='{$color}'">
              <td style="width:300px; height:60px; font-size: 11px;" onclick="window.open('zlecenia_tech/printetyk_stary.php?zlecenienr={$tablica_wynikow[f][0]}&zleceniepoz={$tablica_wynikow[f][1]}&datawpisania={$tablica_wynikow[f][2]}&zwrotzleceniadata={$tablica_wynikow[f][3]}&zwrotzleceniagodz={$tablica_wynikow[f][4]}&kategoria={$tablica_wynikow[f][7]}&kod_kreskowy={$tablica_wynikow[f][11]}&amp', 'drukowanie', 'toolbar=yes, scrollbars=no, resizable=yes, status=no, menubar=yes, location=no, directories=no, width=250, height=20')" onmouseover="this.style.background='#aaaacc'" onmouseout="this.style.background='{$color}'" title="NACISKAJĄC TO POLE WYDRUKUJESZ PONOWNIE STARĄ ETYKIETĘ"><b> {$tablica_wynikow[f][0]} </b></td>
            {if $tablica_wynikow[f][13] neq "roz" && $tablica_wynikow[f][13] neq "zap" && $tablica_wynikow[f][13] neq "del"}
            <a href="pracownia.php?strona=zlecenia_tech/addform_3t.php&zlecenienr={$tablica_wynikow[f][0]}&kategoria={$tablica_wynikow[f][7]}&zleceniepoz={$tablica_wynikow[f][1]}&datawpisania={$tablica_wynikow[f][2]}&amp">
            {else}
            {/if}
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][1]} </b></td>
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][2]} </b></td>
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][3]} </b></td>
              <td style="width:100px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][4]} </b></td>
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][5]} </b></td>
              <td style="width:300px; height:60px; font-size: 11px;">
                <b>
                {if $tablica_wynikow[f][13] eq "roz" || $tablica_wynikow[f][13] eq "zap" || $tablica_wynikow[f][13] eq "del"}
                  <div style="color:red;">zlecenie rozliczone nie można go zmieniać</div>
                {else} {$tablica_wynikow[f][13]}
                {/if}
                </b>
              </td>
              <td style="width:300px; height:60px; font-size: 11px;"><b> {$tablica_wynikow[f][7]} </b></td>
            {if $tablica_wynikow[f][13] neq "roz" && $tablica_wynikow[f][13] neq "zap" && $tablica_wynikow[f][13] neq "del"}
            </a>
            {else}
            {/if}
      </tr>
   {/section}

  </table>

  <table style="width:85%;margin-left:133px;" border="1" frame="BELOW" rules="NONE" cellpadding="1" cellspacing="0">
    <tr class="inputfr" style="height:30px;" align="left">
      <td>&nbsp;
<!--          <b>STRONY :</b>  {assign var=lstr value=1}
                    {section name=petla loop=$liczbastron}

                    <a href="pracownia.php?strona=zlecenia_tech/addform_2_3t.php&litera={$litera}&limitstart={$lstr}&amp" style="text-decoration: none;">
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

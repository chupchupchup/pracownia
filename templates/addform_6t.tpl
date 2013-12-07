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

<div style="margin-top:20px;clear:both;float:left;">

<!-- <div align="center" style="margin-top:0px;margin-left:10px;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij"><b>COFNIJ</b></button>
  <input type="hidden" name="cofka" value="tak">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_3t.php">
</form>
</div>
 -->
 
<!-- <div align="center" style="margin-top:60px;margin-left:10px;">
 <button class="b" style="width:120px;height:60px;" type="button" onclick="window.open('./biuro/drukuj_wz.php?kwota={$cena}&wzk={$wz}&id_zlec={$idzleceniapoz}&nr_zlec={$idzlecenianr}&opiszlecenia={$opiszlecenia}&pacjent={$pacjent}&datazwrotu={$zwrotzleceniadata}', 'drukowanie', 'toolbar=no, scrollbars=no, resizable=yes, status=no, menubar=no, location=no, directories=no, width=850, height=400')">
   <b>DRUKUJ WZ</b>
 </button>
</div>
 -->
</div>
<!--
<div>
&nbsp;&nbsp;
  <table cellspacing="0" cellpadding="5" bgcolor="White" style="margin-left:200px;" border="1" frame="hsides" rules="rows">

      <tr bgcolor="#D6D9FE">
            <td style="width:150px; height:25px; font-size: 11px;"><b> WYKONANE ZLECENIE: </b></td>
            <td style="width:300px; height:25px; font-size: 11px;"><b>  </b></td>
      </tr>

    {foreach key=key item=item from=$tablica_wynikow}
       {if $item =="" || $item =="0" || $key =="punkty" || $key =="cena" || $key =="kod_kreskowy" || $key =="zakladka" || $key =="idzleceniapoz_tmp" || $key =="kategoria_wybor" || $key =="wpis" || $key =="nr_rozliczenia" || $key =="wpisujacy" || $key =="zwrotzleceniagodz" }
       {elseif $key =="idzlecenianr"}
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> idzlecenia </b></td>
          <td style="width:300px; height:25px; font-size: 12px;"><b>  {$item}
       {elseif $key =="idzleceniapoz" }
             {$item} </b></td>
         </tr>
       {else}
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> {$key} </b></td>
          <td style="width:300px; height:25px; font-size: 12px;"><b> {$item} </b></td>
         </tr>
       {/if}
    {/foreach}

  </table>
<div>
 -->
<div>
<form name="dalej" method="post" action="pracownia.php">
  <table cellspacing="0" cellpadding="5" style="margin-left:200px;margin-top:20px;;" class="tab">
    <tr class="inputfr">
     <td><b>Technik: </b></td>
     <td><input type="text" class="inputf" style="font-size: 14px;" name="idtechnika" value="{$idtechnika}" size="30" readonly/></td>
    </tr>
    <tr class="inputfr">
     <td><b>Punkty: </b><br> (punkty z aktualnego zlecenia)</td>
     <td><input type="text" class="inputf" style="font-size: 14px;" name="punkty" value="{$punkty}" size="10" readonly/></td>
    </tr>
    <tr class="inputfr">
     <td><b>Waga Złota: </b><br> (suma ze wszystkich zleceń)</td>
     <td><input type="text" class="inputf" style="font-size: 14px;" name="wagazlota" value="{$wagazlota}" size="10"/> podane w gramach <b>x</b> {$wartosc_zlota}zł (aktualna wartość)</td>
    </tr>
    <tr class="inputfr">
     <td><b>Wycena zlecenia: </b><br> (cena aktualnego zlecenia)</td>
     <td><input type="text" class="inputf" style="font-size: 14px;" name="cena" value="{$cena}" size="8" readonly> wycena w PLN (bez ceny złota)</td>
    </tr>
    <tr class="inputfr">
     <td><b>OPIS: </b><br> (opisy aktualnego zlecenia)</td>
     <td><textarea name="opiszlecenia" class="inputf" style="font-size: 14px;" cols="46" rows="15">{$opiszlecenia}</textarea></td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr class="inputfr">
     <td><b>EXTRA: </b><br> (materiały dodatkowe)</td>
	 <td><textarea name="mat_extra" class="inputf" style="font-size: 14px;" cols="46" rows="5">{section name=e loop=$extra}{$extra[e].nazwa}&#009;{$extra[e].nr_seryjny}&#013;&#010;{/section}</textarea></td>
	</tr>
  </table>

 <button class="b" style="width:120px;height:80px;margin-top:-300px;margin-left:10px;" type="button" onclick="window.open('./biuro/drukuj_deklaracje.php', 'drukowanie', 'toolbar=no, scrollbars=no, resizable=yes, status=no, menubar=no, location=no, directories=no, width=250, height=200')">
   <b>DRUKUJ<br>DEKLARACJĘ<br>ZGODNOŚCI</b>
 </button>

{if $next=='dalej'}
 <button class="b" style="margin-top:-150px;margin-left:-120px;" type="submit" name="dodaj"><b>DALEJ</b></button>
 <input type="hidden" name="wartosc_zlota" value="{$wartosc_zlota}">
 <input type="hidden" name="strona" value="zlecenia_tech/addform_3t.php">
 <input type="hidden" name="zleceniepoz" value="{$zleceniepoz}">
 <input type="hidden" name="zlecenienr" value="{$zlecenienr}">
 <input type="hidden" name="datawpisania" value="{$datawpisania}">
 <input type="hidden" name="kategoria" value="{$kategoria}">
 <input type="hidden" name="punkty_all" value="{$punkty_all}">
 <input type="hidden" name="cena_all" value="{$cena_all}">
 <input type="hidden" name="opis_all" value="{$opis_all}">
 <input type="hidden" name="dalsze_rozliczanie" value="tak">
{$punkty_all}
{$cena_all}
{$opis_all}

{elseif $next=='koniec'}
 <button class="b" style="margin-top:-150px;margin-left:-120px;" type="submit" name="dodaj"><b>KONIEC</b></button>
 <input type="hidden" name="wartosc_zlota" value="{$wartosc_zlota}">
 <input type="hidden" name="strona" value="zlecenia_tech/addform_7t.php">
 <input type="hidden" name="zleceniepoz" value="{$zleceniepoz}">
 <input type="hidden" name="zlecenienr" value="{$zlecenienr}">
 <input type="hidden" name="datawpisania" value="{$datawpisania}">
 <input type="hidden" name="kategoria" value="{$kategoria}">
{else}
{/if}
<!--   <input type="hidden" name="punkty" value="{$punkty}">
  <input type="hidden" name="cena" value="{$cena}">
  <input type="hidden" name="wagazlota" value="{$wagazlota}">
  <input type="hidden" name="opiszlecenia" value="{$opiszlecenia}">
 -->
 

</form>
</div>
</body>
</html>

<html>
<body>
{literal}
<script language="JavaScript" type="text/javascript">
<!--
  function displayWindow(url, width, height, resize){
    var Win = window.open(url, "displayWindow", 'width='+width+',height='+height+',resizable='+resize+',scrollbars=yes,menubar=no,left=0,top=0');

  }
//-->
</script>
{/literal}

<form name="form_tech" method="post" action="./biuro.php">
<input name="strona" type="hidden" value="rozliczenia">
<input name="rozlicz" type="hidden" value="tech_anuluj">
<input name="technik" type="hidden" value="{$technik}">
<input name="datarozliczenia" type="hidden" value="{$datarozliczenia}">

<table cellspacing="1" cellpadding="1">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{assign var=punkty value=0}
{assign var=wycena value=0}

{assign var=nr_pracy value=0}
{section name=f loop=$tablica_wynikow}
<a style="color:white;" href="./biuro.php?strona=rozliczenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&amp" target="_blank">
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
    <td nowrap style>
      <input type="checkbox" name="nr_{$nr_pracy}" value="{$tablica_wynikow[f][0]}" />
      <input type="hidden" name="zlec_poz_{$nr_pracy}" value="{$tablica_wynikow[f][1]}" />
    </td>
  {assign var=nr_pracy value=$nr_pracy+1}

  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 5}<td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {else}
      {/if}
  {assign var=v value=$v+1}
  {/foreach}
    {assign var=punkty value=$punkty+$tablica_wynikow[f][3]}
    {assign var=wycena value=$wycena+$tablica_wynikow[f][4]}

        <td nowrap style="float:left;text-align:center;">
          <a href="javascript:displayWindow('./biuro/czyrozlicz_tech.php?nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&technik={$tablica_wynikow[f][2]}&nr_rozliczenia={$tablica_wynikow[f][4]}&amp',500,300,'yes')" style="font-size:12px;;color:black;display:block;text-decoration:none;">
            <b> Tak/Nie </b>
          </a>
        </td>
</tr>
</a>
{/section}

<tr style="line-height:2px;margin-top:0px;margin-left:10px;background:#FF9900;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="height:1px;">&nbsp;</td>
  {/foreach}
</tr>
</table>

Suma punktow technika:  {$punkty}<br />
Suma wyceny:  {math equation="x" x=$wycena format="%.2f"} z³
<br /><br />

  <table style="margin-left:0px;width:550px;" border="0" cellpadding="1" cellspacing="0">
    <tr>
      <td style="width:550px;color:#ffffff;" align="center">
        <input value="Wyczysc" name="reset" type="reset" style="background:#C7C7FF;color:#998888;"/>
        <input value="Wycofaj zaznaczone prace z rozliczenia" name="submit" type="submit" style="background:#CC0000;color:#ffffff;">
      </td>
    </tr>
  </table>

<input type="hidden" name="liczba_el_roz" value="{$nr_pracy}" />
</form>

<!-- <a href="./biuro.php?strona=rozliczenia&technik={$technik}&datarozliczenia={$datarozliczenia}&rozlicz=tech_anuluj&amp" style="font-weight:bold;color:font-size:14px;color:black;display:block;margin-left:20px;">
 < -- ANULUJ ROZLICZENIE -- >
</a>
 -->
</body>
</html>

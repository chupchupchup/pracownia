<html>
<head>

  <script type="text/javascript" src="./js/sorttable.js"></script>

</head>
<body>
{$komunikat}
<table cellspacing="1" cellpadding="1" class="sortable">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{if $lokalizacja=='dodaj_pracownika'}

{section name=f loop=$tablica_wynikow}
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
<a style="color:white;" href="./biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid={$tablica_wynikow[f][0]}&amp" target="_self">
  {assign var=v value=1}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 4} <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {else}
      {/if}
  {assign var=v value=$v+1}
  {/foreach}
</a>
</tr>
{/section}

{elseif $lokalizacja=='wyszukaj_pracownika'}

{section name=f loop=$tablica_wynikow}
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
<a style="color:white;" href="./biuro.php?strona=glowna&wpis=edycja_pracownika&pracownikid={$tablica_wynikow[f][0]}&amp" target="_self">
  {assign var=v value=1}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 5} <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {else}
      {/if}
  {assign var=v value=$v+1}
  {/foreach}
</a>
</tr>
{/section}

{else}
{/if}

</table>

<table cellspacing="1" cellpadding="1" >
<tr style="line-height:2px;margin-top:0px;margin-left:10px;background:#FF9900;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="width:{$item}px;height:1px;">&nbsp;</td>
  {/foreach}
</tr>
</table>

</body>
</html>
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

{section name=f loop=$tablica_wynikow}
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
<a style="color:white;" href="./biuro.php?strona=glowna_kontrahenci&wpis=edycja_kontrahenci&idzleceniodawcy={$tablica_wynikow[f][0]}&amp" target="_self">
	  <td style="float:left;text-align:left;font-size:12px; width:200px;">{$tablica_wynikow[f][0]|truncate:100}&nbsp;</td>
	  <td style="float:left;text-align:left;font-size:12px; width:400px;">{$tablica_wynikow[f][1]|truncate:100}&nbsp;</td>
	  <td style="float:left;text-align:left;font-size:12px; width:400px;">{$tablica_wynikow[f][2]|truncate:100}&nbsp;</td>
	  <td style="float:left;text-align:left;font-size:12px; width:180px;">{$tablica_wynikow[f][3]|truncate:100}&nbsp;</td>
</a>
</tr>
{/section}

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
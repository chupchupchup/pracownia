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

HISTORIA ROZLICZEÑ - <b><i>{$technik}</i></b><br><br>

<table cellspacing="1" cellpadding="1" style="margin-left:20px;">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{section name=f loop=$tablica_wynikow}
<a style="color:white;" href="./biuro.php?strona=rozliczenia&technik={$technik}&archiwum=technik_pokaz&datarozliczenia={$tablica_wynikow[f][0]}&amp">
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 5}<td nowrap style="float:left;text-align:center;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {else}
      {/if}
  {assign var=v value=$v+1}
  {/foreach}
</tr>
</a>
{/section}

<tr style="line-height:2px;margin-top:0px;margin-left:10px;background:#FF9900;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="height:1px;">&nbsp;</td>
  {/foreach}
</tr>
</table>

</body>
</html>

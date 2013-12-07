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

<table cellspacing="1" cellpadding="1">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{assign var=punkty value=0}
{assign var=wycena value=0}
{assign var=zaplacone value=0}

{section name=f loop=$tablica_wynikow}
<a style="color:white;" href="./biuro.php?strona=rozliczenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&amp" target="_blank">
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
<a style="color:white;" href="./biuro.php?strona=zlecenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&data={$tablica_wynikow[f][7]}&tabela={$tablica_wynikow[f][8]}&amp" target="_blank">
          <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
</a>
    {assign var=v value=$v+1}
  {/foreach}
    {assign var=punkty value=$punkty+$tablica_wynikow[f][3]}
    {assign var=wycena value=$wycena+$tablica_wynikow[f][4]}
    {assign var=zaplacone value=$zaplacone+$tablica_wynikow[f][5]}
</tr>
</a>
{/section}

<tr style="line-height:2px;margin-top:0px;margin-left:10px;background:#FF9900;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="height:1px;">&nbsp;</td>
  {/foreach}
</tr>
</table>

Suma punktów: {$punkty}<br />
Suma z wyceny: {math equation="x" x=$wycena format="%.2f"} z³<br />
Suma zap³acono: {math equation="x" x=$zaplacone format="%.2f"} z³<br />
{assign var='roznica' value=$wycena-$zaplacone }
<br />

<br />

</body>
</html>

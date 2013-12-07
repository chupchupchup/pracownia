&nbsp;Tabela wyników wyszukiwania:
<br />
<table cellspacing="1" cellpadding="1">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}

    <td style="float:left;width:80px;text-align:center;"><b>{$item}</b></td>

  {/foreach}
</tr>

{section name=f loop=$tablica_wynikow}
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}

    <td style="float:left;width:80px;text-align:center;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>

  {assign var=v value=$v+1}
  {/foreach}
</tr>
{/section}

<tr style="line-height:2px;margin-top:0px;margin-left:10px;background:#FF9900;" >
  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_opisy}

    <td style="height:1px;">&nbsp;</td>

  {assign var=v value=$v+1}
  {/foreach}
</tr>
</table>

sfdsf

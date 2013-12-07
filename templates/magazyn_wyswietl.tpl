<html>
<head>
  <script type="text/javascript" src="./js/sorttable.js"></script>
</head>
<body style="background: ;" topmargin="0">

<table cellspacing="1" cellpadding="1" class="sortable" frame="BORDER" rules="groups" border="0" style="margin-top:0px;margin-left:0px;">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
   {foreach key=key item=item from=$wyswietl_keys}
       <td style="height:25px;width:{$item}px;text-align:center;" nowrap><b> {$key}</b></td>
   {/foreach}
 </tr>

{section name=f loop=$wyswietl}
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background: #ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
  {assign var=v value=0}
  {foreach key=key item=item from=$wyswietl[f]}
    {if $v>0 && $v<3}
      <td nowrap style="text-align:center;font-size:12px;">
        <a style="display: block;text-decoration:none;color:#000000;" href="biuro.php?strona=magazyn&wpis=edycja&indeks={$wyswietl[f][0]}&amp">
          {$wyswietl[f][$v]|truncate:40}&nbsp;
        </a>
      </td>
    {elseif $v>2 && $v<5}
      <td nowrap style="text-align:center;font-size:12px;">
        <a style="display: block;text-decoration:none;color:#000000;" href="biuro.php?strona=magazyn&wpis=edycja&indeks={$wyswietl[f][0]}&amp">
          {$wyswietl[f][$v]}&nbsp;{$wyswietl[f][7]}
        </a>
      </td>
    {elseif $v>4 && $v<7}
      <td nowrap style="text-align:center;font-size:12px;">
        <a style="display: block;text-decoration:none;color:#000000;" href="biuro.php?strona=magazyn&wpis=edycja&indeks={$wyswietl[f][0]}&amp">
          {$wyswietl[f][$v]|truncate:40}&nbsp;
        </a>
      </td>
    {else}
    {/if}
	
  {assign var=v value=$v+1}
  {/foreach}
      <td nowrap style="text-align:center;font-size:12px;">
        <a style="display: block;text-decoration:none;color:#000000; {if $wyswietl[f][8]=='del'}background-color:#FF0000;color: #FFFFFF;{elseif $wyswietl[f][8]=='wyk' }background-color: #CECEFB;{else}background-color: #C4FAB4;{/if}" href="biuro.php?strona=magazyn&wpis=edycja&indeks={$wyswietl[f][0]}&amp">
          {$wyswietl[f][8]|truncate:40}&nbsp;
        </a>
      </td>
</tr>
{/section}

<tr style="line-height:2px;margin-top:0px;margin-left:10px;background:#FF9900;">
  {assign var=a value=0}
   {foreach key=key item=item from=$wyswietl_keys}
     <td nowrap style="width:{$item}px;text-align:center;font-size:2px;">&nbsp;</td>
   {/foreach}
</tr>

</table>

{if $nr_strony=='wyswietl'}
{assign var=dzielnik value=20}
<table style="margin-left:0px;margin-top:10px; background-color:#DDDDDD; width:850px;">
<tr>
<td style="font-size:12px;" colspan="5">NUMER STRONY: <!--{$page_number+1} --></td>
</tr><tr>
{section name=str start=1 loop=$pages_count+1 step=1}
{if $smarty.section.str.index eq $page_number+1}
  <td >
    <a style="display:block;background:#B4B4B4;text-align:center;width:20px;text-decoration:none;color:#996633;" href="biuro.php?strona=magazyn&szukaj=zaawansowane&str={$smarty.section.str.index-1}&amp" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#996633'">
      {$smarty.section.str.index}
    </a>
  </td>
{else}
  <td>
    <a style="display:block;text-align:center;width:20px;text-decoration:none;color:#996633;" href="biuro.php?strona=magazyn&szukaj=zaawansowane&str={$smarty.section.str.index-1}&amp" onmouseover="this.style.color='#C0C0C0'" onmouseout="this.style.color='#996633'">
      {$smarty.section.str.index}
    </a>
  </td>
{/if}

{if $smarty.section.str.index % $dzielnik == 0}
</tr><tr>
{else}
{/if}

{/section}
</tr>
</table>
{/if}

</body>
</html>

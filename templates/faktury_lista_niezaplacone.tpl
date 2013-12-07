<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <script type="text/javascript" src="./js/sorttable.js"></script>
{literal}

<script language="JavaScript" type="text/javascript">
<!--
  function displayWindow(url, width, height, resize){
    var Win = window.open(url, "displayWindow", 'width='+width+',height='+height+',resizable='+resize+',scrollbars=no,menubar=no,left=0,top=0');
  }
//-->
</script>

<style>
img, div, a, input {
    behavior: url(iepngfix.htc);
}
</style>
{/literal}

</head>
<body>

<table cellspacing="1" cellpadding="1" class="sortable" style="margin-left:10px;margin-top:20px;width:80%;background-color: #FFFFFF;">

<tr style="background-image:url(./gfx/tbl_header.png); background-repeat:repeat-x; margin-left:0px;margin-bottom:0px;height:22px; width:80%;cursor: HAND;">
  {foreach key=key item=item from=$tablica_opisy}
    <th style="height:15px;width:{$item}px;text-align:center;color:#D0D0D0;cursor: HAND;" nowrap><b style="cursor: HAND;">{$key}</b></th>
  {/foreach}
</tr>

{section name=f loop=$tablica_wynikow}
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">

  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
    {if $v==2}
    <td nowrap style="text-align:left;font-size:14px;">
      <a style="color:#000000;text-decoration:none;display:block;text-align:left;" href="javascript:displayWindow('./biuro/faktury_info.php?fv_nr={$tablica_wynikow[f][0]}&amp',1100,300,'yes')">
         &nbsp;{$tablica_wynikow[f][$v]|truncate:40}&nbsp;
      </a>
    </td>
    <td nowrap style="text-align:left;font-size:14px;">
      <a style="color:#000000;text-decoration:none;display:block;text-align:left;" href="javascript:displayWindow('./biuro/faktury_info.php?fv_nr={$tablica_wynikow[f][0]}&amp',1100,300,'yes')">
         &nbsp;{$tablica_wynikow[f][$v]|truncate:40}&nbsp;
<!--         &nbsp;{math equation="x" x=$tablica_wynikow[f][$v]*1.22 format="%.2f"}&nbsp;zł
 -->
      </a>
    </td>
    {else}
     <td nowrap style="text-align:left;font-size:14px;">
       <a style="color:#000000;text-decoration:none;display:block;text-align:left;" href="javascript:displayWindow('./biuro/faktury_info.php?fv_nr={$tablica_wynikow[f][0]}&amp',1100,300,'yes')">
         &nbsp;{$tablica_wynikow[f][$v]|truncate:40}&nbsp;
       </a>
     </td>
    {/if}
  {assign var=v value=$v+1}
  {/foreach}
</tr>
{/section}
</table>

{if $nr_strony=='wyswietl'}
<table style="margin-left:10px;margin-top:10px;">
<tr>
<td style="font-size:12px;color:#000000;width:120px;">NUMER STRONY: <!--{$page_number+1} --></td>
{section name=str start=1 loop=$pages_count+1 step=1}
{if $smarty.section.str.index eq $page_number+1}
  <td>
    <a style="display:block;background:#B4B4B4;text-align:center;width:20px;text-decoration:none;color:#996633;" href="./zarzadzanie_admin.php?id=2&submenu=wyszukaj_wyswietl&wyszukaj=form&str={$smarty.section.str.index-1}&amp" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#996633'">
      {$smarty.section.str.index}
    </a>
  </td>
{else}
  <td>
    <a style="display:block;text-align:center;width:20px;text-decoration:none;color:#996633;" href="./zarzadzanie_admin.php?id=2&submenu=wyszukaj_wyswietl&wyszukaj=form&str={$smarty.section.str.index-1}&amp" onmouseover="this.style.color='#C0C0C0'" onmouseout="this.style.color='#996633'">
      {$smarty.section.str.index}
    </a>
  </td>
{/if}
{/section}
</tr>
</table>
{/if}
<br />Suma wartości faktur brutto: {math equation="x" x=$sum_wart_brutto format="%.2f"} zł<br />
Suma zapłacona brutto:  {math equation="y" y=$sum_zaplacone format="%.2f"} zł

</body>
</html>


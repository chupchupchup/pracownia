<html>
<head>

  <script type="text/javascript" src="./js/sorttable.js"></script>

</head>
<body>

 {if $drukuj == "dzis"}
   <table>
       <a href="../protetyka/biuro/druk.php" target="_blank" style="font-weight:bold;font-size:14px;color:black;display:block;">
     <tr>
       <td>
         <a href="../protetyka/biuro/druk.php" target="_blank" style="font-weight:bold;font-size:14px;color:black;display:block;">
           <img src="../protetyka/gfx/printer.png" width="26" height="26" border="0" />
         </td></a>
       
       <td>
         <a href="../protetyka/biuro/druk.php" target="_blank" style="float:left;font-weight:bold;font-size:14px;color:black;display:block;">
           <i> < DRUKUJ ></i>
         </a>
       </td>
     </tr>
   </table>
 {/if}

<table cellspacing="1" cellpadding="1" class="sortable">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{section name=f loop=$tablica_wynikow}
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
<a style="color:white;" href="./biuro.php?strona=zlecenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&data={$tablica_wynikow[f][2]}&tabela={$tablica_wynikow[f][7]}&amp" target="_blank">
  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 6} <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {else}
      {/if}
  {assign var=v value=$v+1}
  {/foreach}
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][7]|truncate:40}&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][8]|truncate:40}&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][13]|truncate:40}&nbsp;</td>
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

 {if $drukuj == "dzis"}
   <table>
       <a href="../protetyka/biuro/druk.php" target="_blank" style="font-weight:bold;font-size:14px;color:black;display:block;">
     <tr>
       <td>
         <a href="../protetyka/biuro/druk.php" target="_blank" style="font-weight:bold;font<td>-size:14px;color:black;display:block;">
           <img src="../protetyka/gfx/printer.png" width="33" height="33" border="0" />
         </td></tr></a>
       
     
   </table>
 {/if}


</body>
</html>

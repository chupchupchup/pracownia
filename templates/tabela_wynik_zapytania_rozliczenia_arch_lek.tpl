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


 {if $drukuj == "rozlek"}
   <table>
       <a href="../protetyka/biuro/druk_roz_lek.php?lekarz={$lekarz}&suma={$suma_zl}&zaplacone={$suma_zaplacone}&pacjent={$pacjent}&datarozlicz={$datarozliczenia}" target="_blank" style="font-weight:bold;color:font-size:14px;color:black;display:block;">
     <tr>
       <td>
         <a href="../protetyka/biuro/druk_roz_lek.php?lekarz={$lekarz}&suma={$suma_zl}&zaplacone={$suma_zaplacone}&pacjent={$pacjent}&datarozlicz={$datarozliczenia}" target="_blank" style="font-weight:bold;color:font-size:14px;color:black;display:block;">
           <img src="../protetyka/gfx/printer.png" width="26" height="26" border="0" />
         </a>
       </td>
       <td>
         <a href="../protetyka/biuro/druk_roz_lek.php?lekarz={$lekarz}&suma={$suma_zl}&zaplacone={$suma_zaplacone}&pacjent={$pacjent}&datarozlicz={$datarozliczenia}" target="_blank" style="float:left;font-weight:bold;color:font-size:14px;color:black;display:block;">
           <i> < DRUKUJ ROZLICZENIE DLA LEKARZA></i>
         </a>
       </td>
     </tr>
   </table>
 {/if}

<table cellspacing="1" cellpadding="1">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{section name=f loop=$tablica_wynikow}
<a style="color:white;" href="./biuro.php?strona=rozliczenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&amp" target="_blank">
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 3} <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {elseif $v > 2 and $v < 5}
        <a href="javascript:displayWindow('./biuro/zaplacono_lek.php?nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&nr_rozliczenia={$tablica_wynikow[f][7]}&amp',500,300,'yes')" style="font-size:14px;color:black;display:block;text-decoration:none;">
          <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
        </a>
      {elseif $v > 4 and $v < 7}
       <a style="color:white;" href="./biuro.php?strona=rozliczenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&amp" target="_blank">
         <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
       </a>
      {else}
      {/if}
  {assign var=v value=$v+1}
  {/foreach}
        <td nowrap style="float:left;text-align:center;">
          <a href="javascript:displayWindow('./biuro/czyrozlicz_lek.php?nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&nr_rozliczenia={$tablica_wynikow[f][7]}&amp',500,300,'yes')" style="font-size:12px;color:black;display:block;text-decoration:none;">
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

//suma za zlecenia: {$suma_zl} z³<br />
//³±czniezap³acono: <b>{$suma_zaplacone} z³</b><br />
{assign var='roznica' value=$suma_zl-$suma_zaplacone }
ró¿nica = {$suma_zl} - {$suma_zaplacone} = {$roznica}
<br /><br />
<a href="./biuro.php?strona=rozliczenia&lekarz={$lekarz}&datarozliczenia={$datarozliczenia}&rozlicz=lek_anuluj&amp" style="font-weight:bold;color:font-size:14px;color:black;display:block;margin-left:20px;">
 < -- ANULUJ ROZLICZENIE -- >
</a>

</body>
</html>

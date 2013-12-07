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
           <i> < DRUKUJ ZESTAWIENIE DLA LEKARZA></i>
         </a>
       </td>
     </tr>
   </table>
 {/if}

<form name="form_faktury" method="post" action="./biuro.php">
<input name="strona" type="hidden" value="rozliczenia">
<input name="rozlicz" type="hidden" value="lek">
<input name="lekarz" type="hidden" value="{$lekarz}">
<table cellspacing="1" cellpadding="1">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{assign var=nr_zam value=0}
{section name=f loop=$tablica_wynikow}
<a style="color:white;" href="./biuro.php?strona=rozliczenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&amp" target="_blank">
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
    <td nowrap style>
      <input type="checkbox" name="nr_{$nr_zam}" value="{$tablica_wynikow[f][0]}" />
      <input type="hidden" name="zlec_poz_{$nr_zam}" value="{$tablica_wynikow[f][1]}" />
<!--      <input type="hidden" name="kontrahent_{$nr_zam}" value="{$tablica_wynikow[f][8]}" />
 -->  
    </td>
  {assign var=nr_zam value=$nr_zam+1}

  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 2} <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {elseif $v > 1 and $v < 3}
        <a href="javascript:displayWindow('./biuro/zaplacono_lek.php?nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&nr_rozl={$tablica_wynikow[f][7]}&kwota={$tablica_wynikow[f][2]}&amp',500,300,'yes')" style="font-size:14px;color:black;display:block;text-decoration:none;">
          <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
        </a>
      {elseif $v > 2 and $v < 7}
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
<br />

<br />
<!-- <a href="./biuro.php?strona=rozliczenia&lekarz={$lekarz}&rozlicz=lek&amp" style="margin-left:10px;font-weight:bold;color:font-size:14px;color:black;display:block;">
 < -- PRZENIE¦ ROZLICZENIE DO ARCHIWUM -- >
</a>
 -->
  <table style="margin-left:10px;width:90%;" border="0" cellpadding="8" cellspacing="0">
    <tr>
      <td style="width:300px;color:#ffffff;">
        <input value="Wyczysc" name="reset" type="reset" style="background:#C7C7FF;color:#998888;"/>
        <input value="Wygeneruj fakture" name="submit" type="submit" style="background:#CC0000;color:#ffffff;">
      </td>
    </tr>
  </table>

<input type="hidden" name="liczba_el_fv" value="{$nr_zam}" />
</form>

</body>
</html>

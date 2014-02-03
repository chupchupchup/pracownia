
<form name="form_faktury" method="post" action="./biuro.php?strona=faktury_lek_pop&amp">
<input type="submit" value="ZAPIS i WYDRUK FAKTURY" style="background:#CC0000;color:#ffffff;"/>

<input type="hidden" name="liczba_el_fv" value="{$liczba_el_fv}" />
<input type="hidden" name="kontrahent" value="{$kontrahent}" />
<input type="hidden" name="data_sprzeda¿y" value="{$data_sprzeda¿y}" />
<input type="hidden" name="nr_fv" value="{$nr_fv}" />

<div style="background-color:#ffffff; margin-left:80px; margin-top:20px; width:1000px; height:600px;" >
<div style="font-size:10px;float:right;margin-right:20px;"> Data sprzeda¿y: {$data_sprzedazy}</div>
<br />
<div style="font-size:26px;font-weight:bold;text-align:center;margin-top:20px;"> Faktura VAT nr {$nr_fv}</div>
<div style="font-size:12px;text-align:center;"> ORYGINA£ | KOPIA | DUPLIKAT</div>

<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">
<tr>
    <td style="font-weight:bold;font-size:18px;100px;text-align:right;">Sprzedawca:</td>
    <td>&nbsp;&nbsp;{$sprzedawca_nazwa}</td>
</tr>
<tr>
    <td style="font-size:13px;width:100px;text-align:right;">Adres:</td>
    <td style="font-size:13px;">&nbsp;&nbsp;{$sprzedawca_adres}</td>
</tr>
<tr>
    <td style="font-size:13px;width:100px;text-align:right;">NIP:</td>
    <td style="font-size:13px;">&nbsp;&nbsp;{$sprzedawca_nip}</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">
<tr>
    <td style="font-weight:bold;font-size:18px;width:100px;text-align:right;">Nabywca:</td>
    <td>&nbsp;&nbsp;{$kontrahent_nazwa}</td>
</tr>
<tr>
    <td style="font-size:13px;width:100px;text-align:right;">Adres:</td>
    <td style="font-size:13px;">&nbsp;&nbsp;{$kontrahent_adres}</td>
</tr>
<tr>
    <td style="font-size:13px;width:100px;text-align:right;">NIP:</td>
    <td style="font-size:13px;">&nbsp;&nbsp;{$kontrahent_nip}</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">
<tr>
    <td style="font-weight:bold;font-size:16px;width:120px;text-align:right;">Sposób zap³aty:</td>
    <td style="width:100px;">&nbsp;&nbsp;
      <select name="sposob_zaplaty" style="font-weight:bold;">
        <option selected>przelew</option>
        <option>gotówka</option>
      </select>
    </td>
    <td style="font-weight:normal;font-size:16px;width:90px;">termin zap³aty:</td>
    <td style="text-align:left;">&nbsp;&nbsp;
      <select name="termin_zaplaty" style="font-weight:bold;">
        <option selected>7</option>
        <option>0</option>
        <option>1</option>
        <option>3</option>
        <option>5</option>
        <option>14</option>
        <option>21</option>
      </select>
      <b>dni</b>
    </td>
</tr>
<tr>
    <td style="font-size:16px;width:100px;text-align:right;">BANK:</td>
    <td style="font-size:16px;" colspan="3">&nbsp;&nbsp;MBank nr konta: 22 1140 2004 0000 3102 4204 0720</td>
</tr>
</table>

<table cellspacing="0" cellpadding="4" border="1" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">

<tr style="margin-left:0px;margin-bottom:0px;height:22px;width:1000px;color:#000000;">
  {foreach key=key item=item from=$tablica_opisy}
    <th style="height:25px;width:{$item}px;text-align:center;color:#000000;" nowrap><b>{$key}</b></th>
  {/foreach}
</tr>

{assign var=v value=1}
{section name=f loop=$tab_el_fv}
<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:1000px;">

    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;{$v}
    </td>
    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;{$tab_el_fv[f][0]}&nbsp;
    </td>
    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;{$tab_el_fv[f][1]|truncate:400}&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;{$tab_el_fv[f][2]}&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;szt.
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x" x=$tab_el_fv[f][3] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;22&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x*y" x=$tab_el_fv[f][3] y=$tab_el_fv[f][2] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x*y*z" x=$tab_el_fv[f][2] y=$tab_el_fv[f][3] z=0.22 format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x*y*z" x=$tab_el_fv[f][2] y=$tab_el_fv[f][3]  z=1.22 format="%.2f"}&nbsp;
    </td>

  {assign var=v value=$v+1}

</tr>
{/section}
<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:1000px;">
     <td style="text-align:right;font-size:14px;font-weight:bold;" colspan="7">
        &nbsp;SUMA
    </td>
    <td nowrap style="text-align:right;font-size:14px;font-weight:bold;">
        &nbsp;{math equation="x" x=$tab_suma[0] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;font-weight:bold;">
        &nbsp;{math equation="x" x=$tab_suma[1] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;font-weight:bold;">
        &nbsp;{math equation="x" x=$tab_suma[2] format="%.2f"}&nbsp;
    </td>
</tr>

</table>

<table cellspacing="1" cellpadding="1" style="width:1000px;background-color: #ffffff;margin-top:10px;">
  <tr style="height:50px; width:1000px;">
    <td>
      <u><b style="font-size:18px;margin-left:50px;"> DO ZAP£ATY: {math equation="x" x=$tab_suma[2] format="%.2f"} z³</b></u>
    </td>
  </tr>
</table>

<!-- <table border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="width:1000px;background-color: #ffffff;">
<tr style="height:100px;">
    <td style="width:200px;">&nbsp;</td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:150px;">&nbsp;</td>
</tr>
<tr style="">
    <td style="width:200px;"><hr style="color:#000000;margin-left:50px;width:150px;"/></td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:150px;"><hr style="color:#000000;margin-right:100px;"/></td>
</tr>
<tr style="height:10px;font-size:12px;">
    <td style="width:200px;">&nbsp;&nbsp;<i style="margin-left:50px;">podpis osoby upowa¿nionej </i><br />&nbsp;&nbsp;<i style="margin-left:50px;">do odbioru faktury VAT</i></td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:150px;">&nbsp;&nbsp;<i style="margin-right:100px;">podpis osoby upowa¿nionej </i><br />&nbsp;&nbsp;<i style="margin-right:100px;">do wystawienia faktury VAT</i></td>
</tr>
</table>
 -->
<div style="background-color: #ffffff;width:1000px;height:20px;">
&nbsp;</div>

</form>
</body>
</html>

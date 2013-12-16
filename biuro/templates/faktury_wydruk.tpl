<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
<body style="margin-top:0px;margin-left:0px;" onload="window.print();window.close();">     

<div style="background-color: #ffffff;margin-left:80px;margin-top:20px;width:1000px;height:600px;">
<div style="font-size;10px;float:right;margin-right:22px;"> Data sprzedaży: {$data_faktury}</div>
<div style="font-size;10px;float:right;margin-right:22px;"> Data wystawienia: {$data_wystawienia}</div>
<br /><br /><br />
<div style="font-size:30px;font-weight:bold;text-align:center;margin-top:20px;"> Faktura VAT nr {$nr_fv}</div>
<div style="font-size:16px;text-align:center;"> ORYGINAŁ | KOPIA | DUPLIKAT</div>

<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:40px;">
<tr>
    <td style="font-weight:bold;font-size:22px;width:120px;text-align:right;">Sprzedawca:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;{$sprzedawca_nazwa}</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">Adres:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;{$sprzedawca_adres}</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">NIP:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;{$sprzedawca_nip}</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:40px;">
<tr>
    <td style="font-weight:bold;font-size:22px;width:120px;text-align:right;">Nabywca:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;{$kontrahent_nazwa}</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">Adres:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;{$kontrahent_adres}</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">NIP:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;{$kontrahent_nip}</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">
<tr>
    <td style="font-weight:normal;font-size:18px;width:122px;text-align:right;" nowrap>Sposób zapłaty:</td>
    <td style="font-size:18px; width:100px;">&nbsp;&nbsp;<b>{$sposob_zaplaty}</b></td>
    <td style="font-weight:normal;font-size:18px;width:200px;" nowrap>termin zapłaty:&nbsp;&nbsp;<b>{$termin_zaplaty} dni</b></td>
</tr>
<tr>
    <td style="font-size:18px;width:122px;text-align:right; line-height:50px;">BANK:</td>
    <td style="font-size:18px; font-weight:bold;" colspan="3">&nbsp;&nbsp;{$konto_bankowe}</td>
</tr>
</table>

<table cellspacing="0" cellpadding="4" border="1" frame="void" style="width:100%;background-color: #ffffff;margin-left:10px;margin-top:55px;">

<tr style="margin-left:0px;margin-bottom:0px;height:22px;width:1000px;color:#000000;">
  {foreach key=key item=item from=$tablica_opisy}
    <th style="height:25px;width:{$item}px;text-align:center;color:#000000;" nowrap><b>{$key}</b></th>
  {/foreach}
</tr>

{assign var=v value=1}
{section name=f loop=$tab_el_fv}
<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px; margin-right:10px; height:22px; width:1000px;">

    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;{$v}
    </td>
<!--     <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;{$tab_el_fv[f][0]}&nbsp;
    </td>
 -->    <td style="text-align:left;font-size:14px;">
        &nbsp;{$tab_el_fv[f][1]}&nbsp;
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
        &nbsp;ZW&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x*y" x=$tab_el_fv[f][3] y=$tab_el_fv[f][2] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        <!-- &nbsp;{math equation="x*y*z" x=$tab_el_fv[f][2] y=$tab_el_fv[f][3] z=0.22 format="%.2f"}&nbsp; -->
        &nbsp;0.00&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x*y" x=$tab_el_fv[f][2] y=$tab_el_fv[f][3]  format="%.2f"}&nbsp;
    </td>

  {assign var=v value=$v+1}

</tr>
{/section}
<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:1000px;">
     <td style="text-align:right;font-size:14px;font-weight:bold;" colspan="6">
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

<table cellspacing="1" cellpadding="1" style="width:1000px;background-color: #ffffff;margin-top:30px;">
  <tr style="height:50px; width:1000px;">
    <td>
      <u><b style="font-size:22px;margin-left:10px;"> DO ZAPŁATY: {math equation="x" x=$tab_suma[2] format="%.2f"} zł</b></u>
    </td>
  </tr>
</table>

<table cellspacing="1" cellpadding="1" style="width:1000px;background-color: #ffffff;margin-top:30px; margin-left:30px;">
  <tr style="height:50px; width:1000px;">
    <td>
      Zwolnione z podatku VAT na podstawie art. 43 ust. 1 pkt 14 ustawy z dnia 11 marca 2004 r.( Dz. U. Nr 54,poz. 535 z późn. zm.)
    </td>
  </tr>
</table>
                           <!-- #CCFFCC -->
<table border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="width:1000px;background-color: #ffffff; margin-top: 100px;">
<!-- <tr style="height:100px;">
    <td style="width:200px;">&nbsp;</td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:150px;">&nbsp;</td>
</tr>
<tr style>
    <td style="width:200px;"><hr style="color:#000000;margin-left:50px;width:200px;"/></td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:170px;"><hr style="color:#000000;margin-right:50px;"/></td>
</tr>
 -->
<tr style="font-size:14px;">
    <td style="width:200px;"><hr style="color:#000000;width:200px;"/></td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:170px;"><hr style="color:#000000;width:200px;"/></i></td>
</tr>
<tr style="font-size:14px;">
    <td style="width:200px;">podpis osoby upoważnionej do odbioru faktury VAT</td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:170px;">podpis osoby upoważnionej do wystawienia faktury VAT</td>
</tr>
</table>

<div style="background-color: #ffffff;width:1000px;height:20px;">
&nbsp;</div>
<!-- </form>
 -->
</body>
</html>

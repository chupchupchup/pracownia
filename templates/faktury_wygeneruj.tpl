<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
{literal}
{/literal}

</head>
<body>

<form name="form_faktury" method="post" action="./biuro.php?strona=faktury_lek_pop&amp">
<input type="submit" value="ZAPIS i WYDRUK FAKTURY" style="background:#CC0000;color:#ffffff;"/>

<input type="hidden" name="liczba_el_fv" value="{$liczba_el_fv}" />
<input type="hidden" name="kontrahent" value="{$kontrahent}" />
<!-- <input type="hidden" name="data_sprzedazy" value="{$data_sprzedazy}" /> -->
<input type="hidden" name="nr_fv" value="{$nr_fv}" />

<div style="background-color:#ffffff; margin-left:80px; margin-top:20px; width:1000px; height:600px;" >
<div style="font-size:10px;float:right;margin-right:20px;"> Data sprzedaży: <input name="data_faktury" type="text" value="{$data_sprzedazy}" style=" width:80px;"></div>
<div style="font-size:10px;float:right;margin-right:20px;"> Data sprzedaży: <input name="data_wystawienia" type="text" value="{$data_wystawienia}" style=" width:80px;"></div>
<br />
<div style="font-size:26px;font-weight:bold;text-align:center;margin-top:20px;"> 
    Faktura VAT Miesiac-  <select name="fv_miesiac" style="font-weight:bold;">
                         <option {if $akt_mies==01}selected{/if}>01</option>
                         <option {if $akt_mies==02}selected{/if}>02</option>
                         <option {if $akt_mies==03}selected{/if}>03</option>
                         <option {if $akt_mies==04}selected{/if}>04</option>
                         <option {if $akt_mies==05}selected{/if}>05</option>
                         <option {if $akt_mies==06}selected{/if}>06</option>
                         <option {if $akt_mies==07}selected{/if}>07</option>
                         <option {if $akt_mies==08}selected{/if}>08</option>
                         <option {if $akt_mies==09}selected{/if}>09</option>
                         <option {if $akt_mies==10}selected{/if}>10</option>
                         <option {if $akt_mies==11}selected{/if}>11</option>
                         <option {if $akt_mies==12}selected{/if}>12</option>
                       </select> 
					/ Rok-<select name="fv_rok" style="font-weight:bold;">
                         <option {if $akt_rok==2009}selected{/if}>2009</option>
                         <option {if $akt_rok==2010}selected{/if}>2010</option>
                         <option {if $akt_rok==2011}selected{/if}>2011</option>
                         <option {if $akt_rok==2012}selected{/if}>2012</option>
                         <option {if $akt_rok==2013}selected{/if}>2013</option>
                         <option {if $akt_rok==2014}selected{/if}>2014</option>
                         <option {if $akt_rok==2015}selected{/if}>2015</option>
                         <option {if $akt_rok==2016}selected{/if}>2016</option>
                         <option {if $akt_rok==2017}selected{/if}>2017</option>
                         <option {if $akt_rok==2018}selected{/if}>2018</option>
                         <option {if $akt_rok==2019}selected{/if}>2019</option>
                         <option {if $akt_rok==2020}selected{/if}>2020</option>
                       </select> 
<input name="czy_wystawic_fakture" type="checkbox" value="nie">
</div>
<div style="font-size:12px;text-align:center;"> ORYGINAŁ | KOPIA | DUPLIKAT</div>

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
{literal}
<script src="javascript">
    function invoice_payment_change(el) {
        tgt = document.getElementById('termin_zaplaty');
        l = tgt.options.length;
        exists = false;
        while (l) {
            if (tgt.options[--l].value=='-1') {
                exists = true;
                break;
            }
        }
        if (el.value=='gotówka') {
            if (!exists) {
                var o = document.createElement('option');
                o.value = -1;
                o.text = "zapłacono";
                tgt.add(o);
            }
        } else {
            tgt.remove(l);
        }
    }
</script>
{/literal}
<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">
<tr>
    <td style="font-weight:bold;font-size:16px;width:120px;text-align:right;">Sposób zapłaty:</td>
    <td style="width:100px;">&nbsp;&nbsp;
      <select name="sposob_zaplaty" style="font-weight:bold;" onChange="invoice_payment_change(this);">
        <option value="przelew" selected>przelew</option>
        <option value="gotówka">gotówka</option>
      </select>
    </td>
    <td style="font-weight:normal;font-size:16px;width:90px;">termin zapłaty:</td>
    <td style="text-align:left;">&nbsp;&nbsp;
      <select name="termin_zaplaty" style="font-weight:bold;">
        <option>0</option>
        <option>1</option>
        <option>3</option>
        <option>5</option>
        <option selected>7</option>
        <option>14</option>
        <option>21</option>
      </select>
      <b>dni</b>
    </td>
</tr>
<tr>
    <td style="font-size:16px;width:100px;text-align:right;">BANK:</td>
    <td style="font-size:16px;" colspan="3">&nbsp;&nbsp;
      <select name="konto_bankowe" style="font-weight:bold;">
        <option selected>Bank Millenium S.A.: 80 1160 2202 0000 0000 5069 9227</option>
        <option>Bank Millenium S.A.: BIGBPLPW 74 1160 2202 0000 0000 6299 3018</option>
      </select>
	</td>
</tr>
</table>

<table cellspacing="0" cellpadding="4" border="1" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">

<tr style="margin-left:0px;margin-bottom:0px;height:22px;width:1000px;color:#000000;">
  {foreach key=key item=item from=$tablica_opisy}
    <th style="height:25px;width:{$item}px;text-align:center;color:#000000;" nowrap><b>{$key}</b></th>
  {/foreach}
</tr>

<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:100%;">
    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;1
    </td>
    <td style="text-align:left;font-size:14px;" width="500px" >
        &nbsp;Prace protetyczne.&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;1&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;szt.
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x" x=$tab_suma[0] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;ZW&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x" x=$tab_suma[0] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x" x=$tab_suma[1] format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x" x=$tab_suma[2] format="%.2f"}&nbsp;
    </td>
</tr>

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

<table cellspacing="1" cellpadding="1" style="width:1000px;background-color: #ffffff;margin-top:10px;">
  <tr style="height:50px; width:1000px;">
    <td>
      <u><b style="font-size:18px;margin-left:50px;"> DO ZAPŁATY: {math equation="x" x=$tab_suma[2] format="%.2f"} zł</b></u>
    </td>
  </tr>
</table>
<table cellspacing="1" cellpadding="1" style="width:1000px;background-color: #ffffff;margin-top:10px;">
  <tr style="height:50px; width:1000px;">
    <td>
      <b style="font-size:18px;margin-left:50px;"> UWAGI: </b>
    </td>
    <td>
	  <textarea name="uwagi_fv" cols="100" rows="5" style="background-color:#F0F0F0;" ></textarea>
    </td>
  </tr>
</table>

<br /><hr >

<div style="background-color: #ffffff;margin-left:80px;margin-top:20px;width:1000px;height:600px;">

<div style="font-size:30px;font-weight:bold;text-align:center;margin-top:20px;"> Specyfikacja do faktury VAT nr {$nr_fv}</div>

<table cellspacing="0" cellpadding="4" border="1" frame="void" style="width:100%;background-color: #ffffff;margin-left:10px;margin-top:55px;">

<tr style="margin-left:0px;margin-bottom:0px;height:22px;width:1000px;color:#000000;">
  {foreach key=key item=item from=$tablica_opisy}
    <th style="height:25px;width:{$item}px;text-align:center;color:#000000;" nowrap><b>{$key}</b></th>
  {/foreach}
</tr>

{assign var=v value=1}
{section name=f loop=$tab_el_fv}
<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:100%;">

    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;{$v}
    </td>
<!--     <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;{$tab_el_fv[f][0]}&nbsp;
    </td>
 -->    <td style="text-align:left;font-size:14px;" width="500px" >
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
        &nbsp;{math equation="x*y*z" x=$tab_el_fv[f][2] y=$tab_el_fv[f][3] z=0 format="%.2f"}&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;{math equation="x*y*z" x=$tab_el_fv[f][2] y=$tab_el_fv[f][3]  z=1 format="%.2f"}&nbsp;
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

</div>

</form>
</body>
</html>

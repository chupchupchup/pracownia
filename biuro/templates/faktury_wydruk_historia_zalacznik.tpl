<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
<body style="margin-top:0px;margin-left:0px;">

<div style="background-color: #ffffff;margin-left:80px;margin-top:20px;width:1000px;height:600px;">

<br /><br /><br />
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

</body>
</html>

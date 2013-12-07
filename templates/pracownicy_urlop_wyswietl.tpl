<html>
<head>

{literal}

  <script type="text/javascript" src="./js/sorttable.js"></script>

<style type="text/css">
.inputfr {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #E5E5FF; border: 1px #0066CC outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; 		
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

.inputf {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #FFFFE6; border: 1px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

form {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; text-decoration: none;
	border: 0px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}
.tab {
        font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; text-decoration: none;
}

</style>
{/literal}

</head>

<body topmargin="0">
aaa<br />
  <table cellspacing="1" cellpadding="1" width="568px">
  {section name=f loop=$tablica_wynikow_urlop}

    <tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:558px;">
      <a style="color:white;" href="./biuro.php?strona=glowna&wpis=edycja_urlop&pracownikid={$tablica_wynikow_urlop[f][1]}&pracownicy_urlop_id={$tablica_wynikow_urlop[f][0]}&amp" target="_self">
        <td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow_urlop[f][4]|truncate:40} r. &nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">data: {$tablica_wynikow_urlop[f][2]|truncate:40} - {$tablica_wynikow_urlop[f][3]|truncate:40}&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">ogólem  - {$tablica_wynikow_urlop[f][5]|truncate:40}&nbsp;</td>
        <td nowrap style="float:left;text-align:center;font-size:12px;">pozostalo  -&nbsp;{$tablica_wynikow_urlop[f][6]|truncate:40}&nbsp;</td>
      </a>
    </tr>

  {/section}
  </table>
  
</body>
</html>

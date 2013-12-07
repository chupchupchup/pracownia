<html>
<head>
	<link rel="stylesheet" href="./css/crm.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
</head>

<body id="{$ID}" bgcolor="#F2F4FF" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<div style="background:#B3B3FF;width=100%;height:40px;margin:0px 0px 0px 0px;" >

</div>

<div style="margin:0px 0px 0px 0px;">

<table bgcolor="#F2F4FF" style="background-image:url(gfx/tbl_header.png);background-repeat: repeat-x; height:22px;width:100%;margin:0px 0px 0px 0px;">
<tr style="height:22px;margin:0px 0px 0px 0px;">
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;"><div style="width:100px;">&nbsp;</div></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:100px;text-align:center;color:#FFCC00;" href="./biuro.php?strona=glowna&amp">GŁÓWNA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><div style="width:100px;">&nbsp;</div></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:100px;text-align:center;color:white;" href="./biuro.php?strona=zlecenia&amp">ZLECENIA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:150px;text-align:center;color:white;" href="./biuro.php?strona=rozliczenia&amp">ROZLICZENIA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;"><a style="width:100px;text-align:center;color:white;" href="./biuro.php?strona=magazyn&amp">MAGAZYN</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;" width="100%"><a style="float:right;color:white;margin-right:10px;" href="./wyloguj.php">[WYLOGUJ]: <b style="color:#FFC5C5;">{$log}</b></a></td>
</tr>
</table>

<div>
{include file="menu_lewo.tpl"}

<div style="margin-top:30px;margin-left:10px;position:absolute;">
 {if $sub == "tak"}
    {include file="$plik"}
 {/if}
</div>
</div>

</div>
</body>
</html>


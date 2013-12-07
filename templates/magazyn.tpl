<html>
<head>
<link rel="stylesheet" href="./css/crm.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
{literal}
    <!-- compliance patch for microsoft browsers -->
    <!--[if lt IE 7]>
        <script src="/ie7/ie7-standard-p.js" type="text/javascript">
            IE7_PNG_SUFFIX = '.png';
        </script>

    <![endif]-->

<style type="text/css">

div#menu_lewo
{
    float:left;
    margin-top:0px;
    margin-left:0px;
}

div#menu_lewo a {
    background: transparent url('gfx/listwa_menu_boczne1_ext.png') no-repeat ;
}

div#menu_lewo a:hover,
body#dodaj a#menu1,
body#wyszukaj a#menu2,
body#do_zamowienia a#menu3,
body#wyszukaj_podmagazyn a#menu4,
{
    background: transparent url('gfx/listwa_menu_boczne1_2_ext.png') no-repeat scroll top;
}

</style>
{/literal}
</head>
<body id="{$ID}" bgcolor="#F2F4FF" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<div style="margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:0px;">

<div style="height:40px;background:#B3B3FF;margin-top:0px;">
</div>

<table bgcolor="#F2F4FF" style="background-image:url(gfx/tbl_header.png);background-repeat: repeat-x; height:22px;width:100%;margin:0px 0px 0px 0px;">
<tr style="height:22px;margin:0px 0px 0px 0px;">
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;"><div style="width:100px;">&nbsp;</div></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:100px;text-align:center;color:white;" href="./biuro.php?strona=glowna&amp">GŁÓWNA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><div style="width:100px;">&nbsp;</div></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:100px;text-align:center;color:white;" href="./biuro.php?strona=zlecenia&amp">ZLECENIA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:150px;text-align:center;color:white;" href="./biuro.php?strona=rozliczenia&amp">ROZLICZENIA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;"><a style="width:100px;text-align:center;color:#FFCC00;" href="./biuro.php?strona=magazyn&amp">MAGAZYN</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;" width="100%"><a style="float:right;color:white;margin-right:10px;" href="./wyloguj.php">[WYLOGUJ]: <b style="color:#FFC5C5;">{$log}</b></a></td>
</tr>
</table>

<div>
<div id="menu_lewo">
   <br />

   <a id="menu1" href="./biuro.php?strona=magazyn&wpis=dodaj&amp" style="font-size:14px;margin-top:-18px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:52px;">
     <div style="font-size:13px;margin-top:20px;margin-left:20px;color:black;"> <b>DODAJ <img src="./gfx/b_lastpage.png" width="16" height="12" border="0"></b></div>
   </a>
   <a id="menu2" href="./biuro.php?strona=magazyn&wpis=wyszukaj&amp" style="font-size:14px;margin-top:1px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:51px;">
     <div style="font-size:13px;margin-top:10px;margin-left:10px;color:black;"><b> WYSZUKAJ <br><b style="font-size:11px;">- MAGAZYN&nbsp;&nbsp;</b> <img src="./gfx/b_lastpage.png" style width="16" height="12" border="0"></b></div>
   </a>
   <a id="menu3" href="./biuro.php?strona=magazyn&wpis=do_zamowienia&amp" style="font-size:14px;margin-top:1px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:51px;">
     <div style="font-size:13px;margin-top:8px;margin-left:10px;color:black;"><b> DO <br>ZAMÓWIENIA <img src="./gfx/b_lastpage.png" style width="16" height="12" border="0"></b></div>
   </a>
   <a id="menu4" href="./biuro.php?strona=magazyn&wpis=wyszukaj_podmagazyn&amp" style="font-size:14px;margin-top:1px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:51px;">
     <div style="font-size:13px;margin-top:8px;margin-left:10px;color:black;"><b> WYSZUKAJ <br><b style="font-size:11px;">- PODMAGAZYN</b> <img src="./gfx/b_lastpage.png" style width="16" height="12" border="0"></b></div>
   </a>
</div>

<div style="margin-top:30px;margin-left:20px;position:absolute;">
 {if $sub == "tak"}
    {include file="$plik"}
 {/if}
</div>


</div>
</body>
</html>

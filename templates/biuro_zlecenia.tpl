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
body#wtrakcie a#menu1,
body#dzisiaj a#menu2,
body#wyslane a#menu3,
body#wyszukaj a#menu4,
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

<table style="background-image:url(gfx/tbl_header.png);background-repeat: repeat-x; height:22px;width:100%;margin:0px 0px 0px 0px;">
<tr style="height:22px;margin:0px 0px 0px 0px;">
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;"><div style="width:100px;">&nbsp;</div></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:100px;text-align:center;color:white;" href="./biuro.php?strona=glowna&amp">GŁÓWNA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><div style="width:100px;">&nbsp;</div></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:100px;text-align:center;color:#FFCC00;" href="./biuro.php?strona=zlecenia&amp">ZLECENIA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 1px 0px 0;"><a style="width:150px;text-align:center;color:white;" href="./biuro.php?strona=rozliczenia&amp">ROZLICZENIA</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;"><a style="width:100px;text-align:center;color:white;" href="./biuro.php?strona=magazyn&amp">MAGAZYN</a></td>
  <td style="border: solid 0px #a2a2a2;padding: 1px;border-width: 0 0px 0px 0;" width="100%"><a style="float:right;color:white;margin-right:10px;" href="./wyloguj.php">[WYLOGUJ]: <b style="color:#FFC5C5;">{$log}</b></a></td>
</tr>
</table>

<div>
<div id="menu_lewo">
   <br />
   <a id="menu1" href="./biuro.php?strona=zlecenia&wpis=new&amp" style="font-size:14px;margin-top:-18px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:52px;">
     <div style="font-size:13px;margin-top:10px;margin-left:10px;color:black;"><b> W TRAKCIE <br>REALIZACJI <img src="./gfx/b_lastpage.png" width="16" height="12" border="0"></b></div>
   </a>
   <a id="menu2" href="./biuro.php?strona=zlecenia&data=dzis&amp" style="font-size:14px;margin-top:1px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:52px;">
     <div style="font-size:13px;margin-top:20px;margin-left:10px;color:black;"><b> NA DZISIAJ <img src="./gfx/b_lastpage.png" width="16" height="12" border="0"></b></div>
   </a>
   <a id="menu3" href="./biuro.php?strona=zlecenia&wpis=out&amp" style="font-size:14px;margin-top:1px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:52px;">
     <div style="font-size:13px;margin-top:20px;margin-left:10px;color:black;"><b> WYSŁANE <img src="./gfx/b_lastpage.png" width="16" height="12" border="0"></b></div>
   </a>
   <a id="menu4" href="./biuro.php?strona=zlecenia&wpis=szukaj&amp" style="font-size:14px;margin-top:1px;margin-left:0px;color:black;display:block;text-decoration:none;width:120px;height:51px;">
     <div style="font-size:13px;margin-top:20px;margin-left:10px;color:black;"><b> WYSZUKAJ <img src="./gfx/b_lastpage.png" style width="16" height="12" border="0"></b></div>
   </a>

<!-- <table cellspacing="1" cellpadding="1" style="margin-left:0px;margin-top:30px;width:120px;">
<tr style=" background-image:url(gfx/listwa_menu_boczne1_ext.png);margin-left:10px;margin-top:0px;height:50px;width:120px;">
  <td style="float:left;height:25px;width:120px;text-align:center;" nowrap><b>AAAAAAAAAAA BBBBBBB</b></td>
  <td></td>
</tr>
</table>
 -->
</div>

<div style="margin-top:30px;margin-left:20px;position:absolute;">
 {if $sub == "tak"}
    {include file="$plik"}
 {/if}

<!--  {if $ifrm == "tak"}
   <iframe src="{$plik}" style="width:900px;height:600px;border:0px;" frameborder="0">
   </iframe>
 {/if}
 -->
</div>
</div>

</div>
</body>
</html>

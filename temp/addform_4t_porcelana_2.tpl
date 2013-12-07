<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />
  <script type="text/javascript" src="js/kolornik.js"></script>

        <!-- compliance patch for microsoft browsers -->
        <!--[if lt IE 7]>
            <link rel='stylesheet' type='text/css' href='tabs-ie.css' />
            <script src="./ie7/ie7-standard-p.js" type="text/javascript"></script>
        <![endif]-->
</head>
<body id="2">

{literal}
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:60px;width:90px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
tr#zab input{
	height:45px;width:45px;
}
tr#material input{
	height:45px;width:45px;
}
div#newsel select{
	height:40px;width:150px;
	font-size:20px;
}

</style>
{/literal}

        <ul id="tabs">
            <li id="tab1"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=1"><span>Wkłady <br />K-K</span></a></div></div></li>
            <li id="tab2"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=2"><span>Korona licowana</span></a></div></div></li>
            <li id="tab3"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=3"><span>Korona pełnoceramiczna</span></a></div></div></li>
            <li id="tab4"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=4"><span>Inlay /<br />Onlay</span></a></div></div></li>
            <li id="tab5"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=5"><span>Implanty<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab6"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=6"><span>Praca kombinowana</span></a></div></div></li>
            <li id="tab7"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=7"><span>Korony inne<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab8"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=8"><span>Porcelana naprawa&nbsp;&nbsp;</span></a></div></div></li>
        </ul>

        <div id="iframe">
   <br />

<div align="center" style="margin-top:0px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij">COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_3i.php">
</form>
</div>

<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">
<hr style="width:100%;"/>

<b style="font-size:16px;">MATERIAŁ:</b>
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="radio" name="material" value="chrom kobalt" /></td> 
   <td> - CHROM KOBALT</td> 
   <td><input type="radio" name="material" value="chrom nikiel" /></td> 
   <td> - CHROM NIKIEL</td> 
   <td><input type="radio" name="material" value="złoto" /></td> 
   <td> - ZŁOTO</td> 
   <td><input type="radio" name="material" value="cerkon" /></td> 
   <td> - CERKON</td> 
  </tr>
</table>  

<hr style="width:100%;"/>

<b style="font-size:16px;">RODZAJ KOLORNIKA:</b>
<br /><br />
   <table border="0" style="font-size:16px;width:85%;">
      <tr>
       <td> <input type="radio" style="height:45px;width:45px;" name="kolornik" id="vita" value="vita" /></td> 
       <td> - VITA</td>
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="kolornik" id="mifam" value="mifam" /></td>
       <td> - MIFAM</td> 
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="kolornik" id="wiedent" value="wiedent" /></td>
       <td> - WIEDENT</td> 
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="kolornik" id="ivoclar" value="ivoclar" /></td>
       <td> - IVOCLAR</td> 
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="kolornik" id="wiedentvita" value="wiedentvita" /></td>
       <td> - WIEDENT VITA</td> 
		</tr>
   </table>
   <br />
   <div id="newsel">
	</div>
   
<hr style="width:100%;"/>

<b style="font-size:16px;">OPCJE:</b>
<br /><br />
   <table border="0" style="font-size:16px;width:60%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="lyzka" value="łyżka" /></td>
       <td> - ŁYŻKA</td>
       <td>&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="wzornik" value="wzornik" /></td>
       <td> - WZORNIK</td>
       <td>&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="metal" value="metal" /></td>
       <td> - METAL</td>
       <td>&nbsp;</td>
      </tr>
   </table>

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:40%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="surowa" value="surowa" /></td>
       <td> - SUROWA</td>
       <td>&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="gotowa" value="gotowa" /></td>
       <td> - GOTOWA</td>
       <td>&nbsp;</td>
      </tr>
   </table>

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:80%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="powt_metalu" value="powtórka metalu" /></td>
       <td> - POWTÓRKA METALU</td>
       <td>&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="ponowne_nap_porcel" value="ponowne napalenie porcelany" /></td>
       <td> - PONOWNE NAPALENIE PORCELANY</td>
       <td>&nbsp;</td>
      </tr>
   </table>

<hr style="width:100%;"/>
{include file="wybor_zebow.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-82px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4i_porcelana_2.php">
  <input type="hidden" name="strona" value="zlecenia_add/addform_5i.php">
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

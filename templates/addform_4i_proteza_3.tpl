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
<body id="3">

{literal}
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:60px;width:90px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
tr#zab input{
	height:50px;width:50px;
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
            <li id="tab1"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=1"><span>Szkielet /<br />Szynoproteza&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab2"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=2"><span>Całkowita<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab3"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=3"><span>Częściowa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab4"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=4"><span>Szyny<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab5"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=5"><span>Naprawa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab6"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=6"><span>Prace<br />Pomocnicze</span></a></div></div></li>
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

<b style="font-size:16px;">RODZAJ:</b>
<table cellspacing="0" cellpadding="0" border="0" style="width:85%;">
  <tr id="material">
   <td><input type="radio" name="proteza" value="proteza standardowa" /></td>
   <td> - PROTEZA STANDARDOWA </td>
   <td><input type="radio" name="proteza" value="proteza w artykulatorze" /></td>
   <td> - W ARTYKULATORZE&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="radio" name="proteza" value="proteza w systemie iniekcyjnym" /></td>
   <td> - W SYSTEMIE INIEKCYJNYM</td>
  </tr>
  <tr id="material">
   <td><input type="radio" name="proteza" value="mikroproteza" /></td>
   <td> - MIKROPROTEZA</td>
   <td>
	  <select name="liczba_proteza" style="height:40px;width:70px;font-size:20px;">
	    <option value>  </option>
	    <option value="1"> 1 </option>
	    <option value="2"> 2 </option>
          </select>
   </td>
   <td> - ILOŚĆ PROTEZ</td>
  </tr>
</table>

<hr style="width:100%;"/>

<b style="font-size:16px;">ETAP:</b>
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="lyzka" value="łyżka indywidualna" /></td>
   <td> - ŁYŻKA INDYWIDUALNA</td>
   <td><input type="checkbox" name="wzornik" value="wzornik" /></td>
   <td> - WZORNIK</td>
   <td><input type="radio" name="etap" value="ustawka" /></td>
   <td> - USTAWKA</td>
   <td><input type="radio" name="etap" value="gotowa" /></td>
   <td> - GOTOWA</td>
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
<table cellspacing="0" cellpadding="0" border="0" style="width:50%;">
  <tr id="material">
   <td><input type="checkbox" name="klamralana" value="klamra lana" /></td>
   <td> - KLAMRA LANA</td>
   <td><input type="checkbox" name="ciern" value="cierń lany" /></td>
   <td> - CIERŃ LANY</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:65%;">
  <tr id="material">
   <td><input type="checkbox" name="wzmocnienie" value="wzmocnienie siatką / drutem" /></td>
   <td> - WZMOCNIENIE SIATKĄ / DRUTEM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="miekkie_podniebienie" value="miękkie podniebienie" /></td>
   <td> - MIĘKKIE PODNIEBIENIE</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:60%;">
  <tr id="material">
   <td><input type="checkbox" name="ponowne_ust_zebow" value="ponowne ustawienie zębów" /></td>
   <td> - PONOWNE USTAWIENIE ZĘBÓW</td>
   <td><input type="checkbox" name="poprawka" value="poprawka" /></td>
   <td> - POPRAWKA</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:60%;">
  <tr id="material">
   <td><input type="checkbox" name="belka" value="belka" /></td>
   <td> - BELKA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="zeby_ivoclar" value="zęby ivoclar" /></td>
   <td> - ZĘBY IVOCLAR</td>
   <td>
	  <select name="liczba_zeby_ivoclar" style="height:40px;width:70px;font-size:20px;">
	    <option value>  </option>
	    <option value="1"> 1 </option>
	    <option value="2"> 2 </option>
          </select>
   </td>
   <td> - ILOŚĆ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>
<hr style="width:100%;"/>

<!-- {include file="wybor_zebow.tpl"}
 -->

  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4i_proteza_3.php">
  <input type="hidden" name="strona" value="zlecenia_add/addform_5i.php">
</form>
</div>
<!--             <iframe src='http://www.google.com' frameborder='0' marginheight='0' marginwidth='0'></iframe>
 -->
        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

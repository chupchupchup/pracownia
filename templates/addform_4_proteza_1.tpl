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
<body id="1">

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
            <li id="tab1"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=1"><span>Szkielet /<br /> Szynoproteza&nbsp;</span></a></div></div></li>
            <li id="tab2"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=2"><span>Ca�kowita<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab3"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=3"><span>Cz�ciowa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab4"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=4"><span>Szyny<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab5"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=5"><span>Naprawa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab6"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=6"><span>Prace<br />Pomocnicze</span></a></div></div></li>
        </ul>

        <div id="iframe">
   <br />

<div align="center" style="margin-top:0px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij">COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_3.php">
</form>
</div>

<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">

<hr style="width:100%;"/>

<b style="font-size:16px;">RODZAJ:</b>
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material" style="height:60px;">
   <td><input type="radio" name="proteza" value="szkieletowa" /></td>
   <td> - SZKIELETOWA</td>
   <td><input type="radio" name="proteza" value="szkieletowa na zasuwach" /></td>
   <td> - SZKIELETOWA NA &nbsp;&nbsp;ZASUWACH</td>
   <td><input type="radio" name="proteza" value="szkieletowa na zatrzaskach" /></td>
   <td> - SZKIELETOWA NA &nbsp;&nbsp;ZATRZASKACH</td>
  </tr>
  <tr id="material">
   <td><input type="radio" name="proteza" value="szkieletowa na teleskopach" /></td>
   <td> - SZKIELETOWA NA &nbsp;&nbsp;TELESKOPACH</td>
   <td><input type="radio" name="proteza" value="szynoproteza" /></td>
   <td> - SZYNOPROTEZA</td> 
   <td>
	  <select name="liczba_proteza" style="height:40px;width:70px;font-size:20px;">
	    <option value>  </option>
	    <option value="1"> 1 </option>
	    <option value="2"> 2 </option>
          </select>
   </td>
   <td> - ILO�� PROTEZ</td>
  </tr>
</table>  

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:60%;">
  <tr id="material">
   <td><input type="checkbox" name="wzornik" value="wzornik" /></td> 
   <td> - WZORNIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="lyzka" value="�y�ka indywidualna" /></td> 
   <td> - �Y�KA INDYWIDUALNA</td> 
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
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="klamralana" value="klamra lana" /></td>
   <td> - KLAMRA LANA</td>
   <td><input type="checkbox" name="klamradoginana" value="klamra doginana" /></td>
   <td> - KLAMRA DOGINANA</td>
   <td><input type="checkbox" name="ciern" value="cier� lany" /></td>
   <td> - CIER� LANY</td>
   <td><input type="checkbox" name="pelota" value="pelota" /></td>
   <td> - PELOTA</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:70%;">
  <tr id="material">
   <td><input type="checkbox" name="metal" value="metal" /></td>
   <td> - METAL</td>
   <td><input type="checkbox" name="akryl" value="akryl" /></td>
   <td> - AKRYL</td>
   <td><input type="checkbox" name="przymiarka" value="przymiarka" /></td>
   <td> - PRZYMIARKA&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="gotowa" value="gotowa" /></td>
   <td> - GOTOWA</td>
   <td>
	  <select name="liczba_gotowa" style="height:40px;width:70px;font-size:20px;">
	    <option value>  </option>
	    <option value="1"> 1 </option>
	    <option value="2"> 2 </option>
          </select>
   </td>
   <td> - ILO��</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:65%;">
  <tr id="material">
   <td><input type="checkbox" name="poprawka" value="poprawka" /></td>
   <td> - POPRAWKA</td>
   <td><input type="checkbox" name="ponowne_ust_zebow" value="ponowne ustawienie zeb�w" /></td>
   <td> - PONOWNE USTAWIENIE Z�B�W</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:55%;">
  <tr id="material">
   <td><input type="checkbox" name="belka" value="belka" /></td>
   <td> - BELKA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="zeby_ivoclar" value="z�by ivoclar" /></td>
   <td> - Z�BY IVOCLAR</td>
   <td>
	  <select name="liczba_zeby_ivoclar" style="height:40px;width:70px;font-size:20px;">
	    <option value>  </option>
	    <option value="1"> 1 </option>
	    <option value="2"> 2 </option>
          </select>
   </td>
   <td> - ILO��</td>
  </tr>
</table>

<hr style="width:100%;"/>

<!-- {include file="wybor_zebow.tpl"}
 -->
 
  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4_proteza_1.php">
  <input type="hidden" name="strona" value="zlecenia_add/addform_4_1.php">
</form>
</div>

<div style="margin-top:50px;">
</div>

</body>
</html>

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
<body id="4">

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
            <li id="tab1"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=1"><span>Szkielet /<br /> Szynoproteza&nbsp;</span></a></div></div></li>
            <li id="tab2"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=2"><span>Całkowita<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab3"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=3"><span>Częściowa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab4"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=4"><span>Szyny<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab5"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=5"><span>Naprawa<br />&nbsp;&nbsp;</span></a></div></div></li>
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

<table cellspacing="0" cellpadding="0" border="0" style="width:30%;">
  <tr id="material">
   <td> 
	  <select name="liczbaprotez" style="height:40px;width:60px;font-size:20px;">
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ PROTEZ</td>
  </tr>
</table>  

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="wybielajaca" value="wybielajaca" /></td> 
   <td> - WYBIELAJĄCA</td> 
   <td> 
	  <select name="liczbawybielajacych" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="relaksacyjnatm" value="relaksacyjna twardo-miękka" /></td> 
   <td> - RELAKS. TWARDO-MIĘKKA</td> 
   <td><input type="checkbox" name="relaksacyjnatn" value="relaksacyjna twarda-nagryzowa" /></td> 
   <td> - RELAKS. TWARDA-NAGRYZOWA</td> 
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="relaksacyjnam" value="relaksacyjna miękka" /></td> 
   <td> - RELAKS. MIĘKKA</td> 
   <td><input type="checkbox" name="relaksacyjnampk" value="relaksacyjna miękka press-kolor" /></td> 
   <td> - RELAKS. MIĘKKA PRESS-KOLOR</td> 
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="ochronna" value="ochronna kolor" /></td> 
   <td> - OCHRONNA KOLOR</td> 
   <td><input type="checkbox" name="pozycjonowanie" value="do pozycjonowania implantów" /></td> 
   <td> - DO POZYCJONOWANIA IMPLANTÓW</td> 
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="okluzyjna" value="okluzyjna" /></td> 
   <td> - OKLUZYJNA</td> 
   <td><input type="checkbox" name="nti" value="nti" /></td> 
   <td> - NTI</td> 
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="modele" value="modele orientacyjne" /></td>
   <td> - MODELE ORIENTACYJNE</td>
   <td></td>
   <td></td>
  </tr>
</table>

<hr style="width:100%;"/>

  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4i_proteza_4.php">
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

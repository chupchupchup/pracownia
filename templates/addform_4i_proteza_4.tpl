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
   <td> - ILOŚĆ WYBIELAJĄCYCH</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="relaksacyjnatm" value="relaksacyjna twardo-miękka" /></td>
   <td> - RELAKS. TWARDO-MIĘKKA</td>
   <td>
	  <select name="liczbarelaksacyjnatm" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ RELAKS. TWARDO-MIĘKKICH</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="relaksacyjnatn" value="relaksacyjna twarda-nagryzowa" /></td>
   <td> - RELAKS. TWARDA-NAGRYZOWA</td>
   <td>
	  <select name="liczbarelaksacyjnatn" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ RELAKS. TWARDA-NAGRYZOWYCH</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="relaksacyjnam" value="relaksacyjna miękka" /></td>
   <td> - RELAKS. MIĘKKA</td>
   <td>
	  <select name="liczbarelaksacyjnam" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ RELAKS. MIĘKKICH</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="relaksacyjnampk" value="relaksacyjna miękka press-kolor" /></td>
   <td> - RELAKS. MIĘKKA PRESS-KOLOR</td>
   <td>
	  <select name="liczbarelaksacyjnampk" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ RELAKS. MIĘKKA PRESS-KOLOR</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="ochronna" value="ochronna kolor" /></td>
   <td> - OCHRONNA KOLOR</td>
   <td>
	  <select name="liczbaochronna" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - OCHRONNA KOLOR</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="pozycjonowanie" value="do pozycjonowania implantów z markerami" /></td>
   <td> - DO POZYCJONOWANIA IMPLANTÓW Z MARKERAMI</td>
   <td>
	  <select name="liczbapozycjonowanie" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ DO POZYCJONOWANIA IMPLANTÓW Z MARKERAMI</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="nagryzowa_w_artykulatorze" value="nagryzowa w artykulatorze" /></td>
   <td> - NAGRYZOWA W ARTYKULATORZE</td>
   <td>
	  <select name="liczbanagryzowa_w_artykulatorze" style="height:40px;width :60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ NAGRYZOWA W ARTYKULATORZE</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="nti" value="nti" /></td>
   <td> - NTI</td>
   <td>
	  <select name="liczbanti" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ NTI</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="aparat_ortodontyczny" value="aparat ortodontyczny" /></td>
   <td> - APARAT ORTODONTYCZNY</td>
   <td>
	  <select name="liczbaaparat_ortodontyczny" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ APARATÓW ORTODONTYCZNYCH</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="szyna_korony_tymczasowe" value="szyna do koron tymczasowych" /></td>
   <td> - SZYNA DO KORON TYMCZASOWYCH</td>
   <td>
	  <select name="liczbaszyna_korony_tymczasowe" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ SZYNA DO KORON TYMCZASOWYCH</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="szyna_zabiegi_implantologiczne" value="szyna do zabiegów implantologicznych z nawierceniami" /></td>
   <td> - SZYNA DO ZABIEGÓW IMPLANTOLOGICZNYCH Z NAWIERCENIAMI</td>
   <td>
	  <select name="liczbaszyna_zabiegi_implantologiczne" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ SZYN DO ZABIEGÓW IMPLANTOLOGICZNYCH Z NAWIERCENIAMI</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="plyta_podjezykowa" value="płyta podjęzykowa twarda" /></td>
   <td> - PŁYTA PODJĘZYKOWA TWARDA</td>
   <td>
	  <select name="liczbaplyta_podjezykowa" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ PŁYTA PODJĘZYKOWA TWARDA</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="aparat_przeciw_chrapaniu" value="aparat przeciw chrapaniu" /></td>
   <td> - APARAT PRZECIW CHRAPANIU</td>
   <td>
	  <select name="liczbaaparat_przeciw_chrapaniu" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ APARAT PRZECIW CHRAPANIU</td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="inne" value="inne" /></td>
   <td> - INNE</td>
   <td>
	  <select name="liczbainne" style="height:40px;width:60px;font-size:20px;">
	   <option value>  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
   </td>
   <td> - ILOŚĆ INNE</td>
  </tr>
    <tr id="material">
        <td><input type="checkbox" name="deprogramator_koisa" value="deprogramator koisa" /></td>
        <td> - DEPROGRAMATOR KOISA</td>
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

<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel='stylesheet' type='text/css' href='css/addform_tabs.css' />
  <script type="text/javascript" src="js/kolornik.js"></script>
  
        <!-- compliance patch for microsoft browsers -->
        <!--[if lt IE 7]>
            <link rel='stylesheet' type='text/css' href='tabs-ie.css' />
            <script src="./ie7/ie7-standard-p.js" type="text/javascript"></script>
        <![endif]-->
</head>
<body id='5'>

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

        <ul id='tabs'>
            <li id='tab1'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=1'><span>Szkielet /<br /> Szynoproteza&nbsp;</span></a></div></div></li>
            <li id='tab2'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=2'><span>Całkowita<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id='tab3'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=3'><span>Częściowa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id='tab4'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=4'><span>Szyny<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id='tab5'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4i.php&proteza=5'><span>Naprawa<br />&nbsp;&nbsp;</span></a></div></div></li>
        </ul>

        <div id='iframe'>
   <br />

<div align="center" style="margin-top:0px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij" >COFNIJ</button>
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
   <td><input type="checkbox" name="sklejenie" value="sklejenie" /></td> 
   <td> - SKLEJENIE</td> 
   <td><input type="checkbox" name="naprawasiatka" value="naprawa z siatką" /></td> 
   <td> - NAPRAWA Z SIATKĄ</td> 
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="dostzeba" value="dostawienie zęba" /></td> 
   <td> - DOSTAWIENIE ZĘBA</td> 
   <td> 
	  <select name="liczbadostzeba" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
	   <option value="3"> 3 </option>
	   <option value="4"> 4 </option>
	   <option value="5"> 5 </option>
	   <option value="6"> 6 </option>
	   <option value="7"> 7 </option>
	   <option value="8"> 8 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="dostklamry" value="dostawienie klamry" /></td> 
   <td> - DOSTAWIENIE KLAMRY</td> 
   <td>
	  <select name="liczbadostklamry" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
	   <option value="3"> 3 </option>
	   <option value="4"> 4 </option>
	   <option value="5"> 5 </option>
	   <option value="6"> 6 </option>
	   <option value="7"> 7 </option>
	   <option value="8"> 8 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="elementlany" value="element lany" /></td> 
   <td> - ELEMENT LANY</td> 
   <td>
	  <select name="liczbaelementlany" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
	   <option value="3"> 3 </option>
	   <option value="4"> 4 </option>
	   <option value="5"> 5 </option>
	   <option value="6"> 6 </option>
	   <option value="7"> 7 </option>
	   <option value="8"> 8 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
    <tr id="material">
   <td><input type="checkbox" name="podsypanie" value="podsypanie zębów" /></td> 
   <td> - PODSYPANIE ZĘBÓW</td> 
   <td><input type="checkbox" name="lutowanie" value="lutowanie" /></td> 
   <td> - LUTOWANIE</td> 
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="akryl" value="wymiana akrylu" /></td> 
   <td> - WYMIANA AKRYLU</td> 
   <td><input type="checkbox" name="podprotezy" value="podścielenie protezy" /></td> 
   <td> - PODŚCIELENIE PROTEZY</td> 
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="matryca" value="wymiana matryc" /></td>
   <td> - WYMIANA MATRYC</td>
   <td></td>
   <td></td>
  </tr>
</table>

<hr style="width:100%;"/>

  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej" >DALEJ</button>
  <input type="hidden" name="add" value="addform_4i_proteza_5.php">
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

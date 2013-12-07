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
<body id='6'>

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
            <li id='tab1'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=1'><span>Szkielet /<br /> Szynoproteza&nbsp;</span></a></div></div></li>
            <li id='tab2'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=2'><span>Całkowita<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id='tab3'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=3'><span>Częściowa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id='tab4'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=4'><span>Szyny<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id='tab5'><div><div><a href='./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=5'><span>Naprawa<br />&nbsp;&nbsp;</span></a></div></div></li>
            <li id="tab6"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4.php&proteza=6"><span>Prace<br />Pomocnicze</span></a></div></div></li>
        </ul>

        <div id='iframe'>
   <br />

<div align="center" style="margin-top:0px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij" >COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_3.php">
</form>
</div>

<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:70%;">
  <tr id="material">
   <td><input type="checkbox" name="model_diag_orient" value="model diagnostyczny / orientacyjny" /></td>
   <td> - MODEL DIAGNOSTYCZNY / ORIENTACYJNY</td>
   <td>
	  <select name="liczba_model_diag_orient" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="dodatkowy_wzornik" value="dodatkowy wzornik" /></td>
   <td> - DODATKOWY WZORNIK</td>
   <td>
	  <select name="liczba_dodatkowy_wzornik" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="wax_up" value="wax-up" /></td>
   <td> - WAX-UP</td>
   <td>
	  <select name="liczba_wax_up" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="model_dzielony_dodatkowy" value="model dzielony dodatkowy" /></td>
   <td> - MODEL DZIELONY DODATKOWY</td>
   <td>
	  <select name="liczba_model_dzielony_dodatkowy" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
    <tr id="material">
   <td><input type="checkbox" name="lyzka_indywidualna" value="łyżka indywidualna" /></td>
   <td> - ŁYŻKA INDYWIDUALNA</td>
   <td>
	  <select name="liczba_lyzka_indywidualna" style="height:40px;width:60px;font-size:20px;">
	   <option value="">  </option>
	   <option value="1"> 1 </option>
	   <option value="2"> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="wypozyczenie_luku_twarzowego" value="wypożyczenie łuku twarzowego" /></td>
   <td> - WYPOŻYCZENIE ŁUKU TWARZOWEGO</td>
  </tr>
</table>

<hr style="width:100%;"/>

  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej" >DALEJ</button>
  <input type="hidden" name="add" value="addform_4_proteza_6.php">
  <input type="hidden" name="strona" value="zlecenia_add/addform_4_1.php">
</form>
</div>
        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

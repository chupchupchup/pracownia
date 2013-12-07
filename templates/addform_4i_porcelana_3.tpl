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
            <li id="tab2"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=2"><span>Korona licowana&nbsp;na&nbsp;metalu</span></a></div></div></li>
            <li id="tab3"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=3"><span>Korona pełnoceramiczna</span></a></div></div></li>
            <li id="tab4"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=4"><span>Inlay&nbsp;/&nbsp;Onlay<br> / Licówka</span></a></div></div></li>
            <li id="tab5"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=5"><span>Implanty<br />&nbsp;&nbsp;</span></a></div></div></li>
<!--             <li id="tab6"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=6"><span>Praca kombinowana</span></a></div></div></li>
 -->
            <li id="tab7"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=7"><span>Korony inne<br />&nbsp;&nbsp;</span></a></div></div></li>
<!--             <li id="tab8"><div><div><a href="./pracownia.php?strona=zlecenia_add/addform_4i.php&porcelana=8"><span>Porcelana naprawa&nbsp;&nbsp;</span></a></div></div></li>
 -->        </ul>

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
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="radio" name="material" value="empress"  style="float:right"/></td>
   <td> - EMPRESS</td>
   <td><input type="radio" name="material" value="cerkon"  style="float:right"/></td>
   <td> - CERKON</td>
   <td><input type="checkbox" name="czapeczka_cerkon" value="czapeczka cerkon"  style="float:right"/></td>
   <td> - CZAPECZKA CERKON</td>
   <td><input type="checkbox" name="szklane_podparcie" value="szklane podparcie" style="float:right" /></td>
   <td> - SZKLANE PODPARCIE</td>
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

   <table border="0" style="font-size:16px;width:80%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="przymiarka" value="przymiarka" /></td>
       <td> - PRZYMIARKA</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="przymiarka_kompozytu" value="przymiarka kompozytu" /></td>
       <td> - PRZYMIARKA KOMPOZYTU</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="gotowa" value="gotowa" /></td>
       <td> - GOTOWA</td>
       <td> <select name="liczba_gotowa" style="height:40px;width:60px;font-size:20px;">
	    		 <option value>  </option>
		 		 <option value="1"> 1 </option>
		 		 <option value="2"> 2 </option>
		 		 <option value="3"> 3 </option>
		 		 <option value="4"> 4 </option>
		 		 <option value="5"> 5 </option>
		 		 <option value="6"> 6 </option>
		 		 <option value="7"> 7 </option>
		 		 <option value="8"> 8 </option>
		 		 <option value="9"> 9 </option>
		 		 <option value="10"> 10 </option>
		 		 <option value="11"> 11 </option>
		 		 <option value="12"> 12 </option>
		 		 <option value="13"> 13 </option>
		 		 <option value="14"> 14 </option>
		 		 <option value="15"> 15 </option>
		 		 <option value="16"> 16 </option>
		 		 <option value="17"> 17 </option>
		 		 <option value="18"> 18 </option>
		 		 <option value="19"> 19 </option>
		 		 <option value="20"> 20 </option>
		 		 <option value="21"> 21 </option>
		 		 <option value="22"> 22 </option>
		 		 <option value="23"> 23 </option>
		 		 <option value="24"> 24 </option>
		 		 <option value="25"> 25 </option>
		 		 <option value="26"> 26 </option>
		 		 <option value="27"> 27 </option>
		 		 <option value="28"> 28 </option>
		 		 <option value="29"> 29 </option>
		 		 <option value="30"> 30 </option>
		 		 <option value="31"> 31 </option>
		 		 <option value="32"> 32 </option>
				 </select>
		 </td>
		 <td> - ILOŚĆ </td>
      </tr>
   </table>

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:70%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="malowanie" value="malowanie" /></td>
       <td> - MALOWANIE</td>
       <td> <select name="przedzial_malowanie" style="height:40px;width:70px;font-size:20px;">
            <option value>  </option>
		<option value="1"> 1 </option>
		<option value="2"> 2 </option>
		<option value="3-5"> 3-5 </option>
		<option value="6-8"> 6-8 </option>
		<option value="9-14"> 9-14 </option>
	     </select>
       </td>
       <td> - ILOŚĆ, </td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="dobor_koloru" value="dobór koloru" /></td>
       <td> - DOBÓR KOLORU</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="poprawka" value="poprawka" /></td>
       <td> - POPRAWKA</td>
      </tr>
   </table>

<hr style="width:100%;"/>
{include file="wybor_zebow.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-80px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4i_porcelana_3.php">
  <input type="hidden" name="strona" value="zlecenia_add/addform_5i.php">
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

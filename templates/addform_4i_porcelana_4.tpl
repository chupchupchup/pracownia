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
<b style="font-size:16px;">LICÓWKA:</b>
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="licowka_kompozyt" value="licówka kompozyt" /></td>
   <td> - LICÓWKA KOMPOZYT</td>
   <td> <input type="text" name="liczba_licowka_kompozyt" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="licowka_Empress" value="licówka Empress" /></td>
   <td> - LICÓWKA EMPRESS</td>
   <td> <input type="text" name="liczba_licowka_Empress" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ </td>
  </tr>
  
  <tr id="material">
   <td><input type="checkbox" name="licowka_cerkon" value="licówka cerkon" /></td>
   <td> - LICÓWKA CERKON</td>
   <td> <input type="text" name="liczba_licowka_cerkon" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="licowka_wypalana" value="licówka wypalana" /></td>
   <td> - LICÓWKA WYPALANA</td>
   <td> <input type="text" name="liczba_licowka_wypalana" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="licowka_Gradia" value="licówka Gradia" /></td>
   <td> - LICÓWKA GRADIA</td>
   <td> <input type="text" name="liczba_licowka_Gradia" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td>  </td>
   <td>  </td>
   <td>  </td>
   <td>  </td>
  </tr>
</table>

<hr style="width:100%;"/>

<b style="font-size:16px;">INLAY / ONLAY:</b>
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="inlay_onlay_zloto" value="inlay onlay złoto" /></td>
   <td> - INLAY/ONLAY ZŁOTO</td>
   <td> <input type="text" name="liczba_inlay_onlay_zloto" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

   <td><input type="checkbox" name="inlay_onlay_Gradia" value="inlay onlay Gradia" /></td>
   <td> - INLAY/ONLAY GRADIA</td>
   <td> <input type="text" name="liczba_inlay_onlay_Gradia" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ </td>
  </tr>

  <tr id="material">
   <td><input type="checkbox" name="inlay_onlay_kompozyt" value="inlay onlay kompozyt" /></td>
   <td> - INLAY/ONLAY KOMPOZYT</td>
   <td> <input type="text" name="liczba_inlay_onlay_kompozyt" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

   <td><input type="checkbox" name="inlay_onlay_Empress" value="inlay onlay Empress" /></td>
   <td> - INLAY/ONLAY EMPRESS</td>
   <td> <input type="text" name="liczba_inlay_onlay_Empress" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ </td>
  </tr>

  <tr id="material">
   <td><input type="checkbox" name="inlay_onlay_cerkon" value="inlay onlay cerkon" /></td>
   <td> - INLAY/ONLAY CERKON</td>
   <td> <input type="text" name="liczba_inlay_onlay_cerkon" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

   <td><input type="checkbox" name="inlay_onlay_metal" value="inlay onlay metal" /></td>
   <td> - INLAY/ONLAY METAL</td>
   <td> <input type="text" name="liczba_inlay_onlay_metal" style="font-size: 16px; height:30px; width:80px;" ></input> </td>
   <td> - ILOŚĆ </td>
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

   <table border="0" style="font-size:16px;width:70%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="malowanie" value="malowanie" /></td>
       <td> - MALOWANIE</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="dobor_koloru" value="dobór koloru" /></td>
       <td> - DOBÓR KOLORU</td>
       <td>&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="poprawka" value="poprawka" /></td>
       <td> - POPRAWKA</td>
      </tr>
   </table>

    <hr style="width:100%;"/>
{include file="wybor_zebow.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-80px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4i_porcelana_4.php">
  <input type="hidden" name="strona" value="zlecenia_add/addform_5i.php">
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

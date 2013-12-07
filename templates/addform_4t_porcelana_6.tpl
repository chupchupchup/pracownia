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
<body id="6">

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

        <ul id="tabs" style="font-size:12px;color:white;">
            <li id="tab1"><div><div><span>Wkłady <br />K-K</span></div></div></li>
            <li id="tab2"><div><div><span>Korona licowana</span></div></div></li>
            <li id="tab3"><div><div><span>Korona pełnoceramiczna</span></div></div></li>
            <li id="tab4"><div><div><span>Inlay&nbsp;/&nbsp;Onlay<br> / Licówka</span></div></div></li>
            <li id="tab5"><div><div><span>Implanty<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab6" style="color:black;"><div><div><span>Praca kombinowana</span></div></div></li>
            <li id="tab7"><div><div><span>Korony inne<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab8"><div><div><span>Porcelana naprawa&nbsp;&nbsp;</span></div></div></li>
        </ul>

        <div id="iframe">
   <br />

<!-- <div align="center" style="margin-top:0px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij">COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_tech/addform_3t.php">
</form>
</div>
 -->
<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:45%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="zatrzaski" value="zatrzaski" /> </td>
		 <td> - ZATRZASKI </td>
       <td> <select name="liczbazatrzaskow" style="height:40px;width:60px;font-size:20px;">
	    		 <option value>  </option>
		 		 <option value="1"> 1 </option>
		 		 <option value="2"> 2 </option>
		 		 <option value="3"> 3 </option>
		 		 <option value="4"> 4 </option>
				 </select>
		 </td>
		 <td> - SZTUK </td>
		</tr>
	</table>	     

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:45%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="zasuwy" value="zasuwy" /> </td>
		 <td> - ZASUWY&nbsp;&nbsp;&nbsp;&nbsp; </td>
       <td> <select name="liczbazasow" style="height:40px;width:60px;font-size:20px;">
	  	 		 <option value>  </option>
		 		 <option value="1"> 1 </option>
		 		 <option value="2"> 2 </option>
		 		 <option value="3"> 3 </option>
		 		 <option value="4"> 4 </option>
				 </select>
		 </td>
		 <td> - SZTUK </td>
		</tr>
	</table>	     
 
<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:20%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="belka" value="belka" /> </td>
		 <td> - BELKA </td>
		</tr>
	</table>	     

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:20%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="wzornik" value="wzornik" /> </td>
		 <td> - WZORNIK </td>
		</tr>
	</table>	     

<hr style="width:100%;"/>

{include file="wybor_zebow.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-80px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_porcelana_6.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">

{include file="materialy_extra.tpl"}
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

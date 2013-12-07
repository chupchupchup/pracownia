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

        <ul id="tabs" style="font-size:12px;color:white;">
            <li id="tab1"><div><div><span>Szkielet /<br /> Szynoproteza&nbsp;</span></div></div></li>
            <li id="tab2"><div><div><span>Całkowita<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab3"><div><div><span>Częściowa<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab4"><div><div><span>Szyny<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab5"><div><div><span>Naprawa<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab6" style="color:black;"><div><div><span>Prace<br />Pomocnicze</span></div></div></li>
        </ul>

        <div id='iframe'>
   <br />

<!-- <div align="center" style="margin-top:0px;margin-left:10px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij" >COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_tech/addform_3t.php">
</form>
</div>
 -->
<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:70%;">
  <tr id="material">
   <td><input type="checkbox" name="model_diag_orient" value="model diagnostyczny / orientacyjny" {if $model_diag_orient== "model diagnostyczny / orientacyjny"}checked{/if}/></td>
   <td> - MODEL DIAGNOSTYCZNY / ORIENTACYJNY</td>
   <td>
	  <select name="liczba_model_diag_orient" style="height:40px;width:60px;font-size:20px;">
	   <option value="" {if $liczba_model_diag_orient== ""}selected{/if}>  </option>
	   <option value="1" {if $liczba_model_diag_orient== "1"}selected{/if}> 1 </option>
	   <option value="2" {if $liczba_model_diag_orient== "2"}selected{/if}> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="dodatkowy_wzornik" value="dodatkowy wzornik" {if $dodatkowy_wzornik== "dodatkowy wzornik"}checked{/if}/></td>
   <td> - DODATKOWY WZORNIK</td>
   <td>
	  <select name="liczba_dodatkowy_wzornik" style="height:40px;width:60px;font-size:20px;">
	   <option value="" {if $liczba_dodatkowy_wzornik== ""}selected{/if}>  </option>
	   <option value="1" {if $liczba_dodatkowy_wzornik== "1"}selected{/if}> 1 </option>
	   <option value="2" {if $liczba_dodatkowy_wzornik== "2"}selected{/if}> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="wax_up" value="wax-up" {if $wax_up== "wax-up"}checked{/if}/></td>
   <td> - WAX-UP</td>
   <td>
	  <select name="liczba_wax_up" style="height:40px;width:60px;font-size:20px;">
	   <option value="" {if $liczba_wax_up== ""}selected{/if}>  </option>
	   <option value="1" {if $liczba_wax_up== "1"}selected{/if}> 1 </option>
	   <option value="2" {if $liczba_wax_up== "2"}selected{/if}> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="model_dzielony_dodatkowy" value="model dzielony dodatkowy" {if $model_dzielony_dodatkowy== "model dzielony dodatkowy"}checked{/if}/></td>
   <td> - MODEL DZIELONY DODATKOWY</td>
   <td>
	  <select name="liczba_model_dzielony_dodatkowy" style="height:40px;width:60px;font-size:20px;">
	   <option value="" {if $liczba_model_dzielony_dodatkowy== ""}selected{/if}>  </option>
	   <option value="1" {if $liczba_model_dzielony_dodatkowy== "1"}selected{/if}> 1 </option>
	   <option value="2" {if $liczba_model_dzielony_dodatkowy== "2"}selected{/if}> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
    <tr id="material">
   <td><input type="checkbox" name="lyzka_indywidualna" value="łyżka indywidualna" {if $lyzka_indywidualna== "łyżka indywidualna"}checked{/if}/></td>
   <td> - ŁYŻKA INDYWIDUALNA</td>
   <td>
	  <select name="liczba_lyzka_indywidualna" style="height:40px;width:60px;font-size:20px;">
	   <option value="" {if $liczba_lyzka_indywidualna== ""}selected{/if}>  </option>
	   <option value="1" {if $liczba_lyzka_indywidualna== "1"}selected{/if}> 1 </option>
	   <option value="2" {if $liczba_lyzka_indywidualna== "2"}selected{/if}> 2 </option>
     </select>
	</td>
	<td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="wypozyczenie_luku_twarzowego" value="wypożyczenie łuku twarzowego" {if $wypozyczenie_luku_twarzowego== "wypożyczenie łuku twarzowego"}checked{/if}/></td>
   <td> - WYPOŻYCZENIE ŁUKU TWARZOWEGO</td>
  </tr>
</table>

<hr style="width:100%;"/>

  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej" >DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_proteza_6.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">
</form>
</div>
        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

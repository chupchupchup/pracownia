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
<body id="7">

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
            <li id="tab2"><div><div><span>Korona licowana&nbsp;na&nbsp;metalu</span></div></div></li>
            <li id="tab3"><div><div><span>Korona pełnoceramiczna</span></div></div></li>
            <li id="tab4"><div><div><span>Inlay&nbsp;/&nbsp;Onlay<br> / Licówka</span></div></div></li>
            <li id="tab5"><div><div><span>Implanty<br />&nbsp;&nbsp;</span></div></div></li>
<!--             <li id="tab6"><div><div><span>Praca kombinowana</span></div></div></li>
 -->
            <li id="tab7" style="color:black;"><div><div><span>Korony inne<br />&nbsp;&nbsp;</span></div></div></li>
<!--             <li id="tab8"><div><div><span>Porcelana naprawa&nbsp;&nbsp;</span></div></div></li>
 -->
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

 <table border="0" style="font-size:16px;width:50%;">
  <tr id="material">
    <td> <input type="radio" style="height:45px;width:45px;" name="lana" value="lana metalowa" {if $lana== "lana metalowa"}checked{/if}/> </td>
    <td> - LANA METALOWA </td>
    <td> <input type="radio" style="height:45px;width:45px;" name="lana" value="lana złota" {if $lana== "lana złota"}checked{/if}/> </td>
    <td> - LANA ZŁOTA </td>
  </tr>
 </table>	

<hr style="width:100%;"/>

 <table border="0" style="font-size:16px;width:40%;">
  <tr id="material">
    <td> <input type="radio" style="height:45px;width:15px; float:right" name="rodzaj" value="element lany" {if $rodzaj== "element lany"}checked{/if}/> </td>
    <td> - ELEMENT LANY </td>
    <td> <input type="radio" style="height:45px;width:15px; float:right" name="rodzaj" value="WAX-UP" {if $rodzaj== "WAX-UP"}checked{/if}/> </td>
    <td> - WAX-UP </td>
  </tr>
 </table>	

<hr style="width:100%;"/>

<b style="font-size:16px;">RODZAJ KOLORNIKA:</b>
<br /><br />
   <table border="0" style="font-size:16px;width:85%;">
      <tr>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajkolornika" id="vita" value="vita" {if $rodzajkolornika== "vita"}checked{/if}/></td>
       <td> - VITA {if $rodzajkolornika== "vita"}<br>&nbsp;&nbsp;<b>{$kolor}</b>{/if}</td>
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajkolornika" id="mifam" value="mifam" {if $rodzajkolornika== "mifam"}checked{/if}/></td>
       <td> - MIFAM {if $rodzajkolornika== "mifam"}<br>&nbsp;&nbsp;<b>{$kolor}</b>{/if}</td>
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajkolornika" id="wiedent" value="wiedent" {if $rodzajkolornika== "wiedent"}checked{/if} /></td>
       <td> - WIEDENT {if $rodzajkolornika== "wiedent"}<br>&nbsp;&nbsp;<b>{$kolor}</b>{/if}</td>
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajkolornika" id="ivoclar" value="ivoclar" {if $rodzajkolornika== "ivoclar"}checked{/if} /></td>
       <td> - IVOCLAR {if $rodzajkolornika== "ivoclar"}<br>&nbsp;&nbsp;<b>{$kolor}</b>{/if}</td>
       <td>&nbsp;</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajkolornika" id="wiedentvita" value="wiedentvita" {if $rodzajkolornika== "wiedentvita"}checked{/if} /></td>
       <td> - WIEDENT VITA {if $rodzajkolornika== "wiedentvita"}<br>&nbsp;&nbsp;<b>{$kolor}</b>{/if}</td>
     </tr>
   </table>
         <input type="hidden" name="kolor" value="{$kolor}">

   <br />
   <div id="newsel">
	</div>

<hr style="width:100%;"/>

 <table border="0" style="font-size:16px;width:89%;">
  <tr id="material">
   <td><input type="checkbox" name="korona_akryl" value="korona akrylowa" {if $korona_akryl== "korona akrylowa"}checked{/if}/></td>
   <td> - KORONA AKRYLOWA</td>
       <td> <select name="liczba_korona_akryl" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_korona_akryl== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_korona_akryl== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_korona_akryl== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_korona_akryl== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_korona_akryl== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_korona_akryl== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_korona_akryl== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_korona_akryl== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_korona_akryl== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_korona_akryl== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_korona_akryl== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_korona_akryl== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_korona_akryl== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_korona_akryl== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_korona_akryl== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_korona_akryl== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_korona_akryl== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_korona_akryl== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_korona_akryl== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_korona_akryl== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_korona_akryl== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_korona_akryl== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_korona_akryl== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_korona_akryl== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_korona_akryl== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_korona_akryl== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_korona_akryl== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_korona_akryl== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_korona_akryl== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_korona_akryl== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_korona_akryl== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_korona_akryl== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_korona_akryl== "32"}selected{/if}> 32 </option>
				 </select>
   </td>
       <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="korona_kompozyt" value="korona kompozytowa" {if $korona_kompozyt== "korona kompozytowa"}checked{/if}/></td>
   <td> - KORONA KOMPOZYTOWA</td>
       <td> <select name="liczba_korona_kompozyt" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_korona_kompozyt== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_korona_kompozyt== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_korona_kompozyt== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_korona_kompozyt== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_korona_kompozyt== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_korona_kompozyt== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_korona_kompozyt== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_korona_kompozyt== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_korona_kompozyt== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_korona_kompozyt== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_korona_kompozyt== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_korona_kompozyt== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_korona_kompozyt== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_korona_kompozyt== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_korona_kompozyt== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_korona_kompozyt== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_korona_kompozyt== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_korona_kompozyt== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_korona_kompozyt== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_korona_kompozyt== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_korona_kompozyt== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_korona_kompozyt== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_korona_kompozyt== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_korona_kompozyt== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_korona_kompozyt== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_korona_kompozyt== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_korona_kompozyt== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_korona_kompozyt== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_korona_kompozyt== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_korona_kompozyt== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_korona_kompozyt== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_korona_kompozyt== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_korona_kompozyt== "32"}selected{/if}> 32 </option>
				 </select>
   </td>
       <td> - ILOŚĆ &nbsp;&nbsp;</td>
  </tr>
 </table>	

<hr style="width:100%;"/>

 <table border="0" style="font-size:16px;width:85%;">
  <tr id="material">
   <td><input type="checkbox" name="wlokno_szklane" value="włókno szklane" {if $wlokno_szklane== "włókno szklane"}checked{/if}/></td>
   <td> - WŁÓKNO SZKLANE</td>
       <td> <select name="liczba_wlokno_szklane" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_wlokno_szklane== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_wlokno_szklane== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_wlokno_szklane== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_wlokno_szklane== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_wlokno_szklane== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_wlokno_szklane== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_wlokno_szklane== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_wlokno_szklane== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_wlokno_szklane== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_wlokno_szklane== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_wlokno_szklane== "10"}selected{/if}> 10 </option>
				 </select>
       </td>
       <td> - ILOŚĆ (w cm)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="maryland" value="most maryland" {if $maryland== "most maryland"}checked{/if}/></td>
   <td> - MOST MARYLAND</td>
   <td><input type="checkbox" name="poprawka" value="poprawka" {if $poprawka== "poprawka"}checked{/if}/></td>
   <td> - POPRAWKA</td>
  </tr>
 </table>	

<hr style="width:100%;"/>

 <table border="0" style="font-size:16px;width:87%;">
  <tr id="material">
    <td> <input type="radio" style="height:45px;width:45px;" name="teleskop" value="teleskop metal" {if $teleskop== "teleskop metal"}checked{/if}/> </td>
    <td> - TELESKOP METAL </td>
    <td> <input type="radio" style="height:45px;width:45px;" name="teleskop" value="teleskop złoty" {if $teleskop== "teleskop złoty"}checked{/if}/> </td>
    <td> - TELESKOP ZŁOTY </td>
    <td> <input type="radio" style="height:45px;width:45px;" name="teleskop" value="teleskop cerkon" {if $teleskop== "teleskop cerkon"}checked{/if}/> </td>
    <td> - TELESKOP CERKON </td>
  </tr>
  <tr id="material">
    <td> <input type="radio" style="height:45px;width:45px;" name="teleskop" value="teleskop licowany kompozytem" {if $teleskop== "teleskop licowany kompozytem"}checked{/if}/> </td>
    <td> - TELESKOP LICOWANY KOMPOZYTEM</td>
       <td> <select name="liczba_teleskop" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_teleskop== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_teleskop== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_teleskop== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_teleskop== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_teleskop== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_teleskop== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_teleskop== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_teleskop== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_teleskop== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_teleskop== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_teleskop== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_teleskop== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_teleskop== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_teleskop== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_teleskop== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_teleskop== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_teleskop== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_teleskop== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_teleskop== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_teleskop== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_teleskop== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_teleskop== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_teleskop== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_teleskop== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_teleskop== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_teleskop== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_teleskop== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_teleskop== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_teleskop== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_teleskop== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_teleskop== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_teleskop== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_teleskop== "32"}selected{/if}> 32 </option>
				 </select>
   </td>
       <td> - ILOŚĆ TELESKOPÓW&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr id="material">
    <td> <input type="radio" style="height:45px;width:45px;" name="akryl_skan" value="akrylowa skanowana" {if $akryl_skan== "akrylowa skanowana"}checked{/if}/> </td>
    <td> - AKRYLOWA SKANOWANA</td>
       <td> <select name="liczba_akryl_skan" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_teleskop== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_akryl_skan== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_akryl_skan== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_akryl_skan== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_akryl_skan== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_akryl_skan== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_akryl_skan== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_akryl_skan== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_akryl_skan== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_akryl_skan== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_akryl_skan== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_akryl_skan== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_akryl_skan== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_akryl_skan== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_akryl_skan== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_akryl_skan== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_akryl_skan== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_akryl_skan== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_akryl_skan== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_akryl_skan== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_akryl_skan== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_akryl_skan== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_akryl_skan== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_akryl_skan== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_akryl_skan== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_akryl_skan== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_akryl_skan== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_akryl_skan== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_akryl_skan== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_akryl_skan== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_akryl_skan== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_akryl_skan== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_akryl_skan== "32"}selected{/if}> 32 </option>
				 </select>
       </td>
       <td> - ILOŚĆ AKRYLOWYCH SKANOWANYCH&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
 </table>	

<hr style="width:100%;"/>

{include file="wybor_zebow.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-80px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_porcelana_7.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

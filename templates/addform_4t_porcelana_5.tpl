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
<body id="5">

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
            <li id="tab5" style="font-size:12px;color:black;"><div><div><span>Implanty<br />&nbsp;&nbsp;</span></div></div></li>
<!--             <li id="tab6"><div><div><span>Praca kombinowana</span></div></div></li>
 -->
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

<b style="font-size:16px;">MATERIAŁ:</b>
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:70%;">
  <tr id="material">
   <td><input type="radio" name="material" value="licowane porcelaną" style="float:right" {if $material== "licowane porcelaną"}checked{/if}/></td>
   <td> - LICOWANE PORCELANĄ</td>
   <td><input type="radio" name="material" value="cerkon" style="float:right" {if $material== "cerkon"}checked{/if}/></td>
   <td> - CERKON</td>
   <td><input type="radio" name="material" value="licowane kompozytem" style="float:right" {if $material== "licowane kompozytem"}checked{/if}/></td>
   <td> - LICOWANE KOMPOZYTEM</td>
   <td><input type="radio" name="material" value="belka" style="float:right" {if $material== "belka"}checked{/if}/></td>
   <td> - BELKA</td>
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

   <table border="0" style="font-size:16px;width:80%;">
     <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="korona_implant" value="korona z implantem" {if $korona_implant== "korona z implantem"}checked{/if}/> </td>
       <td> - KORONA Z IMPLANTEM </td>
       <td> <select name="liczba_korona_implant" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_korona_implant== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_korona_implant== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_korona_implant== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_korona_implant== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_korona_implant== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_korona_implant== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_korona_implant== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_korona_implant== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_korona_implant== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_korona_implant== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_korona_implant== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_korona_implant== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_korona_implant== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_korona_implant== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_korona_implant== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_korona_implant== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_korona_implant== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_korona_implant== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_korona_implant== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_korona_implant== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_korona_implant== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_korona_implant== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_korona_implant== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_korona_implant== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_korona_implant== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_korona_implant== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_korona_implant== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_korona_implant== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_korona_implant== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_korona_implant== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_korona_implant== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_korona_implant== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_korona_implant== "32"}selected{/if}> 32 </option>
				 </select>
   </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="przeslo" value="przęsło" {if $przeslo== "przęsło"}checked{/if}/> </td>
       <td> - PRZĘSŁO </td>
       <td> <select name="liczba_przeslo" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_przeslo== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_przeslo== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_przeslo== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_przeslo== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_przeslo== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_przeslo== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_przeslo== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_przeslo== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_przeslo== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_przeslo== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_przeslo== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_przeslo== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_przeslo== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_przeslo== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_przeslo== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_przeslo== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_przeslo== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_przeslo== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_przeslo== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_przeslo== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_przeslo== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_przeslo== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_przeslo== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_przeslo== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_przeslo== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_przeslo== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_przeslo== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_przeslo== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_przeslo== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_przeslo== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_przeslo== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_przeslo== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_przeslo== "32"}selected{/if}> 32 </option>
				 </select>
       </td>
       <td> - ILOŚĆ </td>
     </tr>
   </table>	

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:70%;">
     <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="lyzka" value="łyżka" {if $lyzka== "łyżka"}checked{/if}/> </td>
       <td> - ŁYŻKA </td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="wzornik" value="wzornik" {if $wzornik== "wzornik"}checked{/if}/> </td>
       <td> - WZORNIK </td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="przymiarka" value="przymiarka" {if $przymiarka== "przymiarka"}checked{/if}/> </td>
       <td> - PRZYMIARKA </td>
     </tr>
   </table>	

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:45%;">
     <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="surowa" value="surowa" {if $surowa== "surowa"}checked{/if}/> </td>
       <td> - SUROWA </td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="gotowa" value="gotowa" {if $gotowa== "gotowa"}checked{/if}/> </td>
       <td> - GOTOWA </td>
     </tr>
   </table>	

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:70%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="malowanie" value="malowanie" {if $malowanie== "malowanie"}checked{/if}/></td>
       <td> - MALOWANIE</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="dobor_koloru" value="dobór koloru" {if $dobor_koloru== "dobór koloru"}checked{/if}/></td>
       <td> - DOBÓR KOLORU</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="poprawka" value="poprawka" {if $poprawka== "poprawka"}checked{/if}/> </td>
       <td> - POPRAWKA </td>
      </tr>
   </table>

<hr style="width:100%;"/>

<b style="font-size:16px;">ELEMENTY:</b>
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:65%;">
  <tr>
   <td><input type="radio" name="elementy" style="height:45px;width:45px;" value="własne lekarza" {if $elementy== "własne lekarza"}checked{/if}/></td>
   <td> - WŁASNE LEKARZA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="radio" name="elementy" style="height:45px;width:45px;" value="zakupione" {if $elementy== "zakupione"}checked{/if}/></td>
   <td> - ZAKUPIONE PRZEZ NAS -</td>
   <td><b>CENA: </b></td>
   <td>  <input type="text" name="zakupione_cena" style="height:25px;width:55px;font-size:16px;" {if $zakupione_cena!="0"} value="{$zakupione_cena}" {/if}/>
   </td>
  </tr>
</table>

<hr style="width:100%;"/>

{include file="wybor_zebow.tpl"}

{include file="porcelana_na_metal_dentyna.tpl"}

{include file="porcelana_na_cerkon_dentyna.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-80px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_porcelana_5.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">

{include file="materialy_extra.tpl"}
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

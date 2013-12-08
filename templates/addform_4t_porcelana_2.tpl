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
<body id="2">

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
            <li id="tab2" style="color:black;"><div><div><span>Korona licowana&nbsp;na&nbsp;metalu</span></div></div></li>
            <li id="tab3"><div><div><span>Korona pełnoceramiczna</span></div></div></li>
            <li id="tab4"><div><div><span>Inlay&nbsp;/&nbsp;Onlay<br> / Licówka</span></div></div></li>
            <li id="tab5"><div><div><span>Implanty<br />&nbsp;&nbsp;</span></div></div></li>
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
  <input type="hidden" name="strona" value="zlecenia_tech/addform_2t.php">
</form>
</div>
 -->
<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">
<hr style="width:100%;"/>

<b style="font-size:16px;">MATERIAŁ:</b>
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:85%;">
  <tr id="material">
   <td><input type="radio" name="material" value="porcelana" style="float:right" {if $material== "porcelana"}checked{/if}/></td> 
   <td> - PORCELANA</td> 
   <td><input type="radio" name="material" value="kompozyt" style="float:right" {if $material== "kompozyt"}checked{/if}/></td> 
   <td> - KOMPOZYT</td> 
   <td><input type="radio" name="material" value="chrom kobalt" style="float:right" {if $material== "chrom kobalt"}checked{/if} /></td>
   <td> - CHROM KOBALT</td>
   <td><input type="radio" name="material" value="chrom nikiel" style="float:right" {if $material== "chrom nikiel"}checked{/if}/></td>
   <td> - CHROM NIKIEL</td>
   <td><input type="radio" name="material" value="złoto" style="float:right" {if $material== "złoto"}checked{/if}/></td>
   <td> - ZŁOTO</td>
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

<b style="font-size:16px;">OPCJE:</b>
<br /><br />
   <table border="0" style="font-size:16px;width:60%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="lyzka" value="łyżka" {if $lyzka== "łyżka"}checked{/if} /></td>
       <td> - ŁYŻKA</td>
       <td>&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="wzornik" value="wzornik" {if $wzornik== "wzornik"}checked{/if}/></td>
       <td> - WZORNIK</td>
          <td> <select name="liczba_wzornik" style="height:40px;width:60px;font-size:20px;">
                  <option {if $liczba_wzornik== ""}selected{/if} value>  </option>
                  <option {if $liczba_wzornik== "1"}selected{/if} value="1"> 1 </option>
                  <option {if $liczba_wzornik== "2"}selected{/if} value="2"> 2 </option>
              </select>
          </td>
       <td>&nbsp;</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="metal" value="metal" {if $metal== "metal"}checked{/if}/></td>
       <td> - METAL</td>
       <td>&nbsp;</td>
      </tr>
   </table>

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:60%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="surowa" value="surowa" {if $surowa== "surowa"}checked{/if}/></td>
       <td> - SUROWA</td>
<!--        <td> <input type="checkbox" style="height:45px;width:45px;" name="przymiarka_kompozytu" value="przymiarka kompozytu" {if $przymiarka_kompozytu== "przymiarka kompozytu"}checked{/if}/></td>
       <td> - PRZYMIARKA KOMPOZYTU</td>
 -->       <td> <input type="checkbox" style="height:45px;width:45px;" name="gotowa" value="gotowa" {if $gotowa== "gotowa"}checked{/if}/></td>

       <td> - GOTOWA</td>
       <td> <select name="liczba_gotowa" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_gotowa== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_gotowa== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_gotowa== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_gotowa== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_gotowa== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_gotowa== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_gotowa== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_gotowa== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_gotowa== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_gotowa== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_gotowa== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_gotowa== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_gotowa== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_gotowa== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_gotowa== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_gotowa== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_gotowa== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_gotowa== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_gotowa== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_gotowa== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_gotowa== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_gotowa== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_gotowa== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_gotowa== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_gotowa== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_gotowa== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_gotowa== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_gotowa== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_gotowa== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_gotowa== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_gotowa== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_gotowa== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_gotowa== "32"}selected{/if}> 32 </option>
				 </select>
		 </td>
		 <td> - ILOŚĆ </td>
      </tr>
   </table>

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:80%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="powt_metalu" value="powtórka metalu" {if $powt_metalu== "powtórka metalu"}selected{/if}/></td>
       <td> - POWTÓRKA METALU</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="ponowne_nap_porcel" value="ponowne napalenie porcelany" {if $ponowne_nap_porcel== "ponowne napalenie porcelany"}selected{/if}/></td>
       <td> - PONOWNE NAPALENIE PORCELANY</td>
       <td> <select name="liczba_ponowne_nap_porcel" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_ponowne_nap_porcel== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_ponowne_nap_porcel== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_ponowne_nap_porcel== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_ponowne_nap_porcel== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_ponowne_nap_porcel== "4"}selected{/if}> 4 </option>
		 		 <option value="5" {if $liczba_ponowne_nap_porcel== "5"}selected{/if}> 5 </option>
		 		 <option value="6" {if $liczba_ponowne_nap_porcel== "6"}selected{/if}> 6 </option>
		 		 <option value="7" {if $liczba_ponowne_nap_porcel== "7"}selected{/if}> 7 </option>
		 		 <option value="8" {if $liczba_ponowne_nap_porcel== "8"}selected{/if}> 8 </option>
		 		 <option value="9" {if $liczba_ponowne_nap_porcel== "9"}selected{/if}> 9 </option>
		 		 <option value="10" {if $liczba_ponowne_nap_porcel== "10"}selected{/if}> 10 </option>
		 		 <option value="11" {if $liczba_ponowne_nap_porcel== "11"}selected{/if}> 11 </option>
		 		 <option value="12" {if $liczba_ponowne_nap_porcel== "12"}selected{/if}> 12 </option>
		 		 <option value="13" {if $liczba_ponowne_nap_porcel== "13"}selected{/if}> 13 </option>
		 		 <option value="14" {if $liczba_ponowne_nap_porcel== "14"}selected{/if}> 14 </option>
		 		 <option value="15" {if $liczba_ponowne_nap_porcel== "15"}selected{/if}> 15 </option>
		 		 <option value="16" {if $liczba_ponowne_nap_porcel== "16"}selected{/if}> 16 </option>
		 		 <option value="17" {if $liczba_ponowne_nap_porcel== "17"}selected{/if}> 17 </option>
		 		 <option value="18" {if $liczba_ponowne_nap_porcel== "18"}selected{/if}> 18 </option>
		 		 <option value="19" {if $liczba_ponowne_nap_porcel== "19"}selected{/if}> 19 </option>
		 		 <option value="20" {if $liczba_ponowne_nap_porcel== "20"}selected{/if}> 20 </option>
		 		 <option value="21" {if $liczba_ponowne_nap_porcel== "21"}selected{/if}> 21 </option>
		 		 <option value="22" {if $liczba_ponowne_nap_porcel== "22"}selected{/if}> 22 </option>
		 		 <option value="23" {if $liczba_ponowne_nap_porcel== "23"}selected{/if}> 23 </option>
		 		 <option value="24" {if $liczba_ponowne_nap_porcel== "24"}selected{/if}> 24 </option>
		 		 <option value="25" {if $liczba_ponowne_nap_porcel== "25"}selected{/if}> 25 </option>
		 		 <option value="26" {if $liczba_ponowne_nap_porcel== "26"}selected{/if}> 26 </option>
		 		 <option value="27" {if $liczba_ponowne_nap_porcel== "27"}selected{/if}> 27 </option>
		 		 <option value="28" {if $liczba_ponowne_nap_porcel== "28"}selected{/if}> 28 </option>
		 		 <option value="29" {if $liczba_ponowne_nap_porcel== "29"}selected{/if}> 29 </option>
		 		 <option value="30" {if $liczba_ponowne_nap_porcel== "30"}selected{/if}> 30 </option>
		 		 <option value="31" {if $liczba_ponowne_nap_porcel== "31"}selected{/if}> 31 </option>
		 		 <option value="32" {if $liczba_ponowne_nap_porcel== "32"}selected{/if}> 32 </option>
				 </select>
		 </td>
		 <td> - ILOŚĆ </td>
      </tr>
   </table>

   <hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:80%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="malowanie" value="malowanie" {if $malowanie== "malowanie"}checked{/if}/></td>
       <td> - MALOWANIE</td>
       <td> <select name="przedzial_malowanie" style="height:40px;width:70px;font-size:20px;">
                <option value {if $przedzial_malowanie== ""}selected{/if}>  </option>
		<option value="1" {if $przedzial_malowanie== "1"}selected{/if}> 1 </option>
		<option value="2" {if $przedzial_malowanie== "2"}selected{/if}> 2 </option>
		<option value="3-5" {if $przedzial_malowanie== "3-5"}selected{/if}> 3-5 </option>
		<option value="6-8" {if $przedzial_malowanie== "6-8"}selected{/if}> 6-8 </option>
                <option value="9-14" {if $przedzial_malowanie== "9-14"}selected{/if}> 9-14 </option>
            </select>
       </td>
       <td> - ILOŚĆ, </td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="dobor_koloru" value="dobór koloru" {if $dobor_koloru== "dobór koloru"}checked{/if}/></td>
       <td> - DOBÓR KOLORU</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="frezowane_podparcie" value="frezowane podparcie" {if $frezowane_podparcie== "frezowane podparcie"}checked{/if}/></td>
       <td> - FREZOWANE PODPARCIE</td>
      </tr>
   </table>

   <hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:45%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="zatrzaski" value="zatrzaski" {if $zatrzaski== "zatrzaski"}checked{/if}/> </td>
		 <td> - ZATRZASKI </td>
       <td> <select name="liczbazatrzaskow" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczbazatrzaskow== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczbazatrzaskow== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczbazatrzaskow== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczbazatrzaskow== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczbazatrzaskow== "4"}selected{/if}> 4 </option>
				 </select>
		 </td>
		 <td> - SZTUK </td>
		</tr>
   </table>	

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:45%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="zasuwy" value="zasuwy" {if $zasuwy== "zasuwy"}checked{/if}/> </td>
		 <td> - ZASUWY&nbsp;&nbsp;&nbsp;&nbsp; </td>
       <td> <select name="liczbazasow" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczbazasow== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczbazasow== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczbazasow== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczbazasow== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczbazasow== "4"}selected{/if}> 4 </option>
				 </select>
		 </td>
		 <td> - SZTUK </td>
		</tr>
	</table>	

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:45%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="szklane_podparcie" value="szklane podparcie" {if $szklane_podparcie== "szklane podparcie"}checked{/if}/> </td>
		 <td> - SZKLANE PODPARCIE&nbsp;&nbsp;&nbsp;&nbsp; </td>
       <td> <select name="liczba_szklane_podparcie" style="height:40px;width:60px;font-size:20px;">
	    		 <option value {if $liczba_szklane_podparcie== ""}selected{/if}>  </option>
		 		 <option value="1" {if $liczba_szklane_podparcie== "1"}selected{/if}> 1 </option>
		 		 <option value="2" {if $liczba_szklane_podparcie== "2"}selected{/if}> 2 </option>
		 		 <option value="3" {if $liczba_szklane_podparcie== "3"}selected{/if}> 3 </option>
		 		 <option value="4" {if $liczba_szklane_podparcie== "4"}selected{/if}> 4 </option>
				 </select>
		 </td>
		 <td> - SZTUK </td>
		</tr>
	</table>	

<hr style="width:100%;"/>

   <table border="0" style="font-size:16px;width:80%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="rozowe_dziaslo" value="różowe dziąsło" {if $rozowe_dziaslo== "różowe dziąsło"}checked{/if}/></td>
       <td> - RÓŻOWE DZIĄSŁO</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="stopien_porcelanowy" value="stopień porcelanowy" {if $stopien_porcelanowy== "stopień porcelanowy"}checked{/if}/></td>
       <td> - STOPIEŃ PORCELANOWY</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="poprawka" value="poprawka" {if $poprawka== "poprawka"}checked{/if}/></td>
       <td> - POPRAWKA</td>
      </tr>
   </table>

<hr style="width:100%;"/>
{include file="wybor_zebow.tpl"}

{include file="porcelana_kiss_dentyna.tpl"}

{include file="porcelana_na_zloto_dentyna.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-82px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_porcelana_2.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">

{include file="materialy_extra.tpl"}
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

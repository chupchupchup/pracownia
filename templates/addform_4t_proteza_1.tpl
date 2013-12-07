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
<body id="1">

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
            <li id="tab1" style="color:black;"><div><div><span>Szkielet /<br /> Szynoproteza&nbsp;</span></div></div></li>
            <li id="tab2"><div><div><span>Całkowita<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab3"><div><div><span>Częściowa<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab4"><div><div><span>Szyny<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab5"><div><div><span>Naprawa<br />&nbsp;&nbsp;</span></div></div></li>
            <li id="tab6"><div><div><span>Prace<br />Pomocnicze</span></div></div></li>
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

<b style="font-size:16px;">RODZAJ:</b>
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material" style="height:60px;">
   <td><input type="radio" name="proteza" value="szkieletowa" {if $proteza== "szkieletowa"}checked{/if}/></td>
   <td> - SZKIELETOWA</td>
   <td><input type="radio" name="proteza" value="szkieletowa na zasuwach" {if $proteza== "szkieletowa na zasuwach"}checked{/if}/></td>
   <td> - SZKIELETOWA NA &nbsp;&nbsp;ZASUWACH</td>
   <td><input type="radio" name="proteza" value="szkieletowa na zatrzaskach" {if $proteza== "szkieletowa na zatrzaskach"}checked{/if}/></td>
   <td> - SZKIELETOWA NA &nbsp;&nbsp;ZATRZASKACH</td>
  </tr>
  <tr id="material">
   <td><input type="radio" name="proteza" value="szkieletowa na teleskopach" {if $proteza== "szkieletowa na teleskopach"}checked{/if}/></td>
   <td> - SZKIELETOWA NA &nbsp;&nbsp;TELESKOPACH</td>
   <td><input type="radio" name="proteza" value="szynoproteza" {if $proteza== "szynoproteza"}checked{/if}/></td>
   <td> - SZYNOPROTEZA</td>
   <td>
	  <select name="liczba_proteza" style="height:40px;width:70px;font-size:20px;">
	    <option {if $liczba_proteza== ""}selected{/if}>  </option>
	    <option {if $liczba_proteza== "1"}selected{/if} value="1"> 1 </option>
	    <option {if $liczba_proteza== "2"}selected{/if} value="2"> 2 </option>
          </select>
   </td>
   <td> - ILOŚĆ PROTEZ</td>
  </tr>
</table>

<hr style="width:100%;"/>
<b style="font-size:16px;">MATERIAŁ:</b>
<table cellspacing="0" cellpadding="0" border="0" style="width:58%;">
  <tr id="material">
   <td><input type="radio" name="material" value="micronium exclusiv" checked/></td>
   <td> - MICRONIUM EXCLUSIV</td>
  </tr>
</table>  

<hr style="width:100%;"/>
<table cellspacing="0" cellpadding="0" border="0" style="width:60%;">
  <tr id="material">
   <td><input type="checkbox" name="wzornik" value="wzornik" {if $wzornik== "wzornik"}checked{/if}/></td>
   <td> - WZORNIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="lyzka" value="łyżka indywidualna" {if $lyzka== "łyżka indywidualna"}checked{/if}/></td>
   <td> - ŁYŻKA INDYWIDUALNA</td>
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
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="klamralana" value="klamra lana" {if $klamralana== "klamra lana"}checked{/if}/></td>
   <td> - KLAMRA LANA</td>
   <td><input type="checkbox" name="klamradoginana" value="klamra doginana" {if $klamradoginana== "klamra doginana"}checked{/if}/></td>
   <td> - KLAMRA DOGINANA</td>
   <td><input type="checkbox" name="ciern" value="cierń lany" {if $ciern== "cierń lany"}checked{/if}/></td>
   <td> - CIERŃ LANY</td>
   <td><input type="checkbox" name="pelota" value="pelota" {if $pelota== "pelota"}checked{/if}/></td>
   <td> - PELOTA</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:70%;">
  <tr id="material">
   <td><input type="checkbox" name="metal" value="metal" {if $metal== "metal"}checked{/if}/></td>
   <td> - METAL</td>
   <td><input type="checkbox" name="akryl" value="akryl" {if $akryl== "akryl"}checked{/if}/></td>
   <td> - AKRYL</td>
   <td><input type="checkbox" name="przymiarka" value="przymiarka" {if $przymiarka== "przymiarka"}checked{/if}/></td>
   <td> - PRZYMIARKA&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="gotowa" value="gotowa" {if $gotowa== "gotowa"}checked{/if}/></td>
   <td> - GOTOWA</td>
   <td>
	  <select name="liczba_gotowa" style="height:40px;width:70px;font-size:20px;">
	    <option {if $liczba_gotowa== ""}selected{/if}>  </option>
	    <option {if $liczba_gotowa== "1"}selected{/if} value="1"> 1 </option>
	    <option {if $liczba_gotowa== "2"}selected{/if} value="2"> 2 </option>
          </select>
   </td>
   <td> - ILOŚĆ</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:65%;">
  <tr id="material">
   <td><input type="checkbox" name="poprawka" value="poprawka" {if $poprawka== "poprawka"}checked{/if}/></td>
   <td> - POPRAWKA</td>
   <td><input type="checkbox" name="ponowne_ust_zebow" value="ponowne ustawienie zebów" {if $ponowne_ust_zebow== "ponowne ustawienie zebów"}checked{/if}/></td>
   <td> - PONOWNE USTAWIENIE ZĘBÓW</td>
  </tr>
</table>

<hr style="width:100%;"/>

<table cellspacing="0" cellpadding="0" border="0" style="width:55%;">
  <tr id="material">
   <td><input type="checkbox" name="belka" value="belka" {if $belka== "belka"}checked{/if}/></td>
   <td> - BELKA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="zeby_ivoclar" value="zęby ivoclar" {if $zeby_ivoclar== "zęby ivoclar"}checked{/if}/></td>
   <td> - ZĘBY IVOCLAR</td>
   <td>
	  <select name="liczba_zeby_ivoclar" style="height:40px;width:70px;font-size:20px;">
	    <option {if $liczba_zeby_ivoclar== ""}selected{/if}>  </option>
	    <option {if $liczba_zeby_ivoclar== "1"}selected{/if} value="1"> 1 </option>
	    <option {if $liczba_zeby_ivoclar== "2"}selected{/if} value="2"> 2 </option>
          </select>
   </td>
   <td> - ILOŚĆ</td>
  </tr>
</table>

<hr style="width:100%;"/>

<!-- {include file="wybor_zebow.tpl"}
 -->
{include file="proteza_szkielet_szynoproteza_material.tpl"}

  <button class="b" style="background-color:#f1baba;margin-top:-80px;margin-left:-110px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_proteza_1.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">

{include file="materialy_extra.tpl"}
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

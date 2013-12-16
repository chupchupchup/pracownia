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

        <ul id="tabs" style="font-size:12px;color:white;">
            <li id="tab1"><div><div><span>Wkłady <br />K-K</span></div></div></li>
            <li id="tab2"><div><div><span>Korona licowana&nbsp;na&nbsp;metalu</span></div></div></li>
            <li id="tab3"><div><div><span>Korona pełnoceramiczna</span></div></div></li>
            <li id="tab4" style="font-size:12px;color:black;"><div><div><span>Inlay&nbsp;/&nbsp;Onlay<br> / Licówka</span></div></div></li>
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
  <input type="hidden" name="strona" value="zlecenia_tech/addform_3t.php">
</form>
</div>
 -->
<div style="margin-top:30px;margin-left:120px;">
<form name="dalej" method="post" action="pracownia.php">

<hr style="width:100%;"/>
<b style="font-size:16px;">LICÓWKA:</b>
<br /><br />
<table cellspacing="0" cellpadding="0" border="0" style="width:80%;">
  <tr id="material">
   <td><input type="checkbox" name="licowka_kompozyt" value="licówka kompozyt" {if $licowka_kompozyt== "licówka kompozyt"}checked{/if}/></td>
   <td> - LICÓWKA KOMPOZYT</td>
   <td> <input type="text" name="liczba_licowka_kompozyt" style="font-size: 16px; height:30px; width:80px;" {if $liczba_licowka_kompozyt gt 0}value="{$liczba_licowka_kompozyt}"{/if}></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="licowka_Empress" value="licówka Empress" {if $licowka_Empress== "licówka Empress"}checked{/if}/></td>
   <td> - LICÓWKA EMPRESS</td>
   <td> <input type="text" name="liczba_licowka_Empress" style="font-size: 16px; height:30px; width:80px;" {if $liczba_licowka_Empress gt 0}value="{$liczba_licowka_Empress}"{/if} ></input> </td>
   <td> - ILOŚĆ </td>
  </tr>
  
  <tr id="material">
   <td><input type="checkbox" name="licowka_cerkon" value="licówka cerkon" {if $licowka_cerkon== "licówka cerkon"}checked{/if}/></td>
   <td> - LICÓWKA CERKON</td>
   <td> <input type="text" name="liczba_licowka_cerkon" style="font-size: 16px; height:30px; width:80px;" {if $liczba_licowka_cerkon gt 0}value="{$liczba_licowka_cerkon}"{/if}></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
   <td><input type="checkbox" name="licowka_wypalana" value="licówka wypalana" {if $licowka_wypalana== "licówka wypalana"}checked{/if}/></td>
   <td> - LICÓWKA WYPALANA</td>
   <td> <input type="text" name="liczba_licowka_wypalana" style="font-size: 16px; height:30px; width:80px;"{if $liczba_licowka_wypalana gt 0}value="{$liczba_licowka_wypalana}"{/if} ></input> </td>
   <td> - ILOŚĆ </td>
  </tr>
  <tr id="material">
   <td><input type="checkbox" name="licowka_Gradia" value="licówka Gradia" {if $licowka_Gradia== "licówka Gradia"}checked{/if}/></td>
   <td> - LICÓWKA GRADIA</td>
   <td> <input type="text" name="liczba_licowka_Gradia" style="font-size: 16px; height:30px; width:80px;" {if $liczba_licowka_Gradia gt 0}value="{$liczba_licowka_Gradia}"{/if}></input> </td>
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
   <td><input type="checkbox" name="inlay_onlay_zloto" value="inlay onlay złoto" {if $inlay_onlay_zloto== "inlay onlay złoto"}checked{/if}/></td>
   <td> - INLAY/ONLAY ZŁOTO</td>
   <td> <input type="text" name="liczba_inlay_onlay_zloto" style="font-size: 16px; height:30px; width:80px;" {if $liczba_inlay_onlay_zloto gt 0}value="{$liczba_inlay_onlay_zloto}"{/if}></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

   <td><input type="checkbox" name="inlay_onlay_Gradia" value="inlay onlay Gradia" {if $inlay_onlay_Gradia== "inlay onlay Gradia"}checked{/if}/></td>
   <td> - INLAY/ONLAY GRADIA</td>
   <td> <input type="text" name="liczba_inlay_onlay_Gradia" style="font-size: 16px; height:30px; width:80px;" {if $liczba_inlay_onlay_Gradia gt 0}value="{$liczba_inlay_onlay_Gradia}"{/if}></input> </td>
   <td> - ILOŚĆ </td>
  </tr>

  <tr id="material">
   <td><input type="checkbox" name="inlay_onlay_kompozyt" value="inlay onlay kompozyt" {if $inlay_onlay_kompozyt== "inlay onlay kompozyt"}checked{/if}/></td>
   <td> - INLAY/ONLAY KOMPOZYT</td>
   <td> <input type="text" name="liczba_inlay_onlay_kompozyt" style="font-size: 16px; height:30px; width:80px;" {if $liczba_inlay_onlay_kompozyt gt 0}value="{$liczba_inlay_onlay_kompozyt}"{/if}></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

   <td><input type="checkbox" name="inlay_onlay_Empress" value="inlay onlay Empress" {if $inlay_onlay_Empress== "inlay onlay Empress"}checked{/if} /></td>
   <td> - INLAY/ONLAY EMPRESS</td>
   <td> <input type="text" name="liczba_inlay_onlay_Empress" style="font-size: 16px; height:30px; width:80px;" {if $liczba_inlay_onlay_Empress gt 0}value="{$liczba_inlay_onlay_Empress}"{/if} ></input> </td>
   <td> - ILOŚĆ </td>
  </tr>

  <tr id="material">
   <td><input type="checkbox" name="inlay_onlay_cerkon" value="inlay onlay cerkon" {if $inlay_onlay_cerkon== "inlay onlay cerkon"}checked{/if}/></td>
   <td> - INLAY/ONLAY CERKON</td>
   <td> <input type="text" name="liczba_inlay_onlay_cerkon" style="font-size: 16px; height:30px; width:80px;" {if $liczba_inlay_onlay_cerkon gt 0}value="{$liczba_inlay_onlay_cerkon}"{/if}></input> </td>
   <td> - ILOŚĆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

   <td><input type="checkbox" name="inlay_onlay_metal" value="inlay onlay metal" {if $inlay_onlay_metal== "inlay onlay metal"}checked{/if}/></td>
   <td> - INLAY/ONLAY METAL</td>
   <td> <input type="text" name="liczba_inlay_onlay_metal" style="font-size: 16px; height:30px; width:80px;" {if $liczba_inlay_onlay_metal gt 0}value="{$liczba_inlay_onlay_metal}"{/if}></input> </td>
   <td> - ILOŚĆ </td>
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
   <table border="0" style="font-size:16px;width:70%;">
      <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="malowanie" value="malowanie" {if $malowanie== "malowanie"}checked{/if}/></td>
       <td> - MALOWANIE</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="dobor_koloru" value="dobór koloru" {if $dobor_koloru== "dobór koloru"}checked{/if}/></td>
       <td> - DOBÓR KOLORU</td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="poprawka" value="poprawka" {if $poprawka== "poprawka"}checked{/if}/></td>
       <td> - POPRAWKA</td>
      </tr>
   </table>

    <hr style="width:100%;"/>
{include file="wybor_zebow.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-80px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_porcelana_4.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">
{include file="materialy_extra.tpl"}
</form>
</div>

        </div>

<div style="margin-top:50px;">
</div>

</body>
</html>

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
            <li id="tab1" style="font-size:12px;color:black;"><div><div><span>Wkłady <br />K-K</span></div></div></li>
            <li id="tab2"><div><div><span>Korona licowana&nbsp;na&nbsp;metalu</span></div></div></li>
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
<table cellspacing="0" cellpadding="0" border="0" style="width:58%;">
  <tr id="material">
   <td><input type="radio" name="material" value="chrom kobalt" {if $material== "chrom kobalt"}checked{/if}/></td>
   <td> - CHROM KOBALT</td>
   <td><input type="radio" name="material" value="chrom nikiel" {if $material== "chrom nikiel"}checked{/if}/></td>
   <td> - CHROM NIKIEL</td> 
   <td><input type="radio" name="material" value="złoto" {if $material== "złoto"}checked{/if}/></td>
   <td> - ZŁOTO</td> 
  </tr>
</table>  

<hr style="width:100%;"/>

<b style="font-size:16px;">RODZAJ WKŁADU:</b>
<br /><br />
   <table border="0" style="font-size:16px;width:85%;">
      <tr>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajwkladu" value="wkład zwykły" {if $rodzajwkladu== "wkład zwykły"}checked{/if}/></td>
       <td> - ZWYKŁY</td>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajwkladu" value="wkład dzielony" {if $rodzajwkladu== "wkład dzielony"}checked{/if}/></td>
       <td> - DZIELONY</td> 
       <td><input type="radio" style="height:45px;width:45px;" name="rodzajwkladu" value="wkład z cyrkonią" {if $rodzajwkladu== "wkład z cyrkonią"}checked{/if}/></td>
       <td> - Z CYRKONIĄ</td>
       <td><input type="radio" style="height:45px;width:45px;" name="rodzajwkladu" value="wkład z włóknem szklanym" {if $rodzajwkladu== "wkład z włóknem szklanym"}checked{/if}/></td>
       <td> - WŁÓKNO SZKLANE</td>
		</tr>
   </table>
   <br />
 
<hr style="width:100%;"/>
   <table border="0" style="font-size:16px;width:85%;">
     <tr>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajwkladu" value="metoda bezpośrednia" {if $rodzajwkladu== "metoda bezpośrednia"}checked{/if}/> </td>
       <td> - METODA BEZPOŚREDNIA </td>
       <td> <input type="radio" style="height:45px;width:45px;" name="rodzajwkladu" value="zatrzask kulowy" {if $rodzajwkladu== "zatrzask kulowy"}checked{/if}/> </td>
       <td> - Z ZATRZASKIEM KULOWYM </td>
       <td> <select name="liczba_wkladow" style="height:40px;width:60px;font-size:20px;">
	    		 <option {if $liczba_wkladow== ""}selected{/if} >  </option>
		 	 <option {if $liczba_wkladow== "1"}selected{/if} value="1"> 1 </option>
		 	 <option {if $liczba_wkladow== "2"}selected{/if} value="2"> 2 </option>
		 	 <option {if $liczba_wkladow== "3"}selected{/if} value="3"> 3 </option>
		 	 <option {if $liczba_wkladow== "4"}selected{/if} value="4"> 4 </option>
		 	 <option {if $liczba_wkladow== "5"}selected{/if} value="5"> 5 </option>
	    </select>
		 </td>
		 <td> - ILOŚĆ </td>
     </tr>
   </table>	

<hr style="width:100%;"/>
<b style="font-size:16px;">DODATKOWE:</b>
<br /><br />

   <table border="0" style="font-size:16px;width:50%;">
     <tr>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="wzornik" value="wzornik" {if $wzornik== "wzornik"}checked{/if}/></td>
       <td> - WZORNIK </td>
       <td> <input type="checkbox" style="height:45px;width:45px;" name="poprawka" value="poprawka" {if $poprawka== "poprawka"}checked{/if}/></td>
       <td> - POPRAWKA </td>
     </tr>
   </table>	

<hr style="width:100%;"/>

{include file="wybor_zebow.tpl"}

  <button class="b" style="background-color:#f1baba;margin-left:-110px;margin-top:-80px;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add" value="addform_4t_porcelana_1.php">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_5t.php">

{include file="materialy_extra.tpl"}
</form>
</div>

        </div>

</body>
</html>

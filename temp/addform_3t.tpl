<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
<body>

{literal}
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:60px;width:90px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
.touch {
	border:1px solid black;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size:15px;
	background-color:#dadbe9;
	color:#003366;
	width:65px;
	height:50px;
	}
#touchDiv,fieldset {text-align:center;}

</style>
{/literal}

<div align="center" style="margin-top:100px;margin-left:50px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij">COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_2i.php">
</form>
</div>

<div style="margin-top:150px;margin-left:200px;">
<form name="dalej" method="post" action="pracownia.php">

<hr />
<br />
<div style="margin-top:0px;font-size:20px;">
  <b>IDENTYFIKATOR ZLECENIA:</b>
  {$idzlecenianr}{$idzlecenia} 
</div>

<br />

<div style="font-size:20px;">
<hr>
   <br />
   <b>Termin oddania pracy:</b>&nbsp;<br />
    <b>DATA -</b>&nbsp;
    <select name="dataY" style="height:70px;width:85px;font-size:24px;">
		  <option>9999</option>
     {assign var=i value=2008}
     {section name=petla loop=20}
       {if $i eq $Y}
		  <option selected> {$i} </option>
		 {else}
		  <option> {$i} </option>
		 {/if}
      {assign var=i value=$i+1}
	  {/section}
    </select>
    <strong> - </strong>
    <select name="dataM" style="height:70px;width:60px;font-size:24px;">
     {assign var=i value=1}
     {section name=petla loop=12}
       {if $i eq $M}
		  <option selected> {$i} </option>
		 {else}
		  <option> {$i} </option>
		 {/if}
      {assign var=i value=$i+1}
	  {/section}
    </select>
    <strong> - </strong>
	 <select name="dataD" style="height:70px;width:60px;font-size:24px;">
     {assign var=i value=1}
     {section name=petla loop=31}
       {if $i eq $D}
		  <option selected> {$i} </option>
		 {else}
		  <option> {$i} </option>
		 {/if}
      {assign var=i value=$i+1}
	  {/section}
    </select>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
    <b>GODZINA -</b>&nbsp;
    <select name="godzG" style="height:70px;width:80px;font-size:24px;">
		  <option> brak </option>
     {assign var=i value=8}
     {section name=petla loop=15}
       {if $i eq $godz}
		  <option selected> {$i} </option>
		 {else}
		  <option> {$i} </option>
		 {/if}
      {assign var=i value=$i+1}
	  {/section}
    </select>
    <strong> : </strong>
    <select name="godzM" style="height:70px;width:60px;font-size:24px;">
       {if $min=="00"}
		  <option></option>
		  <option selected>00</option>
		  <option> 30 </option>
	 {elseif $min=="30"}
		  <option></option>
		  <option> 00 </option>
		  <option selected> 30 </option>
	 {elseif  $min!="00" && $min!="30"}
		  <option selected></option>
		  <option>00</option>
		  <option> 30 </option>
	{/if}
    </select>

</div>

   <br />

<div style="font-size:20px;">
  <hr>
  <br />
<table cellspacing="0" cellpadding="0" border="0" style="width:50%;">
 <tr>
  <td style="width:70px; height:50px;"><input type="radio" style="width:50px; height:50px;" name="rodzaj" value="porcelana" checked/></td>
  <td> - PORCELANA</td>
  <td style="width:70px; height:50px;"><input type="radio" style="width:50px; height:50px;" name="rodzaj" value="proteza" /></td>
  <td> - PROTEZA</td>
<!--   <td><input type="radio" style="width:50px; height:50px;" name="rodzaj" value="niesklasyfikowane" /></td>
  <td> - NIESKLASYFIKOWANE</td>
 --> </tr>
</table>
</div>
  
  <br />
  <hr>

<div style="margin-top:0px;margin-left:-150px;">
  <button class="b" style="background-color:#f1baba;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add1" value="stare" />
  <input type="hidden" name="strona" value="zlecenia_add/addform_4i.php" />
</div>

<input type="hidden" name="focusedField">

</form>
</div>

</body>
</html>

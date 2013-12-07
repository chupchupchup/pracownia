<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />
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
.touch {
	border:1px solid black;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size:18px;
	background-color:#dadbe9;
	color:#003366;
	width:65px;
	height:50px;
	}
#touchDiv,fieldset {text-align:center;}

</style>
{/literal}

<!-- klawiatura numeryczna na ekranie -->
{literal}
<script type="text/javascript">
function addIt(cKey)
{
dsel = document.forms["dalej"].elements["focusedField"];
selectedElement = (dsel.value!='')?dsel.value:"pacjent";

d = document.forms["dalej"].elements[selectedElement];
d.value =  (cKey.value=='cofnij') ? d.value.slice(0,-1) : d.value+cKey.value;
}
</script>
{/literal}

<div align="center" style="margin-top:50px;margin-left:50px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij">COFNIJ</button>
  <input type="hidden" name="{$cofnij0}" value="{$cofnij1}">
  <input type="hidden" name="strona" value="zlecenia_add/addform_4.php">
</form>
</div>

<div style="margin-top:50px;margin-left:50px;">
<form name="dalej" method="post" action="pracownia.php">

<div style="margin-top:0px;margin-left:150px;font-size:20px;">
  <b>IMIĘ i NAZWISKO PACJENTA:</b> 
  <input value="{$pacjent}" class="inputf" type="text" style="height:25px;width:250px;font-size:18px;" name="pacjent" onfocus="document.forms['dalej'].elements['focusedField'].value = this.name">
</div>
<div style="margin-top:5px;margin-left:150px;font-size:20px;">
  <b>TECHNIK:</b> 
            <select name="technik" style="margin-left:225px; font-size:18px;">
              {foreach key=key item=item from=$technicy}
                  <option>{$technicy[$key]}</option>
              {/foreach}
            </select>
</div>

<div style="font-size:20px;margin-left:150px;">
<hr>
   <b>Termin oddania pracy: </b>&nbsp;<br />
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
<hr>

</div>
<br />

<div id="touchDiv" style="margin-top:0px;margin-left:50px;">
<input class="touch" type="button" value="0" onclick="addIt(this)">
<input class="touch" type="button" value="1" onclick="addIt(this)">
<input class="touch" type="button" value="2" onclick="addIt(this)">
<input class="touch" type="button" value="3" onclick="addIt(this)">
<input class="touch" type="button" value="4" onclick="addIt(this)">
<input class="touch" type="button" value="5" onclick="addIt(this)">
<input class="touch" type="button" value="6" onclick="addIt(this)">
<input class="touch" type="button" value="7" onclick="addIt(this)">
<input class="touch" type="button" value="8" onclick="addIt(this)">
<input class="touch" type="button" value="9" onclick="addIt(this)">
<input class="touch" type="button" value="cofnij" onclick="addIt(this)" style="width:120px">
<br /><br /> 
<input class="touch" type="button" value="q" onclick="addIt(this)">
<input class="touch" type="button" value="w" onclick="addIt(this)">
<input class="touch" type="button" value="e" onclick="addIt(this)">
<input class="touch" type="button" value="ę" onclick="addIt(this)">
<input class="touch" type="button" value="r" onclick="addIt(this)">
<input class="touch" type="button" value="t" onclick="addIt(this)">
<input class="touch" type="button" value="y" onclick="addIt(this)">
<input class="touch" type="button" value="u" onclick="addIt(this)">
<input class="touch" type="button" value="i" onclick="addIt(this)">
<input class="touch" type="button" value="o" onclick="addIt(this)">
<input class="touch" type="button" value="ó" onclick="addIt(this)">
<input class="touch" type="button" value="p" onclick="addIt(this)">
<br /><br />
<input class="touch" type="button" value="a" onclick="addIt(this)">
<input class="touch" type="button" value="ą" onclick="addIt(this)">
<input class="touch" type="button" value="s" onclick="addIt(this)">
<input class="touch" type="button" value="ś" onclick="addIt(this)">
<input class="touch" type="button" value="d" onclick="addIt(this)">
<input class="touch" type="button" value="f" onclick="addIt(this)">
<input class="touch" type="button" value="g" onclick="addIt(this)">
<input class="touch" type="button" value="h" onclick="addIt(this)">
<input class="touch" type="button" value="j" onclick="addIt(this)">
<input class="touch" type="button" value="k" onclick="addIt(this)">
<input class="touch" type="button" value="l" onclick="addIt(this)">
<input class="touch" type="button" value="ł" onclick="addIt(this)">
<br /><br />
<input class="touch" type="button" value="z" onclick="addIt(this)">
<input class="touch" type="button" value="ż" onclick="addIt(this)">
<input class="touch" type="button" value="x" onclick="addIt(this)">
<input class="touch" type="button" value="ź" onclick="addIt(this)">
<input class="touch" type="button" value="c" onclick="addIt(this)">
<input class="touch" type="button" value="ć" onclick="addIt(this)">
<input class="touch" type="button" value="v" onclick="addIt(this)">
<input class="touch" type="button" value="b" onclick="addIt(this)">
<input class="touch" type="button" value="n" onclick="addIt(this)">
<input class="touch" type="button" value="ń" onclick="addIt(this)">
<input class="touch" type="button" value="m" onclick="addIt(this)">
<br /><br />
<input class="touch" type="button" value="/" onclick="addIt(this)">
<input class="touch" type="button" value=" " onclick="addIt(this)" style="width:300px;">
</div>

<div style="margin-top:-50px;margin-left:0px;">
  <button class="b" style="background-color:#f1baba;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_5.php" />
</div>

<input type="hidden" name="focusedField">
</form>

</body>
</html>

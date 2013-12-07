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

<div align="center" style="margin-top:50px;margin-left:50px;clear:both;float:left;">
 <form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij">COFNIJ</button>
  <input type="hidden" name="strona" value="zlecenia_tech/addform_2t.php">
</form>
</div>

<div style="margin-top:0px;margin-left:200px;">
<form name="dalej" method="post" action="pracownia.php">

<br />
<hr>
<div style="font-size:20px;">
   {foreach key=key item=item from=$wys}
       <b>{$key}: </b>{$item} <br>
   {/foreach}
</div>
<hr>

<div style="margin-top:-100px;margin-left:-150px;">
  <button class="b" style="background-color:#f1baba;" type="submit" name="dalej">DALEJ</button>
  <input type="hidden" name="add1" value="stare" />
  <input type="hidden" name="strona" value="zlecenia_add/addform_4t.php" />
</div>

</form>
</div>

</body>
</html>

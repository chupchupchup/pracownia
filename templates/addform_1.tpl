<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
<body>

{literal}
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:46px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:190px;width:300px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
</style>
{/literal}

<div align="center" style="margin-top:50px;margin-left:200px;float:left;">
<form name="addform1" method="post" action="pracownia.php">
  <button class="b" type="submit" name="nowe" >NOWE</button>
  <input type="hidden" name="add1" value="nowe">
  <input type="hidden" name="strona" value="zlecenia_add/addform_2.php">
</form>
</div>

<div style="margin-top:50px;margin-left:560px;">
<form name="addform1" method="post" action="pracownia.php">
  <button class="b" style="background-color:#f1baba;" type="submit" name="stare" >ISTNIEJĄCE</button>
  <input type="hidden" name="add1" value="stare">
  <input type="hidden" name="strona" value="zlecenia_add/addform_2i.php">
</form>
</div>
  
<br />
<br />
<br />
<br />
<br />
<br />

<div style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:25px;margin-left:20px;">
<b>WPROWADŹ ZLECENIE:</b>
<br />
- JEŻELI JEST TO NOWE ZLECENIE WYBIERZ OPCJĘ: <i><b>NOWE</b></i>
<br />
- JEŻELI JUŻ BYŁO WPROWADZANE WYBIERZ OPCJĘ: <i><b>ISTNIEJĄCE</b></i>
</div>

</body>
</html>

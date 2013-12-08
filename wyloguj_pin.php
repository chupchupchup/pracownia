<?php
session_start();
if($_SESSION['autoryzacjapracowni']=='razdwatrzybabajagapatrzy'){
   session_destroy();
?>


<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel="stylesheet" href="css/login.css" type="text/css">
</head>
<body>

<style type="text/css">
.buttonf {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16px; color: #666688; text-decoration: none;
	background-color: #EDEDED; border: 1px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; clip:
	rect(69px 29px 29px 29px);height: 100px;
}
</style>
<br /><br /><br /><br /><br /><br />
<div style="font-weight: BOLD;font-size: 20;text-align: CENTER;vertical-align: MIDDLE;horizontal-align: MIDDLE;text-decoration: NONE;letter-spacing: 2;word-spacing: 5;">
  <button type="button" class="buttonf" onclick="parent.location.href='indexpin.php' "> <b> NASTĄPIŁO WYLOGOWANIE Z SYSTEMU:<br /><br /> >>> NACIŚNIJ ABY ZALOGOWAĆ PONOWNIE <<< </b></button>
</div>

</body>
</html>

<?php
   //header("Location: index.php");
}
else {
  header("Location: index.php");
}
?>

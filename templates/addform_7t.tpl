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
<body>

{literal}
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:60px;width:120px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}

div#cont
{
  position:relative;
/*   border: 1px solid #808080;
  background: #d3d3d3;
*/  max-width: 100%;
  min-width: 1020px;
  height:100%;
  margin: auto;
}

div#first-column
{
  position:absolute;
  top: 0;
  bottom: 0;
  left: 0;
  float:left;
  border:0px solid black; 
  width:150px;
  margin: 3px;
}

div#second-column
{
  position:absolute;
  margin: 3px 3px 3px 160px;
  border:0px solid black; 
  width:600px;
}

div#third-column
{
  position:absolute;
  margin: 3px 3px 3px 700px;
  border:0px solid black; 
  width:500px;
  height:480px;
}

</style>
{/literal}

<div id="cont" >

<div id="first-column">

<!-- <div align="center" style="margin-top:0px;margin-left:10px;">
<form name="cofnij" method="post" action="pracownia.php">
  <button class="b" type="submit" name="cofnij"><b>COFNIJ</b></button>
  <input type="hidden" name="cofka" value="tak">
  <input type="hidden" name="strona" value="zlecenia_tech/addform_6t.php">
</form>
</div>
 -->
<div align="center" style="margin-top:60px;margin-left:10px;">
 <button class="b" style="width:120px;height:60px;" type="button" onclick="window.open('./biuro/drukuj_wz.php?kwota={$cena}&wzk={$wz}&id_zlec={$idzleceniapoz}&nr_zlec={$idzlecenianr}&opiszlecenia={$opiszlecenia}&pacjent={$pacjent}&datazwrotu={$zwrotzleceniadata}', 'drukowanie', 'toolbar=no, scrollbars=no, resizable=yes, status=no, menubar=no, location=no, directories=no, width=850, height=400')">
   <b>DRUKUJ WZ</b>
 </button>
</div>

<div align="center" style="margin-top:60px;margin-left:10px;">
 <form name="zakoncz" method="post" action="pracownia.php">
  <button class="b" style="width:120px;height:80px;" type="submit" name="zakoncz"><b>NASTĘPNE <br>ZLECENIE</b></button>
  <input type="hidden" name="strona" value="zlecenia_tech/addform_1.php">
</form>
</div>

</div> <!-- koniec first-column -->

<div id="second-column">
  <table cellspacing="0" cellpadding="5" bgcolor="White" style="margin-left:0px;" border="1" frame="hsides" rules="rows">

      <tr bgcolor="#D6D9FE">
            <td style="width:150px; height:25px; font-size: 11px;"><b> WYKONANE ZLECENIE: </b></td>
            <td style="width:300px; height:25px; font-size: 11px;"><b>  </b></td>
      </tr>

    {foreach key=key item=item from=$tablica_wynikow}
       {if $item =="" || $item =="0" || $key =="zakladka" || $key =="wagazlota" || $key =="idzleceniapoz_tmp" || $key =="kategoria_wybor" || $key =="wpis" || $key =="nr_rozliczenia" || $key =="wpisujacy" || $key =="zwrotzleceniagodz" }
       {elseif $key =="idzlecenianr"}
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> idzlecenia </b></td>
          <td style="width:300px; height:25px; font-size: 12px;"><b>  {$item}
       {elseif $key =="idzleceniapoz" }
             {$item} </b></td>
         </tr>
       {elseif $key =="cena" }
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> cena końcowa </b></td>
          <td style="width:300px; height:25px; font-size: 12px;"><b> {$item} zł</b></td>
         </tr>
       {else}
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> {$key} </b></td>
          <td style="width:300px; height:25px;  font-size: 12px;"><b> {$item} </b></td>
         </tr>
       {/if}
    {/foreach}
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> wagazlota </b></td>
          <td style="width:300px; height:25px; font-size: 12px;"><b> {$wagazlota} gram</b></td>
         </tr>
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> opiszlecenia </b></td>
          <td style="width:300px; height:25px; font-size: 12px;"><b> {$opiszlecenia} </b></td>
         </tr>
         <tr>
          <td style="width:150px; height:25px; font-size: 10px;"><b> WZ </b></td>
          <td style="width:300px; height:25px; font-size: 12px;"><b> {$wz} </b></td>
         </tr>

  </table>
</div> <!-- koniec second-column -->

<div id="third-column">
  <iframe src="./zlecenia_tech/edytujrozliczenietech.php?id_zlec={$idzleceniapoz}&nr_zlec={$idzlecenianr}&punkty={$punkty}&amp" frameborder="1" width="100%" height="100%"></iframe>
</div>

</div>

</body>
</html>

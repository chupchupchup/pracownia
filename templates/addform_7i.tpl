<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
  <link rel='stylesheet' type='text/css' href='css/addform_tabs.css' />

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
</style>
{/literal}

 <table style="width:95%;margin-left:10px;" border="1" FRAME="hsides" RULES="rows" bgcolor="White" CELLPADDING="6" CELLSPACING="0">

      <tr class="inputfr">
            <td style="width:300px; height:30px; font-size: 11px;"><b> KATEGORIA </b></td>
            <td style="width:30px; height:30px; font-size: 11px;"><b> </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b> ID ZLECENIA </b></td>
            <td style="width:500px; height:30px; font-size: 11px;"><b> DATA WPISANIA </b></td>
<!--             <td style="width:300px; height:30px; font-size: 11px;"><b> ZLECENIE </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b>  </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b>  </b></td>
            <td style="width:300px; height:30px; font-size: 11px;"><b>  </b></td>
 -->      </tr>

{section name=tablica loop=$tablica_wynikow}

   {section name=f loop=$tablica_wynikow[tablica]}

      <tr  bgcolor="{$color}" onmouseover="this.style.background='#ccffcc'" onmouseout="this.style.background='{$color}'">
<!--             <a href="pracownia.php?strona=zlecenia_add/addform_4.php&zleceniodawca={$tablica_wynikow[f][1]}&amp">
 -->
              <td style="width:300px; height:20px; font-size: 11px;"><b> {$tablica_wynikow[tablica][f][0]} </b></td>
              <td style="width:30px; height:20px; font-size: 11px;"><b> {$tablica_wynikow[tablica][f][1]} </b></td>
              <td style="width:300px; height:20px; font-size: 11px;"><b> {$tablica_wynikow[tablica][f][2]} </b></td>
              <td style="width:300px; height:20px; font-size: 11px;"><b> {$tablica_wynikow[tablica][f][3]} </b></td>

<!--           {assign var=v value=0}
        {foreach key=key item=item from=$tablica_wynikow[f]}
              <td style="width:300px; height:20px; font-size: 11px;"><b> {$tablica_wynikow[f][$v]} </b></td>
          {assign var=v value=$v+1}
        {/foreach}
 -->
<!--              </a>
 -->
      </tr>
   {/section}

{/section}

  </table>

<div align="center" style="margin-top:0px;margin-left:10px;margin-top:40px;clear:both;float:left;">
 <form name="zakoncz" method="post" action="pracownia.php">
  <button class="b" style="width:200px;height:100px;" type="submit" name="zakoncz" ><b>NOWE ZLECENIE</b></button>
  <input type="hidden" name="strona" value="zlecenia_add/addform_1.php">
</form>
</div>

</body>
</html>
<html>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />

    <!-- compliance patch for microsoft browsers -->
    <!--[if lt IE 7]>
        <link rel='stylesheet' type='text/css' href='../css/ie.css' />
        <script src="../ie7/ie7-standard-p.js" type="text/javascript">
            IE7_PNG_SUFFIX = '.png';
        </script>

    <![endif]-->
<body>
{literal}
<script language="JavaScript" type="text/javascript">
<!--
  function displayWindow(url, width, height, resize){
    var Win = window.open(url, "displayWindow", 'width='+width+',height='+height+',resizable='+resize+',scrollbars=yes,menubar=no,left=0,top=0');

  }
//-->
</script>

<script language='JavaScript'>
      checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
	  document.getElementById('myform').elements[i].checked = checked;
	}
      }
</script>
	
{/literal}

 {if $drukuj == "dzis"}
   <table>
       <a href="../protetyka/biuro/druk.php" target="_blank" style="font-weight:bold;color:font-size:14px;color:black;display:block;">
     <tr>
       <td>
         <a href="../protetyka/biuro/druk.php" target="_blank" style="font-weight:bold;color:font-size:14px;color:black;display:block;">
           <img src="../protetyka/gfx/printer.png" width="26" height="26" border="0" />
         </td></a>
       
       <td>
         <a href="../protetyka/biuro/druk.php" target="_blank" style="float:left;font-weight:bold;color:font-size:14px;color:black;display:block;">
           <i> < DRUKUJ ></i>
         </a>
       </td>
     </tr>
   </table>
 {/if}

<form name="form_tech" method="post" action="./biuro.php" id="myform">
<input name="strona" type="hidden" value="rozliczenia">
<input name="rozlicz" type="hidden" value="tech">
<input name="technik" type="hidden" value="{$technik}">

<table cellspacing="1" cellpadding="1">

<tr style="background-image:url(gfx/tbl_th.png); background-repeat:repeat-x; margin-left:10px;margin-bottom:0px;height:22px; width:850px;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="float:left;height:25px;width:{$item}px;text-align:center;" nowrap><b>{$key}</b></td>
  {/foreach}
</tr>

{assign var=punkty value=0}
{assign var=wycena value=0}

{assign var=nr_pracy value=0}
{section name=f loop=$tablica_wynikow}
<a style="color:white;" href="./biuro.php?strona=rozliczenia&edycja=edycja&nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&amp" target="_blank">
<tr onmouseover="this.style.background='#FFE3C7'" onmouseout="this.style.background='#ECECEC'" style="background:#ECECEC; margin-left:10px;margin-top:0px;margin-bottom:0px;height:22px; width:850px;">
    <td nowrap style>
      <input type="checkbox" name="nr_{$nr_pracy}" value="{$tablica_wynikow[f][0]}" />
      <input type="hidden" name="zlec_poz_{$nr_pracy}" value="{$tablica_wynikow[f][1]}" />
    </td>
  {assign var=nr_pracy value=$nr_pracy+1}

  {assign var=v value=0}
  {foreach key=key item=item from=$tablica_wynikow[f]}
      {if $v < 5}<td nowrap style="float:left;text-align:center;font-size:12px;">{$tablica_wynikow[f][$v]|truncate:40}&nbsp;</td>
      {else}
      {/if}
  {assign var=v value=$v+1}
  {/foreach}
    {assign var=punkty value=$punkty+$tablica_wynikow[f][3]}
    {assign var=wycena value=$wycena+$tablica_wynikow[f][4]}

        <td nowrap style="float:left;text-align:center;font-size:12px;">
          <a href="javascript:displayWindow('./biuro/czyrozlicz_tech.php?nr_zlec={$tablica_wynikow[f][0]}&id_zlec={$tablica_wynikow[f][1]}&technik={$tablica_wynikow[f][2]}&nr_rozliczenia={$tablica_wynikow[f][4]}&tabela={$tablica_wynikow[f][5]}&amp',500,300,'yes')" style="font-size:14px;;color:black;display:block;text-decoration:none;">
            <b> Tak/Nie </b>
          </td></tr></a>
        
</a>
{/section}

<tr style="line-height:2px;margin-top:0px;margin-left:10px;background:#FF9900;">
  {foreach key=key item=item from=$tablica_opisy}
    <td style="height:1px;">&nbsp;</td>
  {/foreach}
</tr>
</table>

Suma punktow technika:  {$punkty}<br />
Suma wyceny:  {math equation="x" x=$wycena format="%.2f"} zł
<br /><br />
<!-- <a href="./biuro.php?strona=rozliczenia&technik={$technik}&rozlicz=tech&amp" style="font-weight:bold;color:font-size:14px;color:black;display:block;">
 < -- PRZENIE| ROZLICZENIE DO ARCHIWUM -- >
</a>
 -->

  <table style="margin-left:0px;width:710px;" border="0" cellpadding="1" cellspacing="0">
    <tr>
      <td style="width:360px;color:#000000;">
      WYBIERZ DATE ROZLICZENIA: 
             <select name="datarozliczenia" style="margin-left:5px;">
              {foreach key=key item=item from=$datarozliczenia_tab}
                  <option>{$datarozliczenia_tab[$key]}</option>
              {/foreach}
            </select>
      </td>
      <td style="width:350px;color:#ffffff;" align="center">
        <input value="Wyczysc" name="reset" type="reset" style="background:#C7C7FF;color:#998888;"/>
        <input value="Rozlicz zaznaczone" name="submit" type="submit" style="background:#CC0000;color:#ffffff;">
      </td>
    </tr>
  </table>

<!--   <table style="margin-left:10px;width:90%;" border="0" cellpadding="8" cellspacing="0">
    <tr>
      <td style="width:300px;color:#ffffff;">
        <input value="Wyczysc" name="reset" type="reset" style="background:#C7C7FF;color:#998888;"/>
        <input value="Rozlicz zaznaczone" name="submit" type="submit" style="background:#CC0000;color:#ffffff;">
      </td>
    </tr>
  </table>
 -->

<input type="hidden" name="liczba_el_roz" value="{$nr_pracy}" />
</form>

</body>
</html>

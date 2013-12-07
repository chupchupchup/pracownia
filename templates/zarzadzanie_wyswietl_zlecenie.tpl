<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
<!--   <META HTTP-EQUIV="Refresh" CONTENT="10">
 -->
  <link rel="stylesheet" type="text/css" href="css/addform_tabs.css" />

        <!-- compliance patch for microsoft browsers -->
        <!--[if lt IE 7]>
            <link rel='stylesheet' type='text/css' href='tabs-ie.css' />
            <script src="./ie7/ie7-standard-p.js" type="text/javascript"></script>
        <![endif]-->
        
</head>
<body style="margin-top:20px;margin-left:20px;">
<br>
<table style="margin-left:10px;margin-top:0px;">
 <tr>
  <td style="width:400px;"> <h3>EDYCJA ZLECENIA:</h3> </td>
  <td style="width:200px;">
    <button style="width:160px;height:25px;background-color:#CCFF99;" type="button" onclick="javascript:location.reload()">
      <b>ODŚWIEŻ STRONĘ</b>
    </button>
  <td style="width:200px;">
    <button style="width:160px;height:25px;background-color:#E70000;color:#E8E8E8" type="button" onclick="javascript:window.opener='x';window.open('','_parent','');window.close();">
      <b>ZAMKNIJ STRONĘ</b>
    </button>
</td>
  </td>
 </tr>
</table>

<hr style="width:90%;height: 2px;border: 0px;color: #333;background-color: #333;"/>

{literal}
<script language="JavaScript" type="text/javascript">
<!--
  function displayWindow(url, width, height, resize){
    var Win = window.open(url, "displayWindow", 'width='+width+',height='+height+',resizable='+resize+',scrollbars=yes,menubar=no,left=0,top=0');

  }
//-->
</script>
<style type="text/css">
.b {
	font-family:Verdana, Arial, Helvetica, sans-serif; font-size:16px; color:#666688; text-decoration:none;
	background-color:#EDEDED; border:1px #5E788A outset; padding-top:0px; padding-right:0px; padding-bottom:0px;
   padding-left:0px; height:60px;width:120px; margin:0px 0px 0px 0px;text-shadow:#ff3333;
}
.inputfr {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #E5E5FF; border: 1px #0066CC outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; 		
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

.inputf {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px; color: #000000; text-decoration: none;
	background-color: #FFFFE6; border: 1px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

form {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; color: #000000; text-decoration: none;
	border: 0px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 10px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}
.tab {
        font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000000; text-decoration: none;
}

</style>
{/literal}

{assign var=l value=0}
{section name=a loop=$tablica_wynikow}

<div>
  <table cellspacing="0" cellpadding="5" bgcolor="White" style="margin-left:80px;float:left;" border="1" frame="hsides" rules="rows">

      <tr bgcolor="#D6D9FE">
            <td style="width:10px; height:25px; font-size: 12px;"><b>  </b></td>
            <td style="width:200px; height:25px; font-size: 12px;" nowrap><b> EDYTOWANE ZLECENIE: </b></td>
      </tr>


  {section name=f loop=$tablica_wynikow[$l]}
        <tr>
          <td style="width:30px; height:25px; font-size: 14px;background-color: #FFFFE6;"> kategoria: </td>
          <td style="width:300px; height:25px; font-size: 14px;background-color: #FFFFE6;"><b> {$tablica_wynikow[$l][f][0]} </b></td>
        </tr>
        <tr>
          <td style="width:30px; height:25px; font-size: 14px;background-color: #FFFFE6;"> nr: </td>
          <td style="width:300px; height:25px; font-size: 14px;background-color: #FFFFE6;"><b> {$tablica_wynikow[$l][f][1]}{$tablica_wynikow[$l][f][2]} </b></td>
        </tr>
        <tr>
          <td style="width:30px; height:25px; font-size: 14px;background-color: #FFFFE6;"> wpisano: </td>
          <td style="width:300px; height:25px; font-size: 14px;background-color: #FFFFE6;"><b>  {$tablica_wynikow[$l][f][3]}</b></td>
        </tr>
        <tr>
          <td style="width:30px; height:25px; font-size: 14px;background-color: #FFFFE6;"> wpisujący: </td>
          <td style="width:300px; height:25px; font-size: 14px;background-color: #FFFFE6;"><b> {$tablica_wynikow[$l][f][4]} </b></td>
        </tr>
        <tr>
          <td style="width:30px; height:25px; font-size: 14px;background-color: #FFFFE6;"> INFO: </td>
          <td style="width:300px; height:25px; font-size: 14px;background-color: #FFFFE6;"><b>

    {assign var=v value=5}
    {foreach key=key item=item from=$tablica_wynikow[$l][f]}
      {if $tablica_wynikow[$l][f][$v]=="" || $tablica_wynikow[$l][f][$v]=="0" }
      {else}

           {$tablica_wynikow[$l][f][$v]};

      {/if}
    {assign var=v value=$v+1}
    {/foreach}
  {/section}
           </b></td>
        </tr>

  </table>
<div>

<div style="margin-left:420px;">
<form name="form" action="./biuro.php" method="post">
  <input type="hidden" name="strona" value="zlecenia" />
  <input type="hidden" name="form_wyswietl_zlecenie" value="form1" />
  <input type="hidden" name="nr_zlec" value="{$nr_zlec}" />
  <input type="hidden" name="id_zlec" value="{$id_zlec}" />
  <input type="hidden" name="data" value="{$data[$l]}" />
  <input type="hidden" name="tabela" value="{$tabela[$l]}" />
  <table class="tab">
    <tr class="inputfr">
     <td>Pacjent: </td>
     <td colspan=2><input type="text" class="inputf" name="pacjent" value="{$pacjent[$l]}" size="30"/></td>
    </tr>
    <tr class="inputfr">
     <td>Waga Złota: </td>
     <td colspan=2><input type="text" class="inputf" name="wagazlota" value="{$wagazlota[$l]}" size="10"/> w gramach</td>
    </tr>
    <tr class="inputfr">
     <td>Zwrot zlecenia data: </td>
     <td colspan=2><input type="text" class="inputf" name="zwrotzleceniadata" value="{$zwrotzleceniadata[$l]}" size="10"/></td>
    </tr>
    <tr class="inputfr">
     <td>Zwrot zlecenia godzina: </td>
     <td colspan=2><input type="text" class="inputf" name="zwrotzleceniagodz" value="{$zwrotzleceniagodz[$l]}" size="5"></td>
    </tr>
    <tr class="inputfr">
     <td>Zlecenie: </td>
     <td colspan=2>
       <select name="zlecenie" class="inputf">
       {foreach key=key item=item from=$zlecenie_tab}
         {if $zlecenie_tab[$key] eq $zlecenie[$l]}
           <option selected>{$zlecenie_tab[$key]}</option>
         {else}
           <option>{$zlecenie_tab[$key]}</option>
         {/if}
       {/foreach}
       </select>
     </td>
    </tr>
    <tr class="inputfr">
     <td>UWAGI: </td>
     <td colspan=2><textarea name="uwagi" class="inputf" cols="30" rows="4">{$uwagi[$l]}</textarea></td>
    </tr>
    <tr class="inputfr">
     <td>Technik: </td>
     <td colspan=2><select name="technicy" class="inputf">
         {foreach key=key item=item from=$technicy}
         {if $technicy[$key] eq $tech[$l]}
           <option selected>{$technicy[$key]}</option>
         {else}
           <option>{$technicy[$key]}</option>
         {/if}
         {/foreach}
         </select>
     </td>
    </tr>
    <tr class="inputfr">
     <td>Etap zlecenia: </td>
     <td colspan=2>
       <select name="wpis" class="inputf">
       {foreach key=key item=item from=$wpis_tab}
         {if $wpis_tab[$key] eq $wpis[$l]}
           <option selected>{$wpis_tab[$key]}</option>
         {else}
           <option>{$wpis_tab[$key]}</option>
         {/if}
       {/foreach}
       </select>
     </td>
    </tr>
<!--     <tr class="inputfr">
     <td>
      NR Rozliczenia = {$nr_rozliczenia[$l]}
     </td>
    </tr>
 -->
    <tr><td>&nbsp; </td></tr>
    <tr><td>
        <a href="javascript:displayWindow('./biuro/edytujrozliczenielek.php?tabela={$tabela[$l]}&zwrotzleceniadata={$zwrotzleceniadata[$l]}&id_zlec={$id_zlec}&nr_zlec={$nr_zlec}&data={$data[$l]}&amp',600,680,'yes')">
        [ ROZLICZ LEKARZA ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        <td>
        <a href="javascript:displayWindow('./biuro/edytujrozliczenietech.php?tabela={$tabela[$l]}&zwrotzleceniadata={$zwrotzleceniadata[$l]}&id_zlec={$id_zlec}&nr_zlec={$nr_zlec}&data={$data[$l]}&technik_prowadzacy={$tech[$l]}&amp',600,340,'yes')">
        [ ROZLICZ TECHNIKA ]</a>
        </td>
        <td>
        	{if $deklaracja[$l] eq ''}
        		&nbsp;
        	{else}
        		<a href="javascript:displayWindow('./inc/fpdf/out/{$deklaracja[$l]}', 600,340,'yes')">
   				[ DRUKUJ DEKLARACJĘ ZGODNOŚCI ]</a>
   			{/if}
   		</td>
    </tr>
    <tr><td>&nbsp; </td></tr>
    <tr>
      <td><input value="Wyczyść" name="reset" type="reset" style="background:#D3D3D3;"/></td>
      <td colspan=2><input value="Zatwierdź" name="submit" type="submit" style="background:#C7C7FF;"></td>
    </tr>
  </table>
</form>

</div>

<!-- datawpis={$data[$l]}  id_zlec={$id_zlec} nr_zlec={$nr_zlec}
 -->
<hr style="width:90%;height: 2px;border: 0px;color: #333;background-color: #333;"/>
     {assign var=l value=$l+1}
{/section}

</body>
</html>

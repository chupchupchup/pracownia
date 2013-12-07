<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//PL" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='pl' id=''>
<head>
    <link rel='stylesheet' type='text/css' href='./css/szukaj_form_rozlicz.css' />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
    <!-- compliance patch for microsoft browsers -->
    <!--[if lt IE 7]>
        <script src="./ie7/ie7-standard-p.js" type="text/javascript">
            IE7_PNG_SUFFIX = '.png';
        </script>
            <link rel='stylesheet' type='text/css' href='./css/szukaj-ie.css' />
    <![endif]-->
</head>
<body bgcolor="#F2F4FF" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<div id='content'>
  <h1>
    <span class='inner'>
    </span>
    <span style='color: #c03;'>SZUKAJ</span> W ROZLICZENIACH
  </h1>

 <div id='body'>

  <div id='innerbody'>
  <!-- Begin Content -->

  <form name="form_szukaj" method="post" action="./biuro.php?strona=rozliczenia&amp">
   <input type="hidden" name="szukaj" value="zaawansowane" />
      <div class='column1'>
  <fieldset>
    <legend>zaawansowana forma wyszukiwania rozliczeń</legend>
    <table class='form'>
      <tbody>

        <tr>
          <td class='label'>
            <label for='pacjent'>
              Pacjent:
            </label>
          </td>
          <td class='input'>
            <input name='pacjent' id='pacjent' size='25' maxlength='50' value='' class='i' />
          </td>
        </tr>

        <tr>
          <td class='label'>
            <label for='zleceniodawca'>
              Lekarz / Zleceniodawca:
            </label>
          </td>
          <td class='input'>
            <select name='zleceniodawca'>
              {foreach key=key item=item from=$zleceniodawca}
                  <option>{$zleceniodawca[$key]}</option>
              {/foreach}
            </select>
          </td>
        </tr>
<!--
        <tr>
          <td class='label'>
            <label for='idzewnetrzne'>
              Identyfikator zewnętrzny:
            </label>
          </td>
          <td class='input'>
            <input name='idzewnetrzne' id='idzewnetrzne' size='25' maxlength='50' value='' class='i' />
          </td>
        </tr>
-->
        <tr>
          <td class='label'>
            <label for='realizacja'>
              Etap realizacji zlecenia:
            </label>
          </td>

          <td class='input'>
            <select name='etap' id='etap' >
              <option ></option>
              <option >roz</option>
              <option >zap</option>
            </select>
          </td>
        </tr>

        <tr>
          <td class='label'>
            <label for='data'>
<!--               <input type="checkbox" style="" name="czyData" value="tak">
 -->              Data (zakres) od:
            </label>
          </td>

          <td class='input'>
            <select name='dataodY' id='dataodY' >
              {foreach key=key item=item from=$rok}
              {if $rok[$key] eq $Y}
               <option selected>{$rok[$key]}</option>
               {else}
               <option >{$rok[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='dataodM' id='dataodM' >
              {foreach key=key item=item from=$miesiac}
              {if $miesiac[$key] eq "01"}
               <option selected>{$miesiac[$key]}</option>
               {else}
               <option >{$miesiac[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='dataodD' id='dataodD' >
              {foreach key=key item=item from=$dzien}
              {if $dzien[$key] eq "01"}
               <option selected>{$dzien[$key]}</option>
               {else}
               <option >{$dzien[$key]}</option>
              {/if}
              {/foreach}
            </select>
          </td>
        </tr>
        <tr>
          <td class='label'>
            <label for='data'>
              do:
            </label>
          </td>

          <td class='input'>
            <select name='datadoY' id='datadoY' >
              {foreach key=key item=item from=$rok}
              {if $rok[$key] eq $Y}
               <option selected>{$rok[$key]}</option>
               {else}
               <option >{$rok[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='datadoM' id='datadoM' >
              {foreach key=key item=item from=$miesiac}
              {if $miesiac[$key] eq $M}
               <option selected>{$miesiac[$key]}</option>
               {else}
               <option >{$miesiac[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='datadoD' id='datadoD' >
              {foreach key=key item=item from=$dzien}
              {if $dzien[$key] eq 31}
               <option selected>{$dzien[$key]}</option>
               {else}
               <option >{$dzien[$key]}</option>
              {/if}
              {/foreach}
            </select>
          </td>
        </tr>

        <tr>
          <td class='label'>
            <label for='technik'>
              Technik:
            </label>
          </td>
          <td class='input'>
            <select name='technik' id='technik' >
              {foreach key=key item=item from=$technicy}
                  <option>{$technicy[$key]}</option>
              {/foreach}
          </select>
            <br /><br />
          </td>
        </tr>

      </tbody>
    </table>
  </fieldset>

<div class='buttons'>
  <input value='Wyczyść' name='reset' type='reset' />
  <input value='Zatwierdź' name='submit' type='submit' style="background:#C7C7FF;">
</div>

  </form>
     </div>

  </div>
  <!-- End Content -->
 </div>

</div>

<br />
<!-- <div id='content'>
  <h1>
    <span class='inner'>
    </span>
    <span style='color: #c03;'>KORONY</span> LICOWANE PORCELANĄ
  </h1>

 <div id='body'>

  <div id='innerbody'>
  <!-- Begin Content -->
<!--
  <form name="form_szukaj" method="post" action="./biuro.php?strona=rozliczenia&amp">
   <input type="hidden" name="szukaj" value="zaawansowane_korony_licowane" />
      <div class='column1'>
  <fieldset>
    <table class='form'>
      <tbody>

        <tr>
          <td class='label'>
            <label for='zleceniodawca'>
              Lekarz / Zleceniodawca:
            </label>
          </td>
          <td class='input'>
            <select name='zleceniodawca'>
              {foreach key=key item=item from=$zleceniodawca}
                  <option>{$zleceniodawca[$key]}</option>
              {/foreach}
            </select>
          </td>
        </tr>

        <tr>
          <td class='label'>
            <label for='data'>
              Data (zakres) od:
            </label>
          </td>

          <td class='input'>
            <select name='dataodY' id='dataodY' >
              {foreach key=key item=item from=$rok}
              {if $rok[$key] eq $Y}
               <option selected>{$rok[$key]}</option>
               {else}
               <option >{$rok[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='dataodM' id='dataodM' >
              {foreach key=key item=item from=$miesiac}
              {if $miesiac[$key] eq "01"}
               <option selected>{$miesiac[$key]}</option>
               {else}
               <option >{$miesiac[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='dataodD' id='dataodD' >
              {foreach key=key item=item from=$dzien}
              {if $dzien[$key] eq "01"}
               <option selected>{$dzien[$key]}</option>
               {else}
               <option >{$dzien[$key]}</option>
              {/if}
              {/foreach}
            </select>
          </td>
        </tr>
        <tr>
          <td class='label'>
            <label for='data'>
              do:
            </label>
          </td>

          <td class='input'>
            <select name='datadoY' id='datadoY' >
              {foreach key=key item=item from=$rok}
              {if $rok[$key] eq $Y}
               <option selected>{$rok[$key]}</option>
               {else}
               <option >{$rok[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='datadoM' id='datadoM' >
              {foreach key=key item=item from=$miesiac}
              {if $miesiac[$key] eq $M}
               <option selected>{$miesiac[$key]}</option>
               {else}
               <option >{$miesiac[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='datadoD' id='datadoD' >
              {foreach key=key item=item from=$dzien}
              {if $dzien[$key] eq 31}
               <option selected>{$dzien[$key]}</option>
               {else}
               <option >{$dzien[$key]}</option>
              {/if}
              {/foreach}
            </select>
          </td>
        </tr>

        <tr>
          <td class='label'>
          </td>
          <td class='input'>
            <br />
          </td>
        </tr>

      </tbody>
    </table>
  </fieldset>

<div class='buttons'>
  <input value='Wyczyść' name='reset' type='reset' />
  <input value='Zatwierdź' name='submit' type='submit' style="background:#C7C7FF;">
</div>

  </form>
     </div>

  </div>
  
 </div>
 -->
</div>

</body>
</html>


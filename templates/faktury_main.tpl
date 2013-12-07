<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
    <link rel='stylesheet' type='text/css' href='./css/faktury_wyszukaj.css' />
</head>
 <body bgcolor="#F4FFF0">
  <hr style="width:1000px;" align="left"> 
  <a href="./biuro.php?strona=faktury_niezaplacone"><span style='color: #000000;'> POKAŻ FAKTURY <b style="font-size:22px;color: #c03;">NIEZAPŁACONE</b></span></a>
  <hr style="width:1000px;" align="left"> 
<div style="margin-left:-20px;margin-top:0px;">

<div id='content'>
  <h1>
    <span class='inner'>
    </span>
    <span style='color: #000000;'> <b style="font-size:22px;color: #c03;">WYSZUKAJ</b> &nbsp;&nbsp;&nbsp;FAKTURY</span>
  </h1>

 <div id='body'>

  <div id='innerbody'>
  <!-- Begin Content -->

  <form name="form_szukaj" method="post" action="./biuro.php?strona=wyszukaj_faktury&amp">
    <input type="hidden" name="wyszukaj" value="form" />
      <div class='column1'>
  <fieldset>
    <legend>formularz wyszukiwania faktur</legend>
    <table class='form'>
      <tbody>

        <tr>
          <td class='label'>
            <label for='numer_faktury'>
              Nr &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>faktury:
            </label>
          </td>
          <td class='input'>
            <input name='fv_nr' class='i' style="width:200px;" />
          </td>
        </tr>
        <tr>
          <td class='label'>
            <label for='klient'>
              Klient:
            </label>
          </td>
          <td class='input'>
            <select name='klient' class="i" style="width:276px;" >
              {foreach key=key item=item from=$tablica_klientow}
                  <option>{$tablica_klientow[$key]}</option>
              {/foreach}
          </select>
          </td>
        </tr>
        <tr>
          <td class='label'>
            <label for='status'>
              Status:
            </label>
          </td>
          <td class='input'>
            <select name='status' style="width:226px;" >
              {foreach key=key item=item from=$status}
                  <option>{$status[$key]}</option>
              {/foreach}
          </select>
          </td>
        </tr>
        <tr>
          <td class='label'>
            <label for='data'>
               <input type="checkbox" style="" name="czyData" value="takData">&nbsp;&nbsp;&nbsp;
               Data (zakres) od:
            </label>
          </td>

          <td class='input'>
            <select name='dataodY' id='dataodY' >
              {foreach key=key item=item from=$rok}
              {if $rok[$key] eq 2008}
               <option selected>{$rok[$key]}</option>
               {else}
               <option >{$rok[$key]}</option>
              {/if}
              {/foreach}
            </select>
             -
            <select name='dataodM' id='dataodM' >
              {foreach key=key item=item from=$miesiac}
              {if $miesiac[$key] eq $M}
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
         <td>
         </td>
         <td>
           <br />
             <button style="margin-left:0px;width:276px;height:24px;background:#6F6FFF;color:#E8E8E8;font-size:11px;text-align:center;" type="button" onclick="self.location.href=('./biuro.php?strona=wyszukaj_faktury&wyszukaj=ostatnie&amp')">
               <b> OSTATNIE WYNIKI WYSZUKIWANIA </b>
             </button>
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
  <!-- End Content -->
 </div>
</div>
</div>

</body>
</html>


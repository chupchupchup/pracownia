<?php /* Smarty version 2.6.14, created on 2012-09-03 10:40:48
         compiled from faktury_wydruk_historia.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'faktury_wydruk_historia.tpl', 75, false),)), $this); ?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
<body style="margin-top:0px;margin-left:0px;">

<div style="background-color: #ffffff;margin-left:80px;margin-top:20px;width:1000px;height:600px;">
<div style="font-size;10px;float:right;margin-right:22px;"> Data sprzedaży: <?php echo $this->_tpl_vars['data_sprzedazy']; ?>
</div>
<br /><br /><br />
<div style="font-size:30px;font-weight:bold;text-align:center;margin-top:20px;"> Faktura VAT nr <?php echo $this->_tpl_vars['nr_fv']; ?>
</div>
<div style="font-size:16px;text-align:center;"> ORYGINAŁ | KOPIA | DUPLIKAT</div>

<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:40px;">
<tr>
    <td style="font-weight:bold;font-size:22px;120px;text-align:right;">Sprzedawca:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;<?php echo $this->_tpl_vars['sprzedawca_nazwa']; ?>
</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">Adres:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;<?php echo $this->_tpl_vars['sprzedawca_adres']; ?>
</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">NIP:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;<?php echo $this->_tpl_vars['sprzedawca_nip']; ?>
</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:40px;">
<tr>
    <td style="font-weight:bold;font-size:22px;width:120px;text-align:right;">Nabywca:</td>
    <td>&nbsp;&nbsp;<?php echo $this->_tpl_vars['kontrahent_nazwa']; ?>
</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">Adres:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;<?php echo $this->_tpl_vars['kontrahent_adres']; ?>
</td>
</tr>
<tr>
    <td style="font-size:18px;width:120px;text-align:right;">NIP:</td>
    <td style="font-size:18px;">&nbsp;&nbsp;<?php echo $this->_tpl_vars['kontrahent_nip']; ?>
</td>
</tr>
</table>
<table cellspacing="0" cellpadding="0" border="0" frame="void" style="width:700px;background-color: #ffffff;margin-left:10px;margin-top:20px;">
<tr>
    <td style="font-weight:normal;font-size:18px;width:122px;text-align:right;" nowrap>Sposób zapłaty:</td>
    <td style="font-size:18px; width:100px;">&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['sposob_zaplaty']; ?>
</b></td>
    <td style="font-weight:normal;font-size:18px;width:200px;" nowrap>termin zapłaty:&nbsp;&nbsp;<b><?php echo $this->_tpl_vars['termin_zaplaty']; ?>
 dni</b></td>
</tr>
<tr>
    <td style="font-size:18px;width:122px;text-align:right; line-height:50px;">BANK:</td>
    <td style="font-size:18px; font-weight:bold;" colspan="3">&nbsp;&nbsp;<?php echo $this->_tpl_vars['konto_bankowe']; ?>
</td>
</tr>
</table>

<table cellspacing="0" cellpadding="4" border="1" frame="void" style="width:100%;background-color: #ffffff;margin-left:10px;margin-top:55px;">

<tr style="margin-left:0px;margin-bottom:0px;height:22px;width:1000px;color:#000000;">
  <?php $_from = $this->_tpl_vars['tablica_opisy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    <th style="height:25px;width:<?php echo $this->_tpl_vars['item']; ?>
px;text-align:center;color:#000000;" nowrap><b><?php echo $this->_tpl_vars['key']; ?>
</b></th>
  <?php endforeach; endif; unset($_from); ?>
</tr>

<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:100%;">
    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;1
    </td>
    <td style="text-align:left;font-size:14px;" width="500px" >
        &nbsp;Prace protetyczne.&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;1&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;szt.
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][0],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;ZW&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][0],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][1],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][2],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
</tr>

<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:1000px;">
     <td style="text-align:right;font-size:14px;font-weight:bold;" colspan="6">
        &nbsp;SUMA
    </td>
    <td nowrap style="text-align:right;font-size:14px;font-weight:bold;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][0],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;font-weight:bold;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][1],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;font-weight:bold;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][2],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
</tr>

</table>

<table cellspacing="1" cellpadding="1" style="width:1000px;background-color: #ffffff;margin-top:30px;">
  <tr style="height:50px; width:1000px;">
    <td>
      <u><b style="font-size:18px;margin-left:50px;"> DO ZAPŁATY: <?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_suma'][2],'format' => "%.2f"), $this);?>
 zł</b></u>
    </td>
  </tr>
</table>

<table cellspacing="1" cellpadding="1" style="width:1000px;background-color: #ffffff;margin-top:30px; margin-left:30px;">
  <tr style="height:50px; width:1000px;">
    <td>
      Zwolnione z podatku VAT na podstawie art. 43 ust. 1 pkt 14 ustawy z dnia 11 marca 2004 r.( Dz. U. Nr 54,poz. 535 z późn. zm.)
    </td>
  </tr>
</table>
                           <!-- #CCFFCC -->
<table border="0" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="width:1000px;background-color: #ffffff; margin-top: 100px;">
<tr style="font-size:14px;">
    <td style="width:200px;"><hr style="color:#000000;width:200px;"/></td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:170px;"><hr style="color:#000000;width:200px;"/></i></td>
</tr>
<tr style="font-size:14px;">
    <td style="width:200px;">podpis osoby upoważnionej do odbioru faktury VAT</td>
    <td style="width:300px;">&nbsp;</td>
    <td style="width:170px;">podpis osoby upoważnionej do wystawienia faktury VAT</td>
</tr>
</table>

</div>
</form>
</body>
</html>
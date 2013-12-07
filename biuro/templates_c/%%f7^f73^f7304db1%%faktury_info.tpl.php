<?php /* Smarty version 2.6.14, created on 2012-09-05 10:38:49
         compiled from ./faktury_info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', './faktury_info.tpl', 78, false),)), $this); ?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />

    <!-- compliance patch for microsoft browsers -->
    <!--[if lt IE 7]>
        <link rel='stylesheet' type='text/css' href='../css/ie.css' />
        <script src="../ie7/ie7-standard-p.js" type="text/javascript">
            IE7_PNG_SUFFIX = '.png';
        </script>

    <![endif]-->

<?php echo '

<style type="text/css">
.inputfr {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #000000; text-decoration: none;
	background-color: #E5E5FF; border: 1px #0066CC outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; 		
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

.inputf {
	font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #000000; text-decoration: none;
	background-color: #FFFFE6; border: 1px #5E788A outset; margin-top: 0px; margin-right: 0px; margin-bottom: 0px;
	margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px;
}

.obsluga {
	font-family : Verdana, Geneva, Arial, Helvetica, sans-serif; font-size : 12px; line-height : 13px; color: #003366;
	text-decoration: none; background-color: #ECECEC; border: #B8B8B8; border-width: 2px 2px 2px 1px; font-weight: bold;
    cursor: default;
}

.obsluga1 {
	font-family : Verdana, Geneva, Arial, Helvetica, sans-serif; font-size : 12px; line-height : 13px; color: #003366;
	text-decoration: none; background-color:  #E6E2EB; border: #B8B8B8; border-width: 2px 2px 2px 1px; font-weight: bold;
    cursor: default;
}

</style>
'; ?>


</head>
<body leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" bgcolor="#000000">

<div id="opis" style="background:#E6E2EB;width:100%; height:100%; margin-top:0px;position:absolute; z-index:1; visibility: visible">

  <table style="width:100%;" border="1" frame="BORDER" rules="NONE" cellpadding="8" cellspacing="0">
    <tr>
      <td class="obsluga1" align="center" style="width:200px;">FAKTURA:</td>
      <td class="obsluga" align="center" style="width:200px;"></td>
      <td class="obsluga" align="center" style="width:200px;">
        <button style="width:160px;height:25px;background-color:#E70000;color:#E8E8E8" type="button" onclick="javascript:window.opener='x';window.open('','_parent','');window.close();">
          <b>ZAMKNIJ OKNO</b>
        </button>
	  </td>
    </tr>
  </table>

  <div style="margin-left:0px;margin-top:0px;width:width:100%;height:330px;">

    <form name="form" action="./faktury_update.php" method="post" style="width:100%;margin-top:0px;">
    <table style="width:100%;margin-top:0px;border:;" border="1" frame="hsides" rules="rows" cellpadding="8" cellspacing="0">
      <tr>
       <td style="width:80px;"><b>NR FV: </b></td>
       <td style="width:120px;"><b>STATUS: </b></td>
       <td style="width:120px;"><b>WARTOŚĆ <br />NETTO: </b></td>
       <td style="width:120px;"><b>WARTOŚĆ <br />BRUTTO: </b></td>
       <td style="width:60px;"><b>ZAPŁACONO <br />BRUTTO: </b></td>
       <td style="width:100px;"><b>DATA <br />FV: </b></td>
       <td style="width:60px;"><b>SPOSÓB <br />ZAPŁATY: </b></td>
       <td style="width:100px;"><b>TERMIN <br />ZAPŁATY: </b></td>
       <td style="width:100px;"><b>DATA <br />ZAPŁATY: </b></td>
      </tr>
<?php $this->assign('v', 1); ?>
<?php unset($this->_sections['f']);
$this->_sections['f']['name'] = 'f';
$this->_sections['f']['loop'] = is_array($_loop=$this->_tpl_vars['tablica_wynikow']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['f']['show'] = true;
$this->_sections['f']['max'] = $this->_sections['f']['loop'];
$this->_sections['f']['step'] = 1;
$this->_sections['f']['start'] = $this->_sections['f']['step'] > 0 ? 0 : $this->_sections['f']['loop']-1;
if ($this->_sections['f']['show']) {
    $this->_sections['f']['total'] = $this->_sections['f']['loop'];
    if ($this->_sections['f']['total'] == 0)
        $this->_sections['f']['show'] = false;
} else
    $this->_sections['f']['total'] = 0;
if ($this->_sections['f']['show']):

            for ($this->_sections['f']['index'] = $this->_sections['f']['start'], $this->_sections['f']['iteration'] = 1;
                 $this->_sections['f']['iteration'] <= $this->_sections['f']['total'];
                 $this->_sections['f']['index'] += $this->_sections['f']['step'], $this->_sections['f']['iteration']++):
$this->_sections['f']['rownum'] = $this->_sections['f']['iteration'];
$this->_sections['f']['index_prev'] = $this->_sections['f']['index'] - $this->_sections['f']['step'];
$this->_sections['f']['index_next'] = $this->_sections['f']['index'] + $this->_sections['f']['step'];
$this->_sections['f']['first']      = ($this->_sections['f']['iteration'] == 1);
$this->_sections['f']['last']       = ($this->_sections['f']['iteration'] == $this->_sections['f']['total']);
?>
<!-- <input type="text" class="inputf" name="cena"  style="width:60px;" value='<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][4],'format' => "%.2f"), $this);?>
'>
 -->
      <tr class="inputfr" style="text-align:center;">
      <input type="hidden" name="fv_nr" value="<?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][0]; ?>
" />
       <td><?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][0]; ?>
</td>
       <td>
            <select name="status" style="width:110px;">
              <?php $_from = $this->_tpl_vars['status']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                <?php if ($this->_tpl_vars['status'][$this->_tpl_vars['key']] == $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][1]): ?>
                  <option selected><?php echo $this->_tpl_vars['status'][$this->_tpl_vars['key']]; ?>
</option>
                <?php else: ?>
                  <option><?php echo $this->_tpl_vars['status'][$this->_tpl_vars['key']]; ?>
</option>
                <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?>
          </select>
       </td>
       <td><?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][2]; ?>
 zł</td>
       <td><?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][2]; ?>
 zł</td>
       <!-- <td><?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][2]*1.22,'format' => "%.2f"), $this);?>
 zł</td> -->
       <td><input type="text" class="inputf" name="zaplacono" style="width:60px;" value="<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][3],'format' => "%.2f"), $this);?>
"></td>
       <td><input type="text" class="inputf" name="data_fv" style="width:90px;" value="<?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][4]; ?>
"></td>
       <td>
            <select name="sposob_zaplaty" style="width:80px;">
              <?php $_from = $this->_tpl_vars['sposob_zaplaty']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
                <?php if ($this->_tpl_vars['sposob_zaplaty'][$this->_tpl_vars['key']] == $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][5]): ?>
                  <option selected><?php echo $this->_tpl_vars['sposob_zaplaty'][$this->_tpl_vars['key']]; ?>
</option>
                <?php else: ?>
                  <option><?php echo $this->_tpl_vars['sposob_zaplaty'][$this->_tpl_vars['key']]; ?>
</option>
                <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?>
          </select>
       </td>
       <td><input type="text" class="inputf" name="termin_zaplaty" style="width:40px;" value="<?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][6]; ?>
"> dni</td>
       <td><input type="text" class="inputf" name="data_zaplaty" style="width:90px;" value="<?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][7]; ?>
"></td>
      </tr>
      <tr class="inputfr" style="">
        <td colspan="1" style="font-weight:bold; ">
		  UWAGI: 
		</td>
        <td colspan="3">
	      <textarea name="uwagi_fv" cols="38" rows="3" style="background-color:#F0F0F0;" ><?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][14]; ?>
</textarea>
		</td>
       <td style="width:100px;"><b>KONTRAHENT: </b></td>
       <td colspan="4"><?php echo $this->_tpl_vars['tablica_wynikow'][$this->_sections['f']['index']][8]; ?>
</td>
	  </tr>
	  	
<?php $this->assign('v', $this->_tpl_vars['v']+1); ?>
<?php endfor; endif; ?>
      <tr style="background:#B0B0B0;">
        <td colspan="1">
<!--           <button style="background:#E70000;color:#E8E8E8;font-weight:800;float:right;" type="button" onclick="window.open('./biuro.php?strona=faktury_hist&fv_nr=<?php echo $this->_tpl_vars['tablica_wynikow'][0][0]; ?>
&amp', 'Historia faktur','location=0,status=1,scrollbars=1,width=1200,height=800');">
            <b style="font-size:13px;"> POKAŻ FAKTURĘ</b>
          </button>
 -->
 		  <a href="faktury_wydruk_historia.php?fv_nr=<?php echo $this->_tpl_vars['tablica_wynikow'][0][0]; ?>
&amp" target="_blank" style="background:#E70000;color:#E8E8E8;font-weight:800;float:right; text-decoration:none; width:150px; text-align:center; height: 22px; border: 1px solid #ffffff"> <b style="font-size:13px;"> POKAŻ FAKTURĘ</b> </a>
        </td>
        <td colspan="1">
 		  <a href="faktury_wydruk_historia_zalacznik.php?fv_nr=<?php echo $this->_tpl_vars['tablica_wynikow'][0][0]; ?>
&amp" target="_blank" style="background:#E70000;color:#E8E8E8;font-weight:800;float:right; text-decoration:none; width:150px; text-align:center; height: 22px; border: 1px solid #ffffff"> <b style="font-size:13px;"> POKAŻ ZAŁĄCZNIK</b> </a>
        </td>
        <td colspan="8">
          <input value="AKTUALIZUJ" name="submit" type="submit" style="background:#C7C7FF;margin-left:400px;font-weight:800;float:right;" />
        </td>
      </tr>
    </table>
  <i style="font-size:12px;"><?php echo $this->_tpl_vars['komunikat']; ?>
</i>
    </form>
  </div>

</div>
<input name="aaa" type="button">
</body>
</html>
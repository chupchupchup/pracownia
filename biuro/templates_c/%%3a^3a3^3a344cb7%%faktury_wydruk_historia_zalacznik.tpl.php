<?php /* Smarty version 2.6.14, created on 2012-09-03 10:41:58
         compiled from faktury_wydruk_historia_zalacznik.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'faktury_wydruk_historia_zalacznik.tpl', 40, false),)), $this); ?>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />
</head>
<body style="margin-top:0px;margin-left:0px;">

<div style="background-color: #ffffff;margin-left:80px;margin-top:20px;width:1000px;height:600px;">

<br /><br /><br />
<div style="font-size:30px;font-weight:bold;text-align:center;margin-top:20px;"> Specyfikacja do faktury VAT nr <?php echo $this->_tpl_vars['nr_fv']; ?>
</div>

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

<?php $this->assign('v', 1); ?>
<?php unset($this->_sections['f']);
$this->_sections['f']['name'] = 'f';
$this->_sections['f']['loop'] = is_array($_loop=$this->_tpl_vars['tab_el_fv']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr style="background:#ffffff; margin-left:0px;margin-top:0px;margin-bottom:0px;height:22px; width:100%;">

    <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;<?php echo $this->_tpl_vars['v']; ?>

    </td>
<!--     <td nowrap style="text-align:left;font-size:14px;">
        &nbsp;<?php echo $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][0]; ?>
&nbsp;
    </td>
 -->    <td style="text-align:left;font-size:14px;" width="500px" >
        &nbsp;<?php echo $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][1]; ?>
&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;<?php echo $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][2]; ?>
&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;szt.
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => 'x','x' => $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][3],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:center;font-size:14px;">
        &nbsp;ZW&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => "x*y",'x' => $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][3],'y' => $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][2],'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => "x*y*z",'x' => $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][2],'y' => $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][3],'z' => 0,'format' => "%.2f"), $this);?>
&nbsp;
    </td>
    <td nowrap style="text-align:right;font-size:14px;">
        &nbsp;<?php echo smarty_function_math(array('equation' => "x*y*z",'x' => $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][2],'y' => $this->_tpl_vars['tab_el_fv'][$this->_sections['f']['index']][3],'z' => 1,'format' => "%.2f"), $this);?>
&nbsp;
    </td>

  <?php $this->assign('v', $this->_tpl_vars['v']+1); ?>

</tr>
<?php endfor; endif; ?>


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

</div>

</body>
</html>
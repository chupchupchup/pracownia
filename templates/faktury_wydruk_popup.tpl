<html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=ISO-8859-2" />

{literal}
<script language="JavaScript1.2">
function poponload()
{
testwindow= window.open ("./biuro/faktury_wydruk.php", "mywindow","location=1,status=1,scrollbars=1,width=1200,height=800");
testwindow.moveTo(0,0);
}
</script>
{/literal}

</head>
<body onload="javascript: poponload1()">
   <b style="color:#000000;font-size:30px;margin-left:30px;">FAKTURA ZAPISANA.</b>
<br/> <br />

<table>
  <tr style="background:#B0B0B0;">
    <td colspan="1">
 		  <a href="./biuro/faktury_wydruk_historia.php?fv_nr={$nr_fv}&amp" target="_blank" style="background:#E70000;color:#E8E8E8;font-weight:800;float:right; text-decoration:none; width:150px; text-align:center; height: 22px; border: 1px solid #ffffff"> <b style="font-size:13px;"> DRUKUJ FAKTURĘ</b> </a>
    </td>
    <td colspan="1">
 		  <a href="./biuro/faktury_wydruk_historia_zalacznik.php?fv_nr={$nr_fv}&amp" target="_blank" style="background:#E70000;color:#E8E8E8;font-weight:800;float:right; text-decoration:none; width:150px; text-align:center; height: 22px; border: 1px solid #ffffff"> <b style="font-size:13px;"> DRUKUJ ZAŁĄCZNIK</b> </a>
    </td>
  </tr>
</table>




</body>
</html>

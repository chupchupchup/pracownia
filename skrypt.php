<?php
//------------------------------------------------------------------------------------------------------------------
//funkcja posredniczaca w zapytaniu SQL - zwraca kod bledu zapytania
    function myquery ($query) {
    include('./inc/db_connect.inc.php');
        $result = mysql_query($query);

        if (mysql_errno()){
            echo "MySQL error ".mysql_errno().": ".htmlspecialchars (mysql_error())."\n<br>When executing:<br>\n<b>$query\n</b><br>";
        }
    include('./inc/db_close.inc.php');
        //echo mysql_numrows($result).'<br>';
        return $result;
    }
//------------------------------------------------------------------------------------------------------------------

  $sql="SELECT idzleceniodawcy FROM zleceniodawca ";
  $wyn=myquery($sql);

   $rok=date('Y');
  while($a = mysql_fetch_assoc($wyn)){

    $wzk='0/'.$a['idzleceniodawcy'].'/'.$rok;
    
    $sqll="UPDATE zleceniodawca SET wz_ost='".$wzk."' WHERE idzleceniodawcy='".$a['idzleceniodawcy']."' ";
    myquery($sqll);

  }


?>

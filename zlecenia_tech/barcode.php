<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <title>Image_Barcode Class Test</title>
  <style type="text/css">
    body {
        font-family: Verdana;
        font-size: 10pt;
    }
    h1 {
            font-size: 14pt;
    }
    h2 {
            font-size: 12pt;
    }
    .box {
        border: 1px solid rgb(15, 169, 229) ! important; 
        margin: 10px ! important; 
        padding: 10px ! important; 
        font-size: 0.9em ! important;
        font-weight: normal ! important;
        text-decoration: none !  important;
        line-height: 1.5em ! important;
        color: rgb(0, 0, 0) ! important;
        background-color: rgb(231, 244, 252) ! important;
        white-space: normal !  important;
        cursor: pointer ! important;
    }
    .test {
        border: 1px solid;
        margin: 10px ! important;
        padding: 10px ! important; 
    }
  </style>
</head>
<body style="background-image: url(#FFFFFF);">

<?php
$num = "200000";
?>

<div class="test">
<h2>Code128 (png):</h2>
<img
 src="barcode_img.php?num=<?php echo($num) ?>&type=code128&imgtype=png"
 alt="PNG: <?php echo($num) ?>" title="PNG: <?php echo($num) ?>">
</div>

</body>
</html>


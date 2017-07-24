<?php
ob_start();
session_start();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="http://npmcdn.com/parse/dist/parse.js"></script>   
</head>
<body>
   <div class="container">
    <div class="page-header">
    <h1>Other</h1>
        <div class="btn-toolbar">
         <a href="../main.html" class="btn btn-warning pull-right"/>Home</a>
         </div>
    </div>
        <div class="jumbotron">
<form action="" method="POST" class="form-horizontal" id="shopForm">
    <div class="form-group">
        <p>Product Code (if Known)</p>
        <input type="text" id="code" name="code" placeholder="Product Code"/>
    </div>
     <div class="form-group">
         <p>Description</p>
        <input type="text" id="des" name="des" placeholder="Description"/>
    </div>
    <div class="form-group">
         <p>Other (Size, Colour, Any Other Information)</p>
        <textarea id="other" name="other" rows="4" cols="50" placeholder="Other (Size, Colour, any other information)"></textarea>
<br>
 <input type="submit" name="submit" value="Search" class="btn btn-success"/> <input type="reset" id="reset" name="reset" value="Reset" class="btn btn-danger"/>
        </div>
    </body>
</html>
    
    <?php
                $page_title = 'Other';
if(isset($_POST['submit'])){
$val = $_POST['code'];
$val1 = $_POST['des'];
    $val2 = $_POST['other'];
}
    $_SESSION['code'] = $val;
    $_SESSION['des'] = $val1;
    $_SESSION['other'] = $val2;
    $host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'otherCust.html';
header("Location: http://$host$uri/$extra");
 exit;
    ?>
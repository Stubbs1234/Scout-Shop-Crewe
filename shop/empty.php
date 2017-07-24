<?php
session_start();
ob_start();
?>
<html>
<script type="text/javascript">
    sessionStorage.clear();
    
    </script>
</html>
<?php
$_SESSION['cart'] = NULL ;
     $_SESSION['total'] = NULL ;
$_SESSION['table'] = NULL ;

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'shop.php';
header("Location: http://$host$uri/$extra");
 exit;
?>

<?php
session_start();
include 'database1.php';
  
  echo '<p>You are now login'.{$_SESSION['userNum']}. '</p>'
}

/*<html>
<head>
</head>
<body>

<a href="sigup.php">signup</a>
</body>
</html>*/?>
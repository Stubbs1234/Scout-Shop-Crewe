<?php
if ( isset( $_SESSION['total'] )) {
    
    if ($_SESSION['total'] == "scouts") {
        header("Location: emailScout.php");
    } elseif ($_SESSION['total'] == "guides") {
        header("Location: emailGuides.php");
    } else {
        echo "<p>Sorry not working</p>";
    }
    }
    

?>
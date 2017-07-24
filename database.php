<?php
$dbc = mysqli_connect('localhost', 'root', 'root', 'scoutshop')
or die (mysqli_connect_error());
mysqli_set_charset($dbc, 'utf8');
?>
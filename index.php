<?php

include($_SERVER['DOCUMENT_ROOT'].'/application/views/includes/classloader.php');

header('Cache-control: private');

$parms = (object) $_GET;

try {
	$pageclass = (isset($parms->page)?$parms->page:'login');
	$page = new $pageclass((isset($_POST)?(object) $_POST:null));
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}


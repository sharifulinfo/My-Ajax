<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../classes/Project.php');

	$pro = new Project();
	if($_SERVER["REQUEST_METHOD"]== "POST"){
		$mass = $_POST['message'];
		$massId = $_POST['messageId'];
		$user = $pro->autosaveDraft($mass,$massId);
	}
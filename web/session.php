<?php

	session_start();
	require_once '../services/service.php';
	$session = new Services();

	if (!$session->is_loggedin()) {
		$session->redirect('login.php');
	}

?>
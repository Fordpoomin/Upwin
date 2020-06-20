<?php
	require_once 'session.php';
	require_once '../services/service.php';
	$user_logout = new Services();

	if (isset($_GET['logout']) && $_GET['logout'] == "true") {

		$user_logout->doLogout();
		$user_logout->redirect('login.php');
	}
?>

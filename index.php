<?php
	session_start();
	require_once 'funkc.php';
	$connect = connectDB();
	if ($_POST['exit']) /* была нажата кнопка ВЫЙТИ */
	{
		unset( $_SESSION['user_id'], $_SESSION['counter'] );
		header("Location:index.php");
	}	
	require_once 'page.php';	
?>

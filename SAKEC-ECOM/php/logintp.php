<?php
	if(!isset($_COOKIE['user1']) && !isset($_COOKIE['pass2']) && !isset($_COOKIE['user2']) &&!isset($_COOKIE['pass2'])){
		echo "Error";
		die;
	}

	if($_POST['uname'] == $_COOKIE['user1'] && $_POST['pass'] == $_COOKIE['pass1'])
		echo "login sucessfull";
	else if($_POST['uname'] == $_COOKIE['user2'] && $_POST['pass'] == $_COOKIE['pass2'])
		echo "Login sucessfull";
	else
		echo "Invalid username or password";
?>
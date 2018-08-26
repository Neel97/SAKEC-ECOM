<?php

error_reporting(E_ALL);

function createNewUser($usrData){
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	$sql = "INSERT INTO `users`(`uname`,`pass`,`recovery_email`)values('" . $usrData['suname'] . "', '" . $usrData['spass'] . "', '" . $usrData['rec_email'] . "')";
	// echo $sql . "<pre>";
	if(!mysqli_query($con, $sql)){
		return mysqli_error($con);
	}
	mysqli_close($con);
	return true;
}

function logInUsr($usrData){
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	$sql = "SELECT `uid`, `uname`, `pass` FROM `users` WHERE `uname` = '" . $usrData['uname'] . "' AND `pass` = '" . $usrData['pass'] . "' AND `status` = 1 LIMIT 1";
	// echo $sql . "<pre>";
	$res = mysqli_query($con, $sql);
	if(mysqli_num_rows($res) == 1){
		$row =  mysqli_fetch_array($res);
		session_start();
		session_id();
		$_SESSION['uid'] = $row['uid'];
		$_SESSION['user'] = $row['uname'];
		$_SESSION['pass'] = $row['pass'];
		// print_r($_SESSION);
		mysqli_close($con);
		return true;

	}
	mysqli_close($con);
	return false;
}


function logInUsrCheck(){
	session_start();
	if(isset($_SESSION['uid'])){
		return true;
	}
	session_destroy();
	return false;
}

?>
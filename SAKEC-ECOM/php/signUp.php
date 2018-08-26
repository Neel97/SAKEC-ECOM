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

?>
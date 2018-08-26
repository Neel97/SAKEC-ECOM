<?php

function handleResponse($resFor, $message){
	$response = array('status' => 200, 'uname' => (isset($_SESSION['user'])? $_SESSION['user']: 'no user session found'));
	if($message === true){
		echo json_encode($response);
		return true;
	}
	switch ($resFor) {
		case 'newUsr':
			$response['err'] = 'Error while creating new user.';
			break;
		case 'usrLogIn':
			$response['err'] = 'Error while login.';
			break;
		case 'userLogInCheck':
			$response['err'] = 'Error while re-login.';
			break;
		case 'newInst':
			$response['err'] = 'Error while inserting new institute.';
			break;
		
		default:
			echo "error in ResponseHandler.php for the data: ";
			echo $resFor . " " . $message; 
			break;
	}
	$response['status'] = 500;
	echo json_encode($response);
}

function handleResponseWithRes($resFor, $data){
	$response = array('status' => 200);
	if($data != false){
		$response['data'] = $data;
		echo json_encode($response);
		return true;
	}

	$response['status'] = 500;
	switch($resFor){
		case 'getCompleteInstituteData':
			$response['err'] = 'Error in getCompleteInstituteData.';
			break;
		case 'getInstitueNames':
			$response['err'] = $data;
			break;
	}
	echo json_encode($response);
	return false;
}

?>
<?php
include 'includes/db.config.php';
include 'includes/file_upload.php';
include 'basic.php';
include 'Institute.php';
include 'guide.php';
include 'ResponseHandler.php';

switch ($_REQUEST['requestFor']) {
	case 'newUsr':
		handleResponse("newUsr", createNewUser($_REQUEST));
		break;
	case 'usrLogIn':
		handleResponse("usrLogIn", logInUsr($_REQUEST));
		break;
	case 'usrLogInCheck':
		handleResponse("usrLogInCheck", logInUsrCheck());
		break;
	case 'newInst':
		handleResponse("newInst", addNewInst($_REQUEST));
		break;
	case 'getCompleteInstituteData':
		handleResponseWithRes("getCompleteInstituteData", getCompleteInstituteData($_REQUEST));
		break;
	case 'getInstituteNames':
		handleResponseWithRes("getInstituteNames", getInstituteNames());
		break;
	case 'addGuide':
			handleResponse("addGuide", addNewGuide($_REQUEST));
		break;
	
	default:
		echo "Error in RequestHandler.php!! for the data: <pre>";
		print_r($_GET);
		break;
}
?>
<?php
	function addNewInst($usrData){
		$fileObj = new FileUploadAbuse();
		$fileObj -> setFileConstraints(1048578, "jpg, png, gif, jpeg, docx, xls, doc, xlsx, pdf, odt");
		$fileObj -> setUploadPath('uploads/');
		$fileObj -> uploadFile($_FILES['profile-attachment']);
		die();
		session_start();
		// print_r($usrData);
		$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		$sql = "INSERT INTO `institute`(`user_id`, `inst_pic`, `inst_name`, `inst_desc`, `inst_type`, `inst_wrking_days_in_a_week`) VALUES (" . $_SESSION['uid'] . ", 'uploads/" . $_FILES['profile-attachment']['name'] . "', '" . $usrData['instName'] . "', '" . $usrData['instDesc'] . "', '" . $usrData['instType'] . "'," . $usrData['workingDays'] . " )";
		if(!mysqli_query($con, $sql)){
			echo mysqli_error($con);
			mysqli_close($con);
			return false;
		}
		mysqli_close($con);
		return true;
	}

	function getCompleteInstituteData($usrData){
		session_start();
		// print_r($usrData);
		$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		$sql = "SELECT * FROM institute WHERE user_id=" . $_SESSION['uid'];
		$res = mysqli_query($con, $sql);
		if(mysqli_num_rows($res) == 0){
			echo "No records found. ";
			echo mysqli_error($con);
			mysqli_close($con);
			return false;
		}
		$rec = mysqli_fetch_all($res, MYSQLI_ASSOC);
		foreach ($rec as $key => $value){
			$res = mysqli_query($con, "SELECT COUNT(*) as guide_num FROM guide WHERE inst_id = " . $value['inst_id']);
			$data = mysqli_fetch_assoc($res);
			$rec[$key]['guide_num'] = $data['guide_num'];
		}
		
		/*echo "<pre>";
		print_r($rec);*/
		mysqli_close($con);
		return $rec;
	}

	function getInstituteNames(){
		$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
		session_start();
		$res = mysqli_query($con, "SELECT inst_id, inst_name FROM institute WHERE user_id = " . $_SESSION['uid']);
		mysqli_close($con);
		return mysqli_fetch_all($res);
	}
?>
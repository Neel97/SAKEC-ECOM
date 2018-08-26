<?php

function addNewGuide($usrData){
	session_start();
	$con = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
	foreach ($usrData['guideName'] as $index => $guideName) {
		$sql = "INSERT INTO `guide`(`inst_id`, `guide_name`, `guide_design`, `guide_lecs_per_day`, `max_course_assigned`) VALUES (" . $usrData['inst-name-list'] . ",'" . $guideName . "','" . $usrData['guideDesig'][$index] . "'," . $usrData['guideLecsPerDay'][$index] . "," . $usrData['guideMaxCourse'][$index] . ")";
		if(!mysqli_query($con, $sql)){
			echo mysqli_error($con);
			mysqli_close($con);
			return false;
		}
	}
	mysqli_close($con);
	return true;
}

?>
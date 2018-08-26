 <?php

$con = mysqli_connect("localhost", "root" ,"", "test"); //here in paper instead of test wite the database name mentioned in the question paper

if(!mysqli_query($con, "CREATE TABLE student_info(student_id INT(4) PRIMARY KEY, stud_name TEXT, stud_addr VARCHAR(50), stud_phoneno INT(10))"))
	echo mysqli_error($con);

if(!mysqli_query($con, "INSERT INTO student_info(`student_id`, `stud_name`, `stud_addr`, `stud_phoneno`) VALUES(4, 'Anthony Gonsalvies', 'RupMehefile, Kholi no 420', '132467980')"))
	echo mysqli_error($con);

$res = mysqli_query($con, "SELECT * FROM student_info");

if(mysqli_num_rows($res) == 0)
	echo "no data found";
else{
	$row = mysqli_fetch_all($res, MYSQLI_ASSOC);
	echo "<pre>";
	print_r($row);
}

mysqli_close($con);

 ?>
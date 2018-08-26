<?php
	
	setcookie("user1", "maar");
	setcookie("user2", "daala");
	setcookie("pass1", "hai");
	setcookie("pass2", "ram!!!");

?>

<html>
	<body>
		<form action="logintp.php" method="post">
			UserName: <input type="text" name="uname" />
			Password: <input type="password" name="pass" />
			<input type="submit" value="login" />
		</form>
	</body>
</html>
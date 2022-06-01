<?php
	session_start();
	include "db.php";
	if (!empty($_POST)) {
		$user = $_POST['user'];
		$password = $_POST['pass'];
		if (empty($user) or empty($password)) $messege = "Error";
		else {	
			$type = "client";
			$query = "INSERT INTO users (user, password, type) 
						VALUES ('$user','$password','$type')";
			if (mysqli_query($link, $query))
				$messege = "Успешна регистрация";
			else $messege = "Error";
		}
}
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
		<link rel="stylesheet" href="site.css" type="text/css" />
		<title>Sign Up</title>
	</head>
	<body>
		<div id="main">
			<?php include("menu.php") ?>
			<div id="content">
				<center>
					<h2>Регистация</h2>
					<?php
					if (isset($messege)) print_r($messege);
					?>
					<form action="singup.php" method="POST">
						<table border="1" align="center" style="border:1px solid #000000;">
							<tr>
								<td>Потребител</td>
								<td><input type="text" name="user" style="width:200px;"></td>
							</tr>
							<tr>
								<td>Парола</td>
								<td><input type="password" name="pass" style="width:200px;"></td>
							</tr>
							<tr>

							<tr>
								<td colspan='2' align='center'><input type="submit" value="Sign Up"></td>
							</tr>
						</table>
					</form>
				</center>
			</div>
		</div>
	</body>

</html>


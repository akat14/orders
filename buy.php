<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php");
    exit();
}
include "db.php";
if(!empty($_POST))
{
    if(!empty($_POST['good_id'])) {
	    $good_id = $_POST['good_id'];
	    $query = "select * from goods where id = '$good_id'";
    	    $result = mysqli_query($link, $query);
    	    $user_data = mysqli_fetch_assoc($result);
    	    if (empty($user_data))
	    	$messege = "Грешно ID";
	    else {
	    $client_id = $_SESSION['id'];
	    $good_id = $_POST['good_id'];
	    $query = "INSERT INTO orders (client_id, good_id) 
                VALUES ('$client_id','$good_id')";
	    if($result = mysqli_query($link,$query))
                $messege = "Поръчката е добавена успешно";
	    else    $messege = "Грешка при добавяне";
	    }
    }
    else  $messege = "Грешка при добавяне";
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Kупи</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Купи</h2>
		<?php
                    if(isset($messege)) echo $messege;
                ?>
		    <form method = "POST" action = "buy.php">
                	<table border = "1">
                    	    <tr>
                        	<th>ID на стоката</th>
                        	<th><input type="text" name = "good_id"></th>
                    	    </tr>
			<th></th>
			<th><button type="submit">Добави</button></th>
</table>
</form>
</center>
            </center>
        </div>
    </div>
</body>

</html>

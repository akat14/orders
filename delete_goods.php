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
	    $query = "DELETE FROM goods 
                WHERE id='$good_id'";
	    $query2 = "DELETE FROM orders 
                WHERE good_id='$good_id'";
	    if($result = mysqli_query($link,$query) && $result2 = mysqli_query($link,$query2))
                $messege = "Продукта е изтрит успешно";
	    else    $messege = "Грешка при изтриване";
	    }
    }
    else  $messege = "Грешка при изтриване";
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Изтрий Продукт</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Изтрий Продукт</h2>
		<?php
                    if(isset($messege)) echo $messege;
                ?>
		    <form method = "POST" action = "delete_goods.php">
                	<table border = "1">
                    	    <tr>
                        	<th>ID на стоката</th>
                        	<th><input type="text" name = "good_id"></th>
                    	    </tr>
			<th></th>
			<th><button type="submit">Изтрий</button></th>
</table>
</form>
</center>
            </center>
        </div>
    </div>
</body>

</html>

<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php");
    exit();
}
include "db.php";
if(!empty($_POST))
{
    if(!empty($_POST['id'])) {
	    $id = $_POST['id'];
	    $query = "select * from orders where id = '$id'";
    	    $result = mysqli_query($link, $query);
    	    $user_data = mysqli_fetch_assoc($result);
    	    if (empty($user_data))
	    	$messege = "Грешно ID";
	    else {
	    $query = "DELETE FROM orders 
                WHERE id='$id'";
	    if($result = mysqli_query($link,$query))
                $messege = "Поръчката е изтрита успешно";
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
    <title>Изтрий Поръчка</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Изтрий Поръчка</h2>
		<?php
                    if(isset($messege)) echo $messege;
                ?>
		    <form method = "POST" action = "delete_orders.php">
                	<table border = "1">
                    	    <tr>
                        	<th>ID на поръчката</th>
                        	<th><input type="text" name = "id"></th>
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

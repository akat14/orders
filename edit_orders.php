
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

include "db.php";

if (!empty($_POST)) {
    $id = $_POST['id'];
    $client_id = $_POST['client_id'];
    $good_id = $_POST['good_id'];

    $query = "select * from orders where id = '$id'";
    $result = mysqli_query($link, $query);
    $user_data = mysqli_fetch_assoc($result);
    if (empty($user_data))
	    $messege = "Грешно ID";
    else {

	$query = "UPDATE orders 
	SET client_id ='$client_id',
	good_id ='$good_id'
	WHERE id='$id'";
	
	if (mysqli_query($link, $query))
		$messege = "Поръчката е редактирана успешно";
	else $messege = "Error";
    }
}
?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Продукт Поръчка</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Редактирай Поръчка</h2>
                <?php
                if (isset($messege)) echo $messege;
                ?>
                <form action="edit_orders.php" method="POST">
                    <table border="1">
                        <tr>
                            <td>Номер на поръчката</td>
                            <td><input type="text" name="id"></td>
                        </tr>
                        <tr>
                            <td>ID на Стоката</td>
                            <td><input type="text" name="good_id"></td>
                        </tr>
                        <tr>
                            <td>ID на Клиента</td>
                            <td><input type="text" name="client_id"></td>
                        </tr>

                        <tr>
                            <td colspan='2' align='center'><input type="submit" value="Редактирай"></td>
                        </tr>
                    </table>
                </form>
            </center>
        </div>
    </div>
</body>

</html>

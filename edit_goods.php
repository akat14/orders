
<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}

include "db.php";

if (!empty($_POST)) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $query = "select * from goods where id = '$id'";
    $result = mysqli_query($link, $query);
    $user_data = mysqli_fetch_assoc($result);
    if (empty($user_data))
	    $messege = "Грешно ID";
    else {

	$query = "UPDATE goods 
	SET name ='$name',
	price ='$price'
	WHERE id='$id'";
	
	if (mysqli_query($link, $query))
		$messege = "Стоката е редактирана успешно";
	else $messege = "Error";
    }
}
?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Редактирай Продукт</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Редактирай Продукт</h2>
                <?php
                if (isset($messege)) echo $messege;
                ?>
                <form action="edit_goods.php" method="POST">
                    <table border="1">
                        <tr>
                            <td>Номер на продукта</td>
                            <td><input type="text" name="id"></td>
                        </tr>
                        <tr>
                            <td>Име</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>Цена</td>
                            <td><input type="text" name="price"></td>
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

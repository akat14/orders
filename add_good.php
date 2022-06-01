<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php");
    exit();
}
include "db.php";
if(!empty($_POST))
{
    if(!empty($_POST['name']) && !empty($_POST['price'])) {
	    $name = $_POST['name'];
	    $price = $_POST['price'];
	    $query = "INSERT INTO goods (name, price) 
                VALUES ('$name','$price')";
	    if($result = mysqli_query($link,$query))
                $messege = "Стоката е добавена успешно";
	    else    $messege = "Грешка при добавяне";
    }
    else  $messege = "Грешка при добавяне";
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Добави Стока</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Добави Стока</h2>
                <?php
                    if(isset($messege)) echo $messege;
                ?>
                <form method = "POST" action = "add_good.php">
                <table border = "1">
                    <tr>
                        <th><div>Име на Стоката</div></th>
                        <th><input type="text" name = "name"></th>
                    </tr>
                    <tr>
                        <th><div>Цена</div></th>
                        <th><input type="text" name = "price"></th>
                    </tr>
			<th></th>
			<th><button type="submit">Добави</button></th>
</table>
</form>
</center>

        </div>
    </div>
</body>

</html>

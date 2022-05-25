<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("location: login.php");
    exit();
}
include "db.php";
if(!empty($_POST))
{
    if(!empty($_POST['good_id']) && !empty($_POST['client_id'])) {
	    $client_id = $_POST['client_id'];
	    $good_id = $_POST['good_id'];
	    $query = "INSERT INTO orders (client_id, good_id) 
                VALUES ('$client_id','$good_id')";
	    if($result = mysqli_query($link,$query))
                $messege = "Поръчката е добавена успешно";
	    else    $messege = "Грешка при добавяне";
    }
    else  $messege = "Грешка при добавяне";
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Добави Поръчка</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Добави Поръчка</h2>
                <?php
                    if(isset($messege)) echo $messege;
                ?>
                <form method = "POST" action = "add_order.php">
                <table border = "1">
                    <tr>
                        <th>ID на клиента</th>
                        <th><input type="text" name = "client_id"></th>
                    </tr>
                    <tr>
                        <th>ID на стоката</th>
                        <th><input type="text" name = "good_id"></th>
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

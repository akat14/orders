<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Цели Поръчки</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Цели Поръчки</h2>
                <table>
			<tr>
			    <th>ID</th>
                            <th>Стока ID</th>
                            <th>Клиент ID</th>
                            <th>Клиент</th>
                            <th>Стокa</th>
                            <th>Цена</th>
			</tr>
                        <?php
                        include "db.php";
                        $query = "SELECT orders.id, orders.good_id, orders.client_id, users.user, goods.name, goods.price 
			FROM orders
			LEFT JOIN users ON orders.client_id=users.id
			LEFT JOIN goods ON orders.good_id=goods.id";
                        if($result= mysqli_query($link,$query)){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['good_id'];?></td>
                            <td><?php echo $row['client_id'];?></td>
                            <td><?php echo $row['user'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['price'];?></td>
                        </tr>
                    <?php
                        }
                        }
                        else{
                            ?>
                    <tr>
                        <td colspan='5' align='center'>Няма записи</td>
                    </tr>
                    <?php
			}
                    ?>
                </table>
            </center>
        </div>
    </div>
</body>

</html>

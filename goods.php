<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Продукти</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Продукти</h2>
                <table>
		    <form method="POST">
                	<tr>
                            <th>ID</th>
                            <th>Стока</th>
                            <th>Цена</th>
			</tr>
                        <?php
                        include "db.php";
                        $query = "SELECT *
                        FROM goods";
                        if($result= mysqli_query($link,$query)){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['price'];?></td>
                        </tr>
		    </form>
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

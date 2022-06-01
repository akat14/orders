<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Поръчки</title>
</head>

<body>
    <div id="main">
        <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Поръчки</h2>
                <table>
			<tr>
			    <th>ID|</th>
                            <th>Стока ID|</th>
                            <th>Клиент ID|</th>
			</tr>
                        <?php
                        include "db.php";
                        $query = "SELECT *
                        FROM orders";
                        if($result= mysqli_query($link,$query)){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['good_id'];?></td>
                            <td><?php echo $row['client_id'];?></td>
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

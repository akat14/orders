<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Начало</title>
</head>

<body>
    <div id="main">
    <?php include "menu.php" ?>
        <div id="content">
            <center>
                <h2>Добре дошли в orders</h2>
		Може да видите продукти на продажба от таба продукти<br>
		<?php
        	if (isset($_SESSION['user'])){
            		if($_SESSION['type']=="client") {
		?>
		Може да пазарувате от таба купи.<br>
		<?php
			}
            		else {
		?>
		От таба Продукти може да видите всички налични продукти.<br>
		От таба Потребители може да видите всички налични потребители<br>
		От таба Добави Поръчки може да добавите поръчки.<br>
		От таба Добави Продукти може да добавите продукти.<br>
		От таба Редактирай Продукти може да редактирате продукти.<br>
		От таба Редалторай Поръчки може да редактирате проръчки.<br>
		От таба Изтрий Продукти може да изтриете продукти.<br>
		От таба Изтрий Поръчки може да изтриете поръчки.<br>
		<?php
		 	}
		?>
		Oт таба Изход може да излезете от профила си.
		<?php
		}
		else
		?>
                За повече опций влезте в профила си.<br>
            </center>
        </div>
    </div>
</body>

</html>

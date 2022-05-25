<div id="menu">
    <a href="index.php">Начало</a>|
    <a href="goods.php">Продукти</a>| 
    <?php
	if (isset($_SESSION['user'])){
	    if($_SESSION['type']=="client") {
    ?>
    <a href="buy.php">Купи</a>|
    <?php
	    }
	    else {	
    ?>
    <a href="users.php">Потребители</a>|
    <a href="orders.php">Поръчки</a>|
    <a href="full_orders.php">Цели Поръчки</a>|
    <a href="add_good.php">Добави Продукти</a>|
    <a href="add_order.php">Добави Поръчка</a>|
    <a href="edit_goods.php">Редактирай Продукти</a>|
    <a href="edit_orders.php">Редалторай Поръчки</a>|
    <a href="delete_goods.php">Изтрий Продукти</a>|
    <a href="delete_orders.php">Изтрий Поръчки</a>|
<?php
	    }
?>
    <a href="logout.php">Изход</a>
    <?php 
    }
    else{
?>
<a href="login.php">Вход</a>|
<a href="singup.php">Регистация</a>
<?php
    }
?>
</div>

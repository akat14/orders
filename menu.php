<ul>
    <li><li><a href="index.php">Начало</a></li>
    <li><a href="goods.php">Продукти</a></li> 
    <?php
	if (isset($_SESSION['user'])){
	    if($_SESSION['type']=="client") {
    ?>
    <li><a href="buy.php">Купи</a>
    <?php
	    }
	    else {	
    ?>
    <li><a href="users.php">Потребители</a></li>
    <li><a href="orders.php">Поръчки</a></li>
    <li><a href="full_orders.php">Цели Поръчки</a></li>
    <li><a href="add_good.php">Добави Продукти</a></li>
    <li><a href="add_order.php">Добави Поръчка</a></li>
    <li><a href="edit_goods.php">Редактирай Продукти</a></li>
    <li><a href="edit_orders.php">Редалторай Поръчки</a></li>
    <li><a href="delete_goods.php">Изтрий Продукти</a></li>
    <li><a href="delete_orders.php">Изтрий Поръчки</a></li>
<?php
	    }
?>
    <li style="float:right"><a href="logout.php">Изход</a>
    <?php 
    }
    else{
?>
<li style="float:right"><a href="singup.php">Регистация</a>
<li style="float:right"><a href="login.php">Вход</a></li>
<?php
    }
?>
</ul>

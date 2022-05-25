<?php
$sql_host = "localhost";
$sql_user = "root";
$sql_password = "";
$sql_db = "orders";

if(!$link = mysqli_connect($sql_host,$sql_user,$sql_password,$sql_db))
{

	die("failed to connect!");
}
mysqli_query($link, "SET NAMES 'UTF8'");
?>

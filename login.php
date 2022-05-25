<?php
session_start();
include "db.php";
if (!empty($_POST)) {
    $user = $_POST['user'];
    $password = $_POST['pass'];
    $query = "select * from users where user = '$user' limit 1";
    $result = mysqli_query($link, $query);
    $user_data = mysqli_fetch_assoc($result);
    if (!empty($user_data) && $user_data['password'] === $password) {
        $_SESSION['user'] = $user_data['user'];
        $_SESSION['type'] = $user_data['type'];
	$_SESSION['id'] = $user_data['id'];
        session_write_close();
        header("location: index.php");
        exit();
    } else $messege = "Error";
}
?>

<html>

<head>
    <meta http-equiv="Content-Type" conten="text/html; charset=utf-8">
    <link rel="stylesheet" href="site.css" type="text/css" />
    <title>Login</title>
</head>

<body>
    <div id="main">

        <div id="menu">
            <?php include("menu.php") ?>
        </div>

        <div id="content">
            <center>
                <h2>Въведете потребителско име и парола</h2>
                <?php
                if (isset($messege)) print_r($messege);
                ?>
                <form action="login.php" method="POST">
                    <table border="1" align="center" style="border:1px solid #000000;">
                        <tr>
                            <td>Потребител</td>
                            <td><input type="text" name="user" style="width:200px;"></td>
                        </tr>
                        <tr>
                            <td>Парола</td>
                            <td><input type="password" name="pass" style="width:200px;"></td>
                        </tr>
                        <tr>

                        <tr>
                            <td colspan='2' align='center'><input type="submit" value="Вход"></td>
                        </tr>
                    </table>
                </form>
            </center>
        </div>
    </div>
</body>

</html>

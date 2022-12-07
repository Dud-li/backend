<?php

$login = $_POST['login'];
$pass = $_POST['pass'];

$conn = mysqli_connect('mysql_5', 'root', 'root', 'datab');

$sqlUser = "SELECT * FROM `users` WHERE `user` = '$login' AND `password` = '$pass'";

$user = 0;

if ($result = mysqli_query($conn, $sqlUser)){
    while($row = mysqli_fetch_assoc($result)) {
        $user = $row['user'];
    }
}
$conn->close();

if ($user != 0)
    session_start();
    if (empty ($_COOKIE['newTheme']) &&  empty ($_COOKIE['lang'] )){
        setcookie('newTheme', 'light', time() + 3600);
        setcookie('lang', 'en', time() + 3600);
    }
#    setcookie("loginUs",$login,time()+3600);
    header('Location: userPage.php');
?>
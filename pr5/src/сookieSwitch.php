<?php
if (isset( $_POST['theme'] )) {
    if ($_COOKIE['newTheme'] == 'light') {
        setcookie('newTheme', 'dark', time() + 3600);
    } else {
        setcookie('newTheme', 'light', time() + 3600);
    }
}
elseif (isset( $_POST['lang'] )) {
    if ($_COOKIE['lang'] == 'ru') {
        setcookie('lang', 'eng', time() + 3600);
    } else {
        setcookie('lang', 'ru', time() + 3600);
    }
}
echo "<script> location.href='userPage.php'; </script>";
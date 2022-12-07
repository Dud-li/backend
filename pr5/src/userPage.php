<?php
//if (isset($_COOKIE["loginUs"]))
//    echo "Good Morning: " . $_COOKIE["loginUs"];
if (empty ($_COOKIE['newTheme']) &&  empty ($_COOKIE['lang'] )){
    setcookie('newTheme', 'light', time() + 3600);
    setcookie('lang', 'en', time() + 3600);
}
if ($_COOKIE['newTheme'] == 'dark')
    $themeStyleSheet = 'css/dark.css';
else
    $themeStyleSheet = 'css/light.css';

if ($_COOKIE['lang'] == 'ru')
    $lang = "ru";
else
    $lang = "en";
?>
<html lang="<? echo $lang?>">
<head>
    <meta charset="UTF-8">
    <title>Страницы</title>
    <link href="<?php echo $themeStyleSheet; ?>" rel="stylesheet" id="theme-link">
</head>
<?php if ($lang == "ru"):
    include "ru.php"
    ?>
<?php else:
    include "en.php"
    ?>
<?php endif ?>
</html>

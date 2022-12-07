<body>
<form method="POST" action="сookieSwitch.php">
 <button name="theme" type="submit" value="0">Сменить тему</button>
 <button name="lang" type="submit" value="1">Сменить язык</button>
</form>
<form action="UpDown.php" method="post" enctype="multipart/form-data">
    <p>Выберите pdf для загрузки на сервер</p>
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <p></p>
    <input type="submit" value="Загрузить" name="submit">
</form>
<h1>Загруженные файлы</h1>
<?php
if ($handle = opendir('uploads')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo <<<END
            <form action="UpDown.php" method="get">
                <input type="submit" value="$entry" name="download">
            </form>
            <p></p>
END;
        }
    }
    closedir($handle);
}
?>
</body>
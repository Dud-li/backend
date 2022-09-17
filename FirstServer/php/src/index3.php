<html lang="ru">
    <body>
        <h1 style="text-align:center">Информационно-администранивная веб-страница</h1>
        <p><b>Список файлов</b></p>
        <?php
            echo system("ls"); 
        ?>
        <br><br>
        <p><b>Информация о процессах</b></p>
        <?php
            echo system("ps");
        ?>
        <br><br>
        <p><b>Пользователь</b></p>
        <?php
            echo system("whoami");
        ?>
        <br><br>
        <p><b>Идентификатор</b></p>
        <?php
            echo system("id");
        ?>
    </body>
</html>
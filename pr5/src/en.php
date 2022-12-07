<body>
<form method="POST" action="сookieSwitch.php">
    <button name="theme" type="submit" value="0">Change theme</button>
    <button name="lang" type="submit" value="1">Change language</button>
</form>
<form action="UpDown.php" method="post" enctype="multipart/form-data">
    <p>Select the pdf to upload to the server</p>
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <p></p>
    <input type="submit" value="Upload" name="submit">
</form>
<h1>Uploaded files</h1>
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
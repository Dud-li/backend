<html lang="en">
<head>
<title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<p>
  <a href="index1.php">первое задание</a>
</p>
<p>
  <a href="index2.php">второе задание</a>
</p>
<p>
  <a href="index3.php">третье задание</a>
</p>
<table>
    <tr><th>Id</th><th>Name</th><th>Surname</th></tr>
<?php
$mysqli = new mysqli("db", "user", "password", "appDB");
$result = $mysqli->query("SELECT * FROM users");
foreach ($result as $row){
    echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>";
}
?>
</table>
<?php
phpinfo();
?>
</body>
</html>
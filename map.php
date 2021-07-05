<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
<script src="main.js"></script>
</head>
<body style="display: flex; flex-direction: column;">

<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$servername;dbname=dss_methods", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
session_start();
if(isset($_POST['submit'])) {
    $name = $_SESSION['name'];
    $des_map = $_POST['des_map'];
    $url = $_POST['url_map'];
    $sql = "INSERT INTO places_data (name, description, URL) VALUES (?,?,?)";
    $stmt= $db->prepare($sql);
    $stmt->execute([$name, $des_map, $url]);
    $data = $db->query('SELECT * FROM places_data')->fetchAll(PDO::FETCH_ASSOC);
   foreach ($data as $zeb) {
       $URL = $zeb['URL'];
       echo "<div style='display: flex; flex-direction: column; width: 100px; height: 75px'>";
       echo "<span>".$zeb['name']."</span>";
       echo "<p>".$zeb['description']."</p>";
       echo "<a href='$URL'>".$URL."</a>";
       echo "</div>";

   }
}

?>
</body>
</html>
<a href="add_map.html">Add Map</a>


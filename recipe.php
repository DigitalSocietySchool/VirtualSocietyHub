<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$servername;dbname=dss_methods", $username, $password);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$id = $_GET['id'];
// Checking data it is a number or not
if (!is_numeric($id)) {
    echo "Data Error";
    exit;
}
// Get images from the database
$stmt = $db->prepare("SELECT * FROM images WHERE id=?");
if ($stmt->execute([$id])) {
    while ($row = $stmt->fetch()) {
        $imageURL = 'images/' . $row["file_name"];
        ?>
        <img src="<?php echo $imageURL; ?>" alt="">
        <?php
    }
    echo "Succes";
}

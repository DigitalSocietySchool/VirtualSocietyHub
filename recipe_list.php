<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8"/>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
</head>
<body style="background-image: url('images/bg-recipe_list.jpg')" id="backround">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'dbConfig.php';
//List all recipes
$query = $db->query("SELECT * FROM images ORDER BY id DESC");

if ($query->num_rows > 0){
    while ($row = $query->fetch_assoc()) {
        $desc = $row['description'];
        $name = $row['name'];
        ?>
        <div class="recipe_box">
            <h3 class="title_rec"><?php echo $desc; ?></h3>
            <span class="rec_des">by <?php echo $name ?></span>
            <?php echo "<a class='link_rec' href='recipe.php?id=" . $row['id'] . "' type='button' name='link'> See Recipe</a>"; ?>
        </div>
        <?php
    }
    ?>
    <?php
}else{ ?>
</body>
</html>
<p>No image(s) found...</p><?php }

?>


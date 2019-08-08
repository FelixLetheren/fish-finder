<?php
require_once 'php-files/functions.php';

$db = databaseConnect();
$collection = getFish($db);
$fishDataHtml = displayFish($collection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="stylesheets/normalise.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/stylesheet.css" rel="stylesheet" type="text/css">
    <title>Fish Finder</title>
</head>
<body>
<div class="title-container">
    <h1>Fish Finder</h1>
</div>
<div class="content-container">
    <?php echo $fishDataHtml; ?>
</div>
<div class="link-container">
    <a class="new-fish-icon" href="newFish.php">
        <img src="images/plus-icon.png" alt="Add a new fish">
    </a>
</div>

</body>
</html>
<!DOCTYPE html>
<?php

$db = new PDO('mysql:host=192.168.20.20; dbname=fish-finder', 'root', '');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = $db->prepare('SELECT `fish`.`name`,`fish`.`species`,`fish`.`img-filepath`,`fish`.`length`,`fish`.`aggression`,`fish`.`color`,`fish`.`pattern` FROM `fish`;');

$sql->execute();

$collection = $sql->fetchAll();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheets/normalise.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/stylesheet.css" rel="stylesheet" type="text/css">
    <title>Fish Finder</title>
</head>
<body>
<div class="title-container">
    <h1>Fish Finder</h1>
</div>
<div class="row-container">
<div class="fish-card">
    <h2 class="name"><?php echo $collection[0]['name']; ?></h2>
    <h2 class="stat"><?php echo $collection[0]['species']; ?></h2>
    <img class="fish-picture" src="<?php echo $collection[0]['img-filepath'];?>">
    <h2 class="stat">Length- <?php echo $collection[0]['length']; ?></h2>
    <h2 class="stat">Agression- <?php echo $collection[0]['aggression']; ?></h2>
    <h2 class="stat">Colour- <?php echo $collection[0]['color']; ?></h2>
    <h2 class="stat">Pattern- <?php echo $collection[0]['pattern']; ?></h2>
</div>
    <div class="fish-card">
        <h2 class="name"><?php echo $collection[1]['name']; ?></h2>
        <h2 class="stat"><?php echo $collection[1]['species']; ?></h2>
        <img class="fish-picture" src="<?php echo $collection[1]['img-filepath'];?>">
        <h2 class="stat"><?php echo $collection[1]['length']; ?></h2>
        <h2 class="stat"><?php echo $collection[1]['aggression']; ?></h2>
        <h2 class="stat"><?php echo $collection[1]['color']; ?></h2>
        <h2 class="stat"><?php echo $collection[1]['pattern']; ?></h2>
    </div>
    <div class="fish-card">
        <h2 class="name"><?php echo $collection[2]['name']; ?></h2>
        <h2 class="stat"><?php echo $collection[2]['species']; ?></h2>
        <img class="fish-picture" src="<?php echo $collection[2]['img-filepath'];?>">
        <h2 class="stat"><?php echo $collection[2]['length']; ?></h2>
        <h2 class="stat"><?php echo $collection[2]['aggression']; ?></h2>
        <h2 class="stat"><?php echo $collection[2]['color']; ?></h2>
        <h2 class="stat"><?php echo $collection[2]['pattern']; ?></h2>
    </div>
</div>
</body>
</html>
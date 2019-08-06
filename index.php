<!DOCTYPE html>
<?php

$db = new PDO('mysql:host=192.168.20.20; dbname=fish-finder', 'root', '');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = $db->prepare('SELECT `fish`.`name`,`fish`.`species`,`fish`.`img-filepath`,`fish`.`length`,`fish`.`aggression`,`fish`.`color`,`fish`.`pattern` FROM `fish`;');

$sql->execute();

$collection = $sql->fetchAll();
/**
 * @param array $collection
 * Takes all re
 */
//function makePage(array $collection)
//{
//    echo '<div class="row-container">';
//    foreach ($collection as $fish) {
//        makeCard($fish);
//    }
//    echo '</div>';
//}

function displayFish(array $fishFromDB)
{
    $result = '';
    foreach ($fishFromDB as $fish) {
        $result .= '<div class="fish-card">';
        $result .= '<h2 class="name">' . $fish['name'] . '</h2>';
        $result .= '<h3 class="stat">' . $fish['species'] . '</h3>';
        $result .= '<img alt="fish picture" class="fish-picture" src="' . $fish['img-filepath'] . '">';
        $result .= '<h3 class="stat"> Length- ' . $fish['length'] . '</h3>';
        $result .= '<h3 class="stat"> Aggression- ' . $fish['aggression'] . '</h3>';
        $result .= '<h3 class="stat"> Colour- ' . $fish['color'] . '</h3>';
        $result .= '<h3 class="stat"> Pattern- ' . $fish['pattern'] . '</h3>';
        $result .= '</div>';
    }
    return $result;
}

?>
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
<div class="container">
<?php echo displayFish($collection); ?>
</div>
</body>
</html>
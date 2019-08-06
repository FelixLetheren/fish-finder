<!DOCTYPE html>
<?php
/**
 * @return PDO
 * Connects to database
 */
function databaseConnect(){
    $db = new PDO('mysql:host=192.168.20.20; dbname=fish-finder', 'root', '');
    return $db;
}

/**
 * @param $db
 * @return array
 * Queries the database to get multidimensional array of all data required to display.
 */
function getFish($db):array
{
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sql = $db->prepare('SELECT `fish`.`name`,`fish`.`species`,`fish`.`img-filepath`,`fish`.`length`,`fish`.`aggression`,`fish`.`color`,`fish`.`pattern` FROM `fish`;');
    $sql->execute();
    $collection = $sql->fetchAll();
    return $collection;
}

/**
 * @param array $fishFromDB
 * @return string
 * Iterates through each associated array and concatenates all the information into one large string
 * of HTML
 */
function displayFish(array $fishFromDB)
{
    $result = '';
    foreach ($fishFromDB as $fish) {
        $result .= '<div class="fish-card">';
        $result .= '<h2 class="name">' . $fish['name'] . '</h2>';
        $result .= '<h3 class="stat">' . $fish['species'] . '</h3>';
        $result .= '<img alt="fish picture" class="fish-picture" src="' . $fish['img-filepath'] . '">';
        $result .= '<h3 class="stat"> Length- ' . $fish['length'] . 'cm</h3>';
        $result .= '<h3 class="stat"> Aggression- ' . $fish['aggression'] . '</h3>';
        $result .= '<h3 class="stat"> Colour- ' . $fish['color'] . '</h3>';
        $result .= '<h3 class="stat"> Pattern- ' . $fish['pattern'] . '</h3>';
        $result .= '</div>';
    }
    return $result;
}
$db = databaseConnect();
$collection = getFish($db);
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
<?php echo displayFish($collection);
$exampleFish = [
    ['name' => 'Borris',
        'species' => 'shark',
        'img-filepath' => 'images/borris.png',
        'length' => 7,
        'aggression' => 2,
        'color' => 'Blue',
        'pattern' => 'Spotty'],['name'=>'Borris',
    'species' => 'shark',
    'img-filepath' => 'images/borris.png',
    'length' => 7,
    'aggression' => 2,
    'color' => 'Blue',
    'pattern' => 'Spotty']];
echo displayFish($exampleFish) ?>
</div>
</body>
</html>
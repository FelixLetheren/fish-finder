<!DOCTYPE html>
<?php

$db = new PDO('mysql:host=192.168.20.20; dbname=fish-finder', 'root', '');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = $db->prepare('SELECT `fish`.`name`,`fish`.`species`,`fish`.`img-filepath`,`fish`.`length`,`fish`.`aggression`,`fish`.`color`,`fish`.`pattern` FROM `fish`;');

$sql->execute();

$collection = $sql->fetchAll();

var_dump($collection);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="stylesheets/normalise.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/stylesheet.css" rel="stylesheet" type="text/css">
    <title>Fish Finder</title>
</head>
<body>
<h1>Is everything working?</h1>
</body>
</html>
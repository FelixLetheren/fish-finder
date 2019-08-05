<?php

$db = new PDO('mysql:host=192.168.20.20; dbname=fish-finder', 'root', '');

$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = $db->prepare('SELECT * FROM `fish`;');

$sql ->execute();

$collection = $sql -> fetchAll();

var_dump($collection);
?>

<?php
require_once 'php-files/functions.php';

$db = databaseConnect();
if (
    isset($_POST['name'])
    && isset($_POST['species'])
    && isset($_POST['length'])
    && isset($_POST['aggression'])
    && isset($_POST['color'])
    && isset($_POST['pattern'])
) {
   $message =inputConfirmation(insertEntryIntoDB($db,$_POST));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="stylesheets/normalise.css" rel="stylesheet" type="text/css">
    <link href="stylesheets/stylesheet.css" rel="stylesheet" type="text/css">
    <title>Fish Finder- New Fish</title>
</head>
<body>
<div class="title-container">
    <h1>Add a new fish</h1>
</div>
<div class="content-container form-container">
    <form method="post" action="newFish.php">
        <input class="field" type="text" placeholder="Name" name="name" required>
        <input class="field" type="text" placeholder="Species" name="species" required>
        <input class="field" type="number" placeholder="Length(cm)" name="length" required>
        <h3>Aggression:</h3>
        <select class="field" name="aggression" required>
            <option label="Please select"></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <input class="field" type="text" placeholder="Color" name="color" required>
        <input class="field" type="text" placeholder="Pattern" name="pattern" required>
        <input class="field" type="submit" value="Submit">
    </form>
</div>
<div class="link-container">
    <a class="new-fish-icon" href="index.php">
        <img src="images/return.png" alt="Return to Collection">
    </a>
</div>
<div class="content-container">
    <?php if(isset($_POST)) echo $message;?>
</div>
</body>
</html>

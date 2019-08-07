<?php
/**
 * @return PDO
 * Connects to database
 */
function databaseConnect()
{
    $db = new PDO('mysql:host=192.168.20.20; dbname=fish-finder', 'root', '');
    return $db;
}

/**
 * @param $db
 * @return array
 * Queries the database to get multidimensional array of all data required to display.
 */
function getFish($db): array
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
function displayFish(array $fishFromDB):string
{
    $result = '';
    foreach ($fishFromDB as $fish) {
        if (isset($fish['name'])
            && isset($fish['species'])
            && isset($fish['length'])
            && isset($fish['aggression'])
            && isset($fish['color'])
        ) {
            $result .=
                '<div class="fish-card"><h2 class="name">' . $fish['name'] .
                '</h2><h3 class="stat">' . $fish['species'] .
                '</h3><img alt="fish picture" class="fish-picture" src="' . $fish['img-filepath'] . '
                "><h3 class="stat"> Length-  ' . $fish['length'] . '
                cm</h3><h3 class="stat"> Aggression- ' . $fish['aggression'] . '
                </h3><h3 class="stat"> Colour- ' . $fish['color'] . '
                </h3><h3 class="stat"> Pattern- ' . $fish['pattern'] . '
                </h3></div>';
        } else {
            return 'Error! please contact administrator';}
    }
    return $result;
}

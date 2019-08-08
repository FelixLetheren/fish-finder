<?php
/**
 * @return PDO
 * Connects to database
 */
function databaseConnect(){
    $db = new PDO('mysql:host=192.168.20.20; dbname=fish-finder', 'root', '');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * @param $db
 * @return array
 * Queries the database to get multidimensional array of all data required to display.
 */
function getFish($db): array{
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
function displayFish(array $fishFromDB): string{
    $result = '';
    foreach ($fishFromDB as $fish) {
        if (isset($fish['name'])
            && isset($fish['species'])
            && isset($fish['length'])
            && isset($fish['aggression'])
            && isset($fish['color'])
        ) {
            $result .=
                '<div class="fish-card"><h2 class="name">'
                . $fish['name']
                . '</h2><h3 class="stat">'
                . $fish['species']
                . '</h3><img alt="fish picture" class="fish-picture" src="'
                . $fish['img-filepath']
                . '"><h3 class="stat"> Length:  '
                . $fish['length']
                . 'cm</h3><h3 class="stat"> Aggression: '
                . $fish['aggression']
                . '</h3><h3 class="stat"> Colour: '
                . $fish['color']
                . '</h3><h3 class="stat"> Pattern: '
                . $fish['pattern']
                . '</h3></div>';
        } else {
            return 'Error! Please contact administrator';
        }
    }
    return $result;
}

/**
 * @param $dataBase
 * @param array $fishArray
 * @return bool
 * Takes an array and inserts the data into the database
 */
function insertEntryIntoDB($dataBase, array $fishArray): bool
{
    if (
        strlen($fishArray['name']) < 20
        && strlen($fishArray['species'] < 30)){
        $sql = $dataBase->prepare('INSERT INTO `fish`(`name`,`species`,`length`,`aggression`,`color`,`pattern`) VALUES (:inputName,:inputSpecies,:inputLength,:inputAggression,:inputColor,:inputPattern);');
    $sql->bindParam('inputName', $fishArray['name'], PDO::PARAM_STR);
    $sql->bindParam('inputSpecies', $fishArray['species'], PDO::PARAM_STR);
    $sql->bindParam('inputLength', $fishArray['length'], PDO::PARAM_INT);
    $sql->bindParam('inputAggression', $fishArray['aggression'], PDO::PARAM_INT);
    $sql->bindParam('inputColor', $fishArray['color'], PDO::PARAM_STR);
    $sql->bindParam('inputPattern', $fishArray['pattern'], PDO::PARAM_STR);
    $sql->execute();
    return true;
}
else{
    return false;
}
}

/**
 * @param bool $dataEntryResult
 * @return string
 * Takes a boolean and returns 2 different response message strings if true or false
 */
function inputConfirmation(bool $dataEntryResult): string{
    if ($dataEntryResult) {
        return '<h2 class="success">Success! Fish has been inserted into collection</h2>';
    } else {
        return '<h2 class="failure">Oops! You\'ve made and error. Please check you\'ve correctly filled all fields!</h2>';
    }
}
<?php
header('Content-Type: application/json');
$file = 'db.json';
$string = file_get_contents("db.json") or die('Could not read database!');
echo $string;
//$json_object=json_encode(array(language))
?>
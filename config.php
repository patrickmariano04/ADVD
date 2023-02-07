<?php

require_once __DIR__ . "/vendor/autoload.php";
 $client = new MongoDB\Client("mongodb+srv://pat:pat@cluster0.94f6xud.mongodb.net/test");
$db = $client->test;
$db = $client->sample_restaurants;
$collection = $db->restaurants;

?>

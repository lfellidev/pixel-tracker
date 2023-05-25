<?php
//Setting here your MongoDB credentials
$mongo_user="MONGO_USER";
$mongo_password="MONGO_PASSWORD";
$mongo_ip="MONGO_IP_SERVER";
$mongo_database="MONGO_DATABASE";
$mongo_collection="MONGO_COLLECTION";

header('Content-Type: image/png');
readfile('./pixel.png');
require 'vendor/autoload.php';
$mongoClient = new MongoDB\Client('mongodb+srv://'.$mongo_user.':'.$mongo_password.'@'.$mongo_ip);
$database = $mongoClient->selectDatabase($mongo_database);
$collection = $database->selectCollection($mongo_collection);

$document = [
'ip' => $_SERVER['REMOTE_ADDR'],
'createdAt' => time(),
];
$result = $collection->insertOne($document);
?>

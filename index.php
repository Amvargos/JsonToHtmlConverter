<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';

use JsonToHtmlConverter\Container;

$jsonData = file_get_contents('json_data/example.json');
$data = json_decode($jsonData, true);

$rootElement = new Container($data['type'], $data['payload'], $data['parameters'], $data['children']);
$html = $rootElement->render();

echo $html;
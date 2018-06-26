<?php
require __DIR__ . '/vendor/autoload.php';

$websocketServer = new \WSSC\WebSocketServer(new \WSSCTEST\ServerHandler(), [
    'host' => '0.0.0.0',
    'port' => 8000
]);
$websocketServer->run();
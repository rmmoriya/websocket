<?php
require __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/ServerHandler.php';

$websocketServer = new \WSSC\WebSocketServer(new \ServerHandler(), [
    'host' => '0.0.0.0',
    'port' => 8000
]);
$websocketServer->run();
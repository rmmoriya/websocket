<?php
require __DIR__ . '/vendor/autoload.php';

use WSSC\WebSocketClient;

$client = new WebSocketClient('wss://websocket.augusto.ai');
$client->send('{"room" : 3}');
echo $client->receive();
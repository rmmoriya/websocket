<?php
require __DIR__ . '/vendor/autoload.php';

use WSSC\WebSocketClient;

$client = new WebSocketClient('wss://websocket.augusto.ai/notifications/messanger/yourtoken123');
$client->send('{"room" : 5}');
echo $client->receive();
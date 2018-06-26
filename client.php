<?php
require __DIR__ . '/vendor/autoload.php';

use WSSC\WebSocketClient;

$client = new WebSocketClient('ws://localhost:8000/notifications/messanger/yourtoken123');
$client->send('{"user_id" : 123}');
echo $client->receive();
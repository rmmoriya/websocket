<?php

use WSSC\Contracts\ConnectionContract;
use WSSC\Contracts\WebSocket;
use WSSC\Exceptions\WebSocketException;

class ServerHandler extends WebSocket
{
    public $pathParams = [':entity', ':context', ':room'];
    private $clients = [];

    public function onOpen(ConnectionContract $conn)
    {
        $this->clients[$this->pathParams[':room']][] = $conn;
        $conn->send(json_encode([
            "id" => "eb4e0ec3",
            "event" => "open",
            "room" => $this->pathParams[':room'],
            "clients" => count($this->clients[$this->pathParams[':room']])
        ]));
    }

    public function onMessage(ConnectionContract $recv, $msg)
    {
        /** @var ConnectionContract $client */
        foreach ($this->clients[$this->pathParams[':room']] as $client) {
            $client->send(json_encode([
                "id" => "eb4e0ec3",
                "content" => $msg
            ]));
        }
    }

    public function onClose(ConnectionContract $conn)
    {
        unset($this->clients[array_search($conn, $this->clients)]);
        $conn->close();
    }

    /**
     * @param ConnectionContract $conn
     * @param WebSocketException $ex
     */
    public function onError(ConnectionContract $conn, WebSocketException $ex)
    {
        echo 'Error occured: ' . $ex->printStack();
    }

    /**
     * You may want to implement these methods to bring ping/pong events
     * @param ConnectionContract $conn
     * @param string $msg
     */
    public function onPing(ConnectionContract $conn, $msg)
    {
        // TODO: Implement onPing() method.
    }

    /**
     * @param ConnectionContract $conn
     * @param $msg
     * @return mixed
     */
    public function onPong(ConnectionContract $conn, $msg)
    {
        // TODO: Implement onPong() method.
    }
}

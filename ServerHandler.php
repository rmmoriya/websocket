<?php

use WSSC\Contracts\ConnectionContract;
use WSSC\Contracts\WebSocket;
use WSSC\Exceptions\WebSocketException;

class ServerHandler extends WebSocket
{
    public $pathParams = [':entity', ':context', ':token'];
    private $clients = [];

    public function onOpen(ConnectionContract $conn)
    {
        $this->clients[$this->pathParams[':token']][] = $conn;
        $conn->send(json_encode([
            "id" => "eb4e0ec3",
            "event" => "open",
            "room" => $this->pathParams[':token'],
            "clients" => count($this->clients)
        ]));
    }

    public function onMessage(ConnectionContract $recv, $msg)
    {
        /** @var ConnectionContract $client */
        foreach ($this->clients[$this->pathParams[':token']] as $client) {
            $client->send(json_encode([
                "id" => "eb4e0ec3",
                "content" => $msg
            ]));
        }

        $recv->send(json_encode([
            "id" => "eb4e0ec3",
            "content" => $msg
        ]));
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

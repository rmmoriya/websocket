<?php
/**
 * Created by PhpStorm.
 * User: rafaelmoriya
 * Date: 6/26/18
 * Time: 11:43
 */

class WebSocketUser
{
    public $socket;
    public $id;
    public $headers = array();
    public $handshake = false;
    public $handlingPartialPacket = false;
    public $partialBuffer = "";
    public $sendingContinuous = false;
    public $partialMessage = "";

    public $hasSentClose = false;

    function __construct($id, $socket)
    {
        $this->id = $id;
        $this->socket = $socket;
    }
}
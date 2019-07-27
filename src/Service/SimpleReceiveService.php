<?php


namespace App\Service;


use App\Message\SimpleMessage;

class SimpleReceiveService
{
    /**
     * @var SimpleMessage[]
     */
    protected $receivedMessages = [];

    public function receiveMessage(SimpleMessage $message)
    {
        $this->receivedMessages[] = $message;
    }

    public function getAllReceivedMessage()
    {
        return $this->receivedMessages;
    }
}

<?php


namespace App\MessageHandler;


use App\Message\SimpleMessage;
use App\Service\SimpleReceiveService;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SimpleMessageHandler implements MessageHandlerInterface
{
    /**
     * @var SimpleReceiveService
     */
    protected $service;

    public function __construct(SimpleReceiveService $service)
    {
        $this->service = $service;
    }

    public function __invoke(SimpleMessage $message)
    {
        $this->service->receiveMessage($message);
    }
}

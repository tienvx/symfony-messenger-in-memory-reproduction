<?php


namespace App\Service;


use App\Message\SimpleMessage;
use Symfony\Component\Messenger\MessageBusInterface;

class SimpleDispatchService
{
    /**
     * @var MessageBusInterface
     */
    protected $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function dispatchMessage(SimpleMessage $message)
    {
        $this->messageBus->dispatch($message);
    }
}

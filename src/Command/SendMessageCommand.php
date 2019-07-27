<?php

namespace App\Command;

use App\Message\SimpleMessage;
use App\Service\SimpleDispatchService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SendMessageCommand extends Command
{
    /**
     * @var SimpleDispatchService
     */
    protected $service;

    public function __construct(SimpleDispatchService $service)
    {
        $this->service = $service;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:send-message')
            ->setDescription('Send message to the transport.')
            ->setHelp('Send only one message at a time.')
            ->addArgument('text', InputArgument::REQUIRED, "The message's text.");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $text = $input->getArgument('text');
        $this->service->dispatchMessage(new SimpleMessage($text));
    }
}

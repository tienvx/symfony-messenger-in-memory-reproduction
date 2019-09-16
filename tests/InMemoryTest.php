<?php


namespace App\Tests;

use App\Message\SimpleMessage;
use App\Service\SimpleDispatchService;
use App\Service\SimpleReceiveService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Input\StringInput;

class InMemoryTest extends KernelTestCase
{
    /**
     * @var Application
     */
    protected $application;

    protected function setUp()
    {
        $this->application = $this->getApplication();
    }

    /**
     * @throws Exception
     */
    public function testConsume()
    {
        /* @var SimpleDispatchService $dispatchService */
        $dispatchService = self::$container->get('app.dispatch');
        /* @var SimpleReceiveService $receiveService */
        $receiveService = self::$container->get('app.receive');

        $dispatchService->dispatchMessage(new SimpleMessage('the first message'));
        $dispatchService->dispatchMessage(new SimpleMessage('the second message'));
        $dispatchService->dispatchMessage(new SimpleMessage('the last message'));

        $this->consume1Message();
        $this->assertEquals(1, count($receiveService->getAllReceivedMessage()));

        $this->consume1Message();
        $this->assertEquals(2, count($receiveService->getAllReceivedMessage()));

        $this->consume1Message();
        $this->assertEquals(3, count($receiveService->getAllReceivedMessage()));

        $this->consume1Message();
        $this->assertEquals(3, count($receiveService->getAllReceivedMessage()));

        $this->consume1Message();
        $this->assertEquals(3, count($receiveService->getAllReceivedMessage()));
    }

    /**
     * @throws Exception
     */
    protected function consume1Message()
    {
        $this->application->run(new StringInput('messenger:consume in_memory --limit=1'));
    }

    protected function getApplication()
    {
        $kernel = static::bootKernel();
        $application = new Application($kernel);
        $application->setAutoExit(false);

        return $application;
    }
}

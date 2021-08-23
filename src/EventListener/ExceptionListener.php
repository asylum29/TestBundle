<?php

namespace Asylum29\TestBundle\EventListener;

use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $output = new ConsoleOutput();
        $errorPrefix = $this->container->getParameter('test.error_prefix');
        $errorMessage = $event->getException()->getMessage();
        $output->writeln("$errorPrefix: $errorMessage");
    }
}

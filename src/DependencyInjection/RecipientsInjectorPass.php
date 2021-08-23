<?php

namespace Asylum29\TestBundle\DependencyInjection;

use Asylum29\TestBundle\Classes\RecipientInterface;
use Asylum29\TestBundle\Services\Hello;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RecipientsInjectorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $hello = $container->findDefinition(Hello::class);
        $taggedServices = $container->findTaggedServiceIds(RecipientInterface::TAG);
        foreach ($taggedServices as $service => $value) {
            $hello->addMethodCall('addRecipient', [new Reference($service)]);
        }
    }
}

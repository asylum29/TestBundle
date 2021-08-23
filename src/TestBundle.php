<?php

namespace Asylum29\TestBundle;

use Asylum29\TestBundle\DependencyInjection\RecipientsInjectorPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TestBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new RecipientsInjectorPass());
    }
}

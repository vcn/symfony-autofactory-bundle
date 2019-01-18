<?php

namespace Vcn\Symfony\AutoFactory\Bundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Vcn\Symfony\AutoFactory\AutoFactory;
use Vcn\Symfony\AutoFactory\AutoFactoryPass;

class VcnSymfonyAutofactoryBundle extends Bundle
{
    private const AUTO_FACTORY_TAG = 'vcn.auto_factory';

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container
            ->registerForAutoconfiguration(AutoFactory::class)
            ->addTag(self::AUTO_FACTORY_TAG);

        $container->addCompilerPass(new AutoFactoryPass(self::AUTO_FACTORY_TAG));
    }
}

<?php

namespace Accesto\InstallerBundle;

use Accesto\InstallerBundle\DependencyInjection\Compiler\InstallRequirementsCompilerPass;
use Accesto\InstallerBundle\DependencyInjection\Compiler\InstallActionsCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class AccestoCMSBundle
 *
 * @package Accesto\CMSBundle
 */
class AccestoInstallerBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new InstallRequirementsCompilerPass());
        $container->addCompilerPass(new InstallActionsCompilerPass());
    }
}

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 15:26
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class InstallRequirementsCompilerPass implements CompilerPassInterface {

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('accesto.installer.requirements')) {
            return;
        }

        $definition = $container->getDefinition('accesto.installer.requirements');

        foreach ($container->findTaggedServiceIds('installer.requirement') as $id => $attributes) {
            $definition->addMethodCall('addRequirement', array(new Reference($id)));
        }
    }
}
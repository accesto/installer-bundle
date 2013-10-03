<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 15:42
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\Install;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

interface ActionInterface
{

    public function run(ContainerAwareCommand $command, InputInterface $input, OutputInterface $output);

    public function getLabel();

    public function getDescription();
}
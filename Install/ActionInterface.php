<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 15:42
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\Install;


interface ActionInterface
{

    public function run();

    public function getLabel();

    public function getDescription();
}
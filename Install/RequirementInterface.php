<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 15:43
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\Install;


interface RequirementInterface
{

    public function getLabel();

    public function isFulfilled();

    public function isRequired();

    public function getHelp();
}
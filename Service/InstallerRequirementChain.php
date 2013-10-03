<?php
/**
 * @Author: Michał Kurzeja, Accesto
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 16:31
 */

namespace Accesto\InstallerBundle\Service;


use Accesto\InstallerBundle\Install\RequirementInterface;
use IteratorAggregate;
use ArrayIterator;

class InstallerRequirementChain implements IteratorAggregate
{
    protected $requirements;

    public function addRequirement(RequirementInterface $requirement)
    {
        $this->requirements[] = $requirement;
    }


    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->requirements);
    }
}
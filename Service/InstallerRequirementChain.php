<?php
/**
 * @Author: Michał Kurzeja, Accesto
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 16:31
 */

namespace Accesto\InstallerBundle\Service;


use Accesto\InstallerBundle\Install\RequirementCollection;
use IteratorAggregate;
use ArrayIterator;

class InstallerRequirementChain implements IteratorAggregate
{
    protected $requirements = array();

    public function addRequirement(RequirementCollection $requirement)
    {
        $this->requirements[] = $requirement;

        return $this;
    }


    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        /*
         * Sort first according to priority
         */
        $this->sort();
        return new ArrayIterator($this->requirements);
    }

    protected function sort()
    {
        usort(
            $this->requirements,
            function (RequirementCollection $a, RequirementCollection $b) {
                if ($a->getPriority() == $b->getPriority()) {
                    return 0;
                }

                return ($a->getPriority() > $b->getPriority()) ? -1 : 1;
            }
        );
    }
}
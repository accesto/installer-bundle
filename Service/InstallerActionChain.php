<?php
/**
 * @Author: Michał Kurzeja, Accesto
 *        User: mkurzeja
 *        Date: 03.10.13
 *        Time: 16:31
 */

namespace Accesto\InstallerBundle\Service;


use Accesto\InstallerBundle\Install\ActionCollection;
use IteratorAggregate;
use ArrayIterator;

class InstallerActionChain implements IteratorAggregate
{
    protected $actions = array();

    public function addAction(ActionCollection $action)
    {
        $this->actions[] = $action;

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
        return new ArrayIterator($this->actions);
    }

    protected function sort()
    {
        usort(
            $this->actions,
            function (ActionCollection $a, ActionCollection $b) {
                if ($a->getPriority() == $b->getPriority()) {
                    return 0;
                }

                return ($a->getPriority() > $b->getPriority()) ? -1 : 1;
            }
        );
    }
}
<?php
/**
 * @Author: Michał Kurzeja, Accesto
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 16:31
 */

namespace Accesto\InstallerBundle\Service;


use Accesto\InstallerBundle\Install\ActionInterface;
use IteratorAggregate;
use ArrayIterator;

class InstallerActionChain implements IteratorAggregate
{
    protected $actions;

    public function addAction(ActionInterface $action)
    {
        $this->actions[] = $action;
    }


    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->actions);
    }
}
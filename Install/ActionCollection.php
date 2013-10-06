<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 15:53
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\Install;

use IteratorAggregate;
use ArrayIterator;

class ActionCollection implements IteratorAggregate
{


    protected $label;
    protected $actions = array();
    protected $priority = 0;

    public function __construct($label, $priority = 0)
    {
        $this->label    = $label;
        $this->priority = $priority;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->actions);
    }

    public function addAction(ActionInterface $action)
    {
        $this->actions[] = $action;

        return $this;
    }

    /**
     * @param array $actions
     */
    public function setActions($actions)
    {
        $this->actions = $actions;
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }



}
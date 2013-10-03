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

    public function __construct($label)
    {
        $this->label = $label;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->actions);
    }

    public function add(ActionInterface $action)
    {
        $this->actions[] = $action;

        return $this;
    }

}
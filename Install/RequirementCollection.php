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

class RequirementCollection implements IteratorAggregate
{


    protected $label;
    protected $requirements = array();
    protected $priority = 0;

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
        return new ArrayIterator($this->requirements);
    }

    public function addRequirement(RequirementInterface $requirement)
    {
        $this->requirements[] = $requirement;

        return $this;
    }

    /**
     * @param array $requirements
     */
    public function setRequirements($requirements)
    {
        $this->requirements = $requirements;
    }

    /**
     * @return array
     */
    public function getRequirements()
    {
        return $this->requirements;
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
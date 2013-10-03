<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 15:58
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\Install;


class Action implements ActionInterface
{
    protected $label;

    /**
     * @var callable
     */
    protected $run;

    protected $description;

    public function __construct($label, $run, $description)
    {
        if (!is_callable($run)) {
            throw new \InvalidArgumentException('Argument run must be callable');
        }

        $this->label       = $label;
        $this->run         = $run;
        $this->description = $description;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function run()
    {
        return call_user_func($this->run);
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mkurzeja
 * Date: 03.10.13
 * Time: 15:58
 * To change this template use File | Settings | File Templates.
 */

namespace Accesto\InstallerBundle\Install;


class Requirement implements RequirementInterface
{
    protected $label;

    /**
     * @var callable
     */
    protected $fulfilled;

    protected $required;

    protected $help;

    public function __construct($label, $fulfilled, $required, $help)
    {
        if(!is_callable($fulfilled)) {
            throw new \InvalidArgumentException('Argument fulfilled must be callable');
        }

        $this->label     = $label;
        $this->fulfilled = $fulfilled;
        $this->required  = $required;
        $this->help      = $help;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function isFulfilled()
    {
        return call_user_func($this->fulfilled);
    }

    public function isRequired()
    {
        return $this->required;
    }

    public function getHelp()
    {
        return $this->help;
    }
}
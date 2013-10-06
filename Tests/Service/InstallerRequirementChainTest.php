<?php
/**
 * @Author: Michał Kurzeja, Accesto
 * User: michal
 * Date: 05.10.13
 * Time: 19:52
 */

namespace Accesto\InstallerBundle\Tests\Service;


use Accesto\InstallerBundle\Service\InstallerRequirementChain;

class InstallerRequirementChainTest extends \PHPUnit_Framework_TestCase
{


    public function testAddRequirement()
    {
        $actionMock = $this->getMockBuilder('Accesto\InstallerBundle\Install\RequirementCollection')->disableOriginalConstructor()->getMock();

        $chain = new InstallerRequirementChain();

        $this->assertEquals('Accesto\InstallerBundle\Service\InstallerRequirementChain', get_class($chain->addRequirement($actionMock)));
    }

    public function testGet()
    {
        $requirementMockOne = $this->getMock('Accesto\InstallerBundle\Install\RequirementCollection', array('getPriority'), array('test1', 1));
        $requirementMockOne->expects($this->atLeastOnce())->method('getPriority')->will($this->returnValue(1));


        $requirementMockTwo = $this->getMock('Accesto\InstallerBundle\Install\RequirementCollection', array('getPriority'), array('test2', 2));
        $requirementMockTwo->expects($this->atLeastOnce())->method('getPriority')->will($this->returnValue(1));

        $chain = new InstallerRequirementChain();

        $chain->addRequirement($requirementMockOne);
        $chain->addRequirement($requirementMockTwo);

        $requirements = $chain->getIterator();

        $this->assertEquals($requirements[0], $requirementMockTwo);
        $this->assertEquals($requirements[1], $requirementMockOne);

    }
}
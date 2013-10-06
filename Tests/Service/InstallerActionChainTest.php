<?php
/**
 * @Author: Michał Kurzeja, Accesto
 * User: michal
 * Date: 05.10.13
 * Time: 19:52
 */

namespace Accesto\InstallerBundle\Tests\Service;


use Accesto\InstallerBundle\Service\InstallerActionChain;

class InstallerActionChainTest extends \PHPUnit_Framework_TestCase
{


    public function testAddAction()
    {
        $actionMock = $this->getMockBuilder('Accesto\InstallerBundle\Install\ActionCollection')->disableOriginalConstructor()->getMock();

        $chain = new InstallerActionChain();

        $this->assertEquals('Accesto\InstallerBundle\Service\InstallerActionChain', get_class($chain->addAction($actionMock)));
    }

    public function testGet()
    {
        $actionMockOne = $this->getMock('Accesto\InstallerBundle\Install\ActionCollection', array('getPriority'), array('test1', 1));
        $actionMockOne->expects($this->atLeastOnce())->method('getPriority')->will($this->returnValue(1));


        $actionMockTwo = $this->getMock('Accesto\InstallerBundle\Install\ActionCollection', array('getPriority'), array('test2', 2));
        $actionMockTwo->expects($this->atLeastOnce())->method('getPriority')->will($this->returnValue(1));

        $chain = new InstallerActionChain();

        $chain->addAction($actionMockOne);
        $chain->addAction($actionMockTwo);

        $actions = $chain->getIterator();

        $this->assertEquals($actions[0], $actionMockTwo);
        $this->assertEquals($actions[1], $actionMockOne);

    }
}
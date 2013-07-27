<?php
namespace Moriony\Silex\Provider;

use Moriony\ServiceManager;
use Moriony\ServiceProviderInterface;

class ServiceManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ServiceManager
     */
    protected $manager;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $serviceMock;

    public function setUp()
    {
        $this->manager = new ServiceManager;
        $this->serviceMock = $this->getMock('Moriony\ServiceProviderInterface', array('register', 'boot'));
    }

    public function testSuccessfulRegistration()
    {
        $this->serviceMock
             ->expects($this->once())
             ->method('register');

        $this->manager->register($this->serviceMock);
    }

    /**
     * @expectedException \PHPUnit_Framework_Error
     */
    public function testInvalidProviderRegistration()
    {
        $this->manager->register(new ServiceManager);
    }

    public function testSuccessfulBoot()
    {
        $this->serviceMock
             ->expects($this->once())
             ->method('boot');

        $this->manager->register($this->serviceMock);
        $this->manager->boot();
        $this->manager->boot();
    }

    public function testInvalidBoot()
    {
        $this->serviceMock
            ->expects($this->never())
            ->method('boot');

        $this->manager->boot();
    }

    public function testOptionsSet()
    {
        $this->manager->register($this->serviceMock, array('test' => 'value'));
        $this->assertEquals('value', $this->manager['test']);
    }
}
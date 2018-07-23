<?php

namespace Zend\ErrorIndexTests;

use PHPUnit\Framework\TestCase;
use Zend\ErrorIndex\Writer\ErrorIndexWriterInterface;
use Zend\ErrorIndex\Interceptor\ErrorEventListener;
use Zend\Mvc\Di\Dependency\Injection\InjectableFactory;
use Zend\ServiceManager\ServiceManager;

/**
 * ErrorEventListenerTest
 *
 * @package Zend\ErrorIndexTests
 */
class ErrorEventListenerTest extends TestCase
{
    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \ReflectionException
     * @throws \Zend\Mvc\Di\Exceptions\UnsolvableDependencyException
     */
    public function testResolving()
    {
        $serviceManager = new ServiceManager([
            'invokables' => [
                ErrorIndexWriterInterface::class => FakeWriter::class
            ]
        ]);

        $writer = $serviceManager->get(ErrorIndexWriterInterface::class);

        $factory = new InjectableFactory();
        $listener = $factory->__invoke($serviceManager, ErrorEventListener::class);

        $this->assertTrue($listener instanceof ErrorEventListener);
    }
}
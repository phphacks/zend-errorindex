<?php

namespace Zend\ErrorIndex\Factory;

use Interop\Container\ContainerInterface;
use Zend\Mvc\Di\Dependency\Injection\InjectableFactory;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceManager;

class ErrorEventListenerFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return mixed|object
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \ReflectionException
     * @throws \Zend\Mvc\Di\Exceptions\UnsolvableDependencyException
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $factory = new InjectableFactory();
        return $factory->__invoke(new ServiceManager([]), $requestedName);
    }
}
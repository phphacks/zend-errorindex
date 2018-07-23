<?php

namespace Zend\ErrorIndex\Factory;

use Interop\Container\ContainerInterface;
use Zend\ErrorIndex\Adapter\ThrowableAdapter;
use Zend\ErrorIndex\Interceptor\ErrorEventHandler;
use Zend\ErrorIndex\Interceptor\ErrorEventListener;
use Zend\ErrorIndex\Writer\ErrorIndexWriterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ErrorEventListenerFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $writer = $container->get(ErrorIndexWriterInterface::class);
        $adapter = new ThrowableAdapter();
        $handler = new ErrorEventHandler($writer, $adapter);
        $listener = new ErrorEventListener($handler);

        return $listener;
    }
}
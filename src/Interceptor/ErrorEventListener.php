<?php

namespace Zend\ErrorIndex\Interceptor;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

/**
 * ErrorInterceptor
 *
 * @package Zend\ErrorIndex\Interceptor
 */
class ErrorEventListener extends AbstractListenerAggregate
{
    /**
     * @var ErrorEventHandler
     */
    private $errorEventHandler;

    /**
     * ErrorListener constructor.
     *
     * @param ErrorEventHandler $errorEventHandler
     */
    public function __construct(ErrorEventHandler $errorEventHandler)
    {
        $this->errorEventHandler = $errorEventHandler;
    }

    /**
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(MvcEvent::EVENT_RENDER_ERROR,   [$this->errorEventHandler, 'handleEvent']);
        $this->listeners[] = $events->attach(MvcEvent::EVENT_DISPATCH_ERROR, [$this->errorEventHandler, 'handleEvent'], 100);
    }
}
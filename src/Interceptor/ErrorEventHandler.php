<?php

namespace Zend\ErrorIndex\Interceptor;

use Zend\ErrorIndex\Adapter\ThrowableAdapter;
use Zend\ErrorIndex\ErrorIndexWriterInterface;
use Zend\Mvc\MvcEvent;

/**
 * ErrorEventHandler
 *
 * @package Zend\ErrorIndex\Interceptor
 */
class ErrorEventHandler
{
    /**
     * @var ErrorIndexWriterInterface
     */
    private $writer;

    /**
     * @var ThrowableAdapter
     */
    private $adapter;

    /**
     * ErrorEventHandler constructor.
     *
     * @param ErrorIndexWriterInterface $writer
     * @param ThrowableAdapter $adapter
     */
    public function __construct(ErrorIndexWriterInterface $writer, ThrowableAdapter $adapter)
    {
        $this->writer = $writer;
        $this->adapter = $adapter;
    }

    /**
     * @param MvcEvent $event
     */
    public function handle(MvcEvent $event)
    {
        $exception = null;

        if($event->isError()) {
            $exception = $event->getParam('exception');
        }

        $throwable = $this->adapter->adapt($exception);
        $this->writer->write($throwable);
    }
}
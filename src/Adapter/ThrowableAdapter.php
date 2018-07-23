<?php

namespace Zend\ErrorIndex\Adapter;

use Zend\ErrorIndex\Indexable;

/**
 * ThrowableAdapter
 *
 * @package Zend\ErrorIndex\Adapter
 */
class ThrowableAdapter
{
    /**
     * @param \Throwable $throwable
     * @return string
     */
    public function getCode(\Throwable $throwable)
    {
        return md5($throwable->getTraceAsString());
    }

    /**
     * @param \Throwable $throwable
     * @return Indexable
     */
    public function adapt(\Throwable $throwable)
    {
        $indexable = new Indexable();
        $indexable->setCode($this->getCode($throwable));
        $indexable->setMessage($throwable->getMessage());
        $indexable->setTrace($throwable->getTraceAsString());
        $indexable->setInternalCode($throwable->getCode());

        return $indexable;
    }
}
<?php

namespace Zend\ErrorIndexTests;

use Zend\ErrorIndex\Writer\ErrorIndexWriterInterface;
use Zend\ErrorIndex\Model\Indexable;

class FakeWriter implements ErrorIndexWriterInterface
{
    public function write(Indexable $indexable)
    {
        return true;
    }
}
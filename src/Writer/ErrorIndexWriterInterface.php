<?php

namespace Zend\ErrorIndex\Writer;

use Zend\ErrorIndex\Model\Indexable;

interface ErrorIndexWriterInterface
{
    public function write(Indexable $indexable);
}
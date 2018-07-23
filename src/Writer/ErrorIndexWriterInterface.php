<?php

namespace Zend\ErrorIndex;

interface ErrorIndexWriterInterface
{
    public function write(Indexable $indexable);
}
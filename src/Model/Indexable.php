<?php

namespace Zend\ErrorIndex;

class Indexable
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $internalCode;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $trace;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getInternalCode(): string
    {
        return $this->internalCode;
    }

    /**
     * @param string $internalCode
     */
    public function setInternalCode(string $internalCode)
    {
        $this->internalCode = $internalCode;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getTrace(): string
    {
        return $this->trace;
    }

    /**
     * @param string $trace
     */
    public function setTrace(string $trace)
    {
        $this->trace = $trace;
    }
}
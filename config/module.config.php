<?php

use Zend\ErrorIndex\Interceptor\ErrorEventListener;
use Zend\ErrorIndex\Factory\ErrorEventListenerFactory;

return [
    'listeners' => [
        ErrorEventListener::class
    ],
    'service_manager' => [
        'factories' => [
            ErrorEventListener::class => ErrorEventListenerFactory::class
        ]
    ]
];
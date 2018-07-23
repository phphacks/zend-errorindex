<?php

use Zend\ErrorIndex\Interceptor\ErrorEventListener;
use Zend\Mvc\Di\Dependency\Injection\InjectableFactory;

return [
    'listeners' => [
        ErrorEventListener::class
    ],
    'service_manager' => [
        'factories' => [
            ErrorEventListener::class => InjectableFactory::class
        ]
    ]
];
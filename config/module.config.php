<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [

        'factories' => [
            AuthenticationService::class => InvokableFactory::class
        ]
    ],

    Module::class => [

    ],
];

<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Authentication;

use MSBios\Authentication\Factory\AuthenticationServiceFactory;
use MSBios\Factory\ModuleFactory;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\Storage\Session;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [

        'factories' => [

            Module::class =>
                ModuleFactory::class,

            //Services
            AuthenticationService::class =>
                Factory\AuthenticationServiceFactory::class,
            // \Zend\Authentication\AuthenticationService::class =>
            //     Factory\AuthenticationServiceFactory::class,

            // Adapters
            CallbackCheckAdapter::class =>
                Factory\CallbackCheckAdapterFactory::class,

            // Storages
            Session::class =>
                InvokableFactory::class
        ],
        'aliases' => [
            \Zend\Authentication\AuthenticationService::class =>
                AuthenticationService::class,
        ]
    ],

    Module::class => [

        'default_authentication_storage' =>
            Session::class,

        'default_authentication_adapter' =>
            CallbackCheckAdapter::class,

        CallbackCheckAdapter::class => [

            /**
             *
             */
            'adapter' => Adapter::class,

            /**
             *
             */
            'table_name' => 'acl_t_users',

            /**
             *
             */
            'identity_column' => 'username',

            /**
             *
             */
            'credential_column' => 'password',

            /**
             *
             */
            'credential_validation_callback' => null
        ]
    ]
];

<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Authentication;

use MSBios\Authentication\Adapter\CallbackCheckAdapter;
use MSBios\Authentication\Storage\Session;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [

        'factories' => [

            Module::class =>
                Factory\ModuleFactory::class,

            //Services
            \Zend\Authentication\AuthenticationService::class =>
                Factory\AuthenticationServiceFactory::class,

            // Adapters
            Adapter\CallbackCheckAdapter::class =>
                Factory\CallbackCheckAdapterFactory::class,

            // Storages
            Storage\Session::class =>
                InvokableFactory::class
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

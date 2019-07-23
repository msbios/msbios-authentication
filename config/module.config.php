<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Authentication;

use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\Storage\Session;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [

        'factories' => [
            //Services
            AuthenticationService::class =>
                Factory\AuthenticationServiceFactory::class,
            \Zend\Authentication\AuthenticationService::class =>
                Factory\AuthenticationServiceFactory::class,

            // Adapters
            CallbackCheckAdapter::class =>
                Factory\CallbackCheckAdapterFactory::class,

            // Storages
            Session::class =>
                InvokableFactory::class,

            // Listeners
            ListenerAggregate::class =>
                Factory\ListenerAggregateFactory::class
        ]
    ],

    'listeners' => [
        ListenerAggregate::class
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

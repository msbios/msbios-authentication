<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Authentication;

use MSBios\Authentication\Adapter\ResourceAdapter;
use MSBios\Authentication\Storage\ResourceStorage;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'service_manager' => [

        'factories' => [

            //Services
            \Zend\Authentication\AuthenticationService::class =>
                InvokableFactory::class,
            AuthenticationService::class =>
                Factory\AuthenticationServiceFactory::class,

            // Adapters
            Adapter\ResourceAdapter::class =>
                Factory\ResourceAdapterFactory::class,

            // Storages
            Storage\ResourceStorage::class =>
                InvokableFactory::class
        ]
    ],

    Module::class => [

        'default_authentication_storage' =>
            ResourceStorage::class,

        'default_authentication_adapter' =>
            ResourceAdapter::class,

        ResourceAdapter::class => [

            'table_name' => 'acl_t_users',

            'identity_column' => 'username',

            'credential_column' => 'password'
        ]
    ]
];

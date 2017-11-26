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

            Module::class =>
                Factory\ModuleFactory::class,

            //Services
            \Zend\Authentication\AuthenticationService::class =>
                Factory\AuthenticationServiceFactory::class,

            // Adapters
            Adapter\ResourceAdapter::class =>
                Factory\ResourceAdapterFactory::class,

            // Storages
            Storage\ResourceStorage::class =>
                InvokableFactory::class
        ],
        'aliases' => [

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

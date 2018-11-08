<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Authentication\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Authentication\Module;
use Zend\Authentication\Adapter\AdapterInterface as AuthenticationAdapter;
use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\Adapter\ValidatableAdapterInterface;
use Zend\Crypt\Password\Bcrypt;
use Zend\Db\Adapter\AdapterInterface as DbAdapter;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Stdlib\ArrayUtils;

/**
 *
 * Class ResourceAdapterFactory
 * @package MSBios\Authentication\Factory
 */
class CallbackCheckAdapterFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|ValidatableAdapterInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var array $defaultOptions */
        $defaultOptions = $container->get(Module::class)[CallbackCheckAdapter::class];

        /** @var array $options */
        $options = is_null($options)
            ? $defaultOptions : ArrayUtils::merge($defaultOptions, $options);

        /** @var DbAdapter $zendDb */
        $zendDb = $container->get($options['adapter']);

        /** @var AuthenticationAdapter|CallbackCheckAdapter $adapter */
        $adapter = new CallbackCheckAdapter($zendDb);

        if (! empty($options['table_name'])) {
            $adapter->setTableName($options['table_name']);
        }

        if (! empty($options['identity_column'])) {
            $adapter->setIdentityColumn($options['identity_column']);
        }

        if (! empty($options['credential_column'])) {
            $adapter->setCredentialColumn($options['credential_column']);
        }

        if (! empty($options['credential_validation_callback'])) {
            $adapter->setCredentialValidationCallback($options['credential_validation_callback']);
        } else {
            $adapter->setCredentialValidationCallback(function ($hash, $password) {
                return (new Bcrypt)->verify($password, $hash);
            });
        }

        return $adapter;
    }
}

<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Authentication\Module;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class AuthenticationServiceFactory
 * @package MSBios\Authentication\Factory
 */
class AuthenticationServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AuthenticationService|AuthenticationServiceInterface
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AuthenticationServiceInterface $authenticationService */
        $authenticationService = new AuthenticationService;

        /** @var array $options */
        $options = $container->get(Module::class);

        if ($container->has($options['default_authentication_storage'])) {
            $authenticationService->setStorage(
                $container->get($options['default_authentication_storage'])
            );
        }

        if ($container->has($options['default_authentication_adapter'])) {
            $authenticationService->setAdapter(
                $container->get($options['default_authentication_adapter'])
            );
        }

        return $authenticationService;
    }
}

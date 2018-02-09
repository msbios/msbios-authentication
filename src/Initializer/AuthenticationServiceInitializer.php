<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Authentication\Initializer;

use Interop\Container\ContainerInterface;
use MSBios\Authentication\AuthenticationServiceAwareInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class AuthenticationServiceInitializer
 * @package MSBios\Authentication\Initializer
 */
class AuthenticationServiceInitializer implements InitializerInterface
{
    /**
     * Initialize the given instance
     *
     * @param  ContainerInterface $container
     * @param  object $instance
     * @return void
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof AuthenticationServiceAwareInterface) {
            $instance->setAuthenticationService(
                $container->get(AuthenticationService::class)
            );
        }
    }

    /**
     * @param $an_array
     * @return AuthenticationServiceInitializer
     */
    public static function __set_state($an_array)
    {
        return new self();
    }
}

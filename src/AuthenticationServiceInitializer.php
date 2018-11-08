<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class AuthenticationServiceInitializer
 * @package MSBios\Authentication
 */
class AuthenticationServiceInitializer implements InitializerInterface
{
    /**
     * @param ContainerInterface $container
     * @param object $instance
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

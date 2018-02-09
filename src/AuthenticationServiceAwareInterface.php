<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

use Zend\Authentication\AuthenticationServiceInterface;

/**
 * Interface AuthenticationServiceAwareInterface
 * @package MSBios\Authentication
 */
interface AuthenticationServiceAwareInterface
{
    /**
     * @return AuthenticationServiceInterface
     */
    public function getAuthenticationService();

    /**
     * @param AuthenticationServiceInterface $authenticationService
     * @return $this
     */
    public function setAuthenticationService(AuthenticationServiceInterface $authenticationService);
}

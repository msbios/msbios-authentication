<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

use Zend\Authentication\AuthenticationServiceInterface;

/**
 * Trait AuthenticationServiceAwareTrait
 * @package MSBios\Authentication
 */
trait AuthenticationServiceAwareTrait
{
    /** @var AuthenticationServiceInterface */
    protected $authenticationService;

    /**
     * @return AuthenticationServiceInterface
     */
    public function getAuthenticationService()
    {
        return $this->authenticationService;
    }

    /**
     * @param AuthenticationServiceInterface $authenticationService
     * @return $this
     */
    public function setAuthenticationService(AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
        return $this;
    }
}

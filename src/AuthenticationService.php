<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

use Zend\Authentication\AuthenticationService as DefaultAuthenticationService;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;

/**
 * Class AuthenticationService
 * @package MSBios\Authentication
 */
class AuthenticationService extends DefaultAuthenticationService implements EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    /** @const EVENT_CLEAR_IDENTITY  */
    const EVENT_CLEAR_IDENTITY = 'EVENT_CLEAR_IDENTITY';

    /**
     * @inheritdoc
     */
    public function clearIdentity()
    {
        parent::clearIdentity();
        $this->getEventManager()
            ->trigger(self::EVENT_CLEAR_IDENTITY, $this);
    }
}

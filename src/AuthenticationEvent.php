<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

use Zend\EventManager\Event;

/**
 * Class AuthenticationEvent
 * @package MSBios\Authentication
 */
class AuthenticationEvent extends Event
{
    /** @const EVENT_AUTHENTICATION */
    const EVENT_AUTHENTICATION = 'EVENT_AUTHENTICATION';

    /** @const EVENT_AUTHENTICATION_POST */
    const EVENT_AUTHENTICATION_POST = 'EVENT_AUTHENTICATION_POST';

    /** @const EVENT_AUTHORIZATION */
    const EVENT_AUTHORIZATION = 'EVENT_AUTHORIZATION';

    /** @const EVENT_AUTHORIZATION_POST */
    const EVENT_AUTHORIZATION_POST = 'EVENT_AUTHORIZATION_POST';
}

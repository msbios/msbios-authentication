<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Http\Request as HttpRequest;
use Zend\Mvc\MvcEvent;

/**
 * Class ListenerAggregate
 * @package MSBios\Authentication
 */
class ListenerAggregate extends AbstractListenerAggregate implements AuthenticationServiceAwareInterface
{
    use AuthenticationServiceAwareTrait;

    /** @var EventInterface */
    protected $authenticationEvent;

    /**
     * ListenerAggregate constructor.
     *
     * @param AuthenticationService $authenticationService
     * @param EventInterface $authenticationEvent
     */
    public function __construct(AuthenticationService $authenticationService, EventInterface $authenticationEvent)
    {
        $this->setAuthenticationService($authenticationService);
        $this->authenticationEvent = $authenticationEvent;
        $this->authenticationEvent->setTarget($this);
    }

    /**
     * @inheritdoc
     *
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_ROUTE, [$this, 'authentication'], -50);
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_ROUTE, [$this, 'authenticationPost'], -51);
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_ROUTE, [$this, 'authorization'], -600);
        $this->listeners[] = $events
            ->attach(MvcEvent::EVENT_ROUTE, [$this, 'authorizationPost'], -601);
    }

    /**
     * @param EventInterface|MvcEvent $e
     */
    public function authentication(EventInterface $e)
    {
        /** @var HttpRequest $request */
        $request = $e
            ->getRequest();

        if (! $request instanceof HttpRequest || $request->isOptions()) {
            return;
        }

        $this->authenticationEvent
            ->setName(AuthenticationEvent::EVENT_AUTHENTICATION);
    }

    /**
     * @param EventInterface $e
     */
    public function authenticationPost(EventInterface $e)
    {
        /** @var HttpRequest $request */
        $request = $e
            ->getRequest();

        if (! $request instanceof HttpRequest || $request->isOptions()) {
            return;
        }

        $this->authenticationEvent
            ->setName(AuthenticationEvent::EVENT_AUTHENTICATION_POST);
    }

    /**
     * @param EventInterface $e
     */
    public function authorization(EventInterface $e)
    {
        /** @var HttpRequest $request */
        $request = $e
            ->getRequest();

        if (! $request instanceof HttpRequest || $request->isOptions()) {
            return;
        }

        $this->authenticationEvent
            ->setName(AuthenticationEvent::EVENT_AUTHORIZATION);
    }

    /**
     * @param EventInterface $e
     */
    public function authorizationPost(EventInterface $e)
    {
        /** @var HttpRequest $request */
        $request = $e
            ->getRequest();

        if (! $request instanceof HttpRequest || $request->isOptions()) {
            return;
        }

        $this->authenticationEvent
            ->setName(AuthenticationEvent::EVENT_AUTHORIZATION_POST);
    }
}

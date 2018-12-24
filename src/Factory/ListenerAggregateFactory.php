<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Authentication\AuthenticationEvent;
use MSBios\Authentication\AuthenticationService;
use MSBios\Authentication\ListenerAggregate;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ListenerAggregateFactory
 * @package MSBios\Authentication\Factory
 */
class ListenerAggregateFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ListenerAggregate|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ListenerAggregate(
            $container->get(AuthenticationService::class),
            new AuthenticationEvent
        );
    }
}

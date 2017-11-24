<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Authentication\Adapter\ResourceAdapter;
use MSBios\Authentication\Module;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ResourceAdapterFactory
 * @package MSBios\Authentication\Factory
 */
class ResourceAdapterFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return ResourceAdapter
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var AdapterInterface $adapter */
        $adapter = $container->get(Adapter::class);

        /** @var array $options */
        $options = $container->get(Module::class)[ResourceAdapter::class];

        return new ResourceAdapter(
            $adapter,
            $options['table_name'],
            $options['identity_column'],
            $options['credential_column']
        );
    }
}

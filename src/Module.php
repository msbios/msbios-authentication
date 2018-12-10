<?php
/**
 * @access protected
 */

namespace MSBios\Authentication;

use MSBios\ModuleInterface;
use Zend\EventManager\EventInterface;
use Zend\Http\Request as HttpRequest;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;

/**
 * Class Module
 * @package MSBios\Authentication
 */
class Module implements ModuleInterface, BootstrapListenerInterface
{
    /** @const VERSION */
    const VERSION = '1.0.16';

    /**
     * @inheritdoc
     *
     * @return array|mixed|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * @inheritdoc
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            AutoloaderFactory::STANDARD_AUTOLOADER => [
                StandardAutoloader::LOAD_NS => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     *
     * @param EventInterface $e
     * @return array|void
     */
    public function onBootstrap(EventInterface $e)
    {
        if (! $e->getRequest() instanceof HttpRequest) {
            return;
        }
    }
}

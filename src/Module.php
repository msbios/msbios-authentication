<?php
/**
 * @access protected
 */

namespace MSBios\Authentication;

use MSBios\ModuleInterface;
use Zend\Crypt\Password\Bcrypt;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;

/**
 * Class Module
 * @package MSBios\Authentication
 */
class Module implements ModuleInterface
{
    /** @const VERSION */
    const VERSION = '0.0.1';

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
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
     * @param IdentityInterface $identity
     * @param $inputPassword
     * @return bool
     */
    public static function verifyCredential(IdentityInterface $identity, $inputPassword)
    {
        return (new Bcrypt)->verify($inputPassword, $identity->getPassword());
    }
}

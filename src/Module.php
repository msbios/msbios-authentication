<?php
/**
 * @access protected
 */

namespace MSBios\Authentication;

/**
 * Class Module
 * @package MSBios\Authentication
 */
class Module extends \MSBios\Module
{
    /** @const VERSION */
    const VERSION = '1.0.18';

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getDir()
    {
        return __DIR__;
    }

    /**
     * @inheritdoc
     *
     * @return string
     */
    protected function getNamespace()
    {
        return __NAMESPACE__;
    }
}

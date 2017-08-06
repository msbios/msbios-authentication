<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication;

/**
 * Interface IdentityInterface
 * @package MSBios\Authentication
 */
interface IdentityInterface
{
    /**
     * @return mixed
     */
    public function getPassword();
}

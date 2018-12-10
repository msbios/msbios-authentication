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
     * @deprecated because guest does not have password
     */
    public function getPassword();
}

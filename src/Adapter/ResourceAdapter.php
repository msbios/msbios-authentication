<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Authentication\Adapter;

use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Crypt\Password\Bcrypt;
use Zend\Db\Adapter\Adapter as DbAdapter;

/**
 * Class ResourceAdapter
 * @package MSBios\Authentication\Adapter
 */
class ResourceAdapter extends CallbackCheckAdapter
{
    /**
     * ResourceAdapter constructor.
     * @param DbAdapter $zendDb
     * @param null $tableName
     * @param null $identityColumn
     * @param null $credentialColumn
     * @param null $credentialValidationCallback
     */
    public function __construct(
        DbAdapter $zendDb,
        $tableName = null,
        $identityColumn = null,
        $credentialColumn = null,
        $credentialValidationCallback = null
    ) {
        parent::__construct($zendDb, $tableName, $identityColumn, $credentialColumn, function ($hash, $password) {
            return (new Bcrypt())->verify($password, $hash);
        });
    }
}

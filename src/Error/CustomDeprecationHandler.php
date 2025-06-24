<?php
namespace App\Error;

use Cake\Error\PhpDeprecationHandler;

class CustomDeprecationHandler extends PhpDeprecationHandler
{
    public static function handleError($errno, $errstr, $errfile, $errline, $errcontext = [])
    {
        if (stripos($errfile, 'ORM/Table.php') !== false) {
            return true;
        }
        return parent::handleError($errno, $errstr, $errfile, $errline, $errcontext);
    }
}
?>
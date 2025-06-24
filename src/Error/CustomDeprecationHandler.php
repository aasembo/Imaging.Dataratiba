<?php 
namespace App\Error;

use Cake\Error\Debugger;
use Cake\Error\PhpDeprecationHandler;

class CustomDeprecationHandler extends PhpDeprecationHandler
{
    public static function handleError(int $errno, string $errstr, string $errfile, int $errline, array $errcontext = []): bool
    {
        if (strpos($errfile, 'vendor/cakephp/cakephp/src/ORM/Table.php') !== false) {
            return true; // suppress this specific file
        }

        // fallback to default behavior
        return parent::handleError($errno, $errstr, $errfile, $errline, $errcontext);
    }
}

?>
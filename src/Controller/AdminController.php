<?php
namespace App\Controller;
use Cake\Http\Exception\ForbiddenException;
use Cake\Cache\Cache;



class AdminController extends AppController {

public function clearCache()
{
    // Optional: Protect this action (important for production!)

    // Clear all cache configs
    Cache::clearAll();

    $this->Flash->success('Application cache has been cleared.');
    return $this->redirect($this->referer('/'));
}
}

?>
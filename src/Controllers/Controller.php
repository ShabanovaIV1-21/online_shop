<?php
namespace Src\Controllers;

use Src\Models\Users\UsersAuthService;
use Src\Views\View;
use Src\Services\Db;

class Controller
{
    protected $view;
    protected $user;
    // protected $db;
    protected $layout = 'default';

    public function __construct() 
    {
        // $this->db = new Db();
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View($this->layout);
        $this->view->setVar('user', $this->user);

    }
}

?>
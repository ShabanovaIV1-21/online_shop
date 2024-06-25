<?php
namespace Src\Controllers\Admin;

use Src\Exceptions\InvalidArgumentException;
use Src\Exceptions\NotFoundException;
use Src\Views\View;
use Src\Controllers\Controller;
use Src\Exceptions\UnauthorizedException;
use Src\Exceptions\ForbiddenException;
use Src\Models\Articles\Article;
use Src\Models\Users\User;
use Src\Models\Users\UsersAuthService;

class MainAdminController extends Controller 
{
    public function __construct()
    {
        $this->layout = 'admin';

        parent::__construct();
    }
    public function index()
    {
        if  ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin') {
            throw new ForbiddenException();
        } 
        $this->view->renderHtml('admin/main/index.php');
        // var_dump($this->user);
    }
}
?>
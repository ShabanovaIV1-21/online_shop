<?php
namespace Src\Controllers;

use Src\Exceptions\InvalidArgumentException;
use Src\Controllers\Controller;
use Src\Models\Users\User;
use Src\Models\Users\UsersAuthService;

class UsersController extends Controller
{
    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                // var_dump($e->getMessage());
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
            if ($user instanceof User) {
                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
            
        }
        $this->view->renderHtml('users/signUp.php');
    }

    public function all()
    {
        $users = User::findAll(); //$this->db->query("SELECT * FROM articles", [], Article::class);
        // var_dump($articles);
        $this->view->renderHtml('Users/all.php', ['users' => $users]);
    }

    public function view(int $userId)
    {
        $user = User::getById($userId);

        // $result  = $this->db->query(
        //     "SELECT * FROM articles WHERE id = :id", 
        //     [":id" => $articleId], Article::class
        // );
        if ($user === null) {
            $this->view->renderHtml('Errors/404.php', [], 404);
            return;
        }
        // $articleAuthor = User::getById($article->getAuthorId());
        // var_dump($article->getAuthorId());

        $this->view->renderHtml('Users/view.php', ['user' => $user]);
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /online_shop/');
                exit;
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
            
        }
        $this->view->renderHtml('users/login.php');
    }

    public function logout()
    {
        if ($_COOKIE['token']) {
            // $user = UsersAuthService::getUserByToken();
            
            // $user->setAuthToken('');
            // unset($_COOKIE['token']);
            setcookie('token', '', -1, '/', '', false, true); 
            // var_dump($user);
            
            header('Location: /online_shop/');
            exit();
            // $user->save();

        }
        // if (!empty($_POST)) {
        //     try {
        //         $user = User::login($_POST);
        //         UsersAuthService::createToken($user);
        //         header('Location: /online_shop/articles/all');
        //         exit;
        //     } catch (InvalidArgumentException $e) {
        //         $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
        //         return;
        //     }
            
        // }
        // $this->view->renderHtml('users/login.php');
    }
}

?>
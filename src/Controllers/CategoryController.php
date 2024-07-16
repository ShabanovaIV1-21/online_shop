<?php
namespace Src\Controllers;

use Src\Exceptions\InvalidArgumentException;
use Src\Controllers\Controller;
use Src\Models\Category;
use Src\Exceptions\NotFoundException;
use Src\Models\Product;
// use Src\Models\Users\UsersAuthService;

class CategoryController extends Controller
{
    

    // public function signUp()
    // {
    //     if (!empty($_POST)) {
    //         try {
    //             $user = User::signUp($_POST);
    //         } catch (InvalidArgumentException $e) {
    //             // var_dump($e->getMessage());
    //             $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
    //             return;
    //         }
    //         if ($user instanceof User) {
    //             $this->view->renderHtml('users/signUpSuccessful.php');
    //             return;
    //         }
            
    //     }
    //     $this->view->renderHtml('users/signUp.php');
    // }

    // public function all()
    // {
    //     $users = User::findAll(); //$this->db->query("SELECT * FROM articles", [], Article::class);
    //     // var_dump($articles);
    //     $this->view->renderHtml('Users/all.php', ['users' => $users]);
    // }

    public function view($id)
    {
        $category = Category::getById($id);
        if ($category === null) {
            throw new NotFoundException();
        }
        $products = $category->getProducts($id);
        // var_dump($products);
        $subcategories = null;
        if ($products === null) {
            $subcategories = $category->getSubcategories();
            $products = $subcategories[0]->getProducts($subcategories[0]->getId());
        }
        
        // $result  = $this->db->query(
        //     "SELECT * FROM articles WHERE id = :id", 
        //     [":id" => $articleId], Article::class
        // );
        
        // $articleAuthor = User::getById($article->getAuthorId());
        // var_dump($article->getAuthorId());

        $this->view->renderHtml('Product/product_all.php', ['category' => $category, 'products' => $products, 'subcategories' => $subcategories]);
    }

    public function all()
    {
        // echo 'главная страница';
        $categories = Category::findAll();        
        $this->view->renderHtml('Product/categories.php', ['categories' => $categories]);
    }

    public function search()
    {
        if (!empty($_GET))  {
            if (empty($_GET['q'])) {
                $this->view->renderHtml('product/search.php');
                return;
            }
            $searchProducts = Product::search($_GET['q']);
            $this->view->renderHtml('product/search.php', ['searchProducts' => $searchProducts, 'q' => $_GET['q']]);
        }
    }

    // public function login()
    // {
    //     if (!empty($_POST)) {
    //         try {
    //             $user = User::login($_POST);
    //             UsersAuthService::createToken($user);
    //             header('Location: /online_shop/articles/all');
    //             exit;
    //         } catch (InvalidArgumentException $e) {
    //             $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
    //             return;
    //         }
            
    //     }
    //     $this->view->renderHtml('users/login.php');
    // }

    // public function logout()
    // {
    //     if ($_COOKIE['token']) {
    //         // $user = UsersAuthService::getUserByToken();
            
    //         // $user->setAuthToken('');
    //         // unset($_COOKIE['token']);
    //         setcookie('token', '', -1, '/', '', false, true); 
    //         // var_dump($user);
            
    //         header('Location: /online_shop/articles/all');
    //         exit();
    //         // $user->save();

    //     }
    //     // if (!empty($_POST)) {
    //     //     try {
    //     //         $user = User::login($_POST);
    //     //         UsersAuthService::createToken($user);
    //     //         header('Location: /online_shop/articles/all');
    //     //         exit;
    //     //     } catch (InvalidArgumentException $e) {
    //     //         $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
    //     //         return;
    //     //     }
            
    //     // }
    //     // $this->view->renderHtml('users/login.php');
    // }
}

?>
<?php
namespace Src\Controllers\Admin;

use Src\Exceptions\InvalidArgumentException;
use Src\Controllers\Controller;
use Src\Models\Category;
use Src\Exceptions\NotFoundException;
use Src\Models\Product;
use Src\Models\Order;
use Src\Models\OrderProduct;

// use Src\Models\Users\UsersAuthService;

class OrderAdminController extends Controller
{
    
    public function __construct()
    {
        $this->layout = 'admin';

        parent::__construct();
    }
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

    public function all()
    {
        $orders = Order::findAll();
        // $users = User::findAll(); //$this->db->query("SELECT * FROM articles", [], Article::class);
        // var_dump($articles);
        $this->view->renderHtml('Admin/Order/all.php', ['orders' => $orders]);
    }

    // public function add()
    // {
    //     // var_dump($_FILES);
    //     $categories = Category::findAll();

    //     if (!empty($_POST)) {
    //         try {
    //             $product = Product::createProduct($_POST, $_FILES);
    //     // var_dump($category);

    //         } catch (InvalidArgumentException $e) {
    //             $this->view->renderHtml('admin/product/add.php', ['error' => $e->getMessage(), 'categories' => $categories]);
    //             return;
    //         }
    //         header('Location: /project.loc/admin/product/all');
    //         exit();
    //     }
        
    //     $this->view->renderHtml('admin/product/add.php', ['categories' => $categories]);
    //     // $author = User::getById(1);
    //     // $article = new Article();
    //     // $article->setAuthor($author);
    //     // $article->setName('Еще одна статья');
    //     // $article->setText('Текст еще одной статьи');
    //     // $article->save();
    //     // var_dump($article);
    // }

    public function edit($orderId)
    {
        $order = Order::getById($orderId);
        // $categories = Category::findAll();

        if ($order === null) {
            // var_dump($article);
            // $this->view->renderHtml('Errors/404.php', [], 404);
            // return;
            throw new NotFoundException();
        }
        // var_dump($_POST);
        if (!empty($_POST)) {
            try {
                // var_dump($order);
                $order->updateStatus($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('admin/order/edit.php', ['error' => $e->getMessage(), 'order' => $order]);
                return;
            }
            header('Location: /project.loc/admin/order/'  . $order->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('admin/order/edit.php', ['order' => $order]);
        // $article->setName('Новое название');
        // $article->setText('Новый текст');
        // $article->save();

    }

    public function view($id)
    {
        $order = Order::getById($id);
        $orderProduct = OrderProduct::getProducts($id);

        if ($order === null) {
            throw new NotFoundException();
        }
        // $category = Category::getById($product->getCategoryId())->getTitle();
        // $products = $category->getProducts($id);
        // var_dump($products);
        // if ($products === null) {
        //     throw new NotFoundException();
        // }
        
        // $result  = $this->db->query(
        //     "SELECT * FROM articles WHERE id = :id", 
        //     [":id" => $articleId], Article::class
        // );
        
        // $articleAuthor = User::getById($article->getAuthorId());
        // var_dump($article->getAuthorId());
        $this->view->renderHtml('admin/order/view.php', ['order' => $order, 'products' => $orderProduct]);

        // $this->view->renderHtml('Product/product_all.php', ['category' => $category, 'products' => $products]);
    }

    public function delete(int $orderId)
    {
        $order = Order::getById($orderId);
        if ($order === null) {
            // var_dump($article);
            // $this->view->renderHtml('Errors/404.php', [], 404);
            // return;
            throw new NotFoundException();
        }
        // echo "Статья '" . $article->getName() . "' удалена успешно";
        $order->delete();
        header('Location: /project.loc/admin/order/all');

    }

    // public function search()
    // {
    //     if (!empty($_GET))  {
    //         if (empty($_GET['q'])) {
    //             $this->view->renderHtml('product/search.php');
    //             return;
    //         }
    //         $searchProducts = Product::search($_GET['q']);
    //         $this->view->renderHtml('product/search.php', ['searchProducts' => $searchProducts, 'q' => $_GET['q']]);
    //     }
    // }

    // public function login()
    // {
    //     if (!empty($_POST)) {
    //         try {
    //             $user = User::login($_POST);
    //             UsersAuthService::createToken($user);
    //             header('Location: /project.loc/articles/all');
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
            
    //         header('Location: /project.loc/articles/all');
    //         exit();
    //         // $user->save();

    //     }
    //     // if (!empty($_POST)) {
    //     //     try {
    //     //         $user = User::login($_POST);
    //     //         UsersAuthService::createToken($user);
    //     //         header('Location: /project.loc/articles/all');
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
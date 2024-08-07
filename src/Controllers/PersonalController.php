<?php
namespace Src\Controllers;
use Src\Controllers\Controller;
use Src\Models\Product;
use Src\Models\Cart;
use Src\Exceptions\InvalidArgumentException;
use Src\Exceptions\NotFoundException;
use Src\Views\View;
use Src\Exceptions\UnauthorizedException;
use Src\Models\Order;
use Src\Models\OrderProduct;
use Src\Models\Users\UsersAuthService;
class PersonalController extends Controller
{
    public function profile()
    {
        // $user = UsersAuthService::getUserByToken();

        // if ($user === null) {
        //     // var_dump($article);
        //     // $this->view->renderHtml('Errors/404.php', [], 404);
        //     // return;
        //     throw new NotFoundException();
        // }
        if  ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $this->user->edit($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('Personal/profile.php', ['error' => $e->getMessage(), 'user' => $this->user]);

                return;
            }
            header('Location: /online_shop/personal', true, 302);
            exit();
        }

        // $this->view->renderHtml('articles/edit.php', ['article' => $article]);
        $this->view->renderHtml('Personal/profile.php', ['user' => $this->user]);
    }

    public function orders()
    {
        $orders = Order::getOrder($this->user->getId());
        // $users = User::findAll(); //$this->db->query("SELECT * FROM articles", [], Article::class);
        // var_dump($articles);
        $this->view->renderHtml('Personal/orders.php', ['orders' => $orders]);
    }

    public function orderView($id)
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
        $this->view->renderHtml('Personal/orderView.php', ['order' => $order, 'products' => $orderProduct]);
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
        header('Location: /online_shop/personal/orders');

    }

//     public function add($id)
//     {
//         $product = Product::getById($id);
//         if (empty($product)) {
//             return false;
//         }
//         $cart = new Cart();
//         $cart->addToCart($product);
//         header('Location:/online_shop/cart');
//     }

//     public function delItem($id)
//     {
//         $product = Product::getById($id);
//         if (empty($product)) {
//             return false;
//         }

//         $cart = new Cart();
//         $cart->addToCart($product, -1);
//         header('Location:/online_shop/cart');
//     }

//     public function delAllItem($id)
//     {
//         $product = Product::getById($id);
//         $cart = new Cart();
//         $cart->addToCart($product, -1 * $_SESSION['cart'][$id]['qty']);
//         unset($_SESSION['cart'][$id]);
//         header('Location:/online_shop/cart');
//     }

//     // public function addItem($id)
//     // {
//     //     $product = Product::getById($id);
//     //     if (empty($product)) {
//     //         return false;
//     //     }

//     //     $cart = new Cart();
//     //     $cart->addToCart($product, 1);
//     //     header('Location:/online_shop/cart');
//     // }

//     public function clear()
//     {
//         unset($_SESSION['cart']);
//         unset($_SESSION['cart.sum']);
//         unset($_SESSION['cart.qty']);
//         header('Location:/online_shop/cart');

//     }
//     public function view()
//     {
//         // $cart = $_SESSION['cart'];
//         if (empty($_SESSION['cart'])) {
//             $this->view->renderHtml('Cart/view.php');
//         } else {
//         //     $sumQty = 0;
//         //    foreach ($_SESSION['cart'] as $val) {
//         //     $sumQty += $val['qty'];
//         //    }
//             $this->view->renderHtml('Cart/view.php', ['cart' => $_SESSION['cart'], 'cart_sum' => $_SESSION['cart.sum'], 'cart_qty' => $_SESSION['cart.qty']]);

//         }
//     }

//     public function order()
//     {
// //пользователь может быть авторизован или нет, если да, то он передается, чтобы потом он мог смотреть свои заказы, 
// //если пользователь указывает емэил, но при этом он не авторизован, то он все ранво переджается
//         // if  ($this->user === null) {
//         //     throw new UnauthorizedException();
//         // }

        
//         if (!empty($_POST)) {
//             try {
//                 $userId = null;
//                 if  ($this->user !== null) {
//                     $userId = $this->user->getId();
//                 } 
//                 $order  = Order::saveOrder($_POST, $_SESSION['cart.sum'], $_SESSION['cart.qty'], $userId);
//                 $order_product = new OrderProduct();
//                 // var_dump($order);

//                 if ($order) {
//                     if ($order_product->saveOrderProducts($_SESSION['cart'], $order->getId())) {
//                         $this->view->renderHtml('cart/orderSuccessful.php', ['orderId' => $order->getId()]);
//                         unset($_SESSION['cart']);
//                         unset($_SESSION['cart.sum']);
//                         unset($_SESSION['cart.qty']);
//                         return;
//                     }
//                 }
//             } catch (InvalidArgumentException $e) {
//                 $this->view->renderHtml('cart/order.php', ['error' => $e->getMessage()]);
//                 return;
//             }

            
//         }
//         if  ($this->user !== null) {
//             $this->view->renderHtml('cart/order.php', ['email' => $this->user->getEmail(), 'cart_sum' => $_SESSION['cart.sum'], 'cart_qty' => $_SESSION['cart.qty']]);
//         } else {
//             $this->view->renderHtml('cart/order.php', ['cart_sum' => $_SESSION['cart.sum'], 'cart_qty' => $_SESSION['cart.qty']]);

//         }
//     }

    
}
?>
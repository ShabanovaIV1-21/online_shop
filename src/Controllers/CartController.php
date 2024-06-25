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
class CartController extends Controller
{
    public function add($id)
    {
        $product = Product::getById($id);
        if (empty($product)) {
            return false;
        }
        $cart = new Cart();
        $cart->addToCart($product);
        header('Location:/project.loc/cart');
    }

    public function delItem($id)
    {
        $product = Product::getById($id);
        if (empty($product)) {
            return false;
        }

        $cart = new Cart();
        $cart->addToCart($product, -1);
        header('Location:/project.loc/cart');
    }

    public function delAllItem($id)
    {
        $product = Product::getById($id);
        $cart = new Cart();
        $cart->addToCart($product, -1 * $_SESSION['cart'][$id]['qty']);
        unset($_SESSION['cart'][$id]);
        header('Location:/project.loc/cart');
    }

    // public function addItem($id)
    // {
    //     $product = Product::getById($id);
    //     if (empty($product)) {
    //         return false;
    //     }

    //     $cart = new Cart();
    //     $cart->addToCart($product, 1);
    //     header('Location:/project.loc/cart');
    // }

    public function clear()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.qty']);
        header('Location:/project.loc/cart');

    }
    public function view()
    {
        // $cart = $_SESSION['cart'];
        if (empty($_SESSION['cart'])) {
            $this->view->renderHtml('Cart/view.php');
        } else {
        //     $sumQty = 0;
        //    foreach ($_SESSION['cart'] as $val) {
        //     $sumQty += $val['qty'];
        //    }
            $this->view->renderHtml('Cart/view.php', ['cart' => $_SESSION['cart'], 'cart_sum' => $_SESSION['cart.sum'], 'cart_qty' => $_SESSION['cart.qty']]);

        }
    }

    public function order()
    {
//пользователь может быть авторизован или нет, если да, то он передается, чтобы потом он мог смотреть свои заказы, 
//если пользователь указывает емэил, но при этом он не авторизован, то он все ранво переджается
        // if  ($this->user === null) {
        //     throw new UnauthorizedException();
        // }

        
        if (!empty($_POST)) {
            try {
                $userId = null;
                if  ($this->user !== null) {
                    $userId = $this->user->getId();
                } 
                $order  = Order::saveOrder($_POST, $_SESSION['cart.sum'], $_SESSION['cart.qty'], $userId);
                $order_product = new OrderProduct();
                // var_dump($order);

                if ($order && $_SESSION['cart']) {
                    if ($order_product->saveOrderProducts($_SESSION['cart'], $order->getId())) {
                        $this->view->renderHtml('cart/orderSuccessful.php', ['orderId' => $order->getId()]);
                        unset($_SESSION['cart']);
                        unset($_SESSION['cart.sum']);
                        unset($_SESSION['cart.qty']);
                        return;
                    }
                }
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('cart/order.php', ['error' => $e->getMessage()]);
                return;
            }

            
        }
        if  ($this->user !== null) {
            $this->view->renderHtml('cart/order.php', ['email' => $this->user->getEmail(), 'cart_sum' => $_SESSION['cart.sum'], 'cart_qty' => $_SESSION['cart.qty']]);
        } else {
            $this->view->renderHtml('cart/order.php', ['cart_sum' => $_SESSION['cart.sum'], 'cart_qty' => $_SESSION['cart.qty']]);

        }
    }

    
}
?>
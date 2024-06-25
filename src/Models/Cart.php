<?php
namespace Src\Models;

 class Cart 
 {
    public function addToCart($product, $qty = 1)
    {
        // $product = Product::getById($id);
        if (isset($_SESSION['cart'][$product->getId()])) {
            $_SESSION['cart'][$product->getId()]['qty'] += $qty;
        } else {
            $_SESSION['cart'][$product->getId()] = [
                'title' => $product->getTitle(),
                'price' => $product->getPrice(),
                'qty' => $qty,
                'img' => $product->getImg(),
            ];
        }
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])? $_SESSION['cart.sum'] + $qty * $product->getPrice() : $qty * $product->getPrice();
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])? $_SESSION['cart.qty'] + $qty: $qty;
        // var_dump($_SESSION['cart']);
        // var_dump($_SESSION['cart.sum']);
        // session_destroy();
    }
 }


?>
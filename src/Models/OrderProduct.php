<?php
namespace Src\Models;
use Src\Models\ActiverecordEntity;
use Src\Exceptions\InvalidArgumentException;
use Src\Services\Db;


class OrderProduct extends ActiveRecordEntity
{
    protected $orderId;
    protected $productId;
    protected $qty;
    protected $title;
    protected $price;
    protected $total;
   

    protected static function getTableName():string
    {
        return 'order_product';
    }


    public function getQty()
    {
        return $this->qty;
    }
    public function setQty($string)
    {
        $this->qty = $string;
    }

    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($string)
    {
        $this->total = $string;
    }

    public function getOrderId()
    {
        return $this->orderId;
    }
    public function setOrderId($string)
    {
        $this->orderId = $string;
    }

    public function getProductId()
    {
        return $this->productId;
    }
    public function setProductId($string)
    {
        $this->productId = $string;
    }

    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($string)
    {
        $this->title = $string;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($string)
    {
        $this->price = $string;
    }

    
    public static function saveOrderProducts(array $products, $orderId)
    {
        // var_dump($products);
        if ($products) {
            foreach ($products as $k => $product) {
                $orderProduct = new OrderProduct();
                $orderProduct->setOrderId($orderId);
                $orderProduct->setProductId($k);
                $orderProduct->setTitle($product['title']);
                $orderProduct->setPrice($product['price']);
                $orderProduct->setQty($product['qty']);
                $orderProduct->setTotal($product['price'] * $product['qty']);
                $orderProduct->save();
            }
            return true;
        } else {
            return false;
        }

        
        // if (empty($fields['name'])) {
        //     throw new InvalidArgumentException('Не введено ФИО');
        // }
        // if (empty($fields['email'])) {
        //     throw new InvalidArgumentException('Не введен email');
        // }
        // if (empty($fields['phone'])) {
        //     throw new InvalidArgumentException('Не введен телефон');
        // }  
        // if (empty($fields['address'])) {
        //     throw new InvalidArgumentException('Не введен адресс');
        // }       
        // if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
        //     throw new InvalidArgumentException('Email введен некорректно');
        // }

    //     $order = new Order();
    //     $order->setName($fiels['name']);
    //     $order->setEmail($fiels['email']);
    //     $order->setAddress($fiels['address']);
    //     $order->setPhone($fiels['phone']);
    //     $order->setNote($fiels['note']);
    //     if  ($userId) {
    //         $order->setUserId($userId);
    //     }
    //     $order->save();
    //     return $order;
    }

    public static function getProducts($id)
    {
        $db  = Db::getInstance();
        $entities = $db->query(
            "SELECT * FROM order_product WHERE order_id=:id",
            [":id" => $id],
            static::class
        );
        // var_dump("SELECT * FROM " . static::getTableName() . " WHERE id=:id");
        return $entities ? $entities : null;
    }
}
?>
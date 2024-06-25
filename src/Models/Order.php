<?php
namespace Src\Models;
use Src\Models\ActiverecordEntity;
use Src\Exceptions\InvalidArgumentException;
use Src\Services\Db;

class Order extends ActiveRecordEntity
{
    protected $createdAt;
    protected $updatedAt;
    protected $qty;
    protected $total;
    protected $status;
    protected $name;
    protected $email;
    protected $phone;
    protected $address;
    protected $note;
    protected $userId;

    protected static function getTableName():string
    {
        return 'orders';
    }


    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($string)
    {
        $this->status = $string;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($string)
    {
        $this->name = $string;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($string)
    {
        $this->email = $string;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($string)
    {
        $this->phone = $string;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($string)
    {
        $this->address = $string;
    }

    public function getNote()
    {
        return $this->note;
    }
    public function setNote($string)
    {
        $this->note = $string;
    }

    public function getUserId()
    {
        return $this->userId;
    }
    public function setUserId($string)
    {
        $this->userId = $string;
    }

    public static function saveOrder(array $fields, $sum, $qty, $userId = null)
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не введено ФИО');
        }
        if (empty($fields['email'])) {
            throw new InvalidArgumentException('Не введен email');
        }
        if (empty($fields['phone'])) {
            throw new InvalidArgumentException('Не введен телефон');
        }  
        if (empty($fields['address'])) {
            throw new InvalidArgumentException('Не введен адресс');
        }       
        if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email введен некорректно');
        }
        // var_dump($fields);
        $order = new Order();
        $order->setName($fields['name']);
        $order->setEmail($fields['email']);
        
        if (static::findOneByColumn('email', $fields['email']) !== null) {
            $db  = Db::getInstance();
            $user = $db->query(
            "SELECT id FROM users WHERE email=:email",
            [":email" => $fields['email']],
            static::class
            );
            $userId = $user[0]->getId();
        // var_dump($user[0]);

        }
        // var_dump($userId);
        $order->setAddress($fields['address']);
        $order->setPhone($fields['phone']);
        $order->setNote($fields['note']);
        $order->setQty($qty);
        $order->setTotal($sum);
        if  ($userId) {
            $order->setUserId($userId);
        }
        // var_dump($order);
        $order->save();
        return $order;
    }

    public function updateStatus(array $fields) {
        if (($fields['status'] === null)) {
            // var_dump($_POST);
            throw new InvalidArgumentException('Статус не указан');
        }
        $this->setStatus($fields['status']);
        $this->save();
        // var_dump($this);
        return $this;
    }

    public static function getOrder($id)
    {
        $db  = Db::getInstance();
        $entities = $db->query(
            "SELECT * FROM orders WHERE user_id=:id",
            [":id" => $id],
            static::class
        );
        // var_dump("SELECT * FROM " . static::getTableName() . " WHERE id=:id");
        return $entities ? $entities : null;
    }
}
?>
<?php

namespace Src\Models;

use Src\Models\ActiverecordEntity;
use Src\Services\Db;
use Src\Models\Users\User;
use Src\Exceptions\InvalidArgumentException;

class Product extends  ActiveRecordEntity
{
    protected $id;
    protected $categoryId;
    protected $title;
    protected $content;
    protected $price;
    protected $oldPrice;
    protected $description;
    protected $img;
    protected $isOffer;
    
    // public function getAuthorId(): int
    // {
    //     // var_dump($this->authorId);
    //     return (int) $this->authorId;
    // }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getTitle():string
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent():string
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getPrice():string
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getOldPrice():string
    {
        return $this->oldPrice;
    }
    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $oldPrice;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getIsOffer()
    {
        return $this->isOffer;
    }
    public function setIsOffer($isOffer)
    {
        $this->isOffer = $isOffer;
    }
    // public function setAuthor(User $author):void
    // {
    //     $this->authorId = $author->getId();
    // }

    protected static function getTableName():string
    {
        return 'products';
    }

    public function breadcrumbs($productId)
    {
        $db  = Db::getInstance();
        $category = $db->query(
            "SELECT * FROM categories WHERE id=:id",
            [":id" => $productId],
            static::class
        );
        if ($category) {
            
        }
        // var_dump("SELECT * FROM " . static::getTableName() . " WHERE id=:id");
        return $entities ? $entities : null;
    }

    public static function search($searchString) 
    {
        $db = Db::getInstance();
        $products = $db->query("SELECT * FROM products WHERE title LIKE '%$searchString%'");
        // $sql = "SELECT * FROM products WHERE title LIKE '%$searchString%'";
        // var_dump($products);
        if ($products) {
            return $products;
        } else {
            return null;
        }
    }

    public static function createProduct(array $fields, array $file)
    {
        // var_dump($fields);
        if (empty($fields['title'])) {
            throw new InvalidArgumentException('Не передано название');
        }
        if ($fields['categoryId'] == null || $fields['categoryId'] == 0) {
            throw new InvalidArgumentException('Не передан номер категории');
        }
        if ($fields['content'] == null) {
            throw new InvalidArgumentException('Не передано содержание');
        }
        // if (preg_match('~^[0-10000].[0-99]$~', $fields['price']) !== 1) {
        //     throw new InvalidArgumentException('Неверно введено число');
        // }
        
        $product = new Product();
       

// var_dump($file['img']['type'] !== 'image/pjpeg');
        if ($file['img']['tmp_name']) {
            if ($file['img']['type'] !== 'image/jpeg' && $file['img']['type'] !== 'image/pjpeg' && $file['img']['type'] !== 'image/png' && $file['img']['type'] !== 'image/tiff') {
                throw new InvalidArgumentException('Файл не является изображением');

            }
            $file['img']['name'] = basename($file['img']['name']);
            $path = $file['img']["tmp_name"];
            $name = $file['img']["name"];
            move_uploaded_file($path, "img/products/$name");
        $product->setImg($name);
        } 
        $product->setTitle($fields['title']);
        $product->setCategoryId($fields['categoryId']);
        $product->setContent($fields['content']);
        $product->setPrice($fields['price']);
        $product->setDescription($fields['desc']);

        // if ($fields['parentId'] !== null) {
        //     $product->setParentId($fields['parentId']);
        // } 
        // if (!empty($fields['desc'])) {
        //     $product->setDescription($fields['desc']);
        // }
        // var_dump($category);
        $product->save();
        return $product;
    }

    public function updateProduct(array $fields, array $file)
    {
        // var_dump($file);
        if (empty($fields['title'])) {
            throw new InvalidArgumentException('Не передано название');
        }
        if ($fields['categoryId'] == null || $fields['categoryId'] == 0) {
            throw new InvalidArgumentException('Не передан номер категории');
        }
        if ($fields['content'] == null) {
            throw new InvalidArgumentException('Не передано содержание');
        }
        // if (preg_match('~^[0-10000].[0-99]$~', $fields['price']) !== 1) {
        //     throw new InvalidArgumentException('Неверно введено число');
        // }
        
        // $product = new Product();
        

// var_dump($this->getPrice());
        
        if ($file['img']['tmp_name']) {
            if ($file['img']['type'] !== 'image/jpeg' && $file['img']['type'] !== 'image/pjpeg' && $file['img']['type'] !== 'image/png' && $file['img']['type'] !== 'image/tiff') {
                throw new InvalidArgumentException('Файл не является изображением');

            }
            $file['img']['name'] = basename($file['img']['name']);
            $path = $file['img']["tmp_name"];
            $name = $file['img']["name"];
            move_uploaded_file($path, "img/products/$name");
            $this->setImg($name);

        }
        $this->setTitle($fields['title']);
        $this->setCategoryId($fields['categoryId']);
        $this->setContent($fields['content']);
        $this->setDescription($fields['desc']);
        if ($this->getPrice() !== $fields['price']) {
            $this->setOldPrice($this->getPrice());
            $this->setPrice($fields['price']);
            if ($this->getPrice() < $this->getOldPrice()) {
                $this->setIsOffer(1);
            } else {
                $this->setIsOffer(0);

            }
        }

        // if ($fields['parentId'] !== null) {
        //     $product->setParentId($fields['parentId']);
        // } 
        // if (!empty($fields['desc'])) {
        //     $product->setDescription($fields['desc']);
        // }
        // var_dump($category);
        $this->save();
        return $this;
    }

    // public function getAuthor(): User
    // {
    //     return User::getById($this->authorId);
    // }

    // public static function createArticle(array $fields, User $author):Article
    // {
    //     if (empty($fields['name'])) {
    //         throw new InvalidArgumentException('Не передано название статьи');
    //     }
    //     if (empty($fields['text'])) {
    //         throw new InvalidArgumentException('Не передан текст статьи');
    //     }
    //     $article = new Article();
    //     $article->setAuthor($author);
    //     $article->setName($fields['name']);
    //     $article->setText($fields['text']);
    //     $article->save();
    //     return $article;
    // }

    // public function updateArticle(array $fields):Article
    // {
    //     if (empty($fields['name'])) {
    //         throw new InvalidArgumentException('Не передано название статьи');
    //     }
    //     if (empty($fields['text'])) {
    //         throw new InvalidArgumentException('Не передан текст статьи');
    //     }
    //     $this->setName($fields['name']);
    //     $this->setText($fields['text']);
    //     $this->save();
    //     return $this;
    // }
    
   
}

?>
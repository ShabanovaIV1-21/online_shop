<?php

namespace Src\Models;

use Src\Models\ActiverecordEntity;
use Src\Services\Db;
use Src\Models\Users\User;
use Src\Exceptions\InvalidArgumentException;

class Category extends  ActiveRecordEntity
{
    // private $id;
    protected $parentId;
    protected $title;
    protected $description;
    // protected $createdAt;

    
    // public function getAuthorId(): int
    // {
    //     // var_dump($this->authorId);
    //     return (int) $this->authorId;
    // }
    public function getTitle():string
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getParentId():string
    {
        return $this->parentId;
    }

    public function setParentId($parentId)
    {
        $this->parentId = $parentId;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // public function setAuthor(User $author):void
    // {
    //     $this->authorId = $author->getId();
    // }

    protected static function getTableName():string
    {
        return 'categories';
    }

    public function getProducts($id)
    {
        $db  = Db::getInstance();
        $entities = $db->query(
            "SELECT * FROM products WHERE category_id=:id",
            [":id" => $id],
            static::class
        );
        // var_dump("SELECT * FROM " . static::getTableName() . " WHERE id=:id");
        return $entities ? $entities : null;
    }

    public function getSubcategories()
    {
        $db  = Db::getInstance();
        $entities = $db->query(
            "SELECT * FROM categories WHERE parent_id=:id",
            [":id" => $this->id],
            static::class
        );
        // var_dump("SELECT * FROM " . static::getTableName() . " WHERE id=:id");
        return $entities ? $entities : null;
    }

    public function breadcrumbs($categoryId, &$categories = [])
    {
        $db  = Db::getInstance();
        $category = $db->query(
            "SELECT * FROM categories WHERE id=:id",
            [":id" => $categoryId],
            static::class
        );
        $categories[] = $category;
        if (!empty($category)) {
            if ($category[0]->getParentId() != 0) {
                $category = $category[0]->breadcrumbs($category[0]->getParentId(), $categories);
                // var_dump($category);
            }
        }
        // var_dump("SELECT * FROM " . static::getTableName() . " WHERE id=:id");
        // return $entities ? $entities : null;
        // var_dump($categories);
        return $categories;
    }

    public static function createCategory(array $fields)
    {
        // var_dump($fields);
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название');
        }
        // if ($fields['parentId'] === null) {
        //     throw new InvalidArgumentException('Не передан номер родительской категории');
        // }
        $category = new Category();
        $category->setTitle($fields['name']);
        if ($fields['parentId'] !== null) {
            $category->setParentId($fields['parentId']);
        } 
        if (!empty($fields['desc'])) {
            $category->setDescription($fields['desc']);
        }
        // var_dump($category);
        $category->save();
        return $category;
    }

    public function updateCategory(array $fields)
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название');
        }
        
        $this->setTitle($fields['name']);
        if (!empty($fields['parentId'])) {
            $this->setParentId($fields['parentId']);
        }
        if (!empty($fields['desc'])) {
            $this->setDescription($fields['desc']);
        }
        $this->save();
        return $this;
    }

}

?>
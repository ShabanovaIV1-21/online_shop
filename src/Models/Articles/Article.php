<?php

namespace Src\Models\Articles;

use Src\Models\ActiverecordEntity;
use Src\Services\Db;
use Src\Models\Users\User;
use Src\Exceptions\InvalidArgumentException;

class Article extends  ActiveRecordEntity
{
    // private $id;
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;

    
    public function getAuthorId(): int
    {
        // var_dump($this->authorId);
        return (int) $this->authorId;
    }
    public function getName():string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getText():string
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setAuthor(User $author):void
    {
        $this->authorId = $author->getId();
    }

    protected static function getTableName():string
    {
        return 'articles';
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public static function createArticle(array $fields, User $author):Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }
        $article = new Article();
        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);
        $article->save();
        return $article;
    }

    public function updateArticle(array $fields):Article
    {
        if (empty($fields['name'])) {
            throw new InvalidArgumentException('Не передано название статьи');
        }
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Не передан текст статьи');
        }
        $this->setName($fields['name']);
        $this->setText($fields['text']);
        $this->save();
        return $this;
    }
    
   
}

?>
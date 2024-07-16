<?php
namespace Src\Controllers;

use Src\Exceptions\InvalidArgumentException;
use Src\Exceptions\NotFoundException;
use Src\Views\View;
use Src\Controllers\Controller;
use Src\Exceptions\UnauthorizedException;
use Src\Models\Articles\Article;
use Src\Models\Users\User;
use Src\Models\Users\UsersAuthService;

class ArticlesController extends Controller
{
    public function all()
    {
        // $articles = Article::findAll(); //$this->db->query("SELECT * FROM articles", [], Article::class);
        // var_dump($articles);
        $this->page(1);
        // $this->view->renderHtml('Articles/all.php', ['articles' => $articles, 'pagesCount' => Article::getPagesCount(5), 'user' => UsersAuthService::getUserByToken()]);
    }

    public function page(int $pageNum)
    {
        $this->view->renderHtml('Articles/all.php', ['articles' => Article::getPage($pageNum, 5), 'pagesCount' => Article::getPagesCount(5), 'currentPageNum' => $pageNum]);
    }

    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

        // $result  = $this->db->query(
        //     "SELECT * FROM articles WHERE id = :id", 
        //     [":id" => $articleId], Article::class
        // );
        if ($article === null) {
            // var_dump($article);
            // $this->view->renderHtml('Errors/404.php', [], 404);
            throw new NotFoundException();
        }
        // $articleAuthor = User::getById($article->getAuthorId());
        // var_dump($article->getAuthorId());

        $this->view->renderHtml('Articles/view.php', ['article' => $article]);
    }

    public function edit(int $articleId):void
    {
        $article = Article::getById($articleId);
        if ($article === null) {
            // var_dump($article);
            // $this->view->renderHtml('Errors/404.php', [], 404);
            // return;
            throw new NotFoundException();
        }
        if  ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $article->updateArticle($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage()]);
                return;
            }
            header('Location: /online_shop/articles/'  . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
        // $article->setName('Новое название');
        // $article->setText('Новый текст');
        // $article->save();

    }

    public function add():void
    {
        if  ($this->user === null) {
            throw new UnauthorizedException();
        }
        if (!empty($_POST)) {
            try {
                $article = Article::createArticle($_POST, $this->user);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }
            header('Location: /online_shop/articles/'  . $article->getId(), true, 302);
            exit();
        }
        
        $this->view->renderHtml('articles/add.php');
        // $author = User::getById(1);
        // $article = new Article();
        // $article->setAuthor($author);
        // $article->setName('Еще одна статья');
        // $article->setText('Текст еще одной статьи');
        // $article->save();
        // var_dump($article);
    }

    public function delete(int $articleId)
    {
        $article = Article::getById($articleId);
        if ($article === null) {
            // var_dump($article);
            // $this->view->renderHtml('Errors/404.php', [], 404);
            // return;
            throw new NotFoundException();
        }
        echo "Статья '" . $article->getName() . "' удалена успешно";
        $article->delete();
    }

    public function echoAddress($address)
    {
        echo $address;
    }
}

?>
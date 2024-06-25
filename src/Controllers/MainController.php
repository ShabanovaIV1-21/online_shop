<?php
namespace Src\Controllers;
use Src\Views\View;
use Src\Controllers\Controller;
use Src\Models\Category;
use Src\Models\Product;
use Src\Models\Articles\Article;



class MainController extends Controller
{
    public function main()
    {
        // echo 'главная страница';
        $categories = Category::findAll();
        $products = Product:: findAll();
        
        $this->view->renderHtml('Main/main.php', ['categories' => $categories, 'products' => $products, 'articles' => Article::getPage(1, 5)]);
    }

    public function sayHello(string $name)
    {
        // echo 'Привет, ' . $name;
        $this->view->renderHtml('Main/hello.php', ['name' => $name]);
    }

    public function echoAddress($address)
    {
        echo $address;
    }
}

?>
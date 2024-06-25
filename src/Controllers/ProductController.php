<?php
namespace Src\Controllers;
use Src\Views\View;
use Src\Models\Product;
use Src\Exceptions\NotFoundException;
use Src\Models\Category;

class ProductController extends Controller
{
    // public $products = [];
    protected $view;
    
    public function show($id)
    {
        // if (isset($this->products[$n])) {
        //     // var_dump($this->products[$n]);
        //     $this->view->renderHtml('Product/product_n.php', ['product' => $this->products[$n]]);
        // } else {
        //     echo "Продукта $n нет в каталоге";
        // }

        $product = Product::getById($id);

        // $result  = $this->db->query(
        //     "SELECT * FROM articles WHERE id = :id", 
        //     [":id" => $articleId], Article::class
        // );
        if ($product === null) {
            // var_dump($article);
            // $this->view->renderHtml('Errors/404.php', [], 404);
            throw new NotFoundException();
        }
        $category = Category::getById($product->getCategoryId());
        // var_dump($this->view);
        $this->view->renderHtml('Product/product_n.php', ['product' => $product, 'category' => $category]);
    }

    // public function all()
    // {
    //     $this->view->renderHtml('Product/product_all.php', ['products' => $this->products]);
    // }
}

?>
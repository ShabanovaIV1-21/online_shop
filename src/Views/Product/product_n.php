<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/project.loc/">Главная</a></li>
            <?php $categories = array_reverse($category->breadcrumbs($category->getId()));
            // var_dump($categories);
            foreach ($categories as $val) : ?>
                <li class="breadcrumb-item"><a href="/project.loc/categories/<?=$val[0]->getId()?>"><?=$val[0]->getTitle()?></a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
            <?php endforeach; ?>
            <li class="breadcrumb-item active" aria-current="page"><?=$product->getTitle()?></li>
        </ol>
    </nav>
    <h1 class="mt-4 mb-2"><?=$product->getTitle()?></h1>
    <img height="400" src="/project.loc/img/products/<?=$product->getImg()?>" alt="Фото продукта">
    <p><?=$product->getContent()?></p>

    <p>

    Цена: <?=$product->getPrice()?>, старая цена: <?=$product->getOldPrice()?>

    </p>

    <p>

    <?=$product->getDescription()?>

    </p>

    <a href='/project.loc/cart/add/<?=$product->getId()?>' class="btn btn-danger">Добавить в корзину</a>
</div>

<div class="container">
    <h1 class="mt-4 mb-2"><?=$product->getTitle()?></h1>
    <p>Категория: <?=$category?></p>
    <img height="400" src="/online_shop/img/products/<?=$product->getImg()?>" alt="Фото продукта">
    <p><?=$product->getContent()?></p>

    <p>

    Цена: <?=$product->getPrice()?>, старая цена: <?=$product->getOldPrice()?>

    </p>

    <p>

    <?=$product->getDescription()?>

    </p>

    <a href="/online_shop/admin/product/<?=$product->getId()?>/edit" class="btn btn-primary">Редактирование</a></td>
    <a href="/online_shop/admin/product/<?=$product->getId()?>/delete" class="btn btn-primary">Удаление</a>
</div>

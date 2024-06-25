<div class="container">
    <h1 class="mt-4">Товары по акции</h1>
    <div class="row mb-5">
        <?php foreach ($products as $val) : ?>
            <?php if ($val->getIsOffer() != 0): ?>
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mb-2"><!--  сколько кололонок занимает элемент внутри и при какой ширине экрана-->
                    <div class="card" >
                        <img src="/project.loc/img/products/<?=$val->getImg()?>" class="card-img-top py-2" alt="Фото продукта">
                        <div class="card-body">
                            <div class="card__body-up">
                                <h5 class="card-title"><?=$val->getTitle()?></h5>
                                <div class="card__price-container">
                                <span class="container__price"><?=$val->getPrice()?> &#8381;</span> <span class="container__price-old"><?=$val->getOldPrice()?></span>
                                </div>
                                <p class="card-text"><?=$val->getContent()?></p>
                            </div>
                            <a class="btn btn-success align-self-end mt-2 mb-2" href="/project.loc/product/<?=$val->getId()?>">Посмотреть подробно</a>
                            <a href='/project.loc/cart/add/<?=$val->getId()?>'><img src="/project.loc/img/cart.png" class="cart-img"></a>
                        </div>
                    </div>
                </div>
        
            <!-- <h3><a ></a></h3> -->
            <!-- <img height="150" src="" alt=""> -->
            
            <!-- <b style="color:red">Цена:</b>          -->

            <?php endif ?>
        <?php endforeach; ?>
    </div>
<h1 class="mt-4 mb-2">Наш каталог</h1>

<?php foreach ($categories as $val) : ?>
    <?php if ($val->getParentId() == 0): ?>
    <h3><a class="list" href="categories/<?=$val->getId()?>"><?=$val->getTitle()?></a> <?=$val->getDescription()?></h3>

<?php endif ?>
<?php endforeach; ?>

<h1 class="mt-4 mb-2">Статьи по теме</h1>

<?php foreach ($articles as $article) : ?>
    <h3><a class="list" href="/project.loc/articles/<?=$article->getId()?>"><?=$article->getName()?>, <?=$article->getCreatedAt()?></a></h3>

<?php endforeach; ?>
</div>
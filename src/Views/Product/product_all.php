
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
        </ol>
    </nav>
    <h1 class="mt-4 mb-2"><?=$category->getTitle()?></h1>
    <div class="row mb-5">
        <?php if ($subcategories !== null): ?>
            <?php foreach ($subcategories as $val) : ?>
                <h3><a class="list" href="/project.loc/categories/<?=$val->getId()?>"><?=$val->getTitle()?></a> <?=$val->getDescription()?></h3>
            <?php endforeach; ?>
        <? endif; ?>

            <?php foreach ($products as $val) : ?>
                    <div class="col-12 col-sm-6 col-lg-3 mt-4 mb-2"><!--  сколько кололонок занимает элемент внутри и при какой ширине экрана-->
                        <div class="card" >
                        <a href="/project.loc/product/<?=$val->getId()?>">
                            <img src="/project.loc/img/products/<?=$val->img?>" class="card-img-top py-2" alt="Фото продукта">
                        </a>
                            <div class="card-body">
                                <div class="card__body-up">
                                    <a style="text-decoration:none; color:black" href="/project.loc/product/<?=$val->getId()?>">
                                        <h5 class="card-title"><?=$val->getTitle()?></h5>
                                    </a>
                                    <div class="card__price-container">
                                    <span class="container__price"><?=$val->price?> &#8381;</span> <span class="container__price-old"><?=$val->oldPrice?></span>
                                    </div>
                                    <p class="card-text"><?=$val->content?></p>
                                </div>
                                <a class="btn btn-success align-self-end mt-2 mb-2" href="/project.loc/product/<?=$val->getId()?>">Посмотреть подробно</a>
                                <a href='/project.loc/cart/add/<?=$val->getId()?>'><img src="/project.loc/img/cart.png" class="cart-img"></a>
                            </div>
                        </div>
                    </div>
            <?php endforeach; ?>
            
    </div>
</div>

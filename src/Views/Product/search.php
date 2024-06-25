<div class="container">
    <h1 class="mt-4 mb-2">Результаты поиска</h1>
    <p><b>по запросу <?=$q  ?? '' ?></b></p>
    <?php if(isset($searchProducts)):?>
        <div class="row mb-5">
            <?php foreach ($searchProducts as $k => $val) : ?>
                <div class="col-12 col-sm-6 col-lg-3 mt-4 mb-2"><!--  сколько кололонок занимает элемент внутри и при какой ширине экрана-->
                    <div class="card" >
                        <img src="/project.loc/img/products/<?=$val->img?>" class="card-img-top py-2" alt="Фото продукта">
                        <div class="card-body">
                            <div class="card__body-up">
                                <h5 class="card-title"><?=$val->title?></h5>
                                <div class="card__price-container">
                                <span class="container__price"><?=$val->price?> &#8381;</span> <span class="container__price-old"><?=$val->oldPrice?></span>
                                </div>
                                <p class="card-text"><?=$val->content?></p>
                            </div>
                            <a class="btn btn-success align-self-end mt-2 mb-2" href="/project.loc/product/<?=$val->id?>">Посмотреть подробно</a>
                            <a href='/project.loc/cart/add/<?=$val->id?>'><img src="/project.loc/img/cart.png" class="cart-img"></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else:?>
    <p>Ничего не найдено</p>
<?php endif;?>
</div>

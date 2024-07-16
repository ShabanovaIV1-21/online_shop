<div class="container">
    <h1 class="mt-4 mb-2">Содержимое корзины</h1>

    <?php if (empty($cart)) :?>
    <p>Корзина пуста</p>
    <?php else:?>

    <a href='cart/clear' class="btn btn-danger btn-top">Очистить корзину</a>
    
    <table class="table table-borderless">
        <?php  foreach($cart as $k => $val) :?>
            <tr>
            <!-- <div class="d-flex flex-row"> -->
                <td><img height="150" src="/online_shop/img/products/<?=$val['img']?>" alt="Фото продукта"></td>
                <td><h4><?=$val['title']?></h4></td>
                <td>
                    <div>
                        Цена: <?=$val['price']?>, количество товаров:  
                        <?php if ($val['qty'] > 1) {echo "<a href='cart/del/$k' class='btn btn-outline-primary change_qty'>-</a>";}?> <?=$val['qty']?><a href="cart/add/<?=$k?>" class="btn btn-outline-primary change_qty">+</a><br> 
                        Сумма: <?=$val['price'] * $val['qty']?>
                    </div>
                </td>

                <td><a href='cart/del/<?=$k?>/all' class="btn btn-danger">Удалить товар</a></td>
            <!-- </div> -->
            </tr>
        <? endforeach;?>
    </table>

    <br>
    <br><b>Количество товаров:</b> <?=$cart_qty?> 
    <br><b>Сумма заказа:</b> <?=$cart_sum?> <br>
    <br>
    <a href='cart/order' class="btn btn-warning">Оформить заказ</a>
    <? endif;?>
</div>

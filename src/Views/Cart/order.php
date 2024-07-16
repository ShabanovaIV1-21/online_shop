<div class="container">
    <h1 class="mt-4 mb-2">Оформление заказа</h1>

    <?php if (!empty($error)):?>
        <div style="color:red"><?=$error?></div>
    <?php endif;?>

    <a href="/online_shop/cart"><- Вернуться назад</a>
    <p><b>Итоговая сумма заказа:</b> <?=$cart_sum?> <br>
    <b>Итоговое количество товаров:</b> <?=$cart_qty?></p>

    <form action='/online_shop/cart/order' method="post">
        <div  class='d-flex flex-column col-3'>
            <div class="mb-2">
                <label>ФИО <br>
                    <input type='text' id='name' name="name" class="mt-1 form-control" value="<?=$_POST['name'] ?? ''?>" size='50'>
                </label class="form-label">
            </div>
            
            <div class="mb-2">
                <label>Email <br>
                    <input type='text' id='email' name="email" class="mt-1 form-control" value="<?=(isset($_POST['email']))? $_POST['email'] : ($email ?? '')?>" size='50'>
                </label class="form-label">
            </div>
            
            <div class="mb-2">
                <label>Телефон <br>
                    <input type='text' id='phone' name="phone" class="mt-1 form-control" value="<?=$_POST['phone'] ?? ''?>" size='50'>
                </label class="form-label">
            </div>
            
            <div class="mb-2">
                <label>Адрес доставки <br>
                    <textarea id='address' name="address" rows='10' cols='80' class="mt-1 form-control" size='50'><?=$_POST['address'] ?? ''?></textarea>
                </label class="form-label">
            </div>
            
            <div class="mb-2">
                <label>Комментарии к заказу <br>
                    <textarea id='note' name="note" rows='10' cols='80' class="mt-1 form-control" size='50'><?=$_POST['note'] ?? ''?></textarea>
                </label class="form-label">
            </div>
            

            <input type="submit" value="Оформить заказ" class="btn btn-primary col-6">
        </div>
        

    </form>
</div>

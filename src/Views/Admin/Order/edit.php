<div class="container">
    <h1 class="mt-4 mb-2">Заказ №<?=$order->getId()?></h1>

    <?php if (!empty($error)):?>
        <div style="color:red"><?=$error?></div>
    <?php endif;?>

    <form action='/project.loc/admin/order/<?=$order->getId()?>/edit' method="post">
        <div  class='d-flex flex-column col-3'>
            <div class="mb-2">
                <label class="form-label">Статус заказа <br>
                <?=($order->getStatus() === 0)? 'selected' : '';?>
                    <select id='status' name="status" class="mt-1 form-control form-select">
                        <option <?=($order->getStatus() == 0)? 'selected' : '';?> value="0">В обработке</option>
                        <option <?=($order->getStatus() == 1)? 'selected' : '';?> value="1">Подтвержден</option>
                        
                    </select>
                </label>
            </div>
            
            <input type="submit" value="Сохранить" class="btn btn-primary col-6">
        </div>
    </form>
</div>


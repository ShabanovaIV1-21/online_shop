<div class="container">
    <h1  class="mt-4 mb-2">Заказы</h1>
    <!-- <a href="/project.loc/admin/order/add" class="btn btn-danger">Добавить категорию</a> -->
    <?php if  ($orders): ?>
    <table class="table table-borderless">

    <?php foreach($orders as $k => $order): ?>
        <tr>
            <td><? echo "№ " . $order->getId() . ", " . $order->getCreatedAt() . ", " . $order->getQty() . " товаров"?></td>
            <td><a href="/project.loc/personal/orders/<?=$order->getId()?>" class="btn btn-primary">Просмотр</a></td>
            <?php if ($order->getStatus() == 0) :?>
                <td><a href="/project.loc/personal/orders/<?=$order->getId()?>/delete" class="btn btn-primary">Удалить</a></td>
            <?php endif;?>

        </tr>

    <?php endforeach; ?>
    </table>
    <?php else :?>
        Нет заказов
    <?php endif; ?>
</div>

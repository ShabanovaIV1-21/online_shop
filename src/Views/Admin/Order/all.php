<div class="container">
    <h1 class="mt-4 mb-2">Заказы</h1>
    <!-- <a href="/project.loc/admin/order/add" class="btn btn-danger">Добавить категорию</a> -->
    <table class="table table-borderless">
    <?php foreach($orders as $k => $order): ?>
        <tr>
            <td><? echo '№' . $order->getId() . ", " . $order->getName() . ", " . $order->getEmail() . ", " . $order->getQty()?></td>
            <td><a href="/project.loc/admin/order/<?=$order->getId()?>" class="btn btn-primary">Просмотр</a></td>
            <td><a href="/project.loc/admin/order/<?=$order->getId()?>/edit" class="btn btn-primary">Редактирование</a></td>
            <td><a href="/project.loc/admin/order/<?=$order->getId()?>/delete" class="btn btn-primary">Удаление</a></td>

        </tr>

    <?php endforeach; ?>
    </table>
</div>

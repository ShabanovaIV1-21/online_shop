<div class="container">
    <h1 class="mt-4 mb-2">Заказ №<?= $order->getId() ?></h1>

    <h3>Данные о заказе</h3>
    <p>
        <b>Создан: </b><?= $order->getCreatedAt() ?><br>
        <b>Статус: </b><?=($order->getStatus()==1)?'Подтвержден':'В обработке'?><br>
        <b>Дополнительная инф-ция: </b><?= $order->getNote() ?><br>
        <b>Суммарное кол-во товаров: </b><?= $order->getQty() ?><br>
        <b>Суммарная цена: </b><?= $order->getTotal() ?><br>
    </p>

    <h3>Данные о товарах</h3>
    <table class="table table-bordered">
        <tr>
            <td><b>Название</b></td>
            <td><b>Кол-во</b></td>
            <td><b>Цена</b></td>
            <td><b>Суммарная цена</b></td>
        </tr>
        <?php foreach ($products as $orderProduct): ?>
            <tr>
                <td><?= $orderProduct->getTitle() ?></td>
                <td><?= $orderProduct->getQty() ?></td>
                <td><?= $orderProduct->getPrice() ?></td>
                <td><?= $orderProduct->getTotal() ?></td>
            </tr>

        <? endforeach; ?>
    </table>
</div>

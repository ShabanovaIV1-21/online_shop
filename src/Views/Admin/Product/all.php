<div class="container">
    <h1 class="mt-4 mb-2">Товары</h1>
    <a href="/project.loc/admin/product/add" class="btn btn-danger">Добавить товар</a>
    <table class="table  table-borderless">
    <?php foreach($products as $k => $product): ?>
        <tr>
            <td><?=$product->getTitle()?></td>
            <td><a href="/project.loc/admin/product/<?=$product->getId()?>" class="btn btn-primary">Просмотр</a></td>
            <td><a href="/project.loc/admin/product/<?=$product->getId()?>/edit" class="btn btn-primary">Редактирование</a></td>
            <td><a href="/project.loc/admin/product/<?=$product->getId()?>/delete" class="btn btn-primary">Удаление</a></td>

        </tr>

    <?php endforeach; ?>
    </table>
</div>

<div class="container">
    <h1 class="mt-4 mb-2">Категории</h1>
    <a href="/online_shop/admin/category/add" class="btn btn-danger btn-top">Добавить категорию</a>
    <table class="table  table-borderless">
    <?php foreach($categories as $k => $category): ?>
        <tr>
            <td><?=$category->getTitle()?></td>
            <td><a href="/online_shop/admin/category/<?=$category->getId()?>" class="btn btn-primary">Просмотр</a></td>
            <td><a href="/online_shop/admin/category/<?=$category->getId()?>/edit" class="btn btn-primary">Редактирование</a></td>
            <td><a href="/online_shop/admin/category/<?=$category->getId()?>/delete" class="btn btn-primary">Удаление</a></td>

        </tr>

    <?php endforeach; ?>
    </table>
</div>
